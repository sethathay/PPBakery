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
			<img src="{{ URL::asset('/img/product.png') }}" /> <label>Products</label>
		</div>
		<div class="col-sm-5"
			style="text-align: right; padding: 23px 10px 0 0; vertical-align: middle;">
			<button onclick="redirectPage('products/create')" type="button"
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
				<th>Code</th>
				<th>Name</th>
				<th>Category</th>
				<th>Price</th>
				<th>Modified</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			
			
		<?php $i=1; ?>
			@foreach($products as $p)
			<tr>
				<td style="text-align: center;"><input type="checkbox"
					name="checkOption" /></td>
				<td>{{ $p->code }}</td>		
				<td>{{ $p->name }}</td>
				<td>{{ $pgroups[$p->pgroup_id] }}</td>
				<td><span class="label label-success">R</span> {{ $p->price }}</td>
				<td>{{ $p->updated_at->timezone('Asia/Phnom_Penh')}}</td>
				<td class="last_td">
					<button style="float:left;margin-right:5px" type="button" onclick="redirectPage('products/{{ $p->id }}')" class="btn btn-xs btn-info">
						<span class="glyphicon glyphicon-user"></span> View
					</button>
					<button style="float:left;margin-right:5px" type="button" onclick="redirectPage('products/{{ $p->id }}/edit')" class="btn btn-xs btn-primary">
						<span class="glyphicon glyphicon-edit"></span> Edit
					</button>
					<div style="float:left;">
					{!! Form::open(['route' => ['products.destroy', $p->id], 'method' => 'delete','id'=>'frmdelete']) !!}
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
