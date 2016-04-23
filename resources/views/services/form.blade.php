<style>
select{
	height: 40px !important;
	width: 302px !important;
}
</style>
<div class="table-responsive table-list">
	<div class="col-sm-12 panel-heading">
		<div class="col-sm-7">
			<img src="{{ URL::asset('/img/dollars_b.png') }}" /> <label>ការចំនាយ</label>
		</div>
		<div class="col-sm-5"
			style="text-align: right; padding: 30px 10px; vertical-align: middle;">
			<button type="submit" class="btn btn-md btn-success btnsave">
				<span class="glyphicon glyphicon-saved"></span> រក្សាទុក
			</button>
			<button onclick="redirectPage('{{ URL::asset('services') }}')" type="button"
				class="btn btn-md btn-danger">
				<span class="glyphicon"></span> ត្រឡប់ក្រោយ
			</button>
		</div>
	</div>
	
	<div class="col-sm-12 form">
		<div class="row">
			<div class="col-sm-12">
				<h4>ពត៍មានរបស់ការចំនាយ</h4>
			</div>
			<div class="row-form col-sm-6">
				<div class="form-group col-md-12" style="display:none;">
					<label for="first_name">ឈ្មោះនៃការចំនាយ<span class="star"> * </span>:</label>
					{!! Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'ឈ្មោះនៃការចំនាយ', 'id'=>'name','style'=>'width:55%')) !!}
				</div>
				<div class="form-group has-feedback col-md-12">
					<label for="country_id">ឈ្មោះនៃការចំនាយ<span class="star"> * </span>:</label>
					{!! Form::select('section_id', $sections, Input::old('sections'), ['class'=>'form-control', 'id'=>'section_id']) !!}
				</div>
				<div class="form-group col-md-12">
					<label for="first_name">តម្លៃ($)<span class="star"> * </span>:</label>
					<div class="input-group" style="width:55%">
						<div class="input-group-addon">$</div>
						{!! Form::text('dollar_price', null, array('class' => 'form-control', 'placeholder' => 'តម្លៃ($)', 'id'=>'dollar_price')) !!}
					</div>
				</div>
				<div class="form-group col-md-12">
					<label for="first_name">តម្លៃ(៛)<span class="star"> * </span>:</label>
					<div class="input-group" style="width:55%">
						<div class="input-group-addon">៛</div>
						{!! Form::text('riel_price', null, array('class' => 'form-control', 'placeholder' => 'តម្លៃ(៛)', 'id'=>'riel_price')) !!}
					</div>
				</div>
			</div>
			<div class="row-form col-sm-6">
				<div class="form-group col-md-12">
					<label for="dob">កាលបរិច្ឆេទ</label>
					{!! Form::text('expense_date', null, array('class' => 'form-control', 'placeholder' => 'កាលបរិច្ឆេទ', 'id'=>'expense_date')) !!}						
				</div>
				<div class="form-group col-md-12">
					<label for="first_name">បរិយាយផ្សេងៗ<span class="star"></span>:</label>
					{!! Form::textarea('description', null, array('class' => 'form-control', 'placeholder' => 'បរិយាយផ្សេងៗ', 'id'=>'description', 'rows'=>'3')) !!}
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