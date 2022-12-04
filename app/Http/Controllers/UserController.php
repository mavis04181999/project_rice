<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserLoginRequest;
use App\Http\Requests\UpdateUserProfileRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\Barangay;
use App\Models\City;
use App\Models\Municipality;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
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
        $provinces = Province::orderBy('code')->get();
        $cities = City::orderBy('code')->get();
        $municipalities = Municipality::orderBy('code')->get();
        $barangays = Barangay::orderBy('code')->get();

        return view('user.create', compact('provinces', 'cities', 'municipalities', 'barangays'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        
        try 
        {
            DB::beginTransaction();

            if($request->hasFile('input_user_avatar'))
            {
                // GET THE FILENAME WITH THE EXTENSION
                $avatar_filenameext = $request->validated()['input_user_avatar']->getClientOriginalName();
                // GET THE FILE NAME
                $avatar_filename = pathinfo($avatar_filenameext, PATHINFO_FILENAME);
                // GET THE EXTENSION
                $avatar_fileext = $request->validated()['input_user_avatar']->getClientOriginalExtension();
                // filename to store to make it more unique
                $avatar_filenametostore = $avatar_filename.'_'.time().'-avatar'.'.'.$avatar_fileext;
                // upload the image to storage/public/event-images
                $path = $request->validated()['input_user_avatar']->storeAs('public/user/avatar', $avatar_filenametostore);
            }

            if($request->hasFile('input_user_signature'))
            {
                // GET THE FILENAME WITH THE EXTENSION
                $signature_filenameext = $request->validated()['input_user_signature']->getClientOriginalName();
                // GET THE FILE NAME
                $signature_filename = pathinfo($signature_filenameext, PATHINFO_FILENAME);
                // GET THE EXTENSION
                $signature_fileext = $request->validated()['input_user_signature']->getClientOriginalExtension();
                // filename to store to make it more unique
                $signature_filenametostore = $signature_filename.'_'.time().'-signature'.'.'.$signature_fileext;
                // upload the image to storage/public/event-images
                $path = $request->validated()['input_user_signature']->storeAs('public/user/signature', $signature_filenametostore);
            }

            $data  = [
                'profile_img' => isset($request->validated()['input_user_avatar']) ? $avatar_filenametostore : null,
                'signature' => isset($request->validated()['input_user_signature']) ? $signature_filenametostore : null,

                'username' => 'Something here',

                'email' => isset($request->validated()['input_user_email']) ? $request->validated()['input_user_email'] : null,
                'password' => isset($request->validated()['input_user_password']) ? Hash::make($request->validated()['input_user_password']) : '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password

                'firstName' => isset($request->validated()['input_user_firstname']) ? $request->validated()['input_user_firstname'] : null,
                'lastName' => isset($request->validated()['input_user_lastname']) ? $request->validated()['input_user_lastname'] : null,
                'middleName' => isset($request->validated()['input_user_middlename']) ? $request->validated()['input_user_middlename'] : null,
                'suffixName' => isset($request->validated()['input_user_suffix']) ? $request->validated()['input_user_suffix'] : null,
                'dateOfBirth' => isset($request->validated()['input_user_dateofbirth']) ? $request->validated()['input_user_dateofbirth'] : null,

                'role' => isset($request->validated()['input_user_role']) ? $request->validated()['input_user_role'] : null,
                'sex' => isset($request->validated()['input_user_sex']) ? $request->validated()['input_user_sex'] : null,
                'age' => $request->validated()['input_user_age'],

                'phoneNumber' => isset($request->validated()['input_user_phonenumber']) ? $request->validated()['input_user_phonenumber'] : null,
                'country' => isset($request->validated()['input_user_country']) ? $request->validated()['input_user_country'] : null,
                'streetAddress' => isset($request->validated()['input_user_streetaddress']) ? $request->validated()['input_user_streetaddress'] : null,
                'province_id' => isset($request->validated()['input_user_province']) ? $request->validated()['input_user_province'] : null,
                'city_id' => isset($request->validated()['input_user_city']) ? $request->validated()['input_user_city'] : null,
                'municipality_id' => isset($request->validated()['input_user_municipality']) ? $request->validated()['input_user_municipality'] : null,
                'barangay_id' => isset($request->validated()['input_user_barangay']) ? $request->validated()['input_user_barangay'] : null,

                'updid' => Auth::user()->id,
                'upddt' => now(),
            ];

            User::create($data);

            DB::commit();

            return back()->with('success', "new User was Added Successfully!");

        } catch (\Exception $ex) 
        {
            DB::rollBack();
            throw $ex;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $provinces = Province::orderBy('code')->get();
        $cities = City::orderBy('code')->get();
        $municipalities = Municipality::orderBy('code')->get();
        $barangays = Barangay::orderBy('code')->get();
        
        return view('user.edit', compact('user', 'provinces', 'cities', 'municipalities', 'barangays'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        
        try 
        {

            DB::beginTransaction();

            $user->update([
                'firstName' => $request->validated()['input_user_firstname'],
                'lastName' => $request->validated()['input_user_lastname'],
                'middleName' => isset($request->validated()['input_user_middlename']) ? $request->validated()['input_user_middlename'] : null,
                'suffixName' => isset($request->validated()['input_user_suffix']) ? $request->validated()['input_user_suffix'] : null,

                'sex' => $request->validated()['input_user_sex'],
                'dateOfBirth' => $request->validated()['input_user_dateofbirth'],
                'age' => $request->validated()['input_user_age'],
                'phoneNumber' => isset($request->validated()['input_user_phonenumber']) ? $request->validated()['input_user_phonenumber'] : null,

                'country' => $request->validated()['input_user_country'],
                'streetAddress' => $request->validated()['input_user_streetaddress'],
                
                'province_id' => isset($request->validated()['input_user_province']) ? $request->validated()['input_user_province'] : null,
                'city_id' => isset($request->validated()['input_user_city']) ? $request->validated()['input_user_city'] : null,
                'municipality_id' => isset($request->validated()['input_user_municipality']) ? $request->validated()['input_user_municipality'] : null,
                'barangay_id' => isset($request->validated()['input_user_barangay']) ? $request->validated()['input_user_barangay'] : null,

                'updid' => Auth::user()->id,
                'upddt' => now(),
            ]);

            DB::commit();

            return back()->with('success', "User Information was Updated Successfully!");

        } catch (\Exception $ex) 
        {
            DB::rollBack();
            throw $ex;
        }

    }

    public function update_login(UpdateUserLoginRequest $request, User $user)
    {
        
        if ($user->email === $request->validated()['input_user_email'] && $request->validated()['input_user_password'] == null) {

            return back()->with('info', "User Login No Changes were made!");
        }
        
        try 
        {
            DB::beginTransaction();

            $data  = [
                'email' => $request->validated()['input_user_email'],

                'updid' => Auth::user()->id,
                'upddt' => now(),
            ];

            if ($request->validated()['input_user_password'] == null) {

                $user->update($data);
            }
            else
            {
                $password = [
                    'password' => Hash::make($request->validated()['input_user_password'])
                ];
    
                $merge = array_merge($data, $password);
    
                $user->update($merge);
            }

            DB::commit();

            return back()->with('success', "Enumerator Login Information Updated Successfully!");

        } catch (\Exception $ex) 
        {
            DB::rollBack();
            throw $ex;
        }

    }

    public function update_profile(UpdateUserProfileRequest $request, User $user)
    {

        if (is_null($user->profile_img)) 
        {
            if($request->hasFile('input_user_avatar'))
            {
                // GET THE FILENAME WITH THE EXTENSION
                $avatar_filenameext = $request->validated()['input_user_avatar']->getClientOriginalName();
                // GET THE FILE NAME
                $avatar_filename = pathinfo($avatar_filenameext, PATHINFO_FILENAME);
                // GET THE EXTENSION
                $avatar_fileext = $request->validated()['input_user_avatar']->getClientOriginalExtension();
                // filename to store to make it more unique
                $avatar_filenametostore = $avatar_filename.'_'.time().'-avatar'.'.'.$avatar_fileext;
                // upload the image to storage/public/event-images
                $path = $request->validated()['input_user_avatar']->storeAs('public/user/avatar', $avatar_filenametostore);
            }
        }
        else
        {
            
            if($request->hasFile('input_user_avatar'))
            {
                Storage::delete('public/user/avatar/'.$user->profile_img);

                // GET THE FILENAME WITH THE EXTENSION
                $avatar_filenameext = $request->validated()['input_user_avatar']->getClientOriginalName();
                // GET THE FILE NAME
                $avatar_filename = pathinfo($avatar_filenameext, PATHINFO_FILENAME);
                // GET THE EXTENSION
                $avatar_fileext = $request->validated()['input_user_avatar']->getClientOriginalExtension();
                // filename to store to make it more unique
                $avatar_filenametostore = $avatar_filename.'_'.time().'-avatar'.'.'.$avatar_fileext;
                // upload the image to storage/public/event-images
                $path = $request->validated()['input_user_avatar']->storeAs('public/user/avatar', $avatar_filenametostore);
            }
        }

        if (is_null($user->signature)) 
        {
            if($request->hasFile('input_user_signature'))
            {
                // GET THE FILENAME WITH THE EXTENSION
                $signature_filenameext = $request->validated()['input_user_signature']->getClientOriginalName();
                // GET THE FILE NAME
                $signature_filename = pathinfo($signature_filenameext, PATHINFO_FILENAME);
                // GET THE EXTENSION
                $signature_fileext = $request->validated()['input_user_signature']->getClientOriginalExtension();
                // filename to store to make it more unique
                $signature_filenametostore = $signature_filename.'_'.time().'-signature'.'.'.$signature_fileext;
                // upload the image to storage/public/event-images
                $path = $request->validated()['input_user_signature']->storeAs('public/user/signature', $signature_filenametostore);
            }
        } 
        else 
        {
            if($request->hasFile('input_user_signature'))
            {
                Storage::delete('public/user/signature/'.$user->signature);

                // GET THE FILENAME WITH THE EXTENSION
                $signature_filenameext = $request->validated()['input_user_signature']->getClientOriginalName();
                // GET THE FILE NAME
                $signature_filename = pathinfo($signature_filenameext, PATHINFO_FILENAME);
                // GET THE EXTENSION
                $signature_fileext = $request->validated()['input_user_signature']->getClientOriginalExtension();
                // filename to store to make it more unique
                $signature_filenametostore = $signature_filename.'_'.time().'-signature'.'.'.$signature_fileext;
                // upload the image to storage/public/event-images
                $path = $request->validated()['input_user_signature']->storeAs('public/user/signature', $signature_filenametostore);
            }
        }

        try 
        {

            DB::beginTransaction();

            $user->update([
                'profile_img' => empty($avatar_filenametostore) ? $user->profile_img : $avatar_filenametostore,
                'signature' => empty($signature_filenametostore) ? $user->signature : $signature_filenametostore,

                'updid' => Auth::user()->id,
                'upddt' => now(),
            ]);

            DB::commit();

            return back()->with('success', "User Profile Updated Successfully!");

        } catch (\Exception $ex) 
        {
            DB::rollBack();
            throw $ex;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
