<!DOCTYPE html>
<style>
	#profile-table tr th{
		text-align: left;
		color:#949494;
	}
	#profile-table thead{
		background:#575757;
	}
	#profile-table tr td{
		text-align: center;
		background: #BABABA;
	}
	.brd{
		border: 1px solid black;
	}
</style>

<div class="row">
	<div class="span10">
		<h3 class="module-title">My Profile </h3>
	</div>
</div>
<!--<div class="row ">
	<div class="span10" >
		<form id="profile-form" method="post" action="">
			<table id="profile-table" class="table span9 table-bordered ">
				<thead>
					<tr>
						<th colspan="3">Employee Details</th>
					</tr>
				</thead>
				<tr >
					<td ><img src="#" width="100" height="100"><br><input style="" type="file" value="upload"></td>
					<td style=" vertical-align:bottom;"><input  type="text" id="position"  readonly="readonly"><label for="position">Position<label></td>
					<td style=" vertical-align:bottom;"><input  type="text"  id="employeeno" readonly="readonly"><label for="employeeno">Employee Number<label></td>
				</tr>
				<tr>
					<td><input type="text" id="firstname" required><label for="firstname">Firstname<label></td>
					<td><input type="text" id="middlename" required><label for="middlename">Middlename<label></td>
					<td><input type="text" id="lastname" required><label for="lastname">Lastname<label></td>
				</tr>
				<tr>
					<td><input type="text" id="status" required><label for="status">Status<label></td>
					<td><input type="text" id="datestart" required><label for="datestart">Date Started<label></td>
					<td><input type="text" id="dateseperated" required><label for="lastname">Date Seperated<label></td>
				</tr>
				<tr>
					<td><input type="text" id="sss" required><label for="sss">SSS<label></td>
					<td><input type="text" id="philhealth" required><label for="philhealth">Philhealth<label></td>
					<td><input type="text" id="pagibig" required><label for="pagibig">Pagibig<label></td>
				</tr>
				<tr>
					<td ><input type="text" id="tin" required><label for="tin">TIN<label></td>
					<td colspan="2">
				</tr>
			</table>
			<input style="margin-left:30px;" class="btn btn-primary" type="submit" form="profile-form" value="Save">
		</form>
	</div>
</div>-->
<div id="profile-home">
<div class="row" >
	<div class="span9  " style="padding:10px;">
			<div class="row">
				<div class="span2 ">
					<img src="<?php echo base_url()."uploads/".$picture;?>" class="img-circle" style="width:200px; height:175px;" >	<br><br>
					 <a id="uploadpicture-btn" class="btn btn-inverse ">Upload Profile Picture</a>
					
				</div>
				<div class="span6 ">
					<table style="width:100%;" >
						<tr>
							<td style="width:30%;" ><h4>Name</h4></td>
							<td style="width:70%;"><span><?php if($middlename != "N/A"){ echo $firstname." ".substr($middlename, 0,1)." ".$lastname;} else{
								echo $firstname." ".$middlename." ".$lastname;
							} ?></span></td>
						<tr>
							<tr>
							<td><h4>Address</h4></td>
							<td><span><?php echo $address;?></span></td>
						</tr>
							<tr>
							<td><h4>Contact</h4></td>
							<td><span><?php echo $contact;?></span></td>
						</tr>
						<tr>
							<td><h4>Email 1</h4></td>
							<td><span><?php echo $email1;?></span></td>
						</tr>
						<tr>
							<td><h4>Email 2</h4></td>
							<td><span><?php echo $email2;?></span></td>
						</tr>
						<tr>
							<td><h4>Status</h4></td>
							<td><span><?php echo $status;?></span></td>
						</tr>
						<?php if($status == "Practicumer") {?>
						<tr>
							<td><h4>Designation</h4></td>
							<td><span><?php echo $position_intern;?></span></td>
						</tr>
						<tr>
							<td><h4>School</h4></td>
							<td><span><?php echo $school;?></span></td>
						</tr>
						<tr>
							<td><h4>Required Hours:</h4></td>
							<td><span><?php echo $hrsreqd;?></span></td>
						</tr>
						<?php }else{ ?>
							<tr>
							<td><h4>Position</h4></td>
							<td><span><?php echo $position;?></span></td>
						</tr>
							<tr>
							<td><h4>Employee#</h4></td>
							<td><span><?php echo $employeeno;?></span></td>
						</tr>
						<tr>
							<td><h4>VL</h4></td>
							<td><span><?php echo $vl;?></span></td>
						</tr>
						<tr>
							<td><h4>SL</h4></td>
							<td><span><?php echo $sl;?></span></td>
						</tr>
						<?php } ?>
						<tr>
							<td><h4>Date Started</h4></td>
							<td><span><?php echo $datestart;?></span></td>
						</tr>
						<tr>
							<td><h4>Date Separated</h4></td>
							<td><span><?php echo $dateseperated;?></span></td>
						</tr>
						<tr>
							<td><h4>SSS</h4></td>
							<td><span><?php echo $sss;?></span></td>
						</tr>
						<tr>
							<td><h4>PAGIBIG</h4></td>
							<td><?php echo $pagibig;?></span></td>
						</tr>
						<tr>
							<td><h4>Philhealth</h4></td>
							<td><span><?php echo $philhealth;?></span></td>
						</tr>
						<tr>
							<td><h4>TIN</h4></td>
							<td><span><?php echo $tin;?></span></td>
						</tr>
						

					</table>
				</div>

			</div>
	</div>
