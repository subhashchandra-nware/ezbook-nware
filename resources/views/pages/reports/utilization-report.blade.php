@extends('layouts.app')
@section('pageTitle', 'Utilization Reports :: EzBook')

@section('content')
@php
    extract($data);
@endphp
    <!--begin::Main-->
    <x-layouts.page>
        <div class="container">
            <div class="card card-custom gutter-b">
                <div class="border-0 card-header pt-8">
                    <h3><span>Utilization Reports</span>
                        <x-forms.form class="form-inline">
                            <x-forms.input value="{{ date('Y') . '-01-01' }}" design="2" type="date" name="from" label="From" />
                            <x-forms.input value="{{ date('Y-m-d') }}" design="2" type="date" name="to" label="To" />
                            <x-forms.button design="1" type="submit" name="build" value="Find"
                                class="ml-10 btn-primary" />
                        </x-forms.form>
                    </h3>
                </div>
                <div class="card-body">


                    <!--begin::Table-->
                    <div class="table-responsive">
                        @php
                            $headers = ['sn' => 'S.No.', 'Name' => 'Resource', 'resourceType' => 'Resource Type', 'Capacity' => 'Capacity(in Hours)', 'InUse' => 'In Use(in Hours)', 'NotInUse' => 'Not in Use(in Hours)', 'Utilization' => 'Utilization(%)'];
                            // $listResources = Arr::only($listResources, ['Name', 'EmailAddress'])
                            $actions = [];
                            // $actions = [ 'Delete' => 'resource.destroy',];
                            $actions = ['Edit' => 'resource.edit', 'Delete' => 'resource.destroy'];
                            $listResources = [];
                            $i = 1;
                        @endphp
                        {{-- @dd($listResources) --}}
                        <x-layouts.table id="kt_datatable" :headers="$headers" :actions="$actions" route="resource">
                            @foreach ($resources as $resource)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $resource->NAME  }}</td>
                                <td>{{ $resource->factype }}</td>
                                <td>{{ $resource->capacity }}</td>
                                <td>{{ $resource->inuse }}</td>
                                <td>{{ $resource->notinuse }}</td>
                                <td>{{ $resource->utilizationper }}</td>
                            </tr>
                            {{-- <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $resource->Name }}</td>
                                <td>{{ $resource->ResourceTypes->Name }}</td>
                                <td>{{ $data['capacity'][$resource->ID]??'0.0' }}</td>
                                <td>{{ $resource->Bookings }}</td>
                                <td>{{ $resource->operationhours }}</td>
                                <td>{{ $resource->Capacity }}</td>
                            </tr> --}}
                            @endforeach
                        </x-layouts.table>

                    </div>
                    <!--end::Table-->
                </div>
            </div>
        </div>
    </x-layouts.page>
    <!--end::Main-->

@endsection

@pushOnce('scripts')
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script>
        // Your custom JavaScript...
        $(document).ready(function() {
            let opt = {
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excel',
                    text: 'Export to Excel',
                }],
                lengthMenu: [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "All"] ],


        };
            var datatable = $('#kt_datatable').DataTable(opt);

            // END::DOCUMENT READY
        });
    </script>
@endPushOnce
