"use strict";
/**
 * @see https://fullcalendar.io/
 * @returns
 * @author
 */
var NWare = function () {
    var defaultAjaxOption = {
        // url: url,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        data: { _token: "{{ csrf_token() }}" },
        type: "GET",
        error: function (response) {
            // alert("error: " + JSON.stringify(response));
            console.log(response);
        },
        // beforeSend: function (response) {alert("beforeSend: " + JSON.stringify(response));},
        // dataFilter: function (response) {alert("dataFilter: " + JSON.stringify(response));return response;},
        // success: function (response) {alert("success: " + JSON.stringify(response));},
        // complete: function (response) {alert("complete: " + JSON.stringify(response));}
    };
    var defaultFullCalendarOption = {
        plugins: ['interaction', 'dayGrid', 'timeGrid', 'list', 'googleCalendar'],
        defaultView: 'timeGridWeek',
        navLinks: true,
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        selectable: true,
        // selectHelper: true,
        // displayEventTime: false,
        // slotDuration: "{{ $slotDuration }}", // Duration, default: '00:30:00' (30 minutes)
        // events: "{{ route('getbookedresource', ['resource' => 104]) }}",
        // events: {!! json_encode($events) !!},
        select: function (info) {
            var s = moment(info.start).format("YYYY-MM-DD HH:mm:ss");
            var e = moment(info.end).format("YYYY-MM-DD HH:mm:ss");
            var sr = 0
            // alert($('#id-sub_resource').length);
            if ($('#id-sub_resource').length) {
                sr = $('#id-sub_resource').val();
                // alert(sr);
            }
            $("#id-FromTime").val(s);
            $("#id-ToTime").val(e);
            $("#id-SubID").val(sr);
            $("#booking-create-modal").modal();
            $("#ajaax-create-resource").submit(function (e) {
                e.preventDefault();
                var $form = $(this);
                var $actionUrl = $form.attr('action');
                var $type = $form.attr('method');
                var $data = $form.serialize();
                var $success = function (response) {
                    $("#booking-create-modal").modal('hide');
                };
                var $complete = function (response) {
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
        eventClick: function (event) {
            alert("eventClick: ");
            // opens events in a popup window
            // window.open(event.url, 'gcalevent', 'width=700,height=600');
            return false;
        },
        eventRender: function (info) {
            var element = $(info.el);
            element.attr('title', info.event.extendedProps.description);
            if (info.event.extendedProps && info.event.extendedProps.description) {
                if (element.hasClass('fc-day-grid-event')) {
                    element.data('content', info.event.extendedProps.description);
                    element.data('placement', 'top');
                    // KTApp.initPopover(element);
                } else if (element.hasClass('fc-time-grid-event')) {
                    element.data('content', info.event.extendedProps.description);
                    element.data('placement', 'top');
                    // KTApp.initPopover(element);
                } else if (element.find('.fc-list-item-title').lenght !== 0) {
                    element.data('content', info.event.extendedProps.description);
                    element.data('placement', 'top');
                    // KTApp.initPopover(element);
                }
            }
            if (info.allDay === 'true') {
                info.allDay = true;
            } else {
                info.allDay = false;
            }
        }
    };
    return {
        Options: function (options = {}) {
            return this.defaultAjaxOption
        },
        Ajax: function (url = '', options = {}) {
            let ajaxSettings = { ...defaultAjaxOption, ...options };
            $.ajax(ajaxSettings);
        },
        Calendar: function (ElementId, options = {}) {
            let calendarSetting = { ...defaultFullCalendarOption, ...options };
            var calendar = $("#" + ElementId).fullCalendar(calendarSetting);
            // let CalendarElement = $('#'+ElementId).get(0);
            // let CalendarElement = document.getElementById(ElementId);
            // var calendar = new FullCalendar.Calendar(CalendarElement, calendarSetting);
            // calendar.render();
            return calendar;
        }
    };
}();

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

                    // defaultView: 'dayGridMonth',
                    defaultView: 'timeGridWeek',

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
                    // selectOverlap: function(event) {
                    //    return event.rendering === 'background';
                    // },
                    select: function(info) {
                        console.log( info );
                        // alert('selected ' + info.startStr + ' to ' + info.endStr);
                        // alert( info.end.toString() );
                        // alert('select ' + JSON.stringify(info.view));
                    },
                    // dateClick: function(info) {
                    //     alert('Clicked on: ' + info.dateStr);
                    //     alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
                    //     alert('Current view: ' + info.view.type);
                    //     // change the day's background color just for fun
                    //     // info.dayEl.style.backgroundColor = 'red';
                    // },
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

                // cal.render();
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

                */




// var ajaxCall = function (url = '', options = {}) {
//     let defaultObj = {
//         url: url,
//         type: "GET",
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
//         },
//         data: { _token: "{{ csrf_token() }}" },
//         beforeSend: function (response) {
//             // alert("beforeSend: " + JSON.stringify(response));
//         },
//         error: function (response) {
//             // alert("error: " + JSON.stringify(response));
//             // $('#id-resource-sub-resource').html(response);
//         },
//         dataFilter: function (response) {
//             // alert("dataFilter: " + JSON.stringify(response));
//             return response;
//         },
//         success: function (response) {
//             // alert("success: " + JSON.stringify(response));
//             // console.log(response);
//             // $('#id-resource-sub-resource').html(response);
//         },
//         complete: function (response) {
//             // alert("complete: " + JSON.stringify(response));
//             // $('#id-resource-sub-resource').html(response.responseText);
//             // calendar.render();

//         }
//     };
//     let settings = {
//         ...defaultObj,
//         ...options
//     };
//     $.ajax(settings);
// }

// $(document).ready(function () {
//     $('.location-select2').select2();

//     $('.ajax').on('click', function () {
//         let url = $(this).data('href');
//         ajaxCall(url, {
//             type: 'POST',
//             data: { url: url, name: "subhash" }
//         });
//     });



// });






    // $(document).ready(function () {
    //     let CalendarOptions = {
    //         plugins: ['interaction', 'dayGrid', 'timeGrid', 'list', 'googleCalendar'],
    //         header: {
    //             left: 'prev,next today',
    //             center: 'title',
    //             right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
    //         },
    //         navLinks: true,
    //         editable: true,
    //         events: "{{ route('getresource') }}",
    //         // displayEventTime: false,
    //         selectable: true,
    //         selectHelper: true,
    //         eventRender: function (event, element, view) {
    //             if (event.allDay === 'true') {
    //                 event.allDay = true;
    //             } else {
    //                 event.allDay = false;
    //             }
    //         }
    //     };
    //     let CalendarElement = $('#calendar').get(0);
    //     // var calendar = new FullCalendar.Calendar(CalendarElement, CalendarOptions);
    //     var calendar = $("#calendar").fullCalendar(CalendarOptions);
    //     // calendar.render();


    //     /**
    //      * END::READY
    //      */
    // });
