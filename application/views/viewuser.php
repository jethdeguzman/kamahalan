<style>
#tab1{
    height: 200px;
    overflow-y:scroll;
}
#tab1 table tr td a{
    color:white;
}

#viewuser-table thead tr th{
  
    color:white;
}
#viewuser-table tbody tr td {
    color:#3072A1;
}

</style>
<table id="viewuser-table" class="table  table-hover" >
    <thead>
        <tr>
            <th>Username</th>
            <th>Status</th>
            <th>Type</th>   
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($query as $row) { ?>
        <tr>
            <td><?php echo $row->username;?></td>
            <td><?php echo $row->status;?></td>
            <td><?php echo $row->type;?></td>
            <input class="userid" type="hidden" value="<?php echo $row->id?>">
            <td><a href="#viewprofilemodal" class="btn btn-primary btn-small viewprofile-btn" data-toggle="modal">View Profile</a>
             <a href="#" class="btn btn-danger btn-small deleteuser-button" >Delete</a></td>
        
        </tr>
        <?php }?>
    </tbody>
  </table>

<div id="viewprofilemodal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  
</div>
                     

<script>
$(".deleteuser-button").click(function(){
//alert($(this).parent().parent().find(".userid").val());
                          var x;
                          var r=confirm("Delete User?");
                          if (r==true){
                            $.ajax({  
                              url: "/kamahalan/index.php/post/deleteuser/"+$(this).parent().parent().find(".userid").val(),
                              success:
                              function(){
                                $.pnotify({
                                        title: 'Success',
                                        text: 'successfuly deleted a user',
                                        type: 'success'

                                      });
                                 $("#tab1").load("/kamahalan/index.php/home/viewuser");      
                              }
                            });
                          }
                          else{
                         $("#user-tab").show();
                           }
                          document.getElementById("demo").innerHTML=x;
                          return false;
                        });
$(".viewprofile-btn").click(function(){
  var id = $(this).parent().parent().find(".userid").val();
  $("#viewprofilemodal").load("/kamahalan/index.php/home/viewprofile/"+id);
});
</script>



