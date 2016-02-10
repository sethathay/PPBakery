<div class="table-responsive table-list">
	<div class="col-sm-12 panel-heading">
		<div class="col-sm-7">
			<img src="{{ URL::asset('/img/settings_b.png') }}" /> <label>Unit of Measure (UOM)</label>
		</div>
		<div class="col-sm-5"
			style="text-align: right; padding: 30px 10px; vertical-align: middle;">
			<button type="submit" class="btn btn-md btn-success btnsave">
				<span class="glyphicon glyphicon-saved"></span> Save
			</button>
			<button onclick="redirectPage('{{ URL::asset('uoms') }}')" type="button"
				class="btn btn-md btn-danger">
				<span class="glyphicon"></span> Cancel
			</button>
		</div>
	</div>
	
	<div class="col-sm-12 form">
		<div class="row">
			<div class="col-sm-12">
				<h4>UOM INFORMATION</h4>
			</div>
			<div class="row-form col-sm-6">
				<div class="form-group col-md-12">
					<label for="first_name">Name<span class="star"> * </span>:</label>
					{!! Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Name', 'id'=>'name','style'=>'width:55%')) !!}
				</div>
				<div class="form-group col-md-12">
					<label for="abbr">Abbreviation<span class="star"> * </span>:</label>
					{!! Form::text('abbr', null, array('class' => 'form-control', 'placeholder' => 'Abbreviation', 'id'=>'abbr','style'=>'width:55%')) !!}
				</div>
				<div class="form-group col-md-12">
					<label for="description">Description<span class="star"></span>:</label>
					{!! Form::textarea('description', null, array('class' => 'form-control', 'placeholder' => 'Description', 'id'=>'description', 'rows'=>'3')) !!}
				</div>
			</div>
		</div>
	</div>
	
</div>