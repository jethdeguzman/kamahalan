

<div class="row">
	<div class="span10">
		<h3 class="module-title">Calendar</h3>
	</div>
</div>

  <div class="row" style='margin-bottom:30px;'>

 <div class='span5'  style='border-radius: 5px; border:1px solid gray; padding:10px; background:white;  margin-left:60px;'>
		<div id="calendar-container">
		
	</div>
</div>

<?php if($usertype=='Administrator') { ?>
 <div class="span4">
 	<form id='calendar-info'>
 	<table class='table cal table-bordered'>
 		<tr>
 				<th>Event Name</th>
 				<td><input type='text' class='clear' name='title' placeholder="Event Name"></td>
 		</tr>
 		<tr>
 			<th>Start Date</th>
 			<td><input type='text' class='clear' name='startdate' id='startdate'  placeholder="yy-mm-dd"></td>
 		</tr>
 				<tr>
 			<th>End Date</th>
 			<td><input type='text' class='clear' name='enddate' id='enddate' placeholder="yy-mm-dd"></td>
 		</tr>


 	</table>
 </form>
 		<a href="#myModal" role="button" data-toggle="modal" class='btn btn-primary ' style='float:right;'>View Events</a>  <a id='cal-btn' class='btn btn-inverse ' style='float:right; margin-right:5px;'>Add Event</a> 
 		
 </div>
<?php } ?>
</div>


<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">List of Events</h3>
  </div>

  <div class="modal-body" id="calendar-modal" >
    

</div>
<script>
$(document).ready(function(){
     $( "#startdate" ).datepicker({
      changeMonth: true,
      changeYear: true,
       dateFormat : 'yy-mm-dd'
    });
          $( "#enddate" ).datepicker({
      changeMonth: true,
      changeYear: true,
       dateFormat : 'yy-mm-dd'
    });
	$("#calendar-container").load("/kamahalan/index.php/home/calendar2");
  $("#calendar-modal").load("/kamahalan/index.php/home/calendarmodal");
});
$('#cal-btn').click(function(){

	//alert($('#calendar-info').serialize());
	$.ajax({
		type: "POST",
		url : "/kamahalan/index.php/post/calendarinfo",
		data : $('#calendar-info').serialize(),
		success : function(data){
				$.pnotify({
                      title: 'Success',
                      text: "You have successfully added an event.",
                      type: 'success'
                    });
				$("#calendar-container").load("/kamahalan/index.php/home/calendar2");
         $("#calendar-modal").load("/kamahalan/index.php/home/calendarmodal");
			$('.clear').attr('value','');
		}


	});
});

</script>