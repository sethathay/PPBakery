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
<div class="table-responsive table-list">
	<div class="col-sm-12 panel-heading">
		<div class="col-sm-7">
			<img src="{{ URL::asset('/img/receipt_b.png') }}" /> <label>Receipt List</label>
		</div>
		<div class="col-sm-5"
			style="text-align: right; padding: 23px 10px 0 0; vertical-align: middle;">
			<button onclick="redirectPage('create')" type="button"
				class="btn btn-md btn-success">
				<span class="glyphicon glyphicon-plus"></span> New
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
				<td>{{ number_format($saleOrder->discount_riel)}}</td>
				<td>{{ number_format($saleOrder->discount_us,2)}}</td>
				<td>{{ number_format($saleOrder->total_amount_riel)}}</td>
				<td>{{ number_format($saleOrder->total_amount_us,2)}}</td>
				<td>{{ number_format($saleOrder->balance)}}</td>
				<td class="last_td">
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
	{!! $saleOrders->render() !!}
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
			$("#myModalPrint").load('pos/print/'+result, '', function(){
				$("#myModalPrint").modal();
				/*w = window.open();
				w.document.write($("#myModalPrint").html());
				w.print(false);
				w.close();*/
			});
		});
	});

</script>
@stop
