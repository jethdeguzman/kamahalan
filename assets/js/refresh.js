
function profileupload(id){
		
    $("#headerinfo").load("/kamahalan/index.php/home/refreshheaderinfo/"+id);
    $("#content").load("/kamahalan/index.php/home/profileupload"); 
    
  }
function profiledetails(id){
  $("#headerinfo").load("/kamahalan/index.php/home/refreshheaderinfo/"+id);
}

   $(document).ready(function(){




   $("#refresh").stop(true,true).click(function(){
 

     $("#content").load("/kamahalan/index.php/home/attend");  

    });

   $(".cancel-btn").stop(true,true).click(function(){

   		$("#content").load("/kamahalan/index.php/home/profile");  

   });

			$("#uploadpicture-btn").stop(true,true).click(function(){
					$("#content").load("/kamahalan/index.php/home/profileupload");  
			});


});