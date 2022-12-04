<?php

namespace App\Http\Controllers;

use App\Models\Barangay;
use App\Models\City;
use App\Models\Farm;
use App\Models\Farmer;
use App\Models\Municipality;
use App\Models\PickListItem;
use App\Models\Province;
use App\Models\StressProneArea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnumeratorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('enumerator');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function welcome()
    {
        return view('enumerator.welcome');
    }

    public function form()
    {

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

        return view('enumerator.index', compact('provinces', 'cities', 'municipalities', 'barangays', 'optionsCivilStatus', 'optionsEducation', 'optionsFrequency', 'optionsIndicatorOfDrought', 'optionsIndicatorOfSalinity', 'optionsLandTenurialStatus', 'optionsMonth', 'optionsSourceOfFloods', 'optionsSourceOfIrrigation', 'optionsSourceOfSalinity'));
    }

    public function form2()
    {
        $stressProneAreaDetails = StressProneArea::leftjoin('provinces', 'stresspronearea.province_id', '=', 'provinces.id')
                                    ->select(
                                        'stresspronearea.*',
                                        'provinces.province',
                                        'provinces.code',
                                    )
                                    ->orderBy('province_id')
                                    ->orderBy('barangay_id')->get();

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

        return view('stresspronearea.form', compact('stressProneAreaDetails', 'provinces', 'cities', 'municipalities', 'barangays', 'optionsCivilStatus', 'optionsEducation', 'optionsFrequency', 'optionsIndicatorOfDrought', 'optionsIndicatorOfSalinity', 'optionsLandTenurialStatus', 'optionsMonth', 'optionsSourceOfFloods', 'optionsSourceOfIrrigation', 'optionsSourceOfSalinity'));
    }

    public function dashboard()
    {
        
        $totalFarmers = Farmer::where('deleted_at', null)->count();

        $totalRiceArea = Farm::where('deleted_at', null)->sum('totalRiceArea');
        $totalRiceArea = number_format(round($totalRiceArea, 2), 2, '.', ',');

        $totalStressArea = Farm::where('deleted_at', null)->sum('totalStressArea');
        $totalStressArea = number_format(round($totalStressArea, 2), 2, '.', ',');

        // $totalFarmersRSBSARegistered = Farmer::where('rsbsaReg', 1)
        //                     ->where('deleted_at', null)->count();
        
        $farmers = Farmer::
                        leftjoin('provinces', 'farmers.province_id', '=', 'provinces.id')
                        ->leftjoin('cities', 'farmers.city_id', '=', 'cities.id')
                        ->leftjoin('municipalities', 'farmers.municipality_id', '=', 'municipalities.id')
                        ->leftjoin('barangay', 'farmers.barangay_id', '=', 'barangay.id')
                        ->leftjoin('picklistitem as civilstatus', 'farmers.civilStatus_id', '=', 'civilstatus.id')
                        ->leftjoin('picklistitem as education', 'farmers.education_id', '=', 'education.id')
                    // ->where('farmers.id', '=', 1)
                    ->select(
                        'farmers.*',
                        'provinces.province',
                        'cities.city',
                        'municipalities.municipality',
                        'barangay.barangay',
                        'civilstatus.picklistitem as civilStatusVal',
                        'education.picklistitem as educationVal',
                    )
                    ->get();

        return view('enumerator.dashboard', compact('farmers', 'totalFarmers', 'totalRiceArea', 'totalStressArea'));
    }

    public function map()
    {
        return view('enumerator.map');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
        $enumerator = $user;

        $provinces = Province::orderBy('code')->get();
        $cities = City::orderBy('code')->get();
        $municipalities = Municipality::orderBy('code')->get();
        $barangays = Barangay::orderBy('code')->get();
        
        return view('enumerator.edit', compact('enumerator', 'provinces', 'cities', 'municipalities', 'barangays'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
