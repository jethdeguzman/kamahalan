<!DOCTYPE html>
<html lang="en" class="fuelux">

    <link href="<?php echo base_url();?>assets/js/fuelux-master/dist/css/fuelux.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/js/fuelux-master/dist/css/fuelux-responsive.css" rel="stylesheet">
    <script src="<?php echo base_url();?>assets/js/fuelux-master/addl/underscore.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/fuelux-master/addl/datasource.js" type="text/javascript"></script>
   
<script src="<?php echo base_url();?>assets/js/fuelux-master/addl/data2.js" type="text/javascript"></script>

    <script src="<?php echo base_url();?>assets/js/fuelux-master/addl/loader.min.js" type="text/javascript"></script>
 <style>
  .datagrid {
    
  }
    .datagrid tr th{
    background:#858585;
    color:#424242;
    cursor: pointer;
  }
  .datagrid tr td{
    background: #D4D4D4;
  }
 </style>


 <style>.brd{
  border:1px solid black;
  }</style>
<div>
<table id="myformsgrid" class="table table-bordered table-hover datagrid">
 <thead>
 <tr>
  <th style='  background: #999999;'>

   <div class="datagrid-header-left">
 
   </div>
   <div class="datagrid-header-right" style='text-align:right;'>
	<div class="input-append search">
	 <input type="text" class="input-medium" placeholder="Search"><button class="btn"><i class="icon-search"></i></button>
	</div>
   </div>
  </th>
 </tr>
 </thead>
 
 <tfoot>
 <tr>
  <th class='th'>

   <div class="datagrid-footer-left" style="display:none; float:left;">
	<div class="grid-controls">
	 <span><span class="grid-start"></span> - <span class="grid-end"></span> of <span class="grid-count"></span></span>
	 <select class="grid-pagesize"><option>10</option><option>20</option><option>50</option><option>100</option></select>
	 <span>Per Page</span>
	</div>
   </div>

   <div class="datagrid-footer-right" style="display:none; text-align:right; ">
	<div class="grid-pager">
	 <button class="btn grid-prevpage"><i class="icon-chevron-left"></i></button>
	 <span>Page</span>
	 <div class="input-append dropdown combobox">
	  <input class="span1" type="text">
	  <ul class="dropdown-menu"></ul>
	 </div>
	 <span>of <span class="grid-pages"></span></span>
	 <button class="btn grid-nextpage"><i class="icon-chevron-right"></i></button>
	</div>
   </div>
  </th>
 </tr>
 </tfoot>

</table>
</div>
<br/>

<script>
$(document).ready(function(){


    $(function () {

            // INITIALIZING THE DATAGRID
            var dataSource2 = new StaticDataSource({
                columns: [{
                    property: 'date',
                    label: 'Date',
                    sortable: true
                }, {
                    property: 'formtype',
                    label: 'Forms',
                    sortable: true
                }, {
                    property: 'prepared',
                    label: 'Prepared By',
                    sortable: true
                },{
                    property: 'status',
                    label: 'Status',
                    sortable: true
                }, {
                    property: 'action2',
                    label: 'Action',
                    sortable: false
                }],
                data: sampleData2.geonames2,
                delay: 250,
                
            });


      $('#myformsgrid').datagrid({
                dataSource: dataSource2,
                stretchHeight: false,

            });
    });
  


    


});
  </script>
