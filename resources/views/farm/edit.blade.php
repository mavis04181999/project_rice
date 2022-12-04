<x-app-layout>
	<div class="flex min-h-screen bg-gray-100">
		<div class="mt-4 mb-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
			@include('components.messages')

			<x-auth-validation-errors class="mb-4" :errors="$errors" />

			{{-- BreadCrumbs --}}
			<nav class="flex" aria-label="Breadcrumb">
				<ol class="inline-flex items-center space-x-1 md:space-x-3">
				  <li class="inline-flex items-center">
					<a href="{{ route('enumerator.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
					  Dashboard
					</a>
				  </li>
				  <li>
					<div class="flex items-center">
					  <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
					  <a href="{{ route('farmer.show', ['farmer' => $farm->farmer_id]) }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Farmer Profile</a>
					</div>
				  </li>
				  <li aria-current="page">
					<div class="flex items-center">
					  <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
					  <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Edit - Farm Information</span>
					</div>
				  </li>
				</ol>
			</nav>

			<div class="hidden sm:block" aria-hidden="true">
				<div class="py-5">
					<div class="border-t border-gray-200"></div>
				</div>
			</div>
			  

			<div class="md:grid md:grid-cols-4 md:gap-6">
				<div class="md:col-span-1">
					<div class="px-4 sm:px-0">
						<h3 class="text-lg font-medium leading-6 text-gray-900">Farm Information</h3>
						<p class="mt-1 text-sm text-gray-600">This information will be displayed publicly so be careful what you share.</p>
					</div>
				</div>
				<div class="mt-5 md:col-span-3 md:mt-0">
					<form action="{{ route('farm-information.update', ['farm' => $farm->id]) }}" method="POST">
						@csrf
						@method('patch')
						<div class="overflow-hidden shadow sm:rounded-md">
							<div class="bg-white px-4 py-5 sm:p-6">
								<div class="grid grid-cols-6 gap-6 mt-4">
									
									<div class="col-span-6 sm:col-span-4">
										<div class="relative z-0 w-full mb-6 group">
											<input name="input_page2_country" id="input_page2_country" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ empty(old('input_page2_country', $farm->country)) ? 'Philippines' : old('input_page2_country', $farm->country) }}" required/>
											<label for="label_page2_country" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Country</label>
										</div>
									</div>

									<div class="col-span-6 sm:col-span-6">
										<div class="relative z-0 w-full mb-6 group">
											<input name="input_page2_streetaddress" id="input_page2_streetaddress" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('input_page2_streetaddress', $farm->streetAddress) }}" required/>
											<label for="label_page2_streetaddress" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Street Address</label>
										</div>
									</div>

									<div class="col-span-6 sm:col-span-4">
										<label class="block text-sm font-medium text-gray-700">
											Province
										</label>
										<div class="relative mt-2">
											<select id="input_page2_province" name="input_page2_province" onchange="selectPage2Province(event)" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
											<option selected id="option_page2_province_default" value="default">-- Select Province --</option>
												<optgroup label="Region V">
													@if (isset($provinces) && !empty($provinces))
														@foreach ($provinces as $province)
															<option value="{{ $province->id }}" {{ old('input_page2_province', $farm->province_id) == $province->id ? 'selected' : ''}}>{{ utf8_decode($province->province) }}</option>
														@endforeach
													@endif
												</optgroup>
											</select>
										</div>
									</div>

									<div class="col-span-6 sm:col-span-4">
										<label class="block text-sm font-medium text-gray-700">
											City
										</label>
										<div class="relative mt-2">
											<select id="input_page2_city" name="input_page2_city" onchange="selectPage2City(event)" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" {{ empty(old('input_page2_city', $farm->city_id)) || old('input_page2_city', $farm->city_id) == 'default' ? 'disabled' : ''}} required>
											<option id="option_page2_city_default" value="default" {{ empty(old('input_page2_city', $farm->city_id)) || old('input_page2_city', $farm->city_id) == 'default' ? 'selected' : ''}}>-- Select City --</option>
												@if (isset($provinces) && !empty($provinces))
													@foreach ($provinces as $province)
														@if (isset($province->cities) && !empty($province->cities))
															<optgroup id="province-{{$province->id}}" label="{{$province->province}}" {{ old('input_page2_province', $farm->province_id) == $province->id ? '' : 'hidden'}}>
																@foreach ($province->cities()->get() as $city)
																	<option value="{{ $city->id }}" {{ old('input_page2_city', $farm->city_id) == $city->id ? 'selected' : ''}}>{{ utf8_decode($city->city) }}</option>
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
											<select id="input_page2_municipality" name="input_page2_municipality" onchange="selectPage2Municipality(event)" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" {{ empty(old('input_page2_municipality', $farm->municipality_id)) || old('input_page2_municipality', $farm->municipality_id) == 'default' ? 'disabled' : ''}} required>
												<option id="option_page2_municipality_default" value="default" {{ empty(old('input_page2_municipality', $farm->municipality_id)) || old('input_page2_municipality', $farm->municipality_id) == 'default' ? 'selected' : ''}}>-- Select Municipality --</option>
												@if (isset($provinces) && !empty($provinces))
													@foreach ($provinces as $province)
														@if (isset($province->municipalities) && !empty($province->municipalities))
														<optgroup id="province-{{$province->id}}" label="{{$province->province}}" {{ old('input_page2_province', $farm->province_id) == $province->id ? '' : 'hidden' }}>
															@foreach ($province->municipalities()->get() as $municipality)
																<option value="{{ $municipality->id }}" {{ old('input_page2_municipality', $farm->municipality_id) == $municipality->id ? 'selected' : ''}}>{{ utf8_decode($municipality->municipality) }}</option>
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
											<select id="input_page2_barangay" name="input_page2_barangay" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" {{ empty(old('input_page2_barangay', $farm->barangay_id)) || old('input_page2_barangay', $farm->barangay_id) == 'default' ? 'disabled' : ''}} required>
												<option id="option_page2_barangay_default" value="default" {{ empty(old('input_page2_barangay', $farm->barangay_id)) || old('input_page2_barangay', $farm->barangay_id) == 'default' ? 'selected' : ''}}>-- Select Barangay --</option>
												@if (isset($provinces) && !empty($provinces))
													@foreach ($provinces as $province)
														@if (isset($province->cities) && !empty($province->cities))
															@foreach ($province->cities()->get() as $city)
																@if ($city->barangays()->where('entity_id', 2)->count() > 0)
																<optgroup id="city-{{$city->id}}" label="{{$city->city}}" {{ old('input_page2_city', $farm->city_id) == $city->id ? '' : 'hidden'}}>
																	@foreach ($city->barangays()->where('entity_id', 2)->get() as $barangay)
																		<option value="{{$barangay->id}}" {{ old('input_page2_barangay', $farm->barangay_id) == $barangay->id ? 'selected' : ''}}>{{ utf8_decode($barangay->barangay) }}</option>
																	@endforeach
																</optgroup>
																@endif
															@endforeach
														@endif
													@endforeach
												@endif
		
												@if (isset($provinces) && $provinces->count() > 0)
													@foreach ($provinces as $province)
														@if (isset($province->municipalities) && !empty($province->municipalities))
															@foreach ($province->municipalities()->get() as $municipality)
																@if ($municipality->barangays()->where('entity_id', 3)->count() > 0)
																<optgroup id="municipality-{{$municipality->id}}" label="{{$municipality->municipality}}" {{ old('input_page2_municipality', $farm->municipality_id) == $municipality->id ? '' : 'hidden'}}>
																	@foreach ($municipality->barangays()->where('entity_id', 3)->get() as $barangay)
																		<option value="{{$barangay->id}}" {{ old('input_page1_barangay', $farm->barangay_id) == $barangay->id ? 'selected' : ''}}>{{ utf8_decode($barangay->barangay) }}</option>
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
					
									<div class="col-span-6 sm:col-span-4">
										<fieldset>
											<legend class="contents text-sm font-medium text-gray-900">Land Tenurial Status</legend>
											<p class="text-sm text-gray-500"></p>
											<div class="mt-4 space-y-4">
												@if (isset($optionsLandTenurialStatus) && !empty($optionsLandTenurialStatus))
													@foreach ($optionsLandTenurialStatus as $landTenurialStatus)
														<div class="flex">
															<div class="flex items-center mr-4">
																<input name="input_page2_landtenurialstatus" id="input_page2_landtenurialstatus_opt{{$landTenurialStatus->position}}" type="radio" value="{{$landTenurialStatus->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ intval(old('input_page2_landtenurialstatus', $farm->landTenurialStatus_id)) == $landTenurialStatus->id ? 'checked' : '' }} required>
																<label for="input_page2_landtenurialstatus_opt{{$landTenurialStatus->position}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{utf8_decode($landTenurialStatus->Picklistitem)}}</label>
															</div>
															@if ($landTenurialStatus->position == 4)
																<div class="flex items-center mr-4">
																	<input name="input_page2_landtenurialstatus_specify" id="input_page2_landtenurialstatus_specify" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Please Specify" value="{{ old('input_page2_landtenurialstatus_specify', $farm->landTenurialStatus_specify) }}" {{ intval(old('input_page2_landtenurialstatus', $farm->landTenurialStatus_id)) == 30 ? '' : 'disabled' }}/>
																</div>                                                    
															@endif
														</div>
													@endforeach
												@endif
											</div>
										</fieldset>
									</div>

									<div class="col-span-6 sm:col-span-4">
										<div class="relative z-0 w-full mb-6 group">
											<input name="input_page2_totalricearea" id="input_page2_totalricearea" type="number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " min="0" value="{{ intval(old('inut_page2_totalricearea', $farm->totalRiceArea)) }}" step="any" required/>
											<label for="label_page2_totalricearea" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Total Rice Area Including Stress Area (Ha)</label>
										</div>
									</div>

									<div class="col-span-6 sm:col-span-4">
										<div class="relative z-0 w-full mb-6 group">
                                            <input name="input_page2_totalstressarea" id="input_page2_totalstressarea" type="number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " min="0" value="{{ intval(old('input_page2_totalstressarea', $farm->totalStressArea)) }}" step="any" required/>
                                            <label for="label_page2_totalstressarea" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Total Stress Area:</label>
                                        </div>
									</div>

									<div class="col-span-6 sm:col-span-6">
										<div class="px-4 sm:px-0">
											<h3 class="text-md font-bold leading-6 text-gray-900">Production of Palay under Normal Condition during Dry Season (September 15 - March 15)</h3>
										</div>
									</div>

									<div class="col-span-6 sm:col-span-4">
										<div class="relative z-0 w-full mb-6 group center">
                                            <input type="number" name="input_page2_pp_ds_unc_question1" id="input_page2_pp_ds_unc_question1" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " min="0" value="{{ intval(old('input_page2_pp_ds_unc_question1', $farm->pp_ds_unc_question1)) }}" step="any" required/>
                                            <label for="label_page2_pp_ds_unc_question1" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">1. Average Yield based on Actual Area(Bag/Ha)</label>
                                        </div>
									</div>

									<div class="col-span-6 sm:col-span-4">
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="number" name="input_page2_pp_ds_unc_question2" id="input_page2_pp_ds_unc_question2" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " min="0" value="{{ intval(old('input_page2_pp_ds_unc_question2', $farm->pp_ds_unc_question2)) }}" step="any" required/>
                                            <label for="label_page2_pp_ds_unc_question2" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">2. Average Yield of Palay (Kg/Bag)</label>
                                        </div>
									</div>

									<div class="col-span-6 sm:col-span-4">
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="number" name="input_page2_pp_ds_unc_question3" id="input_page2_pp_ds_unc_question3" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " min="0" value="{{ intval(old('input_page2_pp_ds_unc_question3', $farm->pp_ds_unc_question3)) }}" step="any" required/>
                                            <label for="label_page2_pp_ds_unc_question3" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">3. Production Cost (PHP 0.00)</label>
                                        </div>
									</div>

									<div class="col-span-6 sm:col-span-4">
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="number" name="input_page2_pp_ds_unc_question4" id="input_page2_pp_ds_unc_question4" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " min="0" value="{{ intval(old('input_page2_pp_ds_unc_question4', $farm->pp_ds_unc_question4)) }}" step="any" required/>
                                            <label for="label_page2_pp_ds_unc_question4" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">4. Price of Palay per Kg (PHP 0.00)</label>
                                        </div>
									</div>

									<div class="col-span-6 sm:col-span-6">
										<div class="px-4 sm:px-0 mb-6">
											<h3 class="text-md font-bold leading-6 text-gray-900">Production of Palay under Stress Condition during Dry Season (September 15 - March 15)</h3>
										</div>
									</div>

									<div class="col-span-6 sm:col-span-4">
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="number" name="input_page2_pp_ds_usc_question1" id="input_page2_pp_ds_usc_question1" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " min="0" value="{{ intval(old('input_page2_pp_ds_usc_question1', $farm->pp_ds_usc_question1)) }}" step="any" required/>
                                            <label for="label_page2_pp_ds_usc_question1" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Average Yield based on Actual Area (Bag/Ha)</label>
                                        </div>
									</div>

									<div class="col-span-6 sm:col-span-4">
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="number" name="input_page2_pp_ds_usc_question2" id="input_page2_pp_ds_usc_question2" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " min="0" value="{{ intval(old('input_page2_pp_ds_usc_question2', $farm->pp_ds_usc_question2)) }}" step="any" required/>
                                            <label for="input_page2_pp_ds_usc_question2" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Average Yield of Palay (Kg/Bag)</label>
                                        </div>
									</div>

									<div class="col-span-6 sm:col-span-4">
										<div class="relative z-0 w-full mb-6 group">
											<input type="number" name="input_page2_pp_ds_usc_question3" id="input_page2_pp_ds_usc_question3" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " min="0" value="{{ intval(old('input_page2_pp_ds_usc_question3', $farm->pp_ds_usc_question3)) }}" step="any" required/>
											<label for="input_page2_pp_ds_usc_question3" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Production Cost (PHP 0.00)</label>
										</div>
									</div>

									<div class="col-span-6 sm:col-span-4">
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="number" name="input_page2_pp_ds_usc_question4" id="input_page2_pp_ds_usc_question4" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " min="0" value="{{ intval(old('input_page2_pp_ds_usc_question4', $farm->pp_ds_usc_question4)) }}" step="any" required/>
                                            <label for="input_page2_pp_ds_usc_question4" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Price of Palay per Kg (PHP 0.00)</label>
                                        </div>
									</div>

									<div class="col-span-6 sm:col-span-6">
										<div class="px-4 sm:px-0 mb-6">
											<h3 class="text-md font-bold leading-6 text-gray-900">Production of Palay under Normal Condition during Wet Season (March 16 - September 14)</h3>
										</div>
									</div>

									<div class="col-span-6 sm:col-span-4">
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input name="input_page2_pp_ws_unc_question1" id="input_page2_pp_ws_unc_question1" type="number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " min="0" value="{{ intval(old('input_page2_pp_ws_unc_question1', $farm->pp_ws_unc_question1)) }}" step="any" required/>
                                            <label for="label_page2_pp_ws_unc_question1" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Average Yield based on Actual Area(Bag/Ha)</label>
                                        </div>
									</div>

									<div class="col-span-6 sm:col-span-4">
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="number" name="input_page2_pp_ws_unc_question2" id="input_page2_pp_ws_unc_question2" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " min="0" value="{{ intval(old('input_page2_pp_ws_unc_question2', $farm->pp_ws_unc_question2)) }}" step="any" required/>
                                            <label for="label_page2_pp_ws_unc_question2" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Average Yield of Palay(Kg/Bag)</label>
                                        </div>
									</div>

									<div class="col-span-6 sm:col-span-4">
										<div class="relative z-0 w-full mb-6 group">
											<input type="number" name="input_page2_pp_ws_unc_question3" id="input_page2_pp_ws_unc_question3" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " min="0" value="{{ intval(old('input_page2_pp_ws_unc_question3', $farm->pp_ws_unc_question3)) }}" step="any" required/>
											<label for="label_page2_pp_ws_unc_question3" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Production Cost (PHP 0.00)</label>
										</div>
									</div>

									<div class="col-span-6 sm:col-span-4">
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="number" name="input_page2_pp_ws_unc_question4" id="input_page2_pp_ws_unc_question4" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " min="0" value="{{ intval(old('input_page2_pp_ws_unc_question4', $farm->pp_ws_unc_question4)) }}" step="any" required/>
                                            <label for="label_page2_pp_ws_unc_question4" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Price of Palay per Kg (PHP 0.00)</label>
                                        </div>
									</div>

									<div class="col-span-6 sm:col-span-6">
										<div class="px-4 sm:px-0 mb-6">
											<h3 class="text-md font-bold leading-6 text-gray-900">Production of Palay under Stress Condition during Wet Season (March 16 - September 14)</h3>
										</div>
									</div>

									<div class="col-span-6 sm:col-span-4">
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="number" name="input_page2_pp_ws_usc_question1" id="input_page2_pp_ws_usc_question1" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " min="0" value="{{ intval(old('input_page2_pp_ws_usc_question1', $farm->pp_ws_usc_question1)) }}" step="any" required/>
                                            <label for="label_page2_pp_ws_usc_question1" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Average Yield based on Actual Area (Bag/Ha)</label>
                                        </div>
									</div>

									<div class="col-span-6 sm:col-span-4">
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input name="input_page2_pp_ws_usc_question2" id="input_page2_pp_ws_usc_question2" type="number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " min="0" value="{{ intval(old('input_page2_pp_ws_usc_question2', $farm->pp_ws_usc_question2)) }}" step="any" required/>
                                            <label for="label_page2_pp_ws_usc_question2" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Average Yield of Palay (Kg/Bag)</label>
                                        </div>
									</div>

									<div class="col-span-6 sm:col-span-4">
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="number" name="input_page2_pp_ws_usc_question3" id="input_page2_pp_ws_usc_question3" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " min="0" value="{{ intval(old('input_page2_pp_ws_usc_question3', $farm->pp_ws_usc_question3)) }}" step="any" required/>
                                            <label for="input_page2_pp_ws_usc_question3" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Production Cost (PHP 0.00)</label>
                                        </div>
									</div>

									<div class="col-span-6 sm:col-span-4">
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="number" name="input_page2_pp_ws_usc_question4" id="input_page2_pp_ws_usc_question4" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " min="0" value="{{ intval(old('input_page2_pp_ws_usc_question4', $farm->pp_ws_usc_question4)) }}" step="any" required/>
                                            <label for="input_page2_pp_ws_usc_question4" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Price of Palay per Kg (PHP 0.00)</label>
                                        </div>
									</div>

									<div class="col-span-6 sm:col-span-4">
										<fieldset>
											<legend class="contents text-sm font-medium text-gray-900">Ecosystem</legend>
											<p class="text-sm text-gray-500"></p>
											<div class="mt-4 space-y-4">
												<div class="flex">
                                                    <div class="flex items-center mr-4">
                                                        <input name="input_page2_ecosystem" id="input_page2_ecosystem_opt1" type="radio" value="Irrigated" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ old('input_page2_ecosystem', $farm->ecosystem) == 'Irrigated' ? 'checked' : ''}} required>
                                                        <label for="label_farm_ecosystem_opt1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Irrigated</label>
                                                    </div>
                                                </div>
                                                <div class="flex">
                                                    <div class="flex items-center mr-4">
                                                        <input name="input_page2_ecosystem" id="input_page2_ecosystem_opt2" type="radio" value="Rainfed" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ old('input_page2_ecosystem', $farm->ecosystem) == 'Rainfed' ? 'checked' : ''}}>
                                                        <label for="label_farm_ecosystem_opt2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Rainfed</label>
                                                    </div>
                                                </div>
                                                <div class="flex">
                                                    <div class="flex items-center mr-4">
                                                        <input name="input_page2_ecosystem" id="input_page2_ecosystem_opt3" type="radio" value="Upland" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ old('input_page2_ecosystem', $farm->ecosystem) == 'Upland' ? 'checked' : ''}}>
                                                        <label for="label_farm_ecosystem_opt3" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Upland</label>
                                                    </div>
                                                </div>
											</div>
										</fieldset>
									</div>

									<div class="col-span-6 sm:col-span-4">
										<fieldset>
											<legend class="contents text-sm font-medium text-gray-900">Stress Ecosystem</legend>
											<p class="text-sm text-gray-500"></p>
											<div class="mt-4 space-y-4">
												<div class="flex">
                                                    <div class="flex items-center mr-4">
                                                        <input name="input_page2_stressecosystem[]" id="input_page2_stressecosystem_opt1" onclick="renderExtraPage(event)" type="checkbox" value="0" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('input_page2_stressecosystem', $farm->stressEcosystem)) ? '' : (in_array(0, old('input_page2_stressecosystem', $farm->stressEcosystem)) ? 'checked' : '')}} required>
                                                        <label for="input_page2_stressecosystem_opt1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Flooded/Submerged</label>
                                                    </div>
                                                </div>
                                                <div class="flex">
                                                    <div class="flex items-center mr-4">
                                                        <input name="input_page2_stressecosystem[]" id="input_page2_stressecosystem_opt2" onclick="renderExtraPage(event)" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('input_page2_stressecosystem', $farm->stressEcosystem)) ? '' : (in_array(1, old('input_page2_stressecosystem', $farm->stressEcosystem)) ? 'checked' : '')}}>
                                                        <label for="input_page2_stressecosystem_opt2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Saline</label>
                                                    </div>
                                                </div>
                                                <div class="flex">
                                                    <div class="flex items-center mr-4">
                                                        <input name="input_page2_stressecosystem[]" id="input_page2_stressecosystem_opt3" onclick="renderExtraPage(event)" type="checkbox" value="2" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('input_page2_stressecosystem', $farm->stressEcosystem)) ? '' : (in_array(2, old('input_page2_stressecosystem', $farm->stressEcosystem)) ? 'checked' : '')}}>
                                                        <label for="input_page2_stressecosystem_opt3" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Drought</label>
                                                    </div>
                                                </div>
											</div>
										</fieldset>
									</div>

								</div>
							</div>
							
							<div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
								<button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Update Farm Information</button>
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

			<form action="{{ route('farm_extended-information.update', ['farm_extended' => $farm->farm_extended->id]) }}" method="POST">
				@csrf
				@method('patch')

				<input type="hidden" name="farm_extended_id" value="{{ $farm->farm_extended->id }}">

				<div id="page3-content" class="md:grid md:grid-cols-4 md:gap-6"  style="display: {{ empty(old('input_page2_stressecosystem', $farm->stressEcosystem)) ? 'none' : (in_array(0, old('input_page2_stressecosystem', $farm->stressEcosystem)) ? 'content' : 'none')}}">
					<div class="md:col-span-1">
						<div class="px-4 sm:px-0">
							<h3 class="text-lg font-medium leading-6 text-gray-900">C. Flooding/Submergence Ecosystem</h3>
							<p class="mt-1 text-sm text-gray-600">This information will be displayed publicly so be careful what you share.</p>
						</div>
					</div>
					<div class="mt-5 md:col-span-3 md:mt-0">
						
						<div class="overflow-hidden shadow sm:rounded-md">
							<div class="bg-white px-4 py-5 sm:p-6">
								<div class="grid grid-cols-6 gap-6 mt-4">
									
									<div class="col-span-6 sm:col-span-4">
										<fieldset>
											<legend class="contents text-sm font-medium text-gray-900">Source/Cause of Floods</legend>
											<p class="text-sm text-gray-500"></p>
											<div class="mt-4 space-y-4">
												@if (isset($optionsSourceOfFloods) && !empty($optionsSourceOfFloods))
													@foreach ($optionsSourceOfFloods as $sourceOfFlood)
														<div class="flex">
															<div class="flex items-center mr-4">
																<input name="input_page3_source[]" id="input_page3_source_opt{{ $sourceOfFlood->position }}" type="checkbox" value="{{ $sourceOfFlood->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('input_page3_source', $farm->farm_extended->page3_source_id)) ? '' : (in_array($sourceOfFlood->id, old('input_page3_source', $farm->farm_extended->page3_source_id)) ? 'checked' : '')}}>
																<label for="label_input_page3_source_opt{{$sourceOfFlood->position}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{utf8_decode($sourceOfFlood->Picklistitem)}}</label>
															</div>
															@if ($sourceOfFlood->position == 5)
																<div class="flex items-center mr-4">
																	<input name="input_page3_source_specify" id="input_page3_source_specify" type="text" class="block py-2.5 px-0 w-full text-xs text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Please Specify" value="{{ old('input_page3_source_specify', $farm->farm_extended->page3_source_specify) }}" {{ empty(old('input_page3_source', $farm->farm_extended->page3_source_id)) ? 'disabled' : ( in_array($sourceOfFlood->id, old('input_page3_source', $farm->farm_extended->page3_source_id)) ? '' : 'disabled') }}/>
																</div>
															@endif
														</div>
													@endforeach
												@endif
											</div>
										</fieldset>
									</div>

									<div class="col-span-6 sm:col-span-4">
										<fieldset>
											<legend class="contents text-sm font-medium text-gray-900">How frequent does flooding occurs for the past 5 years</legend>
											<p class="text-sm text-gray-500"></p>
											<div class="mt-4 space-y-4">
												@if (isset($optionsFrequency) && !empty($optionsFrequency))
													@foreach ($optionsFrequency as $frequency)
														<div class="flex">
															<div class="flex items-center mr-4">
																<input name="input_page3_frequency[]" id="input_page3_frequency_opt{{ $frequency->position }}" type="checkbox" value="{{ $frequency->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('input_page3_frequency', $farm->farm_extended->page3_frequency)) ? '' : (in_array($frequency->id, old('input_page3_frequency', $farm->farm_extended->page3_frequency)) ? 'checked' : '')}}>
																<label for="label_flood_source_opt{{$frequency->position}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{utf8_decode($frequency->Picklistitem)}}</label>
															</div>
														</div>
													@endforeach
												@endif
											</div>
										</fieldset>
									</div>

									<div class="col-span-6 sm:col-span-6">
										<div class="px-4 sm:px-0">
											<h3 class="text-md font-bold leading-6 text-gray-900">Types of Flood exprienced</h3>
										</div>
									</div>

									{{-- Flashflood --}}

									<div class="col-span-6 sm:col-span-6">
										<div class="flex items-center mr-4">
											<input onchange="page3FloodTypeCheckBox(event, 'flashflood')" name="checkbox_page3_flashflood" id="checkbox_page3_flashflood" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ intval(old('checkbox_page3_flashflood')) == intval(1) || (!empty($farm->farm_extended->page3_flashflood_waterlevel) || !empty($farm->farm_extended->page3_flashflood_days) || !empty($farm->farm_extended->page3_flashflood_hours)) ? 'checked' : ''}}>
											<label for="label_page3_flashflood" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Flashflood</label>
										</div>
									</div>

									<div class="col-span-6 sm:col-span-4">
										<div class="flex items-center mr-4">
											<input name="input_page3_flashflood_waterlevel" id="input_page3_flashflood_waterlevel" type="number" class="ml-4 block py-2.5 px-0 w-full text-xs text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Water Level (cm)" {{ intval(old('checkbox_page3_flashflood')) == intval(1) || (!empty($farm->farm_extended->page3_flashflood_waterlevel) || !empty($farm->farm_extended->page3_flashflood_days) || !empty($farm->farm_extended->page3_flashflood_hours)) ? '' : 'disabled' }} value="{{ old('input_page3_flashflood_waterlevel', $farm->farm_extended->page3_flashflood_waterlevel) }}"/>
											<label for="label_page3_flashflood" class="w-full ml-2 text-xs font-medium text-gray-900 dark:text-gray-300">Water Level (cm)</label>
										</div>
									</div>

									<div class="col-span-6 sm:col-span-4">
										<div class="flex items-center mr-4">
											<input name="input_page3_flashflood_days" id="input_page3_flashflood_days" type="number" class="ml-4 block py-2.5 px-0 w-full text-xs text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Day(s)" {{ intval(old('checkbox_page3_flashflood')) == intval(1) || (!empty($farm->farm_extended->page3_flashflood_waterlevel) || !empty($farm->farm_extended->page3_flashflood_days) || !empty($farm->farm_extended->page3_flashflood_hours)) ? '' : 'disabled' }} value="{{ old('input_page3_flashflood_days', $farm->farm_extended->page3_flashflood_days) }}"/>
											<label for="label_page3_flashflood" class="w-full ml-2 text-xs font-medium text-gray-900 dark:text-gray-300">Duration (No. of Days)</label>
										</div>
									</div>

									<div class="col-span-6 sm:col-span-4">
										<div class="flex items-center mr-4">
											<input name="input_page3_flashflood_hours" id="input_page3_flashflood_hours" type="number" class="ml-4 block py-2.5 px-0 w-full text-xs text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Hour(s)" {{ intval(old('checkbox_page3_flashflood')) == intval(1) || (!empty($farm->farm_extended->page3_flashflood_waterlevel) || !empty($farm->farm_extended->page3_flashflood_days) || !empty($farm->farm_extended->page3_flashflood_hours)) ? '' : 'disabled' }} value="{{ old('input_page3_flashflood_hours', $farm->farm_extended->page3_flashflood_hours) }}"/>
											<label for="label_page3_flashflood" class="w-full ml-2 text-xs font-medium text-gray-900 dark:text-gray-300">Duration (No. of Hours)</label>
										</div>
									</div>

									{{-- Intermittent --}}

									<div class="col-span-6 sm:col-span-6">
										<div class="flex items-center mr-4">
											<input onchange="page3FloodTypeCheckBox(event, 'intermittent')" name="checkbox_page3_intermittent" id="checkbox_page3_intermittent" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ intval(old('checkbox_page3_intermittent')) == intval(1) || (!empty($farm->farm_extended->page3_intermittent_waterlevel) || !empty($farm->farm_extended->page3_intermittent_days) || !empty($farm->farm_extended->page3_intermittent_hours)) ? 'checked' : '' }}>
											<label for="label_page3_intermittent" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Intermittent</label>
										</div>
									</div>

									<div class="col-span-6 sm:col-span-4">
										<div class="flex items-center mr-4">
											<input name="input_page3_intermittent_waterlevel" id="input_page3_intermittent_waterlevel" type="number" class="ml-4 block py-2.5 px-0 w-full text-xs text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Water Level (cm)" value="{{ old('input_page3_intermittent_waterlevel', $farm->farm_extended->page3_intermittent_waterlevel) }}" {{ intval(old('checkbox_page3_intermittent')) == intval(1) || (!empty($farm->farm_extended->page3_intermittent_waterlevel) || !empty($farm->farm_extended->page3_intermittent_days) || !empty($farm->farm_extended->page3_intermittent_hours)) ? '' : 'disabled' }}/>
											<label for="label_page3_intermittent" class="w-full ml-2 text-xs font-medium text-gray-900 dark:text-gray-300">Water Level (cm)</label>
										</div>
									</div>

									<div class="col-span-6 sm:col-span-4">
										<div class="flex items-center mr-4">
											<input name="input_page3_intermittent_days" id="input_page3_intermittent_days" type="number" class="ml-4 block py-2.5 px-0 w-full text-xs text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Day(s)" value="{{ old('input_page3_intemittent_days', $farm->farm_extended->page3_intermittent_days) }}"  {{ intval(old('checkbox_page3_intermittent')) == intval(1) || (!empty($farm->farm_extended->page3_intermittent_waterlevel) || !empty($farm->farm_extended->page3_intermittent_days) || !empty($farm->farm_extended->page3_intermittent_hours)) ? '' : 'disabled' }}/>
											<label for="label_page3_intermittent" class="w-full ml-2 text-xs font-medium text-gray-900 dark:text-gray-300">Duration (No. of Days)</label>
										</div>
									</div>

									<div class="col-span-6 sm:col-span-4">
										<div class="flex items-center mr-4">
											<input name="input_page3_intermittent_hours" id="input_page3_intermittent_hours" type="number" class="ml-4 block py-2.5 px-0 w-full text-xs text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Hour(s)" {{ intval(old('checkbox_page3_intermittent')) == intval(1) || (!empty($farm->farm_extended->page3_intermittent_waterlevel) || !empty($farm->farm_extended->page3_intermittent_days) || !empty($farm->farm_extended->page3_intermittent_hours)) ? '' : 'disabled' }} value="{{ old('input_page3_intermittent_hours', $farm->farm_extended->page3_intermittent_hours) }}"/>
											<label for="label_page3_intermittent" class="w-full ml-2 text-xs font-medium text-gray-900 dark:text-gray-300">Duration (No. of Hours)</label>
										</div>
									</div>

									{{-- Stagnant --}}

									<div class="col-span-6 sm:col-span-6">
										<div class="flex items-center mr-4">
											<input onchange="page3FloodTypeCheckBox(event, 'stagnant')" name="checkbox_page3_stagnant" id="checkbox_page3_stagnant" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ intval(old('checkbox_page3_stagnant')) == intval(1) || (!empty($farm->farm_extended->page3_stagnant_waterlevel) || !empty($farm->farm_extended->page3_stagnant_days) || !empty($farm->farm_extended->page3_stagnant_hours)) ? 'checked' : '' }}>
											<label for="label_page3_stagnant" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Stagnant</label>
										</div>
									</div>

									<div class="col-span-6 sm:col-span-4">
										<div class="flex items-center mr-4">
											<input name="input_page3_stagnant_waterlevel" id="input_page3_stagnant_waterlevel" type="number" class="ml-4 block py-2.5 px-0 w-full text-xs text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Water Level (cm)" value="{{ old('input_page3_stagnant_waterlevel') }}" {{ intval(old('checkbox_page3_stagnant')) == intval(1) || (!empty($farm->farm_extended->page3_stagnant_waterlevel) || !empty($farm->farm_extended->page3_stagnant_days) || !empty($farm->farm_extended->page3_stagnant_hours)) ? '' : 'disabled' }}/>
											<label for="label_page3_stagnant" class="w-full ml-2 text-xs font-medium text-gray-900 dark:text-gray-300">Water Level (cm)</label>
										</div>
									</div>

									<div class="col-span-6 sm:col-span-4">
										<div class="flex items-center mr-4">
											<input name="input_page3_stagnant_days" id="input_page3_stagnant_days" type="number" class="ml-4 block py-2.5 px-0 w-full text-xs text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Day(s)" value="{{ old('input_page3_intemittent_days', $farm->farm_extended->page3_stagnant_days) }}"  {{ intval(old('checkbox_page3_stagnant')) == intval(1) || (!empty($farm->farm_extended->page3_stagnant_waterlevel) || !empty($farm->farm_extended->page3_stagnant_days) || !empty($farm->farm_extended->page3_stagnant_hours)) ? '' : 'disabled' }}/>
											<label for="label_page3_stagnant" class="w-full ml-2 text-xs font-medium text-gray-900 dark:text-gray-300">Duration (No. of Days)</label>
										</div>
									</div>

									<div class="col-span-6 sm:col-span-4">
										<div class="flex items-center mr-4">
											<input name="input_page3_stagnant_hours" id="input_page3_stagnant_hours" type="number" class="ml-4 block py-2.5 px-0 w-full text-xs text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Hour(s)" {{ intval(old('checkbox_page3_stagnant')) == intval(1) || (!empty($farm->farm_extended->page3_stagnant_waterlevel) || !empty($farm->farm_extended->page3_stagnant_days) || !empty($farm->farm_extended->page3_stagnant_hours)) ? '' : 'disabled' }} value="{{ old('input_page3_stagnant_hours', $farm->farm_extended->page3_stagnant_hours) }}"/>
											<label for="label_page3_stagnant" class="w-full ml-2 text-xs font-medium text-gray-900 dark:text-gray-300">Duration (No. of Hours)</label>
										</div>
									</div>

									{{-- All of the Above --}}

									<div class="col-span-6 sm:col-span-6">
										<div class="flex items-center mr-4">
											<input onchange="page3FloodTypeCheckBox(event, 'all')" name="checkbox_page3_all" id="checkbox_page3_all" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ intval(old('checkbox_page3_all')) == intval(1) || (!empty($farm->farm_extended->page3_all_waterlevel) || !empty($farm->farm_extended->page3_all_days) || !empty($farm->farm_extended->page3_all_hours)) ? 'checked' : '' }}>
											<label for="label_page3_all" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">All of the Above</label>
										</div>
									</div>

									<div class="col-span-6 sm:col-span-4">
										<div class="flex items-center mr-4">
											<input name="input_page3_all_waterlevel" id="input_page3_all_waterlevel" type="number" class="ml-4 block py-2.5 px-0 w-full text-xs text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Water Level (cm)" value="{{ old('input_page3_all_waterlevel', $farm->farm_extended->page3_all_waterlevel) }}" {{ intval(old('checkbox_page3_all')) == intval(1) || (!empty($farm->farm_extended->page3_all_waterlevel) || !empty($farm->farm_extended->page3_all_days) || !empty($farm->farm_extended->page3_all_hours)) ? '' : 'disabled' }}/>
											<label for="label_page3_all" class="w-full ml-2 text-xs font-medium text-gray-900 dark:text-gray-300">Water Level (cm)</label>
										</div>
									</div>

									<div class="col-span-6 sm:col-span-4">
										<div class="flex items-center mr-4">
											<input name="input_page3_all_days" id="input_page3_all_days" type="number" class="ml-4 block py-2.5 px-0 w-full text-xs text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Day(s)" value="{{ old('input_page3_all_days', $farm->farm_extended->page3_all_days) }}"  {{ intval(old('checkbox_page3_all')) == intval(1) || (!empty($farm->farm_extended->page3_all_waterlevel) || !empty($farm->farm_extended->page3_all_days) || !empty($farm->farm_extended->page3_all_hours)) ? '' : 'disabled' }}/>
											<label for="label_page3_all" class="w-full ml-2 text-xs font-medium text-gray-900 dark:text-gray-300">Duration (No. of Days)</label>
										</div>
									</div>

									<div class="col-span-6 sm:col-span-4">
										<div class="flex items-center mr-4">
											<input name="input_page3_all_hours" id="input_page3_all_hours" type="number" class="ml-4 block py-2.5 px-0 w-full text-xs text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Hour(s)" {{ intval(old('checkbox_page3_all')) == intval(1) || (!empty($farm->farm_extended->page3_all_waterlevel) || !empty($farm->farm_extended->page3_all_days) || !empty($farm->farm_extended->page3_all_hours)) ? '' : 'disabled' }} value="{{ old('input_page3_all_hours', $farm->farm_extended->page3_all_hours) }}"/>
											<label for="label_page3_all" class="w-full ml-2 text-xs font-medium text-gray-900 dark:text-gray-300">Duration (No. of Hours)</label>
										</div>
									</div>

								<div class="col-span-6 sm:col-span-6">
									<div class="px-4 sm:px-0">
										<h3 class="text-md font-bold leading-6 text-gray-900">Occurence of Flood</h3>
									</div>
								</div>

									<div class="col-span-6 sm:col-span-4">
										<fieldset>
											<legend class="contents text-sm font-medium text-gray-900">What month/s during dry season? (September 15 - March 15)</legend>
											<p class="text-sm text-gray-500"></p>
											<div class="mt-4 space-y-4">
												@if (isset($optionsMonth) && !empty($optionsMonth))
													@foreach ($optionsMonth as $month)
														<div class="flex">
															<div class="flex items-center mr-4">
																<input name="checkbox_page3_occurenceofflood_ds_months[]" id="checkbox_page3_occurenceofflood_ds_months_opt{{ $month->position }}" type="checkbox" value="{{ $month->id }}" class="ml-4 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('checkbox_page3_occurenceofflood_ds_months', $farm->farm_extended->page3_occurenceofflood_ds_months)) ? '' : (in_array($month->id, old('checkbox_page3_occurenceofflood_ds_months', $farm->farm_extended->page3_occurenceofflood_ds_months)) ? 'checked' : '' ) }}>
																<label for="label_checkbox_page3_occurenceofflood_ds_months_opt{{$month->position}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{utf8_decode($month->Picklistitem)}}</label>
															</div>
														</div>
													@endforeach
												@endif
											</div>
										</fieldset>
									</div>

									<div class="col-span-6 sm:col-span-4">
										<div class="relative z-0 w-full group">
											<input name="input_page3_occurenceofflood_ds_remarks" id="input_page3_occurenceofflood_ds_remarks" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Remarks (Occurence of Flood: Dry Season)" value="{{ old('input_page3_occurenceofflood_ds_remarks', $farm->farm_extended->page3_occurenceofflood_ds_remarks) }}"/>
										</div>
									</div>

									<div class="col-span-6 sm:col-span-4">
										<fieldset>
											<legend class="contents text-sm font-medium text-gray-900">What month/s during wet season? (March 16 - September 14)</legend>
											<p class="text-sm text-gray-500"></p>
											<div class="mt-4 space-y-4">
												@if (isset($optionsMonth) && !empty($optionsMonth))
													@foreach ($optionsMonth as $month)
														<div class="flex">
															<div class="flex items-center mr-4">
																<input name="checkbox_page3_occurenceofflood_ws_months[]" id="checkbox_page3_occurenceofflood_ws_months_opt{{ $month->position }}" type="checkbox" value="{{ $month->id }}" class="ml-4 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('checkbox_page3_occurenceofflood_ws_months', $farm->farm_extended->page3_occurenceofflood_ws_months)) ? '' : (in_array($month->id, old('checkbox_page3_occurenceofflood_ws_months', $farm->farm_extended->page3_occurenceofflood_ws_months)) ? 'checked' : '' ) }}>
																<label for="label_checkbox_page3_occurenceofflood_ws_months_opt{{$month->position}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{utf8_decode($month->Picklistitem)}}</label>
															</div>
														</div>
													@endforeach
												@endif
											</div>
										</fieldset>
									</div>

									<div class="col-span-6 sm:col-span-4">
										<div class="relative z-0 w-full group">
											<input name="input_page3_occurenceofflood_ws_remarks" id="input_page3_occurenceofflood_ws_remarks" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Remarks (Occurence of Flood: Wet Season)" value="{{ old('input_page3_occurenceofflood_ws_remarks', $farm->farm_extended->page3_occurenceofflood_ws_remarks) }}"/>
										</div>
									</div>	

								</div>

							</div>

						</div>

					</div>
				</div>

				<div id="page3-space" class="hidden sm:block" aria-hidden="true" style="display: {{ empty(old('input_page2_stressecosystem', $farm->stressEcosystem)) ? 'none' : (in_array(0, old('input_page2_stressecosystem', $farm->stressEcosystem)) ? 'content' : 'none')}}">
					<div class="py-5">
						<div class="border-t border-gray-200"></div>
					</div>
				</div>

				<div id="page4-content" class="md:grid md:grid-cols-4 md:gap-6" style="display: {{ empty(old('input_page2_stressecosystem', $farm->stressEcosystem)) ? 'none' : (in_array(1, old('input_page2_stressecosystem', $farm->stressEcosystem)) ? 'content' : 'none')}}">
					<div class="md:col-span-1">
						<div class="px-4 sm:px-0">
							<h3 class="text-lg font-medium leading-6 text-gray-900">D. Salt Water Intrusions Ecosystem</h3>
							<p class="mt-1 text-sm text-gray-600">This information will be displayed publicly so be careful what you share.</p>
						</div>
					</div>
					<div class="mt-5 md:col-span-3 md:mt-0">
						
						<div class="overflow-hidden shadow sm:rounded-md">
							<div class="bg-white px-4 py-5 sm:p-6">
								<div class="grid grid-cols-6 gap-6 mt-4">
									
									<div class="col-span-6 sm:col-span-4">
										<fieldset>
											<legend class="contents text-sm font-medium text-gray-900">Source/Cause of Salinity</legend>
											<p class="text-sm text-gray-500"></p>
											<div class="mt-4 space-y-4">
												@if (isset($optionsSourceOfSalinity) && !empty($optionsSourceOfSalinity))
													@foreach ($optionsSourceOfSalinity as $sourceOfSalinity)
														<div class="flex">
															<div class="flex items-center mr-4">
																<input name="input_page4_sourceofsalinity[]" id="input_page4_sourceofsalinity_opt{{ $sourceOfSalinity->position }}" type="checkbox" value="{{ $sourceOfSalinity->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('input_page4_sourceofsalinity', $farm->farm_extended->page4_source_id)) ? '' : (in_array($sourceOfSalinity->id, old('input_page4_sourceofsalinity', $farm->farm_extended->page4_source_id)) ? 'checked' : '') }}>
																<label for="label_flood_sourceofsalinity_opt{{$sourceOfSalinity->position}}" title="{{ $sourceOfSalinity->Picklistitem }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ ucfirst(utf8_decode($sourceOfSalinity->Picklistitem)) }}</label>
															</div>
															@if ($sourceOfSalinity->position == 5)
																<div class="flex items-center mr-4">
																	<input name="input_page4_sourceofsalinity_specify" id="input_page4_sourceofsalinity_specify" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Please Specify" value="{{ old('input_page4_sourceofsalinity_specify', $farm->farm_extended->page4_source_specify) }}" {{ empty(old('input_page4_sourceofsalinity', $farm->farm_extended->page4_source_id)) ? 'disabled' : (in_array($sourceOfSalinity->id, old('input_page4_sourceofsalinity', $farm->farm_extended->page4_source_id)) ? '' : 'disabled' ) }}/>
																</div>
															@endif
														</div>
													@endforeach
												@endif
											</div>
										</fieldset>
									</div>

									<div class="col-span-6 sm:col-span-4">
										<fieldset>
											<legend class="contents text-sm font-medium text-gray-900">How frequent does salt water intrusion occurs for the past 5 years</legend>
											<p class="text-sm text-gray-500"></p>
											<div class="mt-4 space-y-4">
												@if (isset($optionsFrequency) && !empty($optionsFrequency))
													@foreach ($optionsFrequency as $frequency)
													<div class="flex">
														<div class="flex items-center mr-4">
															<input name="input_page4_frequency[]" id="input_page4_frequency_opt{{$frequency->position}}" type="checkbox" value="{{ $frequency->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('input_page4_frequency', $farm->farm_extended->page4_frequency)) ? '' : (in_array($frequency->id, old('input_page4_frequency', $farm->farm_extended->page4_frequency)) ? 'checked' : '' ) }}>
															<label for="label_page4_frequency_opt{{$frequency->position}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ utf8_decode($frequency->Picklistitem) }}</label>
														</div>
													</div>
													@endforeach
												@endif
											</div>
										</fieldset>
									</div>

									<div class="col-span-6 sm:col-span-6">
										<div class="px-4 sm:px-0">
											<h3 class="text-md font-bold leading-6 text-gray-900">Occurence of Salinity</h3>
										</div>
									</div>

									<div class="col-span-6 sm:col-span-4">
										<fieldset>
											<legend class="contents text-sm font-medium text-gray-900">What month/s during dry season? (September 15 - March 15)</legend>
											<p class="text-sm text-gray-500"></p>
											<div class="mt-4 space-y-4">
												@if (isset($optionsMonth) && !empty($optionsMonth))
													@foreach ($optionsMonth as $month)
														<div class="flex">
															<div class="flex items-center mr-4">
																<input name="checkbox_page4_occurenceofsalinity_ds_months[]" id="checkbox_page4_occurenceofsalinity_ds_months_opt{{ $month->position }}" type="checkbox" value="{{ $month->id }}" class="ml-4 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('checkbox_page4_occurenceofsalinity_ds_months', $farm->farm_extended->page4_occurenceofsalinity_ds_months)) ? '' : (in_array($month->id, old('checkbox_page4_occurenceofsalinity_ds_months', $farm->farm_extended->page4_occurenceofsalinity_ds_months)) ? 'checked' : '' ) }}>
																<label for="label_checkbox_page4_occurenceofsalinity_ds_months_opt{{$month->position}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{utf8_decode($month->Picklistitem)}}</label>
															</div>
														</div>
													@endforeach
												@endif
											</div>
										</fieldset>
									</div>

									<div class="col-span-6 sm:col-span-4">
										<div class="relative z-0 w-full group">
											<input name="input_page4_occurenceofsalinity_ds_remarks" id="input_page4_occurenceofsalinity_ds_remarks" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Remarks (Occurence of Flood: Dry Season)" value="{{ old('input_page4_occurenceofsalinity_ds_remarks', $farm->farm_extended->page4_occurenceofsalinity_ds_remarks) }}"/>
										</div>
									</div>

									<div class="col-span-6 sm:col-span-4">
										<fieldset>
											<legend class="contents text-sm font-medium text-gray-900">What month/s during wet season? (March 16 - September 14)</legend>
											<p class="text-sm text-gray-500"></p>
											<div class="mt-4 space-y-4">
												@if (isset($optionsMonth) && !empty($optionsMonth))
													@foreach ($optionsMonth as $month)
														<div class="flex">
															<div class="flex items-center mr-4">
																<input name="checkbox_page4_occurenceofsalinity_ws_months[]" id="checkbox_page4_occurenceofsalinity_ws_months_opt{{ $month->position }}" type="checkbox" value="{{ $month->id }}" class="ml-4 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('checkbox_page4_occurenceofsalinity_ws_months', $farm->farm_extended->page4_occurenceofsalinity_ws_months)) ? '' : (in_array($month->id, old('checkbox_page4_occurenceofsalinity_ws_months', $farm->farm_extended->page4_occurenceofsalinity_ws_months)) ? 'checked' : '' ) }}>
																<label for="label_checkbox_page4_occurenceofsalinity_ws_months_opt{{$month->position}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{utf8_decode($month->Picklistitem)}}</label>
															</div>
														</div>
													@endforeach
												@endif
											</div>
										</fieldset>
									</div>

									<div class="col-span-6 sm:col-span-4">
										<div class="relative z-0 w-full group">
											<input name="input_page4_occurenceofsalinity_ws_remarks" id="input_page4_occurenceofsalinity_ws_remarks" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Remarks (Occurence of Flood: Wet Season)" value="{{ old('input_page4_occurenceofsalinity_ws_remarks', $farm->farm_extended->page4_occurenceofsalinity_ws_remarks) }}"/>
										</div>
									</div>

									<div class="col-span-6 sm:col-span-6">
										<table class="border-collapse border border-slate-400 w-full text-sm text-left text-gray-500 dark:text-gray-400">
											<thead>
												<th class="w-3/4 border border-slate-300 px-4 py-2">
													Source of Irrigation
												</th>
												<th class="border border-slate-300 px-4 py-2">
													Is the water from this source Salt Free?
												</th>
											</thead>
											<tbody>
												@if (isset($optionsSourceOfIrrigation) && !empty($optionsSourceOfIrrigation))
													@foreach ($optionsSourceOfIrrigation as $sourceOfIrrigation)
														<tr class="bg-white dark:bg-gray-800">
															<td class="border border-slate-300 px-4 py-2">
																<div class="flex items-center mr-4">
																	<input onchange="page4SourceOfIrrigation(event, {{$sourceOfIrrigation->id}})" name="checkbox_page4_sourceofirrigation[]" id="checkbox_page4_sourceofirrigation_opt{{$sourceOfIrrigation->position}}" type="checkbox" value="{{ $sourceOfIrrigation->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('checkbox_page4_sourceofirrigation', $farm->farm_extended->page4_checkbox_sourceOfIrrigation)) ? '' : (in_array($sourceOfIrrigation->id, old('checkbox_page4_sourceofirrigation', $farm->farm_extended->page4_checkbox_sourceOfIrrigation)) ? 'checked' : '' ) }}>
																	<label for="label_checkbox_page4_sourceofirrigation_opt[{{$sourceOfIrrigation->id}}]" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{utf8_decode($sourceOfIrrigation->Picklistitem)}}</label>
																	
																	@if ($sourceOfIrrigation->id == 54) 
																		<div class="flex items-center ml-4">
																			<input name="input_page4_sourceofirrigation_specify" id="input_page4_sourceofirrigation_specify" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Please Specify" value="{{ old('input_page4_sourceofirrigation_specify', $farm->farm_extended->page4_sourceOfIrrigation_specify) }}" {{ empty(old('checkbox_page4_sourceofirrigation', $farm->farm_extended->page4_checkbox_sourceOfIrrigation)) ? 'disabled' : ( in_array($sourceOfIrrigation->id, old('checkbox_page4_sourceofirrigation', $farm->farm_extended->page4_checkbox_sourceOfIrrigation)) ? '' : 'disabled' ) }}/>
																		</div>
																	@endif
																</div>
															</td>
															<td class="border border-slate-300 px-4 py-2">
																@if ($sourceOfIrrigation->id !== 51)

																<input name="checkbox_page4_sourceofirrigation_saltfree[{{$sourceOfIrrigation->id}}]" id="checkbox_page4_sourceofirrigation_saltfree{{$sourceOfIrrigation->id}}_yes" type="radio" value="1"  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('checkbox_page4_sourceofirrigation_saltfree',  $farm->farm_extended->page4_sourceOfIrrigation_saltfree)[$sourceOfIrrigation->id]) ? 'disabled' : ( intval(old('checkbox_page4_sourceofirrigation_saltfree', $farm->farm_extended->page4_sourceOfIrrigation_saltfree)[$sourceOfIrrigation->id] ) == intval(1) ? 'checked' : '' ) }}>
																<label for="label_checkbox_page4_sourceofirrigation_saltfree{{$sourceOfIrrigation->id}}_yes" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300" >Yes </label>

																<input name="checkbox_page4_sourceofirrigation_saltfree[{{$sourceOfIrrigation->id}}]" id="checkbox_page4_sourceofirrigation_saltfree{{$sourceOfIrrigation->id}}_no" type="radio" value="2"  class="ml-4 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('checkbox_page4_sourceofirrigation_saltfree',  $farm->farm_extended->page4_sourceOfIrrigation_saltfree)[$sourceOfIrrigation->id]) ? 'disabled' : ( intval(old('checkbox_page4_sourceofirrigation_saltfree', $farm->farm_extended->page4_sourceOfIrrigation_saltfree)[$sourceOfIrrigation->id] ) == intval(2) ? 'checked' : '' ) }}>
																<label for="label_checkbox_page4_sourceofirrigation_saltfree[{{$sourceOfIrrigation->id}}]_no" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300" >No</label>
																@endif
															</td>
														</tr>
													@endforeach
												@endif
												
											</tbody>
										</table>
									</div>

									<div class="col-span-6 sm:col-span-6">
										<fieldset>
											<legend class="contents text-sm font-medium text-gray-900">Indicator of Salinity</legend>
											<p class="text-sm text-gray-500"></p>
											<div class="mt-4 space-y-4">
												@if (isset($optionsIndicatorOfSalinity) && !empty($optionsIndicatorOfSalinity))
													@foreach ($optionsIndicatorOfSalinity as $indicatorOfSalinity)
														<div class="flex">
															<div class="flex items-center mr-4">
																<input name="input_page4_indicatorofsalinity[]" id="input_page4_indicatorofsalinity_opt{{$indicatorOfSalinity->position}}" type="checkbox" value="{{$indicatorOfSalinity->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('input_page4_indicatorofsalinity', $farm->farm_extended->page4_indicatorofsalinity)) ? '' : ( in_array($indicatorOfSalinity->id, old('input_page4_indicatorofsalinity', $farm->farm_extended->page4_indicatorofsalinity)) ? 'checked' : '' ) }}>
																<label for="label_page4_indicatorofsalinity_opt{{$indicatorOfSalinity->position}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ucfirst(utf8_decode($indicatorOfSalinity->Picklistitem))}}</label>
															</div>
															@if ($indicatorOfSalinity->position == 6)
																<div class="flex items-center mr-4">
																	<input name="input_page4_indicatorofsalinity_specify" id="input_page4_indicatorofsalinity_specify" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Please Specify" value="{{ old('input_page4_indicatorofsalinity_specify', $farm->farm_extended->page4_indicatorofsalinity_specify) }}" {{ empty(old('input_page4_indicatorofsalinity', $farm->farm_extended->page4_indicatorofsalinity)) ? 'disabled' : (in_array($indicatorOfSalinity->id, old('input_page4_indicatorofsalinity', $farm->farm_extended->page4_indicatorofsalinity)) ? '' : 'disabled' ) }}/>
																</div>
															@endif
														</div>
													@endforeach
												@endif
											</div>
										</fieldset>
									</div>


								</div>

							</div>

						</div>

					</div>
				</div>

				<div id="page4-space" class="hidden sm:block" aria-hidden="true" style="display: {{ empty(old('input_page2_stressecosystem', $farm->stressEcosystem)) ? 'none' : (in_array(1, old('input_page2_stressecosystem', $farm->stressEcosystem)) ? 'content' : 'none')}}">
					<div class="py-5">
						<div class="border-t border-gray-200"></div>
					</div>
				</div>

				<div id="page5-content" class="md:grid md:grid-cols-4 md:gap-6" style="display: {{ empty(old('input_page2_stressecosystem', $farm->stressEcosystem)) ? 'none' : (in_array(2, old('input_page2_stressecosystem', $farm->stressEcosystem)) ? 'content' : 'none')}}">
					<div class="md:col-span-1">
						<div class="px-4 sm:px-0">
							<h3 class="text-lg font-medium leading-6 text-gray-900">E. Drought Ecosystem</h3>
							<p class="mt-1 text-sm text-gray-600">This information will be displayed publicly so be careful what you share.</p>
						</div>
					</div>
					<div class="mt-5 md:col-span-3 md:mt-0">
						
						<div class="overflow-hidden shadow sm:rounded-md">
							<div class="bg-white px-4 py-5 sm:p-6">
								<div class="grid grid-cols-6 gap-6 mt-4">

									<div class="col-span-6 sm:col-span-4">
										<fieldset>
											<legend class="contents text-sm font-medium text-gray-900">How frequent does drought occurs for the past 5 years</legend>
											<p class="text-sm text-gray-500"></p>
											<div class="mt-4 space-y-4">
												@if (empty($optionsFrequency) && !empty($optionsFrequency))
													@foreach ($optionsFrequency as $frequency)
													<div class="flex">
														<div class="flex items-center mr-4">
															<input name="input_page5_frequency[]" id="input_page5_frequency_opt{{$frequency->position}}" type="checkbox" value="{{ $frequency->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('input_page5_frequency', $farm->farm_extended->page5_frequency)) ? '' : (in_array($frequency->id, old('input_page5_frequency', $farm->farm_extended->page5_frequency)) ? 'checked' : '' ) }}>
															<label for="label_page5_frequency_opt{{$frequency->position}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ utf8_decode($frequency->Picklistitem) }}</label>
														</div>
													</div>
													@endforeach
												@endif
											</div>
										</fieldset>
									</div>

									<div class="col-span-6 sm:col-span-6">
										<div class="px-4 sm:px-0">
											<h3 class="text-md font-bold leading-6 text-gray-900">Occurence of Drought</h3>
										</div>
									</div>

									<div class="col-span-6 sm:col-span-4">
										<fieldset>
											<legend class="contents text-sm font-medium text-gray-900">What month/s during dry season? (September 15 - March 15)</legend>
											<p class="text-sm text-gray-500"></p>
											<div class="mt-4 space-y-4">
												@if (isset($optionsMonth) && !empty($optionsMonth))
													@foreach ($optionsMonth as $month)
														<div class="flex">
															<div class="flex items-center mr-4">
																<input name="checkbox_page5_occurenceofdrought_ds_months[]" id="checkbox_page5_occurenceofdrought_ds_months_opt{{ $month->position }}" type="checkbox" value="{{ $month->id }}" class="ml-4 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('checkbox_page5_occurenceofdrought_ds_months', $farm->farm_extended->page5_occurenceofdrought_ds_months)) ? '' : (in_array($month->id, old('checkbox_page5_occurenceofdrought_ds_months', $farm->farm_extended->page5_occurenceofdrought_ds_months)) ? 'checked' : '' ) }}>
																<label for="label_checkbox_page5_occurenceofdrought_ds_months_opt{{$month->position}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{utf8_decode($month->Picklistitem)}}</label>
															</div>
														</div>
													@endforeach
												@endif
											</div>
										</fieldset>
									</div>

									<div class="col-span-6 sm:col-span-4">
										<div class="relative z-0 w-full group">
											<input name="input_page5_occurenceofdrought_ds_remarks" id="input_page5_occurenceofdrought_ds_remarks" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Remarks (Occurence of Flood: Dry Season)" value="{{ old('input_page5_occurenceofdrought_ds_remarks', $farm->farm_extended->page5_occurenceofdrought_ds_remarks) }}"/>
										</div>
									</div>

									<div class="col-span-6 sm:col-span-4">
										<fieldset>
											<legend class="contents text-sm font-medium text-gray-900">What month/s during wet season? (March 16 - September 14)</legend>
											<p class="text-sm text-gray-500"></p>
											<div class="mt-4 space-y-4">
												@if (isset($optionsMonth) && !empty($optionsMonth))
													@foreach ($optionsMonth as $month)
														<div class="flex">
															<div class="flex items-center mr-4">
																<input name="checkbox_page5_occurenceofdrought_ws_months[]" id="checkbox_page5_occurenceofdrought_ws_months_opt{{ $month->position }}" type="checkbox" value="{{ $month->id }}" class="ml-4 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('checkbox_page5_occurenceofdrought_ws_months', $farm->farm_extended->page5_occurenceofdrought_ws_months)) ? '' : (in_array($month->id, old('checkbox_page5_occurenceofdrought_ws_months', $farm->farm_extended->page5_occurenceofdrought_ws_months)) ? 'checked' : '' ) }}>
																<label for="label_checkbox_page5_occurenceofdrought_ws_months_opt{{$month->position}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{utf8_decode($month->Picklistitem)}}</label>
															</div>
														</div>
													@endforeach
												@endif
											</div>
										</fieldset>
									</div>

									<div class="col-span-6 sm:col-span-4">
										<div class="relative z-0 w-full group">
											<input name="input_page5_occurenceofdrought_ws_remarks" id="input_page5_occurenceofdrought_ws_remarks" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Remarks (Occurence of Flood: Wet Season)" value="{{ old('input_page5_occurenceofdrought_ws_remarks', $farm->farm_extended->page5_occurenceofdrought_ws_remarks) }}"/>
										</div>
									</div>

									<div class="col-span-6 sm:col-span-6">
										<table class="border-collapse border border-slate-400 w-full text-sm text-left text-gray-500 dark:text-gray-400">
											<thead>
												<th class="w-3/4 border border-slate-300 px-4 py-2">
													Source of Irrigation
												</th>
												<th class="border border-slate-300 px-4 py-2">
													Is the water from this source Salt Free?
												</th>
											</thead>
											<tbody>
                                                @if (isset($optionsSourceOfIrrigation) && !empty($optionsSourceOfIrrigation))
                                                    @foreach ($optionsSourceOfIrrigation as $sourceOfIrrigation)
                                                    <tr class="bg-white dark:bg-gray-800">
                                                        <td class="border border-slate-300 px-4 py-2">
                                                            <div class="flex items-center mr-4">
                                                                <input onchange="page5SourceOfIrrigation(event, {{$sourceOfIrrigation->id}})" name="checkbox_page5_sourceofirrigation[]" id="checkbox_page5_sourceofirrigation_opt{{$sourceOfIrrigation->position}}" type="checkbox" value="{{$sourceOfIrrigation->id}}"  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('checkbox_page5_sourceofirrigation', $farm->farm_extended->page5_checkbox_sourceOfIrrigation)) ? '' : (in_array($sourceOfIrrigation->id, old('checkbox_page5_sourceofirrigation', $farm->farm_extended->page5_checkbox_sourceOfIrrigation)) ? 'checked' : '' ) }}>
                                                                <label for="label_checkbox_page5_sourceofirrigation_opt[{{$sourceOfIrrigation->id}}]" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{utf8_decode($sourceOfIrrigation->Picklistitem)}}</label>
                                                                
                                                                @if ($sourceOfIrrigation->id == 54) 
																	<div class="flex items-center ml-4">
																		<input name="input_page5_sourceofirrigation_specify" id="input_page5_sourceofirrigation_specify" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Please Specify" value="{{ old('input_page5_sourceofirrigation_specify', $farm->farm_extended->page5_sourceOfIrrigation_specify) }}" {{ empty(old('checkbox_page5_sourceofirrigation', $farm->farm_extended->page5_checkbox_sourceOfIrrigation)) ? 'disabled' : ( in_array($sourceOfIrrigation->id, old('checkbox_page5_sourceofirrigation', $farm->farm_extended->page5_checkbox_sourceOfIrrigation)) ? '' : 'disabled' ) }}/>
																	</div>
                                                                @endif
                                                            </div>
                                                        </td>
                                                        <td class="border border-slate-300 px-4 py-2">
                                                            @if ($sourceOfIrrigation->id !== 51)
                                                            <input name="checkbox_page5_sourceofirrigation_saltfree[{{$sourceOfIrrigation->id}}]" id="checkbox_page5_sourceofirrigation_saltfree{{$sourceOfIrrigation->id}}_yes" type="radio" value="1"  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('checkbox_page4_sourceofirrigation_saltfree',  $farm->farm_extended->page5_sourceOfIrrigation_saltfree)[$sourceOfIrrigation->id]) ? 'disabled' : ( intval(old('checkbox_page5_sourceofirrigation_saltfree', $farm->farm_extended->page5_sourceOfIrrigation_saltfree)[$sourceOfIrrigation->id] ) == intval(1) ? 'checked' : '' ) }}>
                                                            <label for="label_checkbox_page5_sourceofirrigation_saltfree{{$sourceOfIrrigation->id}}_yes" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300" disabled>Yes</label>
                                                            <input name="checkbox_page5_sourceofirrigation_saltfree[{{$sourceOfIrrigation->id}}]" id="checkbox_page5_sourceofirrigation_saltfree{{$sourceOfIrrigation->id}}_no" type="radio" value="2"  class="ml-4 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('checkbox_page5_sourceofirrigation_saltfree',  $farm->farm_extended->page5_sourceOfIrrigation_saltfree)[$sourceOfIrrigation->id]) ? 'disabled' : ( intval(old('checkbox_page5_sourceofirrigation_saltfree', $farm->farm_extended->page5_sourceOfIrrigation_saltfree)[$sourceOfIrrigation->id] ) == intval(2) ? 'checked' : '' ) }}>
                                                            <label for="label_checkbox_page5_sourceofirrigation_saltfree[{{$sourceOfIrrigation->id}}]_no" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300" disabled>No</label>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                @endif
												
											</tbody>
										</table>
									</div>

									<div class="col-span-6 sm:col-span-6">
										<fieldset>
											<legend class="contents text-sm font-medium text-gray-900">Indicator of Drought</legend>
											<p class="text-sm text-gray-500"></p>
											<div class="mt-4 space-y-4">
												@if (isset($optionsIndicatorOfDrought) && !empty($optionsIndicatorOfDrought))
													@foreach ($optionsIndicatorOfDrought as $indicatorOfDrought)
														<div class="flex">
															<div class="flex items-center mr-4">
																<input name="input_page5_indicatorofdrought[]" id="input_page5_indicatorofdrought_opt{{$indicatorOfDrought->position}}" type="checkbox" value="{{$indicatorOfDrought->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('input_page5_indicatorofdrought', $farm->farm_extended->page5_indicatorofdrought)) ? '' : ( in_array($indicatorOfDrought->id, old('input_page5_indicatorofdrought', $farm->farm_extended->page5_indicatorofdrought)) ? 'checked' : '' ) }}>
																<label for="label_page5_indicatorofdrought_opt{{$indicatorOfDrought}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ucfirst(utf8_decode($indicatorOfDrought->Picklistitem))}}</label>
															</div>
															@if ($indicatorOfDrought->position == 7)
																<div class="flex items-center mr-4">
																	<input name="input_page5_indicatorofdrought_specify" id="input_page5_indicatorofdrought_specify" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Please Specify" value="{{ old('input_page5_indicatorofdrought_specify', $farm->farm_extended->page5_indicatorofdrought_specify) }}" {{ empty(old('input_page5_indicatorofdrought')) ? 'disabled' : (in_array($indicatorOfDrought->id, old('input_page5_indicatorofdrought', $farm->farm_extended->page5_indicatorofdrought)) ? '' : 'disabled' ) }}/>
																</div>
															@endif
														</div>
													@endforeach
												@endif
											</div>
										</fieldset>
									</div>


								</div>

							</div>

						</div>

					</div>
				</div>

				<div id="page5-space" class="hidden sm:block" aria-hidden="true" style="display: {{ empty(old('input_page2_stressecosystem', $farm->stressEcosystem)) ? 'none' : (in_array(2, old('input_page2_stressecosystem', $farm->stressEcosystem)) ? 'content' : 'none')}}">
					<div class="py-5">
						<div class="border-t border-gray-200"></div>
					</div>
				</div>

				{{-- Update Stress Ecosystem Information Button --}}
				<div class="md:grid md:grid-cols-4 md:gap-6">
					<div class="md:col-span-1">
					</div>
					<div class="mt-5 md:col-span-3 md:mt-0">

							<div class="overflow-hidden shadow sm:rounded-md">
								<div class="bg-white px-4 py-5 sm:p-6">
									<div class="px-4 py-3 text-right sm:px-6">
										<button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Update Stress Ecosystem Information</button>
									</div>
								</div>
								
								<div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
								</div>
	
							</div>
						</form>
					</div>
				</div>

			</form>

			<div class="hidden sm:block" aria-hidden="true">
				<div class="py-5">
					<div class="border-t border-gray-200"></div>
				</div>
			</div>

		</div>
	</div>
