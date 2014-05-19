
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Kamahalan &middot; System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
 
    <!-- Le styles -->
    <link href="<?php echo base_url();?>assets/css/jquery-ui.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">
    
    <link href="<?php echo base_url();?>assets/css/jquery.pnotify.default.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/home.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/js/fuelux-master/dist/css/fuelux.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/js/fuelux-master/dist/css/fuelux-responsive.css" rel="stylesheet">

    <script src='<?php echo base_url();?>assets/js/jquery-ui-1.10.2.custom.min.js'></script>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
  </head>

  <body>

       <div id="settings-container" class=""  style="">
        <div class="container">
            <div class="row">
                <div class="span3" id="settings-tab" style="">
                    <div style="padding-right:10px;">  
                        <p>Control Panel</p><hr/>
                        <ul style="list-style-type:none;">
                            <li><p><a id="myaccount-tab" href="#">My Account</a></p></li><hr/>
                            <?php if($type=="Administrator"){ ?>
                            <li><p><a id="viewusers-tab" href="#">View Users</a></p></li><hr/>
                            <li><p><a id="formsdefault-tab" href="#">Forms Default</a></p></li><hr/>
                            <li><p><a id="viewholiday-tab" href="#">Holidays</a></p></li><hr/>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div id="settings-body" class="span8">
                    <div class="row">
                    <!--Forms-default !-->
                    <div id="formdefault" class="span8" style="display:none; color:white;">
                            <div class="row" >
                                <div class="span8">
                                    <h3 style='color:white; margin:0px;'>Signatures</h3>
                                    <form id="signature-form" name="signature-form" class="form-horizontal">
                                    <div style="margin-left:-80px; margin-top:20px;"  class="control-group ">
                                        <label class="control-label">Checked By:</label>
                                        <div class="controls">
                                            <input id="checkedbyname" type="text" name="checkedbyname" placeholder="Name" value="<?php echo $checkedbyname; ?>">
                                             <input id="checkedbyposition" type="text" name="checkedbyposition" placeholder="Position" value="<?php echo $checkedbyposition; ?>" >
                                        </div>
                                    </div>
                                    <div style="margin-left:-80px;"  class="control-group ">
                                        <label class="control-label">Approved By:</label>
                                        <div class="controls">
                                            <input id="approvedbyname" type="text" name="approvedbyname"  placeholder="Name" value="<?php echo $approvedbyname; ?>">
                                            <input id="approvedbyposition" type="text" name="approvedbyposition"  placeholder="Position" value="<?php echo $approvedbyposition;?>">
                                        </div>
                                    </div>
                                     <a style="color:white;" id="signature-form-submit"  class="btn btn-primary" >Update</a>
                                    </form>

                                </div>
                            </div>
                            
                        </div>
                        <!--My Account!-->
                        <div id="myaccount" class="span8" style="display:none; color:white;">
                            <div class="row">
                                <div class="span8">
                                    <h3 style="color:white; margin:0px;">My Account</h3>
                                    <form id="myaccount-form" name="myaccount-form" class="form-horizontal">
                                        <input id="id-account" type="hidden" name="id-account" value="<?php echo $id; ?>"/>
                                        <div style="margin-left: -50px; margin-top: 20px;" class="control-group">
                                            <label class="control-label">Username:</label>
                                            <div class="controls">
                                                <input id="username-account" type="text" name="username-account" placeholder="Username" value="<?php echo $username_account; ?> "  readonly/>
                                            </div>
                                        </div>
                                         <div style="margin-left: -50px; margin-top: 20px;" class="control-group">
                                            <label class="control-label">Password:</label>
                                            <div class="controls">
                                                <input id="password-account" type="password" name="password-account" placeholder="Password" value="" />
                                            </div>
                                        </div>
                                         <div style="margin-left: -50px; margin-top: 20px;" class="control-group">
                                            <label class="control-label">Confirm Password:</label>
                                            <div class="controls">
                                                <input id="cpassword-account" type="password" placeholder="Confirm Password" value="" />
                                                <span style="display:none;" class="alert alert-error" id="notmatch-alert">Password mismatch</span>
                                                <span style="display:none;" class="alert alert-success" id="match-alert">Password match</span>
                                            </div>
                                        </div>
                                     <div style="margin-left: -50px; margin-top: 20px;" class="control-group">
                                            <label class="control-label">Type:</label>
                                            <div class="controls">
                                                <input id="" type="text" readonly name="" placeholder="Type" value="<?php echo $type; ?>" />
                                            </div>
                                         </div>
                                         <a style="color:white;" id="myaccount-form-submit" class="btn btn-primary">Update</a>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--Add User!-->
                        <div id="user" class="span8">
                                <div style="display:none;" id="user-tab" class="tabbable span8"> <!-- Only required for left/right tabs -->
                                      <ul class="nav nav-tabs">
                                        <li class="active"><a id="viewuser-btn" href="#tab1" data-toggle="tab">View Users</a></li>
                                        <li><a href="#tab2" data-toggle="tab">Add User</a></li>
                                      </ul>
                                      <div class="tab-content">
                                        <div id="tab1" class="tab-pane active"  >
                                          
                                        </div>
                                        <div class="tab-pane" id="tab2">
                                            
                                          <form id="user-form" name="user-form" class="form-horizontal">
                                                <div style="margin-left:-90px;" class="control-group ">
                                                    <label class="control-label">Username:</label>
                                                    <div class="controls">
                                                        <input id="uname" type="text" name="username" placeholder="Username" required>
                                                    </div>
                                                </div>
                                                <div style="margin-left:-90px;" class="control-group ">
                                                    <label class="control-label">Password:</label>
                                                    <div class="controls">
                                                        <input type="password" name="password" id="password" placeholder="Password" required>
                                                    </div>
                                                    <div class="controls">
                                                        <p style="margin-top:10px;"><input id="showpass" style="margin-top: -2px;" type="checkbox" name="showpass" value="showpass" /> Show Password </p>
                                                    </div>
                                                </div>
                                      <div id="selectstatus" style="margin-left:-90px; margin-top:-20px;" class="control-group ">
                                                    <label class="control-label">Status:</label>
                                                    <div class="controls">
                                                        <select id="statusrosi" name="statusrosi" >
                                                            <option value="Employee">Employee</option>
                                                            <option value="Practicumer">Practicumer</option>
                                                        </select>
                                                    <input style="margin-left: 10px; display:none;" type="text" id="hrsrqd" class="intern-hours input-medium" name="hrsreqd" placeholder="Hours Required" required/>
                                                   </div>
                                                </div>
                                                <!--
                                                <div id="intern-hours" style="margin-left:100px; display: none;" class="control-group ">
                                                    <label class="control-label">Required No. of Hours:</label> 
                                                    <br /><br/>
                                                    <input style="margin-left:-10px;" type="text" id="hrsrqd" name="hrsreqd" placeholder="Required No. of Hours" required/>
                                                </div>
                                                !-->
                                                <div style="margin-left:-90px;" class="control-group ">
                                                    <label class="control-label">Type:</label>
                                                    <div class="controls">
                                                        <select id="type" name="type">
                                                            <option>Administrator</option>
                                                            <option>Local</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <button style="color:white; margin-top:-10px;" id="user-form-submit" class="btn btn-primary">Submit</button>
                                          </form>
                                        </div>
                                      </div>
                                </div>
                            
                        </div>
                        <!--Holidays!-->
                        <div id="holiday" class="span8">
                            <div style="display:none;" id="holiday-tab" class="tabbable span8">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab3" id="viewholiday-btn" data-toggle="tab">View Holidays</a></li>
                                    <li><a href="#tab4" data-toggle="tab">Add Holiday</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="tab3" class="tab-pane active">

                                    </div>
                                    <div class="tab-pane" id="tab4">
                                        <form id="holiday-form" name="holiday-form" class="form-horizontal">
                                            <div style="margin-left:-90px;" class="control-group">
                                                <label class="control-label">Date:</label>
                                                <div class="controls">
                                                    <input id="holidate" type="date" name="holidate" placeholder="yy-mm-dd  " required/>
                                                </div>
                                            </div>
                                             <div style="margin-left:-90px;" class="control-group">
                                                <label class="control-label">Holiday:</label>
                                                <div class="controls">
                                                    <input id="holiname" type="text" name="holiname" placeholder="Holiday" required/>
                                                </div>
                                            </div>
                                            <a style="color:white;" id="holiday-form-submit" class="btn btn-primary">Submit</a>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
           
            </div>
        </div>
    </div> <!-- end settings-->
    




    <div id="header" class="container">
        <div class="row">
            <div class="span12"> 
                 <div class="masthead">
                <ul class="nav nav-pills pull-right">
                  <li ><a href="#" id="settings-open" style='background: gray; color:white;'>Settings</a><a href="#" style="display:none;" id="settings-close" style='background: gray; color:white;'>Settings</a></li>
                  <li><a href="/kamahalan/index.php/home/logout" style='background: gray; color:white;'>Signout</a></li>
                 
                </ul>
                <h3 class="muted">Kamahalan System</h3>
              </div>
            </div>
            </div>
            <div class="row">
                <div id="headerinfo" class="span6">
                   
                </div>

            </div>      
        <hr/>    

    </div> <!-- /container -->
<?php if($event){ 
    foreach ($event as $row) { ?>  

<div class='container'>
<div class='row'>
    <div class="span12"> 
 <div id="alert" style='' class="alert">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span><strong><?php echo $row->title; ?>.</strong> This event is happening right now.</span>
   </div>
</div>
</div>
</div>
<?php } }  ?>
    <div id="body" class="container " style='position:relative;'>
        <div class="row">
            <div id="body-tab" class="span2" style='position:relative;'>
                <div class="row">
                    <div id="attend" class="span2  tab-container">
                            <center>
                            <img id="attend-img" class="tab-icon" src="<?php echo base_url();?>assets/glyphicons/png/white/glyphicons_352_nameplate.png">
                            <br><small>D. T. R.</small>
                        </center>
                    </div>
                </div>
                <?php if ($status == "Employee"){ ?>
                <div class="row">
                    <div id="forms" class="span2 tab-container">
                            <center>
                            <img id="forms-img" class="tab-icon" src="<?php echo base_url();?>assets/glyphicons/png/white/glyphicons_039_notes.png">
                            <br><small>Forms</small>
                        </center>
                    </div>
                </div>
                <?php } ?>
                <?php if(($type=="Administrator") && ($status == "Employee")){ ?>
                <div class="row">
                    <div id="reports" class="span2 tab-container">
                            <center>
                            <img id="reports-img"  class="tab-icon" src="<?php echo base_url();?>assets/glyphicons/png/white/glyphicons_036_file.png">
                            <br><small>Reports</small>
                        </center>
                    </div>
                </div>
                <?php } ?>
                <div class="row">
                    <div id="profile" class="span2 tab-container">
                            <center>
                            <img id="profile-img"  class="tab-icon" src="<?php echo base_url();?>assets/glyphicons/png/white/glyphicons_003_user.png">
                            <br><small>My Profile</small>
                        </center>
                    </div>
                </div>
            
         
                <div class="row">
                    <div id="calendar" class="span2 tab-container"  style='position:relative;'>
                            <center>
                            <img id="calendar-img" class="tab-icon" src="<?php echo base_url();?>assets/glyphicons/png/white/glyphicons_045_calendar.png">
                            <br><small>Calendar</small>
                        </center>
                    </div>
                </div>

                       <div class="row">
                    <div id="aboutus" class="span2 tab-container">
                            <center>
                            <img id="memo-img" class="tab-icon" src="<?php echo base_url();?>assets/glyphicons/png/white/glyphicons_049_star.png">
                            <br><small>About us</small>
                        </center>
                    </div>
                </div>
            </div>
            <div id="body-content" class="span10" style='position:relative;'>
                    <div id="content" style='position:relative;' class="">
                        
                    </div>
            </div>

        </div>
    </div>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url();?>assets/bootstrap/js/jquery-1.9.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/jquery-migrate-1.2.0.min.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap-transition.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap-alert.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap-modal.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap-dropdown.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap-scrollspy.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap-tab.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap-tooltip.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap-popover.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap-button.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap-collapse.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap-carousel.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap-typeahead.js"></script>
    
    <script src="<?php echo base_url();?>assets/js/jquery.pnotify.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/script.js"></script>
      <script src="<?php echo base_url();?>assets/js/refresh.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery-ui.js"></script>




    <script>
        $(document).ready(function(){
            setInterval(function(){
                $("#headerinfo").load("/kamahalan/index.php/home/headerinfo");
            },500);
             $("#myaccount").show();
            $("#settings-open").click(function(){
                $(this).hide();
                $("#settings-close").show();
                 $("#settings-close").css({
                    color:'white',
                    background: 'gray'
                 });
                $("#settings-container").slideDown("slow");

              
            });
            $("#settings-close").stop(true,true).click(function(){
                $("#settings-container").slideUp("slow");
                $(this).hide();
                $("#settings-open").show();
            
            });

              $("#saveaccount-btn").unbind('click').click(function(){
                    $("#editmyaccount").hide();
                    $("#viewmyaccount").show();

                    alert( $("#user-form").serialize());
                    $.ajax({
                      type: "POST",
                      //url: "/kamahalan/index.php/post/addleaveform",
                      data: $("#user-form").serialize(),
                      success:
                        function(data){
                            $.pnotify({
                                title: 'Success',
                                text: "You have successfully Edited the Account",
                                type: 'success'
                              });
                        }      
                    });
                 
                     return false;
                  });  

                      $('#selectstatus').click(function(){

             var status = $('#statusrosi :selected').val();
            if(status=="Practicumer"){ 
               
                $('.intern-hours').fadeIn('slow'); 
            }else{
                $('.intern-hours').fadeOut('slow');
            }
        });
            $("#showpass").change(function(){
               
                var pass = $("#password-account").val();
                if($("#showpass").is(':checked')){
                    
                    $("#password").attr("type","text");
                }
                else{
                    $("#password").attr("type","password");
                }
            });
           // alert(checkshow);
            
        });
    </script>
  </body>
</html>
