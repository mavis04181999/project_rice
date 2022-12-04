<x-app-layout>

    <div class="flex min-h-screen bg-gray-50">
		<div class="my-4 max-w-7xl mx-auto sm:px-6 lg:px-8">

            @include('components.messages')
            
            <x-auth-validation-errors class="mb-4" :errors="$errors"/>

            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">City Stress Data</h3>
                <p class="mt-1 text-sm text-gray-600">Something here.</p>
            </div>

            <hr class="mb-4">

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
                                <th class="text-sm">City</th>
                                <th class="text-sm">City Code</th>
                                <th class="text-sm">Barangay</th>
                                <th class="text-sm">Barangay Code</th>
                                <th class="text-sm">Total Farmers</th>
                                <th class="text-sm">Total Stress Area</th>
                                <th class="text-sm">Flood</th>
                                <th class="text-sm">Saline</th>
                                <th class="text-sm">Drought</th>
                                <th class="text-sm">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($citiesSPADetails)
                                @if ($citiesSPADetails->count() > 0)
                                    @foreach ($citiesSPADetails as $data)
                                    <tr>
                                        <td class="text-xs">{{ $data->city }}</td>
                                        <td class="text-xs">{{ $data->citycode }}</td>
                                        <td class="text-xs">{{ $data->barangay }}</td>
                                        <td class="text-xs">{{ $data->barangaycode }}</td>
                                        <td class="text-xs">{{ $data->totalFarmers }} ...</td>
                                        <td class="text-xs">{{ $data->totalStressArea }}</td>
                                        <td class="text-xs">
                                            <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                            {{ empty($data->stressEcosystem) ? '' : (in_array(0, $data->stressEcosystem) ? 'checked' : '')}}
                                             disabled>    
                                        </td>
                                        <td class="text-xs">
                                            <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" 
                                            {{ empty($data->stressEcosystem) ? '' : (in_array(1, $data->stressEcosystem) ? 'checked' : '')}}
                                            disabled>
                                        </td>
                                        <td class="text-xs">
                                            <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" 
                                            {{ empty($data->stressEcosystem) ? '' : (in_array(2, $data->stressEcosystem) ? 'checked' : '')}}
                                            disabled>
                                        </td>
                                        <td class="text-xs">
                                            <!-- Using utilities: -->
                                            <div class="flex">
                                                <a href="{{ route('stresspronearea.edit', ['stressProneArea' => $data->id]) }}" class="btn btn-sm btn-secondary mr-2">Edit</a>
                                                <form id="form-delete-stresspronearea" action="{{ route('stresspronearea.destroy', $data->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-sm btn-danger" onclick="event.preventDefault(); this.closest('form').submit();" type="submit">Delete</button>
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

            <div class="hidden sm:block" aria-hidden="true">
                <div class="py-5">
                    <div class="border-t border-gray-200"></div>
                </div>
            </div>

            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Municipality Stress Data</h3>
                <p class="mt-1 text-sm text-gray-600">Something here.</p>
            </div>

            <hr class="mb-4">

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
                                <th class="text-sm">Municipality</th>
                                <th class="text-sm">Municipality Code</th>
                                <th class="text-sm">Barangay</th>
                                <th class="text-sm">Barangay Code</th>
                                <th class="text-sm">Total Farmers</th>
                                <th class="text-sm">Total Stress Area</th>
                                <th class="text-sm">Flood</th>
                                <th class="text-sm">Saline</th>
                                <th class="text-sm">Drought</th>
                                <th class="text-sm">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($municipalitiesSPADetails)
                                @if ($municipalitiesSPADetails->count() > 0)
                                    @foreach ($municipalitiesSPADetails as $data)
                                    <tr>
                                        <td class="text-xs">{{ $data->municipality }}</td>
                                        <td class="text-xs">{{ $data->municipalitycode }}</td>
                                        <td class="text-xs">{{ $data->barangay }}</td>
                                        <td class="text-xs">{{ $data->barangaycode }}</td>
                                        <td class="text-xs">{{ $data->totalFarmers }} ...</td>
                                        <td class="text-xs">{{ $data->totalStressArea }}</td>
                                        <td class="text-xs">
                                            <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                            {{ empty($data->stressEcosystem) ? '' : (in_array(0, $data->stressEcosystem) ? 'checked' : '')}}
                                             disabled>    
                                        </td>
                                        <td class="text-xs">
                                            <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" 
                                            {{ empty($data->stressEcosystem) ? '' : (in_array(1, $data->stressEcosystem) ? 'checked' : '')}}
                                            disabled>
                                        </td>
                                        <td class="text-xs">
                                            <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" 
                                            {{ empty($data->stressEcosystem) ? '' : (in_array(2, $data->stressEcosystem) ? 'checked' : '')}}
                                            disabled>
                                        </td>
                                        <td class="text-xs">
                                            <!-- Using utilities: -->
                                            <div class="flex">
                                                <a href="{{ route('stresspronearea.edit', ['stressProneArea' => $data->id]) }}" class="btn btn-sm btn-secondary mr-2">Edit</a>

                                                <form id="form-delete-stresspronearea" action="{{ route('stresspronearea.destroy', $data->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-sm btn-danger" onclick="event.preventDefault(); this.closest('form').submit();" type="submit">Delete</button>
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
