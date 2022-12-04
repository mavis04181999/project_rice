<x-app-layout>
	<div class="flex min-h-screen bg-gray-100">
		<div class="mt-4 mb-4 max-w-7xl mx-auto sm:px-6 lg:px-8">

			@include('components.messages')

			<!-- Validation Errors -->
			<x-auth-validation-errors class="mb-4" :errors="$errors" />

			<form action="{{ route('stresspronearea.store') }}" method="POST">
				@csrf
				<div class="mt-10 sm:mt-0">
					<div class="md:grid md:grid-cols-4 md:gap-6">
						<div class="md:col-span-1">
							<div class="px-4 sm:px-0">
								<h3 class="text-lg font-medium leading-6 text-gray-900">Stress Prone Area (SPA) Information</h3>
								<p class="mt-1 text-sm text-gray-600">This information will be displayed publicly so be careful what you share.</p>
							</div>
						</div>
						<div class="mt-5 md:col-span-3 md:mt-0">
							<div class="overflow-hidden shadow sm:rounded-md">
								<div class="bg-white px-4 py-5 sm:p-6">
									<div class="grid grid-cols-6 gap-6 mt-4">
	
										<div class="col-span-6 sm:col-span-4">
											<label class="block text-sm font-medium text-gray-700">
											Province
											</label>
											<div class="relative mt-2">
												<select id="input_spa_province" name="input_spa_province" onchange="selectPage1Province(event)" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
													<option id="option_spa_province_default" value="default" {{ old('input_spa_province') == 'default' ? 'selected' : ''}}>-- Select Province --</option>
													<optgroup label="Region V">
														@if (isset($provinces) && !empty($provinces))
															@foreach ($provinces as $province)
																<option value="{{ $province->id }}" {{ old('input_spa_province') == $province->id ? 'selected' : 'nothing'}}>{{ utf8_decode($province->province) }}</option>
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
												<select id="input_spa_city" name="input_spa_city" onchange="selectPage1City(event)" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" {{ empty(old('input_spa_city')) || old('input_spa_city') == 'default' ? 'disabled' : '' }}>
													<option id="option_spa_city_default" value="default" {{ old('input_spa_city') == 'default' ? 'selected' : '' }} required>-- Select City --</option>
													@if (isset($provinces) && !empty($provinces))
														@foreach ($provinces as $province)
															@if (isset($province->cities) && !empty($province->cities))
																<optgroup id="province-{{ $province->id }}" label="{{$province->province }}" {{ old('input_spa_province') == $province->id ? '' : 'hidden'}}>
																	@foreach ($province->cities()->get() as $city)
																		<option value="{{$city->id}}" {{ old('input_spa_city') == $city->id ? 'selected' : '' }}>{{ utf8_decode($city->city) }}</option>
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
												<select id="input_spa_municipality" name="input_spa_municipality" onchange="selectPage1Municipality(event)" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" {{ empty(old('input_spa_municipality')) || old('input_spa_municipality') == 'default' ? 'disabled' : '' }} required>
													<option id="option_spa_municipality_default" value="default" {{ old('input_spa_municipality') == 'default' ? 'selected' : '' }}>-- Select Municipality --</option>
													@if (isset($provinces) && !empty($provinces))
														@foreach ($provinces as $province)
															@if (isset($province->municipalities) && !empty($province->municipalities))
																<optgroup id="province-{{$province->id}}" label="{{$province->province}}" {{ old('input_spa_province') == $province->id ? '' : 'hidden'}}>
																	@foreach ($province->municipalities()->get() as $municipality)
																		<option value="{{$municipality->id}}" {{ old('input_spa_municipality') == $municipality->id ? 'selected' : '' }}>{{ utf8_decode($municipality->municipality) }}</option>
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
												<select id="input_spa_barangay" name="input_spa_barangay" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" {{ empty(old('input_spa_barangay')) || old('input_spa_barangay') == 'default' ? 'disabled' : old('input_spa_barangay') }} required>
												<option id="option_spa_barangay_default" value="default" {{ old('input_spa_barangay') == 'default' ? 'selected' : '' }}>-- Select Barangay --</option>
												
													@if (isset($provinces) && !empty($provinces))
														@foreach ($provinces as $province)
															@if (isset($province->cities) && !empty($province->cities))
																@foreach ($province->cities()->get() as $city)
																	@if (!empty($city->barangays()->where('entity_id', 2)))
																		<optgroup id="city-{{ $city->id }}" label="{{$city->city}}" {{ old('input_spa_city') == $city->id ? '' : 'hidden' }}>
																			@foreach ($city->barangays()->where('entity_id', 2)->get() as $barangay)
																				<option value="{{$barangay->id}}" {{ old('input_spa_barangay') == $barangay->id ? 'selected' : ''}}>{{ utf8_decode($barangay->barangay) }}</option>
																			@endforeach
																		</optgroup>
																	@endif
																@endforeach
															@endif
														@endforeach
													@endif
		
													@if (isset($provinces) && !empty($provinces))
														@foreach ($provinces as $province)
															@if (isset($province->municipalities) && !empty($province->municipalities))
																@foreach ($province->municipalities()->get() as $municipality)
																	@if (!empty($municipality->barangays()->where('entity_id', 3)))
																		<optgroup id="municipality-{{ $municipality->id }}" label=" {{$municipality->municipality}}" {{ old('input_spa_municipality') == $municipality->id ? '' : 'hidden' }}>
																			@foreach ($municipality->barangays()->where('entity_id', 3)->get() as $barangay)
																				<option value="{{$barangay->id}}" {{ old('input_spa_barangay') == $barangay->id ? 'selected' : ''}}>{{ utf8_decode($barangay->barangay) }}</option>
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
                                                <legend class="contents text-sm font-medium text-gray-900">Stress Ecosystem</legend>
                                                <p class="text-sm text-gray-500"></p>
                                                <div class="mt-4 space-y-4">
                                                    <div class="flex">
                                                        <div class="flex items-center mr-4">
                                                            <input name="input_spa_stressecosystem[]" id="input_spa_stressecosystem_opt1" onclick="renderExtraPage(event)" type="checkbox" value="0" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('input_spa_stressecosystem')) ? '' : (in_array(0, old('input_spa_stressecosystem')) ? 'checked' : '')}} required>
                                                            <label for="input_spa_stressecosystem_opt1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Flooded/Submerged</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex">
                                                        <div class="flex items-center mr-4">
                                                            <input name="input_spa_stressecosystem[]" id="input_spa_stressecosystem_opt2" onclick="renderExtraPage(event)" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('input_spa_stressecosystem')) ? '' : (in_array(1, old('input_spa_stressecosystem')) ? 'checked' : '')}}>
                                                            <label for="input_spa_stressecosystem_opt2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Saline</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex">
                                                        <div class="flex items-center mr-4">
                                                            <input name="input_spa_stressecosystem[]" id="input_spa_stressecosystem_opt3" onclick="renderExtraPage(event)" type="checkbox" value="2" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('input_spa_stressecosystem')) ? '' : (in_array(2, old('input_spa_stressecosystem')) ? 'checked' : '')}}>
                                                            <label for="input_spa_stressecosystem_opt3" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Drought</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>

										<div class="col-span-6 sm:col-span-4">
											<div class="relative z-0 w-full mb-6 group">
												<input name="input_spa_totalfarmers" id="input_spa_totalfarmers" type="number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('input_spa_totalfarmers', )}}" required/>
												<label for="label_spa_totalFarmers" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Total Farmers</label>
											</div>
										</div>

										<div class="col-span-6 sm:col-span-4">
											<div class="relative z-0 w-full mb-6 group">
												<input name="input_spa_totalstressarea" id="input_spa_totalstressarea" type="number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('input_spa_totalstressarea')}}" step="any" required/>
												<label for="label_spa_totalstressarea" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Total Stress Area</label>
											</div>
										</div>

									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>

				<div class="md:grid md:grid-cols-4 md:gap-6">
					<div class="md:col-span-1">
					</div>
					<div class="mt-5 md:col-span-3 md:mt-0">
	
							<div class="overflow-hidden shadow sm:rounded-md">
								<div class="bg-white px-4 py-5 sm:p-6">
									<div class="px-4 py-3 text-right sm:px-6">
										<button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Submit</button>
									</div>
								</div>
								
								<div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
								</div>
	
							</div>
						</form>
					</div>
				</div>

			</form>

		</div>
	</div>

