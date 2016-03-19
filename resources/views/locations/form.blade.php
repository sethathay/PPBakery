<div class="table-responsive table-list">
	<div class="col-sm-12 panel-heading">
		<div class="col-sm-7">
			<img src="{{ URL::asset('/img/settings_b.png') }}" /> <label>ទីតាំងហាង</label>
		</div>
		<div class="col-sm-5"
			style="text-align: right; padding: 30px 10px; vertical-align: middle;">
			<button type="submit" class="btn btn-md btn-success btnsave">
				<span class="glyphicon glyphicon-saved"></span> រក្សាទុក
			</button>
			<button onclick="redirectPage('{{ URL::asset('locations') }}')" type="button"
				class="btn btn-md btn-danger">
				<span class="glyphicon"></span> ត្រឡប់ក្រោយ
			</button>
		</div>
	</div>
	
	<div class="col-sm-12 form">
		<div class="row">
			<div class="col-sm-12">
				<h4>ពត៍មានរបស់ទីតាំងហាង</h4>
			</div>
			<div class="row-form col-sm-6">
				<div class="form-group col-md-12">
					<label for="first_name">ឈ្មោះហាង<span class="star"> * </span>:</label>
					{!! Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'ឈ្មោះហាង', 'id'=>'name','style'=>'width:55%')) !!}
				</div>
				<div class="form-group col-md-12">
					<label for="first_name">អាសយដ្ឋាន<span class="star"> * </span>:</label>
					{!! Form::textarea('address', null, array('class' => 'form-control', 'placeholder' => 'អាសយដ្ឋាន', 'id'=>'address', 'rows'=>'3')) !!}
				</div>
				<div class="form-group col-md-12">
					<label for="first_name">លេខ​ទំនាក់​ទំនងរបស់ហាង<span class="star"> * </span>:</label>
					{!! Form::text('business_number', null, array('class' => 'form-control', 'placeholder' => 'លេខ​ទំនាក់​ទំនងរបស់ហាង', 'id'=>'business_number','style'=>'width:55%')) !!}
				</div>
			</div>
			<div class="row-form col-sm-6">
				<div class="form-group col-md-12">
					<label for="first_name">លេខទូរសព្ទ(1)<span class="star"></span>:</label>
					{!! Form::text('personal_number', null, array('class' => 'form-control', 'placeholder' => 'លេខទូរសព្ទ(1)', 'id'=>'personal_number','style'=>'width:55%')) !!}
				</div>
				<div class="form-group col-md-12">
					<label for="first_name">លេខទូរសព្ទ(2)<span class="star"></span>:</label>
					{!! Form::text('other_number', null, array('class' => 'form-control', 'placeholder' => 'លេខទូរសព្ទ(2)', 'id'=>'other_number','style'=>'width:55%')) !!}
				</div>
				<div class="form-group col-md-12">
					<label for="first_name">ទូរសារ<span class="star"></span>:</label>
					{!! Form::text('fax_number', null, array('class' => 'form-control', 'placeholder' => 'ទូរសារ', 'id'=>'fax_number','style'=>'width:55%')) !!}
				</div>
				<div class="form-group col-md-12">
					<label for="first_name">អ៊ីម៉ែល<span class="star"></span>:</label>
					{!! Form::text('email_address', null, array('class' => 'form-control', 'placeholder' => 'អ៊ីម៉ែល', 'id'=>'email_address','style'=>'width:55%')) !!}
				</div>
			</div>
		</div>
	</div>
	
</div>