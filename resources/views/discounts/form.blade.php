<div class="table-responsive table-list">
	<div class="col-sm-12 panel-heading">
		<div class="col-sm-7">
			<img src="{{ URL::asset('/img/discount_b.png') }}" /> <label>ការបញ្ចុះតំលៃ</label>
		</div>
		<div class="col-sm-5"
			style="text-align: right; padding: 30px 10px; vertical-align: middle;">
			<button type="submit" class="btn btn-md btn-success btnsave">
				<span class="glyphicon glyphicon-saved"></span> រក្សាទុក
			</button>
			<button onclick="redirectPage('{{ URL::asset('discounts') }}')" type="button"
				class="btn btn-md btn-danger">
				<span class="glyphicon"></span> ត្រឡប់ក្រោយ
			</button>
		</div>
	</div>
	
	<div class="col-sm-12 form">
		<div class="row">
			<div class="col-sm-12">
				<h4>ពត៍មានរបស់ការបញ្ចុះតំលៃ</h4>
			</div>
			<div class="row-form col-sm-6">
				<div class="form-group col-md-12">
					<label for="first_name">ឈ្មោះ<span class="star"> * </span>:</label>
					{!! Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'ឈ្មោះ', 'id'=>'name','style'=>'width:55%')) !!}
				</div>
				<div class="form-group col-md-12">
					<label for="abbr">ចំនួន</label>
					{!! Form::text('amount', null, array('class' => 'form-control', 'placeholder' => 'ចំនួន', 'id'=>'amount','style'=>'width:55%')) !!}
				</div>
				<div class="form-group col-md-12">
					<label for="abbr">ភាគរយ</label>
					<div class="input-group" style="width:55%">
						<div class="input-group-addon">%</div>
					{!! Form::text('percent', null, array('class' => 'form-control', 'placeholder' => 'ភាគរយ', 'id'=>'percent')) !!}
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