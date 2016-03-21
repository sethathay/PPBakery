@extends('master') 

@section('content')

<link href="{{ URL::asset('css/general.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/upload.css') }}" rel="stylesheet">
{!! Form::open(array('url' => 'customers', 'method' => 'post', 'class' => 'form-inline', 'role'=>'form', 'id'=>'customerForm', 'data-toggle'=>'validator')) !!}
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
                    required: "សូមបញ្ចូលលេខកូដរបស់អតិថិជន"
                },
                firstname:{
                	required: "សូមបញ្ចូលឈ្មោះរបស់អតិថិជន"
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
