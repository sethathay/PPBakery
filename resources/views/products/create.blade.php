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

select{
	width: 170px !important;
}
.photo{
	border: 1px solid #ccc;
	padding: 30px 40px;
	border-radius: 5px;
}

.form{
	border: 1px solid #ccc;
	padding: 10px 20px 30px;
	background: #F7F8F9;
}

</style>
{!! Form::open(array('url' => 'users/store', 'method' => 'post', 'class' => 'form-inline', 'role'=>'form', 'id'=>'adminForm', 'data-toggle'=>'validator')) !!}
<div class="table-responsive table-list">
	<div class="col-sm-12 panel-heading">
		<div class="col-sm-7">
			<img src="{{ URL::asset('/img/product.png') }}" /> <label>Products Form</label>
		</div>
		<div class="col-sm-5"
			style="text-align: right; padding: 23px 10px 0 0; vertical-align: middle;">
			<button type="submit" class="btn btn-md btn-success">
				<span class="glyphicon glyphicon-saved"></span> Save
			</button>
			<button onclick="redirectPage('index')" type="button"
				class="btn btn-md btn-danger">
				<span class="glyphicon"></span> Cancel
			</button>
		</div>
	</div>
	
	<div class="col-sm-12 form">
		<div class="row">
			<div class="col-sm-12">
				<h4>PRODUCT INFORMATION</h4>
			</div>
			<div class="row-form col-sm-4">
				<div class="form-group">
					<label for="first_name">Code:</label>
					{!! Form::text('first_name', null, array('class' => 'form-control', 'required', 'placeholder' => 'Code', 'id'=>'first_name')) !!}
				</div>
				<div class="form-group">
					<label for="first_name">Product Name:</label>
					{!! Form::text('last_name', null, array('class' => 'form-control', 'placeholder' => 'Product Name', 'required', 'id'=>'last_name')) !!}
				</div>
				<div class="form-group">
					<label for="dob">Category:</label>
					{!! Form::select('country_id', ['1'=>'Select Category'], null, ['class'=>'form-control', 'id'=>'country_id']) !!}
				</div>
			</div>
			<div class="row-form col-sm-4">
				<div style="text-align: center;">
					{!! html_entity_decode( Html::link("#", Html::image("img/image_png.png", "Logo") ) ) !!}
				</div>
			</div>
			<div class="row-form col-sm-4">
				
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12">
				<h4>PRICE INFORMATION</h4>
			</div>
		</div>
	</div>
	{!! HTML::style('assets/css/flatten.css') !!}
</div>
{!! Form::close() !!}

<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('#adminForm').bootstrapValidator({
	        fields: {
	        	first_name: {
	                validators: {
	                    notEmpty: {
	                        message: 'The first name is required and cannot be empty'
	                    }
	                }
	            },
		    	last_name: {
		            validators: {
		                notEmpty: {
		                    message: 'The last name is required and cannot be empty'
		                }
		            }
		        }
	        },
	        submitHandler: function(validator, form, submitButton) {
	            alert("yes");
	        }
	    });
	});

</script>
@stop
