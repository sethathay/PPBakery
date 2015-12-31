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
			<img src="{{ URL::asset('/img/users_2_b.png') }}" /> <label>Users Form</label>
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
				<h4>USER INFORMATION</h4>
			</div>
			<div class="row-form col-sm-4">
				<div class="form-group">
					<label for="first_name">First Name:</label>
					{!! Form::text('first_name', null, array('class' => 'form-control', 'required', 'placeholder' => 'First Name', 'id'=>'first_name')) !!}
				</div>
				<div class="form-group">
					<label for="first_name">Last Name:</label>
					{!! Form::text('last_name', null, array('class' => 'form-control', 'placeholder' => 'Last Name', 'required', 'id'=>'last_name')) !!}
				</div>
				<div class="form-group">
					<label for="dob">Date of Birth:</label>
					{!! Form::text('dob', null, array('class' => 'form-control', 'placeholder' => 'Date of Birth', 'id'=>'dob')) !!}
				</div>
				<div class="form-group has-feedback">
					<label for="country_id">Country:</label>
					{!! Form::select('country_id', ['1'=>'Male', '0'=>'Female'], null, ['class'=>'form-control', 'id'=>'country_id']) !!}
					
				</div>
			</div>
			<div class="row-form col-sm-4">
				<div class="form-group">
					<label for="middle_name">Middle Name:</label>
					{!! Form::text('middle_name', null, array('class' => 'form-control', 'placeholder' => 'Middle Name', 'id'=>'middle_name')) !!}
					
				</div>
				<div class="form-group has-feedback">
					<label for="sex">Gender:</label>
					{!! Form::select('sex', ['1'=>'Male', '0'=>'Female'], null, ['class'=>'form-control']) !!}
				</div>
				<div class="form-group">
					<label for="phone">Phone Number:</label>
					{!! Form::text('phone', null, array('class' => 'form-control', 'placeholder' => 'Phone Number', 'id'=>'phone')) !!}
				</div>
				<div class="form-group">
					<label for="address">Address:</label>
					{!! Form::textarea('address', null, array('class' => 'form-control', 'placeholder' => 'Address', 'id'=>'address', 'rows'=>'3')) !!}
				</div>
			</div>
			<div class="row-form col-sm-4">
				<div style="text-align: center;">
					{!! html_entity_decode( Html::link("#", Html::image("img/image_png.png", "Logo") ) ) !!}
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12">
				<h4>LOGIN INFORMATION</h4>
			</div>
			<div class="row-form col-sm-4">
				<div class="form-group">
					<label for="username">Username:</label>
					{!! Form::text('username', null, array('class' => 'form-control', 'placeholder' => 'Username', 'id'=>'username')) !!}
				</div>
			</div>
			<div class="row-form col-sm-4">
				<div class="form-group">
					<label for="password">Create a password:</label>
					{!! Form::password('password', array('class' => 'form-control', 'placeholder' => 'Create a password', 'id'=>'password')) !!}
				</div>
			</div>
			<div class="row-form col-sm-4">
				<div class="form-group">
					<label for="retype-password">Confirm your password:</label>
					{!! Form::password('retype-password', array('class' => 'form-control', 'placeholder' => 'Confirm your password', 'id'=>'retype-password')) !!}
				</div>
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
