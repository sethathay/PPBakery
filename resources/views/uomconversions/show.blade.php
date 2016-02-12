@extends('master') 

@section('content')

<link href="{{ URL::asset('css/general.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/upload.css') }}" rel="stylesheet">
{!! Form::model($uomconv,array('url' => 'uomconversions', 'method' => 'post', 'class' => 'form-inline', 'role'=>'form', 'id'=>'adminForm', 'data-toggle'=>'validator')) !!}
	@include ('uomconversions.form')
{!! Form::close() !!}

<script type="text/javascript">
	jQuery(document).ready(function() {
		$('.btnsave').remove();
		$('#from_uom_id').val('{{ $uomconv->from_uom_id}}')
		$('#to_uom_id').val('{{ $uomconv->to_uom_id}}')
	});
</script>
@stop