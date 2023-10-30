@extends('layouts.app')
@section('pageTitle', 'Dashboard :: EzBook')

@section('content')
    @php
        extract($data);
        $Resources = $ModeratorRequestedBookings->FacProviders->first()->Resources;
        // dd($user, $Resources, $Resources->count(), $Resources->toArray(), $ModeratorRequestedBookings->FacProviders->first()->Resources );
    @endphp
    <!--begin::Main-->
    <x-layouts.page>
        <!--begin::Container-->
        <div class="container">
            <!--begin::Dashboard-->

            <!--begin::Row-->
            <div class="row">
                <div class="col-xl-6">
                    <!--begin::Base Table Widget 3-->
                    <div class="card card-custom gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0 py-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-dark">Upcoming Bookings</span>

                            </h3>
                            <div class="card-toolbar">
                                <a href="#" class="btn btn-dark font-weight-bolder font-size-sm mr-2">
                                    Complete List </a>
                                <a href="{{ route('book.index') }}"
                                    class="btn btn-primary font-weight-bolder font-size-sm mr-2">
                                    Add New </a>

                                <a href="#" class="btn btn-success font-weight-bolder font-size-sm">
                                    Export to excel</a>
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body py-0">
                            <!--begin::Table-->
                            <div class="table-responsive">
                                <table class="table table-head-custom table-vertical-center" id="kt_datatable">
                                    <thead class="bg-light">
                                        <tr class="text-left">
                                            <th>Booked For</th>
                                            <th>BOOKED DATE & TIME</th>
                                            <th>Booked By</th>
                                            <th class=" text-right">action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($upcomingBookings as $booking)
                                            <tr>
                                                <td class="pr-0">
                                                    {{ $booking->BookedFor }}
                                                </td>
                                                <td class="pl-0">
                                                    {{ date('Y-M-d | h:i A', strtotime($booking->FromTime)) }}
                                                </td>
                                                <td>
                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                        {{ $booking->user->Name }}
                                                    </span>
                                                </td>
                                                <td class="pr-0 text-right">
                                                    <a href="#"
                                                        class="btn btn-light-success font-weight-bolder font-size-sm">View
                                                    </a>

                                                </td>
                                            </tr>
                                        @endforeach
                                        {{-- <tr>
                                            <td colspan="4">{{ $upcomingBookings->onEachSide(1)->links() }}</td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Base Table Widget 3-->
                </div>
                <div class="col-xl-6">
                    <!--begin::Base Table Widget 5-->
                    <div class="card card-custom gutter-b card-stretch">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-dark">Booking Summary</span>

                            </h3>
                            <div class="card-toolbar">
                                <x-forms.form class="form-inline mb-5">
                                    <x-forms.input value="{{ date('Y') . '-01-01' }}" design="4" size="-sm"
                                        type="date" name="from" label="From" />
                                    <x-forms.input value="{{ date('Y-m-d') }}" design="4" size="-sm" type="date"
                                        name="to" label="To" />
                                    <x-forms.button design="2" type="submit" value="Find"
                                        class="btn-primary btn-sm" />
                                </x-forms.form>
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-2 pb-0 mt-n3 mb-9">
                            <div class="row m-0 mb-7">
                                <div class="col bg-light px-6 py-8 rounded-xl mr-7">
                                    <h3 class="total-number">{{ $summaryBookings[0]->totalBooking }}</h3>
                                    <a href="#" class="text-total font-weight-bold font-size-h6">Total Bookings</a>
                                </div>
                                <div class="col bg-light px-6 py-8 rounded-xl ">
                                    <h3 class="total-number">{{ $summaryBookings[0]->completedBooking }}</h3>
                                    <a href="#" class="text-total font-weight-bold font-size-h6">Completed
                                        Bookings</a>
                                </div>

                            </div>
                            <div class="row m-0">
                                <div class="col bg-light px-6 py-8 rounded-xl mr-7">
                                    <h3 class="total-number">{{ $summaryBookings[0]->upcomingBooking }}</h3>
                                    <a href="#" class="text-total font-weight-bold font-size-h6">Upcoming Bookings</a>
                                </div>
                                <div class="col bg-light px-6 py-8 rounded-xl">
                                    <h3 class="total-number">{{ $summaryBookings[0]->upcomingBooking }}</h3>
                                    <a href="#" class="text-total font-weight-bold font-size-h6">Pending Bookings</a>
                                </div>

                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Base Table Widget 5-->
                </div>
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row">
                <div class="col-xl-6">
                    <!--begin::Charts Widget 1-->
                    <div class="card card-custom card-stretch gutter-b">
                        <!--begin::Header-->
                        <div class="card-header h-auto border-0">
                            <!--begin::Title-->
                            <div class="card-title py-5">
                                <h3 class="card-label">
                                    <span class="d-block text-dark font-weight-bolder">Duration Breakdown</span>

                                </h3>
                            </div>
                            <!--end::Title-->
                            <!--begin::Toolbar-->
                            <div class="card-toolbar">
                                <div class="dropdown dropdown-inline">
                                    <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ki ki-bold-more-hor"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                        <!--begin::Naviigation-->
                                        <ul class="navi">
                                            <li class="navi-header font-weight-bold py-5">
                                                <span class="font-size-lg">Add New:</span>
                                                <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip"
                                                    data-placement="right" title="Click to learn more..."></i>
                                            </li>
                                            <li class="navi-separator mb-3 opacity-70"></li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="flaticon2-shopping-cart-1"></i>
                                                    </span>
                                                    <span class="navi-text">Booking</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="navi-icon flaticon2-calendar-8"></i>
                                                    </span>
                                                    <span class="navi-text">Members</span>
                                                    <span class="navi-label">
                                                        <span
                                                            class="label label-light-danger label-rounded font-weight-bold">3</span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="navi-icon flaticon2-telegram-logo"></i>
                                                    </span>
                                                    <span class="navi-text">Project</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="navi-icon flaticon2-new-email"></i>
                                                    </span>
                                                    <span class="navi-text">Record</span>
                                                    <span class="navi-label">
                                                        <span
                                                            class="label label-light-success label-rounded font-weight-bold">5</span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="navi-separator mt-3 opacity-70"></li>
                                            <li class="navi-footer pt-5 pb-4">
                                                <a class="btn btn-light-primary font-weight-bolder btn-sm"
                                                    href="#">More options</a>
                                                <a class="btn btn-clean font-weight-bold btn-sm d-none" href="#"
                                                    data-toggle="tooltip" data-placement="right"
                                                    title="Click to learn more...">Learn more</a>
                                            </li>
                                        </ul>
                                        <!--end::Naviigation-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Chart-->
                            <div id="bar-chart-Duration-Breakdown"></div>
                            <!--end::Chart-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Charts Widget 1-->
                </div>

                <div class="col-xl-6">
                    <!--begin::Charts Widget 1-->
                    <div class="card card-custom card-stretch gutter-b">
                        <!--begin::Header-->
                        <div class="card-header h-auto border-0">
                            <!--begin::Title-->
                            <div class="card-title py-5">
                                <h3 class="card-label">
                                    <span class="d-block text-dark font-weight-bolder">Number of Bookings</span>

                                </h3>
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Chart-->
                            <div id="chart-Number-of-Bookings"></div>
                            <!--end::Chart-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Charts Widget 1-->
                </div>

            </div>
            <!--end::Row-->

            <!--end::Row-->
            {{-- <div class="card card-custom gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0 py-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder text-dark mb-2">Request sent to Moderator</span>
                        <form class="form-inline">
                            <span class="mr-4">Show</span>
                            <div class="form-group">

                                <select class="form-control " id="show">
                                    <option>Select</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <span class="mr-4 ml-4">Entries</span>
                            <div class="form-group">

                                <select class="form-control mr-2 " id="exampleSelectl">
                                    <option>Booking</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group">

                                <select class="form-control mr-2" id="kt_select2_1">
                                    <option>Booking1ff</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </form>
                    </h3>
                    <div class="card-toolbar">

                        <a href="#" class="btn btn-primary font-weight-bolder font-size-sm mr-3">Add New</a>
                        <a href="#" class="btn btn-success font-weight-bolder font-size-sm">Export to Excel</a>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-0 pb-3">
                    <div class="tab-content">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                                <thead>
                                    <tr class="text-left text-uppercase">
                                        <th style="min-width: 30px">S.No.</th>
                                        <th style="min-width: 200px">Name</th>
                                        <th style="min-width: 100px">Date & Time</th>
                                        <th style="min-width: 100px">Booked For</th>
                                        <th style="min-width: 150px">Booked By</th>
                                        <th style="min-width: 80px"></th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>1.</td>
                                        <td class="pl-0 py-8">
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Brad
                                                Simmons</span>

                                        </td>
                                        <td>
                                            <span
                                                class="text-dark-75 font-weight-bolder d-block font-size-lg">12-May-2023</span></span>
                                            <span class="text-muted font-weight-bold">4:07:00 PM</span>
                                        </td>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Lorem
                                                Ipsum</span>

                                        </td>
                                        <td>
                                            <span
                                                class="text-dark-75 font-weight-bolder d-block font-size-lg">Intertico</span>

                                        </td>

                                        <td class="pr-0 text-right">
                                            <a href="#"
                                                class="btn btn-light-success font-weight-bolder font-size-sm">View </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>2.</td>
                                        <td class="pl-0 py-8">
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Brad
                                                Simmons</span>

                                        </td>
                                        <td>
                                            <span
                                                class="text-dark-75 font-weight-bolder d-block font-size-lg">12-May-2023</span></span>
                                            <span class="text-muted font-weight-bold">4:07:00 PM</span>
                                        </td>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Lorem
                                                Ipsum</span>

                                        </td>
                                        <td>
                                            <span
                                                class="text-dark-75 font-weight-bolder d-block font-size-lg">Intertico</span>

                                        </td>

                                        <td class="pr-0 text-right">
                                            <a href="#"
                                                class="btn btn-light-success font-weight-bolder font-size-sm">View </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>3.</td>
                                        <td class="pl-0 py-8">
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Brad
                                                Simmons</span>

                                        </td>
                                        <td>
                                            <span
                                                class="text-dark-75 font-weight-bolder d-block font-size-lg">12-May-2023</span></span>
                                            <span class="text-muted font-weight-bold">4:07:00 PM</span>
                                        </td>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Lorem
                                                Ipsum</span>

                                        </td>
                                        <td>
                                            <span
                                                class="text-dark-75 font-weight-bolder d-block font-size-lg">Intertico</span>

                                        </td>

                                        <td class="pr-0 text-right">
                                            <a href="#"
                                                class="btn btn-light-success font-weight-bolder font-size-sm">View </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td class="pl-0 py-8">
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Brad
                                                Simmons</span>

                                        </td>
                                        <td>
                                            <span
                                                class="text-dark-75 font-weight-bolder d-block font-size-lg">12-May-2023</span></span>
                                            <span class="text-muted font-weight-bold">4:07:00 PM</span>
                                        </td>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Lorem
                                                Ipsum</span>

                                        </td>
                                        <td>
                                            <span
                                                class="text-dark-75 font-weight-bolder d-block font-size-lg">Intertico</span>

                                        </td>

                                        <td class="pr-0 text-right">
                                            <a href="#"
                                                class="btn btn-light-success font-weight-bolder font-size-sm">View </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5.</td>
                                        <td class="pl-0 py-8">
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Brad
                                                Simmons</span>

                                        </td>
                                        <td>
                                            <span
                                                class="text-dark-75 font-weight-bolder d-block font-size-lg">12-May-2023</span></span>
                                            <span class="text-muted font-weight-bold">4:07:00 PM</span>
                                        </td>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Lorem
                                                Ipsum</span>

                                        </td>
                                        <td>
                                            <span
                                                class="text-dark-75 font-weight-bolder d-block font-size-lg">Intertico</span>

                                        </td>

                                        <td class="pr-0 text-right">
                                            <a href="#"
                                                class="btn btn-light-success font-weight-bolder font-size-sm">View </a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                </div>
                <!--end::Body-->
            </div> --}}



            <div class="card card-custom gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0 py-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder text-dark mb-2">Request to be moderated</span>
                        <form class="form-inline">
                            <span class="mr-4">Show</span>
                            <div class="form-group">

                                <select class="form-control " id="show">
                                    <option>Select</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <span class="mr-4 ml-4">Entries</span>
                            <div class="form-group">

                                <select class="form-control mr-2 " id="exampleSelectl">
                                    <option>Booking</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group">

                                <select class="form-control " id="kt_select2_1">
                                    <option>Booking1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </form>
                    </h3>
                    <div class="card-toolbar">
                        <a href="#" class="btn btn-primary font-weight-bolder font-size-sm mr-3">Add New</a>
                        <a href="#" class="btn btn-success font-weight-bolder font-size-sm">Export to Excel</a>
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
                                        <th>S.No.</th>
                                        <th>Name</th>
                                        <th>Date & Time</th>
                                        <th>Booked For</th>
                                        <th>Booked By</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @if ($Resources->count())
                                        @foreach ($Resources as $Resource)
                                            @if ($Resource->Bookings->count())
                                                @foreach ($Resource->Bookings as $Booking)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        {{-- <td>{{ $loop->iteration }}</td> --}}
                                                        <td class="pl-0 py-8">
                                                            <span
                                                                class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                                {{-- {{$ModeratorRequestedBooking->Name}}  --}}
                                                                {{ $Resource->Name }}
                                                            </span>

                                                        </td>
                                                        <td>
                                                            <span
                                                                class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                                {{ date('d-M-Y', strtotime($Booking->FromTime)) }}
                                                            </span>
                                                            <span
                                                                class="text-muted font-weight-bold">{{ date('h:i:s A', strtotime($Booking->FromTime)) }}</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $Booking->BookedFor }}</span>

                                                        </td>
                                                        <td>
                                                            <span
                                                                class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $Booking->user->Name }}</span>

                                                        </td>

                                                        <td class="pr-0 text-right d-flex float-right">
                                                            @php
                                                                $actions = ['Accept' => 'book.destroy', 'Reject' => 'book.destroy', 'View-JS' => 'book.getbooking'];
                                                                $route = 'book';
                                                                $id = $Booking->ID;
                                                            @endphp
                                                            <x-forms.action id="{{ $id ?? '' }}" :actions="$actions"
                                                                route="{{ $route }}" />

                                                            {{-- <a href="#" id="booking-update-modal" class="btn btn-light-info font-weight-bolder font-size-sm">Accept </a> --}}
                                                            {{-- <a href="#" class="btn btn-light-warning font-weight-bolder font-size-sm">Reject </a>
                                            <a href="#" class="btn btn-light-success font-weight-bolder font-size-sm">View </a> --}}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif
                                    {{-- <tr>
                                        <td>5.</td>
                                        <td class="pl-0 py-8">
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Brad
                                                Simmons</span>

                                        </td>
                                        <td>
                                            <span
                                                class="text-dark-75 font-weight-bolder d-block font-size-lg">12-May-2023</span></span>
                                            <span class="text-muted font-weight-bold">4:07:00 PM</span>
                                        </td>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Lorem
                                                Ipsum</span>

                                        </td>
                                        <td>
                                            <span
                                                class="text-dark-75 font-weight-bolder d-block font-size-lg">Intertico</span>

                                        </td>

                                        <td class="pr-0 text-right">
                                            <a href="#"
                                                class="btn btn-light-info font-weight-bolder font-size-sm">Accept </a>
                                            <a href="#"
                                                class="btn btn-light-warning font-weight-bolder font-size-sm">Reject </a>
                                            <a href="#"
                                                class="btn btn-light-success font-weight-bolder font-size-sm">View </a>
                                        </td>
                                    </tr> --}}

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
    </x-layouts.page>
    <!--end::Main-->


    <!-- start::booking-update-modal -->

    @php
        $sub_resources = [];
    @endphp
    <div class="modal fade" id="booking-update-modal-dash" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <x-forms.form method="PUT" id="ajax-update-booking" action="">
                    <x-forms.input name="ID" type="hidden" value="" />
                    <x-forms.input name="ModeratedBy" type="hidden" value="" />
                    <x-forms.input name="ModeratedByName" type="hidden" value="" />
                    <div class="modal-header">
                        <h4 class="modal-title">New Booking for {{ $Name ?? '' }} </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        @if (count($sub_resources) > 0)
                            @php
                                $options = ['0' => 'All', '1' => 'Any'] + array_combine(array_column($sub_resources, 'ID'), array_column($sub_resources, 'Name'));
                            @endphp
                            <x-forms.select design="1" name="SubID" :options="$options" label="Sub Resource" />
                        @endif
                        <x-forms.input design="2" name="FromTime" type="datetime-local" label="From" />
                        <x-forms.input design="2" name="ToTime" type="datetime-local" label="To" />
                        <x-forms.input design="2" name="BookedFor" label="For" />
                        <x-forms.textarea design="1" name="Purpose" label="Additional Info" />
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default">Update</button>
                </x-forms.form>
                <x-forms.form method="DELETE" id="ajax-delete-booking" action="">
                    <x-forms.input id="id-delete" name="ID" type="hidden" value="" />
                    <button type="submit" class="Reject-book btn btn-default">Delete</button>
                </x-forms.form>
            </div>
        </div>

    </div>
    </div>
    <!-- end::booking-update-modal -->