</div>
	<!--<div class="row">
		<div class="span9" style="padding-left:30px;">
			 <a id="uploadpicture-btn" class="btn btn-inverse ">Upload Profile Picture</a>   <a id="editdetails-btn" class="btn btn-primary ">Edit Details</a>
		</div>
	</div>-->
</div>

<!--<div id="profile-edit">
<div class="row">
	<div class="span9  " style="padding:10px;"> 
	
			<div class="row">
			
				<div style="padding-left:30px;" class="span6 ">
				<form id="profiledetails">
					<table style="width:100%;" >
						<tr>
							<td style="width:30%;" ><h4>Name</h4></td>
							<td style="width:70%;"><span><input type="text" class="input-small" name="firstname"  placeholder="Firstname" value="<?php echo $firstname;?>"> <input type="text" class="input-small" name="middlename" placeholder="Middlename" value="<?php echo $middlename;?>"> <input type="text" class="input-small" name="lastname" placeholder="Lastname" value="<?php echo $lastname;?>"></span></td>
						<tr>
						<tr>
							<td><h4>Position</h4></td>
							<td><span><input type="text"  name="position" placeholder="Position" value="<?php echo $position;?>"></span></td>
						</tr>
							<tr>
							<td><h4>Employee#</h4></td>
							<td><span><input type="text"  name="employeeno" placeholder="Employee #" value="<?php echo $employeeno;?>"></span></td>
						</tr>
						<tr>
							<td><h4>Status</h4></td>
							<td><span><input type="text" class="input-small"  name="status" placeholder="Status" value="<?php echo $status;?>"></span></td>
						</tr>
						<tr>
							<td><h4>Date Started</h4></td>
							<td><span><input type="text" id="datestart" name="datestart" class="input-small" placeholder="Started" value="<?php echo $datestart;?>"></span></td>
						</tr>
						<tr>
							<td><h4>Date Seperated</h4></td>
							<td><span><input type="text" id="dateseperated" name="dateseperated" class="input-small" placeholder="Seperated" value="<?php echo $dateseperated;?>"></span></td>
						</tr>
						<tr>
							<td><h4>SSS</h4></td>
							<td><span><input type="text"   name="sss" placeholder="SSS" value="<?php echo $sss;?>"></span></td>
						</tr>
						<tr>
							<td><h4>PAGIBIG</h4></td>
							<td><span><input type="text"   name="pagibig" placeholder="PAGIBIG" value="<?php echo $pagibig;?>"></span></td>
						</tr>
						<tr>
							<td><h4>Philhealth</h4></td>
							<td><span><input type="text"   name="philhealth" placeholder="Philhealth" value="<?php echo $philhealth;?>"></span></td>
						</tr>
						<tr>
							<td><h4>TIN</h4></td>
							<td><span><input type="text"   name="tin" placeholder="TIN" value="<?php echo $tin;?>"></span></td>
						</tr>
					
					</table>
					</form>
				</div>

			</div>
		
	</div>
</div>
<div class="row">
	<div class="span9" style="padding-left:30px; margin-top:-20px;">
		<a class="btn btn-primary" id="save-btn">Save</a> <a  class="cancel-btn btn btn-danger ">Cancel</a>
	</div>
</div>
</div>-->




<script src="<?echo base_url();?>assets/js/refresh.js"></script>
<script>

	$(function(){
		$("#datestart").datepicker({
			dateFormat : 'yy-mm-dd'
		});				
	});

		
	$(function(){
		$("#dateseperated").datepicker({
			dateFormat : 'yy-mm-dd'
		});
	});
	$(document).ready(function(){
			$("#profile-edit").hide();
			$("#profile-upload").hide();
	});
			$("#editdetails-btn").click(function(){
				$("#profile-edit").fadeIn('slow');
				$("#profile-home").fadeOut('fast');
				$("#profile-upload").fadeOut('fast');

				
			});
			
			$("#save-btn").click(function(){
				
				$.ajax({
					type : "POST",
					url: "/kamahalan/index.php/post/profilesave",
					data : $("#profiledetails").serialize(),
					success: function(data){
						profiledetails();
						 $.pnotify({
                title: 'Success',
                text: 'You have successfully updated your profile details',
                type: 'success'

              });
					} 
				});
			});


	



</script>
