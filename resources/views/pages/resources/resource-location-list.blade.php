@extends('layouts.app')
@section('pageTitle', 'Resources Location :: EzBook')

@section('content')

    <!--begin::Main-->
    <x-layouts.page-list>
        <x-slot:heading>Resources Locations</x-slot:heading>
        <x-slot:goto>
            <x-forms.button href="{{ route('resource.location.list') }}" class="btn-success ml-3" value="Resource Location" />
            <x-forms.button href="{{ route('resource.type.list') }}" class="ml-3" value="Resource Type" />
            <x-forms.button href="{{ route('resource.resource') }}" class="ml-3" value="Resources" />
        </x-slot:goto>
        <x-slot:action id="buttons">
            <x-forms.button href="{{ route('resource.location.create') }}" class="mx-3" value="Add New" />
            {{-- <x-forms.button class="btn-success ml-3" value="Export to Excel" /> --}}
        </x-slot:action>



        <!--begin::Table-->
        <div class="table-responsive">
            @php
                $headers = ['sn' => 'S.No.', 'Name' => 'Name', 'Address1' => 'Address', 'id' => 'Action'];
                // $listResources = Arr::only($listResources, ['Name', 'EmailAddress'])
                $actions = [];
                // $actions = [ 'Delete' => 'resource.destroy',];
                $actions = [ 'Edit' => 'resource.location.edit',];
                // dd($data);
            @endphp
            {{-- @dd($listResources) --}}
            <x-layouts.table id="kt_datatable" :headers="$headers" :data="$data??[]" :actions="$actions" route="id" />

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
                    className: 'btn btn-success font-weight-bolder font-size-sm'
                }],
                lengthMenu: [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "All"] ],


        };
            var datatable = $('#kt_datatable').DataTable(opt);
            datatable.buttons().container().appendTo( $('#buttons') );

            // END::DOCUMENT READY
        });
    </script>
@endPushOnce

