@extends('master') 

@section('content')

<link href="{{ URL::asset('css/general.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/upload.css') }}" rel="stylesheet">
{!! Form::model($pricing,array('url' => 'pricingRules/update', 'method' => 'post', 'class' => 'form-inline', 'role'=>'form', 'id'=>'adminForm', 'data-toggle'=>'validator')) !!}
{!! Form::hidden('id', null) !!}
	@include ('pricingRules.form')
{!! Form::close() !!}
<script type="text/javascript">
	jQuery(document).ready(function($) {
		
		$('form#adminForm').validate({
            rules: {
				customer_id:{
					required:true
				},
                product_id:{
					required:true
				},               
                amount_kh: {
                    required: true
                }
            },
            messages: {
				customer_id:{
                	required: "សូមជ្រើសរើសឈ្មោះអតិថិជន"
                },  
				product_id:{
                	required: "សូមជ្រើសរើសឈ្មោះទំនិញ"
                },
            	amount_kh: {
                    required: "សូមបញ្ចូលតំលៃលក់អោយម៉ូយ"
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
