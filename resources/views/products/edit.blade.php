@extends('master') 

@section('content')

<link href="{{ URL::asset('css/general.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/upload.css') }}" rel="stylesheet">
{!! Form::model($product,array('action' => ['ProductsController@update',$product->id], 'method' => 'patch', 'files'=>true,  'class' => 'form-inline', 'role'=>'form', 'id'=>'adminForm', 'data-toggle'=>'validator')) !!}
{!! Form::hidden('id', null, array('id'=>'product_id')) !!}
	@include ('products.form')
{!! Form::close() !!}
<script type="text/javascript">
	jQuery(document).ready(function($) {

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();            
                reader.onload = function (e) {
                    $('.pro_image').attr('src', e.target.result);
                    $('.pro_image').attr('width','280px');
                    $('.pro_image').attr('height','175px');
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
        
        $(".upload").change(function(){
            readURL(this);
        });

        $("form#adminForm").submit( function( e ) {
            var form = this;
            e.preventDefault(); //Stop the submit for now
                                        //Replace with your selector to find the file input in your form
            var fileInput = $(this).find("input[type=file]")[0],
                file = fileInput.files && fileInput.files[0];

            if( file ) {
                var img = new Image();

                img.src = window.URL.createObjectURL( file );

                img.onload = function() {
                    var width = img.naturalWidth,
                        height = img.naturalHeight;

                    window.URL.revokeObjectURL( img.src );

                    if( width == 280 && height == 175 ) {
                        form.submit();
                    }
                    else {
                        alert('Picture must be have width and height 280px * 175px');
                    }
                };
            }
            else { //No file was input or browser doesn't support client side reading
                form.submit();
            }

        });
		
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
        if('{{$product->photo}}' == ""){
                $('.pro_image').attr('src','{{ URL::asset("/img/image_png.png") }}');
            }else{
                $('.pro_image').attr('src','{{ URL::asset("/img/product") }}' + '/' + '{{$product->photo }}');
            }
	});

</script>
@stop
