<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportSurveyRequest;
use App\Http\Requests\SurveyRequest;
use App\Imports\FarmerSurveyImport;
use App\Imports\SurveyImport;
use App\Models\Barangay;
use App\Models\City;
use App\Models\Education;
use App\Models\Farm;
use App\Models\Farm_Extended;
use App\Models\Farmer;
use App\Models\Municipality;
use App\Models\PickList;
use App\Models\PickListItem;
use App\Models\Province;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class SurveyController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::latest()->get();
        $cities = City::latest()->get();
        $municipalities = Municipality::latest()->get();
        $barangays = Barangay::latest()->get();
        
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
    public function store(SurveyRequest $request)
    {

        // dd($request->validated(), $request->hasFile('input_page1_avatar'));

        if($request->hasFile('input_page1_avatar'))
        {
            // GET THE FILENAME WITH THE EXTENSION
            $avatar_filenameext = $request->validated()['input_page1_avatar']->getClientOriginalName();
            // GET THE FILE NAME
            $avatar_filename = pathinfo($avatar_filenameext, PATHINFO_FILENAME);
            // GET THE EXTENSION
            $avatar_fileext = $request->validated()['input_page1_avatar']->getClientOriginalExtension();
            // filename to store to make it more unique
            $avatar_filenametostore = $avatar_filename.'_'.time().'-avatar'.'.'.$avatar_fileext;
            // upload the image to storage/public/event-images
            $path = $request->validated()['input_page1_avatar']->storeAs('public/farmer/avatar', $avatar_filenametostore);
        }

        if($request->hasFile('input_page1_signature'))
        {
            // GET THE FILENAME WITH THE EXTENSION
            $signature_filenameext = $request->validated()['input_page1_signature']->getClientOriginalName();
            // GET THE FILE NAME
            $signature_filename = pathinfo($signature_filenameext, PATHINFO_FILENAME);
            // GET THE EXTENSION
            $signature_fileext = $request->validated()['input_page1_signature']->getClientOriginalExtension();
            // filename to store to make it more unique
            $signature_filenametostore = $signature_filename.'_'.time().'-signature'.'.'.$signature_fileext;
            // upload the image to storage/public/event-images
            $path = $request->validated()['input_page1_signature']->storeAs('public/farmer/signature', $signature_filenametostore);
        }

        

        try 
        {

            DB::beginTransaction();

            $farmer = Farmer::create([

                'profile_img' => $avatar_filenametostore,
                'signature' => $signature_filenametostore,

                'controlNumber' => isset($request->validated()['input_page1_controlnumber']) ? $request->validated()['input_page1_controlnumber'] : null,

                'firstName' => $request->validated()['input_page1_firstname'],
                'lastName' => $request->validated()['input_page1_lastname'],
                'middleName' => isset($request->validated()['input_page1_middlename']) ? $request->validated()['input_page1_middlename'] : null,
                'suffixName' => isset($request->validated()['input_page1_suffix']) ? $request->validated()['input_page1_suffix'] : null,

                'sex' => $request->validated()['input_page1_sex'],
                'dateOfBirth' => $request->validated()['input_page1_dateofbirth'],
                'age' => $request->validated()['input_page1_age'],
                'phoneNumber' => isset($request->validated()['input_page1_phonenumber']) ? $request->validated()['input_page1_phonenumber'] : null,

                'country' => $request->validated()['input_page1_country'],
                'streetAddress' => $request->validated()['input_page1_streetaddress'],
                
                'province_id' => isset($request->validated()['input_page1_province']) ? $request->validated()['input_page1_province'] : null,
                'city_id' => isset($request->validated()['input_page1_city']) ? $request->validated()['input_page1_city'] : null,
                'municipality_id' => isset($request->validated()['input_page1_municipality']) ? $request->validated()['input_page1_municipality'] : null,
                'barangay_id' => isset($request->validated()['input_page1_barangay']) ? $request->validated()['input_page1_barangay'] : null,

                'civilStatus_id' => isset($request->validated()['input_page1_civilstatus']) ? $request->validated()['input_page1_civilstatus'] : null,
                'civilStatus_specify' => isset($request->validated()['input_page1_civilstatus_specify']) ? $request->validated()['input_page1_civilstatus_specify'] : null,
                'education_id' => isset($request->validated()['input_page1_education']) ? $request->validated()['input_page1_education'] : null,
                'education_specify' => isset($request->validated()['input_page1_education_specify']) ? $request->validated()['input_page1_education_specify'] : null,

                'rsbsaReg' => isset($request->validated()['input_page1_rsbsareg']) ? $request->validated()['input_page1_rsbsareg'] : null,
                'rsbsaMembership' => isset($request->validated()['input_page1_rsbsamembership']) ? $request->validated()['input_page1_rsbsamembership'] : null,
                'sourceOfIncome' => isset($request->validated()['input_page1_sourceofincome']) ? $request->validated()['input_page1_sourceofincome'] : null,
                'farmingExperience' => isset($request->validated()['input_page1_farmingexperience']) ? $request->validated()['input_page1_farmingexperience'] : null,

                'initdt' => Carbon::now(),
                'upddt' => Carbon::now(),
                'initid' => Auth::user()->id,
                'updid' => Auth::user()->id,
            ]);

            DB::commit();

            DB::beginTransaction();

            $farm = Farm::create([
                'farmer_id' => $farmer->id,
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

                'initdt' => Carbon::now(),
                'upddt' => Carbon::now(),
                'initid' => Auth::user()->id,
                'updid' => Auth::user()->id,
            ]);

            DB::commit();

            DB::beginTransaction();


            $farm_extended = Farm_Extended::create([
                'farm_id' => $farm->id,

                'page3_source_id' => isset($request->validated()['input_page3_source']) ? $request->validated()['input_page3_source'] : null,
                'page3_source_specify' => isset($request->validated()['input_page3_source_specify']) ? $request->validated()['input_page3_source_specify'] : null,
                'page3_frequency' => isset($request->validated()['input_page3_frequency']) ? $request->validated()['input_page3_frequency'] : null,

                'page3_flashflood_waterlevel' => isset($request->validated()['input_page3_flashflood_waterlevel']) ? $request->validated()['input_page3_flashflood_waterlevel'] : null,
                'page3_flashflood_days' => isset($request->validated()['input_page3_flashflood_days']) ? $request->validated()['input_page3_flashflood_days'] : null,
                'page3_flashflood_hours' => isset($request->validated()['input_page3_flashflood_hours']) ? $request->validated()['input_page3_flashflood_hours'] : null,

                'page3_intermittent_waterlevel' => isset($request->validated()['input_page3_intermittent_waterlevel']) ? $request->validated()['input_page3_intermittent_waterlevel'] : null,
                'page3_intermittent_days' => isset($request->validated()['input_page3_intermittent_days']) ? $request->validated()['input_page3_intermittent_days'] : null,
                'page3_intermittent_hours' => isset($request->validated()['input_page3_intermittent_hours']) ? $request->validated()['input_page3_intermittent_hours'] : null,

                'page3_stagnant_waterlevel' => isset($request->validated()['input_page3_stagnant_waterlevel']) ? $request->validated()['input_page3_stagnant_waterlevel'] : null,
                'page3_stagnant_days' => isset($request->validated()['input_page3_stagnant_days']) ? $request->validated()['input_page3_stagnant_days'] : null,
                'page3_stagnant_hours' => isset($request->validated()['input_page3_stagnant_hours']) ? $request->validated()['input_page3_stagnant_hours'] : null,

                'page3_all_waterlevel' => isset($request->validated()['input_page3_all_waterlevel']) ? $request->validated()['input_page3_all_waterlevel'] : null,
                'page3_all_days' => isset($request->validated()['input_page3_all_days']) ? $request->validated()['input_page3_all_days'] : null,
                'page3_all_hours' => isset($request->validated()['input_page3_all_hours']) ? $request->validated()['input_page3_all_hours'] : null,

                'page3_occurenceofflood_ds_months' => isset($request->validated()['checkbox_page3_occurenceofflood_ds_months']) ? $request->validated()['checkbox_page3_occurenceofflood_ds_months'] : null,
                'page3_occurenceofflood_ds_remarks' => isset($request->validated()['input_page3_occurenceofflood_ds_remarks']) ? $request->validated()['input_page3_occurenceofflood_ds_remarks'] : null,
                'page3_occurenceofflood_ws_months' => isset($request->validated()['checkbox_page3_occurenceofflood_ws_months']) ? $request->validated()['checkbox_page3_occurenceofflood_ws_months'] : null,
                'page3_occurenceofflood_ws_remarks' => isset($request->validated()['input_page3_occurenceofflood_ws_remarks']) ? $request->validated()['input_page3_occurenceofflood_ws_remarks'] : null,

                'page4_source_id' => isset($request->validated()['input_page4_sourceofsalinity']) ? $request->validated()['input_page4_sourceofsalinity'] : null,
                'page4_source_specify' =>  isset($request->validated()['input_page4_sourceofsalinity_specify']) ? $request->validated()['input_page4_sourceofsalinity_specify'] : null,
                'page4_frequency' => isset($request->validated()['input_page4_frequency']) ? $request->validated()['input_page4_frequency'] : null,

                'page4_occurenceofsalinity_ds_months' => isset($request->validated()['checkbox_page4_occurenceofsalinity_ds_months']) ? $request->validated()['checkbox_page4_occurenceofsalinity_ds_months'] : null,
                'page4_occurenceofsalinity_ds_remarks' => isset($request->validated()['input_page4_occurenceofsalinity_ds_remarks']) ? $request->validated()['input_page4_occurenceofsalinity_ds_remarks'] : null,
                'page4_occurenceofsalinity_ws_months' => isset($request->validated()['checkbox_page4_occurenceofsalinity_ws_months']) ? $request->validated()['checkbox_page4_occurenceofsalinity_ws_months'] : null,
                'page4_occurenceofsalinity_ws_remarks' => isset($request->validated()['input_page4_occurenceofsalinity_ws_remarks']) ? $request->validated()['input_page4_occurenceofsalinity_ws_remarks'] : null,

                'page4_checkbox_sourceOfIrrigation' => isset($request->validated()['checkbox_page4_sourceofirrigation']) ? $request->validated()['checkbox_page4_sourceofirrigation'] : null,
                'page4_sourceOfIrrigation_specify' => isset($request->validated()['input_page4_sourceofirrigation_specify']) ? $request->validated()['input_page4_sourceofirrigation_specify'] : null,
                'page4_sourceOfIrrigation_saltfree' => isset($request->validated()['checkbox_page4_sourceofirrigation_saltfree']) ? $request->validated()['checkbox_page4_sourceofirrigation_saltfree'] : null,
                'page4_indicatorofsalinity' => isset($request->validated()['input_page4_indicatorofsalinity']) ? $request->validated()['input_page4_indicatorofsalinity'] : null,
                'page4_indicatorofsalinity_specify' => isset($request->validated()['input_page4_indicatorofsalinity_specify']) ? $request->validated()['input_page4_indicatorofsalinity_specify'] : null,

                'page5_frequency' => isset($request->validated()['input_page5_frequency']) ? $request->validated()['input_page5_frequency'] : null,
                'page5_occurenceofdrought_ds_months' => isset($request->validated()['checkbox_page5_occurenceofdrought_ds_months']) ? $request->validated()['checkbox_page5_occurenceofdrought_ds_months'] : null,
                'page5_occurenceofdrought_ds_remarks' => isset($request->validated()['input_page5_occurenceofdrought_ds_remarks']) ? $request->validated()['input_page5_occurenceofdrought_ds_remarks'] : null,
                'page5_occurenceofdrought_ws_months' => isset($request->validated()['checkbox_page5_occurenceofdrought_ws_months']) ? $request->validated()['checkbox_page5_occurenceofdrought_ws_months'] : null,
                'page5_occurenceofdrought_ws_remarks' => isset($request->validated()['input_page5_occurenceofdrought_ws_remarks']) ? $request->validated()['input_page5_occurenceofdrought_ws_remarks'] : null,

                'page5_checkbox_sourceOfIrrigation' => isset($request->validated()['checkbox_page5_sourceofirrigation']) ? $request->validated()['checkbox_page5_sourceofirrigation'] : null,
                'page5_sourceOfIrrigation_specify' => isset($request->validated()['input_page5_sourceofirrigation_specify']) ? $request->validated()['input_page5_sourceofirrigation_specify'] : null,
                'page5_sourceOfIrrigation_saltfree' => isset($request->validated()['checkbox_page5_sourceofirrigation_saltfree']) ? $request->validated()['checkbox_page5_sourceofirrigation_saltfree'] : null,
                'page5_indicatorofdrought' => isset($request->validated()['input_page5_indicatorofdrought']) ? $request->validated()['input_page5_indicatorofdrought'] : null,
                'page5_indicatorofdrought_specify' => isset($request->validated()['input_page5_indicatorofdrought_specify']) ? $request->validated()['input_page5_indicatorofdrought_specify'] : null,

                'initdt' => Carbon::now(),
                'upddt' => Carbon::now(),
                'initid' => Auth::user()->id,
                'updid' => Auth::user()->id,
            ]);

            DB::commit();

            return back()->with('success', "New Farmer Added Successfully!");

            // if (DB::commit()) {

            //     // session()->flash('success', $farmer->firstName.':Created Successfully');
                
            //     // return response()->json([
            //     //     'success' => true,
            //     //     'message' => $farmer->firstName.': Created Successfully'
            //     // ]);

            //     return back()->with('success', "New Farmer Added Successfully!");
            // }
        } catch (\Exception $ex) 
        {
            DB::rollBack();
            throw $ex;
        }
    
        

        // Request::input();
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Farmer $farmer)
    {
        
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

    public function importSurvey(ImportSurveyRequest $request)
    {
        try {
            Excel::import(new SurveyImport(Auth::user()->id), $request->validated()['input_file']);
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();

            return back()->with('error-import', $failures);
     
            // foreach ($failures as $failure) {
            //     $failure->row(); // row that went wrong
            //     $failure->attribute(); // either heading key (if using heading row concern) or column index
            //     $failure->errors(); // Actual error messages from Laravel validator
            //     $failure->values(); // The values of the row that has failed.
            // }
        }

        return back()->with('success', "Data has been successfully imported");
    }
}
