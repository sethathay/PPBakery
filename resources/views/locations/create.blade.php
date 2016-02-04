@extends('master') 

@section('content')

<link href="{{ URL::asset('css/general.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/upload.css') }}" rel="stylesheet">
{!! Form::open(array('url' => 'locations', 'method' => 'post', 'class' => 'form-inline', 'role'=>'form', 'id'=>'locationForm', 'data-toggle'=>'validator')) !!}
	@include ('locations.form')
{!! Form::close() !!}
<script type="text/javascript">
	jQuery(document).ready(function($) {
		
		$('form#locationForm').validate({
            rules: {                   
                name: {
                    required: true
                },
                address:{
                	required:true
                },
                business_number:{
                	required:true
                }
            },
            messages: {
            	name: {
                    required: "Please enter shop name"
                },
                address:{
                	required: "Please enter address of shop"
                },
                business_number:{
                	required: "Please enter contact number of shop"
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