</x-app-layout>

<script>
	function renderExtraPage(event)
    {

		console.log(event);
		
        var checkboxSaline = document.querySelector('#input_page2_stressecosystem_opt1');
        var checkboxFlood = document.querySelector('#input_page2_stressecosystem_opt2');
        var checkboxDrought = document.querySelector('#input_page2_stressecosystem_opt3');

		

        var page3Content = document.querySelector('#page3-content');
		var page3Space = document.querySelector('#page3-space');
        var page4Content = document.querySelector('#page4-content');
		var page4Space = document.querySelector('#page4-space');
        var page5Content = document.querySelector('#page5-content');
		var page5Space = document.querySelector('#page5-space');

            // console.log(checkboxSaline.checked == true);

        if(checkboxSaline.checked == true)
        {
            page3Content.style.display = "";
			page3Space.style.display = "";
        }
        else
        {
            page3Content.style.display = "none";
			page3Space.style.display = "none";
        }

        if(checkboxFlood.checked == true)
        {
            page4Content.style.display = "";
			page4Space.style.display = "";
        }
        else
        {
            page4Content.style.display = "none";
			page4Space.style.display = "none";
        }

        if(checkboxDrought.checked == true)
        {
            page5Content.style.display = "";
			page5Space.style.display = "";
        }
        else
        {
            page5Content.style.display = "none";
			page5Space.style.display = "none";
        }
    }

	var stressEcosystemElements = document.getElementsByName('input_page2_stressecosystem');

	stressEcosystemElements.forEach(element => {
		element.addEventListener('click', (event) => {

			console.log('click', event);

			var checkboxSaline = document.querySelector('#input_page2_stressecosystem_opt1');
			var checkboxFlood = document.querySelector('#input_page2_stressecosystem_opt2');
			var checkboxDrought = document.querySelector('#input_page2_stressecosystem_opt3');

			var page3Content = document.querySelector('#page3-content');
			var page3Space = document.querySelector('#page3-space');
			var page4Content = document.querySelector('#page4-content');
			var page4Space = document.querySelector('#page4-space');
			var page5Content = document.querySelector('#page5-content');
			var page5Space = document.querySelector('#page5-space');

				// console.log(checkboxSaline.checked == true);

			if(checkboxSaline.checked == true)
			{
				page3Content.style.display = "";
				page3Space.style.display = "";
			}
			else
			{
				page3Content.style.display = "none";
				page3Space.style.display = "none";
			}

			if(checkboxFlood.checked == true)
			{
				page4Content.style.display = "";
				page4Space.style.display = "";
			}
			else
			{
				page4Content.style.display = "none";
				page4Space.style.display = "none";
			}

			if(checkboxDrought.checked == true)
			{
				page5Content.style.display = "";
				page5Space.style.display = "";
			}
			else
			{
				page5Content.style.display = "none";
				page5Space.style.display = "none";
			}
		})
	});
