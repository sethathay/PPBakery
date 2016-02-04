@extends('master') 

@section('content')

<link href="{{ URL::asset('css/general.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/upload.css') }}" rel="stylesheet">
{!! Form::model($loc,array('url' => 'locations', 'method' => 'post', 'class' => 'form-inline', 'role'=>'form', 'id'=>'locationForm', 'data-toggle'=>'validator')) !!}
	@include ('locations.form')
{!! Form::close() !!}

<script type="text/javascript">
	jQuery(document).ready(function() {
		$('.btnsave').remove();
	});
</script>
@stop