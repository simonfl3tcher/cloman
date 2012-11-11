<div id="calendar"></div>

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
				var title = prompt('Event Title:');
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
                            eventTitle: title                            
                        },
                        dateType: 'json',
                        success: function (resp) {
                            //calendar.fullCalendar('refetchEvents');
                        }
                    });
				}
				calendar.fullCalendar('unselect');
			},
	    draggable: true, 
	    editable:true,
        events: "meetings/get_meetings",
        timeFormat:  'HH:mm { - HH:mm}', 
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
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		}
    })
	});
</script>