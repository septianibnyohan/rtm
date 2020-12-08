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

<div class="modal fade" id="addeventmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Add Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="container-fluid">

                    <form id="createEvent" class="form-horizontal">
                    @csrf
                    <div class="row">

                        <div class="col-md-6">

                            <!-- <div id="title-group" class="form-group">
                                <label class="control-label" for="title">Title</label>
                                <input type="text" class="form-control" name="title">
                            </div> -->

                            <div class="form-group">
                                <label for="exampleOption">Type</label>
                                <select name="type" class="form-control" id="type">
                                        <option value="1">Request</option>
                                        <option value="2">Holiday</option>
                                </select>
                            </div>

                            <div id="startdate-group" class="form-group">
                                <label class="control-label" for="startDate">Start Date</label>
                                <input type="text" class="form-control datetimepicker" id="startDate" name="startDate">
                                <!-- errors will go here -->
                            </div>

                            <div id="description" class="form-group">
                                <label for="exampleOption">Description</label>
                                <select name="description" class="form-control" id="exampleOption">
                                        <option value="LEAVE">Leave</option>
                                        <option value="SICK">Sick</option>
                                        <option value="WFH">Work From Home</option>
                                        <option value="TRAINING">Training</option>
                                </select>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div id="title-group" class="form-group">
                                <label class="control-label" for="title">Title</label>
                                <input type="text" class="form-control" name="title">
                            </div>

                            <div id="user_list" class="form-group">
                                <label for="exampleOption">User</label>
                                <select name="user" class="form-control" id="type">
                                @foreach($user_list as $user) 
                                    <option value="{{ $user}}">{{ $user}}</option>
                                @endforeach
                                </select>
                            </div>

                            <div id="enddate-group" class="form-group">
                                <label class="control-label" for="endDate">End Date</label>
                                <input type="text" class="form-control datetimepicker" id="endDate" name="endDate">
                                <!-- errors will go here -->
                            </div>


                            <!-- <div id="color-group" class="form-group">
                                <label class="control-label" for="color">Colour</label>
                                <input type="text" class="form-control color-picker" name="color" value="#6453e9">
                            </div>

                            <div id="textcolor-group" class="form-group">
                                <label class="control-label" for="textcolor">Text Colour</label>
                                <input type="text" class="form-control color-picker" name="text_color" value="#ffffff">
                            </div> -->

                            <input type="hidden" name="color" value="#6453e9">
                            <input type="hidden" id="text_color" name="editEventId" value="#ffffff">
                            <!-- <div id="isholiday-group" class="form-group">
                                <label class="control-label" for="textcolor">Is Holiday?</label><br>
                                <div class="string-check string-check-bordered-primary mb-2">
                                        <input type="checkbox" class="form-control form-check-input" name="is_holiday" id="isholiday">
                                        <label class="string-check-label" for="formCheckInput2">
                                                <span class="ml-2">Yes</span>
                                        </label>
                                </div>
                            </div> -->
                        </div>



                    </div>

                    

                </div>

            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>

            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="editeventmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Update Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="container-fluid">

                    <form id="editEvent" class="form-horizontal">
                    <input type="hidden" id="editEventId" name="editEventId" value="">

                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="exampleOption">Type</label>
                                <select name="type" class="form-control" id="edit_type">
                                        <option value="1">Request</option>
                                        <option value="2">Holiday</option>
                                </select>
                            </div>

                            <div id="edit-startdate-group" class="form-group">
                                <label class="control-label" for="editStartDate">Start Date</label>
                                <input type="text" class="form-control datetimepicker" id="editStartDate" name="editStartDate">
                                <!-- errors will go here -->
                            </div>

                            <div class="form-group" id="edit-description-group">
                                <label for="exampleOption">Description</label>
                                <select name="description" class="form-control" id="edit_description">
                                        <option value="LEAVE">Leave</option>
                                        <option value="SICK">Sick</option>
                                        <option value="WFH">Work From Home</option>
                                        <option value="TRAINING">Training</option>
                                </select>
                            </div>

                            

                            

                        </div>

                        <div class="col-md-6">

                            <div id="edit-title-group" class="form-group">
                                <label class="control-label" for="title">Title</label>
                                <input type="text" id="edit-title" class="form-control" name="title">
                            </div>

                            <div id="edit-user_group" class="form-group">
                                <label for="exampleOption">User</label>
                                <select name="user" class="form-control" id="edit_user">
                                @foreach($user_list as $user) 
                                    <option value="{{ $user}}">{{ $user}}</option>
                                @endforeach
                                </select>
                            </div>

                            <div id="edit-enddate-group" class="form-group">
                                <label class="control-label" for="editEndDate">End Date</label>
                                <input type="text" class="form-control datetimepicker" id="editEndDate" name="editEndDate">
                                <!-- errors will go here -->
                            </div>

                            <!-- <div id="edit-color-group" class="form-group">
                                <label class="control-label" for="editColor">Colour</label>
                                <input type="text" class="form-control color-picker" id="editColor" name="editColor" value="#6453e9">
                            </div>

                            <div id="edit-textcolor-group" class="form-group">
                                <label class="control-label" for="editTextColor">Text Colour</label>
                                <input type="text" class="form-control color-picker" id="editTextColor" name="editTextColor" value="#ffffff">
                            </div> -->

                            <input type="hidden" id="editColor" name="editColor value="#6453e9">
                            <input type="hidden" id="editTextColor" name="editTextColor" value="#ffffff">
                        </div>

                    </div>

                </div>

            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
              <button type="button" class="btn btn-danger" id="deleteEvent" data-id>Delete</button>
            </div>

            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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
    var url ='/';
    var id;

    (function($) {
        'use strict';

        $('body').on('click', '.datetimepicker', function() {
            $(this).not('.hasDateTimePicker').datepicker({
                controlType: 'select',
                changeMonth: true,
                changeYear: true,
                dateFormat: "yy-mm-dd",
                timeFormat: 'HH:mm:ss',
                yearRange: "1900:+10",
                showOn:'focus',
                firstDay: 1
            }).focus();
        });

        $('body').on('click', '#deleteEvent', function() {
            if(confirm("Are you sure you want to remove it?")) {
                $.ajax({
                    url:url+"cal_delete",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    type:"POST",
                    data:{'id':id},
                }); 

                //close model
                $('#editeventmodal').modal('hide');

                //refresh calendar
                calendar.refetchEvents();         
            }
        });

        $( "#type" ).change(function() {
            if ($(this).val() == 1)
            {
                //console.log("satu");
                $('#title-group').hide();
                $('#user_list').show();
                $('#description').show();
            }
            if ($(this).val() == 2)
            {
                //console.log("dua");
                $('#title-group').show();
                $('#user_list').hide();
                $('#description').hide();
            }
        });

        $( "#edit_type" ).change(function() {
            if ($(this).val() == 1)
            {
                $('#edit-description-group').show();
                $('#edit-user_group').show();
                $('#edit-title-group').hide();
            }
            if ($(this).val() == 2)
            {
                $('#edit-description-group').hide();
                $('#edit-user_group').hide();
                $('#edit-title-group').show();
            }
        });

        $(".color-picker").colorpicker();
        
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
                var start = info.dateStr;
                var end = info.dateStr;
                $('#addeventmodal').find('input[name=startDate]').val(
                    start.format('YYYY-MM-DD HH:mm:ss')
                );
                $('#addeventmodal').find('input[name=endDate]').val(
                    end.format('YYYY-MM-DD HH:mm:ss')
                );
                
                $('#addeventmodal').modal('show');

                $('#type').val(1);
                $('#title-group').hide();
                $('#user_list').show();
                $('#description').show();
            },
            eventClick: function(arg) {
                id = arg.event.id;
                
                $('#editEventId').val(id);
                $('#deleteEvent').attr('data-id', id); 

                $.ajax({
                    url:"/cal_getevent",
                    headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    type:"POST",
                    dataType: 'json',
                    data:{id:id},
                    success: function(data) {
                            $('#edit_description').val(data.title);
                            $('#editStartDate').val(data.start);
                            $('#editEndDate').val(data.end);
                            $('#editColor').val(data.color);
                            $('#editTextColor').val(data.textColor);
                            $('#edit_type').val(data.event_type);
                            $('#edit_user').val(data.user);
                            $('#edit-title').val(data.title);

                            if (data.event_type == 1)
                            {
                                $('#edit-description-group').show();
                                $('#edit-user_group').show();
                                $('#edit-title-group').hide();
                            }
                            else if (data.event_type == 2)
                            {
                                $('#edit-description-group').hide();
                                $('#edit-user_group').hide();
                                $('#edit-title-group').show();
                            }

                            $('#editeventmodal').modal();

                            if (data.classname == "red-back"){
                                $('#edit_isholiday').prop("checked",true);
                            } else{
                                $('#edit_isholiday').prop("checked",false);
                            }
                        }
                });
                
                calendar.refetchEvents();
            },
            eventDrop: function(arg) {
                //console.log(arg);
                var start = arg.event.start.toDateString()+' '+arg.event.start.getHours()+':'+arg.event.start.getMinutes()+':'+arg.event.start.getSeconds();
                if (arg.event.end == null) {
                    end = start;
                } else {
                    var end = arg.event.end.toDateString()+' '+arg.event.end.getHours()+':'+arg.event.end.getMinutes()+':'+arg.event.end.getSeconds();
                }

                var type = 1;

                if (arg.event.classNames[0] == "red-back")
                {
                    type = 2;
                }

                $.ajax({
                    url:url+"cal_update",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    type:"POST",
                    data:{id:arg.event.id, start:start, end:end, type:type},
                });

                calendar.render();
            },
            eventResize: function(arg) {

                console.log("event resize");
                var start = arg.event.start.toDateString()+' '+arg.event.start.getHours()+':'+arg.event.start.getMinutes()+':'+arg.event.start.getSeconds();
                var end = arg.event.end.toDateString()+' '+arg.event.end.getHours()+':'+arg.event.end.getMinutes()+':'+arg.event.end.getSeconds();

                $.ajax({
                    url:url+"cal_update",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    type:"POST",
                    data:{id:arg.event.id, start:start, end:end},
                });
            },
            events: '/cal_load',
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

                //console.log(info.event);
                if (info.event.classNames[0] == "red-back")
                {
                    var eventStart = moment(info.event.start);
                    $("td[data-date='"+eventStart.format('YYYY-MM-DD')+"'].fc-day").addClass('back-red');
                }
                else
                {
                    var eventStart = moment(info.event.start);
                    $("td[data-date='"+eventStart.format('YYYY-MM-DD')+"'].fc-day").removeClass('back-red');
                }
                
            }
        });

        calendar.render();

        $('#createEvent').submit(function(event) {

            // stop the form refreshing the page
            event.preventDefault();

            $('.form-group').removeClass('has-error'); // remove the error class
            $('.help-block').remove(); // remove the error text

            // process the form
            $.ajax({
                type        : "POST",
                url         : '/cal_insert',
                data        : $(this).serialize(),
                dataType    : 'json',
                encode      : true
            }).done(function(data) {

                // insert worked
                if (data.success) {
                    
                    //remove any form data
                    $('#createEvent').trigger("reset");

                    //close model
                    $('#addeventmodal').modal('hide');

                    //refresh calendar
                    calendar.refetchEvents();

                } else {

                    //if error exists update html
                    if (data.errors.date) {
                        $('#date-group').addClass('has-error');
                        $('#date-group').append('<div class="help-block">' + data.errors.date + '</div>');
                    }

                    if (data.errors.title) {
                        $('#title-group').addClass('has-error');
                        $('#title-group').append('<div class="help-block">' + data.errors.title + '</div>');
                    }

                }

            });
        });

        $('#editEvent').submit(function(event) {

            // stop the form refreshing the page
            event.preventDefault();

            $('.form-group').removeClass('has-error'); // remove the error class
            $('.help-block').remove(); // remove the error text

            //form data
            var id = $('#editEventId').val();
            var type =  $('#edit_type').val();
            var title = $('#edit_type').val() == 1 ? $('#edit_user').val() + " : " + $('#edit_description').val() : $('#edit-title').val();
            var start = $('#editStartDate').val();
            var end = $('#editEndDate').val();
            var color = $('#editColor').val();
            var textColor = $('#editTextColor').val();
            var isholiday = $('#edit_isholiday').prop('checked') ? "on" : null;
            // process the form
            $.ajax({
                type        : "POST",
                url         : url+'cal_update',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data        : {
                    id:id, 
                    title:title, 
                    start:start,
                    end:end,
                    color:color,
                    text_color:textColor,
                    is_holiday:isholiday,
                    type: type
                },
                dataType    : 'json',
                encode      : true
            }).done(function(data) {

                // insert worked
                if (data.success) {
                    //remove any form data
                    $('#editEvent').trigger("reset");

                    //close model
                    $('#editeventmodal').modal('hide');

                    //refresh calendar
                    calendar.refetchEvents();

                    //setTimeout(() => { console.log("World!"); }, 2000);
                    calendar.render();
                } else {

                    //if error exists update html
                    if (data.errors.date) {
                        $('#date-group').addClass('has-error');
                        $('#date-group').append('<div class="help-block">' + data.errors.date + '</div>');
                    }

                    if (data.errors.title) {
                        $('#title-group').addClass('has-error');
                        $('#title-group').append('<div class="help-block">' + data.errors.title + '</div>');
                    }

                }

            });
            
        });
    })(jQuery);
    </script>
@endsection