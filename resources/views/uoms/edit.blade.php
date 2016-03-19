@extends('master') 

@section('content')

<link href="{{ URL::asset('css/general.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/upload.css') }}" rel="stylesheet">
{!! Form::model($uom,array('action' => ['UomsController@update',$uom->id], 'method' => 'patch', 'class' => 'form-inline', 'role'=>'form', 'id'=>'uomForm', 'data-toggle'=>'validator')) !!}
{!! Form::hidden('id', null, array('id'=>'uom_id')) !!}
	@include ('uoms.form')
{!! Form::close() !!}
<script type="text/javascript">
	jQuery(document).ready(function($) {
		
		$('form#uomForm').validate({
            rules: {                   
                name: {
                    required: true
                },
                abbr:{
                	required:true
                }
            },
            messages: {
            	name: {
                    required: "សូមបញ្ចូលឈ្មោះវង្វាស់ខ្នាត"
                },
                abbr:{
                	required: "សូមបញ្ចូលពាក្យកាត់របស់វាស់ខ្នាត"
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
