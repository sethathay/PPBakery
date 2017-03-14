@extends('master') 

@section('content')

<link href="{{ URL::asset('css/general.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/upload.css') }}" rel="stylesheet">
{!! Form::model($sectionGroup,array('url' => 'sectionGroups/store', 'method' => 'post', 'class' => 'form-inline', 'role'=>'form', 'id'=>'adminForm', 'data-toggle'=>'validator')) !!}
<div class="table-responsive table-list">
	<div class="col-sm-12 panel-heading">
		<div class="col-sm-7">
			<img src="{{ URL::asset('/img/settings_b.png') }}" /> <label>ប្រភេទ ក្រុមចំនាយ</label>
		</div>
		<div class="col-sm-5"
			style="text-align: right; padding: 30px 10px; vertical-align: middle;">
			<button onclick="redirectPage('{{ URL::asset('/sectionGroups/index') }}')" type="button"
				class="btn btn-md btn-danger">
				<span class="glyphicon"></span> ត្រឡប់ក្រោយ
			</button>
		</div>
	</div>
	
	<div class="col-sm-12 form">
		<div class="row">
			<div class="col-sm-12">
				<h4>ពត៍មានរបស់ប្រភេទ ក្រុមចំនាយ</h4>
			</div>
			<div class="row-form col-sm-6">
				<div class="form-group col-md-12">
					<label for="first_name">ឈ្មោះ<span class="star"> * </span>:</label>
					{!! Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'ឈ្មោះ', 'id'=>'name','style'=>'width:55%')) !!}
				</div>
				<div class="form-group col-md-12">
					<label for="first_name">បរិយាយផ្សេងៗ<span class="star"></span>:</label>
					{!! Form::textarea('description', null, array('class' => 'form-control', 'placeholder' => 'បរិយាយផ្សេងៗ', 'id'=>'description', 'rows'=>'3')) !!}
				</div>
				<div class="form-group col-md-12">
					<label for="first_name">ថ្ងៃនៃការកែប្រែ<span class="star"></span>:</label>
					{!! Form::text('updated_at', null, array('class' => 'form-control', 'placeholder' => 'ថ្ងៃនៃការកែប្រែ', 'id'=>'modified','style'=>'width:55%')) !!}
				</div>
			</div>
		</div>
	</div>
	
</div>
{!! Form::close() !!}
<script type="text/javascript">
	jQuery(document).ready(function($) {
		
		$('form#adminForm').validate({
            rules: {                   
                name: {
                    required: true
                },                    
            },
            messages: {
            	name: {
                    required: "សូមបញ្ចូលឈ្មោះរបស់ប្រភេទ ក្រុមចំនាយ"
                },
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
