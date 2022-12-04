<x-app-layout>
    <div class="flex min-h-screen bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">

            {{-- BreadCrumbs --}}
            <nav class="flex my-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('enumerator.welcome') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
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
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Farmer Profile</span>
                    </div>
                </li>
                </ol>
            </nav>

			<div class="hidden sm:block" aria-hidden="true">
				<div class="py-5">
					<div class="border-t border-gray-200"></div>
				</div>
			</div>

            <div class="w-full md:w-full md:mx-2">
                <!-- Profile tab -->

                <!-- About Section -->
                <section id="farmer-profile">
                    <div class="bg-white p-3 shadow-sm rounded-sm">
                        <div class="flex flex-col items-center pb-10">
                            <a target="_blank" href="{{ is_null($farmer->profile_img) ? asset('images/farmer/avatar/default.png') : asset('images/farmer/avatar/'.$farmer->profile_img) }}">
                                <img class="mb-3 w-24 h-24 rounded-full shadow-lg" src="{{ is_null($farmer->profile_img) ? asset('images/farmer/avatar/default.png') : asset('images/farmer/avatar/'.$farmer->profile_img) }}" alt="{{ $farmer->firstName." ".$farmer->lastName}}"/>
                            </a>
    
                            {{-- <img class="mb-3 w-24 h-24 rounded-full shadow-lg" src="https://lavinephotography.com.au/wp-content/uploads/2017/01/PROFILE-Photography-112.jpg" alt="Bonnie image"/> --}}
    
                            <h3 class="mb-1 text-3xl font-bold  text-gray-700 dark:text-white">{{ $farmer->firstName." ".$farmer->lastName}}</h3>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Farmer</span>
                            {{-- <div class="flex mt-4 space-x-3 md:mt-6">
                                <a href="#" class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add friend</a>
                                <a href="#" class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-gray-900 bg-white rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">Message</a>
                            </div> --}}
                        </div>
                        <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                            
                            <span clas="text-green-500">
                                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </span>
                            <span class="tracking-wide">Farmer Information</span>
                        </div>
    
                        <hr class="my-4">
    
                        <div class="text-gray-700">
                            <div class="grid md:grid-cols-2 text-sm">
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Control Number</div>
                                    <div class="px-4 py-2 font-bold">{{ utf8_decode($farmer->controlNumber) }}</div>
                                </div>
                                <br>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">First Name</div>
                                    <div class="px-4 py-2 font-bold">{{ utf8_decode($farmer->firstName) }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Last Name</div>
                                    <div class="px-4 py-2 font-bold">{{ utf8_decode($farmer->lastName) }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Middle Name</div>
                                    <div class="px-4 py-2 font-bold">{{ utf8_decode($farmer->middleName) }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Suffix</div>
                                    <div class="px-4 py-2 font-bold">{{ utf8_decode($farmer->suffixName) }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Sex</div>
                                    <div class="px-4 py-2 font-bold">{{ utf8_decode($farmer->sex) }} </div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Date of Birth</div>
                                    <div class="px-4 py-2 font-bold">{{ utf8_decode($farmer->dateOfBirth) }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Age</div>
                                    <div class="px-4 py-2 font-bold">{{ utf8_decode($farmer->age) }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Contact No.</div>
                                    <div class="px-4 py-2 font-bold">{{ utf8_decode($farmer->phoneNumber) }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Country</div>
                                    <div class="px-4 py-2 font-bold">{{ utf8_decode($farmer->country) }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Street Address</div>
                                    <div class="px-4 py-2 font-bold">{{ utf8_decode($farmer->streetAddress) }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">City</div>
                                    <div class="px-4 py-2 font-bold">{{ utf8_decode($farmer->city) }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Municipality</div>
                                    <div class="px-4 py-2 font-bold">{{ utf8_decode($farmer->municipality) }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Barangay</div>
                                    <div class="px-4 py-2 font-bold">{{ utf8_decode($farmer->barangay) }}</div>
                                </div>

                            </div>
                        </div>
    
                        <hr class="my-4">
    
                        <div class="text-gray-700 py-4">
                            <div class="grid md:grid-cols-2 text-sm">
    
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Civil Status</div>
                                    <div class="px-4 py-2 font-bold">{{ utf8_decode($farmer->civilStatusVal) }} {{ empty($farmer->civilStatus_specify) ? '' : ' - '.utf8_decode($farmer->civilStatus_specify) }}</div>
                                </div>
    
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Education</div>
                                    <div class="px-4 py-2 font-bold">{{ utf8_decode($farmer->educationVal) }} {{ empty($farmer->education_specify) ? '' : ' - '.utf8_decode($farmer->education_specify) }}</div>
                                </div>
    
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">RSBSA</div>
                                    <div class="px-4 py-2 font-bold {{ $farmer->rsbsaReg == 0 ? 'bg-blue-100' : 'bg-green-100'  }}">{{ $farmer->rsbsaReg == 0 ? 'Not Registered' : 'Registered'  }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">RSBSA Membership</div>
                                    <div class="px-4 py-2 font-bold">{{ utf8_decode($farmer->rsbsaMembership) }}</div>
                                </div>
    
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Source of Income </div>
                                    <div class="px-4 py-2 font-bold">{{ utf8_decode($farmer->sourceOfIncome) }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Farming Experience</div>
                                    <div class="px-4 py-2 font-bold">{{ utf8_decode($farmer->farmingExperience) }} year(s)</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Signature </div>
                                    <div class="px-4 py-2 font-bold">
                                        <a target="_blank" href="{{ is_null($farmer->signature) ? asset('images/farmer/signature/default.png') : asset('images/farmer/signature/'.$farmer->signature) }}">
                                            <img class="mb-3 w-full h-24 rounded-lg shadow-lg" src="{{ is_null($farmer->signature) ? asset('images/farmer/signature/default.png') : asset('images/farmer/signature/'.$farmer->signature) }}" alt="{{ $farmer->firstName." ".$farmer->lastName}}"/>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- <button
                            class="block w-full text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">
                            
                        </button> --}}
                    </div>
                </section>
                <!-- End of about section -->

                <section>
                    <div class="flex justify-end flex-row py-4">
                        <div>
                            <a href="{{ route('farmer.edit', ['farmer'=> $farmer->id]) }}" >
                                <button class="inline-flex h-8 px-4 py-2 bg-yellow-500  text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-600 hover:shadow-lg  focus:bg-yellow-600 focus:shadow-lg active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out items-center mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                    <span>Edit Farmer</span>
                                </button>
                            </a>
                        </div>

                        {{-- <div>
                            <button class="inline-flex py-2 px-4 bg-gray-200 text-gray-700 font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-300 hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out items-center mr-2">
                                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                                <span>Download</span>
                            </button>
                        </div> --}}
                    </div>
                </section>
        
                <div class="my-4"></div>

                <section id="farm-profile">
                    <div class="bg-white p-3 shadow-sm rounded-sm">
                        <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                            <span clas="text-green-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.429 9.75L2.25 12l4.179 2.25m0-4.5l5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0l4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0l-5.571 3-5.571-3" />
                                </svg> 
                            </span>
                            <span class="tracking-wide">Farm Information</span>
                        </div>
    
                        <hr class="my-4">
    
                        <div class="text-gray-700">
                            <div class="grid md:grid-cols-2 text-sm">
    
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Total Number of Farms</div>
                                    <div class="px-4 py-2 font-bold">{{ $farms->count() }}</div>
                                </div>
    
                            </div>
                        </div>
                        
                        @if (isset($farms) && !empty($farms))
                            @foreach ($farms as $farm)
                                <hr class="my-4">
    
                                <div class="text-gray-700">
                                    <div class="grid md:grid-cols-2 text-sm">
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">Farm No. </div>
                                            <div class="px-4 py-2 font-bold">{{ $loop->iteration }}</div>
                                        </div>

                                        {{-- <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">Download Form</div>
                                            <div class="px-4 py-2 font-bold">
                                                <a href="#">
                                                    <button class="inline-flex h-8 px-4 py-2 bg-gray-200 text-gray-700 font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-300 hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out items-center mr-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                                        </svg>  
                                                        <span title="PDF Download Form">Download</span>
                                                    </button>
                                                </a>
                                            </div>
                                        </div> --}}
    
                                        {{-- <br> --}}
    
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">Country</div>
                                            <div class="px-4 py-2 font-bold">{{ utf8_decode($farm->country) }}</div>
                                        </div>
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">Street Address</div>
                                            <div class="px-4 py-2 font-bold">{{ utf8_decode($farm->streetAddress) }}</div>
                                        </div>
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">City</div>
                                            <div class="px-4 py-2 font-bold">{{ utf8_decode($farm->city) }}</div>
                                        </div>
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">Municipality</div>
                                            <div class="px-4 py-2 font-bold">{{ utf8_decode($farm->municipality) }}</div>
                                        </div>
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">Barangay</div>
                                            <div class="px-4 py-2 font-bold">{{ utf8_decode($farm->barangay) }}</div>
                                        </div>
    
                                    </div>
                                </div>

                                <section>
                                    <div class="flex justify-end flex-row py-4">
                                        {{-- <div>
                                            <button
                                            onclick="openModal({{$farm->id}})"
                                            class="inline-flex h-8 px-4 py-2 bg-gray-200 text-gray-700 font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-300 hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out items-center mr-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                                </svg>                                              
                                                <span title="PDF Download Form">Download</span>
                                            </button>
                                        </div> --}}
                                        <div>
                                            <button
                                            onclick="openModal({{$farm->id}})"
                                            class="inline-flex h-8 px-4 py-2 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out items-center mr-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                                <span title="Show Information">Show Farm</span>
                                            </button>
                                        </div>
                                        
                                        <div>
                                            <a href="{{ route('farm.edit', ['farm'=> $farm->id]) }}" >
                                                <button class="inline-flex h-8 px-4 py-2 bg-yellow-500  text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-600 hover:shadow-lg  focus:bg-yellow-600 focus:shadow-lg active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out items-center mr-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                    </svg>
                                                    <span title="Edit Farm">Edit Farm</span>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </section>
    
                                <!-- Extra Large Modal -->
                                <div id="modal_farm-{{$farm->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full  md:inset-0 h-modal md:h-full justify-center items-center bg-black bg-opacity-75" aria-hidden="true">
                                    {{-- <div id="modal_farm-{{$farm->id}}-start" class="relative p-4 w-full max-w-7xl h-full md:h-auto min-h-screen min-w-full"> --}}
                                    <div id="modal_farm-{{$farm->id}}-start" class="relative p-4 min-h-screen min-w-full max-w-7xl md:h-auto ">
                                        <!-- Modal content -->
                                        <div  class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                                                <span clas="text-green-500">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                                                </span>
                                                <span class="tracking-wide">Farm No. {{ $loop->iteration }}</span>
                                                <button onclick="openModal({{$farm->id}})" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="modal_farm-{{$farm->id}}">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <section id="farm-information" >
                                                <div class="p-6 space-y-6">
                                                    <div class="text-gray-700">
                                                        <p class="px-4 py-2 font-bold">B. Farm Information</p> 
                                                        <div class="grid md:grid-cols-2 text-sm">
                                                            <div class="grid grid-cols-2">
                                                                <div class="px-4 py-2 font-semibold">Country</div>
                                                                <div class="px-4 py-2">{{ utf8_decode($farm->country) }}</div>
                                                            </div>
                                                            <div class="grid grid-cols-2">
                                                                <div class="px-4 py-2 font-semibold">Street Address</div>
                                                                <div class="px-4 py-2">{{ utf8_decode($farm->streetAddress) }}</div>
                                                            </div>
                                                            <div class="grid grid-cols-2">
                                                                <div class="px-4 py-2 font-semibold">City</div>
                                                                <div class="px-4 py-2">{{ utf8_decode($farm->city) }}</div>
                                                            </div>
                                                            <div class="grid grid-cols-2">
                                                                <div class="px-4 py-2 font-semibold">Municipality</div>
                                                                <div class="px-4 py-2">{{ utf8_decode($farm->municipality) }}</div>
                                                            </div>
                                                            <div class="grid grid-cols-2">
                                                                <div class="px-4 py-2 font-semibold">Barangay</div>
                                                                <div class="px-4 py-2">{{ utf8_decode($farm->barangay) }}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <hr class="my-4">
        
                                                    <div class="text-gray-700">
                                                        <div class="grid md:grid-cols-2 text-sm">
        
                                                            <div class="grid grid-cols-2">
                                                                <div class="px-4 py-2 font-semibold">Land Tenurial Status</div>
                                                                <div class="px-4 py-2">{{ utf8_decode($farm->landtenurialstatusVal) }} {{ empty($farmer->education_specify) ? '' : ' - '.utf8_decode($farmer->education_specify) }}</div>
                                                            </div>
                                                            
                                                            <div class="grid grid-cols-2">
                                                                <div class="px-4 py-2 font-semibold"></div>
                                                                <div class="px-4 py-2"></div>
                                                            </div>
                                                            <div class="grid grid-cols-2">
                                                                <div class="px-4 py-2 font-semibold">Total Rice Area Including Stress Area</div>
                                                                <div class="px-4 py-2">{{ utf8_decode($farm->totalRiceArea) }}</div>
                                                            </div>
                                                            <div class="grid grid-cols-2">
                                                                <div class="px-4 py-2 font-semibold">Total Stress Area</div>
                                                                <div class="px-4 py-2">{{ utf8_decode($farm->totalStressArea) }}</div>
                                                            </div>
        
                                                            
                                                            <div class="grid grid-cols-2">
                                                                <div class="px-4 py-2 font-semibold">Stress Ecosystem</div>
                                                                <div class="px-4 py-2">
                                                                    
                                                                    <div class="flex items-center mb-4">
                                                                        <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                                        {{ empty($farm->stressEcosystem) ? '' : (in_array(0, $farm->stressEcosystem) ? 'checked' : '')}}
                                                                         disabled>
                                                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Flooded/Submerged</label>
                                                                    </div>
        
                                                                    <div class="flex items-center mb-4">
                                                                        <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" 
                                                                        {{ empty($farm->stressEcosystem) ? '' : (in_array(1, $farm->stressEcosystem) ? 'checked' : '')}}
                                                                        disabled>
                                                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Saline</label>
                                                                    </div>
        
                                                                    <div class="flex items-center mb-4">
                                                                        <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" 
                                                                        {{ empty($farm->stressEcosystem) ? '' : (in_array(2, $farm->stressEcosystem) ? 'checked' : '')}}
                                                                        disabled>
                                                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Drought</label>
                                                                    </div>
                                                                </div>
                                                            </div>
        
                                                            <div class="grid grid-cols-2">
                                                                <div class="px-4 py-2 font-semibold">Ecosystem</div>
                                                                <div class="px-4 py-2">{{ utf8_decode($farm->ecosystem) }}</div>
                                                            </div>
        
                                                        </div>
                                                    </div>
                                                    
                                                    {{-- <hr class="my-4"> --}}
        
                                                    <div class="text-gray-700">
                                                        <p class="px-4 py-2 font-bold text-sm">Production of Palay under Normal Condition during Dry Season</p> 
                                                        <div class="grid md:grid-cols-2 text-sm">
                                                            <table class="border-collapse border border-slate-400 w-full text-sm text-left text-gray-500 dark:text-gray-400 ml-4">
                                                                <tbody>
                                                                  <tr>
                                                                    <td class="border border-slate-300 px-4 py-2">1. Average Yield based on Actual Area <small>(Bag/Ha)</td>
                                                                    <td class="border border-slate-300 px-4 py-2">{{ utf8_decode($farm->pp_ds_unc_question1) }} <small>(Bag/Ha)</td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td class="border border-slate-300 px-4 py-2">2. Average Yield of Palay <small>(Kg/Bag)</small></td>
                                                                    <td class="border border-slate-300 px-4 py-2">{{ utf8_decode($farm->pp_ds_unc_question2) }} <small>(Kg/Bag)</small></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td class="border border-slate-300 px-4 py-2">3. Production Cost <small>(PHP 0.00)</small></td>
                                                                    <td class="border border-slate-300 px-4 py-2"> <small>PHP</small> {{ utf8_decode($farm->pp_ds_unc_question3) }}</td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td class="border border-slate-300 px-4 py-2">4. Price of Palay per Kg <small>(PHP 0.00)</small></td>
                                                                    <td class="border border-slate-300 px-4 py-2"> <small>PHP</small> {{ utf8_decode($farm->pp_ds_unc_question4) }}</td>
                                                                  </tr>
                                                                </tbody>
                                                            </table>                                                                                             
        
                                                        </div>
                                                    </div>
                                                    
                                                    {{-- <hr class="my-4"> --}}
        
                                                    <div class="text-gray-700">
                                                        <p class="px-4 py-2 font-bold text-sm">Production of Palay under Stress Condition during Dry Season</p> 
                                                        <div class="grid md:grid-cols-2 text-sm">
        
                                                            <table class="border-collapse border border-slate-400 w-full text-sm text-left text-gray-500 dark:text-gray-400 ml-4">
                                                                <tbody>
                                                                  <tr>
                                                                    <td class="border border-slate-300 px-4 py-2">1. Average Yield based on Actual Area <small>(Bag/Ha)</td>
                                                                    <td class="border border-slate-300 px-4 py-2">{{ utf8_decode($farm->pp_ds_usc_question1) }} <small>(Bag/Ha)</td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td class="border border-slate-300 px-4 py-2">2. Average Yield of Palay <small>(Kg/Bag)</small></td>
                                                                    <td class="border border-slate-300 px-4 py-2">{{ utf8_decode($farm->pp_ds_usc_question2) }} <small>(Kg/Bag)</small></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td class="border border-slate-300 px-4 py-2">3. Production Cost <small>(PHP 0.00)</small></td>
                                                                    <td class="border border-slate-300 px-4 py-2"> <small>PHP</small> {{ utf8_decode($farm->pp_ds_usc_question3) }}</td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td class="border border-slate-300 px-4 py-2">4. Price of Palay per Kg <small>(PHP 0.00)</small></td>
                                                                    <td class="border border-slate-300 px-4 py-2"> <small>PHP</small> {{ utf8_decode($farm->pp_ds_usc_question4) }}</td>
                                                                  </tr>
                                                                </tbody>
                                                            </table>                                                                                             
        
                                                        </div>
                                                    </div>
                                                    
                                                    {{-- <hr class="my-4"> --}}
        
                                                    <div class="text-gray-700">
                                                        <p class="px-4 py-2 font-bold text-sm">Production of Palay under Normal Condition during Wet Season
                                                        </p> 
                                                        <div class="grid md:grid-cols-2 text-sm">
        
                                                            <table class="border-collapse border border-slate-400 w-full text-sm text-left text-gray-500 dark:text-gray-400 ml-4">
                                                                <tbody>
                                                                  <tr>
                                                                    <td class="border border-slate-300 px-4 py-2">1. Average Yield based on Actual Area <small>(Bag/Ha)</td>
                                                                    <td class="border border-slate-300 px-4 py-2">{{ utf8_decode($farm->pp_ws_unc_question1) }} <small>(Bag/Ha)</td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td class="border border-slate-300 px-4 py-2">2. Average Yield of Palay <small>(Kg/Bag)</small></td>
                                                                    <td class="border border-slate-300 px-4 py-2">{{ utf8_decode($farm->pp_ws_unc_question2) }} <small>(Kg/Bag)</small></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td class="border border-slate-300 px-4 py-2">3. Production Cost <small>(PHP 0.00)</small></td>
                                                                    <td class="border border-slate-300 px-4 py-2"> <small>PHP</small> {{ utf8_decode($farm->pp_ws_unc_question3) }}</td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td class="border border-slate-300 px-4 py-2">4. Price of Palay per Kg <small>(PHP 0.00)</small></td>
                                                                    <td class="border border-slate-300 px-4 py-2"> <small>PHP</small> {{ utf8_decode($farm->pp_ws_unc_question4) }}</td>
                                                                  </tr>
                                                                </tbody>
                                                            </table>                                                                                             
        
                                                        </div>
                                                    </div>
                                                    
                                                    {{-- <hr class="my-4"> --}}
        
                                                    <div class="text-gray-700">
                                                        <p class="px-4 py-2 font-bold text-sm">Production of Palay under Stress Condition during Wet Season
                                                        </p> 
                                                        <div class="grid md:grid-cols-2 text-sm">
        
                                                            <table class="border-collapse border border-slate-400 w-full text-sm text-left text-gray-500 dark:text-gray-400 ml-4">
                                                                <tbody>
                                                                  <tr>
                                                                    <td class="border border-slate-300 px-4 py-2">1. Average Yield based on Actual Area <small>(Bag/Ha)</td>
                                                                    <td class="border border-slate-300 px-4 py-2">{{ utf8_decode($farm->pp_ws_usc_question1) }} <small>(Bag/Ha)</td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td class="border border-slate-300 px-4 py-2">2. Average Yield of Palay <small>(Kg/Bag)</small></td>
                                                                    <td class="border border-slate-300 px-4 py-2">{{ utf8_decode($farm->pp_ws_usc_question2) }} <small>(Kg/Bag)</small></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td class="border border-slate-300 px-4 py-2">3. Production Cost <small>(PHP 0.00)</small></td>
                                                                    <td class="border border-slate-300 px-4 py-2"> <small>PHP</small> {{ utf8_decode($farm->pp_ws_usc_question3) }}</td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td class="border border-slate-300 px-4 py-2">4. Price of Palay per Kg <small>(PHP 0.00)</small></td>
                                                                    <td class="border border-slate-300 px-4 py-2"> <small>PHP</small> {{ utf8_decode($farm->pp_ws_usc_question4) }}</td>
                                                                  </tr>
                                                                </tbody>
                                                            </table>                                                                                             
        
                                                        </div>
                                                    </div>
                                                    
                                                    <hr class="my-4">
                                                </div>
                                            </section>
    
                                            <section id="farm-page3-information" style="display: {{ empty($farm->stressEcosystem) ? 'none' : (in_array(0, $farm->stressEcosystem) ? 'block' : 'none')}}">
                                                <div class="px-6 space-y-6">
                                                    <div class="text-gray-700">
                                                        <p class="px-4 py-2 font-bold">C. Flooding/Submergence Ecosystem</p> 
                                                        <div class="grid md:grid-cols-2 text-sm">
        
                                                            <div class="grid grid-cols-2">
                                                                <div class="px-4 py-2 font-semibold">Source/Cause of floods</div>
                                                                <div class="px-4 py-2">
                                                                    
                                                                @if (isset($optionsSourceOfFloods) && !empty($optionsSourceOfFloods))
                                                                    @foreach ($optionsSourceOfFloods as $sourcesOfFloods)
                                                                        <div class="flex items-center mb-4">
                                                                            <input id="checkbox_sourceofflood_opt_{{ $sourcesOfFloods->position }}" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                                            {{ empty($farm->farm_extended->page3_source_id) ? '' : (in_array($sourcesOfFloods->id, $farm->farm_extended->page3_source_id) ? 'checked' : '')}}
                                                                            disabled>
                                                                            <label for="checkbox_sourceofflood_{{ $sourcesOfFloods->Picklistitem }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $sourcesOfFloods->Picklistitem }} {{ $sourcesOfFloods->position == 5 ? (empty($farm->farm_extended->page3_source_specify) ? '' : ' - '.$farm->farm_extended->page3_source_specify) : ''}}</label>
                                                                        </div>
                                                                    @endforeach
                                                                @endif
        
                                                                </div>
                                                            </div>
        
                                                            <div class="grid grid-cols-2">
                                                                <div class="px-4 py-2 font-semibold">How frequent does flooding occurs for the past 5 years</div>
                                                                <div class="px-4 py-2">
                                                                    
                                                                @if (isset($optionsFrequency) && !empty($optionsFrequency))
                                                                    @foreach ($optionsFrequency as $frequency)
                                                                        <div class="flex items-center mb-4">
                                                                            <input id="checkbox_frequency_opt_{{ $frequency->position }}" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                                            {{ empty($farm->farm_extended->page3_frequency) ? '' : (in_array($frequency->id, $farm->farm_extended->page3_frequency) ? 'checked' : '')}}
                                                                            disabled>
                                                                            <label for="checkbox_frequency_{{ $frequency->Picklistitem }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $frequency->Picklistitem }}</label>
                                                                        </div>
                                                                    @endforeach
                                                                @endif
        
                                                                </div>
                                                            </div>
        
                                                        </div>
                                                    </div>
                                                    
                                                    {{-- <hr class="my-4"> --}}
        
                                                    <div class="text-gray-700">
                                                        <p class="px-4 py-2 font-bold text-sm">Types of Flood experienced</p> 
                                                        
                                                        <div class="grid md:grid-cols-2 text-sm">
        
                                                            <table class="border-collapse border border-slate-400 w-full text-sm text-left text-gray-500 dark:text-gray-400 ml-4">
                                                                <thead>
                                                                    <th class="border border-slate-300 px-4 py-2">
                                                                        Types of Flood
                                                                    </th>
                                                                    <th class="border border-slate-300 px-4 py-2">
                                                                        Water level <small>(cm)</small>
                                                                    </th>
                                                                    <th class="border border-slate-300 px-4 py-2">
                                                                        Duration <small>(No. of Days)</small>
                                                                    </th>
                                                                    <th class="border border-slate-300 px-4 py-2">
                                                                        Duration <small>(No. of Hours)</small>
                                                                    </th>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="border border-slate-300 px-4 py-2">
                                                                            @if (
                                                                                !empty($farm->farm_extended->page3_flashflood_waterlevel) ||
                                                                                !empty($farm->farm_extended->page3_flashflood_days) ||
                                                                                !empty($farm->farm_extended->page3_flashflood_hours)
                                                                            )
                                                                                <div class="inline-flex items-center">
                                                                                    <span class="w-2 h-2 inline-block bg-green-500 rounded-full mr-2"></span>
                                                                                </div>
                                                                            @endif    
                                                                            Flashflood
                                                                        </td>
                                                                        <td class="border border-slate-300 px-4 py-2">{{ utf8_decode($farm->farm_extended->page3_flashflood_waterlevel) }} <small>(cm)</td>
                                                                        <td class="border border-slate-300 px-4 py-2">{{ utf8_decode($farm->farm_extended->page3_flashflood_days) }} <small>day(s)</td>
                                                                        <td class="border border-slate-300 px-4 py-2">{{ utf8_decode($farm->farm_extended->page3_flashflood_hours) }} <small>hour(s)</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="border border-slate-300 px-4 py-2">
                                                                            @if (
                                                                                !empty($farm->farm_extended->page3_intermittent_waterlevel) ||
                                                                                !empty($farm->farm_extended->page3_intermittent_days) ||
                                                                                !empty($farm->farm_extended->page3_intermittent_hours)
                                                                            )
                                                                                <div class="inline-flex items-center">
                                                                                    <span class="w-2 h-2 inline-block bg-green-500 rounded-full mr-2"></span>
                                                                                </div>
                                                                            @endif 
                                                                            Intermittent
                                                                        </td>
                                                                        <td class="border border-slate-300 px-4 py-2">{{ utf8_decode($farm->farm_extended->page3_intermittent_waterlevel) }} <small>(cm)</td>
                                                                        <td class="border border-slate-300 px-4 py-2">{{ utf8_decode($farm->farm_extended->page3_intermittent_days) }} <small>day(s)</td>
                                                                        <td class="border border-slate-300 px-4 py-2">{{ utf8_decode($farm->farm_extended->page3_intermittent_hours) }} <small>hour(s)</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="border border-slate-300 px-4 py-2">
                                                                            @if (
                                                                                !empty($farm->farm_extended->page3_stagnant_waterlevel) ||
                                                                                !empty($farm->farm_extended->page3_stagnant_days) ||
                                                                                !empty($farm->farm_extended->page3_stagnant_hours)
                                                                            )
                                                                                <div class="inline-flex items-center">
                                                                                    <span class="w-2 h-2 inline-block bg-green-500 rounded-full mr-2"></span>
                                                                                </div>
                                                                            @endif 
                                                                            Stagnant
                                                                        </td>
                                                                        <td class="border border-slate-300 px-4 py-2">{{ utf8_decode($farm->farm_extended->page3_stagnant_waterlevel) }} <small>(cm)</td>
                                                                        <td class="border border-slate-300 px-4 py-2">{{ utf8_decode($farm->farm_extended->page3_stagnant_days) }} <small>day(s)</td>
                                                                        <td class="border border-slate-300 px-4 py-2">{{ utf8_decode($farm->farm_extended->page3_stagnant_hours) }} <small>hour(s)</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="border border-slate-300 px-4 py-2">
                                                                            @if (
                                                                                !empty($farm->farm_extended->page3_all_waterlevel) ||
                                                                                !empty($farm->farm_extended->page3_all_days) ||
                                                                                !empty($farm->farm_extended->page3_all_hours)
                                                                            )
                                                                                <div class="inline-flex items-center">
                                                                                    <span class="w-2 h-2 inline-block bg-green-500 rounded-full mr-2"></span>
                                                                                </div>
                                                                            @endif
                                                                            All of the Above
                                                                        </td>
                                                                        <td class="border border-slate-300 px-4 py-2">{{ utf8_decode($farm->farm_extended->page3_all_waterlevel) }} <small>(cm)</td>
                                                                        <td class="border border-slate-300 px-4 py-2">{{ utf8_decode($farm->farm_extended->page3_all_days) }} <small>day(s)</td>
                                                                        <td class="border border-slate-300 px-4 py-2">{{ utf8_decode($farm->farm_extended->page3_all_hours) }} <small>hour(s)</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
        
                                                    <div class="text-gray-700">
                                                        <p class="px-4 py-2 font-bold text-sm">Occurence of Flood</p> 
                                                        <div class="grid md:grid-cols-2 text-sm">
        
                                                            <div class="grid grid-cols-2">
                                                                <div class="px-4 py-2 font-semibold">What month/s during dry season?</div>
                                                                <div class="px-4 py-2">

                                                                    @if (isset($farm->farm_extended->page3_occurenceofflood_ds_months) && !empty($farm->farm_extended->page3_occurenceofflood_ds_months))
                                                                        @if (isset($optionsMonth) && !empty($optionsMonth))
                                                                            @foreach ($optionsMonth as $month)
                                                                                <div class="flex items-center mb-4">
                                                                                    <input id="checkbox_month_opt_{{ $month->position }}" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                                                    {{ in_array($month->id, $farm->farm_extended->page3_occurenceofflood_ds_months) ? 'checked' : ''}}
                                                                                    disabled>
                                                                                    <label for="checkbox_month_{{ $month->Picklistitem }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $month->Picklistitem }}</label>
                                                                                </div>
                                                                            @endforeach
                                                                        @endif
                                                                    @endif
                                                                </div>
                                                            </div>
        
                                                            <div class="grid grid-cols-2">
                                                                <div class="px-4 py-2 font-semibold">Remarks <small>(dry season)</small></div>
                                                                <div class="px-4 py-2">{{ utf8_decode($farm->farm_extended->page3_occurenceofflood_ds_remarks) }}</div>
                                                            </div>
        
                                                            <div class="grid grid-cols-2">
                                                                <div class="px-4 py-2 font-semibold">What month/s during wet season?</div>
                                                                <div class="px-4 py-2">
        
                                                                    @if (isset($farm->farm_extended->page3_occurenceofflood_ws_months) && !empty($farm->farm_extended->page3_occurenceofflood_ws_months))
                                                                        @if (isset($optionsMonth) && !empty($optionsMonth))
                                                                            @foreach ($optionsMonth as $month)
                                                                                <div class="flex items-center mb-4">
                                                                                    <input id="checkbox_month_opt_{{ $month->position }}" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                                                    {{ in_array($month->id, $farm->farm_extended->page3_occurenceofflood_ws_months) ? 'checked' : ''}}
                                                                                    disabled>
                                                                                    <label for="checkbox_month_{{ $month->Picklistitem }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $month->Picklistitem }}</label>
                                                                                </div>
                                                                            @endforeach
                                                                        @endif
                                                                    @endif
                                                                </div>
                                                            </div>
        
                                                            <div class="grid grid-cols-2">
                                                                <div class="px-4 py-2 font-semibold">Remarks <small>(wet season)</small></div>
                                                                <div class="px-4 py-2">{{ utf8_decode($farm->farm_extended->page3_occurenceofflood_ws_remarks) }}</div>
                                                            </div>
        
                                                        </div>
                                                    </div>
                                                    
                                                    <hr class="my-4">
                                                    
                                                </div>
                                            </section>
    
    
                                            <section id="farm-page4-information" style="display: {{ empty($farm->stressEcosystem) ? 'none' : (in_array(1, $farm->stressEcosystem) ? 'block' : 'none')}}">
                                                <div class="p-6 space-y-6">
                                                    <div class="text-gray-700">
                                                        <p class="px-4 py-2 font-bold">D. Salt Water Intrusions Ecosystem</p> 
                                                        <div class="grid md:grid-cols-2 text-sm">
        
                                                            <div class="grid grid-cols-2">
                                                                <div class="px-4 py-2 font-semibold">Source/Cause of Salinity</div>
                                                                <div class="px-4 py-2">
                                                                    
                                                                @if (isset($optionsSourceOfSalinity) && !empty($optionsSourceOfSalinity))
                                                                    @foreach ($optionsSourceOfSalinity as $sourceOfSalinity)
                                                                        <div class="flex items-center mb-4">
                                                                            <input id="checkbox_sourceOfSalinity_opt_{{ $sourceOfSalinity->position }}" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                                            {{ empty($farm->farm_extended->page4_source_id) ? '' : (in_array($sourceOfSalinity->id, $farm->farm_extended->page4_source_id) ? 'checked' : '')}}
                                                                            disabled>
                                                                            <label for="checkbox_sourceOfSalinity_{{ $sourceOfSalinity->Picklistitem }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $sourceOfSalinity->Picklistitem }} {{ $sourceOfSalinity->position == 5 ? (empty($farm->farm_extended->page4_source_specify) ? '' : ' - '.utf8_decode($farm->farm_extended->page4_source_specify)) : ''}}</label>
                                                                        </div>
                                                                    @endforeach
                                                                @endif
        
                                                                </div>
                                                            </div>
        
                                                            <div class="grid grid-cols-2">
                                                                <div class="px-4 py-2 font-semibold">How frequent does salt water intrusion occurs for the past 5 years</div>
                                                                <div class="px-4 py-2">
                                                                    
                                                                @if (isset($optionsFrequency) && !empty($optionsFrequency))
                                                                    @foreach ($optionsFrequency as $frequency)
                                                                        <div class="flex items-center mb-4">
                                                                            <input id="checkbox_frequency_opt_{{ $frequency->position }}" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                                            {{ empty($farm->farm_extended->page4_frequency) ? '' : (in_array($frequency->id, $farm->farm_extended->page4_frequency) ? 'checked' : '')}}
                                                                            disabled>
                                                                            <label for="checkbox_frequency_{{ $frequency->Picklistitem }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $frequency->Picklistitem }}</label>
                                                                        </div>
                                                                    @endforeach
                                                                @endif
        
                                                                </div>
                                                            </div>
        
                                                        </div>
                                                    </div>
        
                                                    <div class="text-gray-700">
                                                        <p class="px-4 py-2 font-bold text-sm">Occurence of Salinity</p> 
        
                                                        <div class="grid md:grid-cols-2 text-sm">
        
                                                            <div class="grid grid-cols-2">
                                                                <div class="px-4 py-2 font-semibold">What month/s during dry season?</div>
                                                                <div class="px-4 py-2">
        
                                                                    @if (isset($farm->farm_extended->page4_occurenceofsalinity_ds_months) && !empty($farm->farm_extended->page4_occurenceofsalinity_ds_months))
                                                                        @if (isset($optionsMonth) && !empty($optionsMonth))

                                                                            @foreach ($optionsMonth as $month)
                                                                                <div class="flex items-center mb-4">
                                                                                    <input id="checkbox_month_opt_{{ $month->position }}" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                                                    {{ in_array($month->id, $farm->farm_extended->page4_occurenceofsalinity_ds_months) ? 'checked' : ''}}
                                                                                    disabled>
                                                                                    <label for="checkbox_month_{{ $month->Picklistitem }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $month->Picklistitem }}</label>
                                                                                </div>
                                                                            @endforeach

                                                                            {{-- @foreach ($optionsMonth as $month)
                                                                                @if (in_array($month->position, [9, 10, 11, 12]))
                                                                                    <div class="flex items-center mb-4">
                                                                                        <input id="checkbox_month_opt_{{ $month->position }}" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                                                        {{ in_array($month->id, $farm->farm_extended->page4_occurenceofsalinity_ds_months) ? 'checked' : ''}}
                                                                                        disabled>
                                                                                        <label for="checkbox_month_{{ $month->Picklistitem }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $month->Picklistitem }}</label>
                                                                                    </div>
                                                                                @endif
                                                                            @endforeach

                                                                            @foreach ($optionsMonth as $month)
                                                                            @if (in_array($month->position, [1, 2, 3]))
                                                                                <div class="flex items-center mb-4">
                                                                                    <input id="checkbox_month_opt_{{ $month->position }}" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                                                    {{ in_array($month->id, $farm->farm_extended->page4_occurenceofsalinity_ds_months) ? 'checked' : ''}}
                                                                                    disabled>
                                                                                    <label for="checkbox_month_{{ $month->Picklistitem }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $month->Picklistitem }}</label>
                                                                                </div>
                                                                            @endif
                                                                            @endforeach --}}

                                                                        @endif
                                                                    @endif
                                                                </div>
                                                            </div>
        
                                                            <div class="grid grid-cols-2">
                                                                <div class="px-4 py-2 font-semibold">Remarks <small>(dry season)</small></div>
                                                                <div class="px-4 py-2">{{ utf8_decode($farm->farm_extended->page4_occurenceofsalinity_ds_remarks) }}</div>
                                                            </div>
        
                                                            <div class="grid grid-cols-2">
                                                                <div class="px-4 py-2 font-semibold">What month/s during wet season?</div>
                                                                <div class="px-4 py-2">
        
                                                                    @if (isset($farm->farm_extended->page4_occurenceofsalinity_ws_months) && !empty($farm->farm_extended->page4_occurenceofsalinity_ws_months))
                                                                        @if (isset($optionsMonth) && !empty($optionsMonth))
                                                                            @foreach ($optionsMonth as $month)
                                                                                <div class="flex items-center mb-4">
                                                                                    <input id="checkbox_month_opt_{{ $month->position }}" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                                                    {{ in_array($month->id, $farm->farm_extended->page4_occurenceofsalinity_ws_months) ? 'checked' : ''}}
                                                                                    disabled>
                                                                                    <label for="checkbox_month_{{ $month->Picklistitem }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $month->Picklistitem }}</label>
                                                                                </div>
                                                                            @endforeach
                                                                        @endif
                                                                    @endif
                                                                </div>
                                                            </div>
        
                                                            <div class="grid grid-cols-2">
                                                                <div class="px-4 py-2 font-semibold">Remarks <small>(wet season)</small></div>
                                                                <div class="px-4 py-2">{{ utf8_decode($farm->farm_extended->page4_occurenceofsalinity_ws_remarks) }}</div>
                                                            </div>
        
                                                        </div>
        
                                                    </div>
        
                                                    <div class="text-gray-700">
                                                        <p class="px-4 py-2 font-bold text-sm">Source of Irrigation</p> 
                                                        
                                                        <div class="grid md:grid-cols-2 text-sm">
        
                                                            <table class="border-collapse border border-slate-400 w-full text-sm text-left text-gray-500 dark:text-gray-400 ml-4">
                                                                <thead>
                                                                    <th class="w-3/4 border border-slate-300 px-4 py-2">
                                                                        Source of Irrigation
                                                                    </th>
                                                                    <th class="border border-slate-300 px-4 py-2">
                                                                        Is the water from this source Salt Free?
                                                                    </th>
                                                                </thead>
                                                                <tbody>
                                                                    @if (isset($farm->farm_extended->page4_checkbox_sourceOfIrrigation) && !empty($farm->farm_extended->page4_checkbox_sourceOfIrrigation))
                                                                        @if (isset($optionsSourceOfIrrigation) && !empty($optionsSourceOfIrrigation))
                                                                            @foreach ($optionsSourceOfIrrigation as $sourceOfIrrigation)
                                                                                <tr>
                                                                                    <td class="border border-slate-300 px-4 py-2">  
                                                                                        <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                                                        {{ empty($farm->farm_extended->page4_checkbox_sourceOfIrrigation) ? '' : (in_array($sourceOfIrrigation->id, $farm->farm_extended->page4_checkbox_sourceOfIrrigation) ? 'checked' : '')}}
                                                                                        disabled>
                                                                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $sourceOfIrrigation->Picklistitem }}</label>
                                                                                    </td>
                                                                                    <td class="border border-slate-300 px-4 py-2">
                                                                                        @if ($sourceOfIrrigation->id !== 51 && !empty($farm->farm_extended->page4_sourceOfIrrigation_saltfree[$sourceOfIrrigation->id]))
                                                                                            @if (!empty($farm->farm_extended->page4_sourceOfIrrigation_saltfree) && $farm->farm_extended->page4_sourceOfIrrigation_saltfree[$sourceOfIrrigation->id] == 1)
                                                                                                <div class="inline-flex items-center">
                                                                                                    <span class="w-2 h-2 inline-block bg-green-500 rounded-full mr-2"></span>
                                                                                                </div>
                                                                                                <div class="inline-flex items-center">
                                                                                                    <span class="text-gray-600 dark:text-gray-400">Yes</span>
                                                                                                </div>
                                                                                            @elseif(!empty($farm->farm_extended->page4_sourceOfIrrigation_saltfree) && $farm->farm_extended->page4_sourceOfIrrigation_saltfree[$sourceOfIrrigation->id] == 2)
                                                                                                <div class="inline-flex items-center">
                                                                                                    <span class="w-2 h-2 inline-block bg-red-500 rounded-full mr-2"></span>
                                                                                                </div>
                                                                                                <div class="inline-flex items-center">
                                                                                                    <span class="text-gray-600 dark:text-gray-400">No</span>
                                                                                                </div>
                                                                                            @else
                                                                                                <div class="inline-flex items-center">
                                                                                                    <span class="w-2 h-2 inline-block bg-neutral-500 rounded-full mr-2"></span>
                                                                                                </div>
                                                                                                <div class="inline-flex items-center">
                                                                                                    <span class="text-gray-600 dark:text-gray-400">Not Applicable</span>
                                                                                                </div>
                                                                                            @endif
                                                                                        @else
                                                                                            <div class="inline-flex items-center">
                                                                                                <span class="w-2 h-2 inline-block bg-neutral-500 rounded-full mr-2"></span>
                                                                                            </div>
                                                                                            <div class="inline-flex items-center">
                                                                                                <span class="text-gray-600 dark:text-gray-400">Not Applicable</span>
                                                                                            </div>
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endif
                                                                    @endif

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
        
                                                    <div class="text-gray-700">
                                                        <div class="grid md:grid-cols-2 text-sm">
        
                                                            <div class="grid grid-cols-2">
                                                                <div class="px-4 py-2 font-semibold">Indicator of Salinity</div>
                                                                <div class="px-4 py-2">
                                                                    
                                                                    @if (isset($optionsIndicatorOfSalinity) && !empty($optionsIndicatorOfSalinity))
                                                                        @foreach ($optionsIndicatorOfSalinity as $indicatorOfSalinity)
                                                                            <div class="flex items-center mb-4">
                                                                                <input id="checkbox_indicatorOfSalinity_opt_{{ $indicatorOfSalinity->position }}" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                                                {{ empty($farm->farm_extended->page4_indicatorofsalinity) ? '' : (in_array($indicatorOfSalinity->id, $farm->farm_extended->page4_indicatorofsalinity) ? 'checked' : '')}}
                                                                                disabled>

                                                                                <label for="checkbox_indicatorOfSalinity_{{ $indicatorOfSalinity->Picklistitem }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $indicatorOfSalinity->Picklistitem }} {{ $indicatorOfSalinity->position == 6 ? (empty($farm->farm_extended->page4_indicatorofsalinity_specify) ? '' : ' - '.$farm->farm_extended->page4_indicatorofsalinity_specify) : '' }}</label>
                                                                            </div>
                                                                        @endforeach
                                                                    @endif
        
                                                                </div>
                                                            </div>
        
                                                        </div>
                                                    </div>
                                                    
                                                    <hr class="my-4">
                                                    
                                                </div>
                                            </section>
    
                                            {{-- E. Drought --}}
                                            <section id="farm-page5-information" style="display: {{ empty($farm->stressEcosystem) ? 'none' : (in_array(2, $farm->stressEcosystem) ? 'block' : 'none')}}">
                                                <div class="p-6 space-y-6">
                                                    <div class="text-gray-700">
                                                        <p class="px-4 py-2 font-bold">E. Drought Ecosystem</p> 
                                                        <div class="grid md:grid-cols-2 text-sm">
        
                                                            <div class="grid grid-cols-2">
                                                                <div class="px-4 py-2 font-semibold">How frequent does drought occurs for the past 5 years</div>
                                                                <div class="px-4 py-2">
                                                                    
                                                                    @if (isset($optionsFrequency) && !empty($optionsFrequency))
                                                                        @foreach ($optionsFrequency as $frequency)
                                                                            <div class="flex items-center mb-4">
                                                                                <input id="checkbox_frequency_opt_{{ $frequency->position }}" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                                                {{ empty($farm->farm_extended->page5_frequency) ? '' : (in_array($frequency->id, $farm->farm_extended->page5_frequency) ? 'checked' : '')}}
                                                                                disabled>
                                                                                <label for="checkbox_frequency_{{ $frequency->Picklistitem }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $frequency->Picklistitem }}</label>
                                                                            </div>
                                                                        @endforeach
                                                                    @endif
        
                                                                </div>
                                                            </div>
        
                                                        </div>
                                                    </div>
        
                                                    <div class="text-gray-700">
                                                        <p class="px-4 py-2 font-bold text-sm">Occurence of Drought</p> 
        
                                                        <div class="grid md:grid-cols-2 text-sm">
        
                                                            <div class="grid grid-cols-2">
                                                                <div class="px-4 py-2 font-semibold">What month/s during dry season?</div>
                                                                <div class="px-4 py-2">
        
                                                                    @if (isset($farm->farm_extended->page5_occurenceofdrought_ds_months) && !empty($farm->farm_extended->page5_occurenceofdrought_ds_months))
                                                                        @if (isset($optionsMonth) && !empty($optionsMonth))

                                                                            @foreach ($optionsMonth as $month)
                                                                                <div class="flex items-center mb-4">
                                                                                    <input id="checkbox_month_opt_{{ $month->position }}" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                                                    {{ in_array($month->id, $farm->farm_extended->page5_occurenceofdrought_ds_months) ? 'checked' : ''}}
                                                                                    disabled>
                                                                                    <label for="checkbox_month_{{ $month->Picklistitem }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $month->Picklistitem }}</label>
                                                                                </div>
                                                                            @endforeach

                                                                            {{-- @foreach ($optionsMonth as $month)
                                                                                @if (in_array($month->position, [9, 10, 11, 12]))
                                                                                    <div class="flex items-center mb-4">
                                                                                        <input id="checkbox_month_opt_{{ $month->position }}" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                                                        {{ in_array($month->id, $farm->farm_extended->page5_occurenceofdrought_ds_months) ? 'checked' : ''}}
                                                                                        disabled>
                                                                                        <label for="checkbox_month_{{ $month->Picklistitem }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $month->Picklistitem }}</label>
                                                                                    </div>
                                                                                @endif
                                                                            @endforeach --}}

                                                                            {{-- @foreach ($optionsMonth as $month)
                                                                                @if (in_array($month->position, [1, 2, 3]))
                                                                                    <div class="flex items-center mb-4">
                                                                                        <input id="checkbox_month_opt_{{ $month->position }}" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                                                        {{ in_array($month->id, $farm->farm_extended->page5_occurenceofdrought_ds_months) ? 'checked' : ''}}
                                                                                        disabled>
                                                                                        <label for="checkbox_month_{{ $month->Picklistitem }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $month->Picklistitem }}</label>
                                                                                    </div>
                                                                                @endif
                                                                            @endforeach --}}
                                                                        @endif
                                                                    @endif
                                                                </div>
                                                            </div>
        
                                                            <div class="grid grid-cols-2">
                                                                <div class="px-4 py-2 font-semibold">Remarks <small>(dry season)</small></div>
                                                                <div class="px-4 py-2">{{ utf8_decode($farm->farm_extended->page5_occurenceofdrought_ds_remarks) }}</div>
                                                            </div>
        
                                                            <div class="grid grid-cols-2">
                                                                <div class="px-4 py-2 font-semibold">What month/s during wet season?</div>
                                                                <div class="px-4 py-2">
        
                                                                    @if (isset($farm->farm_extended->page5_occurenceofdrought_ws_months) && !empty($farm->farm_extended->page5_occurenceofdrought_ws_months))
                                                                        @if (isset($optionsMonth) && !empty($optionsMonth))
                                                                            @foreach ($optionsMonth as $month)
                                                                                <div class="flex items-center mb-4">
                                                                                    <input id="checkbox_month_opt_{{ $month->position }}" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                                                    {{ in_array($month->id, $farm->farm_extended->page5_occurenceofdrought_ws_months) ? 'checked' : ''}}
                                                                                    disabled>
                                                                                    <label for="checkbox_month_{{ $month->Picklistitem }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $month->Picklistitem }}</label>
                                                                                </div>
                                                                            @endforeach
                                                                        @endif
                                                                    @endif
                                                                </div>
                                                            </div>
        
                                                            <div class="grid grid-cols-2">
                                                                <div class="px-4 py-2 font-semibold">Remarks <small>(wet season)</small></div>
                                                                <div class="px-4 py-2">{{ utf8_decode($farm->farm_extended->page5_occurenceofdrought_ws_remarks) }}</div>
                                                            </div>
        
                                                        </div>
        
                                                    </div>
        
                                                    <div class="text-gray-700">
                                                        <p class="px-4 py-2 font-bold text-sm">Source of Irrigation</p> 
                                                        
                                                        <div class="grid md:grid-cols-2 text-sm">
        
                                                            <table class="border-collapse border border-slate-400 w-full text-sm text-left text-gray-500 dark:text-gray-400 ml-4">
                                                                <thead>
                                                                    <th class="w-3/4 border border-slate-300 px-4 py-2">
                                                                        Source of Irrigation
                                                                    </th>
                                                                    <th class="border border-slate-300 px-4 py-2">
                                                                        Is the water from this source Salt Free?
                                                                    </th>
                                                                </thead>
                                                                <tbody>
                                                                    @if (isset($farm->farm_extended->page5_checkbox_sourceOfIrrigation) && !empty($farm->farm_extended->page5_checkbox_sourceOfIrrigation))
                                                                        @if (isset($optionsSourceOfIrrigation) && !empty($optionsSourceOfIrrigation))
                                                                        @foreach ($optionsSourceOfIrrigation as $sourceOfIrrigation)
                                                                            <tr>
                                                                                <td class="border border-slate-300 px-4 py-2">  
                                                                                    <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                                                    {{ empty($farm->farm_extended->page5_checkbox_sourceOfIrrigation) ? '' : (in_array($sourceOfIrrigation->id, $farm->farm_extended->page5_checkbox_sourceOfIrrigation) ? 'checked' : '')}}
                                                                                    disabled>
                                                                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $sourceOfIrrigation->Picklistitem }}</label>
                                                                                </td>
                                                                                <td class="border border-slate-300 px-4 py-2">
                                                                                    @if ($sourceOfIrrigation->id !== 51 && !empty($farm->farm_extended->page5_sourceOfIrrigation_saltfree[$sourceOfIrrigation->id]))
                                                                                        @if (!empty($farm->farm_extended->page5_sourceOfIrrigation_saltfree) && $farm->farm_extended->page5_sourceOfIrrigation_saltfree[$sourceOfIrrigation->id] == 1)
                                                                                            <div class="inline-flex items-center">
                                                                                                <span class="w-2 h-2 inline-block bg-green-500 rounded-full mr-2"></span>
                                                                                            </div>
                                                                                            <div class="inline-flex items-center">
                                                                                                <span class="text-gray-600 dark:text-gray-400">Yes</span>
                                                                                            </div>
                                                                                        @elseif(!empty($farm->farm_extended->page5_sourceOfIrrigation_saltfree) && $farm->farm_extended->page5_sourceOfIrrigation_saltfree[$sourceOfIrrigation->id] == 2)
                                                                                            <div class="inline-flex items-center">
                                                                                                <span class="w-2 h-2 inline-block bg-red-500 rounded-full mr-2"></span>
                                                                                            </div>
                                                                                            <div class="inline-flex items-center">
                                                                                                <span class="text-gray-600 dark:text-gray-400">No</span>
                                                                                            </div>
                                                                                        @else
                                                                                            <div class="inline-flex items-center">
                                                                                                <span class="w-2 h-2 inline-block bg-neutral-500 rounded-full mr-2"></span>
                                                                                            </div>
                                                                                            <div class="inline-flex items-center">
                                                                                                <span class="text-gray-600 dark:text-gray-400">Not Applicable</span>
                                                                                            </div>
                                                                                        @endif
                                                                                    @else
                                                                                        <div class="inline-flex items-center">
                                                                                            <span class="w-2 h-2 inline-block bg-neutral-500 rounded-full mr-2"></span>
                                                                                        </div>
                                                                                        <div class="inline-flex items-center">
                                                                                            <span class="text-gray-600 dark:text-gray-400">Not Applicable</span>
                                                                                        </div> 
                                                                                    @endif
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                        @endif
                                                                    @endif
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
        
                                                    <div class="text-gray-700">
                                                        <div class="grid md:grid-cols-2 text-sm">
        
                                                            <div class="grid grid-cols-2">
                                                                <div class="px-4 py-2 font-semibold">Indicator of Salinity</div>
                                                                <div class="px-4 py-2">
                                                                    
                                                                    @if (isset($optionsIndicatorOfDrought) && !empty($optionsIndicatorOfDrought))
                                                                        @foreach ($optionsIndicatorOfDrought as $indicatorOfDrought)
                                                                            <div class="flex items-center mb-4">
                                                                                <input id="checkbox_indicatorOfDrought_opt_{{ $indicatorOfDrought->position }}" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                                                {{ empty($farm->farm_extended->page5_indicatorofdrought) ? '' : (in_array($indicatorOfDrought->id, $farm->farm_extended->page5_indicatorofdrought) ? 'checked' : '')}}
                                                                                disabled>
                                                                                <label for="checkbox_indicatorOfDrought_{{ $indicatorOfDrought->Picklistitem }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $indicatorOfDrought->Picklistitem }} {{ $indicatorOfDrought->position == 7 ? (empty($farm->farm_extended->page5_indicatorofdrought_specify) ? '' : ' - '.$farm->farm_extended->page5_indicatorofdrought_specify) : '' }}</label>
                                                                            </div>
                                                                        @endforeach
                                                                    @endif
        
                                                                </div>
                                                            </div>
        
                                                        </div>
                                                    </div>
                                                    
                                                    <hr class="my-4">
                                                    
                                                </div>
                                            </section>
    
                                            <!-- Modal footer -->
                                            <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                                                {{-- <button data-modal-toggle="modal_farm-{{$farm->id}}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button> --}}
                                                <button onclick="openModal({{$farm->id}})" data-modal-toggle="modal_farm-{{$farm->id}}" type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Close</button>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
    
                            @endforeach
                        @else
                            <hr class="my-4">
                        @endif
                    </div>
                </section>

                <!-- End of about section -->
        
                <div class="my-4"></div>

                {{-- <div class="block space-y-4 md:flex md:space-y-0 md:space-x-4">
                    <button onclick="openDefaultModal(event)" class="block w-full md:w-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="modal_farm-{{$farm->id}}">
                    Extra large modal
                    </button>
                </div> --}}

            </div>
        </div>
    </div>

    <script>
        function openModal(farm_id)
        {
            document.querySelector('#modal_farm-'+farm_id).classList.toggle('hidden');
            document.querySelector('#modal_farm-'+farm_id+'-start').scrollIntoView();
        }
    </script>

    @section('scripts')

    <script src="{{ asset('js/jquery-3.6.1.js') }}"></script>
    
    @endsection

</x-app-layout>


    