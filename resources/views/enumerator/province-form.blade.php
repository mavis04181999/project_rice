<x-app-layout>
	<div class="flex min-h-screen bg-gray-100">
		<div class="mt-4 mb-4 max-w-7xl mx-auto sm:px-6 lg:px-8">

			<div class="hidden sm:block" aria-hidden="true">
				<div class="py-5">
					<div class="border-t border-gray-200"></div>
				</div>
			</div>
			
			@include('components.messages')

			<!-- Validation Errors -->
			<x-auth-validation-errors class="mb-4" :errors="$errors" />

			<div class="mt-10 sm:mt-0">
				<div class="md:grid md:grid-cols-4 md:gap-6">
					<div class="md:col-span-1">
						<div class="px-4 sm:px-0">
							<h3 class="text-lg font-medium leading-6 text-gray-900">Farmer Information</h3>
							<p class="mt-1 text-sm text-gray-600">Use a permanent address where you can receive mail.</p>
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
											<select id="input_page1_province" name="input_page1_province" onchange="selectPage1Province(event)" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
												<option id="option_page1_province_default" value="default" {{ old('input_page1_province') == 'default' ? 'selected' : ''}}>-- Select Province --</option>
												<optgroup label="Region V">
													@foreach ($provinces as $province)
														<option value="{{ $province->id }}" {{ old('input_page1_province') == $province->id ? 'selected' : 'nothing'}}>{{ utf8_decode($province->province) }}</option>
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
											<select id="input_page1_city" name="input_page1_city" onchange="selectPage1City(event)" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" {{ empty(old('input_page1_city')) || old('input_page1_city') == 'default' ? 'disabled' : '' }}>
												<option id="option_page1_city_default" value="default" {{ old('input_page1_city') == 'default' ? 'selected' : '' }} required>-- Select City --</option>
												@if (isset($provinces) && $provinces->count() > 0)
													@foreach ($provinces as $province)
														@if ($province->cities->count() > 0)
														<optgroup id="province-{{ $province->id }}" label="{{$province->province }}" {{ old('input_page1_province') == $province->id ? '' : 'hidden'}}>
															@foreach ($province->cities()->get() as $city)
																<option value="{{$city->id}}" {{ old('input_page1_city') == $city->id ? 'selected' : '' }}>{{ utf8_decode($city->city) }}</option>
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
											<select id="input_page1_municipality" name="input_page1_municipality" onchange="selectPage1Municipality(event)" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" {{ empty(old('input_page1_municipality')) || old('input_page1_municipality') == 'default' ? 'disabled' : '' }} required>
												<option id="option_page1_municipality_default" value="default" {{ old('input_page1_municipality') == 'default' ? 'selected' : '' }}>-- Select Municipality --</option>
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
									<div class="col-span-6 sm:col-span-4">
										<label class="block text-sm font-medium text-gray-700">
											Barangay
										</label>

										<div class="relative mt-2">
											<select id="input_page1_barangay" name="input_page1_barangay" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" {{ empty(old('input_page1_barangay')) || old('input_page1_barangay') == 'default' ? 'disabled' : old('input_page1_barangay') }} required>
											<option id="option_page1_barangay_default" value="default" {{ old('input_page1_barangay') == 'default' ? 'selected' : '' }}>-- Select Barangay --</option>
											
											@if (isset($provinces) && $provinces->count() > 0)
												@foreach ($provinces as $province)
													@if ($province->cities()->count() > 0)
														@foreach ($province->cities()->get() as $city)
														@if ($city->barangays()->where('entity_id', 2)->count() > 0)
															<optgroup id="city-{{ $city->id }}" label="{{$city->city}}" {{ old('input_page1_city') == $city->id ? '' : 'hidden' }}>
																@foreach ($city->barangays()->where('entity_id', 2)->get() as $barangay)
																	<option value="{{$barangay->id}}" {{ old('input_page1_barangay') == $barangay->id ? 'selected' : ''}}>{{ utf8_decode($barangay->barangay) }}</option>
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
																	<option value="{{$barangay->id}}" {{ old('input_page1_barangay') == $barangay->id ? 'selected' : ''}}>{{ utf8_decode($barangay->barangay) }}</option>
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
							
						</div>
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

        document.getElementById('svg_page1_avatar').style.display = "none";
        document.getElementById('img_page1_avatar').style.display = "";
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

        document.getElementById('svg_page1_signature').style.display = "none";
        document.getElementById('img_page1_signature').style.display = "";
        document.getElementById('img_page1_signature').src = image;

    });

    }
</script>

<script>
    // working!!!
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

</script>
