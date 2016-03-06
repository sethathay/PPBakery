@extends('master') 

@section('content')

<link href="{{ URL::asset('css/general.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/upload.css') }}" rel="stylesheet">
{!! Form::model($cus,array('url' => 'customers', 'method' => 'post', 'class' => 'form-inline', 'role'=>'form', 'id'=>'customerForm', 'data-toggle'=>'validator')) !!}
	@include ('customers.form')
{!! Form::close() !!}

<script type="text/javascript">
	jQuery(document).ready(function() {
		$('.btnsave').remove();
	});
</script>
@stop