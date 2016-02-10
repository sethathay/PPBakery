@extends('master') 

@section('content')

<link href="{{ URL::asset('css/general.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/upload.css') }}" rel="stylesheet">
{!! Form::model($uom,array('url' => 'uoms', 'method' => 'post', 'class' => 'form-inline', 'role'=>'form', 'id'=>'uomForm', 'data-toggle'=>'validator')) !!}
	@include ('uoms.form')
{!! Form::close() !!}

<script type="text/javascript">
	jQuery(document).ready(function() {
		$('.btnsave').remove();
	});
</script>
@stop