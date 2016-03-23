@extends('master') 

@section('content')

<link href="{{ URL::asset('css/general.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/upload.css') }}" rel="stylesheet">
{!! Form::model($discount,array('action' => ['DiscountsController@update',$discount->id], 'method' => 'patch', 'class' => 'form-inline', 'role'=>'form', 'id'=>'discountForm', 'data-toggle'=>'validator')) !!}
{!! Form::hidden('id', null, array('id'=>'discount_id')) !!}
	@include ('discounts.form')
{!! Form::close() !!}
<script type="text/javascript">
	jQuery(document).ready(function($) {
		
		$('form#discountForm').validate({
            rules: {                   
                name: {
                    required: true
                },
            },
            messages: {
            	name: {
                    required: "សូមបញ្ចូលឈ្មោះរបស់ការបញ្ចុះតំលៃ"
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