</script>

<script>
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

        if(value == "default")
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

        if(value == "default")
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

	function page3FloodTypeCheckBox(event, source) {
        var element = event.target;

        document.querySelector(`#input_page3_${source}_waterlevel`).disabled = true;
        document.querySelector(`#input_page3_${source}_days`).disabled = true;
            document.querySelector(`#input_page3_${source}_hours`).disabled = true;

        if (element.checked == true) {
            document.querySelector(`#input_page3_${source}_waterlevel`).disabled = false;
            document.querySelector(`#input_page3_${source}_waterlevel`).focus();
            document.querySelector(`#input_page3_${source}_days`).disabled = false;
            document.querySelector(`#input_page3_${source}_hours`).disabled = false;

        }
    }

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
            if (element.id == "checkbox_page4_sourceofirrigation_opt5") 
            {

                document.querySelector(`#checkbox_page4_sourceofirrigation_saltfree${source_id}_yes`).checked = false;
                document.querySelector(`#checkbox_page4_sourceofirrigation_saltfree${source_id}_no`).checked = false;

                document.querySelector('#input_page4_sourceofirrigation_specify').disabled = true;
                document.querySelector('#input_page4_sourceofirrigation_specify').value = '';

                if (element.checked == true) 
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
            if (element.id == "checkbox_page5_sourceofirrigation_opt5") 
            {

                document.querySelector(`#checkbox_page5_sourceofirrigation_saltfree${source_id}_yes`).checked = false;
                document.querySelector(`#checkbox_page5_sourceofirrigation_saltfree${source_id}_no`).checked = false;
                document.querySelector('#input_page5_sourceofirrigation_specify').disabled = true;
                document.querySelector('#input_page5_sourceofirrigation_specify').value = '';

                if (element.checked == true) 
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

    var checkboxPage4IndicatorofSalinity = document.querySelector('#input_page4_indicatorofsalinity_opt6');

    checkboxPage4IndicatorofSalinity.addEventListener("change", (event) => {
        var value = event.target.value;

        document.querySelector('#input_page4_indicatorofsalinity_specify').value = '';
        document.querySelector('#input_page4_indicatorofsalinity_specify').disabled = true;

        if (checkboxPage4IndicatorofSalinity.checked == true) 
        {
            document.querySelector('#input_page4_indicatorofsalinity_specify').disabled = false;
            document.querySelector('#input_page4_indicatorofsalinity_specify').focus();
        }
    });

    var checkboxPage5IndicatorofDrought = document.querySelector('#input_page5_indicatorofdrought_opt7');

    checkboxPage5IndicatorofDrought.addEventListener("change", (event) => {
        var value = event.target.value;

        document.querySelector('#input_page5_indicatorofdrought_specify').value = '';
        document.querySelector('#input_page5_indicatorofdrought_specify').disabled = true;

        if (checkboxPage5IndicatorofDrought.checked == true) 
        {
            document.querySelector('#input_page5_indicatorofdrought_specify').disabled = false;
            document.querySelector('#input_page5_indicatorofdrought_specify').focus();
        }
    });


</script>
