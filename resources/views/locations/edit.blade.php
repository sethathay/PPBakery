@extends('master') 

@section('content')

<link href="{{ URL::asset('css/general.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/upload.css') }}" rel="stylesheet">
{!! Form::model($location,array('action' => ['LocationsController@update',$location->id], 'method' => 'patch', 'class' => 'form-inline', 'role'=>'form', 'id'=>'locationForm', 'data-toggle'=>'validator')) !!}
{!! Form::hidden('id', null, array('id'=>'service_id')) !!}
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
                    required: "សូមបញ្ចូលឈ្មោះហាង"
                },
                address:{
                	required: "សូមបញ្ចូលអាសយដ្ឋានរបស់ហាង"
                },
                business_number:{
                	required: "សូមបញ្ចូលលេខ​ទំនាក់​ទំនងរបស់ហាង"
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
