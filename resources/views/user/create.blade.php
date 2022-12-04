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
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Edit - user Information</span>
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

			<form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="md:grid md:grid-cols-4 md:gap-6">
					<div class="md:col-span-1">
						<div class="px-4 sm:px-0">
							<h3 class="text-lg font-medium leading-6 text-gray-900">Profile</h3>
							<p class="mt-1 text-sm text-gray-600">This information will be displayed publicly so be careful what you share.</p>
						</div>
					</div>
					<div class="mt-5 md:col-span-3 md:mt-0">

						<div class="shadow sm:overflow-hidden sm:rounded-md">
	
							<div class="space-y-6 bg-white px-4 py-5 sm:p-6">
								<div>
									<label class="block text-sm font-medium text-gray-700">Photo</label>
									<div class="mt-1 flex items-center">
										
										<span class="inline-block h-12 w-12 overflow-hidden rounded-full bg-gray-100">
											<svg id="svg_user_avatar" class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
											  <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />00 n
											</svg>
	
											<img id="img_user_avatar" class="mb-3 rounded-full shadow-lg" src="" style="display: none"/>
										</span>
										<input type="file" name="input_user_avatar" id="input_user_avatar" hidden>
										<button onclick="userUploadAvatar()" type="button" class="ml-5 rounded-md border border-gray-300 bg-white py-2 px-3 text-sm font-medium leading-4 text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Upload</button>
									</div>
								</div>
	
								<div>
									<label class="block text-sm font-medium text-gray-700">Signature</label>
									<div class="mt-1 flex items-center">
										<span class="inline-block h-12 w-36 overflow-hidden rounded-sm bg-gray-100">
											<svg id="svg_user_signature" class="h-full w-full text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
	
											<img id="img_user_signature" class="mb-3 h-full w-full rounded-sm shadow-lg" src="" style="display: none"/>
										</span>
										<input type="file" name="input_user_signature" id="input_user_signature" hidden>
										<button onclick="userUploadSignature()" type="button" class="ml-5 rounded-md border border-gray-300 bg-white py-2 px-3 text-sm font-medium leading-4 text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Upload</button>
									</div>
								</div>

							</div>

						</div>	
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
								<h3 class="text-lg font-medium leading-6 text-gray-900">Login Information</h3>
								<p class="mt-1 text-sm text-gray-600">Use a permanent address where you can receive mail.</p>
							</div>
						</div>
						<div class="mt-5 md:col-span-3 md:mt-0">
							<div class="overflow-hidden shadow sm:rounded-md">
								<div class="bg-white px-4 py-5 sm:p-6">
									<div class="grid grid-cols-6 gap-6 mt-4">

										<div class="col-span-6 sm:col-span-4">
											<div class="relative z-0 w-full mb-6 group">
												<input name="input_user_email" id="input_user_email" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('input_user_email') }}" required/>
												<label for="label_user_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
											</div>
										</div>
		
										<div class="col-span-6 sm:col-span-4">
											<div class="relative z-0 w-full mb-6 group">

												<div class="py-2" x-data="{ show: true }">
													<p class="px-1 text-xs text-gray-600">Password</p>
													<div class="relative">
														<input name="input_user_password" id="input_user_password" placeholder="" :type="show ? 'password' : 'text'" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
														<div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
									
															<svg class="h-6 text-gray-700" fill="none" @click="show = !show"
															:class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg"
															viewbox="0 0 576 512">
																<path fill="currentColor"
																	d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
																</path>
															</svg>
										
															<svg class="h-6 text-gray-700" fill="none" @click="show = !show"
															:class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg"
															viewbox="0 0 640 512">
															<path fill="currentColor"
																d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
															</path>
															</svg>
										
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
								<h3 class="text-lg font-medium leading-6 text-gray-900">User Information</h3>
								<p class="mt-1 text-sm text-gray-600">Use a permanent address where you can receive mail.</p>
							</div>
						</div>
						<div class="mt-5 md:col-span-3 md:mt-0">
							<div class="overflow-hidden shadow sm:rounded-md">
								<div class="bg-white px-4 py-5 sm:p-6">
									<div class="grid grid-cols-6 gap-6 mt-4">

										<div class="col-span-6 sm:col-span-3">
											<div class="relative z-0 w-full mb-6 group">
												<input name="input_user_firstname" id="input_user_firstname" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('input_user_firstname') }}" required/>
												<label for="label_page1_firstname" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First name</label>
											</div>
										</div>
						
										<div class="col-span-6 sm:col-span-3">
											<div class="relative z-0 w-full mb-6 group">
												<input name="input_user_middlename" id="input_user_middlename" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('input_user_middlename')}}"/>
												<label for="label_page1_middlename" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Middle name or M.I</label>
											</div>
										</div>

										<div class="col-span-6 sm:col-span-3">
										<div class="relative z-0 w-full mb-6 group">
											<input name="input_user_lastname" id="input_user_lastname" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('input_user_lastname')}}" required/>
											<label for="label_page1_lastname" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last name</label>
										</div>
										</div>

										<div class="col-span-6 sm:col-span-3">
										<div class="relative z-0 w-full mb-6 group">
											<input name="input_user_suffix" id="input_user_suffix" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('input_user_suffix')}}"/>
											<label for="label_page1_lastname" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Suffix <small>Ex. ("Jr.", "Sr.", or "III." )</small></label>
										</div>
										</div>

										<div class="col-span-6 sm:col-span-3">
										<div class="relative z-0 w-full mb-6 group">
											<input name="input_user_dateofbirth" id="input_user_dateofbirth" type="date" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('input_user_dateofbirth')}}" required/>
											<label for="label_page1_dateofbirth" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Date of Birth</label>
										</div>
										</div>
										
										<div class="col-span-6 sm:col-span-3">
										<div class="relative z-0 w-full mb-6 group">
											<input name="input_user_age" id="input_user_age" type="number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('input_user_age')}}" required/>
											<label for="label_page1_age" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Age</label>
										</div>
										</div>

										<div class="col-span-6 sm:col-span-4">
											<div class="relative z-0 w-full mb-6 group">
												<input name="input_user_phonenumber" id="input_user_phonenumber" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('input_user_phonenumber')}}"/>
												<label for="label_page1_phoneNumber" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Contact Number <small>(Ex. 09xx-xxxx-xxx)</small></label>
											</div>
										</div>

										<div class="col-span-6 sm:col-span-4">
											<fieldset>
												<legend class="contents text-sm font-medium text-gray-900">Role</legend>
												<p class="text-sm text-gray-500"></p>
												<div class="mt-4 space-y-4">
													<div class="flex items-center">
														<input id="input_user_role-admin" name="input_user_role" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500" value="Admin" {{ old('input_user_role') == "admin" ? 'checked' : '' }}>
														<label for="input_user_role" class="ml-3 block text-sm font-medium text-gray-700">Admin</label>
													</div>
													<div class="flex items-center">
														<input id="input_user_role-enumerator" name="input_user_role" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500" value="Enumerator" {{ old('input_user_role') == "enumerator" ? 'checked' : '' }}>
														<label for="input_user_role" class="ml-3 block text-sm font-medium text-gray-700">Enumerator</label>
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
														<input id="input_user_sex-male" name="input_user_sex" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500" value="Male" {{ old('input_user_sex') == "Male" ? 'checked' : '' }}>
														<label for="input_user_sex" class="ml-3 block text-sm font-medium text-gray-700">Male</label>
													</div>
													<div class="flex items-center">
														<input id="input_user_sex-female" name="input_user_sex" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500" value="Female" {{ old('input_user_sex') == "Female" ? 'checked' : '' }}>
														<label for="input_user_sex" class="ml-3 block text-sm font-medium text-gray-700">Female</label>
													</div>
												</div>
											</fieldset>
										</div>

										<div class="col-span-6 sm:col-span-4">
											<div class="relative z-0 w-full mb-6 group">
												<input name="input_user_country" id="input_user_country" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ empty(old('input_user_country')) ? 'Philippines' : old('input_user_country') }}" required/>
												<label for="label_page1_country" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Country</label>
											</div>
										</div>

										<div class="col-span-6 sm:col-span-4">
											<div class="relative z-0 w-full mb-6 group">
												<input name="input_user_streetaddress" id="input_user_streetaddress" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('input_user_streetaddress') }}" required/>
												<label for="label_page1_streetAddress" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Street Address</label>
											</div>
										</div>

										<div class="col-span-6 sm:col-span-4">
											<label class="block text-sm font-medium text-gray-700">
											Province
											</label>
											<div class="relative mt-2">
												<select id="input_user_province" name="input_user_province" onchange="selectPage1Province(event)" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
													<option id="option_page1_province_default" value="default" {{ old('input_user_province') == 'default' ? 'selected' : ''}}>-- Select Province --</option>
													<optgroup label="Region V">
														@foreach ($provinces as $province)
															<option value="{{ $province->id }}" {{ old('input_user_province') == $province->id ? 'selected' : ''}}>{{ utf8_decode($province->province) }}</option>
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
												<select id="input_user_city" name="input_user_city" onchange="selectPage1City(event)" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" {{ empty(old('input_user_city')) || old('input_user_city') == 'default' ? 'disabled' : '' }}>
													<option id="option_page1_city_default" value="default" {{ old('input_user_city') == 'default' ? 'selected' : '' }} required>-- Select City --</option>
													@if (isset($provinces) && $provinces->count() > 0)
														@foreach ($provinces as $province)
															@if ($province->cities->count() > 0)
															<optgroup id="province-{{ $province->id }}" label="{{$province->province }}" {{ old('input_user_province') == $province->id ? '' : 'hidden'}}>
																@foreach ($province->cities()->get() as $city)
																	<option value="{{$city->id}}" {{ old('input_user_city') == $city->id ? 'selected' : '' }}>{{ utf8_decode($city->city) }}</option>
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
												<select id="input_user_municipality" name="input_user_municipality" onchange="selectPage1Municipality(event)" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" {{ empty(old('input_user_municipality')) || old('input_user_municipality') == 'default' ? 'disabled' : '' }} required>
													<option id="option_page1_municipality_default" value="default" {{ old('input_user_municipality') == 'default' ? 'selected' : '' }}>-- Select Municipality --</option>
													@if (isset($provinces) && $provinces->count() > 0)
														@foreach ($provinces as $province)
															@if ($province->municipalities->count() > 0)
															<optgroup id="province-{{$province->id}}" label="{{$province->province}}" {{ old('input_user_province') == $province->id ? '' : 'hidden'}}>
																@foreach ($province->municipalities()->get() as $municipality)
																	<option value="{{$municipality->id}}" {{ old('input_user_municipality') == $municipality->id ? 'selected' : '' }}>{{ utf8_decode($municipality->municipality) }}</option>
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
												<select id="input_user_barangay" name="input_user_barangay" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" {{ empty(old('input_user_barangay')) || old('input_user_barangay') == 'default' ? 'disabled' : old('input_user_barangay') }} required>
												<option id="option_page1_barangay_default" value="default" {{ old('input_user_barangay') == 'default' ? 'selected' : '' }}>-- Select Barangay --</option>
												
												@if (isset($provinces) && $provinces->count() > 0)
													@foreach ($provinces as $province)
														@if ($province->cities()->count() > 0)
															@foreach ($province->cities()->get() as $city)
															@if ($city->barangays()->where('entity_id', 2)->count() > 0)
																<optgroup id="city-{{ $city->id }}" label="{{$city->city}}" {{ old('input_user_city') == $city->id ? '' : 'hidden' }}>
																	@foreach ($city->barangays()->where('entity_id', 2)->get() as $barangay)
																		<option value="{{$barangay->id}}" {{ old('input_user_barangay') == $barangay->id ? 'selected' : ''}}>{{ utf8_decode($barangay->barangay) }}</option>
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
																<optgroup id="municipality-{{ $municipality->id }}" label=" {{$municipality->municipality}}" {{ old('input_user_municipality') == $municipality->id ? '' : 'hidden' }}>
																	@foreach ($municipality->barangays()->where('entity_id', 3)->get() as $barangay)
																		<option value="{{$barangay->id}}" {{ old('input_user_barangay') == $barangay->id ? 'selected' : ''}}>{{ utf8_decode($barangay->barangay) }}</option>
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
									<button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Submit</button>
								</div>
							</div>

						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</x-app-layout>

