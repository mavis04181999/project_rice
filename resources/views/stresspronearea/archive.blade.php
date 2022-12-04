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
                                <th colspan="6"></th>
                                <th colspan="3">Stress Ecosystem</th>
                                <th colspan="1"></th>
                            </tr>
                            <tr>
                                <th class="text-sm">Province</th>
                                <th class="text-sm">City</th>
                                <th class="text-sm">Municipality</th>
                                <th class="text-sm">Barangay</th>
                                <th class="text-sm">Total Farmers</th>
                                <th class="text-sm">Total Stress Area</th>
                                <th class="text-sm">Flood</th>
                                <th class="text-sm">Salinity</th>
                                <th class="text-sm">Drought</th>
                                <th class="text-sm">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($stressProneAreaDetails)
                                @if ($stressProneAreaDetails->count() > 0)
                                    @foreach ($stressProneAreaDetails as $stresspronearea)
                                    <tr>
                                        <td class="text-xs">{{ $stresspronearea->province }}</td>
                                        <td class="text-xs">{{ $stresspronearea->city }}</td>
                                        <td class="text-xs">{{ $stresspronearea->municipality }}</td>
                                        <td class="text-xs">{{ $stresspronearea->barangay }}</td>
                                        <td class="text-xs">{{ $stresspronearea->totalFarmers }}</td>
                                        <td class="text-xs">{{ $stresspronearea->totalStressArea }}</td>
                                        <td class="text-xs">
                                            <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                            {{ empty($stresspronearea->stressEcosystem) ? '' : (in_array(0, $stresspronearea->stressEcosystem) ? 'checked' : '')}}
                                             disabled>    
                                        </td>
                                        <td class="text-xs">
                                            <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" 
                                            {{ empty($stresspronearea->stressEcosystem) ? '' : (in_array(1, $stresspronearea->stressEcosystem) ? 'checked' : '')}}
                                            disabled>
                                        </td>
                                        <td class="text-xs">
                                            <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" 
                                            {{ empty($stresspronearea->stressEcosystem) ? '' : (in_array(2, $stresspronearea->stressEcosystem) ? 'checked' : '')}}
                                            disabled>
                                        </td>
                                        <td class="text-xs">
                                            <!-- Using utilities: -->
                                            <div class="flex">
                                                <a href="{{ route('stresspronearea.restore', $stresspronearea->id) }}" class="btn btn-sm btn-warning mr-2">Restore</a>
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
