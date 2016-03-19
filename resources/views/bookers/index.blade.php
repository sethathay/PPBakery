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
			<img src="{{ URL::asset('/img/book_b.png') }}" /> <label>Booking</label>
		</div>
		<div class="col-sm-5"
			style="text-align: right; padding: 23px 10px 0 0; vertical-align: middle;">
			<button onclick="redirectPage('book')" type="button"
				class="btn btn-md btn-success">
				<span class="glyphicon glyphicon-plus"></span> កក់ទំនេញ
			</button>
		</div>
	</div>
	<!-- check for flash notification message -->
	@if(Session::has('flash_notice'))
		<div id="login-alert" class="alert alert-success col-sm-12">
			<div id="flash_notice">{{ Session::get('flash_notice') }}</div>
		</div>
	@endif
	<table class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th><input type="checkbox" name="checkOptionAll" /></th>
				<th>Order Date</th>
				<th>Receipt Code</th>
				<th>Discount (៛)</th>
				<th>Discount ($)</th>
				<th>Total Amount (៛)</th>
				<th>Total Amount ($)</th>
				<th>Balance (៛)</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			
			
		<?php $i=1; ?>
			@foreach($saleOrders as $saleOrder)
			<tr>
				<td style="text-align: center;"><input type="checkbox"
					name="checkOption" /></td>
				<td>{{ $saleOrder->order_date }}</td>
				<td>{{ $saleOrder->so_code}}</td>
				<td>{{ number_format_unlimited_precision($saleOrder->discount_riel)}}</td>
				<td>{{ number_format($saleOrder->discount_us,2)}}</td>
				<td>{{ number_format_unlimited_precision($saleOrder->total_amount_riel)}}</td>
				<td>{{ number_format($saleOrder->total_amount_us,2)}}</td>
				<td>{{ number_format_unlimited_precision($saleOrder->balance)}}</td>
				<td class="last_td" style="text-align:right;">
					@if($saleOrder->is_book > 0)						
						<button type="button" id="{{ $saleOrder->id }}" class="btn btn-xs btn-warning paid">
							<span class="fa fa-dollar"></span> &nbsp;Pay&nbsp;
						</button>
					@endif
					<button type="button" id="{{ $saleOrder->id }}" class="btn btn-xs btn-info">
						<span class="glyphicon glyphicon-user"></span> View
					</button>
					<button type="button" onclick="redirectPage('edit/{{ $saleOrder->id }}')" class="btn btn-xs btn-primary">
						<span class="glyphicon glyphicon-edit"></span> Edit
					</button>
					<button type="button" onclick="if(confirm('Are you sure you want to delete this?')==true) redirectPage('destroy/{{ $saleOrder->id }}')" class="btn btn-xs btn-danger">
						<span class="glyphicon glyphicon-trash"></span> Delete
					</button>
				</td>
			</tr>
			@endforeach
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
	
	$(document).ready(function(){
		$(".btn-info").click(function(){
			var result = $(this).attr('id');
			$("#myModalPrint").load("{{ URL::asset('pos/print/') }}/"+result+"/yes", '', function(){
				$("#myModalPrint").modal();
			});
		});
		
		var token = "{!! csrf_token() !!}";
		$('.paid').click(function(){
			var sales_order_id = $(this).attr('id');
			$.ajax({
				type : 'post',
				url : '{{ URL::asset("bookers/pay") }}',
				data : {sales_order_id:sales_order_id, _token:token},
				dataType : 'json',
				success : function(result){
					// return sales_order_id;								
					
					$("#myModalPayment").hide();
					$("#myModalPrint").load('{{ URL::asset("bookers/print")}}/'+result+'/no', '', function(){
						//$("#myModalPrint").modal();
						w = window.open();
						w.document.write($("#myModalPrint").html());
						w.print(false);
						w.close();
						window.location = '{{ URL::asset("bookers/index") }}';
					});
					
				}
			});
		});
		
	});

</script>
@stop
