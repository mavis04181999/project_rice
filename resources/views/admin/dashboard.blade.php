<x-app-layout>

    <div class="flex min-h-screen bg-gray-50">
		<div class="my-4 max-w-7xl mx-auto sm:px-6 lg:px-8">

            @include('components.messages')

            <div class="grid gap-7 sm:grid-cols-2 lg:grid-cols-4">
                <div class="p-5 bg-white rounded shadow-sm">
                    <div class="text-base text-gray-400 ">Total Admin(s)</div>
                    <div class="flex items-center pt-1">
                        <div class="text-2xl font-bold text-gray-900 ">{{ $adminsCount }}</div>
                        <span class="flex items-center px-2 py-0.5 mx-2 text-sm text-green-600 bg-white rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                            </svg>                              
                        </span>
                    </div>
                </div>
                <div class="p-5 bg-white rounded shadow-sm">
                    <div class="text-base text-gray-400 ">Total Enumerator(s)</div>
                    <div class="flex items-center pt-1">
                        <div class="text-2xl font-bold text-gray-900 ">{{ $enumeratorsCount }}</div>
                        <span class="flex items-center px-2 py-0.5 mx-2 text-sm text-green-600 bg-white rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.429 9.75L2.25 12l4.179 2.25m0-4.5l5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0l4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0l-5.571 3-5.571-3" />
                            </svg>                              
                        </span>
                    </div>
                </div>

                {{-- <div class="p-5 bg-white rounded shadow-sm">
                    <div class="text-base text-gray-400 ">Total Stress Area</div>
                    <div class="flex items-center pt-1">
                        <div class="text-2xl font-bold text-gray-900 ">{{ $totalStressArea }} <small>Ha.</small></div>
                        <span class="flex items-center px-2 py-0.5 mx-2 text-sm text-red-600 bg-white rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.429 9.75L2.25 12l4.179 2.25m0-4.5l5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0l4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0l-5.571 3-5.571-3" />
                            </svg>    
                        </span>
                    </div>
                </div> --}}
                
            </div>

            {{-- <div class="my-8"></div> --}}

            <hr class="my-8">

            <x-auth-validation-errors class="mb-4" :errors="$errors"/>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-striped w-full" style="width: 100%" id="dashboard">
                        <thead>
                            <tr>
                                <th class="text-sm"></th>
                                <th class="text-sm">First Name</th>
                                <th class="text-sm">Last Name</th>
                                <th class="text-sm">Date of Birth</th>
                                <th class="text-sm">Age</th>
                                <th class="text-sm">Contact Number</th>
                                <th class="text-sm">Role</th>
                                <th class="text-sm">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($users)
                                @if ($users->count() > 0)
                                    @foreach ($users as $user)
                                    <tr>
                                        <td class="text-xs"><input onchange="selectFarmer(event)" type="checkbox" name="selectedFarmers[]" id="checkbox-export-user" class="checkbox-farmers" value="{{ $user->id }}"></td>
                                        <td class="text-xs">{{ empty($user->firstName) ? ' - ' : $user->firstName }}</td>
                                        <td class="text-xs">{{ empty($user->lastName) ? ' - ' : $user->lastName }}</td>
                                        <td class="text-xs">{{ empty($user->dateOfBirth) ? ' - ' : $user->dateOfBirth }}</td>
                                        <td class="text-xs">{{ empty($user->age) ? ' - ' : $user->age }}</td>
                                        <td class="text-xs">{{ empty($user->phoneNumber) ? ' - ' : $user->phoneNumber }}</td>
                                        <td class="text-xs">{{ empty($user->role) ? ' - ' : ucwords($user->role) }}</td>
                                        <td class="text-xs">
                                            <div class="flex">
                                                <a href="{{ route('user.edit', ['user' => $user->id]) }}" class="btn btn-sm btn-secondary mr-2">Edit</a>
                                                
                                                <form id="form-delete-user" action="{{ route('user.destroy', $user->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>   
                                    @endforeach 
                                @endif
                            @endisset
                        </tbody>
                    </table>
                </div> 
            </div>

            <section>
                <div class="flex justify-end flex-row py-4">
                    {{-- <div>
                        <button onclick="selectFarmers(event)" class="inline-flex py-2 px-4 bg-gray-200 text-gray-700 font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-300 hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out items-center mr-2">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>Check All</span>
                        </button>
                    </div>
                    <div>
                        <form action="{{ route('xlsx.export-selected-farmers') }}" method="post" id="form-selectedFarmers">
                            @csrf
                            <input type="hidden" name="selected-farmers" id="hidden-input-selectedFarmers">
                            <button type="submit" class="inline-flex py-2 px-4 bg-gray-200 text-gray-700 font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-300 hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out items-center mr-2">
                                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                                <span>Export Selected Farmer(s)</span>
                            </button>
                        </form>
                    </div> --}}
                    <div>
                        <form action="{{ route('user.create') }}" method="GET">
                            <button type="submit" class="inline-flex py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 
                            dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 items-center mr-2">
                                <svg class="fill-current w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                                <span>Create User</span>
                            </button>
                        </form>
                    </div>
                </div>
            </section>
            
        </div>
    </div>

    @section('scripts')
        <link rel="stylesheet" href="{{ asset('css/bootstrap-5.2.0.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">

        <script src="{{ asset('js/datatables.min.js') }}" defer></script>
        <script src="{{ asset('js/jquery-3.6.1.js') }}"></script>
        
    @endsection

    <script>
        var farmersSelected = [];

        function isFarmerExist(element){
            
            if (element.checked === true) {
                
                farmersSelected.push(element.value)
                
            } else {
                let index = farmersSelected.indexOf(element.value)

                if (index != -1) {

                    farmersSelected.splice(index, 1)
                }
            }
        }

        function selectFarmer(event)
        {
            
            isFarmerExist(event.target);

            document.querySelector('#hidden-input-selectedFarmers').value = farmersSelected;
        }

        function selectFarmers(event)
        {
            var count = 0;

            var selectedFarmers = [];

            var farmers = document.querySelectorAll('#dashboard .checkbox-farmers')


            farmers.forEach((element, index) => {

                if (element.checked === true) {
                    count++;
                }

            });


            if (count == 0) {

                farmers.forEach((element) => {

                    element.checked = true;

                    isFarmerExist(element);
                    
                })

            }
            else {
                farmers.forEach((element) => {
                    element.checked = false;

                    isFarmerExist(element);
                })
            }

            document.querySelector('#hidden-input-selectedFarmers').value = farmersSelected;

        }
    </script>
    
    <script>
        // $(document).ready(function () {
        //     $('#dashboard').DataTable();
        // });

        // var dashboard = new DataTable('#dashboard')

        // var dashboard = new DataTable('#dashboard')

        // document.addEventListener("DOMContentLoaded", function() {
        //     var dashboard = new DataTable('#dashboard', {
        //         scrollX: 300,
        //     });
        // });

        $(document).ready( function () {
            $('#dashboard').DataTable({
                scrollX: true,
            });
        } );

    </script>


</x-app-layout>
