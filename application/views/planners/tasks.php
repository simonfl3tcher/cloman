<div id="calendar"></div>
<div id="look-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
        <h3 id="myModalLabel">Task Details</h3>
    </div>
    <div class="modal-body">
    </div>
    <div class="modal-footer">
        <button data-dismiss="modal" type="submit" class="btn btn-primary complete">Complete</button>
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
                var endDateString = $.fullCalendar.formatDate(end, 'dd-MM-yyyy');
                var endDateStringTime = $.fullCalendar.formatDate(end, 'HH:mm');
				$('#task-modal').modal({
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
                $('#internal_date').val(endDateString);
                $('#external_date').val(endDateString);

                $(".modal-footer .btn-primary").bind("click", { start: start, end: end,allDay: allDay }, function(event){
                console.log('sfdsfd'); // when you click in a create button inside dialog you should send as parameters start,end,etc
                    title = $("#task_name").val();
                    var s = $('#start_date').val() + ' ' + $('#start-hours').val() + ':' + $('#start-minutes').val() +':00';
                    var e = $('#start_date').val() + ' ' + $('#end-hours').val() + ':' + $('#end-minutes').val() +':00';
				if (title) {
					calendar.fullCalendar('renderEvent',
						{
							title: title,
							start: start,
							end: end,
							allDay: allDay
						},
						false // make the event "stick"
					);
				}
				calendar.fullCalendar('unselect');
                });
			},
	    draggable: true, 
	    editable:true,
        events: "/tasks/get_tasks_for_calender",
        eventColor: '#FF6D00',
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
                url: '/tasks/update_task_date',
                dateType: 'json',
                data: {
                	id: event._id,
                    startDate: $.fullCalendar.formatDate(event.start, 'yyyy-MM-dd HH:mm:ss'),
                    endDate: $.fullCalendar.formatDate(event.end, 'yyyy-MM-dd HH:mm:ss'),
                    eventTitle: event.title                            
                },
                success: function (resp) {
                    calendar.fullCalendar('refetchEvents');
                }
            });
        }, 
        eventResize: function(event) {
        	$.ajax({
                type: 'POST',
                url: '/tasks/update_task_date',
                dateType: 'json',
                data: {
                	id: event._id,
                    startDate: $.fullCalendar.formatDate(event.start, 'yyyy-MM-dd HH:mm:ss'),
                    endDate: $.fullCalendar.formatDate(event.end, 'yyyy-MM-dd HH:mm:ss'),
                    eventTitle: event.title                            
                },
                success: function (resp) {
                    calendar.fullCalendar('refetchEvents');
                }
            });
        },
        eventClick: function(calEvent, jsEvent, view) {
            $('#look-modal').modal({
                backdrop:true,
                keyboard: true
            });

            $('.complete', $('#look-modal')).bind('click', function(){
                $.ajax({
                type: 'POST',
                url: '/tasks/complete/' + calEvent.id,
                dateType: 'json'
                }).done(function(data){
                   window.location.reload();
                });
            });

            $.ajax({
                type: 'POST',
                url: '/tasks/get_info/' + calEvent.id,
                dateType: 'json'
            }).done(function(data){
                console.log(data);
                $('#look-modal .modal-body').html(data);
            });
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