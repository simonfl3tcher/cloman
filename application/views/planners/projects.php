<div id="calendar"></div>
<div id="look-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
        <h3 id="myModalLabel">Project Details</h3>
    </div>
    <div class="modal-body">
    </div>
    <div class="modal-footer">
        <button data-dismiss="modal" type="submit" class="btn">Close</button>
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
	    selectable: true,
		selectHelper: true,
	    draggable: true, 
	    editable:true,
        events: "/projects/get_projects_for_calender",
        eventColor: '#FF6D00',
        axisFormat: 'H:mm', //,'h(:mm)tt',
        timeFormat: {
            agenda: 'H:mm { - H:mm}' //h:mm{ - h:mm}'
        },
        allDayDefault: false,
        minTime: 9,
        maxTime: 19, 
        eventDrop: function(event, delta) { 
	         console.log(event);
	         console.log(delta);
            $.ajax({
                type: 'POST',
                url: '/projects/update_project_date',
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
                url: '/projects/update_project_date',
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

            $.ajax({
                type: 'POST',
                url: '/projects/get_for_calender/' + calEvent.id,
                dateType: 'json'
            }).done(function(data){
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
			right: 'month',
            name: 'basicWeek'
		}
    })
	});
</script>