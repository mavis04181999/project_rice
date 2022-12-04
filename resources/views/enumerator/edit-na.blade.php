<x-app-layout>
	<div class="flex min-h-screen bg-gray-100">
		<div class="mt-4 mb-4 max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- BreadCrumbs --}}
            {{-- <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('enumerator.welcome') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                    Home
                    </a>
                </li>
                <li class="inline-flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <a href="{{ route('enumerator.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                    Dashboard
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Edit - Farmer Information</span>
                    </div>
                </li>
                </ol>
            </nav> --}}

			<div class="hidden sm:block" aria-hidden="true">
				<div class="py-5">
					<div class="border-t border-gray-200"></div>
				</div>
			</div>
			
			@include('components.messages')

			<!-- Validation Errors -->
			<x-auth-validation-errors class="mb-4" :errors="$errors" />

			<div class="md:grid md:grid-cols-4 md:gap-6">
				<div class="md:col-span-1">
					<div class="px-4 sm:px-0">
						<h3 class="text-lg font-medium leading-6 text-gray-900">Profile</h3>
						<p class="mt-1 text-sm text-gray-600">This information will be displayed publicly so be careful what you share.</p>
					</div>
				</div>
				<div class="mt-5 md:col-span-3 md:mt-0">
					<form action="{{ route('user-profile.update', ['user' => $user->id]) }}" method="POST" enctype="multipart/form-data">
						@csrf
						@method('patch')
						<div class="shadow sm:overflow-hidden sm:rounded-md">

							<div class="space-y-6 bg-white px-4 py-5 sm:p-6">
								<div>
									<label class="block text-sm font-medium text-gray-700">Photo</label>
									<div class="mt-1 flex items-center">
										<span class="inline-block h-12 w-12 overflow-hidden rounded-full bg-gray-100">
											<a target="_blank" href="{{ is_null($user->profile_img) ? asset('storage/farmer/avatar/default.png') : asset('storage/farmer/avatar/'.$user->profile_img) }}">
												<img id="img_page1_avatar" class="mb-3 rounded-full shadow-lg" src="{{ is_null($user->profile_img) ? asset('storage/farmer/avatar/default.png') : asset('storage/farmer/avatar/'.$user->profile_img) }}" alt="{{ $user->firstName." ".$user->lastName}}"/>
											</a>
										</span>
										<input type="file" name="input_page1_avatar" id="input_page1_avatar" hidden>
										<button onclick="triggerPage1AvatarUpload()" type="button" class="ml-5 rounded-md border border-gray-300 bg-white py-2 px-3 text-sm font-medium leading-4 text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Change</button>
									</div>
								</div>

								<div>
									<label class="block text-sm font-medium text-gray-700">Signature</label>
									<div class="mt-1 flex items-center">
										<a target="_blank" href="{{ is_null($user->signature) ? asset('storage/farmer/signature/default.png') : asset('storage/farmer/signature/'.$user->signature) }}">
											<img id="img_page1_signature" class="mb-3 h-12 w-36 rounded-lg shadow-lg" src="{{ is_null($user->signature) ? asset('storage/farmer/signature/default.png') : asset('storage/farmer/signature/'.$user->signature) }}" alt="{{ $user->firstName." ".$user->lastName}}"/>
										</a>
										<input type="file" name="input_page1_signature" id="input_page1_signature" hidden>
										<button onclick="triggerPage1SignatureUpload()" type="button" class="ml-5 rounded-md border border-gray-300 bg-white py-2 px-3 text-sm font-medium leading-4 text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Change</button>
									</div>
								</div>
					
							</div>
							<div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
								<button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="hidden sm:block" aria-hidden="true">
				<div class="py-5">
					<div class="border-t border-gray-200"></div>
				</div>
			</div>

			<div class="mt-10 sm:mt-0">
				<div class="md:grid md:grid-cols-4 md:gap-6">
					<div class="md:col-span-1">
						<div class="px-4 sm:px-0">
							<h3 class="text-lg font-medium leading-6 text-gray-900">Enumerator Information</h3>
							<p class="mt-1 text-sm text-gray-600">Use a permanent address where you can receive mail.</p>
						</div>
					</div>
					<div class="mt-5 md:col-span-3 md:mt-0">
						<form action="{{route('farmer.update', ['farmer' => $user->id] )}}" method="POST">
							@csrf
							@method('patch')
							<div class="overflow-hidden shadow sm:rounded-md">
								<div class="bg-white px-4 py-5 sm:p-6">
									<div class="grid grid-cols-6 gap-6 mt-4">

										<div class="col-span-6 sm:col-span-4">
											<div class="relative z-0 w-full mb-6 group">
												<input name="input_page1_controlnumber" id="input_page1_controlnumber" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('input_page1_controlNumber', $user->controlNumber) }}"/>
												<label for="label_page1_controlnumber" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Control Number</label>
											</div>
										</div>

										<div class="col-span-6 sm:col-span-3">
											<div class="relative z-0 w-full mb-6 group">
												<input name="input_page1_firstname" id="input_page1_firstname" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('input_page1_firstname', $user->firstName) }}" required/>
												<label for="label_page1_firstname" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First name</label>
											</div>
										</div>
						
										<div class="col-span-6 sm:col-span-3">
                                            <div class="relative z-0 w-full mb-6 group">
                                                <input name="input_page1_middlename" id="input_page1_middlename" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('input_page1_middlename', $user->middleName)}}"/>
                                                <label for="label_page1_middlename" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Middle name or M.I</label>
                                            </div>
										</div>

										<div class="col-span-6 sm:col-span-3">
										<div class="relative z-0 w-full mb-6 group">
											<input name="input_page1_lastname" id="input_page1_lastname" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('input_page1_lastname', $user->lastName)}}" required/>
											<label for="label_page1_lastname" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last name</label>
										</div>
										</div>

										<div class="col-span-6 sm:col-span-3">
										<div class="relative z-0 w-full mb-6 group">
											<input name="input_page1_suffix" id="input_page1_suffix" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('input_page1_suffix', $user->suffixName)}}"/>
											<label for="label_page1_lastname" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Suffix <small>Ex. ("Jr.", "Sr.", or "III." )</small></label>
										</div>
										</div>

										<div class="col-span-6 sm:col-span-3">
										<div class="relative z-0 w-full mb-6 group">
											<input name="input_page1_dateofbirth" id="input_page1_dateofbirth" type="date" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('input_page1_dateofbirth', $user->dateOfBirth)}}" required/>
											<label for="label_page1_dateofbirth" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Date of Birth</label>
										</div>
										</div>
										
										<div class="col-span-6 sm:col-span-3">
										<div class="relative z-0 w-full mb-6 group">
											<input name="input_page1_age" id="input_page1_age" type="number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('input_page1_age', $user->age)}}" required/>
											<label for="label_page1_age" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Age</label>
										</div>
										</div>

										<div class="col-span-6 sm:col-span-4">
											<div class="relative z-0 w-full mb-6 group">
												<input name="input_page1_phonenumber" id="input_page1_phonenumber" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('input_page1_phonenumber', $user->phoneNumber)}}"/>
												<label for="label_page1_phoneNumber" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Contact Number <small>(Ex. 09xx-xxxx-xxx)</small></label>
											</div>
										</div>

										<div class="col-span-6 sm:col-span-4">
                                            <fieldset>
												<legend class="contents text-sm font-medium text-gray-900">Role</legend>
												<p class="text-sm text-gray-500"></p>
												<div class="mt-4 space-y-4">
													<div class="flex items-center">
														<input id="input_page1_role-admin" name="input_page1_role" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500" value="Admin" {{ old('input_page1_role', $user->role) == "admin" ? 'checked' : '' }}>
														<label for="input_page1_role" class="ml-3 block text-sm font-medium text-gray-700">Admin</label>
													</div>
													<div class="flex items-center">
														<input id="input_page1_role-enumerator" name="input_page1_role" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500" value="Enumerator" {{ old('input_page1_role', $user->role) == "enumerator" ? 'checked' : '' }}>
														<label for="input_page1_role" class="ml-3 block text-sm font-medium text-gray-700">Enumerator</label>
													</div>
												</div>
											</fieldset>
										</div>  

										<div class="col-span-6 sm:col-span-4">
											<fieldset>
												<legend class="contents text-sm font-medium text-gray-900">Sex</legend>
												<p class="text-sm text-gray-500"></p>
												<div class="mt-4 space-y-4">
													<div class="flex items-center">
														<input id="input_page1_sex-male" name="input_page1_sex" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500" value="Male" {{ old('input_page1_sex', $user->sex) == "Male" ? 'checked' : '' }}>
														<label for="input_page1_sex" class="ml-3 block text-sm font-medium text-gray-700">Male</label>
													</div>
													<div class="flex items-center">
														<input id="input_page1_sex-female" name="input_page1_sex" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500" value="Female" {{ old('input_page1_sex', $user->sex) == "Female" ? 'checked' : '' }}>
														<label for="input_page1_sex" class="ml-3 block text-sm font-medium text-gray-700">Female</label>
													</div>
												</div>
											</fieldset>
										</div>

										<div class="col-span-6 sm:col-span-4">
											<div class="relative z-0 w-full mb-6 group">
												<input name="input_page1_country" id="input_page1_country" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ empty(old('input_page1_country', $user->country)) ? 'Philippines' : old('input_page1_country', $user->country) }}" required/>
												<label for="label_page1_country" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Country</label>
											</div>
										</div>

										<div class="col-span-6 sm:col-span-4">
											<div class="relative z-0 w-full mb-6 group">
												<input name="input_page1_streetaddress" id="input_page1_streetaddress" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('input_page1_streetaddress', $user->streetAddress) }}" required/>
												<label for="label_page1_streetAddress" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Street Address</label>
											</div>
										</div>

										<div class="col-span-6 sm:col-span-4">
											<label class="block text-sm font-medium text-gray-700">
											Province
											</label>
											<div class="relative mt-2">
												<select id="input_page1_province" name="input_page1_province" onchange="selectPage1Province(event)" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
													<option id="option_page1_province_default" value="default" {{ old('input_page1_province') == 'default' ? 'selected' : ''}}>-- Select Province --</option>
													<optgroup label="Region V">
														@foreach ($provinces as $province)
															<option value="{{ $province->id }}" {{ old('input_page1_province', $user->province_id) == $province->id ? 'selected' : ''}}>{{ utf8_decode($province->province) }}</option>
														@endforeach
													</optgroup>
												</select>
											</div>
										</div>
										
										<div class="col-span-6 sm:col-span-4">
											<label class="block text-sm font-medium text-gray-700">
												City
											</label>
											<div class="relative mt-2">
												<select id="input_page1_city" name="input_page1_city" onchange="selectPage1City(event)" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" {{ empty(old('input_page1_city', $user->city_id)) || old('input_page1_city', $user->city_id) == 'default' ? 'disabled' : '' }}>
													<option id="option_page1_city_default" value="default" {{ old('input_page1_city', $user->city_id) == 'default' ? 'selected' : '' }} required>-- Select City --</option>
													@if (isset($provinces) && $provinces->count() > 0)
														@foreach ($provinces as $province)
															@if ($province->cities->count() > 0)
															<optgroup id="province-{{ $province->id }}" label="{{$province->province }}" {{ old('input_page1_province', $user->province_id) == $province->id ? '' : 'hidden'}}>
																@foreach ($province->cities()->get() as $city)
																	<option value="{{$city->id}}" {{ old('input_page1_city', $user->city_id) == $city->id ? 'selected' : '' }}>{{ utf8_decode($city->city) }}</option>
																@endforeach
															</optgroup> 
															@endif 
														@endforeach
													@endif
												</select>
											</div>
										</div>

										<div class="col-span-6 sm:col-span-4">
											<label class="block text-sm font-medium text-gray-700">
												Municipality
											</label>
											<div class="relative mt-2">
												<select id="input_page1_municipality" name="input_page1_municipality" onchange="selectPage1Municipality(event)" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" {{ empty(old('input_page1_municipality', $user->municipality_id)) || old('input_page1_municipality', $user->municipality_id) == 'default' ? 'disabled' : '' }} required>
													<option id="option_page1_municipality_default" value="default" {{ old('input_page1_municipality', $user->municipality_id) == 'default' ? 'selected' : '' }}>-- Select Municipality --</option>
													@if (isset($provinces) && $provinces->count() > 0)
														@foreach ($provinces as $province)
															@if ($province->municipalities->count() > 0)
															<optgroup id="province-{{$province->id}}" label="{{$province->province}}" {{ old('input_page1_province', $user->province_id) == $province->id ? '' : 'hidden'}}>
																@foreach ($province->municipalities()->get() as $municipality)
																	<option value="{{$municipality->id}}" {{ old('input_page1_municipality', $user->municipality_id) == $municipality->id ? 'selected' : '' }}>{{ utf8_decode($municipality->municipality) }}</option>
																@endforeach
															</optgroup> 
															@endif 
														@endforeach
													@endif
												</select>
											</div>
										</div>
										<div class="col-span-6 sm:col-span-4">
											<label class="block text-sm font-medium text-gray-700">
												Barangay
											</label>

											<div class="relative mt-2">
												<select id="input_page1_barangay" name="input_page1_barangay" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" {{ empty(old('input_page1_barangay', $user->barangay_id)) || old('input_page1_barangay', $user->barangay_id) == 'default' ? 'disabled' : old('input_page1_barangay', $user->barangay_id) }} required>
												<option id="option_page1_barangay_default" value="default" {{ old('input_page1_barangay', $user->barangay_id) == 'default' ? 'selected' : '' }}>-- Select Barangay --</option>
												
												@if (isset($provinces) && $provinces->count() > 0)
													@foreach ($provinces as $province)
														@if ($province->cities()->count() > 0)
															@foreach ($province->cities()->get() as $city)
															@if ($city->barangays()->where('entity_id', 2)->count() > 0)
																<optgroup id="city-{{ $city->id }}" label="{{$city->city}}" {{ old('input_page1_city', $user->city_id) == $city->id ? '' : 'hidden' }}>
																	@foreach ($city->barangays()->where('entity_id', 2)->get() as $barangay)
																		<option value="{{$barangay->id}}" {{ old('input_page1_barangay', $user->barangay_id) == $barangay->id ? 'selected' : ''}}>{{ utf8_decode($barangay->barangay) }}</option>
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
																<optgroup id="municipality-{{ $municipality->id }}" label=" {{$municipality->municipality}}" {{ old('input_page1_municipality', $user->municipality_id) == $municipality->id ? '' : 'hidden' }}>
																	@foreach ($municipality->barangays()->where('entity_id', 3)->get() as $barangay)
																		<option value="{{$barangay->id}}" {{ old('input_page1_barangay', $user->barangay_id) == $barangay->id ? 'selected' : ''}}>{{ utf8_decode($barangay->barangay) }}</option>
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
								</div>
								
								<div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
									<button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

		</div>
	</div>
</x-app-layout>

<script>
  function triggerPage1AvatarUpload(event)
  {
      
	const inputPage1Avatar = document.getElementById('input_page1_avatar');
	inputPage1Avatar.click();

	inputPage1Avatar.addEventListener("change", function(){
		var selectedFile = inputPage1Avatar.files[0];
		var image = URL.createObjectURL(inputPage1Avatar.files[0]);

		document.getElementById('img_page1_avatar').src = image;

  	});

  }

  function triggerPage1SignatureUpload(event)
  {
      
	const inputPage1Signature = document.getElementById('input_page1_signature');
	inputPage1Signature.click();

	inputPage1Signature.addEventListener("change", function(){
		var selectedFile = inputPage1Signature.files[0];
		var image = URL.createObjectURL(inputPage1Signature.files[0]);

		document.getElementById('img_page1_signature').src = image;

  	});

  }
</script>

<script>
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

        if(value == "default")
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

        if(value == "default")
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

</script>
