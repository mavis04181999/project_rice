<?php

namespace App\Http\Controllers;

use App\Exports\ExportFarms;
use App\Http\Requests\UpdateFarmInformationRequest;
use App\Models\Barangay;
use App\Models\City;
use App\Models\Farm;
use App\Models\Farmer;
use App\Models\Municipality;
use App\Models\PickListItem;
use App\Models\Province;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\DomPDF\Facade;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\App;
use Maatwebsite\Excel\Facades\Excel;

class FarmController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function show(Farm $farm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function edit(Farm $farm)
    {   
        $provinces = Province::orderBy('code')->get();
        $cities = City::orderBy('code')->get();
        $municipalities = Municipality::orderBy('code')->get();
        $barangays = Barangay::orderBy('code')->get();

        $optionsFrequency = PickListItem::Frequency()->get();
        $optionsIndicatorOfDrought = PickListItem::IndicatorOfDrought()->get();
        $optionsIndicatorOfSalinity = PickListItem::IndicatorOfSalinity()->get();
        $optionsLandTenurialStatus = PickListItem::LandTenurialStatus()->get();
        $optionsMonth = PickListItem::Months()->get();
        $optionsSourceOfFloods = PickListItem::SourceOfFloods()->get();
        $optionsSourceOfIrrigation = PickListItem::SourceOfIrrigation()->get();
        $optionsSourceOfSalinity = PickListItem::SourceOfSalinity()->get();

        return view('farm.edit', compact('farm', 'provinces', 'cities', 'municipalities', 'barangays', 'optionsLandTenurialStatus', 'optionsSourceOfFloods', 'optionsFrequency', 'optionsMonth', 'optionsSourceOfSalinity', 'optionsSourceOfIrrigation', 'optionsIndicatorOfSalinity', 'optionsIndicatorOfDrought'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFarmInformationRequest $request, Farm $farm)
    {
        
        try 
        {

            DB::beginTransaction();

                $farm->update([
                    'country' => $request->validated()['input_page2_country'],
                    'streetAddress' => $request->validated()['input_page2_streetaddress'],
                    
                    'province_id' => isset($request->validated()['input_page2_province']) ? $request->validated()['input_page2_province'] : null,
                    'city_id' => isset($request->validated()['input_page2_city']) ? $request->validated()['input_page2_city'] : null,
                    'municipality_id' => isset($request->validated()['input_page2_municipality']) ? $request->validated()['input_page2_municipality'] : null,
                    'barangay_id' => isset($request->validated()['input_page2_barangay']) ? $request->validated()['input_page2_barangay'] : null,

                    'landTenurialStatus_id' => $request->validated()['input_page2_landtenurialstatus'],
                    'landTenurialStatus_specify' => isset($request->validated()['input_page2_landtenurialstatus_specify']) ? $request->validated()['input_page2_landtenurialstatus_specify'] : null,

                    'totalRiceArea' => $request->validated()['input_page2_totalricearea'],
                    'totalStressArea' => $request->validated()['input_page2_totalstressarea'],

                    'pp_ds_unc_question1' => $request->validated()['input_page2_pp_ds_unc_question1'],
                    'pp_ds_unc_question2' => $request->validated()['input_page2_pp_ds_unc_question2'],
                    'pp_ds_unc_question3' => $request->validated()['input_page2_pp_ds_unc_question3'],
                    'pp_ds_unc_question4' => $request->validated()['input_page2_pp_ds_unc_question4'],
                    
                    'pp_ds_usc_question1' => $request->validated()['input_page2_pp_ds_usc_question1'],
                    'pp_ds_usc_question2' => $request->validated()['input_page2_pp_ds_usc_question2'],
                    'pp_ds_usc_question3' => $request->validated()['input_page2_pp_ds_usc_question3'],
                    'pp_ds_usc_question4' => $request->validated()['input_page2_pp_ds_usc_question4'],

                    'pp_ws_unc_question1' => $request->validated()['input_page2_pp_ws_unc_question1'],
                    'pp_ws_unc_question2' => $request->validated()['input_page2_pp_ws_unc_question2'],
                    'pp_ws_unc_question3' => $request->validated()['input_page2_pp_ws_unc_question3'],
                    'pp_ws_unc_question4' => $request->validated()['input_page2_pp_ws_unc_question4'],

                    'pp_ws_usc_question1' => $request->validated()['input_page2_pp_ws_usc_question1'],
                    'pp_ws_usc_question2' => $request->validated()['input_page2_pp_ws_usc_question2'],
                    'pp_ws_usc_question3' => $request->validated()['input_page2_pp_ws_usc_question3'],
                    'pp_ws_usc_question4' => $request->validated()['input_page2_pp_ws_usc_question4'],

                    'ecosystem' => $request->validated()['input_page2_ecosystem'],
                    'stressEcosystem' => $request->validated()['input_page2_stressecosystem'],

                    'updid' => Auth::user()->id,
                    'upddt' => Carbon::now(),
                ]);

            DB::commit();

            return back()->with('success', "Farm Information Updated Successfully!");

        } catch (\Exception $ex) 
        {
            DB::rollBack();
            throw $ex;
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Farm $farm)
    {
        //
    }

    public function pdf_farm(Farm $farm)
    {
        $farmer = Farmer::find($farm->farmer_id);

        $provinces = Province::orderBy('code')->get();
        $cities = City::orderBy('code')->get();
        $municipalities = Municipality::orderBy('code')->get();
        $barangays = Barangay::orderBy('code')->get();

        $optionsCivilStatus = PickListItem::CivilStatus()->get();
        $optionsEducation = PickListItem::Education()->get();

        $optionsFrequency = PickListItem::Frequency()->get();
        $optionsIndicatorOfDrought = PickListItem::IndicatorOfDrought()->get();
        $optionsIndicatorOfSalinity = PickListItem::IndicatorOfSalinity()->get();
        $optionsLandTenurialStatus = PickListItem::LandTenurialStatus()->get();
        $optionsMonth = PickListItem::Months()->get();
        $optionsSourceOfFloods = PickListItem::SourceOfFloods()->get();
        $optionsSourceOfIrrigation = PickListItem::SourceOfIrrigation()->get();
         $optionsSourceOfSalinity = PickListItem::SourceOfSalinity()->get();

        // return view('farm.pdf', compact('farm', 'farmer', 'provinces', 'cities', 'municipalities', 'barangays', 'optionsCivilStatus', 'optionsEducation'));
        
        $dompdf = Pdf::loadView('farm.pdf', compact('farm', 'farmer', 'provinces', 'cities', 'municipalities', 'barangays', 'optionsCivilStatus', 'optionsEducation'));

        $dompdf->render();

        return $dompdf->download('farm.pdf');

        // $dompdf->stream(
        //     'file.pdf',
        //     array(
        //       'Attachment' => 0
        //     )
        // );

        // return $dompdf->download('farm.pdf');
    }

    // public function xlsxExportAllFarms()
    // {
    //     $now = Carbon::today()->toDateString();
    //     return Excel::download(new ExportFarms, 'rhp-data-'.$now.'xlsx');
    // }
}
