<x-app-layout>

    <div class="flex min-h-screen bg-gray-50">
		<div class="my-4 max-w-7xl mx-auto sm:px-6 lg:px-8">

            @include('components.messages')
            
            <x-auth-validation-errors class="mb-4" :errors="$errors"/>

            <div class="grid gap-7 sm:grid-cols-2 lg:grid-cols-4">
                <div class="p-5 bg-white rounded shadow-sm">
                    <div class="text-base text-gray-400 ">Total Farmers</div>
                    <div class="flex items-center pt-1">
                        <div class="text-2xl font-bold text-gray-900 ">{{ $totalFarmers }}</div>
                        <span class="flex items-center px-2 py-0.5 mx-2 text-sm text-green-600 bg-white rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                            </svg>                              
                        </span>
                    </div>
                </div>

                <div class="p-5 bg-white rounded shadow-sm">
                    <div class="text-base text-gray-400 ">Total Stress Area</div>
                    <div class="flex items-center pt-1">
                        <div class="text-2xl font-bold text-gray-900 ">{{ $totalStressArea }} <small>Ha.</small></div>
                        <span class="flex items-center px-2 py-0.5 mx-2 text-sm text-red-600 bg-white rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.429 9.75L2.25 12l4.179 2.25m0-4.5l5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0l4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0l-5.571 3-5.571-3" />
                            </svg>    
                        </span>
                    </div>
                </div>
                
            </div>

            <hr class="my-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-striped w-full" style="width: 100%" id="dashboard">
                        <thead>
                            <tr>
                                <th class="text-sm">Province</th>
								<th class="text-sm">Code</th>
                                <th class="text-sm">Total Farmers</th>
								<th class="text-sm">Total Stress Area</th>
                                <th class="text-sm">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($stressProneAreaDetails)
                                @if ($stressProneAreaDetails->count() > 0)
                                    @foreach ($stressProneAreaDetails as $data)
                                    <tr>
                                        <td class="text-xs">{{ empty($data->province) ? ' - ' : $data->province }}</td>
                                        <td class="text-xs">{{ empty($data->code) ? ' - ' : $data->code }}</td>
                                        <td class="text-xs">{{ empty($data->totalFarmers) ? ' - ' : $data->totalFarmers }}</td>
										<td class="text-xs">{{ empty($data->totalStressArea) ? ' - ' : $data->totalStressArea }}</td>
                                        <td class="text-xs">
                                            <div class="flex">
                                                <a href="{{ route('stresspronearea.province', ['province' => $data->province_id]) }}" class="btn btn-sm btn-secondary mr-2">View</a>
                                                {{-- <a href="{{ route('stresspronearea.edit', ['stressProneArea' => $data->id]) }}" class="btn btn-sm btn-secondary mr-2">Edit</a>
                                                
                                                <form id="form-delete-stresspronearea" action="{{ route('stresspronearea.destroy', $data->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                                </form> --}}
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
