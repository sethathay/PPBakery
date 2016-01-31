@extends('master') 

@section('content')

<link href="{{ URL::asset('css/general.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/upload.css') }}" rel="stylesheet">
{!! Form::model($service,array('url' => 'services', 'method' => 'post', 'class' => 'form-inline', 'role'=>'form', 'id'=>'adminForm', 'data-toggle'=>'validator')) !!}
	@include ('services.form')
{!! Form::close() !!}

<script type="text/javascript">
	jQuery(document).ready(function() {
		$('.btnsave').remove();
		$('#section_id').val('{{ $service->section_id}}')
	});
</script>
@stop