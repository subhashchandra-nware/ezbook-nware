@extends('layouts.app')
@section('pageTitle', 'Books :: EzBook')

@section('content')
    <x-layouts.page>
        <!--begin::Container-->
        <div class="container-fluid">
            <div class="row">
                <!--Side Col Sidebar Start-->
                <div class="col-md-2">
                    <div id="kt_aside_menu" class="aside-menu " data-menu-vertical="1" data-menu-scroll="1"
                        data-menu-dropdown-timeout="500">
                        <!--begin::Menu Nav-->
                        @php
                            // dd( $data);
                            extract($data);
                            $LocationOptions = ['0' => 'All'] + array_combine(array_column($ResourceLocation, 'id'), array_column($ResourceLocation, 'Name'));
                        @endphp

                        <ul class="menu-nav pb-0">
                            <li class="menu-section">
                                <h4 class="menu-text">Location</h4>
                                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                            </li>
                            <li>
                                <x-forms.form class="form p-5">
                                    <div class="form-group">

                                        <x-forms.select selected="{{ request()->segment(2) }}" onchange="window.location.href='{{route('book.index')}}/'+ $(this).val()" name="resourceLocation" :options="$LocationOptions"
                                            class="form-control form-control-md location-select2" id="show" />
                                    </div>
                                    <div class="form-group">
                                        <x-forms.input name="searchResources" placeholder="Search Resources" type="text"
                                            class="font-size-base form-control form-control-md" />

                                    </div>
                                    {{-- <div class="form-group">
                                        <x-forms.button design="2" name="submit" type="submit" value="Search"/>
                                    </div> --}}
                                </x-forms.form>
                            </li>
                        </ul>

                        <x-layouts.menu-vertical name="Choose A Resource" :menus="$ResourceTypes" childkey="resources" />
                        {{-- @dd($ResourceTypes) --}}
                        <!--end::Menu Nav-->
                    </div>
                </div>
                <!--Side Col Sidebar End-->

                <div class="col-md-10" id="id-resource-sub-resource">
                    <!--begin::Card-->
                    <div class="card card-custom">

                        <div class="card-header" id="ajax-header">
                            @php
                                $Resources = count($Resources) == 1 ? $Resources[0] : $Resources;
                                // dd($Resources);
                                extract($Resources);
                                $events = [];
                                if(isset($bookings) && count($bookings) ){
                                foreach ($bookings as $key => $booking) {
                                    $booking = (object) $booking;
                                    $events[] = [
                                        // $events[] = [
                                        'id' => $booking->ID,
                                        'title' => $Name,
                                        'start' => $booking->FromTime,
                                        'description' => "[{$booking->FromTime} - {$booking->ToTime} : {$Name} (Booked by {$booking->BookedBy})]",
                                        'end' => $booking->ToTime,
                                        'className' => 'fc-event-success',
                                    ];
                                }
                            }
                                // $events = json_decode(json_encode($events), FALSE);

                                // dd($events);
                            @endphp
                            <div class="card-title">
                                <h3 class="card-label">{{ $Name }}</h3>
                            </div>
                            <pre id="ajax-test"></pre>
                            <div class="card-toolbar">
                                {{-- <a href="#" class="btn btn-primary font-weight-bold">
                                    <i class="ki ki-plus icon-md mr-2"></i>Add Event</a> --}}

                                @if (count($sub_resources) > 0)

                                    <form class="form p-5">
                                        <div class="form-group mb-0">
                                            <select class="form-control form-control-md " id="id-sub_resource">
                                                <option>All</option>
                                                <option>Any</option>
                                                @foreach ($sub_resources as $sub)
                                                    <option value="{{ $sub['ID'] }}">{{ $sub['Name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </form>

                                @endif
                            </div>
                        </div>

                        <div class="card-body">
                            <div id="calendar"></div>
                            {{-- <div id="kt_calendar"></div> --}}
                        </div>
                    </div>
                    <!--end::Card-->

                </div>
            </div>
        </div>
        <!--end::Container-->
    </x-layouts.page>



    <!-- start::Modal -->
    <div class="modal fade" id="booking-create-modal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <x-forms.form id="ajaax-create-resource" action="{{ route('book.store') }}">
                    <x-forms.input name="FacID" type="hidden" value="{{ $ID }}" />
                    <x-forms.input name="SubID" type="hidden" value="0" />
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">New Booking for {{ $Name }} </h4>
                    </div>
                    <div class="modal-body">
                        <p>Some text in the modal.</p>
                        <x-forms.input design="2" name="FromTime" type="datetime-local" label="From" />
                        <x-forms.input design="2" name="ToTime" type="datetime-local" label="To" />
                        <x-forms.input design="2" name="BookedFor" label="For" />
                        <x-forms.textarea design="1" name="Purpose" label="Additional Info" />
                        {{-- <x-forms.input design="2" name="end" type="color" value="#22A6DB" label="Color" title="Choose your color" /> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default">Submit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </x-forms.form>
            </div>

        </div>
    </div>
    <!-- end::Modal -->

@endsection
@pushOnce('scripts')
    <!--begin::Page Scripts(used by this page)-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    {{-- <script src="{{ asset('js/pages/features/calendar/google.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/pages/features/calendar/external-events.js') }}"></script> --}}
    <script src="{{ asset('js/ajax-full-calendar.js') }}"></script>
    <!--end::Page Scripts-->

    <script>
        "use strict";

        $(document).ready(function() {
            // console.log();
            let CalendarOptions = {
                plugins: ['interaction', 'dayGrid', 'timeGrid', 'list', 'googleCalendar'],
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    // right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                    right: 'timeGridWeek,timeGridDay,listWeek'
                },
                defaultView: 'timeGridWeek',
                navLinks: true,
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                // events: "{{ route('getbookedresource', ['resource' => 104]) }}",
                events: {!! json_encode($events) !!},
                // displayEventTime: false,
                selectable: true,
                // selectHelper: true,
                select: function(info) {
                    var s = moment(info.start).format("YYYY-MM-DD HH:mm:ss");
                    var e = moment(info.end).format("YYYY-MM-DD HH:mm:ss");
                    var sr = 0
                    if ($('#sub_resource').length) {
                        sr = $('#id-sub_resource').val();
                    }
                    // alert(s);
                    $("#id-FromTime").val(s);
                    $("#id-ToTime").val(e);
                    $("#id-SubID").val(sr);
                    $("#booking-create-modal").modal();
                    $("#ajaax-create-resource").submit(function(e) {
                        e.preventDefault();
                        var $form = $(this);
                        var $actionUrl = $form.attr('action');
                        var $type = $form.attr('method');
                        var $data = $form.serialize();
                        var $success = function(response) {
                            $("#booking-create-modal").modal('hide');
                        };
                        var $complete = function(response) {
                            window.location.reload(true);
                        };
                        ajaxCall($actionUrl, {
                            type: $type,
                            data: $data,
                            success: $success,
                            complete: $complete
                        });
                    });
                    // console.log(info);
                },
                eventClick: function(event) {
                    alert("eventClick: ");
                    // opens events in a popup window
                    // window.open(event.url, 'gcalevent', 'width=700,height=600');
                    return false;
                },
                eventRender: function(info) {
                    var element = $(info.el);
                    if (info.event.extendedProps && info.event.extendedProps.description) {
                        if (element.hasClass('fc-day-grid-event')) {
                            element.data('content', info.event.extendedProps.description);
                            element.data('placement', 'top');
                            KTApp.initPopover(element);
                        } else if (element.hasClass('fc-time-grid-event')) {
                            element.data('content', info.event.extendedProps.description);
                            element.data('placement', 'top');
                            KTApp.initPopover(element);
                        } else if (element.find('.fc-list-item-title').lenght !== 0) {
                            element.data('content', info.event.extendedProps.description);
                            element.data('placement', 'top');
                            KTApp.initPopover(element);
                        }
                    }
                    if (info.allDay === 'true') {
                        info.allDay = true;
                    } else {
                        info.allDay = false;
                    }
                }

            };
            let CalendarElement = $('#calendar').get(0);
            var calendar = new FullCalendar.Calendar(CalendarElement, CalendarOptions);
            // var calendar = $("#calendar").fullCalendar(CalendarOptions);
            calendar.render();
            // $('.ajax').on('click', function() {
            //     let url = $(this).data('href');
            //     ajaxCall(url, {
            //         type: 'POST',
            //         data: {
            //             url: url,
            //             name: "subhash"
            //         },
            //         complete: function(response) {
            //             alert("complete: " + JSON.stringify(response));
            //             $('#id-resource-sub-resource').html(response.responseText);
            //             // $("#calendar").fullCalendar("refetchEvents");


            //         }
            //     });
            // });

            /**
             * END::READY
             */
        });
    </script>
@endPushOnce

