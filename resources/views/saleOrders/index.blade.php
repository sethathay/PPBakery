@extends('master') 

@section('content')
<style>
.table-list {
	width: 82%;
	margin: 3px auto 0;
}

.table thead {
	background: #3E5C9A;
	color: #fff;
}

.table thead th {
	text-align: center;
}

.last_td {
	text-align: center;
}

.panel-heading {
	background: #ebf4fe;
	padding: 0 0 0 10px;
	margin: 5px 0 10px;
	border: 1px solid #ccc;
}

.panel-heading img {
	width: 60px;
	height: 60px;
	vertical-align: middle;
}

.panel-heading label {
	padding: 20px;
	font-size: 24px;
	font-weight: bold;
}

.table-responsive{
	overflow: hidden;
	min-height: .01%;
}
</style>

<?php
function number_format_unlimited_precision($number,$decimal = '.')
{
   $broken_number = explode($decimal,$number);
   if(count($broken_number) > 1){
		return (number_format($broken_number[0]).$decimal.$broken_number[1]);
   }else{
		return (number_format($broken_number[0]));
   }
}
?>
<div class="table-responsive table-list">
	<div class="col-sm-12 panel-heading">
		<div class="col-sm-7">
			<img src="{{ URL::asset('/img/receipt_b.png') }}" /> <label>លក់ដុំ</label>
		</div>
		<div class="col-sm-5"
			style="text-align: right; padding: 23px 10px 0 0; vertical-align: middle;">
			<button onclick="redirectPage('remain')" type="button"
				class="btn btn-md btn-warning">
				<span class="glyphicon glyphicon-user"></span> វិក័យប័ត្រ មិនទាន់បង់ប្រាក់
			</button>
			<button onclick="redirectPage('create')" type="button"
				class="btn btn-md btn-primary">
				<span class="glyphicon glyphicon-plus"></span> លក់ដុំ
			</button>
		</div>
	</div>
	<!-- check for flash notification message -->
	@if(Session::has('flash_notice'))
		<div id="login-alert" class="alert alert-success col-sm-12">
			<div id="flash_notice">{{ Session::get('flash_notice') }}</div>
		</div>
	@endif
	<table class="table table-hover table-bordered table-striped" id="tbl_expense">
		<thead>
			<tr>
				<!--<th><input type="checkbox" name="checkOptionAll" /></th>-->
                <th>លេខរៀង</th>
				<th>ថ្ងៃខែឆ្នាំទិញ</th>
				<th>លេខកូដវិក័យប័ត្រ</th>
				<th>បញ្ចុះតំលៃ (៛)</th>
				<th>បញ្ចុះតំលៃ ($)</th>
				<th>តំលៃសរុប (៛)</th>
				<th>តំលៃសរុប ($)</th>
				<th>ប្រាក់អាប់ (៛)</th>
				<th>សកម្មភាព</th>
			</tr>
		</thead>
		<tbody>
			<tr class="empty_data"><td colspan="9" style="text-align:center;">គ្នានទិន្ន័យនៅក្នុងតារាងទេ</td></tr>		
        </tbody>
        
	</table>
</div>
	<!-- Modal Print Receipt -->
	<div id="myModalPrint" class="modal fade col-md-4" role="dialog">

	</div>
<script type="text/javascript">

	function redirectPage(url){
		window.location = url;
	}
	
	
	// Ajax server request
	$('#tbl_expense').dataTable( {
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": "ajax",
		"fnServerData": fnDataTablesPipeline,
        "iDisplayLength": 1000,
		"aaSorting": [[ 2, "desc" ]],
		"lengthMenu": [[10, 25, 50, 100, 500, 1000, 5000, 10000], [10, 25, 50, 100, 500, 1000, 5000, 10000]],
		"fnInfoCallback": function( oSettings, iStart, iEnd, iMax, iTotal, sPre ) {			
			$("#tbl_expense tbody tr>td:nth-child(4)").css("text-align", "right");
			$("#tbl_expense tbody tr>td:nth-child(5)").css("text-align", "right");
			$("#tbl_expense tbody tr>td:nth-child(6)").css("text-align", "right");
			$("#tbl_expense tbody tr>td:nth-child(7)").css("text-align", "right");
			$("#tbl_expense tbody tr>td:nth-child(8)").css("text-align", "right");
			$("#tbl_expense tbody tr>td:nth-child(9)").css("text-align", "center");
		},
	} );
	
	

	$('#tbl_expense tbody').on( 'click', '.btnview', function () {
        var rowId = $(this).attr('id');
		$("#myModalPrint").load("{{ URL::asset('saleOrders/print/') }}/"+rowId+"/yes", '', function(){
			$("#myModalPrint").modal();
		});
    } );
	
	// add commas for number 120,000
	function addCommas(nStr)
	{
		nStr += '';
		x = nStr.split('.');
		x1 = x[0];
		x2 = x.length > 1 ? '.' + x[1] : '';
		var rgx = /(\d+)(\d{3})/;
		while (rgx.test(x1)) {
			x1 = x1.replace(rgx, '$1' + "," + '$2');
		}
		return x1 + x2;
	}
	
	// Round number 0.0
	function getMathRound(amount){
		return Math.round( (amount) * 10 ) / 10;
	}
	
	// Round number 0.00
	function getMathRound100(amount){
		return Math.round( (amount) * 100 ) / 100;
	}
</script>
@stop
