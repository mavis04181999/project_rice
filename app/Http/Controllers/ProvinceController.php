<?php

namespace App\Http\Controllers;

use App\Models\Barangay;
use App\Models\City;
use App\Models\Municipality;
use App\Models\PickListItem;
use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
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
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function show(Province $province)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function edit(Province $province)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Province $province)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function destroy(Province $province)
    {
        //
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

        return view('province.form', compact('provinces', 'cities', 'municipalities', 'barangays', 'optionsCivilStatus', 'optionsEducation', 'optionsFrequency', 'optionsIndicatorOfDrought', 'optionsIndicatorOfSalinity', 'optionsLandTenurialStatus', 'optionsMonth', 'optionsSourceOfFloods', 'optionsSourceOfIrrigation', 'optionsSourceOfSalinity'));
    }
}
