@extends('master') 

@section('content')

<link href="{{ URL::asset('css/general.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/upload.css') }}" rel="stylesheet">
{!! Form::model($dis,array('url' => 'discounts', 'method' => 'post', 'class' => 'form-inline', 'role'=>'form', 'id'=>'discountForm', 'data-toggle'=>'validator')) !!}
	@include ('discounts.form')
{!! Form::close() !!}

<script type="text/javascript">
	jQuery(document).ready(function() {
		$('.btnsave').remove();
	});
</script>
@stop