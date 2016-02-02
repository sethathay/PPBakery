@extends('master') 

@section('content')

<link href="{{ URL::asset('css/general.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/upload.css') }}" rel="stylesheet">

{!! Form::open(array('url' => 'exchangerates', 'method' => 'post', 'class' => 'form-inline', 'role'=>'form', 'id'=>'exchangeratesForm', 'data-toggle'=>'validator')) !!}

	<div class="table-responsive table-list">
	<div class="col-sm-12 panel-heading">
		<div class="col-sm-7">
			<img src="{{ URL::asset('/img/emblem_money_b.png') }}" /> <label>Exchange Rates</label>
		</div>
		<div class="col-sm-5"
			style="text-align: right; padding: 30px 10px; vertical-align: middle;">
			<button type="submit" class="btn btn-md btn-success btnsave">
				<span class="glyphicon glyphicon-saved"></span> Save
			</button>
			<button onclick="redirectPage('{{ URL::asset('exchangerates') }}')" type="button"
				class="btn btn-md btn-danger">
				<span class="glyphicon"></span> Cancel
			</button>
		</div>
	</div>
	
	<div class="col-sm-12 form">
		<div class="row">
			<div class="col-sm-12">
				<h4>EXCHANGE RATE INFORMATION</h4>
			</div>
			<div class="row-form col-sm-6">
				<div class="form-group col-md-12">
					<label for="riel">Rate<span class="star"> * </span>:</label>
					<div class="input-group" style="width:55%">
						<div class="input-group-addon">$1</div>
						{!! Form::text('riel', null, array('class' => 'form-control', 'placeholder' => 'Exchange rate', 'id'=>'riel')) !!}
					</div>
				</div>
				<div class="form-group col-md-12">
					<label for="description">Description<span class="star"></span>:</label>
					{!! Form::textarea('description', null, array('class' => 'form-control', 'placeholder' => 'Description', 'id'=>'description', 'rows'=>'3')) !!}
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
                    required: "Please enter exchange rate"
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