@extends('master') 

@section('content')

<link href="{{ URL::asset('css/general.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/upload.css') }}" rel="stylesheet">
{!! Form::model($product,array('action' => ['ProductsController@update',$product->id], 'method' => 'patch', 'class' => 'form-inline', 'role'=>'form', 'id'=>'adminForm', 'data-toggle'=>'validator')) !!}
{!! Form::hidden('id', null, array('id'=>'product_id')) !!}
	@include ('products.form')
{!! Form::close() !!}
<script type="text/javascript">
	jQuery(document).ready(function($) {
		
		$('form#adminForm').validate({
            rules: {                   
                name: {
                    required: true
                },
                code:{
                	required:true
                },
                price:{
                    required:true
                },
                pgroup_id:{
                    required:true
                }
            },
            messages: {
            	name: {
                    required: "Please enter name of product"
                },
                code:{
                	required: "Please enter code of product"
                },
                price:{
                	required: "Please enter price of product in riels currency"
                },
                pgroup_id:{
                	required: "Please select category of product"
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