<script>
  function userUploadAvatar(event)
  {
      
	const inputPage1Avatar = document.getElementById('input_user_avatar');
	inputPage1Avatar.click();

	inputPage1Avatar.addEventListener("change", function(){
		var selectedFile = inputPage1Avatar.files[0];
		var image = URL.createObjectURL(inputPage1Avatar.files[0]);

        document.getElementById('svg_user_avatar').style.display = "none";
        document.getElementById('img_user_avatar').style.display = "";
        document.getElementById('img_user_avatar').src = image;

  	});

  }

  function userUploadSignature(event)
  {
      
	const inputPage1Signature = document.getElementById('input_user_signature');
	inputPage1Signature.click();

	inputPage1Signature.addEventListener("change", function(){
		var selectedFile = inputPage1Signature.files[0];
		var image = URL.createObjectURL(inputPage1Signature.files[0]);

        document.getElementById('svg_user_signature').style.display = "none";
        document.getElementById('img_user_signature').style.display = "";
        document.getElementById('img_user_signature').src = image;

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

        document.querySelector('#input_user_city').disabled = true;

        document.querySelector('#input_user_municipality').disabled = true;
        
        document.querySelector('#input_user_barangay').disabled = true;

        document.querySelector('#option_page1_city_default').selected = "selected";

        document.querySelector('#option_page1_municipality_default').selected = "selected";

        document.querySelector('#option_page1_barangay_default').selected = "selected";

        if (value !== defaultValue) 
        {
            document.querySelector('#input_user_city').disabled = false;
               
            document.querySelector('#input_user_municipality').disabled = false;

            var selectPage1Municipality = document.querySelector('#input_user_municipality').options;

            var selectPage1City = document.querySelector('#input_user_city').options; 

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

        document.querySelector('#input_user_municipality').disabled = true;

        if(value == "default")
        {
            document.querySelector('#input_user_municipality').disabled = false;

        }

        document.querySelector('#input_user_barangay').disabled = false;

        var selectPage1Barangay = document.querySelector('#input_user_barangay').options; 

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

        document.querySelector('#input_user_city').disabled = true;

        if(value == "default")
        {
            document.querySelector('#input_user_city').disabled = false;
        }

        document.querySelector('#input_user_barangay').disabled = false;

        var selectPage1Barangay = document.querySelector('#input_user_barangay').options; 

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

	var page1EducationElements = document.getElementsByName('input_user_education');
    
    page1EducationElements.forEach(element => {
        element.addEventListener("click", (event) => {
            
            var value = event.target.value;

            document.querySelector('#input_user_education_specify').value = '';
            document.querySelector('#input_user_education_specify').disabled = true;
            

            if (value == 10) // 10: others
            {
                document.querySelector('#input_user_education_specify').disabled = false;
                document.querySelector('#input_user_education_specify').focus();
            }
        })
    });

    var page1CivilStatusElements = document.getElementsByName('input_user_civilstatus');
    
    page1CivilStatusElements.forEach(element => {
        element.addEventListener("click", (event) => {
            
            var value = event.target.value;

            // console.log(value);
            document.querySelector('#input_user_civilstatus_specify').value = '';
            document.querySelector('#input_user_civilstatus_specify').disabled = true;

            if (value == 5) // 5: others
            {
                document.querySelector('#input_user_civilstatus_specify').disabled = false;
                document.querySelector('#input_user_civilstatus_specify').focus();
            }
        })
    });

</script>
