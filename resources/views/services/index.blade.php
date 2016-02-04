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
			<img src="{{ URL::asset('/img/furoisu_bath_chair.png') }}" /> <label>Daily Expenses</label>
		</div>
		<div class="col-sm-5"
			style="text-align: right; padding: 23px 10px 0 0; vertical-align: middle;">
			<button onclick="redirectPage('services/create')" type="button"
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
				<th>Group Expense</th>
				<th>Expense</th>
				<th>Date</th>
				<th>Price ($)</th>
				<th>Price (R)</th>
				<th>Description</th>
				<th>Modified</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			
			
		<?php $i=1; ?>
			@foreach($services as $service)
			<tr>
				<td style="text-align: center;"><input type="checkbox"
					name="checkOption" /></td>
				<td>{{ $sections[$service->section_id]}}</td>
				<td>{{ $service->name}}</td>
				<td>{{ $service->expense_date}}</td>
				<td>{{ $service->dollar_price}}</td>
				<td>{{ $service->riel_price}}</td>
				<td>{{ $service->description}}</td>
				<td>{{ $service->updated_at->timezone('Asia/Phnom_Penh')}}</td>
				<td class="last_td">
					<button style="float:left;margin-right:5px" type="button" onclick="redirectPage('services/{{ $service->id }}')" class="btn btn-xs btn-info">
						<span class="glyphicon glyphicon-user"></span> View
					</button>
					<button style="float:left;margin-right:5px" type="button" onclick="redirectPage('services/{{ $service->id }}/edit')" class="btn btn-xs btn-primary">
						<span class="glyphicon glyphicon-edit"></span> Edit
					</button>
					<div style="float:left;">
					{!! Form::open(['route' => ['services.destroy', $service->id], 'method' => 'delete','id'=>'frmdelete']) !!}
						<button type="button" class="btn btn-xs btn-danger btndelete">
							<span class="glyphicon glyphicon-trash"></span> Delete
						</button>
					{!! Form::close() !!}
					</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

<script type="text/javascript">

	function redirectPage(url){
		window.location = url;
	}

	$(document).ready(function(){
		$(document).on('click','.btndelete',function(){
			if(confirm('Are you sure you want to delete this?')){
				$('#frmdelete').submit();
			}
		});
	});

</script>
@stop
