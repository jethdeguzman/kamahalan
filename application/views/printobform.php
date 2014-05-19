

<html><head>
	<title>OB Form</title>
    <link href="<?php echo base_url();?>assets/css/printForm.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/print.css" rel="stylesheet" media="print">
	<style>

		<!-- 
		BODY,DIV,TABLE,THEAD,TBODY,TFOOT,TR,TH,TD,P { font-family:"Nimbus Sans L"; font-size:x-small }
		 -->
	</style>
	
</head>

 <div class="print">
 <a href="http://www.printfriendly.com" style="color:#6D9F00;text-decoration:none;" class="printfriendly" onclick="window.print();return false;" title="Printer Friendly and PDF">
	<img style="border:none;" src="<?php echo base_url();?>assets/images/print.png" style="position: relative; top: 10px; left: 500px;" alt="Print Friendly and PDF"/></a>
</div>

<body text="#000000">
<table border="0" cellspacing="0" cols="7">
	<colgroup width="114"></colgroup>
	<colgroup width="86"></colgroup>
	<colgroup span="4" width="88"></colgroup>
	<colgroup width="106"></colgroup>
	<tbody><tr>
		<td colspan="7" valign="MIDDLE" height="83" align="CENTER"><br><img src="<?php echo base_url();?>assets/images/logo.jpg" vspace="8" width="598" height="67" hspace="33">
		</td>
		</tr>
	<tr>
		<td class="alignmidcenter" colspan="7" height="17" ><b>OFFICIAL BUSINESS</b></td>
		</tr>
	<tr>
		<td class="alignmidcenter" colspan="7" height="17" >201B FORM NO. 02</td>
		</tr>
	<tr>
		<td class="alignmidcenter" colspan="7"  height="10"><br></td>
		</tr>
	<tr>
		<td class="topleftright" colspan="3" valign="MIDDLE" height="17" align="LEFT"><b>Name of Employee:</b></td>
		<td class="topleftright" colspan="2" valign="MIDDLE" align="LEFT"><b>Designation</b></td>
		<td class="topleftright" colspan="2" valign="MIDDLE" align="LEFT"><b>Date Prepared</b></td>
		</tr>
	<tr>
		<td class="botleftright" colspan="3" valign="MIDDLE" height="17" align="CENTER"><b><div class="fontob"><?php echo $firstname.' '.$lastname;?></div></b></td>
		<td class="botleftright" colspan="2" valign="MIDDLE" align="CENTER"><b><div class="fontob"><?php echo $position;?></div></b></td>
		<td class="botleftright" colspan="2"  valign="MIDDLE" align="CENTER"><b><div class="fontob"><?php if($status=="none"){ echo date('Y-m-d'); }else{ echo $dateprep; }  ?></divb></td>
		</tr>
	<tr>
		<td class="topleftright" colspan="3" valign="MIDDLE" height="17" align="LEFT"><b>Location of Appointment</b></td>
		<td class="topleftright" colspan="2" valign="MIDDLE" align="LEFT"><b>Date of Appointment</b></td>
		<td class="topleftright" colspan="2" valign="MIDDLE" align="LEFT"><b>Time of Appointment:</b></td>
		</tr>
	<tr>
		<td class="botleftright" colspan="3" valign="MIDDLE" height="17" align="CENTER"><b><div class="fontob"><?php echo $location1; echo "  /  ";echo $location2; ?></div></b></td>
		<td class="botleftright" colspan="2" sdval="41354" sdnum="13321;0;MM/DD/YY" valign="MIDDLE" align="CENTER"><b><div class="fontob"><?php echo $dateappo; ?></b></td>
		<td style="border-bottom: 1px solid rgb(0, 0, 0); border-left: 1px solid rgb(0, 0, 0);" valign="MIDDLE" align="CENTER"><b><div class="fontob">
			<?php if($status <> "none"){ echo strftime("%I",strtotime($timestart)); } else{ echo date("g"); } ?>:
			<?php if($status <> "none"){ echo strftime("%M",strtotime($timestart)); } else{ echo date("i"); } ?> 
 			<?php if($status <> "none"){ echo strftime("%p",strtotime($timeend)); } ?>

		</b></td>
		<td style="border-bottom: 1px solid rgb(0, 0, 0); border-right: 1px solid rgb(0, 0, 0);" align="LEFT"><b><div class="fontob">
			to 
			<?php if($status <> "none"){ echo strftime("%I",strtotime($timeend)); } else{ echo date("g"); } ?>:
			<?php if($status <> "none"){ echo strftime("%M",strtotime($timeend)); } else{ echo date("i"); } ?> 
			<?php if($status <> "none"){ echo strftime("%p",strtotime($timeend)); } ?>
		</div></b></td>
	</tr>
	<tr>
		<td class="topleftright" colspan="3" valign="MIDDLE" height="17" align="LEFT"><b>Time Start of Apportment:</b></td>
		<td class="topleftright" colspan="4" valign="MIDDLE" align="LEFT"><b>Time End of Approintment:</b></td>
		</tr>
	<tr>
		<td class="botleftright" colspan="3" valign="MIDDLE" height="17" align="CENTER"><b><div class="fontob" id="ampmtimein1" class="time-input" onchange="change('#ampmtimein')" name="ampmtimein" >
			<?php if($status <> "none"){ echo strftime("%I",strtotime($timestart)); } else{ echo date("g"); } ?>:
			<?php if($status <> "none"){ echo strftime("%M",strtotime($timestart)); } else{ echo date("i"); } ?> 
 			<?php if($status <> "none"){ echo strftime("%p",strtotime($timeend)); } ?>
		</div>
		</b>
		</td>
 

		<td class="botleftright" colspan="4" valign="MIDDLE" align="CENTER"><b>
		 <div class="fontob" id="ampmtimeout1" class="time-input" onchange="change('#ampmtimeout')" name="ampmtimein">
			<?php if($status <> "none"){ echo strftime("%I",strtotime($timeend)); } else{ echo date("g"); } ?>:
			<?php if($status <> "none"){ echo strftime("%M",strtotime($timeend)); } else{ echo date("i"); } ?> 
			<?php if($status <> "none"){ echo strftime("%p",strtotime($timeend)); } ?>
		        
		</div></b>
	    </td>
		</tr>

	<tr>
		<td class="topleftright" colspan="7" valign="MIDDLE" height="17" align="LEFT"><b>Purpose:</b></td>
		</tr>
	<tr>
		<td class="botleftright" colspan="7" rowspan="2" valign="MIDDLE" height="34" align="CENTER"><b><div class="fontob"><?php echo $purpose; ?></div></b></td>
		</tr>
	<tr>
		</tr>
	<tr>
		<td colspan="7" valign="MIDDLE" height="10" align="LEFT"><b><br></b></td>
		</tr>
	<tr>
		<td colspan="7" valign="MIDDLE" height="17" align="CENTER"><b>Details of Travel Expense</b></td>
		</tr>
	<tr>
		<td colspan="7" valign="MIDDLE" height="10" align="CENTER"><b><br></b></td>
		</tr>
	<tr>
		<td class="expenses" height="17" ><b>Vehicle</b></td>
		<td class="expenses" align="CENTER"><b>Ref. No.</b></td>
		<td class="expenses" colspan="2" ><b>From</b></td>
		<td class="expenses" colspan="2"><b>To</b></td>
		<td class="expenses" ><b>Amount Paid</b></td>
	</tr>

	  <?php if(($status <> "none")&&(!$empty)){?>
           <tbody id="row" >
         <?php foreach ($result4 as $row) {
         
          ?>
	<tr>
		<td class="expenses" height="17" ><b><div class="fontob"><?php echo $row->vehicle;?></div></b></td>
		<td class="expenses" colspan="1" ><b><div class="fontob"><?php echo $row->refno; ?></div></b></td>
		<td class="expenses" colspan="2" ><b><div class="fontob"><?php echo $row->fromlocation;?></div></b></td>
		<td class="expenses" colspan="2" ><b><div class="fontob"><?php echo $row->tolocation;?></div></b></td>
		<td class="expenses" sdval="2300"><b><div class="fontob"><?php echo $row->amount;?></div></b></td>
	</tr>
	        <?php } ?>

        </tbody>
       
        <?php  }else{ ?>

          <tbody id="row" >
        </tbody>

        <?php } ?>


	<tr>
		<td class="expenses" colspan="6" valign="MIDDLE" height="17" align="CENTER"><b>Total Amount Paid</b></td>
		<td class="expenses" sdval="3400" sdnum="13321;" align="CENTER"><b><div class="fontob"><?php echo $totalamount;?></div></b></td>
	</tr>
	<tr>
		<td colspan="7" valign="MIDDLE" height="17" align="LEFT">*
 Note: This form should be accompanied by Fund Reimbursement Form and 
for Business Appointments, minutes of meeting should be attached.</td>
		</tr>
	<tr>
		<td colspan="7" rowspan="2" valign="MIDDLE" height="28" align="CENTER"><br></td>
		</tr>
	<tr>
		</tr>
	<tr>
		<td height="17" align="LEFT">Prepared by:</td>
		<td class="bot" colspan="2" valign="MIDDLE" align="CENTER"><?php echo $firstname.' '.$lastname;?></td>
		<td align="LEFT"><br></td>
		<td align="LEFT">Checked by:</td>
		<td class="bot" colspan="2" valign="MIDDLE" align="CENTER"><?php echo $checkedbyname; ?></td>
		</tr>
	<tr>
		<td colspan="7" rowspan="2" valign="MIDDLE" height="28" align="CENTER"><br></td>
		</tr>
	<tr>
		</tr>
	<tr>
		<td height="17" align="LEFT">Approved by:</td>
		<td class="bot" colspan="2" valign="MIDDLE" align="CENTER"><?php echo $approvedbyname; ?></td>
		<td colspan="4" valign="MIDDLE" align="CENTER"><br></td>
		</tr>
	
</tbody></table>
</body></html>


<script>
var pfHeaderImgUrl = '';
var pfHeaderTagline = '';
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
