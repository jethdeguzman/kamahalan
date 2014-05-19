<HTML>
<HEAD>
	
<link href="<?php echo base_url();?>assets/css/printForm.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/print.css" rel="stylesheet" media="print">
	
	<STYLE>
		<!-- 
		BODY,DIV,TABLE,THEAD,TBODY,TFOOT,TR,TH,TD,P { font-family:"Nimbus Sans L"; font-size:x-small }
		 -->
	</STYLE>
	
</HEAD>

 <div class="print">
 <a href="http://www.printfriendly.com" style="color:#6D9F00;text-decoration:none;" class="printfriendly" onclick="window.print();return false;" title="Printer Friendly and PDF">
	<img style="border:none;" src="<?php echo base_url();?>assets/images/print.png" style="position: relative; top: 10px; left: 500px;" alt="Print Friendly and PDF"/></a>
</div>

<BODY TEXT="#000000">
<TABLE CELLSPACING="0" COLS="10" BORDER="0">
	<colgroup WIDTH="86"></colgroup>
	<colgroup WIDTH="176"></colgroup>
	<colgroup WIDTH="69"></colgroup>
	<colgroup WIDTH="150"></colgroup>
	<colgroup WIDTH="72"></colgroup>
	<colgroup WIDTH="76"></colgroup>
	<colgroup WIDTH="86"></colgroup>
	<colgroup WIDTH="15"></colgroup>
	<colgroup SPAN="2" WIDTH="86"></colgroup>
	<TR>
		<TD COLSPAN=8 HEIGHT="98" ALIGN="CENTER" VALIGN=MIDDLE><FONT FACE="Arial"><BR><IMG SRC="<?php echo base_url();?>assets/images/logo.jpg" WIDTH=700 HEIGHT=82 HSPACE=10 VSPACE=8>
		</div></TD>
		<TD ALIGN="LEFT"><FONT FACE="Arial"><BR></div></TD>
		<TD ALIGN="LEFT"><FONT FACE="Arial"><BR></div></TD>
	</TR>
	<TR>
		<TD COLSPAN=8 HEIGHT="14" ALIGN="CENTER" VALIGN=MIDDLE><B><div class="pcffont">FUND REIMBURSEMENT SUMMARY FORM</div></B></TD>
		<TD ALIGN="LEFT"><BR></TD>
		<TD ALIGN="LEFT"><BR></TD>
	</TR>
	<TR>
		<TD COLSPAN=8 HEIGHT="14" ALIGN="CENTER" VALIGN=MIDDLE><B><div class="pcffont">ADMIN FORM NO. 01</div></B></TD>
		<TD ALIGN="LEFT"><BR></TD>
		<TD ALIGN="LEFT"><BR></TD>
	</TR>
	<TR>
		<TD COLSPAN=8 HEIGHT="10" ALIGN="CENTER" VALIGN=MIDDLE><BR></TD>
		<TD ALIGN="LEFT"><BR></TD>
		<TD ALIGN="LEFT"><BR></TD>
	</TR>
	<TR>
		<TD HEIGHT="14" ALIGN="JUSTIFY"><div class="pcffont">Name:</div></TD>
		<TD class="bot" COLSPAN=3 ALIGN="CENTER" VALIGN=MIDDLE><div class="pcffont"><?php echo $firstname.' '.$lastname;?></div></TD>
		<TD ALIGN="CENTER" ><BR></TD>
		<TD ALIGN="LEFT"><div class="pcffont">Date:</div></TD>
		<TD class="bot" ALIGN="CENTER" ><div class="pcffont"><?php if($status=="none"){ echo date('Y-m-d'); }else{ echo $dateprep; }  ?></div></TD>
		<TD ALIGN="LEFT"><FONT SIZE=1><BR></div></TD>
		<TD ALIGN="LEFT"><BR></TD>
		<TD ALIGN="LEFT"><BR></TD>
	</TR>
	<TR>
		<TD HEIGHT="14" ALIGN="LEFT"><div class="pcffont">Purpose:</div></TD>
		<TD class="bot" COLSPAN=3 ALIGN="CENTER" VALIGN=MIDDLE><div class="pcffont"><?php echo $purpose;?></div></TD>
		<TD COLSPAN=4 ALIGN="CENTER" VALIGN=MIDDLE SDNUM="13321;0;#,##0.00"><BR></TD>
		<TD ALIGN="LEFT"><BR></TD>
		<TD ALIGN="LEFT"><BR></TD>
	</TR>
	<TR>
		<TD COLSPAN=8 HEIGHT="14" ALIGN="CENTER" VALIGN=MIDDLE><BR></TD>
		<TD COLSPAN=8 ALIGN="CENTER" VALIGN=MIDDLE><BR></TD>
		</TR>
	<TR>
		<TD HEIGHT="12" ALIGN="LEFT"><BR></TD>

	  <td COLSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE><div class="pcffont">
	  	<label class="checkbox"><input checked <?php if($type == "pcf"){ echo "checked"; }?>  class="typeofpcf" id="pcf" type="radio" name="typeofpcf" value="pcf"> PCF Liquidation</label>
	  </div>
	  </td COLSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE><div class="pcffont">
      <td><label class="checkbox"><input <?php if($type == "cash"){ echo "checked"; }?> class="typeofpcf" type="radio" name="typeofpcf" value="cash"> Cash Reimbursements</label>
      </div>
      </td>

      <td COLSPAN=3 ALIGN="LEFT" VALIGN=MIDDLE><div class="pcffont">
      	<label class="checkbox"><input <?php if($type == "allow"){ echo "checked"; }?> class="typeofpcf" type="radio" name="typeofpcf" value="allow"> Allowance Replenishments</label>
      </div>
      </td>
		<TD ALIGN="LEFT"><BR></TD>
		<TD ALIGN="LEFT"><BR></TD>
	</TR>
	<TR>
		<TD COLSPAN=8 HEIGHT="11" ALIGN="CENTER" VALIGN=MIDDLE><BR></TD>
		<TD ALIGN="LEFT"><BR></TD>
		<TD ALIGN="LEFT"><BR></TD>
	</TR>
	<TR>
		<TD class="topbotleftright" HEIGHT="27" ALIGN="CENTER" VALIGN=MIDDLE><div class="pcffont">DATE</div></TD>
		<TD class="topbotleftright" ALIGN="CENTER" VALIGN=MIDDLE><div class="pcffont">REF. NAME</div></TD>
		<TD class="topbotleftright" ALIGN="CENTER" VALIGN=MIDDLE><div class="pcffont">REF. No.</div></TD>
		<TD class="topbotleftright" ALIGN="CENTER" VALIGN=MIDDLE><div class="pcffont">PARTICULARS</div></TD>
		<TD class="topbotleftright" ALIGN="CENTER" VALIGN=MIDDLE SDNUM="13321;0;#,##0.00"><div class="pcffont">AMOUNT</div></TD>
		<TD STYLE="border-top: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=3 ALIGN="CENTER" VALIGN=MIDDLE><div class="pcffont">FOR ACCOUNTING USE<BR>REMARKS</div></TD>
		<TD ALIGN="LEFT" VALIGN=MIDDLE><BR></TD>
		<TD ALIGN="LEFT" VALIGN=MIDDLE><BR></TD>
	</TR>

	     <?php if(($status <> "none")&&(!$empty)){?>
           <tbody id="row" >
         <?php foreach ($result4 as $row) {
         
          ?>
	<TR>
		<TD class="topbotleftright" HEIGHT="14" ALIGN="JUSTIFY" SDVAL="41380" SDNUM="13321;0;MMM D, YYYY"><div class="pcffont"><?php echo $row->date; ?></div></TD>
		<TD class="topbotleftright" ALIGN="CENTER"><div class="pcffont"><?php echo $row->category; ?></div></TD>
		<TD class="topbotleftright" ALIGN="CENTER"><div class="pcffont"><?php echo $row->refno; ?></div></TD>
		<TD class="topbotleftright" ALIGN="LEFT"><div class="pcffont"><?php echo $row->particulars;?></div></TD>
		<TD class="topbotleftright" ALIGN="CENTER" ><div class="pcffont"><?php echo $row->amount; ?></div></TD>
		<TD class="topbotright" COLSPAN=3 ALIGN="CENTER" VALIGN=MIDDLE><div class="pcffont"><?php echo $row->remarks; ?></div></TD>
		<TD ALIGN="LEFT"><BR></TD>
		<TD ALIGN="LEFT"><BR></TD>
	</TR>

	   <?php } ?>

        </tbody>
       
        <?php  }else{ ?>

          <tbody id="row" >
        </tbody>

        <?php } ?>

	<TR>
		<TD class="topbotleftright" COLSPAN=4 HEIGHT="14" ALIGN="LEFT" VALIGN=MIDDLE><div class="pcffont">TOTAL EXPENSES</div></TD>
		<TD class="topbotleftright" ALIGN="CENTER" SDVAL="286.5" SDNUM="13321;0;#,##0.00"><div class="pcffont"><?php echo $totalexpenses; ?></div></TD>
		<TD class="topbotright" COLSPAN=3 ALIGN="LEFT" VALIGN=MIDDLE><BR></TD>
		<TD ALIGN="LEFT"><BR></TD>
		<TD ALIGN="LEFT"><BR></TD>
	</TR>
	<TR>
		<TD class="topbotleftright" COLSPAN=4 HEIGHT="14" ALIGN="LEFT" VALIGN=MIDDLE><div class="pcffont">TOTAL AMOUNT OF CASH ADVANCE</div></TD>
		<TD class="topbotleftright" ALIGN="CENTER" ><div class="pcffont"><?php echo $totalcashadvance; ?></div></TD>
		<TD class="topbotright" COLSPAN=3 ALIGN="LEFT" VALIGN=MIDDLE><BR></TD>
		<TD ALIGN="LEFT"><BR></TD>
		<TD ALIGN="LEFT"><BR></TD>
	</TR>
	<TR>
		<TD class="topbotleftright" COLSPAN=4 HEIGHT="14" ALIGN="LEFT" VALIGN=MIDDLE><div class="pcffont">TOTAL AMOUNT FOR REIMBURSEMENT/LIQUIDATION</div></TD>
		<TD class="topbotleftright" ALIGN="CENTER" ><B><div class="pcffont"><?php echo $totalliquidation; ?></div></B></TD>
		<TD class="topbotright" COLSPAN=3 ALIGN="LEFT" VALIGN=MIDDLE><BR></TD>
		<TD ALIGN="LEFT"><BR></TD>
		<TD ALIGN="LEFT"><BR></TD>
	</TR>
	<TR>
		<TD COLSPAN=8 HEIGHT="14" ALIGN="CENTER" VALIGN=MIDDLE><BR></TD>
		<TD ALIGN="LEFT"><BR></TD>
		<TD ALIGN="LEFT"><BR></TD>
	</TR>
	<TR>
		<TD HEIGHT="17" ALIGN="LEFT"><div class="pcffont">Prepared by:</div></TD>
		<TD class="bot" COLSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE><div class="pcffont"><?php echo $firstname.' '.$lastname;?></div></TD>
		<TD ALIGN="LEFT"><BR></TD>
		<TD ALIGN="RIGHT"><div class="pcffont">Checked by:</div></TD>
		<TD class="bot" COLSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE><FONT SIZE=1><?php echo $checkedbyname; ?></div></TD>
		<TD ALIGN="LEFT"><FONT SIZE=1><BR></div></TD>
		<TD ALIGN="LEFT"><BR></TD>
		<TD ALIGN="LEFT"><BR></TD>
	</TR>
	<TR>
		<TD COLSPAN=8 HEIGHT="14" ALIGN="CENTER" VALIGN=MIDDLE><BR></TD>
		<TD ALIGN="LEFT"><BR></TD>
		<TD ALIGN="LEFT"><BR></TD>
	</TR>
	<TR>
		<TD HEIGHT="14" ALIGN="LEFT"><div class="pcffont">Approved by:</div></TD>
		<TD class="bot" COLSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE><div class="pcffont"><?php echo $approvedbyname; ?></div></TD>
		<TD STYLE="border-bottom: 1px solid #ffffff" COLSPAN=5 ALIGN="CENTER" VALIGN=MIDDLE><BR></TD>
		<TD ALIGN="LEFT"><BR></TD>
		<TD ALIGN="LEFT"><BR></TD>
	</TR>
</TABLE>
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
