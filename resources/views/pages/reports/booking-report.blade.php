@extends('layouts.app')
@section('pageTitle', 'Booking Reports :: EzBook')

@section('content')
@php
    extract($data);
@endphp
    <!--begin::Main-->
    <x-layouts.page>
        <div class="container">
            <div class="card card-custom gutter-b">
                <div class="border-0 card-header pt-8">
                    <h3>Booking Reports</h3>
                    <x-forms.form class="form-inline">
                        <x-forms.input value="{{ date('Y') . '-01-01' }}"  design="2" type="date" name="from" label="From" />
                        <x-forms.input value="{{ date('Y-m-d') }}"  design="2" type="date" name="to" label="To" />
                        <x-forms.select design="1" name="resourceTypes" label="Resource" :options="$resourceTypes" />
                        <x-forms.select design="1" name="locations" label="Location" :options="$ResourceLocations" />
                        <x-forms.button design="1" type="submit" value="Build" class="btn-primary" />
                    </x-forms.form>
                </div>
                <div class="card-body">
                    <!--begin::Table-->
                    <div class="table-responsive">
                        @php
                            $headers = ['sn' => 'S.No.', 'from' => 'From', 'to' => 'To', 'Name' => 'Resource', 'for' => 'For', 'bookedby' => 'Booked by', 'additionalInfo' => 'Additional Informetion', 'custBookingInfo' => 'Custom Booking Information'];
                            // $listResources = Arr::only($listResources, ['Name', 'EmailAddress'])
                            $actions = [];
                            // $actions = [ 'Delete' => 'resource.destroy',];
                            $actions = ['Edit' => 'resource.edit', 'Delete' => 'resource.destroy'];
                            $listResources = [];
                            $i=1;
                        @endphp
                        <x-layouts.table :headers="$headers" :actions="$actions" route="resource">
                            @foreach ($resources as $resource)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $resource->from  }}</td>
                                <td>{{ $resource->to }}</td>
                                <td>{{ $resource->resource }}</td>
                                <td>{{ $resource->for }}</td>
                                <td>{{ $resource->bookedBy }}</td>
                                <td>{{ $resource->additionalInfo }}</td>
                                <td>{{ $resource->custBookingInfo }}</td>
                            </tr>

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