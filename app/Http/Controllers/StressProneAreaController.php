<?php

namespace App\Http\Controllers;

use App\Http\Requests\StressProneAreaRequest;
use App\Http\Requests\UpdateStressProneAreaRequest;
use App\Models\Barangay;
use App\Models\City;
use App\Models\Municipality;
use App\Models\Province;
use App\Models\StressProneArea;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StressProneAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StressProneAreaRequest $request)
    {
        try 
        {
            DB::beginTransaction();

                $stressProneArea = StressProneArea::create([
                    'province_id' => isset($request->validated()['input_spa_province']) ? $request->validated()['input_spa_province'] : null,
                    'city_id' => isset($request->validated()['input_spa_city']) ? $request->validated()['input_spa_city'] : null,
                    'municipality_id' => isset($request->validated()['input_spa_municipality']) ? $request->validated()['input_spa_municipality'] : null,
                    'barangay_id' => isset($request->validated()['input_spa_barangay']) ? $request->validated()['input_spa_barangay'] : null,
                    'stressEcosystem' => $request->validated()['input_spa_stressecosystem'],
                    'totalFarmers' => isset($request->validated()['input_spa_totalfarmers']) ? $request->validated()['input_spa_totalfarmers'] : null,
                    'totalStressArea' => isset($request->validated()['input_spa_totalstressarea']) ? $request->validated()['input_spa_totalstressarea'] : null,

                    'initdt' => Carbon::now(),
                    'upddt' => Carbon::now(),
                    'initid' => Auth::user()->id,
                    'updid' => Auth::user()->id,
                ]);

            DB::commit();

            return back()->with('success', "new Stress Prone Area Data Added Successfully!");

        } catch (\Exception $ex) 
        {
            DB::rollBack();
            throw $ex;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StressProneArea  $stressProneArea
     * @return \Illuminate\Http\Response
     */
    public function show(StressProneArea $stressProneArea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StressProneArea  $stressProneArea
     * @return \Illuminate\Http\Response
     */
    public function edit(StressProneArea $stressProneArea)
    {
        $provinces = Province::orderBy('code')->get();
        $cities = City::orderBy('code')->get();
        $municipalities = Municipality::orderBy('code')->get();
        $barangays = Barangay::orderBy('code')->get();

        $stressProneArea = StressProneArea::where('id', $stressProneArea->id)->first();
        
        return view('stresspronearea.edit', compact('stressProneArea', 'provinces', 'cities', 'municipalities', 'barangays'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StressProneArea  $stressProneArea
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStressProneAreaRequest $request, StressProneArea $stressProneArea)
    {

        $stressProneArea->update([
            'province_id' => $request->validated()['input_spa_province'],
            'city_id' => empty($request->validated()['input_spa_city']) ? NULL : $request->validated()['input_spa_city'],
            'municipality_id' => empty($request->validated()['input_spa_municipality']) ? NULL : $request->validated()['input_spa_municipality'],
            'barangay_id' => empty($request->validated()['input_spa_barangay']) ? NULL : $request->validated()['input_spa_barangay'], 

            'totalFarmers' => $request->validated()['input_spa_totalfarmers'],
            'totalStressArea' => $request->validated()['input_spa_totalstressarea'],
            'stressEcosystem' => empty($request->validated()['input_spa_stressecosystem']) ? NULL : $request->validated()['input_spa_stressecosystem'],

            'upddt' => now(),
            'updid' => Auth::user()->id,

        ]);

        return back()->with('success', 'Stress Data Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StressProneArea  $stressProneArea
     * @return \Illuminate\Http\Response
     */
    public function destroy(StressProneArea $stressProneArea)
    {
        $stressProneArea->delete();

        return redirect()->back()->with('message', 'Stress Data was Deleted Successfully. <a class="btn btn-sm btn-warning" href="'.route('stresspronearea.restore',  ['stressProneArea' => $stressProneArea->id]).'">Whoops, Undo</a>');

    }

    public function restore(int $stressProneArea)
    {
        $stressProneArea = StressProneArea::withTrashed()->find($stressProneArea);

        if ($stressProneArea && $stressProneArea->trashed())
        {
            $stressProneArea->restore();
        }

        return redirect()->back()->with('success', 'Stress Data was restored successfully');
    }

    public function dashboard()
    {
        $totalFarmers = StressProneArea::sum('totalFarmers');
        $totalStressArea = StressProneArea::sum('totalStressArea');

        // dd($totalFarmers, $totalStressArea);

        $stressProneAreaDetails = StressProneArea::leftjoin('provinces', 'stresspronearea.province_id', '=', 'provinces.id')
            ->select(
                'stresspronearea.province_id',
                'provinces.province',
                'provinces.code',
                DB::raw('SUM(stresspronearea.totalFarmers) as totalFarmers'),
                DB::raw('SUM(stresspronearea.totalStressArea) as totalStressArea'),
            )->groupBy(
                'stresspronearea.province_id',
                'provinces.province',
                'provinces.code',
            )->get();

        // dd($stressProneAreaDetails);

        return view('stresspronearea.dashboard', compact('stressProneAreaDetails', 'totalFarmers', 'totalStressArea'));
    }

    public function province(Province $province)
    {
        $citiesSPADetails = StressProneArea::leftjoin('cities', 'stresspronearea.city_id', '=', 'cities.id')
                                    ->leftjoin('barangay', 'stresspronearea.barangay_id', '=', 'barangay.id')
                                    ->where('stresspronearea.province_id', $province->id)
                                    ->where('stresspronearea.municipality_id', null)
                                    ->select(
                                        'stresspronearea.*',
                                        'cities.city as city',
                                        'cities.code as citycode',
                                        'barangay.barangay as barangay',
                                        'barangay.code as barangaycode',
                                    )
                                    ->get();
        
        $municipalitiesSPADetails = StressProneArea::leftjoin('municipalities', 'stresspronearea.municipality_id', '=', 'municipalities.id')
                                    ->leftjoin('barangay', 'stresspronearea.barangay_id', '=', 'barangay.id')
                                    ->where('stresspronearea.province_id', $province->id)
                                    ->where('stresspronearea.city_id', null)
                                    ->select(
                                        'stresspronearea.*',
                                        'municipalities.municipality as municipality',
                                        'municipalities.code as municipalitycode',
                                        'barangay.barangay as barangay',
                                        'barangay.code as barangaycode',
                                    )
                                    ->get();

        // dd($citiesSPADetails, $municipalitiesSPADetails);

        return view('stresspronearea.province', compact('citiesSPADetails', 'municipalitiesSPADetails'));
    }

    public function archive()
    {
        $stressProneAreaDetails = StressProneArea::onlyTrashed()
                        ->leftjoin('provinces', 'stresspronearea.province_id', '=', 'provinces.id')
                        ->leftjoin('cities', 'stresspronearea.city_id', '=', 'cities.id')
                        ->leftjoin('municipalities', 'stresspronearea.municipality_id', '=', 'municipalities.id')
                        ->leftjoin('barangay', 'stresspronearea.barangay_id', '=', 'barangay.id')
                    ->select(
                        'stresspronearea.*',
                        'provinces.province',
                        'cities.city',
                        'municipalities.municipality',
                        'barangay.barangay',
                    )
                    ->get();

        return view('stresspronearea.archive', compact('stressProneAreaDetails'));
    }
}
