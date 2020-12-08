@extends('layouts.admin')

@section('content')
<div class="card card-margin">
        <div class="card-body">
                <div class="card-header">
                        <h5 class="card-title">Default</h5>
                </div>
                <div id='calendar-container'>
                        <div id='calendar-app' class="full-calendar"></div>
                </div>
        </div>
</div>

<div class="modal fade" id="event-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add / Edit Event</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        
      </div>
      <div class="modal-body">
        <form name="save-event" method="post">
          <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" id="title" class="form-control" />
          </div>
          <div class="form-group">
            <label>Event start</label>
            <input type="text" id="evtStart" name="evtStart" class="form-control col-xs-3" />
          </div>
          <div class="form-group">
            <label>Event end</label>
            <input type="text" id="evtEnd" name="evtEnd" class="form-control col-xs-3" />
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" onclick="saveEvent()">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection

@section('js')

    <script>

    function saveEvent()
    {
        //console.log('test');
        var evtStart = $('#evtStart').val();
        var evtEnd = $('#evtEnd').val();
        var title = $('#title').val();

        calendar.addEvent({
            title: title,
            start: evtStart,
            allDay: true
        });

        $('#event-modal').modal('hide');
    }

    var calendar;
    (function($) {
        'use strict';
        
            var todayDate = moment().startOf('day');
            var YM = todayDate.format('YYYY-MM');
            var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
            var TODAY = todayDate.format('YYYY-MM-DD');
            var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');

            var calendarEl = document.getElementById('calendar-app');
            calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: [ 'interaction', 'dayGrid', 'timeGrid' ],
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,dayGridWeek,timeGridDay'
                },
                height: 800,
                contentHeight: 780,
                aspectRatio: 3,  // see: https://fullcalendar.io/docs/aspectRatio
                nowIndicator: true,
                now: TODAY + 'T09:25:00', // just for demo
                views: {
                    dayGridMonth: { buttonText: 'month' },
                    dayGridWeek: { buttonText: 'week' },
                    timeGridDay: { buttonText: 'day' }
                },
                defaultView: 'dayGridMonth',
                defaultDate: TODAY,
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                navLinks: true,
                dateClick: function(info) {
                    //alert('Clicked on: ' + info.dateStr);
                    //alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
                    //alert('Current view: ' + info.view.type);
                    // change the day's background color just for fun
                    //info.dayEl.style.backgroundColor = 'red';
                    var start = info.dateStr;
                    var end = info.dateStr;
                    $('#event-modal').find('input[name=evtStart]').val(
                        start.format('YYYY-MM-DD HH:mm:ss')
                    );
                    $('#event-modal').find('input[name=evtEnd]').val(
                        end.format('YYYY-MM-DD HH:mm:ss')
                    );
                    
                    // show modal dialog
                    $('#event-modal').modal('show');
                },
                events: [
                    {
                        title: 'Whole Day',
                        start: YM + '-01',
                        description: 'Lorem ipsum dolor idunt ut sit incid',
                        className: "fc-event-primary",
                    },
                    {
                        title: 'Meeting',
                        start: YM + '-14T13:30:00',
                        description: 'Lorem ipsum dolor incid idunt ut labore',
                        end: YM + '-14',
                        className: "fc-event-base"
                    },
                    {
                        title: 'One Day Picnic',
                        start: YM + '-02',
                        description: 'Lorem ipsum dolor sit tempor incid',
                        end: YM + '-03',
                        className: "fc-event-success"
                    },
                    {
                        title: 'Stark Expo - Showcase',
                        start: YM + '-03',
                        description: 'Lorem ipsum dolor sit tempor inci',
                        end: YM + '-05',
                        className: "fc-event-warning"
                    },
                    {
                        title: 'Dinner',
                        start: YM + '-12',
                        description: 'Lorem ipsum dolor sit amet, conse ctetur',
                        end: YM + '-10',
                        className: "fc-event-base"
                    },
                    {
                        id: 999,
                        title: 'Repeating Event',
                        start: YM + '-09T16:00:00',
                        description: 'Lorem ipsum dolor sit ncididunt ut labore',
                        className: "fc-event-danger"
                    },
                    {
                        id: 1000,
                        title: 'Repeating Event',
                        description: 'Lorem ipsum dolor sit amet, labore',
                        start: YM + '-16T16:00:00',
                        className: "fc-event-danger"
                    },
                    {
                        title: 'Conference',
                        start: YESTERDAY,
                        end: YESTERDAY,
                        description: 'Lorem ipsum dolor eius mod tempor labore',
                        className: "fc-event-base"
                    },
                    {
                        title: 'Meeting',
                        start: TODAY + 'T10:30:00',
                        end: TODAY + 'T12:30:00',
                        description: 'Lorem ipsum dolor eiu idunt ut labore',
                        className: "fc-event-base"
                    },
                    {
                        title: 'Management Lunch',
                        start: TODAY + 'T12:00:00',
                        className: "fc-event-info",
                        description: 'Lorem ipsum dolor sit amet, ut labore',
                    },
                    {
                        title: 'Team Meeting',
                        start: TODAY + 'T14:30:00',
                        className: "fc-event-warning",
                        description: 'Lorem ipsum conse ctetur adipi scing'
                    },
                    {
                        title: 'Party..!!!',
                        start: TODAY + 'T17:30:00',
                        className: "fc-event-info",
                        description: 'Lorem ipsum dolor sit amet, conse ctetur'
                    },
                    {
                        title: 'Dinner',
                        start: TOMORROW + 'T05:00:00',
                        className: "fc-event-danger",
                        description: 'Lorem ipsum dolor sit ctetur adipi scing'
                    },
                    {
                        title: 'Launch Party',
                        start: TOMORROW + 'T07:00:00',
                        className: "fc-event-primary",
                        description: 'Lorem ipsum dolor sit amet, scing'
                    },
                    {
                        title: 'Go Google',
                        url: 'http://google.com/',
                        start: YM + '-28',
                        className: "fc-event-info",
                        description: 'Lorem ipsum dolor sit amet, labore'
                    }
                ],

                eventRender: function(info) {
                    var element = $(info.el);
                    if (info.event.extendedProps && info.event.extendedProps.description) {
                        if (element.hasClass('fc-day-grid-event')) {
                            element.data('content', info.event.extendedProps.description);
                            element.data('placement', 'top');
                        } else if (element.hasClass('fc-time-grid-event')) {
                            element.find('.fc-title').append('<div class="fc-description">' + info.event.extendedProps.description + '</div>');
                        } else if (element.find('.fc-list-item-title').lenght !== 0) {
                            element.find('.fc-list-item-title').append('<div class="fc-description">' + info.event.extendedProps.description + '</div>');
                        }
                    }
                }
            });

            calendar.render();
    })(jQuery);
    </script>
@endsection