<div class="table-responsive table-list">
	<div class="col-sm-12 panel-heading">
		<div class="col-sm-7">
			<img src="{{ URL::asset('/img/settings_b.png') }}" /> <label>ការប្តូររង្វាស់ខ្នាត</label>
		</div>
		<div class="col-sm-5"
			style="text-align: right; padding: 30px 10px; vertical-align: middle;">
			<button type="submit" class="btn btn-md btn-success btnsave">
				<span class="glyphicon glyphicon-saved"></span> រក្សាទុក
			</button>
			<button onclick="redirectPage('{{ URL::asset('uomconversions') }}')" type="button"
				class="btn btn-md btn-danger">
				<span class="glyphicon"></span> ត្រឡប់ក្រោយ
			</button>
		</div>
	</div>
	
	<div class="col-sm-12 form">
		<div class="row">
			<div class="col-sm-12">
				<h4>ពត៍មានរបស់ការប្តូររង្វាស់ខ្នាត</h4>
			</div>
			<div class="row-form col-sm-6">
				<div class="form-group has-feedback col-md-12">
					<label for="country_id">ពីរង្វាស់ខ្នាត</label>
					{!! Form::select('from_uom_id', $uoms, Input::old('uoms'), ['class'=>'form-control', 'id'=>'from_uom_id']) !!}
				</div>
				<div class="form-group has-feedback col-md-12">
					<label for="country_id">ទៅរង្វាស់ខ្នាត</label>
					{!! Form::select('to_uom_id', $uoms, Input::old('uoms'), ['class'=>'form-control', 'id'=>'to_uom_id']) !!}
				</div>
				<div class="form-group col-md-12">
					<label for="first_name">តម្លៃ<span class="star"> * </span>:</label>
					{!! Form::text('value', null, array('class' => 'form-control', 'placeholder' => 'តម្លៃ', 'id'=>'value')) !!}
				</div>
			</div>
		</div>
	</div>
	
</div>