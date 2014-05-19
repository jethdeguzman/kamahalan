
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2//EN">

<HTML>
<HEAD>
	<link href="<?php echo base_url();?>assets/css/printForm.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/css/print.css" rel="stylesheet" media="print">
	<STYLE>
		<!-- 
		BODY,DIV,TABLE,THEAD,TBODY,TFOOT,TR,TH,TD,P { font-family:"Liberation Sans"; font-size:x-small }
		 -->
	</STYLE>
	
</HEAD>

<BODY TEXT="#000000">

	<table>
		<div class="print" ALIGN="CENTER" VALIGN=MIDDLE>
		 <a href="http://www.printfriendly.com" style="color:#6D9F00;text-decoration:none;" class="printfriendly" onclick="window.print();return false;" title="Printer Friendly and PDF">
		<img style="border:none;" src="<?php echo base_url();?>assets/images/print.png" style="position: relative; top: 10px; left: 500px;" alt="Print Friendly and PDF"/></a>
		</div>
	</table>
 <?php
  if($result5){
      ?>
<TABLE CELLSPACING="0" COLS="8" BORDER="0">

	<COLGROUP WIDTH="102"></COLGROUP>
	<COLGROUP WIDTH="125"></COLGROUP>
	<COLGROUP SPAN="6" WIDTH="69"></COLGROUP>
	<TR>
		<TD COLSPAN=8 HEIGHT="83" ALIGN="CENTER" VALIGN=MIDDLE><BR><IMG SRC="<?php echo base_url();?>assets/images/logo.jpg" WIDTH=629 HEIGHT=67 HSPACE=9 VSPACE=8>
		</TD>
		</TR>
	<TR>
		<TD COLSPAN=8 HEIGHT="17" ALIGN="CENTER" VALIGN=MIDDLE><BR></TD>
		</TR>
	<TR>
		<TD COLSPAN=8 HEIGHT="17" ALIGN="CENTER" VALIGN=MIDDLE><B>PCF Replenishment Report</B></TD>
		</TR>
	<TR>
		<TD COLSPAN=8 HEIGHT="17" ALIGN="CENTER" VALIGN=MIDDLE><BR></TD>
		</TR>
	<TR>
		<TD HEIGHT="17" ALIGN="CENTER"><B>Cover Period: </B></TD>
		<TD class="bot" COLSPAN=3 ALIGN="CENTER" VALIGN=MIDDLE><BR> <?php echo $from." "."to"." ".$to; ?>&nbsp;</TD>

		<TD COLSPAN=4 ALIGN="CENTER" VALIGN=MIDDLE><BR></TD>
		</TR>
	<TR>
		<TD COLSPAN=8 HEIGHT="17" ALIGN="CENTER" VALIGN=MIDDLE><BR></TD>
		</TR>


	<TR>
		<TD class="topbotleftright" ROWSPAN=2 HEIGHT="34" ALIGN="CENTER" VALIGN=MIDDLE><B>Date</B></TD>
		<TD class="topbotleftright" ROWSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE><B>Employee</B></TD>
		<TD class="topbotleftright" ROWSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE><B>Transpo</B></TD>
		<TD class="topbotleftright" ROWSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE><B>Food </B></TD>
		<TD class="topleftright" ALIGN="CENTER"><B>Commu-</B></TD>
		<TD class="topbotleftright" ROWSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE><B>Supplies</B></TD>
		<TD class="topbotleftright" ROWSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE><B>Misc</B></TD>
		<TD class="topbotleftright" ROWSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE><B>Total</B></TD>
	</TR>
	<TR>
		<TD STYLE="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN="CENTER"><B>nication</B></TD>
		</TR>

				  <?php
			$totaltranspo = 0;

			$totalfood = 0;
			$totalcomm = 0;
			$totalsupplies = 0;
			$totalmisc = 0;
			$totalrow2 = 0;
			  foreach ($result5 as $row) {

			$totalrow = 0; 
			    $date = $row->date1;
			    $users  = $row->users;
			    $name = $this->post_model->getprofile($users);
			    //echo  $row->date1." ".$row->users."<br>";

			    $transpo = $this->post_model->getpcfreplenish2($users, $date , 'Transportation');
			    $supplies = $this->post_model->getpcfreplenish3($users, $date, 'Supplies');
			    $food = $this->post_model->getpcfreplenish4($users, $date, 'Food');
			    $comm = $this->post_model->getpcfreplenish5($users, $date, 'Communication');
			    $misc = $this->post_model->getpcfreplenish5($users, $date, 'Misc.');

    		?>


<!--answer table-->
	<TR>
		<TD class="topbotleftright" HEIGHT="17" ALIGN="CENTER"><?php echo $date;?>&nbsp;</TD>
		<TD class="topbotleftright" ALIGN="CENTER"><?php echo $name->lastname." ".$name->firstname;?>&nbsp;</TD>

   <?

   	if($transpo){
	      foreach ($transpo as $row) { 
	      	$totalrow = $totalrow + $row->total; 
	        $totalrow2 = $totalrow2 + $row->total;
	        $totaltranspo = $totaltranspo + $row->total;
	       ?>
			<td class="topbotleftright" ALIGN="CENTER"><label><?php echo $row->total; ?>&nbsp;</label></td>

	    <?  }
	    }else{ ?> 
			<td class="topbotleftright" ALIGN="CENTER"><label>-</label></td>
		<? } 


     if($food){
	      foreach ($food as $row)  { 
	      	$totalrow = $totalrow + $row->total; 
	        $totalrow2 = $totalrow2 + $row->total;
	        $totalfood = $totalfood +  $row->total;
	        ?>
	       
	    <td class="topbotleftright" ALIGN="CENTER"><label><?php echo $row->total; ?>&nbsp;</label></td>
	     <? } 
	    }else{ ?>

	    <td class="topbotleftright" ALIGN="CENTER"><label>-</label></td>

	    <? }   
	 	 if($comm){
		      foreach ($comm as $row)  { 
		      $totalrow = $totalrow + $row->total;
		      $totalrow2 = $totalrow2 + $row->total;
		      $totalcomm = $totalcomm +  $row->total;
		      ?>
		  <td class="topbotleftright" ALIGN="CENTER"><label><?php echo $row->total; ?>&nbsp;</label></td>
		      
		   <?   } 
		    }else{ ?>
		  <td class="topbotleftright" ALIGN="CENTER"><label>-</label></td>
	    <? } 
		   
	  	 if($supplies){
		      foreach ($supplies as $row) { 
		      	$totalrow = $totalrow + $row->total;
		        $totalrow2 = $totalrow2 + $row->total;
		        $totalsupplies = $totalsupplies + $row->total;
		    ?>
		             
		    <td class="topbotleftright" ALIGN="CENTER"><label><?php echo $row->total;?>&nbsp;</label></td>
				<? } 
		    } else{ ?>
			<td class="topbotleftright" ALIGN="CENTER"><label>-</label></td>
		    	<? } 

		if($misc){
	      foreach ($misc as $row) { 
	      	$totalrow = $totalrow + $row->total;
	        $totalrow2 = $totalrow2 + $row->total;
	        $totalmisc = $totalmisc + $row->total;
	        ?>
	             
	        <td class="topbotleftright" ALIGN="CENTER"><label><?php echo $row->total;?>&nbsp;</label></td>   
			   <?   } 
			    }else{ ?>
			      <td class="topbotleftright" ALIGN="CENTER"><label>-</label></td>
			    <? }
		    	  ?>
		<TD class="topbotleftright" ALIGN="CENTER"><?php echo $totalrow; ?>&nbsp;</TD>
	</TR>
 <? } ?>

	<TR>
		<TD class="topbotleftright" COLSPAN=2 HEIGHT="17" ALIGN="CENTER" VALIGN=MIDDLE><B>TOTAL</B></TD>
<!--ttranspo--><TD class="topbotleftright" ALIGN="CENTER" ><?php echo $totaltranspo;?>&nbsp;</TD>
<!--tfood-->	  <TD class="topbotleftright" ALIGN="CENTER"><?php echo $totalfood;?>&nbsp;</TD>
<!--tcommuni--><TD class="topbotleftright" ALIGN="CENTER"><?php echo $totalcomm;?>&nbsp;</TD>
<!--tsupplie--><TD class="topbotleftright" ALIGN="CENTER"><?php echo $totalsupplies;?>&nbsp;</TD>
<!--tmiscell-->		<TD class="topbotleftright" ALIGN="CENTER"><?php echo $totalmisc;?>&nbsp;</TD>
<!--ttotal  --><TD class="topbotleftright" ALIGN="CENTER" ><?php echo $totalrow2;?>&nbsp;</TD>
	</TR>


	<TR>
		<TD COLSPAN=8 HEIGHT="42" ALIGN="CENTER" VALIGN=MIDDLE><BR></TD>
		</TR>
	<TR>
		<TD COLSPAN=2 HEIGHT="17" ALIGN="CENTER" VALIGN=MIDDLE><B>Prepared By:</B></TD>
		<TD COLSPAN=3 ALIGN="CENTER" VALIGN=MIDDLE><B>Checked By:</B></TD>
		<TD COLSPAN=3 ALIGN="CENTER" VALIGN=MIDDLE><B>Approved By:</B></TD>
		</TR>
	<TR>
		<TD COLSPAN=2 HEIGHT="33" ALIGN="CENTER" VALIGN=MIDDLE><BR></TD>
		<TD COLSPAN=3 ALIGN="CENTER" VALIGN=MIDDLE><BR></TD>
		<TD COLSPAN=3 ALIGN="CENTER" VALIGN=MIDDLE><BR></TD>
		</TR>
	<TR>
		<TD COLSPAN=2 HEIGHT="17" ALIGN="CENTER" VALIGN=MIDDLE><B>Ma. Reyna Moya</B></TD>
		<TD COLSPAN=3 ALIGN="CENTER" VALIGN=MIDDLE><B><?php echo $checkedbyname;?></B></TD>
		<TD COLSPAN=3 ALIGN="CENTER" VALIGN=MIDDLE><B><?php echo $approvedbyname;?></B></TD>
		</TR>
	<TR>
		<TD COLSPAN=2 HEIGHT="17" ALIGN="CENTER" VALIGN=MIDDLE>Admin and Business</TD>
		<TD COLSPAN=3 ALIGN="CENTER" VALIGN=MIDDLE><?php echo $checkedbyposition;?></TD>
		<TD COLSPAN=3 ALIGN="CENTER" VALIGN=MIDDLE><?php echo $approvedbyposition;?></TD>
		</TR>
</TABLE>

 <?php  }else{ ?>
    <div id="alert" class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span><strong>0 result.</strong> No record Found</span>
                </div>
 <?php }
  ?>

</BODY>

</HTML>

<script>
//var pfHeaderImgUrl = '';
//var pfHeaderTagline = '';
var pfdisableClickToDel = 0;
var pfHideImages = 0;
var pfImageDisplayStyle = 'none';
var pfDisablePDF = 0;
var pfDisableEmail = 0;
var pfDisablePrint = 0;
var pfCustomCSS = '';
var pfBtVersion='1';

(function(){
	var js, pf;pf = document.createElement('script');
	pf.type = 'text/javascript';
	if('https:' == document.location.protocol){
		//js='<?php echo base_url();?>assets/js/main.js'
	}

	else{
		//js='<?php echo base_url();?>assets/js/printfriendly.js'
	}

	pf.src=js;document.getElementsByTagName('head')[0].appendChild(pf)

})
();

</script>
