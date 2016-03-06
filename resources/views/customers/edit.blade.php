@extends('master') 

@section('content')

<link href="{{ URL::asset('css/general.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/upload.css') }}" rel="stylesheet">
{!! Form::model($cus,array('action' => ['CustomersController@update',$cus->id], 'method' => 'patch', 'class' => 'form-inline', 'role'=>'form', 'id'=>'customerForm', 'data-toggle'=>'validator')) !!}
{!! Form::hidden('id', null, array('id'=>'cus_id')) !!}
	@include ('customers.form')
{!! Form::close() !!}
<script type="text/javascript">
	jQuery(document).ready(function($) {
		
		$('form#customerForm').validate({
            rules: {                   
                customer_code: {
                    required: true
                },
                firstname:{
                	required:true
                }
            },
            messages: {
            	customer_code: {
                    required: "Please enter customer code"
                },
                firstname:{
                	required: "Please enter customer name"
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
	});

</script>
@stop
