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
                            // dd($data);
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

                                        <x-forms.select selected="{{ request()->segment(3) }}" onchange="let url = '{!! route('book.location', ':id') !!}';url = url.replace(':id', $(this).val()); window.location.href=url" name="resourceLocation" :options="$LocationOptions"
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

                        {{-- <div class="card-header" id="ajax-header">
                            <div class="card-title">
                                <h3 class="card-label">Resource Name</h3>
                            </div>
                            <pre id="ajax-test"></pre>
                            <div class="card-toolbar">
                                <form class="form p-5">
                                    <div class="form-group mb-0">
                                        <select class="form-control form-control-md " id="show">
                                            <option>Select Option</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div> --}}

                        <div class="card-body">
                            <div id="calendar"></div>
                            <div id="kt_calendar"></div>
                        </div>
                    </div>
                    <!--end::Card-->

                </div>
            </div>
        </div>
        <!--end::Container-->
    </x-layouts.page>





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
                events: "{{ route('getbookedresource', ['resource' => 104]) }}",
                // displayEventTime: false,
                selectable: true,
                selectHelper: true,
                select: function() {
                    swal.fire("Select Resource for booking.");
                    // $("#myModal").modal();
                    // return false;


                },
                eventRender: function(event, element, view) {
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
                    if (event.allDay === 'true') {
                        event.allDay = true;
                    } else {
                        event.allDay = false;
                    }
                }
            };
            let CalendarElement = $('#calendar').get(0);
            var calendar = new FullCalendar.Calendar(CalendarElement, CalendarOptions);
            // var calendar = $("#calendar").fullCalendar(CalendarOptions);
            calendar.render();
            $('.ajax').on('click', function() {
                let url = $(this).data('href');
                ajaxCall(url, {
                    type: 'POST',
                    data: {
                        url: url,
                        name: "subhash"
                    },
                    complete: function (response) {
            alert("complete: " + JSON.stringify(response));
            $('#id-resource-sub-resource').html(response.responseText);
            // $("#calendar").fullCalendar("refetchEvents");


        }
                });
            });

            /**
             * END::READY
             */
        });
    </script>
@endPushOnce
