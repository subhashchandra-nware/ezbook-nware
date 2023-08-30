"use strict";

var KTCalendarExternalEvents = function () {

    var initExternalEvents = function () {
        // $('#kt_calendar_external_events .fc-draggable-handle').each(function() {
        //     // store data so the calendar knows to render an event upon drop
        //     $(this).data('event', {
        //         title: $.trim($(this).text()), // use the element's text as the event title
        //         stick: true, // maintain when user navigates (see docs on the renderEvent method)
        //         classNames: [$(this).data('color')],
        //         description: 'Lorem ipsum dolor eius mod tempor labore'
        //     });
        // });
    }

    var initCalendar = function () {
        var todayDate = moment().startOf('day');
        var YM = todayDate.format('YYYY-MM');
        var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
        var TODAY = todayDate.format('YYYY-MM-DD');
        var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');

        var calendarEl = document.getElementById('kt_calendar');
        var containerEl = document.getElementById('kt_calendar_external_events');

        var Draggable = FullCalendarInteraction.Draggable;

        new Draggable(containerEl, {
            itemSelector: '.fc-draggable-handle',
            eventData: function (eventEl) {
                return $(eventEl).data('event');
            }
        });

        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],

            isRTL: KTUtil.isRTL(),
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },

            height: 800,
            contentHeight: 780,
            aspectRatio: 0.3,  // see: https://fullcalendar.io/docs/aspectRatio

            nowIndicator: true,
            now: TODAY + 'T09:25:00', // just for demo
            slotDuration: '00:15:00',

            views: {
                dayGridMonth: { buttonText: 'month' },
                timeGridWeek: { buttonText: 'week' },
                timeGridDay: { buttonText: 'day' }
            },

            defaultView: 'timeGridWeek',
            // defaultView: 'dayGridMonth',
            defaultDate: TODAY,

            droppable: true, // this allows things to be dropped onto the calendar
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            navLinks: true,
            dateClick: function(info) {
                alert('dateClick');
                alert('Clicked on: ' + info.dateStr);
                alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
                alert('Current view: ' + info.view.type);
                // change the day's background color just for fun
                // info.dayEl.style.backgroundColor = 'red';
              },
            //   dayClick: function(info) {
            //     alert('dayClick');
            //     alert('Clicked on: ' + info.date.format());
            //     alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
            //     alert('Current view: ' + info.view.name);

            //     // change the day's background color just for fun
            //     $(this).css('background-color', '#eeeeee');
            //     info.dayEl.style.backgroundColor = 'red';

            //   },
              select: function(info) {
                alert('select');
                alert('selected ' + info.startStr + ' to ' + info.endStr);
              },
            events: [
                // {
                //     title: 'All Day Event',
                //     start: YM + '-01',
                //     description: 'Toto lorem ipsum dolor sit incid idunt ut',
                //     className: "fc-event-danger fc-event-solid-warning"
                // },
                // {
                //     title: 'Reporting',
                //     start: YM + '-14T13:30:00',
                //     description: 'Lorem ipsum dolor incid idunt ut labore',
                //     end: YM + '-14',
                //     className: "fc-event-success"
                // },
                // {
                //     title: 'Company Trip',
                //     start: YM + '-02',
                //     description: 'Lorem ipsum dolor sit tempor incid',
                //     end: YM + '-03',
                //     className: "fc-event-primary"
                // },
                // {
                //     title: 'ICT Expo 2017 - Product Release',
                //     start: YM + '-03',
                //     description: 'Lorem ipsum dolor sit tempor inci',
                //     end: YM + '-05',
                //     className: "fc-event-light fc-event-solid-primary"
                // },
                // {
                //     title: 'Dinner',
                //     start: YM + '-12',
                //     description: 'Lorem ipsum dolor sit amet, conse ctetur',
                //     end: YM + '-10'
                // },
                // {
                //     id: 999,
                //     title: 'Repeating Event',
                //     start: YM + '-09T16:00:00',
                //     description: 'Lorem ipsum dolor sit ncididunt ut labore',
                //     className: "fc-event-danger"
                // },
                // {
                //     id: 1000,
                //     title: 'Repeating Event',
                //     description: 'Lorem ipsum dolor sit amet, labore',
                //     start: YM + '-16T16:00:00'
                // },
                // {
                //     title: 'Conference',
                //     start: YESTERDAY,
                //     end: TOMORROW,
                //     description: 'Lorem ipsum dolor eius mod tempor labore',
                //     className: "fc-event-primary"
                // },
                // {
                //     title: 'Meeting',
                //     start: TODAY + 'T10:30:00',
                //     end: TODAY + 'T12:30:00',
                //     description: 'Lorem ipsum dolor eiu idunt ut labore'
                // },
                // {
                //     title: 'Lunch',
                //     start: TODAY + 'T12:00:00',
                //     className: "fc-event-info",
                //     description: 'Lorem ipsum dolor sit amet, ut labore'
                // },
                // {
                //     title: 'Meeting',
                //     start: TODAY + 'T14:30:00',
                //     className: "fc-event-warning",
                //     description: 'Lorem ipsum conse ctetur adipi scing'
                // },
                // {
                //     title: 'Happy Hour',
                //     start: TODAY + 'T17:30:00',
                //     className: "fc-event-info",
                //     description: 'Lorem ipsum dolor sit amet, conse ctetur'
                // },
                // {
                //     title: 'Dinner',
                //     start: TOMORROW + 'T05:00:00',
                //     className: "fc-event-solid-danger fc-event-light",
                //     description: 'Lorem ipsum dolor sit ctetur adipi scing'
                // },
                {
                    title: 'Birthday Party',
                    start: TOMORROW + 'T07:00:00',
                    className: "fc-event-primary",
                    description: 'Lorem ipsum dolor sit amet, scing'
                },
                {
                    title: 'Click for Google',
                    url: 'http://google.com/',
                    start: YM + '-28',
                    className: "fc-event-solid-info fc-event-light",
                    description: 'Lorem ipsum dolor sit amet, labore'
                }
            ],

            drop: function (info) {
                alert("drop");
                if (!confirm("Are you sure about this change?")) {
                    info.revert();
                }
                // is the "remove after drop" checkbox checked?
                if ($('#kt_calendar_external_events_remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(info.draggedEl).remove();
                }
            },
            eventDrop: function (info) {
                alert("eventDrop");

                if (!confirm("Are you sure about this change?")) {
                    info.revert();
                }
            },
            eventClick: function (info) {
                alert("eventClick");

                if (!confirm("Are you sure about this change?")) {
                    info.event.remove();
                }
                // opens events in a popup window
                // window.open(event.url, 'gcalevent', 'width=700,height=600');
                // return false;
            },

            eventRender: function (info) {
                var element = $(info.el);

                if (info.event.extendedProps && info.event.extendedProps.description) {
                    if (element.hasClass('fc-day-grid-event')) {
                        element.data('content', info.event.extendedProps.description);
                        element.data('placement', 'top');
                        KTApp.initPopover(element);
                    } else if (element.hasClass('fc-time-grid-event')) {
                        element.find('.fc-title').append('<div class="fc-description">' + info.event.extendedProps.description + '</div>');
                    } else if (element.find('.fc-list-item-title').lenght !== 0) {
                        element.find('.fc-list-item-title').append('<div class="fc-description">' + info.event.extendedProps.description + '</div>');
                    }
                }
            }
        });

        calendar.render();
    }

    return {
        //main function to initiate the module
        init: function () {
            initExternalEvents();
            initCalendar();
        }
    };
}();

jQuery(document).ready(function () {
    KTCalendarExternalEvents.init();
});
