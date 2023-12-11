@extends('layouts.admin')
@section('pageTitle', 'Admin Billing Query :: EzBook')

@section('content')
    @php
        // extract($data);
        // dd($data);
    @endphp
    <!--begin::Main-->
    <x-layouts.admin.page>
        <!--begin::Container-->
        <div class="container">
            <!--begin::Dashboard-->

            <div class="card card-custom gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0 py-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder text-dark mb-2">Billing Query</span>

                    </h3>

                    <div class="card-toolbar">
                        <x-forms.form class="form-inline mb-5">
                            <x-forms.input value="{{ date('Y') . '-01-01' }}" design="4" size="-sm" type="date"
                                name="from" label="From" />
                            <x-forms.input value="{{ date('Y-m-d') }}" design="4" size="-sm" type="date"
                                name="to" label="To" />
                            <x-forms.input value="1" design="0" size="-sm" type="radio" name="unprocessed"
                                label="Unprocessed" />
                            <x-input-label for="id-unprocessed">Unprocessed</x-input-label>
                            <x-forms.button design="2" type="submit" value="Find" class="btn-primary btn-sm ml-5" />
                        </x-forms.form>
                    </div>
                    <div id="mod-buttons" class="card-toolbar">
                        {{-- <a href="#" class="btn btn-primary font-weight-bolder font-size-sm mr-3">Add New</a> --}}
                        {{-- <a href="#" class="btn btn-success font-weight-bolder font-size-sm">Export to Excel</a> --}}
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-0 pb-3">
                    <div class="tab-content">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table id="kt_datatable_mod"
                                class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                                <thead>
                                    <tr class="text-left text-uppercase">
                                        <th>Site Name</th>
                                        <th># of Resources</th>
                                        <th>Date Requested</th>
                                        <th>Date Precessed</th>
                                        <th>Precessed</th>
                                        <th>Amount (in $)</th>
                                        <th>Email</th>
                                        <th>Note</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;

                                    @endphp

                                    @if (!empty($logs) && $logs->count())
                                        @foreach ($logs as $log)
                                            <tr>
                                                <th>Site Name</th>
                                                <th># of Resources</th>
                                                <th>Date Requested</th>
                                                <th>Date Precessed</th>
                                                <th>Precessed</th>
                                                <th>Amount (in $)</th>
                                                <th>Email</th>
                                                <th>Note</th>
                                                <th>Action</th>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                </div>
                <!--end::Body-->
            </div>


            <!--end::Dashboard-->
        </div>
        <!--end::Container-->
    </x-layouts.admin.page>
        <!--end::Main-->




    @endsection

    @pushOnce('scripts')
        <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
        {{-- <script src="{{ asset('js/pages/features/charts/apexcharts.js') }}"></script> --}}
        <script>
            $(document).ready(function() {

                let opt = {
                    responsive: true,
                    dom: 'Bfrtip',
                    buttons: [{
                        extend: 'excel',
                        text: 'Export to Excel',
                        className: 'btn btn-success font-weight-bolder font-size-sm'
                    }],
                    lengthMenu: [
                        [10, 25, 50, -1],
                        [10, 25, 50, "All"]
                    ],
                };
                // let datatable = $('#kt_datatable').DataTable(opt);
                // datatable.buttons().container().appendTo( $('#buttons') );
                let datatableMod = $('#kt_datatable_mod').DataTable(opt);
                datatableMod.buttons().container().appendTo($('#mod-buttons'));


                // END::DOCUMENT READY FUNCTION
            });
        </script>
    @endpushOnce
