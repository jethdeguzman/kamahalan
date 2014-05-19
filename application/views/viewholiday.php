<style>
#tab3{
    height: 200px;
    overflow-y:scroll;
}
#tab3 table tr td a{
    color:white;
}

#viewholiday-table thead tr th{
  
    color:white;
}
#viewholiday-table tbody tr td {
    color:#3072A1;
}

</style>
<table id="viewholiday-table" class="table  table-hover" >
    <thead>
        <tr>
            <th>Date</th>
            <th>Holiday</th>   
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if($result){ 
        foreach ($result as $row) { 
            $date = date('M j', strtotime($row->date));
            $title = $row->title;
          ?>
        <tr>
            <td><?php echo $date; ?></td>
            <td><?php echo $title; ?></td>
            <input class="holidayid" type="hidden" value="<?php echo $row->id?>">
            <td> <a href="#" class="btn btn-danger btn-small deleteholiday-button" >Delete</a></td>
        
        </tr>
        <?php 
      }
    }else{ ?>
      <tr>
        <td colspan="3">No Items</td>
      </tr>
    <?php }?>
    </tbody>
  </table>                     

<script>
$(".deleteholiday-button").click(function(){
alert($(this).parent().parent().find(".holidayid").val());
                          var x;
                          var r=confirm("Delete Holiday?");
                          if (r==true){
                            $.ajax({  
                              url: "/kamahalan/index.php/post/deleteholiday/"+$(this).parent().parent().find(".holidayid").val(),
                              success:
                              function(){
                                $.pnotify({
                                        title: 'Success',
                                        text: 'successfuly deleted a holiday',
                                        type: 'success'

                                      });
                                 $("#tab3").load("/kamahalan/index.php/home/viewholiday");      
                              }
                            });
                          }
                          else{
                         $("#holiday-tab").show();
                           }
                          document.getElementById("demo").innerHTML=x;
                          return false;
                        });

</script>



