@extends('master') 

@section('content')

<link href="{{ URL::asset('css/general.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/upload.css') }}" rel="stylesheet">
{!! Form::open(array('url' => 'services', 'method' => 'post', 'class' => 'form-inline', 'role'=>'form', 'id'=>'adminForm', 'data-toggle'=>'validator')) !!}
	@include ('services.form')
{!! Form::close() !!}
<script type="text/javascript">
	jQuery(document).ready(function($) {
		
		$('form#adminForm').validate({
            rules: {                   
                name: {
                    required: true
                },
                section_id:{
                	required:true
                },
                dollar_price:{
                	required: function(element){
                		return $("#riel_price").val() == "" && $("#dollar_price").val() == "";
                	}
                },
                riel_price:{
                	required: function(element){
                		return $("#riel_price").val() == "" && $("#dollar_price").val() == "";
                	}
                }
            },
            messages: {
            	name: {
                    required: "Please enter name of daily expense"
                },
                section_id:{
                	required: "Please select group of expense"
                },
                dollar_price:{
                	required: "Please enter your expense in dollar($) or riels(R)"
                },
                riel_price:{
                	required: "Please enter your expense in dollar($) or riels(R)"
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
