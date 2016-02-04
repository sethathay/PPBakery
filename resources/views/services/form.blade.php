<div class="table-responsive table-list">
	<div class="col-sm-12 panel-heading">
		<div class="col-sm-7">
			<img src="{{ URL::asset('/img/settings_b.png') }}" /> <label>Daily Expense Form</label>
		</div>
		<div class="col-sm-5"
			style="text-align: right; padding: 30px 10px; vertical-align: middle;">
			<button type="submit" class="btn btn-md btn-success btnsave">
				<span class="glyphicon glyphicon-saved"></span> Save
			</button>
			<button onclick="redirectPage('{{ URL::asset('services') }}')" type="button"
				class="btn btn-md btn-danger">
				<span class="glyphicon"></span> Cancel
			</button>
		</div>
	</div>
	
	<div class="col-sm-12 form">
		<div class="row">
			<div class="col-sm-12">
				<h4>DAILY EXPENSE INFORMATION</h4>
			</div>
			<div class="row-form col-sm-6">
				<div class="form-group col-md-12">
					<label for="first_name">Name<span class="star"> * </span>:</label>
					{!! Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Name', 'id'=>'name','style'=>'width:55%')) !!}
				</div>
				<div class="form-group col-md-12">
					<label for="first_name">Price ($)<span class="star"> * </span>:</label>
					<div class="input-group" style="width:55%">
						<div class="input-group-addon">$</div>
						{!! Form::text('dollar_price', null, array('class' => 'form-control', 'placeholder' => 'Price in dollar($)', 'id'=>'dollar_price')) !!}
					</div>
				</div>
				<div class="form-group col-md-12">
					<label for="first_name">Price (R)<span class="star"> * </span>:</label>
					<div class="input-group" style="width:55%">
						<div class="input-group-addon">R</div>
						{!! Form::text('riel_price', null, array('class' => 'form-control', 'placeholder' => 'Price in riel(R)', 'id'=>'riel_price')) !!}
					</div>
				</div>
			</div>
			<div class="row-form col-sm-6">
				<div class="form-group col-md-12">
					<label for="dob">Date:</label>
					{!! Form::text('expense_date', null, array('class' => 'form-control', 'placeholder' => 'Expense Date', 'id'=>'expense_date')) !!}						
				</div>
				<div class="form-group has-feedback col-md-12">
					<label for="country_id">Group Expense:</label>
					{!! Form::select('section_id', $sections, Input::old('sections'), ['class'=>'form-control', 'id'=>'section_id']) !!}
				</div>
				<div class="form-group col-md-12">
					<label for="first_name">Description<span class="star"></span>:</label>
					{!! Form::textarea('description', null, array('class' => 'form-control', 'placeholder' => 'Description', 'id'=>'description', 'rows'=>'3')) !!}
				</div>
			</div>
		</div>
	</div>
	
</div>
<script type="text/javascript">
	jQuery(document).ready(function($) {

       $('#expense_date').datepicker({
			format: 'yyyy/mm/dd'
       });
	});

</script>