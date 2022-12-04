<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateFarmExtendedInformationRequest;
use App\Models\Farm_Extended;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Farm_ExtendedController extends Controller
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
     * @param  \App\Models\Farm_Extended  $farm_Extended
     * @return \Illuminate\Http\Response
     */
    public function show(Farm_Extended $farm_Extended)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Farm_Extended  $farm_Extended
     * @return \Illuminate\Http\Response
     */
    public function edit(Farm_Extended $farm_Extended)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Farm_Extended  $farm_Extended
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFarmExtendedInformationRequest $request, Farm_Extended $farm_Extended)
    {

        $farm_Extended = Farm_Extended::findOrFail($request->validated()['farm_extended_id']);

        try {
            DB::beginTransaction();

                $farm_Extended->update([
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

                    'page5_frequency' => isset($request->validated()['input_page5_frequency']) ? $request->validated()['input_page5_frequency'] : null,
                    'page5_occurenceofdrought_ds_months' => isset($request->validated()['checkbox_page5_occurenceofdrought_ds_months']) ? $request->validated()['checkbox_page5_occurenceofdrought_ds_months'] : null,
                    'page5_occurenceofdrought_ds_remarks' => isset($request->validated()['input_page5_occurenceofdrought_ds_remarks']) ? $request->validated()['input_page5_occurenceofdrought_ds_remarks'] : null,
                    'page5_occurenceofdrought_ws_months' => isset($request->validated()['checkbox_page5_occurenceofdrought_ws_months']) ? $request->validated()['checkbox_page5_occurenceofdrought_ws_months'] : null,
                    'page5_occurenceofdrought_ws_remarks' => isset($request->validated()['input_page5_occurenceofdrought_ws_remarks']) ? $request->validated()['input_page5_occurenceofdrought_ws_remarks'] : null,

                    'page5_checkbox_sourceOfIrrigation' => isset($request->validated()['checkbox_page5_sourceofirrigation']) ? $request->validated()['checkbox_page5_sourceofirrigation'] : null,
                    'page5_sourceOfIrrigation_specify' => isset($request->validated()['input_page5_sourceofirrigation_specify']) ? $request->validated()['input_page5_sourceofirrigation_specify'] : null,
                    'page5_sourceOfIrrigation_saltfree' => isset($request->validated()['checkbox_page5_sourceofirrigation_saltfree']) ? $request->validated()['checkbox_page5_sourceofirrigation_saltfree'] : null,
                    'page5_indicatorofdrought' => isset($request->validated()['input_page5_indicatorofdrought']) ? $request->validated()['input_page5_indicatorofdrought'] : null,

                    'updid' => Auth::user()->id,
                    'upddt' => Carbon::now(),
                ]);

            DB::commit();

            return back()->with('success', "Farm Stress Information Updated Successfully!");

        } catch (\Exception $ex) {

            DB::rollBack();

            throw $ex;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Farm_Extended  $farm_Extended
     * @return \Illuminate\Http\Response
     */
    public function destroy(Farm_Extended $farm_Extended)
    {
        //
    }
}
