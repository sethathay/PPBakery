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
			<img src="{{ URL::asset('/img/emblem_money_b.png') }}" /> <label>អត្រា​ប្តូ​រ​ប្រាក់</label>
		</div>
		<div class="col-sm-5"
			style="text-align: right; padding: 23px 10px 0 0; vertical-align: middle;">
			<button onclick="redirectPage('exchangerates/create')" type="button"
				class="btn btn-md btn-success">
				<span class="glyphicon glyphicon-plus"></span> បង្កើតថ្មី
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
				<th>អត្រា​ប្រាក់</th>
				<th>បរិយាយផ្សេងៗ</th>
				<th>ថ្ងៃនៃការកែប្រែ</th>
			</tr>
		</thead>
		<tbody>
			
		<?php $i=1; ?>
			@foreach($rates as $rate)
			<tr>
				<td style="text-align: center;"><input type="checkbox"
					name="checkOption" /></td>
				<td><span class="label label-success">$1</span> <span class="label label-danger">{{ $rate->riel}}</span></td>
				<td>{{ $rate->description}}</td>
				<td>{{ $rate->updated_at->timezone('Asia/Phnom_Penh')}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{!! $rates->render() !!}
</div>
@stop
