@extends('layouts.app')
@section('pageTitle', 'Resources :: EzBook')

@section('content')

    <!--begin::Main-->
    <x-layouts.page-list>
        <x-slot:heading>Resources</x-slot:heading>
        <x-slot:goto>
            <x-forms.button href="{{ url('/resource-location') }}" class="ml-3" value="Resource Location" />
            <x-forms.button href="{{ url('/resource-type') }}" class="ml-3" value="Resource Type" />
            <x-forms.button class="btn-success ml-3" value="Resources" />
        </x-slot:goto>
        <x-slot:action>
            <x-forms.button href="{{ url('/add-resource') }}" class="ml-3" value="Add New" />
            <x-forms.button class="btn-success ml-3" value="Export to Excel" />
        </x-slot:action>


        <!--begin::Table-->
        <div class="table-responsive">
            @php
                $headers = ['sn' => 'S.No.', 'Name' => 'Resource', 'resourceType' => 'Type', 'resourceLocation' => 'Location','ID' => 'Action'];
                // $listResources = Arr::only($listResources, ['Name', 'EmailAddress'])
                $actions = [];
                // $actions = [ 'Delete' => 'resource.destroy',];
                $actions = [ 'Edit' => 'resource.edit', 'Delete' => 'resource.destroy',];
            @endphp
            {{-- @dd($listResources) --}}
            <x-layouts.table id="kt_datatable" :headers="$headers" :data="$listResources" :actions="$actions" route="resource" />

        </div>
        <!--end::Table-->

    </x-layouts.page-list>
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
