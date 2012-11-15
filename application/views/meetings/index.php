<div id="calendar"></div>
<div id="book-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
        <h3 id="myModalLabel">Modal header</h3>
    </div>
    <div class="modal-body">
        <div class="addWrapper">
            <table>
                <tr class="largeField">
                    <td>
                        <label for="business_name">Name</label>
                        <span><input type="text" id="meeting_name"placeholder="Name"></span>
                    </td>
                    <td>
                        <label for="business_name">Optional Notes</label>
                        <span><input type="text" id="notes" placeholder="Optional Notes"></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="business_name">Date</label>
                        <span><input type="text" id="start_date" placeholder="00/00/00 00:00:00" class="datepicker-small"></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="business_name">Start</label>
                        <span>
                            <select id="start-hours" class="time-small">
                                <?php for($i = 9; $i < 19; $i++){ ?> 
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </span>
                        <span>
                            <select id="start-minutes" class="time-small">
                                <option value="00">00</option>
                                <option value="30">30</option>
                            </select>
                        </span>
                    </td>
                    <td>
                        <label for="business_name">End</label>
                        <span>
                            <select id="end-hours" class="time-small">
                                <?php for($i = 9; $i < 19; $i++){ ?> 
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </span>
                        <span>
                            <select id="end-minutes" class="time-small">
                                <option value="00">00</option>
                                <option value="30">30</option>
                            </select>
                        </span>
                    </td>
                    <!-- <td>
                        <label for="business_name">End Date</label>
                        <span><input type="text" id="end_date" placeholder="00/00/00 00:00:00" class="datepicker-small"></span>
                         <span>
                            <select class="time-small">
                                <?php for($i = 9; $i < 19; $i++){ ?> 
                                    <option value="<?php echo $i; ?>"><?= $i % 12 ? $i % 12 : 12 ?></option>
                                <?php } ?>
                            </select>
                        </span>
                        <span>
                            <select class="time-small">
                                <option value="00">00</option>
                                <option value="30">30</option>
                            </select>
                        </span>
                    </td> -->
                </tr>
                <tr>
                    <td colspan="2"> 
                        <label for="business_name">Employees Involved</label>
                        <input id="my-text-input" type="text" name="task[Workers]" class="selectAllWorkers" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2"> 
                        <label for="business_name">People Involved</label>
                        <input id="my-text-input" type="text" name="task[Workers]" class="selectContacts" />
                    </td>
                </tr>
                 <tr>
                    <td colspan="2"> 
                        <label for="business_name">Business</label>
                        <input id="my-text-input" type="text" name="task[Workers]" class="selectBusinesses" />
                    </td>
                </tr>
                <tr>
                     <td colspan="2">
                        <span><input type="checkbox" id="send_email" value="Y"><small style="margin-left:10px;">Send everyone an email now and a reminder at 9am the day of the meeting</small></span>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="modal-footer">
        <button data-dismiss="modal" type="submit" class="btn btn-primary">Add</button>
    </div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();

  	var calendar = $('#calendar').fullCalendar({
        // put your options and callbacks here
        weekends: false,
        dayClick: function(e) {
	        $('#calendar').fullCalendar('addEventSource', {title: "lesson", start: d});
	        //console.log(e);
	        console.log(new Date(y, m, 1));
	    },
	    selectable: true,
			selectHelper: true,
			select: function(start, end, allDay) {
                var startDateString = $.fullCalendar.formatDate(start, 'dd-MM-yyyy');
                var startDateStringTime = $.fullCalendar.formatDate(start, 'HH:mm');
                var endDateStringTime = $.fullCalendar.formatDate(end, 'HH:mm');
				$('#book-modal').modal({
                    backdrop:true,
                    keyboard: true
                });
                var st = startDateStringTime.split(":");
                var en = endDateStringTime.split(":");
                $('#start-hours').val(st[0]);
                $('#start-minutes').val(st[1]);
                $('#end-hours').val(en[0]);
                $('#end-minutes').val(en[1]);
                $('#start_date').val(startDateString);

                $(".modal-footer .btn-primary").bind("click", { start: start, end: end,allDay: allDay }, function(event){ // when you click in a create button inside dialog you should send as parameters start,end,etc
                    title = $("#meeting_name").val();
                    var s = $('#start_date').val() + ' ' + $('#start-hours').val() + ':' + $('#start-minutes').val() +':00';
                    var e = $('#start_date').val() + ' ' + $('#start-hours').val() + ':' + $('#start-minutes').val() +':00';
				if (title) {
					calendar.fullCalendar('renderEvent',
						{
							title: title,
							start: start,
							end: end,
							allDay: allDay
						},
						true // make the event "stick"
					);
					var startDateString = $.fullCalendar.formatDate(start, 'yyyy-MM-dd HH:mm:ss');
                    var endDateString = $.fullCalendar.formatDate(end, 'yyyy-MM-dd HH:mm:ss');


                    $.ajax({
                        type: 'POST',
                        url: 'meetings/add_meeting',
                        data: {
                            startDate: startDateString,
                            endDate: endDateString,
                            eventTitle: title,
                            employees: $('.selectAllWorkers').val(),
                            people: $('.selectContacts').val(),
                            business: $('.selectBusinesses').val(),
                            email: $('#send_email').val(),  
                            notes: $('#notes').val()    
                        },
                        dateType: 'json',
                        success: function (resp) {
                            calendar.fullCalendar('refetchEvents');
                        }
                    });
				}
				calendar.fullCalendar('unselect');
                });
			},
	    draggable: true, 
	    editable:true,
        events: "meetings/get_meetings",
        axisFormat: 'H:mm', //,'h(:mm)tt',
        timeFormat: {
            agenda: 'H:mm { - H:mm}' //h:mm{ - h:mm}'
        },
        minTime: 9,
        maxTime: 19, 
        eventDrop: function(event, delta) { 
	         console.log(event);
	         console.log(delta);
            $.ajax({
                type: 'POST',
                url: 'meetings/update_meeting',
                dateType: 'json',
                data: {
                	id: event._id,
                    startDate: $.fullCalendar.formatDate(event.start, 'yyyy-MM-dd HH:mm:ss'),
                    endDate: $.fullCalendar.formatDate(event.end, 'yyyy-MM-dd HH:mm:ss'),
                    eventTitle: event.title                            
                },
                success: function (resp) {
                    //calendar.fullCalendar('refetchEvents');
                }
            });
        }, 
        eventResize: function(event) {
        	console.log(event);
        	console.log('dsfsdfsdf');
        	$.ajax({
                type: 'POST',
                url: 'meetings/update_meeting',
                dateType: 'json',
                data: {
                	id: event._id,
                    startDate: $.fullCalendar.formatDate(event.start, 'yyyy-MM-dd HH:mm:ss'),
                    endDate: $.fullCalendar.formatDate(event.end, 'yyyy-MM-dd HH:mm:ss'),
                    eventTitle: event.title                            
                },
                success: function (resp) {
                    //calendar.fullCalendar('refetchEvents');
                }
            });
        },
        eventClick: function(calEvent, jsEvent, view) {

        	alert('Event: ' + calEvent.title);

   		},
        dragOpacity: {
        month: .2,
        ''   : .5
    },
	    header: {
			left: 'prev,next',
			center: 'title',
			right: 'month,agendaWeek',
            name: 'basicWeek'
		}
    })
	});
</script>