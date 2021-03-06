@extends('master') 

@section('content')

<link href="{{ URL::asset('css/general.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/upload.css') }}" rel="stylesheet">
{!! Form::model($userSaleLogs,array('url' => 'user_sale_logs/update', 'method' => 'post', 'class' => 'form-inline', 'role'=>'form', 'id'=>'adminForm', 'data-toggle'=>'validator')) !!}
{!! Form::hidden('id', null, array('id'=>'id')) !!}
	@include ('userSaleLogs.form')
{!! Form::close() !!}
<script type="text/javascript">
	jQuery(document).ready(function($) {
		
		$('form#adminForm').validate({
            rules: {                   
                total_kh: {
                    required: true
                },
				total_us: {
                    required: true
                }
            },
            messages: {
            	total_kh: {
                    required: "ប្រាក់សរុបពីការលក់ (៛)"
                },
				total_us: {
                    required: "ប្រាក់សរុបពីការលក់ ($)"
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
