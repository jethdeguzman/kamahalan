<!DOCTYPE html>
<style>
	#dtr-table tr th{
		text-align: center;
		color:#949494;
	}
	#dtr-table thead{
		background:#575757;
	}
	#dtr-table tr td{
		text-align: center;
		background: #BABABA;
	}
	.time-input{
		width:60px;
	}

</style>
   
<div class="row">
	<div class="span10">
		<h3 class="module-title">Daily Time Record</h3>
		<input id="dtr" type="hidden" value="" >
		<input id="hours" type="hidden" >
	</div>
</div>
<div class="row ">
	<div class="span10" >
		
		<form  class="form-inline" id="dtr-form" method="POST" action="">
				 
				<?php if($userstatus == "Practicumer"){?>
				 <div id="dtr-alert" class="alert alert-info " style='margin-left:30px; margin-right:70px;'>
  			  	<button type="button" class="close" data-dismiss="alert">&times;</button>
 					 	<span><strong>Total No. of Hours Rendered:</strong> <?php echo $hrtotal." hours, ".$mintotal." minutes"; ?></span>
				</div>
				<?php } ?>
				<table id="dtr-table" class="table span9 table-bordered" >
					<thead style="">
						<tr>
							<th><label>Date</label></th>
							<th><label>Time IN</label></th>
							<th><label>Time OUT</label></th>
							<th><label>Status</label></th>
						</tr>
					</thead>
						<tr align="center">
							<?php foreach ($query as $row) {
								$status = $row->status;
								$timein  = $row->timein;
								$timeout = $row->timeout;
								$hourtimein =  strftime("%I",strtotime($timein));
								$mintimein =strftime("%M",strtotime($timein));
								$ampmtimein =strftime("%p",strtotime($timein));
								$hourtimeout =  strftime("%I",strtotime($timeout));
								$mintimeout =strftime("%M",strtotime($timeout));
								$ampmtimeout =strftime("%p",strtotime($timeout));
								
							}
								?>
							<td><input id="date" class="input-small" type="text" name="date" readonly="readonly" value="<?php echo date("F j, Y");?>"></td>
							<td><input disabled id="hourtimein"  class="time-input"  type="number" min="1" max="12" name="hourtimein" value="<?php if($dtr <> 0){ echo $hourtimein;}else{echo date("g");} ?>" required> :
									<input disabled  id="mintimein" class="time-input"  type="number" min="00" max="59" name="mintimein" value="<?php if($dtr <> 0){ echo $mintimein;}else{echo date("i");} ?>" required>	
									<select disabled id="ampmtimein" class="time-input" name="ampmtimein" >
										<?php if($dtr <> 0 ){?>  
												<option><?php echo $ampmtimein;?></option>
												<?php }else{ $ampm = date("A"); ?>
										<option><?php echo $ampm;?></option>
										<option><?php switch ($ampm) {
											case 'AM':
												echo "PM";
												break;
											case 'PM':
												echo 'AM';
												break;
										}?></option>
									
										<?php }?>
									</select>
									<a id="timein-btn"  style="display:<?php if($dtr == 0){echo "";} else{echo "none";}?> " class=" btn btn-primary btn-small">Time In</a></td>
							<td><input id="hourtimeout" class="time-input" disabled  type="number" min="1" max="12" name="hourtimeout" value="<?php if(($dtr == 1)||($dtr == 0)){ echo date("g"); }else{echo "$hourtimeout";} ?>" > :
									<input id="mintimeout" class="time-input" disabled  type="number" min="00" max="59" name="mintimeout" value="<?php if(($dtr == 1)||($dtr == 0)){ echo date("i"); }else{echo "$mintimeout";} ?>" >	
									<select id="ampmtimeout" class="time-input" disabled name="ampmtimeout" >
										<?php if(($dtr == 1)||($dtr == 0)){  $ampm = date("A"); ?>
										<option><?php echo $ampm;?></option>
										<option><?php switch ($ampm) {
											case 'AM':
												echo "PM";
												break;
											case 'PM':
												echo 'AM';
												break;
										}?></option><?php }else{?>
										<option><?php echo $ampmtimeout;?></option>
										<?php }?>
									</select>
										<a id="timeout-btn"  style="display: <?php if($dtr == 1){echo "";} else{echo "none";}?>" class="btn btn-primary btn-small">Time Out</a></td>
							<td><input class="time-input" id="statusdtr" readonly type="text" value="<?php if(($dtr == 1)||($dtr==2)){ echo $status;}else{echo "Absent";} ?>" ></td>
							
						</tr>
				</table>
		</form>
		
	</div>
</div>
<div class="row">
	<div class="span10">
		<button id="refresh" style="margin-left:30px;" class="btn btn-primary btn-small">refresh</button>
		<i>*note: Click refresh button to get real time.</i>
	</div>
</div>
<script src="<?echo base_url();?>assets/js/refresh.js"></script>
<script>

 
/** 	setInterval(function(){

 		var date = new Date();
		var hour = date.getSeconds();
		var dtr = $("#dtr").val();
		
 		$("#hours").attr('value',hour);
 		if(hour == 17){
 			if(dtr == 0){
 				$.ajax({
 					url: "/kamahalan/index.php/post/absent",
 					success : 
 					function(){
 						$("#content").load("/kamahalan/index.php/home/attend");
 					}
 				});
 				
 			}
 		}
 		
 	},500);**/
	


 $("#timein-btn").unbind('click').click(function(){

   
    var hourtimein = $("#hourtimein").val();
    var mintimein = $("#mintimein").val();
    var ampmtimein = $("#ampmtimein").val();
    var status = "Present";
    var timein = hourtimein+":"+mintimein+" "+ampmtimein;
    var datastring = "timein="+timein+"&status="+status;
    var x;
    var r=confirm("Are you sure you want to time-in?");
   if (r==true){
    $.ajax({
      type: "POST",
      url: "/kamahalan/index.php/post/timein",
      data: datastring,
      success :
        function(data){
        	  $.pnotify({
                title: 'Success',
                text: 'You have succesfully Timed In',
                type: 'success'

              });
          $("#content").load("/kamahalan/index.php/home/attend");
        }
    });
}
  else{
          return false;
           }

  });

  $("#timeout-btn").unbind('click').click(function(){
    var hourtimeout = $("#hourtimeout").val();
    var mintimeout = $("#mintimeout").val();
    var ampmtimeout = $("#ampmtimeout").val();
    var timeout = hourtimeout+":"+mintimeout+" "+ampmtimeout;
    var datastring = "timeout="+timeout;
    var x;
    var r=confirm("Are you sure you want to time-out?");
   if (r==true){
    
    $.ajax({
      type: "POST",
      url: "/kamahalan/index.php/post/timeout",
      data: datastring,
      success :
        function(data){
          $.pnotify({
                title: 'Success',
                text: 'You have succesfully Timed Out',
                type: 'success'

              });
          $("#content").load("/kamahalan/index.php/home/attend");
        }
    });
}
else{
          return false;
           }
  });




</script>
