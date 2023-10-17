@extends('layouts.app')
@section('pageTitle', 'Resources Type :: EzBook')

@section('content')

    <!--begin::Main-->
    <x-layouts.page-list>
        <x-slot:heading>Resources</x-slot:heading>
        <x-slot:goto>
            <x-forms.button href="{{ route('resource.location.list') }}" class="ml-3" value="Resource Location" />
            <x-forms.button href="{{ route('resource.type.list') }}" class="btn-success ml-3" value="Resource Type" />
            <x-forms.button href="{{ route('resource.resource') }}" class="ml-3" value="Resources" />
        </x-slot:goto>
        <x-slot:action>
            <x-forms.button href="{{ route('resource.type.create') }}" class="ml-3" value="Add New" />
            <x-forms.button class="btn-success ml-3" value="Export to Excel" />
        </x-slot:action>


        <!--begin::Table-->
        <div class="table-responsive">
            @php
                $headers = ['sn' => 'S.No.', 'Name' => 'Name', 'Description' => 'Description', 'id' => 'Action'];
                // $listResources = Arr::only($listResources, ['Name', 'EmailAddress'])
                $actions = [];
                // $actions = [ 'Delete' => 'resource.destroy',];
                $actions = [ 'Edit' => 'resource.type.edit',];
                // dd($data);
            @endphp
            {{-- @dd($listResources) --}}
            <x-layouts.table id="kt_datatable" :headers="$headers" :data="$data" :actions="$actions" route="id" />

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

