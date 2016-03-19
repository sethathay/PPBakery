@extends('master') 

@section('content')

<link href="{{ URL::asset('css/general.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/upload.css') }}" rel="stylesheet">

{!! Form::open(array('url' => 'exchangerates', 'method' => 'post', 'class' => 'form-inline', 'role'=>'form', 'id'=>'exchangeratesForm', 'data-toggle'=>'validator')) !!}

	<div class="table-responsive table-list">
	<div class="col-sm-12 panel-heading">
		<div class="col-sm-7">
			<img src="{{ URL::asset('/img/emblem_money_b.png') }}" /> <label>អត្រា​ប្តូ​រ​ប្រាក់</label>
		</div>
		<div class="col-sm-5"
			style="text-align: right; padding: 30px 10px; vertical-align: middle;">
			<button type="submit" class="btn btn-md btn-success btnsave">
				<span class="glyphicon glyphicon-saved"></span> រក្សាទុក
			</button>
			<button onclick="redirectPage('{{ URL::asset('exchangerates') }}')" type="button"
				class="btn btn-md btn-danger">
				<span class="glyphicon"></span> ត្រឡប់ក្រោយ
			</button>
		</div>
	</div>
	
	<div class="col-sm-12 form">
		<div class="row">
			<div class="col-sm-12">
				<h4>ពត៍មានរបស់អត្រា​ប្តូ​រ​ប្រាក់</h4>
			</div>
			<div class="row-form col-sm-6">
				<div class="form-group col-md-12">
					<label for="riel">អត្រា​​ប្រាក់<span class="star"> * </span>:</label>
					<div class="input-group" style="width:55%">
						<div class="input-group-addon">$1</div>
						{!! Form::text('riel', null, array('class' => 'form-control', 'placeholder' => 'អត្រា​​ប្រាក់', 'id'=>'riel')) !!}
					</div>
				</div>
				<div class="form-group col-md-12">
					<label for="description">បរិយាយផ្សេងៗ<span class="star"></span>:</label>
					{!! Form::textarea('description', null, array('class' => 'form-control', 'placeholder' => 'បរិយាយផ្សេងៗ', 'id'=>'description', 'rows'=>'3')) !!}
				</div>
			</div>
		</div>
	</div>
	
</div>	

{!! Form::close() !!}

<script type="text/javascript">
	jQuery(document).ready(function($) {
		
		$('form#exchangeratesForm').validate({
            rules: {                   
                riel: {
                    required: true
                }
            },
            messages: {
            	riel: {
                    required: "សូមបញ្ចូលអត្រា​​ប្រាក់"
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