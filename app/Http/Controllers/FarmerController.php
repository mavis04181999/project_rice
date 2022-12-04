<?php

namespace App\Http\Controllers;

use App\Exports\ExportFarmers;
use App\Exports\ExportSelectedFarmers;
use App\Exports\FarmerExport;
use App\Http\Requests\SelectedFarmersRequest;
use App\Http\Requests\UpdateFarmerProfileRequest;
use App\Http\Requests\UpdateFarmerRequest;
use App\Models\Barangay;
use App\Models\City;
use App\Models\Farm;
use App\Models\Farm_Extended;
use App\Models\Farmer;
use App\Models\Municipality;
use App\Models\PickListItem;
use App\Models\Province;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use SebastianBergmann\Exporter\Exporter;

class FarmerController extends Controller
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
    public function store(Request $request, Farmer $farmer)
    {
        // dd($request, $farmer);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function show(Farmer $farmer)
    {

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
        
        $farmer = Farmer::where('farmers.id', $farmer->id)
                        ->leftjoin('provinces', 'farmers.province_id', '=', 'provinces.id')
                        ->leftjoin('cities', 'farmers.city_id', '=', 'cities.id')
                        ->leftjoin('municipalities', 'farmers.municipality_id', '=', 'municipalities.id')
                        ->leftjoin('barangay', 'farmers.barangay_id', '=', 'barangay.id')
                        ->leftjoin('picklistitem as civilstatus', 'farmers.civilStatus_id', '=', 'civilstatus.id')
                        ->leftjoin('picklistitem as education', 'farmers.education_id', '=', 'education.id')
                    ->select
                    (
                        'farmers.*',
                        'provinces.province',
                        'cities.city',
                        'municipalities.municipality',
                        'barangay.barangay',
                        'civilstatus.picklistitem as civilStatusVal',
                        'education.picklistitem as educationVal',
                    )
                    ->first();

        $farms = Farm::where('farmer_id', $farmer->id)
                    ->leftjoin('provinces', 'farms.province_id', '=', 'provinces.id')
                    ->leftjoin('cities', 'farms.city_id', '=', 'cities.id')
                    ->leftjoin('municipalities', 'farms.municipality_id', '=', 'municipalities.id')
                    ->leftjoin('barangay', 'farms.barangay_id', '=', 'barangay.id')
                    ->leftjoin('picklistitem as landtenurialstatus', 'farms.landTenurialStatus_id', '=', 'landtenurialstatus.id')
                ->select
                (
                    'farms.*',
                    'provinces.province',
                    'cities.city',
                    'municipalities.municipality',
                    'barangay.barangay',
                    'landtenurialstatus.picklistitem as landtenurialstatusVal',
                )
                ->get();

        // dd($optionsSourceOfIrrigation->count() > 0, $farms[0]->farm_extended->page4_checkbox_sourceOfIrrigation->count());

        return view('farmer.show', compact('farmer', 'farms', 'optionsSourceOfFloods', 'optionsFrequency', 'optionsMonth', 'optionsSourceOfSalinity', 'optionsSourceOfIrrigation', 'optionsIndicatorOfSalinity', 'optionsIndicatorOfDrought'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function edit(Farmer $farmer)  
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
        
        $farmer = Farmer::where('farmers.id', $farmer->id)
                        ->leftjoin('provinces', 'farmers.province_id', '=', 'provinces.id')
                        ->leftjoin('cities', 'farmers.city_id', '=', 'cities.id')
                        ->leftjoin('municipalities', 'farmers.municipality_id', '=', 'municipalities.id')
                        ->leftjoin('barangay', 'farmers.barangay_id', '=', 'barangay.id')
                        ->leftjoin('picklistitem as civilstatus', 'farmers.civilStatus_id', '=', 'civilstatus.id')
                        ->leftjoin('picklistitem as education', 'farmers.education_id', '=', 'education.id')
                    ->select
                    (
                        'farmers.*',
                        'provinces.province',
                        'cities.city',
                        'municipalities.municipality',
                        'barangay.barangay',
                        'civilstatus.picklistitem as civilStatusVal',
                        'education.picklistitem as educationVal',
                    )
                    ->first();

                    return view('farmer.edit', compact('farmer', 'provinces', 'cities', 'municipalities', 'barangays', 'optionsEducation', 'optionsCivilStatus', 'optionsLandTenurialStatus', 'optionsSourceOfFloods', 'optionsFrequency', 'optionsMonth', 'optionsSourceOfSalinity', 'optionsSourceOfIrrigation', 'optionsIndicatorOfSalinity', 'optionsIndicatorOfDrought'));
    }

    public function update_profile(UpdateFarmerProfileRequest $request, Farmer $farmer)
    {

        if (is_null($farmer->profile_img)) 
        {
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
        }
        else
        {
            
            if($request->hasFile('input_page1_avatar'))
            {
                Storage::delete('public/farmer/avatar/'.$farmer->profile_img);

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
        }

        if (is_null($farmer->signature)) 
        {
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
        } 
        else 
        {
            if($request->hasFile('input_page1_signature'))
            {
                Storage::delete('public/farmer/signature/'.$farmer->signature);

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
        }

        try 
        {

            DB::beginTransaction();

            $farmer->update([
                'profile_img' => empty($avatar_filenametostore) ? $farmer->profile_img : $avatar_filenametostore,
                'signature' => empty($signature_filenametostore) ? $farmer->signature : $signature_filenametostore,

                'updid' => Auth::user()->id,
                'upddt' => Carbon::now(),
            ]);

            DB::commit();

            return back()->with('success', "Farmer Profile Updated Successfully!");

        } catch (\Exception $ex) 
        {
            DB::rollBack();
            throw $ex;
        }
    }

    public function update(UpdateFarmerRequest $request, Farmer $farmer)
    {
        
        try 
        {

            DB::beginTransaction();

            $farmer->update([

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

                'updid' => Auth::user()->id,
                'upddt' => Carbon::now(),
            ]);

            DB::commit();

            return back()->with('success', "Farmer Information Updated Successfully!");

        } catch (\Exception $ex) 
        {
            DB::rollBack();
            throw $ex;
        }


    }

    public function xlsxExportSelectedFarmers(SelectedFarmersRequest $request)
    {
        $selectedFarmers = explode(",", $request->validated()['selected-farmers']);

        return (new ExportSelectedFarmers($selectedFarmers))->download('rhp-selected-data.xlsx', \Maatwebsite\Excel\Excel::XLSX);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Farmer $farmer)
    {

        // dd($farmer->farms()->withTrashed()->get());

        $farmer->delete();

        return redirect()->route('enumerator.dashboard')
            ->with('message', 'Farmer Deleted Successfully. <a class="btn btn-sm btn-warning" href="'.route('farmer.restore',  ['farmer_id' => $farmer->id]).'">Whoops, Undo</a>');

    }

    public function restore(int $farmer_id)
    {
        $farmer = Farmer::withTrashed()->find($farmer_id);

        if ($farmer && $farmer->trashed())
        {
            $farms = $farmer->farms()->withTrashed()->get();

            if ($farms->count() > 0 ) 
            {
                foreach ($farms as $key => $farm) 
                {
                    $farm_extended = $farm->farm_extended()->withTrashed()->first();

                    if ($farm_extended && $farm_extended->trashed()) 
                    {
                        $farm_extended->restore();
                    }

                    $farm->restore();
                }
            }

            $farmer->restore();
        }

        // if ($farmer && $farmer->trashed()) 
        // {
        //     $farms = Farm::withTrashed()->where('farmer_id', $farmer->id)->get();

        //     if ($farms->count() > 0) {
                
        //         foreach ($farms as $key => $farm) 
        //         {
        //             if($farm->trashed())
        //             {
        //                 $farm_ext = Farm_Extended::withTrashed()->where('farm_id', $farm->id)->first();
                        
        //                 if ($farm_ext && $farm_ext->trashed()) 
        //                 {
        //                     $farm_ext->restore();
        //                 }
        //             }

        //             $farm->restore();
        //         }
        //     }

        //     $farmer->restore();
        // }
        
        
        
        // // $farmer = Farmer::withTrashed()->find($farmer_id);

        // // if ($farmer && $farmer->trashed()) {
        // //     $farm = Farm::withTrash()->where('farmer_id', $farmer->id);
        // //     $farmer->restore();

        // // }

        return redirect()->route('enumerator.dashboard')->with('success', 'Farmer restored successfully');
    }

    public function xlsxExportAllFarmers()
    {
        return (new ExportFarmers)->download('rhp-data.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }
    

    public function archive()
    {
        $farmers = Farmer::onlyTrashed()
                        ->leftjoin('provinces', 'farmers.province_id', '=', 'provinces.id')
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

        return view('farmer.archive', compact('farmers'));
    }

    
}
