
<!DOCTYPE HTML PUBLIC "-//W3C//Dtd HTML 3.2//EN">

<HTML>
<HEAD>
	<link href="<?php echo base_url();?>assets/css/printForm.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/css/print.css" rel="stylesheet" media="print">
	<STYLE>
		<!-- 
		BODY,DIV,TABLE,THEAD,TBODY,TFOOT,tr,TH,td,P { font-family:"Liberation Sans"; font-size:x-small }
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
        if($result2) {
      ?>
<TABLE CELLSPACING="0" COLS="9" BORDER="0">
	<colgroup WIDTH="93"></colgroup>
	<colgroup WIDTH="71"></colgroup>
	<colgroup WIDTH="63"></colgroup>
	<colgroup WIDTH="67"></colgroup>
	<colgroup WIDTH="62"></colgroup>
	<colgroup WIDTH="81"></colgroup>
	<colgroup SPAN="3" WIDTH="70"></colgroup>

	<tr>
		<td COLSPAN=9 HEIGHT="83" ALIGN="CENTER" VALIGN=MIDDLE><br><IMG SRC="<?php echo base_url();?>assets/images/logo.jpg" WIDTH=634 HEIGHT=75 HSPACE=10 VSPACE=3>
		</td>
		</tr>
	<tr>
		<td COLSPAN=9 HEIGHT="19" ALIGN="CENTER" VALIGN=MIDDLE><B><div class="pcffont">DAILY TME RECORD REPORT<div></B></td>
		</tr>
	<tr>
		<td HEIGHT="19" ALIGN="CENTER" VALIGN=MIDDLE><br></td>
		<td ALIGN="LEFT"><br></td>
		<td ALIGN="LEFT"><br></td>
		<td ALIGN="LEFT"><br></td>
		<td ALIGN="LEFT"><br></td>
		<td ALIGN="LEFT"><br></td>
		<td ALIGN="LEFT"><br></td>
		<td ALIGN="LEFT"><br></td>
		<td ALIGN="LEFT"><br></td>
	</tr>
	<tr>
		<td HEIGHT="19" ALIGN="LEFT">Name:</td>
		<td STYLE="border-bottom: 1px solid #000000" COLSPAN=3 ALIGN="CENTER" VALIGN=MIDDLE> <?php echo $firstname." ".substr($middlename, 0, 1).". ".$lastname; ?>&nbsp;<br></td>
		<td ALIGN="LEFT"><br></td>
		<td COLSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE>Cover Period:</td>
		<td STYLE="border-bottom: 1px solid #000000" ALIGN="LEFT"><label><b>Fr:<?php echo $from; ?></b><b>To:<?php echo $to;?></b></label>&nbsp;<br></td>
		<td ALIGN="LEFT"><br></td>
	</tr>
	<tr>
		<td HEIGHT="19" ALIGN="LEFT">Employee #:</td>
		<td STYLE="border-bottom: 1px solid #000000" COLSPAN=3 ALIGN="CENTER" VALIGN=MIDDLE><br><?php echo $employeeno; ?></td>
		<td ALIGN="LEFT"><br></td>
		<td COLSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE>No. of Worked Days:</td>
		<td STYLE="border-bottom: 1px solid #000000" ALIGN="LEFT"><br> <?php echo ($days - $weekends - $holiday);?>&nbsp;</td>
		<td ALIGN="LEFT"><br></td>
	</tr>
	<tr>
		<td COLSPAN=9 HEIGHT="21" ALIGN="CENTER" VALIGN=MIDDLE><br></td>
		</tr>
	<tr>
		<td class="topbotleftright" HEIGHT="19" ALIGN="CENTER" VALIGN=MIDDLE><B>DATE</B></td>
		<td class="topbotleftright" COLSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE><B>TIME-IN</B></td>
		<td class="topbotleftright" COLSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE><B>TIME-OUT</B></td>
		<td class="topbotleftright" ALIGN="CENTER"><B>ABSENT</B></td>
		<td class="topbotleftright" ALIGN="CENTER"><B>SL</B></td>
		<td class="topbotleftright" ALIGN="CENTER"><B>SIL</B></td>
		<td class="topbotleftright" ALIGN="CENTER"><B>HOLIDAY</B></td>
	</tr>

	        <?php 
          $datecheck = "0000-00-00";
          $date = "0000-00-000";

          foreach ($result2 as $row) {

          $date = date('D M j, Y', strtotime($row->date));
          $dayname = date('D', strtotime($row->date));
          $timein = $row->timein;
          $timeout = $row->timeout;
          $status = $row->status;
          $sl = $row->sl;
          $vl = $row->vl;
          $user = $row->users;
          
          $showtimein="";
          $showtimeout = "";


               if($result3){
                foreach ($result3 as $row1) {
                  # code...
                  $datecheck = date('D M j, Y', strtotime($row1->date));
                  if($datecheck == $date){
                    $showholiday = "1";
                    $showtimeout="";
                    $showtimein = "";
                    $showstatus = "";
                    $color = "#C0C0C0";
                    $status = "";
                    $text = "#333333";
                  }else{
                     $showholiday="";  
                
                if($sl == 0){
                  $showsl="";
                }
                if($vl == 0){
                  $showvl="";
                }

                if(($dayname == "Sat") || ($dayname == "Sun") ){
                  $showstatus = "";
                  $color = "#C0C0C0";
                  $text = "#333333";
                  $sl="";
                  $vl="";
                  $showtimein= "";
                  $showtimeout = "";
                 
                }else{
                  $showtimeout=strftime("%I:%M %p",strtotime($timeout));
                  $showtimein=strftime("%I:%M %p",strtotime($timein));
                  if($status == "Absent"){
                 
                  $showstatus = "1";
                  $color = "#CD5C5C";
                  $text = "black";
                }else{
                  
                  $showstatus = "";
                $color = "white";
                $text = "black";
                }
                  
                }//
              }
          
            }
        ?>
	<tr>
		<td class="topbotleftright" HEIGHT="19" ALIGN="CENTER" SDVAL="41375" SDNUM="13321;0;MM/DD/YY"><?php echo $date; ?> &nbsp;</td>
		<td class="topbotleftright" COLSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE SDVAL="0.333333333333333" SDNUM="13321;0;HH:MM:SS AM/PM"><?php echo $showtimein; ?> &nbsp;</td>
		<td class="topbotleftright" COLSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE SDVAL="0.875" SDNUM="13321;0;HH:MM:SS AM/PM"><?php echo $showtimeout; ?> &nbsp;</td>
		<td class="topbotleftright" ALIGN="CENTER" SDVAL="1" SDNUM="13321;"><?php echo $showstatus; ?> &nbsp;</td>
		<td class="topbotleftright" ALIGN="CENTER" SDVAL="0" SDNUM="13321;"><?php echo $showsl; ?> &nbsp;</td>
		<td class="topbotleftright" ALIGN="CENTER" SDVAL="0" SDNUM="13321;"><?php echo $showvl; ?> &nbsp;</td>
		<td class="topbotleftright" ALIGN="CENTER" SDVAL="0" SDNUM="13321;"><?php echo $showholiday; ?> &nbsp;</td>
	</tr>

        <?php   
          }
           } ?>  
	<tr>
		<td class="topbotleftright" COLSPAN=5 HEIGHT="19" ALIGN="CENTER" VALIGN=MIDDLE><B>TOTAL</B></td>
		<td class="topbotleftright" ALIGN="CENTER" SDVAL="1" SDNUM="13321;"><?php echo $absent; ?> &nbsp;</td>
		<td class="topbotleftright" ALIGN="CENTER" SDVAL="0" SDNUM="13321;"><?php echo $sl; ?> &nbsp;</td>
		<td class="topbotleftright" ALIGN="CENTER" SDVAL="0" SDNUM="13321;"><?php echo $vl; ?> &nbsp;</td>
		<td class="topbotleftright" ALIGN="CENTER" SDVAL="0" SDNUM="13321;"><?php echo $holiday; ?>&nbsp;</td>
	</tr>
	<tr>
		<td HEIGHT="19" ALIGN="CENTER" VALIGN=MIDDLE><br></td>
		<td ALIGN="LEFT"><br></td>
		<td ALIGN="LEFT"><br></td>
		<td ALIGN="LEFT"><br></td>
		<td ALIGN="LEFT"><br></td>
		<td ALIGN="LEFT"><br></td>
		<td ALIGN="LEFT"><br></td>
		<td ALIGN="LEFT"><br></td>
		<td ALIGN="LEFT"><br></td>
	</tr>
	<tr>
		<td HEIGHT="19" ALIGN="LEFT">Days Worked:</td>
		<td STYLE="border-bottom: 1px solid #000000" COLSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE SDVAL="1" SDNUM="13321;"><?php echo $present;/*d pa kamasa ung ob*/ ?></td>
		<td ALIGN="LEFT"><br></td>
		<td ALIGN="LEFT"><br></td>
		<td ALIGN="LEFT"><br></td>
		<td ALIGN="LEFT"><br></td>
		<td ALIGN="LEFT"><br></td>
		<td ALIGN="LEFT"><br></td>
	</tr>
	<tr>
		<td HEIGHT="19" ALIGN="LEFT">Days Count:</td>
		<td STYLE="border-bottom: 1px solid #000000" COLSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE SDVAL="1" SDNUM="13321;"><?php echo $present+$sl+$vl+$holiday; /*WALA PANG OB NA KASAMA!*/?></td>
		<td ALIGN="LEFT"><br></td>
		<td ALIGN="LEFT"><br></td>
		<td ALIGN="LEFT"><br></td>
		<td ALIGN="LEFT"><br></td>
		<td ALIGN="LEFT"><br></td>
		<td ALIGN="LEFT"><br></td>
	</tr>
	<tr>
		<td HEIGHT="19" ALIGN="CENTER" VALIGN=MIDDLE><br></td>
		<td ALIGN="LEFT"><br></td>
		<td ALIGN="LEFT"><br></td>
		<td ALIGN="LEFT"><br></td>
		<td ALIGN="LEFT"><br></td>
		<td ALIGN="LEFT"><br></td>
		<td ALIGN="LEFT"><br></td>
		<td ALIGN="LEFT"><br></td>
		<td ALIGN="LEFT"><br></td>
	</tr>
	<tr>
		<td HEIGHT="19" ALIGN="LEFT"><div class="pcffont">Prepared by:<div></td>
		<td STYLE="border-bottom: 1px solid #000000" COLSPAN=3 ALIGN="CENTER" VALIGN=MIDDLE><div class="pcffont">Edwin Perez<div></td>
		<td ALIGN="LEFT"><br></td>
		<td ALIGN="LEFT">Checked by:</td>
		<td STYLE="border-bottom: 1px solid #000000" COLSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE>Ma Reyna Moya</td>
		<td ALIGN="LEFT"><br></td>
	</tr>
	<tr>
		<td HEIGHT="19" ALIGN="CENTER" VALIGN=MIDDLE><div class="pcffont"><br><div></td>
		<td ALIGN="LEFT"><div class="pcffont"><br><div></td>
		<td ALIGN="LEFT"><div class="pcffont"><br><div></td>
		<td ALIGN="LEFT"><div class="pcffont"><br><div></td>
		<td ALIGN="CENTER" SDNUM="13321;0;#,##0.00"><div class="pcffont"><br><div></td>
		<td ALIGN="LEFT"><div class="pcffont"><br><div></td>
		<td ALIGN="LEFT"><div class="pcffont"><br><div></td>
		<td ALIGN="LEFT"><div class="pcffont"><br><div></td>
		<td ALIGN="LEFT"><br></td>
	</tr>
	<tr>
		<td HEIGHT="19" ALIGN="LEFT"><div class="pcffont">Approved by:<div></td>
		<td STYLE="border-bottom: 1px solid #000000" COLSPAN=3 ALIGN="CENTER" VALIGN=MIDDLE><div class="pcffont">Rosalinda Tsang<div></td>
		<td ALIGN="CENTER" SDNUM="13321;0;#,##0.00"><div class="pcffont"><br><div></td>
		<td ALIGN="LEFT"><div class="pcffont"><br><div></td>
		<td ALIGN="LEFT"><div class="pcffont"><br><div></td>
		<td ALIGN="LEFT"><div class="pcffont"><br><div></td>
		<td ALIGN="LEFT"><br></td>
	</tr>
</TABLE>

      <?php }else{?>

               <div id="alert" class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span><strong>0 result.</strong> No record Found</span>
                </div>

      <?php }?>
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