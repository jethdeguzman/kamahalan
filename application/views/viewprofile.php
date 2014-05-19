<style>
.modal-header{
  background-image:url('<?php echo base_url();?>assets/grid_noise/grid_noise.png');
 

}
.modal-body{
   background-image:url('<?php echo base_url();?>assets/cream_pixels/cream_pixels.png');
}
.modal-footer{
   background-image:url('<?php echo base_url();?>assets/grid_noise/grid_noise.png');
}

</style>

<div class="modal-header" style="height:50px;">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
     <span style="vertical-align:center;">
      <img src="<?echo base_url()."uploads/".$picture;?>" class="img-circle" style="width:50px; height:50px; float:left;" >
      <h3 id="myModalLabel" style="color:gray; margin-left:60px; margin-top:10px;"><?php echo "  ".$firstname;?></h3>
     </span>
  </div>
  <div id="viewprofiledetails">
  <div class="modal-body">
<input type="hidden" id="checkstatus" value="<?php echo $checkstatus;?>"/>
<input type="hidden" id="checkstatus" value="<?php echo $hrsreqd;?>"/>
    <table style="width:100%;"  >
            <tr>
              <td style="width:30%;" ><h5>Name</h5></td>
              <td style="width:70%;"><span><?php if($middlename != "N/A"){ echo $firstname." ".substr($middlename, 0,1)." ".$lastname;} else{
                echo $firstname." ".$middlename." ".$lastname;
              } ?></span></td>
            </tr>
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

             <?php if($checkstatus == "Practicumer") { ?>
              <tr>
              <td><h4>Designation:</h4></td>
              <td><span><?php echo $position_intern; ?></span></td>
            </tr>
            <tr>
              <td><h4>School:</h4></td>
              <td><span><?php echo $school; ?></span></td>
            </tr>
            <tr>
              <td><h4>Required Hours:</h4></td>
              <td><span><?php echo $hrsreqd; ?></span></td>
            </tr>
            <?php }
              if($checkstatus == "Employee"){
            ?>
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
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button id="editdetails-btn" class="btn btn-primary">Edit Details</button>
  </div>

  </div>


  <div id="editviewprofiledetails" style="display:none;">
  <div class="modal-body">
    
    <form id="viewprofile-form">
          <table style="width:100%;" style="margin-bottom:-50px;">
            <input type="hidden" id="id" name="id" placeholder="id" value="<?php echo $id;?>"></span></td>
            <input type="hidden" id="userid" name="userid" placeholder="userid" value="<?php echo $userid;?>"></span></td>
            
            <tr>
              <td style="width:30%;" ><h5>Name</h5></td>
              <td style="width:70%;"><span><input type="text" class="input-small" name="firstname"  placeholder="Firstname" value="<?php echo $firstname;?>"> <input type="text" class="input-small" name="middlename" placeholder="Middlename" value="<?php echo $middlename;?>"> <input type="text" class="input-small" name="lastname" placeholder="Lastname" value="<?php echo $lastname;?>"></span></td>
            <tr>
              <tr>
              <td><h5>Address</h5></td>
              <td><span><input type="text"  name="address" placeholder="Address" value="<?php echo $address;?>"></span></td>
            </tr>
            <tr>
              <td><h5>Contact Number</h5></td>
              <td><span><input type="text"  name="contact" placeholder="Contact Number" value="<?php echo $contact;?>"></span></td>
            </tr>
            <tr>
              <td><h5>Email 1</h5></td>
              <td><span><input type="email"  name="email1" placeholder="Email 1" value="<?php echo $email1;?>"></span></td>
            </tr>
            <tr>
              <td><h5>Email 2</h5></td>
              <td><span><input type="text"  name="email2" placeholder="Email 2" value="<?php echo $email2;?>"></span></td>
            </tr>
      
             <tr>
              <td><h5>Status</h5></td>
              <td><span><input type="text" class="input-small"  name="status" placeholder="Status" value="<?php echo $status;?>"></span></td>
            </tr>

 <?php if($checkstatus == "Practicumer") { ?>
              <tr>
              <td><h5>Designation:</h5></td>
              <td><span><input type="text" name="position_intern" placeholder="Designation" value="<?php echo $position_intern;?>"></span></td>
            </tr>
            <tr>
              <td><h5>School:</h5></td>
              <td><span><input type="text"  name="school" placeholder="School" value="<?php echo $school;?>"></span></td>
            </tr>
              <tr>
              <td><h5>Required Hours:</h5></td>
              <td><span><input type="text" class="input-small" name="hrsreqd" placeholder="Required Hours" value="<?php echo $hrsreqd;?>"></span></td>
            </tr>
         <?php }
              if($checkstatus == "Employee"){
            ?>            
      <tr>
              <td><h5>Position</h5></td>
              <td><span><input type="text"  name="position" placeholder="Position" value="<?php echo $position;?>"></span></td>
            </tr>
            <tr>
              <td><h5>Employee#</h5></td>
              <td><span><input type="text"  name="employeeno" placeholder="Employee #" value="<?php echo $employeeno;?>"></span></td>
            </tr>
               <tr>
              <td><h5>VL</h5></td>
              <td><span><input type="text" class="input-small"  name="vl" placeholder="Vl" value="<?php echo $vl;?>"></span></td>
            </tr>
            <tr>
              <td><h5>SL</h5></td>
              <td><span><input type="text" class="input-small"  name="sl" placeholder="SL" value="<?php echo $sl;?>"></span></td>
            </tr>
           <?php } ?>
            <tr>
              <td><h5>Date Started</h5></td>
              <td><span><input type="date" id="datestart" name="datestart" class="input-medium" placeholder="Started" value="<?php echo $datestart;?>"></span></td>
            </tr>
            <tr>
              <td><h5>Date Separated</h5></td>
              <td><span><input type="date" id="dateseperated" name="dateseperated" class="input-medium" placeholder="Seperated" value="<?php echo $dateseperated;?>"></span></td>
            </tr>
            <tr>
              <td><h5>SSS</h5></td>
              <td><span><input type="text"   name="sss" placeholder="SSS" value="<?php echo $sss;?>"></span></td>
            </tr>
            <tr>
              <td><h5>PAGIBIG</h5></td>
              <td><span><input type="text"   name="pagibig" placeholder="PAGIBIG" value="<?php echo $pagibig;?>"></span></td>
            </tr>
            <tr>
              <td><h5>Philhealth</h5></td>
              <td><span><input type="text"   name="philhealth" placeholder="Philhealth" value="<?php echo $philhealth;?>"></span></td>
            </tr>
            <tr>
              <td><h5>TIN</h5></td>
              <td><span><input type="text"   name="tin" placeholder="TIN" value="<?php echo $tin;?>"></span></td>
            </tr>
         
         
          </table>
          </form>
    
  </div>
  <div class="modal-footer">
    <button class="btn" id="backdetails-btn">Back</button>
    <button id="savedetails-btn" class="btn btn-primary">Save Details</button>
  </div>
</div>



  <script>
   
    $(document).ready(function(){
      $("#viewprofiledetails").show();
      $("#editviewprofiledetails").hide();


      $("#editdetails-btn").click(function(){
        
        $("#viewprofiledetails").hide();
        $("#editviewprofiledetails").show();
      });

      $("#backdetails-btn").click(function(){
         $("#viewprofiledetails").show();
         $("#editviewprofiledetails").hide();
      });

      $("#savedetails-btn").click(function(){
//alert($(this).parent().parent().find(".userid").val());
   var x;
   var r=confirm("Update the Profile?");
       if (r==true){
          $.ajax({
          type : "POST",
          url: "/kamahalan/index.php/post/profilesave",
          data : $("#viewprofile-form").serialize(),
          success: function(data){
            var id = $("#id").val();
            var userid = $("#userid").val();
            if(id == userid){
              profiledetails(userid);
            }
            $("#viewprofilemodal").load("/kamahalan/index.php/home/viewprofile/"+userid);
             $.pnotify({
                title: 'Success',
                text: 'You have successfully updated your profile details',
                type: 'success'

              });
          } 
        });
          }
           else{
          return false;
           }
          
           });


    
    });
  </script>