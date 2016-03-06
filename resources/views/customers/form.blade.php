<div class="table-responsive table-list">
	<div class="col-sm-12 panel-heading">
		<div class="col-sm-7">
			<img src="{{ URL::asset('/img/settings_b.png') }}" /> <label>Customer</label>
		</div>
		<div class="col-sm-5"
			style="text-align: right; padding: 30px 10px; vertical-align: middle;">
			<button type="submit" class="btn btn-md btn-success btnsave">
				<span class="glyphicon glyphicon-saved"></span> Save
			</button>
			<button onclick="redirectPage('{{ URL::asset('customers') }}')" type="button"
				class="btn btn-md btn-danger">
				<span class="glyphicon"></span> Cancel
			</button>
		</div>
	</div>
	
	<div class="col-sm-12 form">
		<div class="row">
			<div class="col-sm-12">
				<h4>CUSTOMER INFORMATION</h4>
			</div>
			<div class="row-form col-sm-6">
				<div class="form-group col-md-12">
					<label for="first_name">Customer Code<span class="star"> * </span>:</label>
					{!! Form::text('customer_code', null, array('class' => 'form-control', 'placeholder' => 'Customer Code', 'id'=>'customer_code','style'=>'width:55%')) !!}
				</div>
				<div class="form-group col-md-12">
					<label for="abbr">Name<span class="star"> * </span>:</label>
					{!! Form::text('firstname', null, array('class' => 'form-control', 'placeholder' => 'Name', 'id'=>'firstname','style'=>'width:55%')) !!}
				</div>
				<div class="form-group col-md-12">
					<label for="description">Gender<span class="star"></span>:</label>
					{!! Form::select('sex', ['1'=>'Male', '0'=>'Female'], null, ['class'=>'form-control']) !!}
				</div>
			</div>
			<div class="row-form col-sm-6">
				<div class="form-group col-md-12">
					<label for="abbr">Phone No<span class="star"></span>:</label>
					{!! Form::text('mobile_number', null, array('class' => 'form-control', 'placeholder' => 'Phone No', 'id'=>'mobile_number','style'=>'width:55%')) !!}
				</div>
				<div class="form-group col-md-12">
					<label for="description">Address<span class="star"></span>:</label>
					{!! Form::textarea('address', null, array('class' => 'form-control', 'placeholder' => 'Address', 'id'=>'address', 'rows'=>'3')) !!}
				</div>
			</div>
		</div>
	</div>
	
</div>