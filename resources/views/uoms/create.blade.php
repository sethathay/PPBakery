@extends('master') 

@section('content')

<link href="{{ URL::asset('css/general.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/upload.css') }}" rel="stylesheet">
{!! Form::open(array('url' => 'uoms', 'method' => 'post', 'class' => 'form-inline', 'role'=>'form', 'id'=>'uomForm', 'data-toggle'=>'validator')) !!}
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
                    required: "Please enter name of unit of measure"
                },
                abbr:{
                	required: "Please enter abbreviation of unit of measure"
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
