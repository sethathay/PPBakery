@extends('master') 

@section('content')

<link href="{{ URL::asset('css/general.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/upload.css') }}" rel="stylesheet">
{!! Form::open(array('url' => 'sections/store', 'method' => 'post', 'class' => 'form-inline', 'role'=>'form', 'id'=>'adminForm', 'data-toggle'=>'validator')) !!}
<div class="table-responsive table-list">
	<div class="col-sm-12 panel-heading">
		<div class="col-sm-7">
			<img src="{{ URL::asset('/img/settings_b.png') }}" /> <label>Group Expense Form</label>
		</div>
		<div class="col-sm-5"
			style="text-align: right; padding: 30px 10px; vertical-align: middle;">
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
				<h4>GROUP EXPENSE INFORMATION</h4>
			</div>
			<div class="row-form col-sm-6">
				<div class="form-group col-md-12">
					<label for="first_name">Name<span class="star"> * </span>:</label>
					{!! Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Name', 'id'=>'name','style'=>'width:55%')) !!}
				</div>
				<div class="form-group col-md-12">
					<label for="first_name">Description<span class="star"></span>:</label>
					{!! Form::textarea('description', null, array('class' => 'form-control', 'placeholder' => 'Description', 'id'=>'description', 'rows'=>'3')) !!}
				</div>
			</div>
		</div>
	</div>
	
</div>
{!! Form::close() !!}
<script type="text/javascript">
	jQuery(document).ready(function($) {
		
		$('form#adminForm').validate({
            rules: {                   
                name: {
                    required: true
                },                    
            },
            messages: {
            	name: {
                    required: "Please enter name of group expense"
                },
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
	});

</script>
@stop