@endsection

@pushOnce('scripts')
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
    {{-- <script src="{{ asset('js/pages/features/charts/apexcharts.js') }}"></script> --}}
    <script src="{{ asset('js/ajax-full-calendar.js') }}"></script>
    <script>
        $(document).ready(function() {



            let opt = {
                responsive: true,
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excel',
                    text: 'Export to Excel',
                }],
                lengthMenu: [
                    [2, 5, 10, 25, 50, -1],
                    [2, 5, 10, 25, 50, "All"]
                ],
            };
            let datatable = $('#kt_datatable').DataTable(opt);
            $('#kt_datatable_mod').DataTable(opt);


            const primary = '#6993FF';
            const apexChart = "#chart-Number-of-Bookings";
            var options = {
                series: [{
                    name: "Number of Bookings",
                    data: {!! json_encode($numberBookings) !!}
                    // data: [10, 41, 35, 51, 49, 62, 69, 91, 148, 88, 334, 222]
                }],
                chart: {
                    height: 350,
                    type: 'line',
                    zoom: {
                        enabled: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'straight'
                },
                grid: {
                    row: {
                        colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                        opacity: 0.5
                    },
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov',
                        'Dec'
                    ],
                },
                colors: [primary]
            };

            var chart = new ApexCharts(document.querySelector(apexChart), options);
            chart.render();


            var element = document.getElementById("bar-chart-Duration-Breakdown");

            if (!element) {
                return;
            }

            var barChartOptions = {
                series: [{
                    name: 'Number of Bookings',
                    data: {!! json_encode($numberBookings) !!}
                }],
                chart: {
                    type: 'bar',
                    height: 350,
                    toolbar: {
                        show: true
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: ['30%'],
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov',
                        'Dec'
                    ],

                    // labels: {
                    //     style: {
                    //         colors: KTApp.getSettings()['colors']['gray']['gray-500'],
                    //         fontSize: '12px',
                    //         fontFamily: KTApp.getSettings()['font-family']
                    //     }
                    // }
                },
                colors: [KTApp.getSettings()['colors']['theme']['base']['success'], KTApp.getSettings()[
                    'colors']['gray']['gray-300']],
                grid: {
                    borderColor: KTApp.getSettings()['colors']['gray']['gray-200'],
                    strokeDashArray: 4,
                    yaxis: {
                        lines: {
                            show: true
                        }
                    }
                }
            };

            //         var chart = new ApexCharts(element, barChartOptions);
            // chart.render();

            new ApexCharts(element, barChartOptions).render();

            $('.View-JS-book').on('click', function() {
                var $th = $(this);
                let $id = $th.attr('id').replace('View-JS-book-', '');
                let $url = $th.attr('href');
                // alert(JSON.stringify($url));
                $("#booking-update-modal-dash").modal({
                    backdrop: 'static',
                    keyboard: false
                });
                ajaxCall($url, {
                    error: function(response) {
                        Swal.fire('error');
                        alert(JSON.stringify(response));
                    },
                    success: function(response) {
                        var mod = {ModeratedBy: "{{$user->id}}", ModeratedByName: "{{$user->Name}}" };
                        response = {...response, ...mod};
                        // alert(JSON.stringify(response));
                        let $updateUrl = "{!! route('book.update', ':id') !!}";
                        $updateUrl = $updateUrl.replace(':id', $id);
                        $("#ajax-update-booking").attr("action", $updateUrl);

                        let $deleteUrl = "{!! route('book.destroy', ':id') !!}";
                        $deleteUrl = $deleteUrl.replace(':id', $id);
                        $("#ajax-delete-booking").attr("action", $deleteUrl);
                        $.each(response, function(indexInArray, valueOfElement) {
                            $("#ajax-update-booking input[name=" + indexInArray +
                                "]").val(valueOfElement);
                            $("#ajax-update-booking textarea[name=" + indexInArray +
                                "]").val(valueOfElement);
                            $("#ajax-update-booking select[name=" + indexInArray +
                                "]").val(valueOfElement);
                        });
                        console.log(response);
                        return response;
                    }
                });
            });
            $("#ajax-update-booking").submit(function(e) {
                e.preventDefault();
                $('button[type=submit], input[type=submit]').prop('disabled', true);

                var $form = $(this);
                var $actionUrl = $form.attr('action');
                var $type = $form.attr('method');
                var $data = $form.serialize();
                // alert("success: " + JSON.stringify($data));

                var $success = function(response) {
                    // alert("success: " + JSON.stringify(response));
                    $("#booking-update-modal-dash").modal('hide');
                    window.location.reload(true);
                };
                var $complete = function(response) {
                    // alert("complete:" + JSON.stringify(response));
                    // console.log(response);
                };
                ajaxCall($actionUrl, {
                    type: $type,
                    data: $data,
                    success: $success,
                    complete: $complete
                });
            });

            $('.Reject-book').on('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Do you want to reject booking ?',
                    showCancelButton: true,
                    denyButtonText: `Delete`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        // let $id = $(this).attr('id').replace('Reject-book', 'View-JS-book');
                        // $('#'+$id).trigger('click');
                        // $('#ajax-update-booking').trigger('submit');


                        var $form = $(this).parent('form');
                        // alert(JSON.stringify($form));
                        var $actionUrl = $form.attr('action');
                        var $type = $form.attr('method');
                        var $data = $form.serialize();
                        // var $data = {ModeratedBy: "{{$user->id}}", ModeratedByName: "{{$user->Name}}" };
                        var $success = function(response) {
                            // alert("success: " + JSON.stringify(response));
                            window.location.reload(true);
                        };
                        ajaxCall($actionUrl, {
                            type: $type,
                            data: $data,
                            success: $success
                            // complete: $complete
                        });
                        // alert("complete:" + JSON.stringify($form));
                    }
                });
            });

            // END::DOCUMENT READY FUNCTION
        });
    </script>
@endpushOnce
