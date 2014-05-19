
<table  class="table  table-hover" >
    <thead>
        <tr>
            <th>Event Title</th>
            <th>Date Start</th>
            <th>Date End</th>   
            <th>Options</th>
        </tr>
    </thead>
    <?php if($query) { ?>
    <tbody>
        <?php foreach ($query as $row) { ?>
        <tr>
        
            <td><?php echo $row->title;?></td>
            <td><?php echo $row->start;?></td>
            <td><?php echo $row->end;?></td>
            <input type='hidden' class='userid' value='<?php echo $row->id;?>'>
            <td><a class='btn btn-danger btn-small deleteevent-btn'>Delete</a></td>
      
        
        </tr>
        <?php }?>
    </tbody>
    <?php } else{ ?>
  </table>
  <div id="alert" class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span><strong>0 result.</strong> No reord Found</span>
                </div>
         <?php }?>
  </div>
  <script>
  $(".deleteevent-btn").click(function(){
	alert($(this).parent().parent().find('.userid').val());
	$.ajax({
		url : "/kamahalan/index.php/post/deletecalendar/"+$(this).parent().parent().find('.userid').val(),
		success: function(){
			$.pnotify({
                      title: 'Success',
                      text: "You have successfully deleted an event.",
                      type: 'success'
                    });
				$("#calendar-container").load("/kamahalan/index.php/home/calendar2");
         $("#calendar-modal").load("/kamahalan/index.php/home/calendarmodal");
			$('.clear').attr('value','');
		}
	});
});
 </script>