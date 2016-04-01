@extends('master') 

@section('content')
<link href="{{ URL::asset('css/general.css') }}" rel="stylesheet">
{!! Form::model($user, array('route' => ['users.update'], 'method' => 'post', 'class' => 'form-inline', 'role'=>'form', 'id'=>'adminForm', 'data-toggle'=>'validator')) !!}
{!! Form::hidden('id', null, array('id'=>'first_name')) !!}
<div class="table-responsive table-list">
	<div class="col-sm-12 panel-heading">
		<div class="col-sm-7">
			<img src="{{ URL::asset('/img/users_2_b.png') }}" /> <label>Users Form</label>
		</div>
		<div class="col-sm-5"
			style="text-align: right; padding: 30px 10px; vertical-align: middle;">
			<button type="submit" class="btn btn-md btn-success">
				<span class="glyphicon glyphicon-saved"></span> Save
			</button>
			<button onclick="redirectPage('{{ URL::asset('/users/index') }}')" type="button"
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
					<label for="first_name">First Name <span class="star"> * </span>:</label>
					{!! Form::text('first_name', null, array('class' => 'form-control', 'placeholder' => 'First Name', 'id'=>'first_name')) !!}
				</div>
				<div class="form-group">
					<label for="first_name">Last Name <span class="star"> * </span>:</label>
					{!! Form::text('last_name', null, array('class' => 'form-control', 'placeholder' => 'Last Name', 'id'=>'last_name')) !!}
				</div>
				<div class="form-group has-feedback">
					<label for="sex">Gender:</label>
					{!! Form::select('sex', ['1'=>'Male', '0'=>'Female'], null, ['class'=>'form-control']) !!}
				</div>
				<div class="form-group">
					<label for="dob">Date of Birth:</label>
					{!! Form::text('dob', null, array('class' => 'form-control', 'placeholder' => 'Date of Birth', 'id'=>'dob')) !!}						
				</div>
			</div>
			<div class="row-form col-sm-4">
				<div class="form-group">
					<label for="phone">Phone Number <span class="star"> * </span>:</label>
					{!! Form::text('phone', null, array('class' => 'form-control', 'required', 'placeholder' => 'Phone Number', 'id'=>'phone')) !!}
				</div>
				<div class="form-group">
					<label for="email">Email:</label>
					{!! Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Email', 'id'=>'email')) !!}
				</div>
				<div class="form-group has-feedback">
					<label for="country_id">Country:</label>
					{!! Form::select('country_id', $countries, 35, ['class'=>'form-control', 'id'=>'country_id']) !!}
					
				</div>
				<div class="form-group">
					{!! Form::textarea('address', null, array('class' => 'form-control', 'placeholder' => 'Address', 'id'=>'address', 'rows'=>'2')) !!}
				</div>
			</div>
			<div class="row-form col-sm-4">
				<div style="text-align: center;">
					{!! html_entity_decode( Html::link("#", Html::image("img/image_png.png", "Logo") ) ) !!}
					<div class="fileupload fileupload-new" data-provides="fileupload">
					    <span class="btn btn-primary btn-file"><span class="fileupload-new">Select file</span>
					    <input type="file" name="photo" /></span>
				  	</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12">
				<h4>LOGIN INFORMATION</h4>
			</div>
			<div class="row-form col-sm-4">
				<div class="form-group">
					<label for="username">Username <span class="star"> * </span>:</label>
					{!! Form::text('username', null, array('class' => 'form-control', 'placeholder' => 'Username', 'id'=>'username')) !!}
				</div>
				<div class="form-group">
					<label for="country_id">Group:</label>
					{!! Form::select('group_id', $groups, null, ['class'=>'form-control', 'id'=>'group_id']) !!}
					
				</div>
			</div>
			<div class="row-form col-sm-4">
				<div class="form-group">
					<label for="password">Create a password <span class="star"> * </span>:</label>
					{!! Form::password('password', array('class' => 'form-control', 'placeholder' => 'Create a password', 'id'=>'password')) !!}
				</div>
			</div>
			<div class="row-form col-sm-4">
				<div class="form-group">
					<label for="retype_password">Confirm your password:</label>
					{!! Form::password('retype_password', array('class' => 'form-control', 'placeholder' => 'Confirm your password', 'id'=>'retype_password')) !!}
				</div>
			</div>
		</div>
	</div>
	{!! HTML::style('assets/css/flatten.css') !!}
</div>
{!! Form::close() !!}
<script type="text/javascript">
	jQuery(document).ready(function($) {
		
		$('form#adminForm').validate({
            rules: {                   
                first_name: {
                    required: true
                },                 
                last_name: {
                    required: true
                },
                phone:{
                    required:true
                }, 
                email:{
                    email:true
                },        
                username: {
                    required: true,
                    minlength: 5
                },
                password: {
                    minlength: 5
                },
                retype_password: {
                    minlength: 5,
                    equalTo: "#password"
                }
                
            },
            messages: {
            	first_name: {
                    required: "Please enter a first name"
                },
                last_name: {
                    required: "Please enter a last name"
                },
                username: {
                    required: "Please enter a login username"
                },
                 password: {
                    minlength: "Your password must be at least 5 characters long"
                },
                retype_password: {
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                },
                email:{
                    required:"Please input valid email",
                }
            },
            highlight: function(element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function(element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorElement: 'span',
            errorClass: 'help-block',
            errorPlacement: function(error, element) {
                if(element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }
        });


       $('#dob').datepicker({
			format: 'yyyy/mm/dd'
       });
	});

</script>
@stop
