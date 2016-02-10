<div class="table-responsive table-list">
	<div class="col-sm-12 panel-heading">
		<div class="col-sm-7">
			<img src="{{ URL::asset('/img/settings_b.png') }}" /> <label>UOM Conversion</label>
		</div>
		<div class="col-sm-5"
			style="text-align: right; padding: 30px 10px; vertical-align: middle;">
			<button type="submit" class="btn btn-md btn-success btnsave">
				<span class="glyphicon glyphicon-saved"></span> Save
			</button>
			<button onclick="redirectPage('{{ URL::asset('uomconversions') }}')" type="button"
				class="btn btn-md btn-danger">
				<span class="glyphicon"></span> Cancel
			</button>
		</div>
	</div>
	
	<div class="col-sm-12 form">
		<div class="row">
			<div class="col-sm-12">
				<h4>UOM CONVERSION INFORMATION</h4>
			</div>
			<div class="row-form col-sm-6">
				<div class="form-group has-feedback col-md-12">
					<label for="country_id">UOM (From)</label>
					{!! Form::select('from_uom_id', $uoms, Input::old('uoms'), ['class'=>'form-control', 'id'=>'from_uom_id']) !!}
				</div>
				<div class="form-group has-feedback col-md-12">
					<label for="country_id">UOM (To)</label>
					{!! Form::select('to_uom_id', $uoms, Input::old('uoms'), ['class'=>'form-control', 'id'=>'to_uom_id']) !!}
				</div>
				<div class="form-group col-md-12">
					<label for="first_name">Value<span class="star"> * </span>:</label>
					{!! Form::text('value', null, array('class' => 'form-control', 'placeholder' => 'Value', 'id'=>'value')) !!}
				</div>
			</div>
		</div>
	</div>
	
</div>