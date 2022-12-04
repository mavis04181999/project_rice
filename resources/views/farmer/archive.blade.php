<x-app-layout>

    <div class="flex min-h-screen bg-gray-50">
		<div class="my-4 max-w-7xl mx-auto sm:px-6 lg:px-8">

            @include('components.messages')
            
            <x-auth-validation-errors class="mb-4" :errors="$errors"/>

            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Farmer Archive</h3>
                <p class="mt-1 text-sm text-gray-600">Allows you to restore farmer data or information when data is accidentally deleted.</p>
            </div>

            <hr class="my-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-striped w-full" style="width: 100%" id="dashboard">
                        <thead>
                            <tr>
                                <th class="text-sm">First Name</th>
                                <th class="text-sm">Last Name</th>
                                <th class="text-sm">Age</th>
                                <th class="text-sm">Date of Birth</th>
                                <th class="text-sm">Street Address</th>
                                <th class="text-sm">Barangay</th>
                                <th class="text-sm">City</th>
                                <th class="text-sm">Municipality</th>
                                <th class="text-sm">RSBSA Registered</th>
                                <th class="text-sm">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($farmers)
                                @if ($farmers->count() > 0)
                                    @foreach ($farmers as $farmer)
                                    <tr>
                                        <td class="text-xs">{{ $farmer->firstName }}</td>
                                        <td class="text-xs">{{ $farmer->lastName }}</td>
                                        <td class="text-xs">{{ $farmer->age }}</td>
                                        <td class="text-xs">{{ $farmer->dateOfBirth }}</td>
                                        <td class="text-xs">{{ Str::substr($farmer->streetAddress, 0, 20) }} ...</td>
                                        <td class="text-xs">{{ $farmer->barangay }}</td>
                                        <td class="text-xs">{{ $farmer->city }}</td>
                                        <td class="text-xs">{{ $farmer->municipality }}</td>
                                        <td class="text-xs">{{ ($farmer->rsbsaReg === 1) ? 'Registered': 'Not Registered' }}</td>
                                        <td class="text-xs">
                                            <!-- Using utilities: -->
                                            <div class="flex">
                                                <a href="{{ route('farmer.restore', $farmer->id) }}" class="btn btn-sm btn-warning mr-2">Restore</a>
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

        </div>  
    </div>

    @section('scripts')
        <link rel="stylesheet" href="{{ asset('css/bootstrap-5.2.0.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">

        <script src="{{ asset('js/datatables.min.js') }}" defer></script>
        <script src="{{ asset('js/jquery-3.6.1.js') }}"></script>
        
    @endsection
    
    <script>

        $(document).ready( function () {
            $('#dashboard').DataTable({
                scrollX: true,
            });
        } );




    </script>


</x-app-layout>
