@php
// dd($data);
extract($data);
@endphp
@extends('layouts.app')
@section('pageTitle', 'User List :: EzBook')

@section('content')
<x-layouts.page-list heading="Users">
        {{-- <x-layouts.message /> --}}
        {{-- <x-slot:heading>Resources</x-slot:heading> --}}
        <x-slot:goto>
            <x-forms.button href="{{ route('usergroup.index') }}" class="ml-3" value="User Groups" />
            <x-forms.button href="{{ route('user.index') }}" class="btn-success ml-3" value="Users" />
        </x-slot:goto>
        <x-slot:action id="buttons">
            <x-forms.button href="{{ route('user.create') }}" class="mx-3" value="Add New" />
            {{-- <x-forms.button class="btn-success ml-3" value="Export to Excel" /> --}}
        </x-slot:action>
         <!--begin::Table-->
         <div class="table-responsive">
            @php
                $headers = ['sn' => 'S.No.', 'Name' => 'Name', 'EmailAddress' => 'Email Address', 'PhoneNumbers' => 'Phone Numbers', 'AdminLevel' => 'AdminLevel', 'id' => 'Action'];
                // $listResources = Arr::only($listResources, ['Name', 'EmailAddress'])
                $actions = [];
                // $actions = [ 'Delete' => 'resource.destroy',];
                $actions = [ 'Edit' => 'user.edit', 'Alert-Delete' => 'user.destroy', ];
                $route = 'user';
            @endphp
            {{-- @dd($listResources) --}}
            <x-layouts.table id="kt_datatable" :headers="$headers" >
                @if(isset($users) )
                @foreach ($users as $user)
                    <tr class="text-left">
                       <th>{{$loop->iteration}}</th>
                       <th>{{$user->Name}}</th>
                       <th>{{$user->EmailAddress}}</th>
                       <th>{{$user->PhoneNumbers}}</th>
                       <th>{{$user->userType->userType}}</th>
                       <th><div class="d-flex float-right"><x-forms.action id="{{ $user->id }}" :actions="$actions" route="{{$route}}" /></div></th>
                    </tr>
                    @endforeach
            @endif
            </x-layouts.table>

        </div>
        <!--end::Table-->

</x-layouts.page-list>
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
