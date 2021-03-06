@extends('master') 

@section('content')

<link href="{{ URL::asset('css/general.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/upload.css') }}" rel="stylesheet">
{!! Form::model($uomconv,array('action' => ['UomConversionsController@update',$uomconv->id], 'method' => 'patch', 'class' => 'form-inline', 'role'=>'form', 'id'=>'conversionForm', 'data-toggle'=>'validator')) !!}
{!! Form::hidden('id', null, array('id'=>'service_id')) !!}
	@include ('uomconversions.form')
{!! Form::close() !!}
<script type="text/javascript">
	jQuery(document).ready(function($) {
		
		$('form#conversionForm').validate({
            rules: {                   
                from_uom_id: {
                    required: true
                },
                to_uom_id:{
                	required:true
                },
                value:{
                	required:true
                }
            },
            messages: {
            	from_uom_id: {
                    required: ""
                },
                to_uom_id:{
                	required: ""
                },
                value:{
                	required: "សូមបញ្ចូលតម្លៃ"
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
