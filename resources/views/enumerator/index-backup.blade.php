<x-app-layout>
    {{-- <div class="flex flex-col justify-between w-1/5"> --}}
    <div class="flex min-h-screen bg-gray-100">
        {{-- <nav class=" ">
            @include('layouts.navigation-form1')
        </nav> --}}
        {{-- </div> --}}
        <div class="flex flex-col justify-between w-4/5 bg-gray-100">
  
            <section id="form1" class="mb-4">
                <form action="{{ route('survey.submit') }}" id="form-create" method="POST" enctype="multipart/form-data">
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
                                                            <option value="{{ $province->id }}" {{ old('input_page1_province') == $province->id ? 'selected' : ''}}>
                                                                {{ utf8_decode ($province->province) }}
                                                            </option>
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
                                                            <optgroup id="province-{{ $province->id }}" label="{{$province->province }}" {{ old('input_page1_province') == $province->id ? '' : 'hidden'}}>
                                                                @foreach ($province->cities()->get() as $city)
                                                                    <option value="{{$city->id}}" {{ old('input_page1_city') == $city->id ? 'selected' : '' }}>
                                                                        {{ utf8_decode($city->city) }}
                                                                    </option>
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
                                                            <optgroup id="province-{{$province->id}}" label="{{$province->province}}" {{ old('input_page1_province') == $province->id ? '' : 'hidden'}}>
                                                                @foreach ($province->municipalities()->get() as $municipality)
                                                                    <option value="{{$municipality->id}}" {{ old('input_page1_municipality') == $municipality->id ? 'selected' : '' }}>{{ utf8_decode($municipality->municipality) }}</option>
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
                                                                <optgroup id="city-{{ $city->id }}" label="{{$city->city}}" {{ old('input_page1_city') == $city->id ? '' : 'hidden' }}>
                                                                    @foreach ($city->barangays()->where('entity_id', 2)->get() as $barangay)
                                                                        <option value="{{$barangay->id}}" {{ old('input_page1_barangay') === $barangay->id ? 'selected' : ''}}>{{ utf8_decode($barangay->barangay) }}</option>
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
                                                                <optgroup id="municipality-{{ $municipality->id }}" label=" {{$municipality->municipality}}" {{ old('input_page1_municipality') == $municipality->id ? '' : 'hidden' }}>
                                                                    @foreach ($municipality->barangays()->where('entity_id', 3)->get() as $barangay)
                                                                        <option value="{{$barangay->id}}" {{ old('input_page1_barangay') === $barangay->id ? 'selected' : ''}}>
                                                                            {{ utf8_decode($barangay->barangay) }}
                                                                        </option>
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
                                                <div class="flex text-sm text-gray-600">
                                                    <input class="block mb-5 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="input_page1_avatar" name="input_page1_avatar" type="file"> 
                                                  {{-- <p class="pl-1">or drag and drop</p> --}}
                                                </div>
                                                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
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
    
                        {{-- Page:2 --}}
                        <div class="mb-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 bg-white border-b border-gray-200">
                                <div class="px-4 sm:px-0 mb-6">
                                        <h3 class="text-lg font-medium leading-6 text-gray-900 text-center">B. Farm Information</h3>
                                        <p class="mt-1 text-sm text-gray-600 text-center"></p>
                                    </div>
            
                                    <hr>
                                    <br>
            
                                    <div class="px-4 sm:px-0 mb-6">
                                        <h3 class="text-md font-bold leading-6 text-gray-900">Residential Address (Farm)</h3>
                                    </div>
            
                                    <div class="grid xl:grid-cols-2 xl:gap-6">
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input name="input_page2_country" id="input_page2_country" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ empty(old('input_page2_country')) ? 'Philippines' : old('input_page2_country') }}" required/>
                                            <label for="label_page2_country" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Country</label>
                                        </div>
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input name="input_page2_streetaddress" id="input_page2_streetaddress" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('input_page2_streetaddress') }}" required/>
                                            <label for="label_page2_streetaddress" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Street Address</label>
                                        </div>
                                        <div class="w-full md:w-3/4 mb-6 md:mb-4">
                                            <label class="block text-sm font-medium text-gray-700">
                                                Province
                                            </label>
                                            <div class="relative mt-2">
                                                <select id="input_page2_province" name="input_page2_province" onchange="selectPage2Province(event)" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                                <option selected id="option_page2_province_default" value="default">-- Select Province --</option>
                                                <optgroup label="Region V">
                                                    @foreach ($provinces as $province)
                                                        <option value="{{ $province->id }}" {{ old('input_page2_province') === $province->id ? 'selected' : ''}}>{{ utf8_decode($province->province) }}</option>
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
                                                <select id="input_page2_city" name="input_page2_city" onchange="selectPage2City(event)" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" {{ empty(old('input_page2_city')) || old('input_page2_city') === 'default' ? 'disabled' : ''}} required>
                                                <option id="option_page2_city_default" value="default" {{ empty(old('input_page2_city')) || old('input_page2_city') === 'default' ? 'selected' : ''}}>-- Select City --</option>
                                                @if (isset($provinces) && $provinces->count() > 0)
                                                    @foreach ($provinces as $province)
                                                        @if ($province->cities->count() > 0)
                                                        <optgroup id="province-{{$province->id}}" label="{{$province->province}}" {{ old('input_page2_province') === $province->id ? '' : 'hidden'}}>
                                                            @foreach ($province->cities()->get() as $city)
                                                                <option value="{{ $city->id }}" {{ old('input_page2_city') === $city->id ? 'selected' : ''}}>{{ utf8_decode($city->city) }}</option>
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
                                                <select id="input_page2_municipality" name="input_page2_municipality" onchange="selectPage2Municipality(event)" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" {{ empty(old('input_page2_municipality')) || old('input_page2_municipality') === 'default' ? 'disabled' : ''}} required>
                                                    <option id="option_page2_municipality_default" value="default" {{ empty(old('input_page2_municipality')) || old('input_page2_municipality') === 'default' ? 'selected' : ''}}>-- Select Municipality --</option>
                                                    @if (isset($provinces) && $provinces->count() > 0)
                                                        @foreach ($provinces as $province)
                                                            @if ($province->municipalities->count() > 0)
                                                            <optgroup id="province-{{$province->id}}" label="{{$province->province}}" {{ old('input_page2_province') === $province->id ? '' : 'hidden' }}>
                                                                @foreach ($province->municipalities()->get() as $municipality)
                                                                    <option value="{{ $municipality->id }}" {{ old('input_page2_municipality') === $municipality->id ? 'selected' : ''}}>{{ utf8_decode($municipality->municipality) }}</option>
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
                                                <select id="input_page2_barangay" name="input_page2_barangay" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" {{ empty(old('input_page2_barangay')) || old('input_page2_barangay') === 'default' ? 'disabled' : ''}} required>
                                                    <option id="option_page2_barangay_default" value="default" {{ empty(old('input_page2_barangay')) || old('input_page2_barangay') === 'default' ? 'selected' : ''}}>-- Select Barangay --</option>
                                                    @if (isset($provinces) && $provinces->count() > 0)
                                                        @foreach ($provinces as $province)
                                                            @if ($province->cities()->count() > 0)
                                                                @foreach ($province->cities()->get() as $city)
                                                                @if ($city->barangays()->where('entity_id', 2)->count() > 0)
                                                                <optgroup id="city-{{$city->id}}" label="{{$city->city}}" {{ old('input_page2_city') === $city->id ? '' : 'hidden'}}>
                                                                    @foreach ($city->barangays()->where('entity_id', 2)->get() as $barangay)
                                                                        <option value="{{$barangay->id}}" {{ old('input_page2_barangay') === $barangay->id ? 'selected' : ''}}>{{ utf8_decode($barangay->barangay) }}</option>
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
                                                                    <optgroup id="municipality-{{$municipality->id}}" label="{{$municipality->municipality}}" {{ old('input_page2_municipality') === $municipality->id ? '' : 'hidden'}}>
                                                                        @foreach ($municipality->barangays()->where('entity_id', 3)->get() as $barangay)
                                                                        <option value="{{$barangay->id}}" {{ old('input_page1_barangay') === $barangay->id ? 'selected' : ''}}>{{ utf8_decode($barangay->barangay) }}</option>
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
                                            @if ($optionsLandTenurialStatus->count() > 0)
                                                @foreach ($optionsLandTenurialStatus as $landTenurialStatus)
                                                <div class="flex">
                                                    <div class="flex items-center mt-4 mr-4">
                                                        <input name="input_page2_landtenurialstatus" id="input_page2_landtenurialstatus_opt{{$landTenurialStatus->position}}" type="radio" value="{{$landTenurialStatus->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ intval(old('input_page2_landtenurialstatus')) === $landTenurialStatus->id ? 'checked' : '' }} required>
                                                        <label for="input_page2_landtenurialstatus_opt{{$landTenurialStatus->position}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{utf8_decode($landTenurialStatus->Picklistitem)}}</label>
                                                    </div>
                                                    @if ($landTenurialStatus->position === 4)
                                                        <div class="flex items-center mr-4">
                                                            <input name="input_page2_landtenurialstatus_specify" id="input_page2_landtenurialstatus_specify" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Please Specify" value="{{ old('input_page2_landtenurialstatus_specify') }}" {{ intval(old('input_page2_landtenurialstatus')) === 30 ? '' : 'disabled' }}/>
                                                        </div>                                                    
                                                    @endif
                                                </div>
                                                @endforeach
                                            @endif
                                        <label for="label_page2_landtenurialstatus" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Land Tenurial Status</label>
                                    </div>
            
                                    <div class="grid xl:grid-cols-2 xl:gap-6">
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input name="input_page2_totalricearea" id="input_page2_totalricearea" type="number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " min="0" value="{{ intval(old('inut_page2_totalricearea')) }}" step="any" required/>
                                            <label for="label_page2_totalricearea" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Total Rice Area Including Stress Area (Ha)</label>
                                        </div>
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input name="input_page2_totalstressarea" id="input_page2_totalstressarea" type="number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " min="0" value="{{ intval(old('input_page2_totalstressarea')) }}" step="any" required/>
                                            <label for="label_page2_totalstressarea" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Total Stress Area:</label>
                                        </div>
                                    </div>
            
                                    <div class="px-4 sm:px-0 mb-6">
                                        <h3 class="text-md font-bold leading-6 text-gray-900">Production of Palay under Normal Condition during Dry Season (September 15 - March 15)</h3>
                                    </div>
            
                                    <div class="grid xl:grid-cols-2 xl:gap-6">
                                        <div class="relative z-0 w-full mb-6 group center">
                                            <input type="number" name="input_page2_pp_ds_unc_question1" id="input_page2_pp_ds_unc_question1" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " min="0" value="{{ intval(old('input_page2_pp_ds_unc_question1')) }}" step="any" required/>
                                            <label for="label_page2_pp_ds_unc_question1" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">1. Average Yield based on Actual Area(Bag/Ha)</label>
                                        </div>
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="number" name="input_page2_pp_ds_unc_question2" id="input_page2_pp_ds_unc_question2" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " min="0" value="{{ intval(old('input_page2_pp_ds_unc_question2')) }}" step="any" required/>
                                            <label for="label_page2_pp_ds_unc_question2" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">2. Average Yield of Palay (Kg/Bag)</label>
                                        </div>
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="number" name="input_page2_pp_ds_unc_question3" id="input_page2_pp_ds_unc_question3" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " min="0" value="{{ intval(old('input_page2_pp_ds_unc_question3')) }}" step="any" required/>
                                            <label for="label_page2_pp_ds_unc_question3" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">3. Production Cost (PHP 0.00)</label>
                                        </div>
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="number" name="input_page2_pp_ds_unc_question4" id="input_page2_pp_ds_unc_question4" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " min="0" value="{{ intval(old('input_page2_pp_ds_unc_question4')) }}" step="any" required/>
                                            <label for="label_page2_pp_ds_unc_question4" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">4. Price of Palay per Kg (PHP 0.00)</label>
                                        </div>
                                    </div>
            
                                    <div class="px-4 sm:px-0 mb-6">
                                        <h3 class="text-md font-bold leading-6 text-gray-900">Production of Palay under Stress Condition during Dry Season (September 15 - March 15)</h3>
                                    </div>
            
                                    <div class="grid xl:grid-cols-2 xl:gap-6">
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="number" name="input_page2_pp_ds_usc_question1" id="input_page2_pp_ds_usc_question1" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " min="0" value="{{ intval(old('input_page2_pp_ds_usc_question1')) }}" step="any" required/>
                                            <label for="label_page2_pp_ds_usc_question1" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Average Yield based on Actual Area (Bag/Ha)</label>
                                        </div>
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="number" name="input_page2_pp_ds_usc_question2" id="input_page2_pp_ds_usc_question2" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " min="0" value="{{ intval(old('input_page2_pp_ds_usc_question2')) }}" step="any" required/>
                                            <label for="input_page2_pp_ds_usc_question2" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Average Yield of Palay (Kg/Bag)</label>
                                        </div>
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="number" name="input_page2_pp_ds_usc_question3" id="input_page2_pp_ds_usc_question3" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " min="0" value="{{ intval(old('input_page2_pp_ds_usc_question3')) }}" step="any" required/>
                                            <label for="input_page2_pp_ds_usc_question3" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Production Cost (PHP 0.00)</label>
                                        </div>
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="number" name="input_page2_pp_ds_usc_question4" id="input_page2_pp_ds_usc_question4" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " min="0" value="{{ intval(old('input_page2_pp_ds_usc_question4')) }}" step="any" required/>
                                            <label for="input_page2_pp_ds_usc_question4" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Price of Palay per Kg (PHP 0.00)</label>
                                        </div>
                                    </div>
            
                                    <div class="px-4 sm:px-0 mb-6">
                                        <h3 class="text-md font-bold leading-6 text-gray-900">Production of Palay under Normal Condition during Wet Season (March 16 - September 14)</h3>
                                    </div>
            
                                    <div class="grid xl:grid-cols-2 xl:gap-6">
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input name="input_page2_pp_ws_unc_question1" id="input_page2_pp_ws_unc_question1" type="number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " min="0" value="{{ intval(old('input_page2_pp_ws_unc_question1')) }}" step="any" required/>
                                            <label for="label_page2_pp_ws_unc_question1" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Average Yield based on Actual Area(Bag/Ha)</label>
                                        </div>
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="number" name="input_page2_pp_ws_unc_question2" id="input_page2_pp_ws_unc_question2" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " min="0" value="{{ intval(old('input_page2_pp_ws_unc_question2')) }}" step="any" required/>
                                            <label for="label_page2_pp_ws_unc_question2" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Average Yield of Palay(Kg/Bag)</label>
                                        </div>
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="number" name="input_page2_pp_ws_unc_question3" id="input_page2_pp_ws_unc_question3" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " min="0" value="{{ intval(old('input_page2_pp_ws_unc_question3')) }}" step="any" required/>
                                            <label for="label_page2_pp_ws_unc_question3" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Production Cost (PHP 0.00)</label>
                                        </div>
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="number" name="input_page2_pp_ws_unc_question4" id="input_page2_pp_ws_unc_question4" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " min="0" value="{{ intval(old('input_page2_pp_ws_unc_question4')) }}" step="any" required/>
                                            <label for="label_page2_pp_ws_unc_question4" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Price of Palay per Kg (PHP 0.00)</label>
                                        </div>
                                    </div>
            
                                    <div class="px-4 sm:px-0 mb-6">
                                        <h3 class="text-md font-bold leading-6 text-gray-900">Production of Palay under Stress Condition during Wet Season (September 15 - March 15)</h3>
                                    </div>
            
                                    <div class="grid xl:grid-cols-2 xl:gap-6">
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="number" name="input_page2_pp_ws_usc_question1" id="input_page2_pp_ws_usc_question1" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " min="0" value="{{ intval(old('input_page2_pp_ws_usc_question1')) }}" step="any" required/>
                                            <label for="label_page2_pp_ws_usc_question1" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Average Yield based on Actual Area (Bag/Ha)</label>
                                        </div>
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input name="input_page2_pp_ws_usc_question2" id="input_page2_pp_ws_usc_question2" type="number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " min="0" value="{{ intval(old('input_page2_pp_ws_usc_question2')) }}" step="any" required/>
                                            <label for="label_page2_pp_ws_usc_question2" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Average Yield of Palay (Kg/Bag)</label>
                                        </div>
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="number" name="input_page2_pp_ws_usc_question3" id="input_page2_pp_ws_usc_question3" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " min="0" value="{{ intval(old('input_page2_pp_ws_usc_question3')) }}" step="any" required/>
                                            <label for="input_page2_pp_ws_usc_question3" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Production Cost (PHP 0.00)</label>
                                        </div>
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="number" name="input_page2_pp_ws_usc_question4" id="input_page2_pp_ws_usc_question4" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " min="0" value="{{ intval(old('input_page2_pp_ws_usc_question4')) }}" step="any" required/>
                                            <label for="input_page2_pp_ws_usc_question4" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Price of Palay per Kg (PHP 0.00)</label>
                                        </div>
                                    </div>
            
                                    <br>
            
                                    <div class="grid xl:grid-cols-2 xl:gap-6">
                                            <div class="relative z-0 w-full mb-6 group">
                                                <div class="flex">
                                                    <div class="flex items-center mt-4 mr-4">
                                                        <input name="input_page2_ecosystem" id="input_page2_ecosystem_opt1" type="radio" value="Irrigated" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ old('input_page2_ecosystem') === 'Irrigated' ? 'checked' : ''}} required>
                                                        <label for="label_farm_ecosystem_opt1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Irrigated</label>
                                                    </div>
                                                </div>
                                                <div class="flex">
                                                    <div class="flex items-center mt-4 mr-4">
                                                        <input name="input_page2_ecosystem" id="input_page2_ecosystem_opt2" type="radio" value="Rainfed" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ old('input_page2_ecosystem') === 'Rainfed' ? 'checked' : ''}}>
                                                        <label for="label_farm_ecosystem_opt2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Rainfed</label>
                                                    </div>
                                                </div>
                                                <div class="flex">
                                                    <div class="flex items-center mt-4 mr-4">
                                                        <input name="input_page2_ecosystem" id="input_page2_ecosystem_opt3" type="radio" value="Upland" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ old('input_page2_ecosystem') === 'Upland' ? 'checked' : ''}}>
                                                        <label for="label_farm_ecosystem_opt3" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Upland</label>
                                                    </div>
                                                </div>
                                            <label for="label_page2_ecosystem" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Ecosystem</label>
                                            </div>
            
                                            <div class="relative z-0 w-full mb-6 group">
                                                <div class="flex">
                                                    <div class="flex items-center mt-4 mr-4">
                                                        <input name="input_page2_stressecosystem[]" id="input_page2_stressecosystem_opt1" onclick="renderExtraPage(event)" type="checkbox" value="0" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('input_page2_stressecosystem')) ? '' : (in_array(0, old('input_page2_stressecosystem')) ? 'checked' : '')}} required>
                                                        <label for="input_page2_stressecosystem_opt1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Flooded/Submerged</label>
                                                    </div>
                                                </div>
                                                <div class="flex">
                                                    <div class="flex items-center mt-4 mr-4">
                                                        <input name="input_page2_stressecosystem[]" id="input_page2_stressecosystem_opt2" onclick="renderExtraPage(event)" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('input_page2_stressecosystem')) ? '' : (in_array(1, old('input_page2_stressecosystem')) ? 'checked' : '')}}>
                                                        <label for="input_page2_stressecosystem_opt2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Saline</label>
                                                    </div>
                                                </div>
                                                <div class="flex">
                                                    <div class="flex items-center mt-4 mr-4">
                                                        <input name="input_page2_stressecosystem[]" id="input_page2_stressecosystem_opt3" onclick="renderExtraPage(event)" type="checkbox" value="2" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('input_page2_stressecosystem')) ? '' : (in_array(2, old('input_page2_stressecosystem')) ? 'checked' : '')}}>
                                                        <label for="input_page2_stressecosystem_opt3" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Drought</label>
                                                    </div>
                                                </div>   
                                                <label for="label_page2_stressecosystem" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Stress Ecosystem</label>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Page:3 --}}
                        <div id="main-div-page3" class="mb-4 max-w-7xl mx-auto sm:px-6 lg:px-8" style="display: {{ empty(old('input_page2_stressecosystem')) ? 'none' : (in_array(0, old('input_page2_stressecosystem')) ? 'block' : 'none')}}">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 bg-white border-b border-gray-200">
            
                                        <div class="px-4 sm:px-0 mb-6">
                                            <h3 class="text-lg font-medium leading-6 text-gray-900 text-center">C. Flooding/Submergence Ecosystem</h3>
                                            <p class="mt-1 text-sm text-gray-600 text-center"></p>
                                        </div>
            
                                        <div class="relative z-0 w-full mb-6 group">
                                                @if ($optionsSourceOfFloods->count() > 0)
                                                    @foreach ($optionsSourceOfFloods as $sourceOfFlood)
                                                        <div class="flex">
                                                            <div class="flex items-center mt-4 mr-4">
                                                                <input name="input_page3_source[]" id="input_page3_source_opt{{ $sourceOfFlood->position }}" type="checkbox" value="{{ $sourceOfFlood->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('input_page3_source')) ? '' : (in_array($sourceOfFlood->id, old('input_page3_source')) ? 'checked' : '')}}>
                                                                <label for="label_input_page3_source_opt{{$sourceOfFlood->position}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{utf8_decode($sourceOfFlood->Picklistitem)}}</label>
                                                            </div>
                                                            @if ($sourceOfFlood->position === 5)
                                                                <div class="flex items-center mr-4">
                                                                    <input name="input_page3_source_specify" id="input_page3_source_specify" type="text" class="block py-2.5 px-0 w-full text-xs text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Please Specify" value="{{ old('input_page3_source_specify') }}" {{ empty(old('input_page3_source')) ? 'disabled' : ( in_array($sourceOfFlood->id, old('input_page3_source')) ? '' : 'disabled') }}/>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                @endif
                                            <label for="label_input_page3_source" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Source/ Cause of floods:</label>
                                        </div>
            
                                    <div class="relative z-0 w-full mb-6 group">
                                            @if ($optionsFrequency->count() > 0)
                                                @foreach ($optionsFrequency as $frequency)
                                                    <div class="flex">
                                                        <div class="flex items-center mt-4 mr-4">
                                                            <input name="input_page3_frequency[]" id="input_page3_frequency_opt{{ $frequency->position }}" type="checkbox" value="{{ $frequency->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('input_page3_frequency')) ? '' : (in_array($frequency->id, old('input_page3_frequency')) ? 'checked' : '')}}>
                                                            <label for="label_flood_source_opt{{$frequency->position}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{utf8_decode($frequency->Picklistitem)}}</label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        <label for="label_page3_frequency" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">How frequent does flooding occurs for the past 5 years</label>
                                    </div>
            
                                    <div class="px-4 sm:px-0 mb-3">
                                        <h3 class="text-md font-bold leading-6 text-gray-900">Types of Flood experienced: </h3>
                                    </div>
    
                                        <div class="grid xl:grid-cols-2 xl:gap-6">
                                            <div class="relative z-0 w-full mb-6 group">

                                                {{-- Flashflood --}}
                                                <div class="flex">
                                                    <div class="flex items-center mt-4 mr-4">
                                                        <input onchange="page3FloodTypeCheckBox(event, 'flashflood')" name="checkbox_page3_flashflood" id="checkbox_page3_flashflood" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ intval(old('checkbox_page3_flashflood')) === intval(1) ? 'checked' : ''}}>
                                                        <label for="label_page3_flashflood" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Flashflood</label>
                                                    </div>
                                                </div>

                                                <div class="flex">
                                                    <div class="flex items-center mt-4 mr-4">
                                                        <input name="input_page3_flashflood_waterlevel" id="input_page3_flashflood_waterlevel" type="number" class="block py-2.5 px-0 w-full text-xs text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Water Level (cm)" {{ intval(old('checkbox_page3_flashflood')) === intval(1) ? '' : 'disabled'}} value="{{ old('input_page3_flashflood_waterlevel') }}"/>
                                                        <label for="label_page3_flashflood" class="w-full ml-2 text-xs font-medium text-gray-900 dark:text-gray-300">Water Level (cm)</label>
                                                    </div>
                                                </div>
            
                                                <div class="flex">
                                                    <div class="flex items-center mt-4 mr-4">
                                                        <input name="input_page3_flashflood_days" id="input_page3_flashflood_days" type="number" class="block py-2.5 px-0 w-full text-xs text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Day(s)" {{ intval(old('checkbox_page3_flashflood')) === intval(1) ? '' : 'disabled'}} value="{{ old('input_page3_flashflood_days') }}"/>
                                                        <label for="label_page3_flashflood" class="w-full ml-2 text-xs font-medium text-gray-900 dark:text-gray-300">Duration (No. of Days)</label>
                                                    </div>

                                                    <div class="flex items-center mt-4 mr-4">
                                                        <input name="input_page3_flashflood_hours" id="input_page3_flashflood_hours" type="number" class="block py-2.5 px-0 w-full text-xs text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Hour(s)" {{ intval(old('checkbox_page3_flashflood')) === intval(1) ? '' : 'disabled'}} value="{{ old('input_page3_flashflood_hours') }}"/>
                                                        <label for="label_page3_flashflood" class="w-full ml-2 text-xs font-medium text-gray-900 dark:text-gray-300">Duration (No. of Hours)</label>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Intermittent --}}
    
                                            <div class="relative z-0 w-full mb-6 group">
                                                <div class="flex">
                                                    <div class="flex items-center mt-4 mr-4">
                                                        <input onchange="page3FloodTypeCheckBox(event, 'intermittent')" name="checkbox_page3_intermittent" id="checkbox_page3_intermittent" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ intval(old('checkbox_page3_intermittent')) === intval(1) ? 'checked' : ''}}>
                                                        <label for="label_page3_intermittent" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Intermittent</label>
                                                    </div>
                                                </div>
                
                                                <div class="flex">
                                                    <div class="flex items-center mt-4 mr-4">
                                                        <input name="input_page3_intermittent_waterlevel" id="input_page3_intermittent_waterlevel" type="number" class="block py-2.5 px-0 w-full text-xs text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Water Level (cm)" value="{{ old('input_page3_intermittent_waterlevel') }}" {{ intval(old('checkbox_page3_intermittent')) === intval(1) ? '' : 'disabled'}}/>
                                                        <label for="label_page3_intermittent" class="w-full ml-2 text-xs font-medium text-gray-900 dark:text-gray-300">Water Level (cm)</label>
                                                    </div>
                                                </div>

                                                <div class="flex">
                                                    <div class="flex items-center mt-4 mr-4">
                                                        <input name="input_page3_intermittent_days" id="input_page3_intermittent_days" type="number" class="block py-2.5 px-0 w-full text-xs text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Day(s)" value="{{ old('input_page3_intemittent_days') }}"  {{ intval(old('checkbox_page3_intermittent')) === intval(1) ? '' : 'disabled'}}/>
                                                        <label for="label_page3_intermittent" class="w-full ml-2 text-xs font-medium text-gray-900 dark:text-gray-300">Duration (No. of Days)</label>
                                                    </div>
            
                                                    <div class="flex items-center mt-4 mr-4">
                                                        <input name="input_page3_intermittent_hours" id="input_page3_intermittent_hours" type="number" class="block py-2.5 px-0 w-full text-xs text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Hour(s)" value="{{ old('input_page3_intermittent_hours') }}" {{ intval(old('checkbox_page3_intermittent')) === intval(1) ? '' : 'disabled'}}/>
                                                        <label for="label_page3_intermittent" class="w-full ml-2 text-xs font-medium text-gray-900 dark:text-gray-300">Duration (No. of Hours)</label>
                                                    </div>
                                                </div>
                                            </div>  
                                        </div>
    
                                        <div class="grid xl:grid-cols-2 xl:gap-6">
                                            <div class="relative z-0 w-full mb-6 group">
                                                <div class="flex">
                                                    <div class="flex items-center mt-4 mr-4">
                                                        <input onchange="page3FloodTypeCheckBox(event, 'stagnant')" name="checkbox_page3_stagnant" id="checkbox_page3_stagnant" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ intval(old('checkbox_page3_stagnant')) === intval(1) ? 'checked' : ''}}>
                                                        <label for="label_page3_stagnant" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Stagnant</label>
                                                    </div>
                                                </div>
                
                                                <div class="flex">
                                                    <div class="flex items-center mt-4 mr-4">
                                                        <input name="input_page3_stagnant_waterlevel" id="input_page3_stagnant_waterlevel" type="number" class="block py-2.5 px-0 w-full text-xs text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Water Level (cm)" {{ intval(old('checkbox_page3_stagnant')) === intval(1) ? '' : 'disabled'}} value=""/>
                                                        <label for="label_page3_stagnant" class="w-full ml-2 text-xs font-medium text-gray-900 dark:text-gray-300">Water Level (cm)</label>
                                                    </div>
                                                </div>
            
                                                <div class="flex">
                                                    <div class="flex items-center mt-4 mr-4">
                                                        <input name="input_page3_stagnant_days" id="input_page3_stagnant_days" type="number" class="block py-2.5 px-0 w-full text-xs text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Day(s)" {{ intval(old('checkbox_page3_stagnant')) === intval(1) ? '' : 'disabled'}} value="{{ old('input_page3_stagnant_days') }}"/>
                                                        <label for="label_page3_stagnant" class="w-full ml-2 text-xs font-medium text-gray-900 dark:text-gray-300">Duration (No. of Days)</label>
                                                    </div>
                
                                                    <div class="flex items-center mt-4 mr-4">
                                                        <input name="input_page3_stagnant_hours" id="input_page3_stagnant_hours" type="number" class="block py-2.5 px-0 w-full text-xs text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Hour(s)" {{ intval(old('checkbox_page3_stagnant')) === intval(1) ? '' : 'disabled'}} value="{{ old('input_page3_stagnant_hours') }}"/>
                                                        <label for="label_page3_stagnant" class="w-full ml-2 text-xs font-medium text-gray-900 dark:text-gray-300">Duration (No. of Hours)</label>
                                                    </div>
                                                </div>    
                                            </div>
    
                                            <div class="relative z-0 w-full mb-6 group">
                                                <div class="flex mt-4">
                                                    <div class="flex items-center mr-4">
                                                        <input onchange="page3FloodTypeCheckBox(event, 'all')" name="checkbox_page3_all" id="checkbox_page3_all" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ intval(old('checkbox_page3_all')) === intval(1) ? 'checked' : ''}}>
                                                        <label for="label_page3_all" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">All of the Above</label>
                                                    </div>
                                                </div>
                
                                                <div class="flex">
                                                    <div class="flex items-center mt-4 mr-4">
                                                        <input name="input_page3_all_waterlevel" id="input_page3_all_waterlevel" type="number" class="block py-2.5 px-0 w-full text-xs text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Water Level (cm)" {{ intval(old('checkbox_page3_all')) === intval(1) ? '' : 'disabled' }} value="{{ old('input_page3_all_waterlevel') }}"/>
                                                        <label for="label_page3_all" class="w-full ml-2 text-xs font-medium text-gray-900 dark:text-gray-300">Water Level (cm)</label>
                                                    </div>
                                                </div>
            
                                                <div class="flex">
                                                    <div class="flex items-center mt-4 mr-4">
                                                        <input name="input_page3_all_days" id="input_page3_all_days" type="number" class="block py-2.5 px-0 w-full text-xs text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Day(s)" {{ intval(old('checkbox_page3_all')) === intval(1) ? '' : 'disabled' }} value="{{ old('input_page3_all_days') }}"/>
                                                        <label for="label_page3_all" class="w-full ml-2 text-xs font-medium text-gray-900 dark:text-gray-300">Duration (No. of Days)</label>
                                                    </div>
                
                                                    <div class="flex items-center mt-4 mr-4">
                                                        <input name="input_page3_all_hours" id="input_page3_all_hours" type="number" class="block py-2.5 px-0 w-full text-xs text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Hour(s)" {{ intval(old('checkbox_page3_all')) === intval(1) ? '' : 'disabled' }} value="{{ old('input_page3_all_days') }}"/>
                                                        <label for="label_page3_all" class="w-full ml-2 text-xs font-medium text-gray-900 dark:text-gray-300">Duration (No. of Hours)</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>     
            
                                        <div class="px-4 sm:px-0 mb-6">
                                            <h3 class="text-md font-bold leading-6 text-gray-900">Occurence of Flood</h3>
                                        </div>
            
                                        <div class="relative z-0 w-full mb-6 group">
                                                @if ($optionsMonth->count() > 0)
                                                    @foreach ($optionsMonth as $month)
                                                        <div class="flex">
                                                            <div class="flex items-center mt-4 mr-4">
                                                                <input name="checkbox_page3_occurenceofflood_ds_months[]" id="checkbox_page3_occurenceofflood_ds_months_opt{{ $month->position }}" type="checkbox" value="{{ $month->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('checkbox_page3_occurenceofflood_ds_months')) ? '' : (in_array($month->id, old('checkbox_page3_occurenceofflood_ds_months')) ? 'checked' : '' ) }}>
                                                                <label for="label_checkbox_page3_occurenceofflood_ds_months_opt{{$month->position}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{utf8_decode($month->Picklistitem)}}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    {{-- @foreach ($optionsMonth as $month)
                                                        @if (in_array($month->position, [9, 10, 11, 12]))
                                                            <div class="flex">
                                                                <div class="flex items-center mt-4 mr-4">
                                                                    <input name="checkbox_page3_occurenceofflood_ds_months[]" id="checkbox_page3_occurenceofflood_ds_months_opt{{ $month->position }}" type="checkbox" value="{{ $month->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('checkbox_page3_occurenceofflood_ds_months')) ? '' : (in_array($month->id, old('checkbox_page3_occurenceofflood_ds_months')) ? 'checked' : '' ) }}>
                                                                    <label for="label_checkbox_page3_occurenceofflood_ds_months_opt{{$month->position}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{utf8_decode($month->Picklistitem)}}</label>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                    @foreach ($optionsMonth as $month)
                                                        @if (in_array($month->position, [1,2,3]))
                                                            <div class="flex">
                                                                <div class="flex items-center mt-4 mr-4">
                                                                    <input name="checkbox_page3_occurenceofflood_ds_months[]" id="checkbox_page3_occurenceofflood_ds_months_opt{{ $month->position }}" type="checkbox" value="{{ $month->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('checkbox_page3_occurenceofflood_ds_months')) ? '' : (in_array($month->id, old('checkbox_page3_occurenceofflood_ds_months')) ? 'checked' : '' ) }}>
                                                                    <label for="label_checkbox_page3_occurenceofflood_ds_months_opt{{$month->position}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{utf8_decode($month->Picklistitem)}}</label>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach --}}
                                                @endif
                                            <label for="label_checkbox_page3_occurenceofflood_ws_months" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">What month/s during dry season?</label>
                                            <div class="grid xl:grid-cols-2 xl:gap-6">
                                                <div class="relative z-0 w-full group">
                                                    <input name="input_page3_occurenceofflood_ds_remarks" id="input_page3_occurenceofflood_ds_remarks" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Remarks" value="{{ old('input_page3_occurenceofflood_ds_remarks') }}"/>
                                                </div>
                                            </div>
                                        </div>
            
                                        <div class="relative z-0 w-full mb-6 group">
                                            @if ($optionsMonth->count() > 0)
                                                @foreach ($optionsMonth as $month)
                                                    <div class="flex">
                                                        <div class="flex items-center mt-4 mr-4">
                                                            <input name="checkbox_page3_occurenceofflood_ws_months[]" id="checkbox_page3_occurenceofflood_ws_months_opt{{ $month->position }}" type="checkbox" value="{{ $month->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('checkbox_page3_occurenceofflood_ws_months')) ? '' : (in_array($month->id, old('checkbox_page3_occurenceofflood_ws_months')) ? 'checked' : '' ) }}>
                                                            <label for="label_checkbox_page3_occurenceofflood_ws_months_opt{{$month->position}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{utf8_decode($month->Picklistitem)}}</label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                {{-- @foreach ($optionsMonth as $month)
                                                    @if (in_array($month->position, [3,4,5,6,7,8,9]))
                                                        <div class="flex">
                                                            <div class="flex items-center mt-4 mr-4">
                                                                <input name="checkbox_page3_occurenceofflood_ws_months[]" id="checkbox_page3_occurenceofflood_ws_months_opt{{ $month->position }}" type="checkbox" value="{{ $month->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('checkbox_page3_occurenceofflood_ws_months')) ? '' : (in_array($month->id, old('checkbox_page3_occurenceofflood_ws_months')) ? 'checked' : '' ) }}>
                                                                <label for="label_checkbox_page3_occurenceofflood_ws_months_opt{{$month->position}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{utf8_decode($month->Picklistitem)}}</label>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach --}}
                                            @endif
                                            <label for="" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">What month/s during wet season?</label>
                                            <div class="grid xl:grid-cols-2 xl:gap-6">
                                                <div class="relative z-0 w-full group">
                                                    <input name="input_page3_occurenceofflood_ws_remarks" id="input_page3_occurenceofflood_ws_remarks" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Remarks" value="{{ old('input_page3_occurenceofflood_ws_remarks') }}"/>
                                                    {{-- <label for="label_page3_occurenceofflood_ws_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Remarks</label> --}}
                                                </div>
                                            </div>
                                        </div>
                                    
                                </div>
                            </div>
                        </div>

                        {{-- Page:4 --}}
                        <div id="main-div-page4" class="mb-4 max-w-7xl mx-auto sm:px-6 lg:px-8" style="display: {{ empty(old('input_page2_stressecosystem')) ? 'none' : (in_array(1, old('input_page2_stressecosystem')) ? 'block' : 'none')}}">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 bg-white border-b border-gray-200">
            
                                    <div class="px-4 sm:px-0 mb-6">
                                        <h3 class="text-lg font-medium leading-6 text-gray-900 text-center">D. Salt Water Intrusions Ecosystem</h3>
                                        <p class="mt-1 text-sm text-gray-600 text-center"></p>
                                    </div>
        
                                    <div class="px-4 sm:px-0 mb-6">
                                        <hr>
                                    </div>
        
                                    <div class="relative z-0 w-full group mb-6">
                                        @if ($optionsSourceOfSalinity->count() > 0)
                                            @foreach ($optionsSourceOfSalinity as $sourceOfSalinity)
                                                <div class="flex">
                                                    <div class="flex items-center mt-4 mr-4">
                                                        <input name="input_page4_sourceofsalinity[]" id="input_page4_sourceofsalinity_opt{{ $sourceOfSalinity->position }}" type="checkbox" value="{{ $sourceOfSalinity->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('input_page4_sourceofsalinity')) ? '' : (in_array($sourceOfSalinity->id, old('input_page4_sourceofsalinity')) ? 'checked' : '') }}>
                                                        <label for="label_flood_sourceofsalinity_opt{{$sourceOfSalinity->position}}" title="{{ $sourceOfSalinity->Picklistitem }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ ucfirst(utf8_decode($sourceOfSalinity->Picklistitem)) }}</label>
                                                    </div>
                                                    @if ($sourceOfSalinity->position === 5)
                                                        <div class="flex items-center mr-4">
                                                            <input name="input_page4_sourceofsalinity_specify" id="input_page4_sourceofsalinity_specify" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Please Specify" value="{{ old('input_page4_sourceofsalinity_specify') }}" {{ empty(old('input_page4_sourceofsalinity')) ? 'disabled' : (in_array($sourceOfSalinity->id, old('input_page4_sourceofsalinity')) ? '' : 'disabled' ) }}/>
                                                        </div>
                                                    @endif
                                                </div>
                                            @endforeach
                                        @endif
                                        <label for="label_page4_sourceofsalinity" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Sources of Salinity:</label>
                                    </div>
            
                                    <div class="relative z-0 w-full mb-6 group">
                                        @if ($optionsFrequency->count() > 0)
                                            @foreach ($optionsFrequency as $frequency)
                                            <div class="flex">
                                                <div class="flex items-center mt-4 mr-4">
                                                    <input name="input_page4_frequency[]" id="input_page4_frequency_opt{{$frequency->position}}" type="checkbox" value="{{ $frequency->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('input_page4_frequency')) ? '' : (in_array($frequency->id, old('input_page4_frequency')) ? 'checked' : '' ) }}>
                                                    <label for="label_page4_frequency_opt{{$frequency->position}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ utf8_decode($frequency->Picklistitem) }}</label>
                                                </div>
                                            </div>
                                            @endforeach
                                        @endif
                                        <label for="label_page4_frequency" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Frequency of Salt Water Intrusion occur for the past 5 years</label>
                                    </div>
            
                                    <div class="px-4 sm:px-0 mb-6">
                                        <h3 class="text-md font-bold leading-6 text-gray-900">Occurence of Salinity</h3>
                                    </div>
            
                                    <div class="relative z-0 w-full mb-6 group">
                                        @if ($optionsMonth->count() > 0)
                                            @foreach ($optionsMonth as $month)
                                                <div class="flex">
                                                    <div class="flex items-center mt-4 mr-4">
                                                        <input name="checkbox_page4_occurenceofsalinity_ds_months[]" id="checkbox_page4_occurenceofsalinity_ds_months_opt{{ $month->position }}" type="checkbox" value="{{ $month->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('checkbox_page4_occurenceofsalinity_ds_months')) ? '' : (in_array($month->id, old('checkbox_page4_occurenceofsalinity_ds_months')) ? 'checked' : '' ) }}>
                                                        <label for="label_checkbox_page4_occurenceofsalinity_ds_months_opt{{$month->position}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{utf8_decode($month->Picklistitem)}}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                            {{-- @foreach ($optionsMonth as $month)
                                                @if (in_array($month->position, [9, 10, 11, 12]))
                                                    <div class="flex">
                                                        <div class="flex items-center mt-4 mr-4">
                                                            <input name="checkbox_page4_occurenceofsalinity_ds_months[]" id="checkbox_page4_occurenceofsalinity_ds_months_opt{{ $month->position }}" type="checkbox" value="{{ $month->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('checkbox_page4_occurenceofsalinity_ds_months')) ? '' : (in_array($month->id, old('checkbox_page4_occurenceofsalinity_ds_months')) ? 'checked' : '' ) }}>
                                                            <label for="label_checkbox_page4_occurenceofsalinity_ds_months_opt{{$month->position}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{utf8_decode($month->Picklistitem)}}</label>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                            @foreach ($optionsMonth as $month)
                                                @if (in_array($month->position, [1,2,3]))
                                                    <div class="flex">
                                                        <div class="flex items-center mt-4 mr-4">
                                                            <input name="checkbox_page4_occurenceofsalinity_ds_months[]" id="checkbox_page4_occurenceofsalinity_ds_months_opt{{ $month->position }}" type="checkbox" value="{{ $month->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('checkbox_page4_occurenceofsalinity_ds_months')) ? '' : (in_array($month->id, old('checkbox_page4_occurenceofsalinity_ds_months')) ? 'checked' : '' ) }}>
                                                            <label for="label_checkbox_page4_occurenceofsalinity_ds_months_opt{{$month->position}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{utf8_decode($month->Picklistitem)}}</label>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach --}}
                                        @endif
                                        <label for="label_checkbox_page4_occurenceofsalinity_ds_months" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">What month/s during dry season?</label>
                                        <div class="grid xl:grid-cols-2 xl:gap-6">
                                            <div class="relative z-0 w-full group">
                                                <input name="input_page4_occurenceofsalinity_ds_remarks" id="input_page4_occurenceofsalinity_ds_remarks" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Remarks" value="{{ old('input_page4_occurenceofsalinity_ds_remarks') }}"/>
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="relative z-0 w-full mb-6 group">
                                        @if ($optionsMonth->count() > 0)
                                            @foreach ($optionsMonth as $month)
                                                <div class="flex">
                                                    <div class="flex items-center mt-4 mr-4">
                                                        <input name="checkbox_page4_occurenceofsalinity_ws_months[]" id="checkbox_page4_occurenceofsalinity_ws_months_opt{{ $month->position }}" type="checkbox" value="{{ $month->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"  {{ empty(old('checkbox_page4_occurenceofsalinity_ws_months')) ? '' : (in_array($month->id, old('checkbox_page4_occurenceofsalinity_ws_months')) ? 'checked' : '' ) }}>
                                                        <label for="label_checkbox_page4_occurenceofsalinity_ws_months_opt{{$month->position}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{utf8_decode($month->Picklistitem)}}</label>
                                                    </div>
                                                </div>
                                                {{-- @if (in_array($month->position, [3,4,5,6,7,8,9]))
                                                    <div class="flex">
                                                        <div class="flex items-center mt-4 mr-4">
                                                            <input name="checkbox_page4_occurenceofsalinity_ws_months[]" id="checkbox_page4_occurenceofsalinity_ws_months_opt{{ $month->position }}" type="checkbox" value="{{ $month->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"  {{ empty(old('checkbox_page4_occurenceofsalinity_ws_months')) ? '' : (in_array($month->id, old('checkbox_page4_occurenceofsalinity_ws_months')) ? 'checked' : '' ) }}>
                                                            <label for="label_checkbox_page4_occurenceofsalinity_ws_months_opt{{$month->position}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{utf8_decode($month->Picklistitem)}}</label>
                                                        </div>
                                                    </div>
                                                @endif --}}
                                            @endforeach
                                        @endif
                                        <label for="label_checkbox_page4_occurenceofsalinity_ws_months" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">What month/s during wet season?</label>
                                        <div class="grid xl:grid-cols-2 xl:gap-6">
                                            <div class="relative z-0 w-full group">
                                                <input name="input_page4_occurenceofsalinity_ws_remarks" id="input_page4_occurenceofsalinity_ws_remarks" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Remarks" value="{{ old('input_page4_occurenceofsalinity_ws_remarks') }}"/>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="overflow-x-auto relative mb-6">
                                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                            <thead class="text-md text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="py-3 px-6 rounded-l-lg">
                                                        Source of Irrigation
                                                    </th>
                                                    <th scope="col" class="py-3 px-6">
                                                        Is the water from this source salt free?
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($optionsSourceOfIrrigation->count() > 0)
                                                    @foreach ($optionsSourceOfIrrigation as $sourceOfIrrigation)
                                                        <tr class="bg-white dark:bg-gray-800">
                                                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                <div class="flex items-center mr-4">
                                                                    <input onchange="page4SourceOfIrrigation(event, {{$sourceOfIrrigation->id}})" name="checkbox_page4_sourceofirrigation[]" id="checkbox_page4_sourceofirrigation_opt{{$sourceOfIrrigation->position}}" type="checkbox" value="{{ $sourceOfIrrigation->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('checkbox_page4_sourceofirrigation')) ? '' : (in_array($sourceOfIrrigation->id, old('checkbox_page4_sourceofirrigation')) ? 'checked' : '' ) }}>
                                                                    <label for="label_checkbox_page4_sourceofirrigation_opt[{{$sourceOfIrrigation->id}}]" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{utf8_decode($sourceOfIrrigation->Picklistitem)}}</label>
                                                                    
                                                                    @if ($sourceOfIrrigation->id === 52) 
                                                                        <div class="flex items-center ml-4">
                                                                            <input name="input_page4_sourceofirrigation_specify" id="input_page4_sourceofirrigation_specify" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Please Specify" value="{{ old('input_page4_sourceofirrigation_specify') }}" {{ empty(old('checkbox_page4_sourceofirrigation')) ? 'disabled' : ( in_array($sourceOfIrrigation->id, old('checkbox_page4_sourceofirrigation')) ? '' : 'disabled' ) }}/>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </th>
                                                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                @if ($sourceOfIrrigation->id !== 49)
                                                                <input name="checkbox_page4_sourceofirrigation_saltfree[{{$sourceOfIrrigation->id}}]" id="checkbox_page4_sourceofirrigation_saltfree{{$sourceOfIrrigation->id}}_yes" type="radio" value="1"  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('checkbox_page4_sourceofirrigation_saltfree')[$sourceOfIrrigation->id]) ? 'disabled' : (intval(old('checkbox_page4_sourceofirrigation_saltfree')[$sourceOfIrrigation->id]) === intval(1) ? 'checked' : '' ) }}>
                                                                <label for="label_checkbox_page4_sourceofirrigation_saltfree{{$sourceOfIrrigation->id}}_yes" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300" >Yes</label>
                                                                <input name="checkbox_page4_sourceofirrigation_saltfree[{{$sourceOfIrrigation->id}}]" id="checkbox_page4_sourceofirrigation_saltfree{{$sourceOfIrrigation->id}}_no" type="radio" value="2"  class="ml-4 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('checkbox_page4_sourceofirrigation_saltfree')[$sourceOfIrrigation->id]) ? 'disabled' : (intval(old('checkbox_page4_sourceofirrigation_saltfree')[$sourceOfIrrigation->id]) === intval(2) ? 'checked' : '' ) }}>
                                                                <label for="label_checkbox_page4_sourceofirrigation_saltfree[{{$sourceOfIrrigation->id}}]_no" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300" >No</label>
                                                                @endif
                                                            </th>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
            
                                    <div class="relative z-0 w-full group">
                                        @if ($optionsIndicatorOfSalinity->count() > 0)
                                            @foreach ($optionsIndicatorOfSalinity as $indicatorOfSalinity)
                                                <div class="flex">
                                                    <div class="flex items-center mt-4 mr-4">
                                                        <input name="input_page4_indicatorofsalinity[]" id="input_page4_indicatorofsalinity_opt{{$indicatorOfSalinity->position}}" type="checkbox" value="{{$indicatorOfSalinity->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('input_page4_indicatorofsalinity')) ? '' : ( in_array($indicatorOfSalinity->id, old('input_page4_indicatorofsalinity')) ? 'checked' : '' ) }}>
                                                        <label for="label_page4_indicatorofsalinity_opt{{$indicatorOfSalinity->position}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ucfirst(utf8_decode($indicatorOfSalinity->Picklistitem))}}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        <label for="label_page4_indicatorofsalinity" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Indicator of Salinity:</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                      {{-- Page:5 --}}
                      <div id="main-div-page5" class="mb-4 max-w-7xl mx-auto sm:px-6 lg:px-8" style="display: {{ empty(old('input_page2_stressecosystem')) ? 'none' : (in_array(2, old('input_page2_stressecosystem')) ? 'block' : 'none')}}">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 bg-white border-b border-gray-200">
            
                                    <div class="px-4 sm:px-0 mb-6">
                                        <h3 class="text-lg font-medium leading-6 text-gray-900 text-center">E. Drought Ecosystem</h3>
                                        <p class="mt-1 text-sm text-gray-600 text-center"></p>
                                    </div>
            
                                    <div class="px-4 sm:px-0 mb-6">
                                        <hr>
                                    </div>
            
                                    <div class="relative z-0 w-full mb-6 group">
                                    @if ($optionsFrequency->count() > 0)
                                        @foreach ($optionsFrequency as $frequency)
                                            <div class="flex">
                                                <div class="flex items-center mt-4 mr-4">
                                                    <input  name="input_page5_frequency[]" id="input_page5_frequency_opt{{$frequency->position}}" type="checkbox" value="{{$frequency->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('input_page5_frequency')) ? '' : ( in_array($frequency->id, old('input_page5_frequency')) ? 'checked' : '' ) }}>
                                                    <label for="label_page5_frequency_opt{{$frequency->position}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{utf8_decode($frequency->Picklistitem)}}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                        <label for="label_page5_frequency" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Frequency of drought occur for the past 5 years</label>
                                    </div>
            
                                    <div class="px-4 sm:px-0 mb-6">
                                        <h3 class="text-md font-bold leading-6 text-gray-900">Occurence of Drought</h3>
                                    </div>
            
                                    <div class="relative z-0 w-full mb-6 group">
                                        @if ($optionsMonth->count() > 0)
                                            @foreach ($optionsMonth as $month)
                                                <div class="flex">
                                                    <div class="flex items-center mt-4 mr-4">
                                                        <input name="checkbox_page5_occurenceofdrought_ds_months[]" id="checkbox_page5_occurenceofdrought_ds_months_opt{{ $month->position }}" type="checkbox" value="{{ $month->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('checkbox_page5_occurenceofdrought_ds_months')) ? '' : (in_array($month->id, old('checkbox_page5_occurenceofdrought_ds_months')) ? 'checked' : '') }}>
                                                        <label for="label_checkbox_page5_occurenceofdrought_ds_months_opt{{$month->position}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{utf8_decode($month->Picklistitem)}}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                            {{-- @foreach ($optionsMonth as $month)
                                                @if (in_array($month->position, [9, 10, 11, 12]))
                                                    <div class="flex">
                                                        <div class="flex items-center mt-4 mr-4">
                                                            <input name="checkbox_page5_occurenceofdrought_ds_months[]" id="checkbox_page5_occurenceofdrought_ds_months_opt{{ $month->position }}" type="checkbox" value="{{ $month->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('checkbox_page5_occurenceofdrought_ds_months')) ? '' : (in_array($month->id, old('checkbox_page5_occurenceofdrought_ds_months')) ? 'checked' : '') }}>
                                                            <label for="label_checkbox_page5_occurenceofdrought_ds_months_opt{{$month->position}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{utf8_decode($month->Picklistitem)}}</label>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                            @foreach ($optionsMonth as $month)
                                                @if (in_array($month->position, [1,2,3]))
                                                    <div class="flex">
                                                        <div class="flex items-center mt-4 mr-4">
                                                            <input name="checkbox_page5_occurenceofdrought_ds_months[]" id="checkbox_page5_occurenceofdrought_ds_months_opt{{ $month->position }}" type="checkbox" value="{{ $month->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('checkbox_page5_occurenceofdrought_ds_months')) ? '' : (in_array($month->id, old('checkbox_page5_occurenceofdrought_ds_months')) ? 'checked' : '') }}>
                                                            <label for="label_checkbox_page5_occurenceofdrought_ds_months_opt{{$month->position}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{utf8_decode($month->Picklistitem)}}</label>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach --}}
                                        @endif
                                        <label for="label_checkbox_page5_occurenceofdrought_ds_months" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">What month/s during dry season?</label>
                                        <div class="grid xl:grid-cols-2 xl:gap-6">
                                            <div class="relative z-0 w-full group">
                                                <input name="input_page5_occurenceofdrought_ds_remarks" id="input_page5_occurenceofdrought_ds_remarks" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Remarks" value="{{ old('input_page5_occurenceofdrought_ds_remarks') }}"/>
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="relative z-0 w-full mb-6 group">
                                        @if ($optionsMonth->count() > 0)
                                            @foreach ($optionsMonth as $month)
                                                <div class="flex">
                                                    <div class="flex items-center mt-4 mr-4">
                                                        <input name="checkbox_page5_occurenceofdrought_ws_months[]" id="checkbox_page5_occurenceofdrought_ds_months_opt{{ $month->position }}" type="checkbox" value="{{ $month->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('checkbox_page5_occurenceofdrought_ws_months')) ? '' : ( in_array($month->id, old('checkbox_page5_occurenceofdrought_ws_months')) ? 'checked' : '' ) }}>
                                                        <label for="label_checkbox_page5_occurenceofdrought_ds_months_opt{{$month->position}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{utf8_decode($month->Picklistitem)}}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                            {{-- @foreach ($optionsMonth as $month)
                                                @if (in_array($month->position, [3,4,5,6,7,8,9]))
                                                    <div class="flex">
                                                        <div class="flex items-center mt-4 mr-4">
                                                            <input name="checkbox_page5_occurenceofdrought_ws_months[]" id="checkbox_page5_occurenceofdrought_ds_months_opt{{ $month->position }}" type="checkbox" value="{{ $month->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('checkbox_page5_occurenceofdrought_ws_months')) ? '' : ( in_array($month->id, old('checkbox_page5_occurenceofdrought_ws_months')) ? 'checked' : '' ) }}>
                                                            <label for="label_checkbox_page5_occurenceofdrought_ds_months_opt{{$month->position}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{utf8_decode($month->Picklistitem)}}</label>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach --}}
                                        @endif
                                        <label for="" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">What month/s during wet season?</label>
                                        <div class="grid xl:grid-cols-2 xl:gap-6">
                                            <div class="relative z-0 w-full group">
                                                <input name="input_page5_occurenceofdrought_ws_remarks" id="input_page5_occurenceofdrought_ws_remarks" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Remarks" value="{{ old('input_page5_occurenceofdrought_ws_remarks') }}"/>
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="px-4 sm:px-0 mb-6">
                                        <h3 class="text-md font-bold leading-6 text-gray-900">Source of Irrigation</h3>
                                    </div>
            
                                    <div class="overflow-x-auto relative mb-6">
                                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                            <thead class="text-md text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="py-3 px-6 rounded-l-lg">
                                                        Source of Irrigation
                                                    </th>
                                                    <th scope="col" class="py-3 px-6">
                                                        Is the water from this source salt free?
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($optionsSourceOfIrrigation->count() > 0)
                                                    @foreach ($optionsSourceOfIrrigation as $sourceOfIrrigation)
                                                    <tr class="bg-white dark:bg-gray-800">
                                                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            <div class="flex items-center mr-4">
                                                                <input onchange="page5SourceOfIrrigation(event, {{$sourceOfIrrigation->id}})" name="checkbox_page5_sourceofirrigation[]" id="checkbox_page5_sourceofirrigation_opt{{$sourceOfIrrigation->position}}" type="checkbox" value="{{$sourceOfIrrigation->id}}"  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('checkbox_page5_sourceofirrigation')) ? '' : (in_array($sourceOfIrrigation->id, old('checkbox_page5_sourceofirrigation')) ? 'checked' : '' ) }}>
                                                                <label for="label_checkbox_page5_sourceofirrigation_opt[{{$sourceOfIrrigation->id}}]" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{utf8_decode($sourceOfIrrigation->Picklistitem)}}</label>
                                                                
                                                                @if ($sourceOfIrrigation->id === 52) 
                                                                <div class="flex items-center ml-4">
                                                                    <input name="input_page5_sourceofirrigation_specify" id="input_page5_sourceofirrigation_specify" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Please Specify" value="{{ old('input_page5_sourceofirrigation_specify') }}" {{ empty(old('checkbox_page5_sourceofirrigation')) ? 'disabled' : ( in_array($sourceOfIrrigation->id, old('checkbox_page5_sourceofirrigation')) ? '' : 'disabled' ) }}/>
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </th>
                                                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            @if ($sourceOfIrrigation->id !== 49)
                                                            <input name="checkbox_page5_sourceofirrigation_saltfree[{{$sourceOfIrrigation->id}}]" id="checkbox_page5_sourceofirrigation_saltfree{{$sourceOfIrrigation->id}}_yes" type="radio" value="1"  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('checkbox_page5_sourceofirrigation_saltfree')[$sourceOfIrrigation->id]) ? 'disabled' : (intval(old('checkbox_page5_sourceofirrigation_saltfree')[$sourceOfIrrigation->id]) === intval(1) ? 'checked' : '' ) }}>
                                                            <label for="label_checkbox_page5_sourceofirrigation_saltfree{{$sourceOfIrrigation->id}}_yes" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300" disabled>Yes</label>
                                                            <input name="checkbox_page5_sourceofirrigation_saltfree[{{$sourceOfIrrigation->id}}]" id="checkbox_page5_sourceofirrigation_saltfree{{$sourceOfIrrigation->id}}_no" type="radio" value="2"  class="ml-4 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('checkbox_page5_sourceofirrigation_saltfree')[$sourceOfIrrigation->id]) ? 'disabled' : (intval(old('checkbox_page5_sourceofirrigation_saltfree')[$sourceOfIrrigation->id]) === intval(2) ? 'checked' : '' ) }}>
                                                            <label for="label_checkbox_page5_sourceofirrigation_saltfree[{{$sourceOfIrrigation->id}}]_no" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300" disabled>No</label>
                                                            @endif
                                                        </th>
                                                    </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
            
                                    <div class="relative z-0 w-full mb-4 group">
                                        @if ($optionsIndicatorOfDrought->count() > 0)
                                            @foreach ($optionsIndicatorOfDrought as $indicatorOfDrought)
                                                <div class="flex">
                                                    <div class="flex items-center mt-4 mr-4">
                                                        <input name="input_page5_indicatorofdrought[]" id="input_page5_indicatorofdrought_opt{{$indicatorOfDrought->position}}" type="checkbox" value="{{$indicatorOfDrought->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('input_page5_indicatorofdrought')) ? '' : ( in_array($indicatorOfDrought->id, old('input_page5_indicatorofdrought')) ? 'checked' : '' ) }}>
                                                        <label for="label_page5_indicatorofdrought_opt{{$indicatorOfDrought}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ucfirst(utf8_decode($indicatorOfDrought->Picklistitem))}}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        <label for="label_page5_indicatorofdrought" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Indicator of Drought:</label>
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