$(document).ready(function(){
  $("#headerinfo").load("/kamahalan/index.php/home/headerinfo"); 
  $("#content").load("/kamahalan/index.php/home/attend");
 // var time = new Date();
  //alert(time.getHours()); 
    $("#loginbtn").click(function(){
    
        $.ajax({
          type: "POST",
           url: "/kamahalan/index.php/verify/check_database",
            data: $("#form-signin").serialize(),
          success: 

          function(data){
            alert($("#form-signin").serialize());

            // document.location.href="http://localhost/kamahalan/index.php/verify/check_database";
         // document.location.href="http://localhost/ci/index.php/jeth/main";
           // $("#form_message").html(data.message).css({'background-color' : data.bg_color}).fadeIn('slow'); 

          }
           
        });
         return false;      
    });

    $(".tab-container").mouseover(function(){

    $(this).addClass("mouseoverbg").removeClass("mouseoutbg");
    var imgid = $(this).find(".tab-icon").attr('id');
    
      switch (imgid){
        case "attend-img":
        $(this).find(".tab-icon").attr('src','/kamahalan/assets/glyphicons/png/glyphicons_352_nameplate.png');
        break;
        case "forms-img":
        $(this).find(".tab-icon").attr('src','/kamahalan/assets/glyphicons/png/glyphicons_039_notes.png');
        break; 
        case "reports-img":
        $(this).find(".tab-icon").attr('src','/kamahalan/assets/glyphicons/png/glyphicons_036_file.png');
        break;
        case "profile-img":
        $(this).find(".tab-icon").attr('src','/kamahalan/assets/glyphicons/png/glyphicons_003_user.png');
        break;
        case "memo-img":
        $(this).find(".tab-icon").attr('src','/kamahalan/assets/glyphicons/png/glyphicons_049_star.png');
        break;
        case "calendar-img":
        $(this).find(".tab-icon").attr('src','/kamahalan/assets/glyphicons/png/glyphicons_045_calendar.png');
        break;
      }
    });

    $(".tab-container").mouseout(function(){
    $(this).addClass("mouseoutbg").removeClass("mouseoverbg");
      var imgid = $(this).find(".tab-icon").attr('id');
    
      switch (imgid){
        case "attend-img":
        $(this).find(".tab-icon").attr('src','/kamahalan/assets/glyphicons/png/white/glyphicons_352_nameplate.png');
        break;
        case "forms-img":
        $(this).find(".tab-icon").attr('src','/kamahalan/assets/glyphicons/png/white/glyphicons_039_notes.png');
        break; 
        case "reports-img":
        $(this).find(".tab-icon").attr('src','/kamahalan/assets/glyphicons/png/white/glyphicons_036_file.png');
        break;
        case "profile-img":
        $(this).find(".tab-icon").attr('src','/kamahalan/assets/glyphicons/png/white/glyphicons_003_user.png');
        break;
        case "memo-img":
        $(this).find(".tab-icon").attr('src','/kamahalan/assets/glyphicons/png/white/glyphicons_049_star.png');
        break;
        case "calendar-img":
        $(this).find(".tab-icon").attr('src','/kamahalan/assets/glyphicons/png/white/glyphicons_045_calendar.png');
        break;
      }
    });
     
    var load;
/**    function dtrload(){

     load =   setInterval(function(){
          $("#content").load("http://localhost/kamahalan/index.php/home/attend");    
       },2000);
   
    }**/
    $("#attend").stop(true,true).click(function(){
   //   dtrload();
    
       $("#content").load("/kamahalan/index.php/home/attend");  

    });
 
    $("#forms").stop(true,true).click(function(){
 //       window.clearInterval(load);   
        $("#content").load("/kamahalan/index.php/home/forms");
    });

      $("#profile").stop(true,true).click(function(){

     
      $("#content").load("/kamahalan/index.php/home/profile");  

    });
       $("#reports").stop(true,true).click(function(){
 //       window.clearInterval(load);   
        $("#content").load("/kamahalan/index.php/home/reports");
    });
        $("#aboutus").stop(true,true).click(function(){
 //       window.clearInterval(load);   
        $("#content").load("/kamahalan/index.php/home/aboutus");
    });
     $("#calendar").stop(true,true).click(function(){
       //window.clearInterval(load);   
       
       $("#content").load("/kamahalan/index.php/home/calendar");
    });



  $("#user-form-submit").unbind('click').click(function(){
    //alert($("#user-form").serialize());

    var r=confirm("Add User?");
    if(r==true){
    $.ajax({
      type: "POST",
      url: "/kamahalan/index.php/post/adduser",
      data: $("#user-form").serialize(),
      success:
        function(data){
                    //$("#user-form-success").show();
          var user = $("#uname").val();  
          var admin = 'You have successfuly added '+ user +' as an Administrator';
          if($("#type").val() == "Administrator"){
            
              $.pnotify({
                title: 'Success',
                text: admin,
                type: 'success'

              });
              
          }
          else{
              $.pnotify({
                title: 'Success',
                text: 'You have successfully added '+ user +' as Local user',
                type: 'success'

              });
            
              
          }
          
          $("#user-form input").attr("value","");

        }
       
    });
 }else{
     return false;
   }
  });  


  $("#signature-form-submit").click(function(){
//alert($(this).parent().parent().find(".userid").val());

   var r=confirm("Update the Profile?");
       if (r==true){
         $.ajax({
         type:"POST",
         url:"/kamahalan/index.php/post/updatesignature",
         data: $("#signature-form").serialize(),
         
         success:function(data){
         $.pnotify({
             title: 'Success',
             text: "You have successfully updated the forms' signatures",
             type: 'success'

              });
            }
            });
          }
           else{
            return false;
           }
        });
  
  $("#viewusers-tab").click(function(){
     $("#user-tab").show();
     $("#user").show();
     $("#formdefault").hide();
     $("#myaccount").hide();
     $("#holiday").hide(); 
     $("#tab1").load("/kamahalan/index.php/home/viewuser");
  });

  $("#viewuser-btn").stop(true,true).click(function(){
   // $("#myaccount").hide();
    $("#tab1").load("/kamahalan/index.php/home/viewuser");
  });


  $("#formsdefault-tab").stop(true,true).click(function(){
      $("#user").hide();
      $("#myaccount").hide();
      $("#formdefault").show();
      $("#holiday").hide(); 
  });
 $("#myaccount-tab").stop(true,true).click(function(){
      $("#user").hide();
      $("#myaccount").show();
      $("#formdefault").hide();
      $("#holiday").hide(); 
  });

 $("#holiday-form-submit").unbind('click').click(function(){
  //alert($("#holiday-form").serialize());
   var r=confirm("Add Holiday?");
       if (r==true){
         $.ajax({
         type:"POST",
         url:"/kamahalan/index.php/post/addholiday",
         data: $("#holiday-form").serialize(),
         
         success:function(data){
         $.pnotify({
             title: 'Success',
             text: "You have successfully add a holiday.",
             type: 'success'

              });
            }
            });
          }
           else{
            return false;
           }
 });
 
 $("#viewholiday-tab").click(function(){
    $("#holiday").show();
    $("#holiday-tab").show();
    $("#myaccount").hide();
    $("#user").hide();
    $("#formdefault").hide();
    $("#tab3").load("/kamahalan/index.php/home/viewholiday");
 });

 $("#viewholiday-btn").stop(true, true).click(function(){
    $("#tab3").load("/kamahalan/index.php/home/viewholiday");
 });
 
 $("#password-account").keyup(function(){
validate();
});
 $("#cpassword-account").keyup(function(){
validate();
});

function validate(){
var password = $("#password-account").val();
    var cpassword = $("#cpassword-account").val();
    if (password != cpassword){
       $("#notmatch-alert").fadeIn('slow');
        $("#match-alert").hide();
    }
    else{
       $("#match-alert").fadeIn('slow');
           $("#notmatch-alert").hide();
    }
}
$("#myaccount-form-submit").unbind('click').click(function(){

    var r = confirm("Update Your Account?");

  if (r==true){

    alert($("#myaccount-form").serialize());
    $.ajax({
      type: 'POST',
      url: "/kamahalan/index.php/post/updateaccount",
      data: $("#myaccount-form").serialize(), 

        success:function(data){
         $.pnotify({
             title: 'Success',
             text: "You have successfully updated your Account.",
             type: 'success'

              });
            }
    });
  }else{
    return false;
  }
});

});


