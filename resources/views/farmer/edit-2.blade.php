<x-app-layout>
    {{-- <div class="flex flex-col justify-between w-1/5"> --}}
    <div class="flex min-h-screen bg-gray-100">
        {{-- <nav class=" ">
            @include('layouts.navigation-form1')
        </nav> --}}
        {{-- </div> --}}
        <div class="flex flex-col justify-between w-4/5 bg-gray-100">
  
            <section id="form1" class="mb-4">
                <form action="{{route('survey.submit')}}" id="form-edit" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="min-h-screen bg-gray-100">
    
                        {{-- Page:1 --}}
                        <div id="main-div-page1" class="mt-4 mb-4 max-w-7xl mx-auto sm:px-6 lg:px-8">

                            @include('components.messages')
    
                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 bg-white border-b border-gray-200">
    
                                    <div class="px-4 sm:px-0 mb-6">
                                        <h3 class="text-lg font-medium leading-6 text-gray-900 text-center">A. Farmer's Profile</h3>
                                        <p class="mt-1 text-sm text-gray-600 text-center">Personal Information</p>
                                    </div>
    
                                    <div class="px-4 sm:px-0 mb-6">
                                        <hr>
                                    </div>
    
                                    <div class="px-4 sm:px-0 mb-6">
                                        <h3 class="text-md font-bold leading-6 text-gray-900">Farmer</h3>
                                    </div>
    
                                    <div class="grid xl:grid-cols-2 xl:gap-6">
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input name="input_page1_firstname" id="input_page1_firstname" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('input_page1_firstname') }}" required/>
                                            <label for="label_page1_firstname" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First name</label>
                                        </div>
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input name="input_page1_middlename" id="input_page1_middlename" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('input_page1_middlename')}}"/>
                                            <label for="label_page1_middlename" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Middle name or M.I</label>
                                        </div>
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input name="input_page1_lastname" id="input_page1_lastname" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('input_page1_lastname')}}" required/>
                                            <label for="label_page1_lastname" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last name</label>
                                        </div>
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input name="input_page1_suffix" id="input_page1_suffix" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('input_page1_suffix')}}"/>
                                            <label for="label_page1_lastname" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Suffix <small>Ex. ("Jr.", "Sr.", or "III." )</small></label>
                                        </div>
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input name="input_page1_dateofbirth" id="input_page1_dateofbirth" type="date" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('input_page1_dateofbirth')}}" required/>
                                            <label for="label_page1_dateofbirth" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Date of Birth</label>
                                        </div>
                                    </div>
    
                                    <div class="grid xl:grid-cols-2 xl:gap-6">
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input name="input_page1_age" id="input_page1_age" type="number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('input_page1_age')}}" required/>
                                            <label for="label_page1_age" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Age</label>
                                        </div>
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input name="input_page1_phonenumber" id="input_page1_phonenumber" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('input_page1_phonenumber')}}"/>
                                            <label for="label_page1_phoneNumber" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Contact Number <small>(Ex. 09xx-xxxx-xxx)</small></label>
                                        </div>
                                    </div>
    
                                    <div class="grid xl:grid-cols-2 xl:gap-6">
                                        <div class="relative z-0 w-full mb-6 group">
                                            <div class="flex mt-4">
                                                <div class="flex items-center mr-4">
                                                    <input name="input_page1_sex" id="input_page1_sex" type="radio" value="Male"  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ old('input_page1_sex') == "Male" ? 'checked' : '' }} required>
                                                    <label for="label_page1_sex_male" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Male</label>
                                                </div>
                                                <div class="flex items-center mr-4">
                                                    <input name="input_page1_sex" id="input_page1_sex" type="radio" value="Female"  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ old('input_page1_sex') == "Female" ? 'checked' : '' }}>
                                                    <label for="label_page1_sex_female" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Female</label>
                                                </div>
                                            </div>
                                            <label for="label_page1_sex" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Sex</label>
                                        </div>
                                    </div>
                                    
                                    <div class="relative z-0 w-full mb-6 group">
                                        @if ($optionsCivilStatus->count() > 0)
                                            @foreach ($optionsCivilStatus as $civilStatus)
                                            <div class="flex">
                                                <div class="flex items-center mt-4 mr-4">
                                                    <input name="input_page1_civilstatus" id="input_page1_civilstatus_opt{{$civilStatus->position}}" type="radio" value="{{ $civilStatus->id  }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ intval(old('input_page1_civilstatus')) === $civilStatus->id ? 'checked' : '' }}>
                                                    <label for="label_page1_civilstatus_opt{{$civilStatus->position}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{utf8_decode($civilStatus->Picklistitem)}}</label>
                                                </div>
                                                @if ($civilStatus->position === 5)
                                                    <div class="flex items-center mr-4">
                                                        <input name="input_page1_civilstatus_specify" id="input_page1_civilstatus_specify" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Please Specify" value="{{ old('input_page1_civilstatus_specify') }}" {{ empty(old('input_page1_civilstatus_specify')) ? 'disabled' : '' }}/>
                                                    </div>
                                                @endif
                                            </div>
                                            @endforeach
                                        @endif
                                        <label for="label_page1_civilstatus" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Civil Status </label>
                                    </div>
    
                                    <div class="px-4 sm:px-0 mb-6">
                                        <h3 class="text-md font-bold leading-6 text-gray-900">Residential Address (Farmer)</h3>
                                    </div>
    
                                    <div class="grid xl:grid-cols-2 xl:gap-6">
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input name="input_page1_country" id="input_page1_country" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ empty(old('input_page1_country')) ? 'Philippines' : old('input_page1_country') }}" required/>
                                            <label for="label_page1_country" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Country</label>
                                        </div>
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input name="input_page1_streetaddress" id="input_page1_streetaddress" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('input_page1_streetaddress') }}" required/>
                                            <label for="label_page1_streetaddress" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Street Address</label>
                                        </div>

                                        <div class="w-full md:w-3/4 mb-6 md:mb-4">
                                            <label class="block text-sm font-medium text-gray-700">
                                            Province
                                            </label>
                                            <div class="relative mt-2">
                                                <select id="input_page1_province" name="input_page1_province" onchange="selectPage1Province(event)" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                                    <option id="option_page1_province_default" value="default" {{ old('input_page1_province') === 'default' ? 'selected' : ''}}>-- Select Province --</option>
                                                    <optgroup label="Region V">
                                                        @foreach ($provinces as $province)
                                                            <option value="{{ $province->code }}" {{ old('input_page1_province') === $province->code ? 'selected' : ''}}>{{ utf8_decode($province->province) }}</option>
                                                        @endforeach
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="w-full md:w-3/4 mb-6 md:mb-4">
                                            <label class="block text-sm font-medium text-gray-700">
                                            City
                                            </label>
                                            <div class="relative mt-2">
                                                <select id="input_page1_city" name="input_page1_city" onchange="selectPage1City(event)" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" {{ empty(old('input_page1_city')) || old('input_page1_city') === 'default' ? 'disabled' : '' }}>
                                                    <option id="option_page1_city_default" value="default" {{ old('input_page1_city') === 'default' ? 'selected' : '' }} required>-- Select City --</option>
                                                    @if (isset($provinces) && $provinces->count() > 0)
                                                        @foreach ($provinces as $province)
                                                            @if ($province->cities->count() > 0)
                                                            <optgroup id="province-{{ $province->code }}" label="{{$province->province }}">
                                                                @foreach ($province->cities()->get() as $city)
                                                                    <option value="{{$city->code}}" {{ old('input_page1_city') === $city->code ? 'selected' : '' }}>{{ utf8_decode($city->city) }}</option>
                                                                @endforeach
                                                            </optgroup> 
                                                            @endif 
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
    
                                        <div class="w-full md:w-3/4 mb-6 md:mb-4">
                                            <label class="block text-sm font-medium text-gray-700">
                                            Municipality
                                            </label>
                                            <div class="relative mt-2">
                                                <select id="input_page1_municipality" name="input_page1_municipality" onchange="selectPage1Municipality(event)" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" {{ empty(old('input_page1_municipality')) || old('input_page1_municipality') === 'default' ? 'disabled' : '' }} required>
                                                    <option id="option_page1_municipality_default" value="default" {{ old('input_page1_municipality') === 'default' ? 'selected' : '' }}>-- Select Municipality --</option>
                                                    @if (isset($provinces) && $provinces->count() > 0)
                                                        @foreach ($provinces as $province)
                                                            @if ($province->municipalities->count() > 0)
                                                            <optgroup id="province-{{$province->code}}" label="{{$province->province}}">
                                                                @foreach ($province->municipalities()->get() as $municipality)
                                                                    <option value="{{$municipality->code}}" {{ old('input_page1_municipality') === $municipality->code ? 'selected' : '' }}>{{ utf8_decode($municipality->municipality) }}</option>
                                                                @endforeach
                                                            </optgroup> 
                                                            @endif 
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
    
                                        <div class="w-full md:w-3/4 mb-6 md:mb-4">
                                            <label class="block text-sm font-medium text-gray-700">
                                            Barangay
                                            </label>
    
                                            <div class="relative mt-2">
                                                <select id="input_page1_barangay" name="input_page1_barangay" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" {{ empty(old('input_page1_barangay')) || old('input_page1_barangay') === 'default' ? 'disabled' : old('input_page1_barangay') }} required>
                                                <option id="option_page1_barangay_default" value="default" {{ old('input_page1_barangay') === 'default' ? 'selected' : '' }}>-- Select Barangay --</option>
                                                @if (isset($provinces) && $provinces->count() > 0)
                                                    @foreach ($provinces as $province)
                                                        @if ($province->cities()->count() > 0)
                                                            @foreach ($province->cities()->get() as $city)
                                                            @if ($city->barangays()->where('entity_id', 2)->count() > 0)
                                                                <optgroup id="city-{{ $city->code }}" label="{{$city->city}}">
                                                                    @foreach ($city->barangays()->where('entity_id', 2)->get() as $barangay)
                                                                        <option value="{{$barangay->code}}" {{ old('input_page1_barangay') === $barangay->code ? 'selected' : ''}}>{{ utf8_decode($barangay->barangay) }}</option>
                                                                    @endforeach
                                                                </optgroup>
                                                            @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                @endif
    
                                                @if (isset($provinces) && $provinces->count() > 0)
                                                    @foreach ($provinces as $province)
                                                        @if ($province->municipalities()->count() > 0)
                                                            @foreach ($province->municipalities()->get() as $municipality)
                                                            @if ($municipality->barangays()->where('entity_id', 3)->count() > 0)
                                                                <optgroup id="municipality-{{ $municipality->code }}" label=" {{$municipality->municipality}}">
                                                                    @foreach ($municipality->barangays()->where('entity_id', 3)->get() as $barangay)
                                                                        <option value="{{$barangay->code}}" {{ old('input_page1_barangay') === $barangay->code ? 'selected' : ''}}>{{ utf8_decode($barangay->barangay) }}</option>
                                                                    @endforeach
                                                                </optgroup>
                                                            @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="relative z-0 w-full mb-6 group">
                                        @if ($optionsEducation->count() > 0)
                                            @foreach ($optionsEducation as $education)
                                                <div class="flex">
                                                    <div class="flex items-center mt-4 mr-4">
                                                        <input name="input_page1_education" id="input_page1_education_opt{{$education->position}}" type="radio" value="{{$education->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ intval(old('input_page1-education')) === $education->id ? 'checked' : ''}}>
                                                        <label for="label_page1_education_opt{{$education->position}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{utf8_decode($education->Picklistitem)}}</label>
                                                    </div>
                                                    @if ($education->position === 5)
                                                        <div class="flex items-center mr-4">
                                                            <input name="input_page1_education_specify" id="input_page1_education_specify" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Please Specify" value="{{ old('input_page1_education_specify') }}" {{ intval(old('input_page1_education')) === 10 ? '' : 'disabled' }}/>
                                                        </div>
                                                    @endif
                                                </div>
                                            @endforeach
                                        @endif
                                        <label for="label_page1_education" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Educational Attainment</label>
                                    </div>
    
                                    <div class="grid xl:grid-cols-2 xl:gap-6">
                                        <div class="relative z-0 w-full mb-6 group">
                                            <div class="flex mt-4">
                                                <div class="flex items-center mr-4">
                                                    <input name="input_page1_rsbsareg" id="input_page1_rsbsareg_opt1" type="radio" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ intval(old('input_page1_rsbsareg')) === 1 ? 'checked' : ''}}>
                                                    <label for="label_page1_rsbsareg_opt1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300" >Registered</label>
                                                </div>
                                                <div class="flex items-center mr-4">
                                                    <input name="input_page1_rsbsareg" id="input_page1_rsbsareg_opt2" type="radio" value="0" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ intval(old('input_page1_rsbsareg')) === 0 ? 'checked' : ''}}>
                                                    <label for="label_page1_rsbsareg_opt2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300" >Not Registered</label>
                                                </div>
                                            </div>
                                            <label for="label_page1_resbsareg" title="RSBSA Registration (Registry System for Basic Sectors in Agriculture)" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">RSBSA Registration</label>
                                        </div>
    
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input name="input_page1_sourceofincome" id="input_page1_sourceofincome" type="text"  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('input_page1_sourceofincome') }}"/>
                                            <label for="label_page1_sourceofincome" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Major Source of Income <small>(Ex. Farming,Business, Etc.)</small></label>
                                        </div>
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input name="input_page1_rsbsamembership" id="input_page1_rsbsamembership" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('input_page1_rsbsamembership') }}"/>
                                            <label for="label_page1_rsbsamembership" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Membership in any FCA <small>(Farm Credit Association)/Farmers Organization</small></label>
                                        </div>
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input name="input_page1_farmingexperience" id="input_page1_farmingexperience" type="number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('input_page1_farmingexperience') }}"/>
                                            <label for="label_page1_farmingexperience" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Years of Farming Experience</label>
                                        </div>
                                    </div>

                                    <div class="grid xl:grid-cols-2 xl:gap-6">
                                        <div class="relative z-0 w-full mb-6 group">
                                            {{-- <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="small_size">Farmer Avatar/Profile Image</label>
                                            <input class="block mb-5 w-1/2 text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="input_page1_avatar" name="input_page1_avatar" type="file">  --}}

                                            <label class="block text-sm font-medium text-gray-700">Farmer Profile Image</label>
                                            <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                              <div class="space-y-1 text-center">
                                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                  <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <div class="flex text-sm text-gray-600 items-center">
                                                    {{-- <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="small_size">Farmer Avatar/Profile Image</label> --}}
                                                    <input class="block mb-5 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="input_page1_avatar" name="input_page1_avatar" type="file"> 

                                                  {{-- <p class="pl-1">or drag and drop</p> --}}
                                                </div>
                                                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                              </div>
                                            </div>
                                            
                                          </div>
                                        </div>
                                        <div class="relative z-0 w-full mb-6 group">
                                            {{-- <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="small_size">Farmer Avatar/Profile Image</label>
                                            <input class="block mb-5 w-1/2 text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="input_page1_avatar" name="input_page1_avatar" type="file">  --}}

                                            <label class="block text-sm font-medium text-gray-700">Farmer Signature</label>
                                            <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                              <div class="space-y-1 text-center">
                                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                  <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <div class="flex text-sm text-gray-600">
                                                    <input class="block mb-5 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="input_page1_signature" name="input_page1_signature" type="file"> 
                                                  {{-- <p class="pl-1">or drag and drop</p> --}}
                                                </div>
                                                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
  
                      <div class="bg-gray-100">
                          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                              <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                  <div class="p-6 bg-white border-b border-gray-200">
              
                                      <div class="px-4 sm:px-0 mb-6">
                                          <hr>
                                      </div>
              
                                      <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
              
                                  </div>
                              </div>
                          </div>
                      </div>
                      
                  </div>
              </form>
            </section>
          
          {{-- <footer class="mt-auto text-center py-4">
            &copy; Department of Agriculture Regional Field Office 5
          </footer> --}}
        </div>
    </div>
</x-app-layout>

<script>

    function renderExtraPage(event)
    {
        var checkboxSaline = document.querySelector('#input_page2_stressecosystem_opt1');
        var checkboxFlood = document.querySelector('#input_page2_stressecosystem_opt2');
        var checkboxDrought = document.querySelector('#input_page2_stressecosystem_opt3');

        var page3 = document.querySelector('#main-div-page3');
        var page4 = document.querySelector('#main-div-page4');
        var page5 = document.querySelector('#main-div-page5');

            // console.log(checkboxSaline.checked == true);

        if(checkboxSaline.checked == true)
        {
            page3.style.display = "block";
        }
        else
        {
            page3.style.display = "none";
        }

        if(checkboxFlood.checked == true)
        {
            page4.style.display = "block";
        }
        else
        {
            page4.style.display = "none";
        }

        if(checkboxDrought.checked == true)
        {
            page5.style.display = "block";
        }
        else
        {
            page5.style.display = "none";
        }
    }

    function selectPage1Province(event)
    {
        // console.log(event.target);
        var value = event.target.value;
        console.log(value);

        var defaultValue = document.querySelector('#option_page1_province_default').value;
        console.log(defaultValue)

        document.querySelector('#input_page1_city').disabled = true;

        document.querySelector('#input_page1_municipality').disabled = true;
        
        document.querySelector('#input_page1_barangay').disabled = true;

        document.querySelector('#option_page1_city_default').selected = "selected";

        document.querySelector('#option_page1_municipality_default').selected = "selected";

        document.querySelector('#option_page1_barangay_default').selected = "selected";

        if (value !== defaultValue) 
        {
            document.querySelector('#input_page1_city').disabled = false;
               
            document.querySelector('#input_page1_municipality').disabled = false;

            var selectPage1Municipality = document.querySelector('#input_page1_municipality').options;

            var selectPage1City = document.querySelector('#input_page1_city').options; 

            for (let i = 0; i < selectPage1Municipality.length; i++)
            {

                selectPage1Municipality[i].parentElement.hidden = false;
                selectPage1Municipality[i].parentElement.disabled = false;
                selectPage1Municipality[i].hidden = false;
                selectPage1Municipality[i].disabled = false;

                if (i > 0 && selectPage1Municipality[i].parentElement.id !== "province-"+value) {

                    selectPage1Municipality[i].parentElement.hidden = true;
                    selectPage1Municipality[i].parentElement.disabled = true;
                    selectPage1Municipality[i].hidden = true;
                    selectPage1Municipality[i].disabled = true;
                    
                }
            }

            for (let i = 0; i < selectPage1City.length; i++)
            {
                selectPage1City[i].parentElement.hidden = false;
                selectPage1City[i].parentElement.disabled = false;
                selectPage1City[i].hidden = false;
                selectPage1City[i].disabled = false;

                if (i > 0 && selectPage1City[i].parentElement.id !== "province-"+value) {
                    // console.log(selectPage1City[i]);
                    // console.log(selectPage1City[1].parentElement);
                    selectPage1City[i].parentElement.hidden = true;
                    selectPage1City[i].parentElement.disabled = true;
                    selectPage1City[i].hidden = true;
                    selectPage1City[i].disabled = true;
                    
                }
            }
        }
        
    }

    function selectPage1City(event)
    {
        var value = event.target.value;
        console.log("City-"+ value)

        document.querySelector('#option_page1_barangay_default').selected = "selected";

        document.querySelector('#input_page1_municipality').disabled = true;

        if(value === "default")
        {
            document.querySelector('#input_page1_municipality').disabled = false;

        }

        document.querySelector('#input_page1_barangay').disabled = false;

        var selectPage1Barangay = document.querySelector('#input_page1_barangay').options; 

        for (let i = 0; i < selectPage1Barangay.length; i++)
        {
            selectPage1Barangay[i].parentElement.hidden = false;
            selectPage1Barangay[i].parentElement.disabled = false;
            selectPage1Barangay[i].hidden = false;
            selectPage1Barangay[i].disabled = false;

            if (i > 0 && selectPage1Barangay[i].parentElement.id !== "city-"+value) {
                selectPage1Barangay[i].parentElement.hidden = true;
                selectPage1Barangay[i].parentElement.disabled = true;
                selectPage1Barangay[i].hidden = true;
                selectPage1Barangay[i].disabled = true;
                
            }
        }

        
    }



    function selectPage1Municipality(event)
    {
        var value = event.target.value;
        console.log("Municipality-"+ value)

        document.querySelector('#option_page1_barangay_default').selected = "selected";

        document.querySelector('#input_page1_city').disabled = true;

        if(value === "default")
        {
            document.querySelector('#input_page1_city').disabled = false;
        }

        document.querySelector('#input_page1_barangay').disabled = false;

        var selectPage1Barangay = document.querySelector('#input_page1_barangay').options; 

        for (let i = 0; i < selectPage1Barangay.length; i++)
        {
            selectPage1Barangay[i].parentElement.hidden = false;
            selectPage1Barangay[i].parentElement.disabled = false;
            selectPage1Barangay[i].hidden = false;
            selectPage1Barangay[i].disabled = false;

            if (i > 0 && selectPage1Barangay[i].parentElement.id !== "municipality-"+value) {
                selectPage1Barangay[i].parentElement.hidden = true;
                selectPage1Barangay[i].parentElement.disabled = true;
                selectPage1Barangay[i].hidden = true;
                selectPage1Barangay[i].disabled = true;
                
            }
        }
        
    }

    // Page 2
    function selectPage2Province(event)
    {
        // console.log(event.target);
        var value = event.target.value;
        var defaultValue = document.querySelector('#option_page2_province_default').value;


        document.querySelector('#option_page2_city_default').selected = "selected";
        document.querySelector('#option_page2_municipality_default').selected = "selected";
        document.querySelector('#option_page2_barangay_default').selected = "selected";

        document.querySelector('#input_page2_city').disabled = true;   
        document.querySelector('#input_page2_municipality').disabled = true;
        document.querySelector('#input_page2_barangay').disabled = true;


        if (value !== defaultValue) 
        {
            document.querySelector('#input_page2_city').disabled = false;   
            document.querySelector('#input_page2_municipality').disabled = false;

            var selectPage2Municipality = document.querySelector('#input_page2_municipality').options; 

            var selectPage2City = document.querySelector('#input_page2_city').options; 

            for (let i = 0; i < selectPage2Municipality.length; i++)
            {
                selectPage2Municipality[i].parentElement.hidden = false;
                selectPage2Municipality[i].parentElement.disabled = false;
                selectPage2Municipality[i].hidden = false;
                selectPage2Municipality[i].disabled = false;

                if (i > 0 && selectPage2Municipality[i].parentElement.id !== "province-"+value) {
                    // console.log(selectPage2Municipality[i]);
                    // console.log(selectPage2Municipality[1].parentElement);
                    // selectPage2Municipality[i].parentElement.hidden = true;
                    // selectPage2Municipality[i].hidden = true;
                    selectPage2Municipality[i].parentElement.hidden = true;
                    selectPage2Municipality[i].parentElement.disabled = true;
                    selectPage2Municipality[i].hidden = true;
                    selectPage2Municipality[i].disabled = true;
                    
                }
            }

            for (let i = 0; i < selectPage2City.length; i++)
            {
                selectPage2City[i].parentElement.hidden = false;
                selectPage2City[i].parentElement.disabled = false;
                selectPage2City[i].hidden = false;
                selectPage2City[i].disabled = false;

                if (i > 0 && selectPage2City[i].parentElement.id !== "province-"+value) {
                    // console.log(selectPage2City[i]);
                    // console.log(selectPage2City[1].parentElement);
                    selectPage2City[i].parentElement.hidden = true;
                    selectPage2City[i].parentElement.disabled = true;
                    selectPage2City[i].hidden = true;
                    selectPage2City[i].disabled = true;
                    
                }
            }
        }

        
    }

    function selectPage2City(event)
    {
        var value = event.target.value;

        document.querySelector('#option_page2_barangay_default').selected = "selected";

        document.querySelector('#input_page2_municipality').disabled = true;

        if(value === "default")
        {
            document.querySelector('#input_page2_municipality').disabled = false;
        }

        document.querySelector('#input_page2_barangay').disabled = false;

        var selectPage2Barangay = document.querySelector('#input_page2_barangay').options; 

        for (let i = 0; i < selectPage2Barangay.length; i++)
        {
            selectPage2Barangay[i].parentElement.hidden = false;
            selectPage2Barangay[i].parentElement.disabled = false;            
            selectPage2Barangay[i].hidden = false;
            selectPage2Barangay[i].disabled = false;

            if (i > 0 && selectPage2Barangay[i].parentElement.id !== "city-"+value) {
                selectPage2Barangay[i].parentElement.hidden = true;
                selectPage2Barangay[i].parentElement.disabled = true;
                selectPage2Barangay[i].hidden = true;
                selectPage2Barangay[i].disabled = true;
                
            }
        }
    }

    function selectPage2Municipality(event)
    {
        
        var value = event.target.value;

        console.log(value);

        document.querySelector('#option_page2_barangay_default').selected = "selected";

        document.querySelector('#input_page2_city').disabled = true;

        if(value === "default")
        {
            document.querySelector('#input_page2_city').disabled = false;
        }

        document.querySelector('#input_page2_barangay').disabled = false;
        var selectPage2Barangay = document.querySelector('#input_page2_barangay').options; 

        for (let i = 0; i < selectPage2Barangay.length; i++)
        {
            selectPage2Barangay[i].parentElement.hidden = false;
            selectPage2Barangay[i].parentElement.disabled = false;
            selectPage2Barangay[i].hidden = false;
            selectPage2Barangay[i].disabled = false;

            if (i > 0 && selectPage2Barangay[i].parentElement.id !== "municipality-"+value) {
                selectPage2Barangay[i].parentElement.hidden = true;
                selectPage2Barangay[i].parentElement.disabled = true;
                selectPage2Barangay[i].hidden = true;
                selectPage2Barangay[i].disabled = true;
                
            }
        }
    }

</script>

<script>
    var stressEcosystemElements = document.getElementsByName('input_page2_stressecosystem');

    // console.log(stressEcosystemElements);

    stressEcosystemElements.forEach(element => {
        element.addEventListener('click', (event) => {

            var checkboxSaline = document.querySelector('#input_page2_stressecosystem_opt1');
            var checkboxFlood = document.querySelector('#input_page2_stressecosystem_opt2');
            var checkboxDrought = document.querySelector('#input_page2_stressecosystem_opt3');

            var page3 = document.querySelector('#main-div-page3');
            var page4 = document.querySelector('#main-div-page4');
            var page5 = document.querySelector('#main-div-page5');

            // console.log(checkboxSaline.checked == true);

            switch (event.target.value) {
                case '0':
                    page3.style.display = "block";
                    page4.style.display = "none";
                    page5.style.display = "none";

                    break;

                case '1':
                    page3.style.display = "none";
                    page4.style.display = "block";
                    page5.style.display = "none";
                    break;

                case '2':
                    page3.style.display = "none";
                    page4.style.display = "none";
                    page5.style.display = "block"; 
                    break;
            
                default:
                    break;
            }
        })
    });

    var page1EducationElements = document.getElementsByName('input_page1_education');
    
    page1EducationElements.forEach(element => {
        element.addEventListener("click", (event) => {
            
            var value = event.target.value;

            document.querySelector('#input_page1_education_specify').value = '';
            document.querySelector('#input_page1_education_specify').disabled = true;
            

            if (value == 10) // 10: others
            {
                document.querySelector('#input_page1_education_specify').disabled = false;
                document.querySelector('#input_page1_education_specify').focus();
            }
        })
    });

    var page1CivilStatusElements = document.getElementsByName('input_page1_civilstatus');
    
    page1CivilStatusElements.forEach(element => {
        element.addEventListener("click", (event) => {
            
            var value = event.target.value;

            // console.log(value);
            document.querySelector('#input_page1_civilstatus_specify').value = '';
            document.querySelector('#input_page1_civilstatus_specify').disabled = true;

            if (value == 5) // 5: others
            {
                document.querySelector('#input_page1_civilstatus_specify').disabled = false;
                document.querySelector('#input_page1_civilstatus_specify').focus();
            }
        })
    });

    var page2LandTenurialStatus = document.getElementsByName('input_page2_landtenurialstatus');
    
    page2LandTenurialStatus.forEach(element => {
        element.addEventListener("click", (event) => {
            
            var value = event.target.value;

            // console.log(value);
            document.querySelector('#input_page2_landtenurialstatus_specify').value = '';
            document.querySelector('#input_page2_landtenurialstatus_specify').disabled = true;

            if (value == 30) // 30: others
            {
                document.querySelector('#input_page2_landtenurialstatus_specify').disabled = false;
                document.querySelector('#input_page2_landtenurialstatus_specify').focus();
            }
        })
    });

    var checkboxPage3Source = document.querySelector('#input_page3_source_opt5');

    checkboxPage3Source.addEventListener("change", (event) => {
        var value = event.target.value;

        document.querySelector('#input_page3_source_specify').value = '';
        document.querySelector('#input_page3_source_specify').disabled = true;

        if (checkboxPage3Source.checked == true) 
        {
            document.querySelector('#input_page3_source_specify').disabled = false;
            document.querySelector('#input_page3_source_specify').focus();
        }
    });

    var checkboxPage4SourceofSalinity = document.querySelector('#input_page4_sourceofsalinity_opt5');

    checkboxPage4SourceofSalinity.addEventListener("change", (event) => {
        var value = event.target.value;

        document.querySelector('#input_page4_sourceofsalinity_specify').value = '';
        document.querySelector('#input_page4_sourceofsalinity_specify').disabled = true;

        if (checkboxPage4SourceofSalinity.checked == true) 
        {
            document.querySelector('#input_page4_sourceofsalinity_specify').disabled = false;
            document.querySelector('#input_page4_sourceofsalinity_specify').focus();
        }
    });

    function page4SourceOfIrrigation(event, source_id)
    {
        var value = event.target.value;
        var element = event.target;

        if (source_id !== 49) {
            if (element.id === "checkbox_page4_sourceofirrigation_opt5") 
            {

                document.querySelector(`#checkbox_page4_sourceofirrigation_saltfree${source_id}_yes`).checked = false;
                document.querySelector(`#checkbox_page4_sourceofirrigation_saltfree${source_id}_no`).checked = false;

                document.querySelector('#input_page4_sourceofirrigation_specify').disabled = true;
                document.querySelector('#input_page4_sourceofirrigation_specify').value = '';

                if (element.checked === true) 
                {
                    document.querySelector('#input_page4_sourceofirrigation_specify').disabled = false;
                    document.querySelector('#input_page4_sourceofirrigation_specify').focus();

                    document.querySelector(`#checkbox_page4_sourceofirrigation_saltfree${source_id}_yes`).disabled = false;
                    document.querySelector(`#checkbox_page4_sourceofirrigation_saltfree${source_id}_no`).disabled = false;
                    document.querySelector(`#checkbox_page4_sourceofirrigation_saltfree${source_id}_yes`).checked = true;
                }

            }
            else
            {
                document.querySelector(`#checkbox_page4_sourceofirrigation_saltfree${source_id}_yes`).checked = false;
                document.querySelector(`#checkbox_page4_sourceofirrigation_saltfree${source_id}_no`).checked = false;

                if (element.checked == true) 
                {
                    document.querySelector(`#checkbox_page4_sourceofirrigation_saltfree${source_id}_yes`).disabled = false;
                    document.querySelector(`#checkbox_page4_sourceofirrigation_saltfree${source_id}_no`).disabled = false;
                    document.querySelector(`#checkbox_page4_sourceofirrigation_saltfree${source_id}_yes`).checked = true;
                }

            }
        }
    }

    function page5SourceOfIrrigation(event, source_id)
    {
        var value = event.target.value;
        var element = event.target;

        if (source_id !== 49) {
            if (element.id === "checkbox_page5_sourceofirrigation_opt5") 
            {

                document.querySelector(`#checkbox_page5_sourceofirrigation_saltfree${source_id}_yes`).checked = false;
                document.querySelector(`#checkbox_page5_sourceofirrigation_saltfree${source_id}_no`).checked = false;
                document.querySelector('#input_page5_sourceofirrigation_specify').disabled = true;
                document.querySelector('#input_page5_sourceofirrigation_specify').value = '';

                if (element.checked === true) 
                {
                    document.querySelector('#input_page5_sourceofirrigation_specify').disabled = false;
                    document.querySelector('#input_page5_sourceofirrigation_specify').focus();

                    document.querySelector(`#checkbox_page5_sourceofirrigation_saltfree${source_id}_yes`).disabled = false;
                    document.querySelector(`#checkbox_page5_sourceofirrigation_saltfree${source_id}_no`).disabled = false;
                    document.querySelector(`#checkbox_page5_sourceofirrigation_saltfree${source_id}_yes`).checked = true;
                }

            }
            else
            {
                document.querySelector(`#checkbox_page5_sourceofirrigation_saltfree${source_id}_yes`).checked = false;
                document.querySelector(`#checkbox_page5_sourceofirrigation_saltfree${source_id}_no`).checked = false;

                if (element.checked == true) 
                {
                    document.querySelector(`#checkbox_page5_sourceofirrigation_saltfree${source_id}_yes`).disabled = false;
                    document.querySelector(`#checkbox_page5_sourceofirrigation_saltfree${source_id}_no`).disabled = false;
                    document.querySelector(`#checkbox_page5_sourceofirrigation_saltfree${source_id}_yes`).checked = true;
                }

            }
        }
    }

    function page3FloodTypeCheckBox(event, source) {
        var element = event.target;

        document.querySelector(`#input_page3_${source}_waterlevel`).disabled = true;
        document.querySelector(`#input_page3_${source}_days`).disabled = true;
            document.querySelector(`#input_page3_${source}_hours`).disabled = true;

        if (element.checked === true) {
            document.querySelector(`#input_page3_${source}_waterlevel`).disabled = false;
            document.querySelector(`#input_page3_${source}_waterlevel`).focus();
            document.querySelector(`#input_page3_${source}_days`).disabled = false;
            document.querySelector(`#input_page3_${source}_hours`).disabled = false;

        }
    }

</script>

<script>

    

</script>