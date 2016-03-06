@extends('master') 

@section('content')

<link href="{{ URL::asset('css/general.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/upload.css') }}" rel="stylesheet">
{!! Form::model($product,array('url' => 'products', 'method' => 'post', 'class' => 'form-inline', 'role'=>'form', 'id'=>'adminForm', 'data-toggle'=>'validator')) !!}
	@include ('products.form')
{!! Form::close() !!}

<script type="text/javascript">
	jQuery(document).ready(function() {
		$('.btnsave').remove();
		$('#pic').remove();
		if('{{$product->photo}}' == ""){
			$('.pro_image').attr('src','{{ URL::asset("/img/image_png.png") }}');
		}else{
			$('.pro_image').attr('src','{{ URL::asset("/img/product") }}' + '/' + '{{$product->photo }}');
		}
		$('#pgroup_id').val('{{ $product->pgroup_id}}');
	});
</script>
@stop