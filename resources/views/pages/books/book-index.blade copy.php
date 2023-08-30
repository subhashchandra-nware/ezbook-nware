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
                            $LocationOptions = ['0' => 'Select Location'] + array_combine(array_column($ResourceLocation, 'id'), array_column($ResourceLocation, 'Name'));
                        @endphp
                        <ul class="menu-nav pb-0">
                            <li class="menu-section">
                                <h4 class="menu-text">Location</h4>
                                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                            </li>
                            <li>
                                <x-forms.form class="form p-5">
                                    <div class="form-group">
                                        <x-forms.select name="resourceLocation" :options="$LocationOptions"
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

                        <x-layouts.menu-vertical name="Choose A Resource" :menus="$ResourceTypes" :childkey="['resource','sub_resource']" />

                        <!--end::Menu Nav-->
                    </div>
                </div>
                <!--Side Col Sidebar End-->

                <div class="col-md-10">
                    <!--begin::Card-->
                    <div class="card card-custom">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">Resource Name</h3>
                            </div>
                            <div class="card-toolbar">
                                {{-- <a href="#" class="btn btn-primary font-weight-bold">
                                    <i class="ki ki-plus icon-md mr-2"></i>Add Event</a> --}}

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
                        </div>
                        <div class="card-body">
                            <div id="test_calendar"></div>
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
    {{-- <script src="{{ asset('js/pages/features/calendar/google.js') }}"></script> --}}
    <script src="{{ asset('js/pages/features/calendar/external-events.js') }}"></script>
    <!--end::Page Scripts-->

    <script>
        $(document).ready(function() {
            $('.location-select2').select2();

/*

            // var mergedObj = Object.assign(obj1,obj2,obj3)
            // or using the Spread operator (...)
            // var mergedObj = {...obj1,...obj2,...obj3};
            // alert(JSON.stringify(mergedObj));

            let CalendarOptions = {
                plugins: ['interaction', 'dayGrid', 'timeGrid', 'list', 'googleCalendar'],

                isRTL: KTUtil.isRTL(),
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                resources: [{
                        id: 'a',
                        title: 'Room A'
                    },
                    {
                        id: 'b',
                        title: 'Room B'
                    }
                ],

                events: [{ // this object will be "parsed" into an Event Object
                        title: 'The Title1', // a property!
                        start: '2023-08-23', // a property!
                        end: '2023-08-25' // a property! ** see important note below about 'end' **
                    },

                    { // this object will be "parsed" into an Event Object
                        title: 'The Title2', // a property!
                        start: '2023-08-23 11:55:44', // a property!
                        end: '2023-08-25 12:12:12' // a property! ** see important note below about 'end' **
                    },
                    {
                        id: 12,
                        title: 'BCH237',
                        start: '2023-08-25T10:30:00',
                        end: '2023-08-27T11:30:00',
                        extendedProps: {
                            department: 'BioChemistry'
                        },
                        description: 'Lecture'
                    }
                ],

                // displayEventTime: false, // don't show the time column in list view

                height: 800,
                contentHeight: 780,
                aspectRatio: 3, // see: https://fullcalendar.io/docs/aspectRatio

                views: {
                    dayGridMonth: {
                        buttonText: 'month'
                    },
                    timeGridWeek: {
                        buttonText: 'week'
                    },
                    timeGridDay: {
                        buttonText: 'day'
                    }
                },

                defaultView: 'dayGridMonth',
                // defaultView: 'timeGridWeek',

                editable: true,
                eventLimit: true, // allow "more" link when too many events
                navLinks: true,

                // THIS KEY WON'T WORK IN PRODUCTION!!!
                // To make your own Google API key, follow the directions here:
                // http://fullcalendar.io/docs/google_calendar/
                googleCalendarApiKey: 'AIzaSyDcnW6WejpTOCffshGDDb4neIrXVUA1EAE',

                // US Holidays
                // events: 'en.usa#holiday@group.v.calendar.google.com',

                eventClick: function(event) {
                    // opens events in a popup window
                    window.open(event.url, 'gcalevent', 'width=700,height=600');
                    return false;
                },

                loading: function(bool) {
                    return;


                    // KTApp.block(portlet.getSelf(), {
                    //     type: 'loader',
                    //     state: 'success',
                    //     message: 'Please wait...'
                    // });

                },

                eventRender: function(info) {
                    var element = $(info.el);

                    if (info.event.extendedProps && info.event.extendedProps.description) {
                        if (element.hasClass('fc-day-grid-event')) {
                            element.data('content', info.event.extendedProps.description);
                            element.data('placement', 'top');
                            KTApp.initPopover(element);
                        } else if (element.hasClass('fc-time-grid-event')) {
                            element.find('.fc-title').append('<div class="fc-description">' + info.event
                                .extendedProps.description + '</div>');
                        } else if (element.find('.fc-list-item-title').lenght !== 0) {
                            element.find('.fc-list-item-title').append('<div class="fc-description">' +
                                info.event.extendedProps.description + '</div>');
                        }
                    }
                },
                selectable: true,
                dateClick: function(info) {
                    alert('Clicked on: ' + info.dateStr);
                    alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
                    alert('Current view: ' + info.view.type);
                    // change the day's background color just for fun
                    info.dayEl.style.backgroundColor = 'red';
                },
                eventDrop: function(info) {
                    alert(info.event.title + " was dropped on " + info.event.start.toISOString());

                    if (!confirm("Are you sure about this change?")) {
                        info.revert();
                    }
                }

            };
            let CalendarElement = $('#test_calendar').get(0);
            // let CalendarElement = jQuery('#test_calendar',document);
            // let CalendarElement = document.getElementById('test_calendar');
            // https: //fullcalendar.io/
                var cal = new FullCalendar.Calendar(CalendarElement, CalendarOptions);
            // var cal = new FullCalendar.Calendar(CalendarElement, {'plugins': ['interaction', 'dayGrid', 'timeGrid', 'list', 'googleCalendar']});
            // cal.getOption('plugins');
            // cal.setOption('plugins', ['interaction', 'dayGrid', 'timeGrid', 'list', 'googleCalendar']);
            cal.addEventSource([{
                    id: '1',
                    title: 'Meeting11',
                    start: '2023-08-03',
                    color: 'red'
                }, {
                    id: '2',
                    title: 'Meeting222',
                    start: '2023-08-04',
                    color: 'red'
                },
                {
                    title: 'Meeting222',
                    description: 'Lecture',

                    startTime: '10:00', // a start time (10am in this example)
                    endTime: '18:00', // an end time (6pm in this example)

                    daysOfWeek: [1, 2, 3, 4]
                    // days of week. an array of zero-based day of week integers (0=Sunday)
                    // (Monday-Thursday in this example)
                }, {
                    id: '3',
                    title: 'Meeting333',
                    start: '2023-08-05',
                    color: 'red'
                }
            ]);
            cal.render();
            */

        });
    </script>


@endPushOnce
