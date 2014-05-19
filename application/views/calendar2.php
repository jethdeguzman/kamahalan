<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>assets/js/fullcalendar/fullcalendar.css' />
<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>assets/js/fullcalendar/fullcalendar.print.css' media='print' />

<script type='text/javascript' src='<?php echo base_url();?>assets/js/fullcalendar/fullcalendar.min.js'></script>
<script type='text/javascript'>

	$(document).ready(function() {
	
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		var object;
	$.ajax({
		url:'/kamahalan/index.php/post/calendarinfojson',
		async : false,
		success: function(data){

 			object = data;
 	}
 		});
		var calendar = $('#calendar1').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right:''
			},
			
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
				}
				calendar.fullCalendar('unselect');
			},
			editable: true,
			events: object
		});
		
	});

</script>
<style type='text/css'>



	#calendar1 {
		

margin: 0 auto;
		}
  .cal tr th{
    background:#858585;
    color:#424242;
    text-align: center;
    vertical-align: middle;
  }
  .cal tr td{
    background: #D4D4D4;
     vertical-align: middle;
  }
</style>

<div  id='calendar1' style='color:black;' ></div>