</x-app-layout>



<script>
	$(document).ready( function () {
		$('#dashboard').DataTable({
			scrollX: true,
		});
	});
</script>


<script>

    function selectPage1Province(event)
    {
        // console.log(event.target);
        var value = event.target.value;
        console.log(value);

        var defaultValue = document.querySelector('#option_spa_province_default').value;
        console.log(defaultValue)

        document.querySelector('#input_spa_city').disabled = true;

        document.querySelector('#input_spa_municipality').disabled = true;
        
        document.querySelector('#input_spa_barangay').disabled = true;

        document.querySelector('#option_spa_city_default').selected = "selected";

        document.querySelector('#option_spa_municipality_default').selected = "selected";

        document.querySelector('#option_spa_barangay_default').selected = "selected";

        if (value !== defaultValue) 
        {
            document.querySelector('#input_spa_city').disabled = false;
               
            document.querySelector('#input_spa_municipality').disabled = false;

            var selectPage1Municipality = document.querySelector('#input_spa_municipality').options;

            var selectPage1City = document.querySelector('#input_spa_city').options; 

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

        document.querySelector('#option_spa_barangay_default').selected = "selected";

        document.querySelector('#input_spa_municipality').disabled = true;

        if(value == "default")
        {
            document.querySelector('#input_spa_municipality').disabled = false;

        }

        document.querySelector('#input_spa_barangay').disabled = false;

        var selectPage1Barangay = document.querySelector('#input_spa_barangay').options; 

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

        document.querySelector('#option_spa_barangay_default').selected = "selected";

        document.querySelector('#input_spa_city').disabled = true;

        if(value == "default")
        {
            document.querySelector('#input_spa_city').disabled = false;
        }

        document.querySelector('#input_spa_barangay').disabled = false;

        var selectPage1Barangay = document.querySelector('#input_spa_barangay').options; 

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

</script>
