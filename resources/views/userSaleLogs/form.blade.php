<div class="table-responsive table-list">
	<div class="col-sm-12 panel-heading">
		<div class="col-sm-7">
			<img src="{{ URL::asset('/img/saleReport.png') }}" /> <label>បញ្ចូលប្រាក់សរុបពីការលក់</label>
		</div>
		<div class="col-sm-5"
			style="text-align: right; padding: 30px 10px; vertical-align: middle;">
			<button type="submit" class="btn btn-md btn-success btnsave">
				<span class="glyphicon glyphicon-saved"></span> រក្សាទុក
			</button>
			<button onclick="redirectPage('{{ URL::asset('user_sale_logs/index') }}')" type="button"
				class="btn btn-md btn-danger">
				<span class="glyphicon"></span> ត្រឡប់ក្រោយ
			</button>
		</div>
	</div>
	
	<div class="col-sm-12 form">
		<div class="row">
			<div class="col-sm-12">
				<h4>ពត៍មានរបស់ប្រាក់សរុបពីការលក់</h4>
			</div>
			<div class="row-form col-sm-12">
				<div class="form-group col-md-6">
					<label for="first_name">ប្រាក់សរុបពីការលក់ (៛)<span class="star"> * </span>:</label>
					{!! Form::text('total_kh', null, array('class' => 'form-control', 'placeholder' => 'ប្រាក់សរុប (៛)', 'id'=>'total_kh','style'=>'width:55%')) !!}
				</div>
				<div class="form-group col-md-6">
					<label for="first_name">ប្រាក់សរុបពីការលក់ ($)<span class="star"> * </span>:</label>
					{!! Form::text('total_us', null, array('class' => 'form-control', 'placeholder' => 'ប្រាក់សរុប ($)', 'id'=>'total_us','style'=>'width:55%')) !!}
				</div>				
				<div class="form-group col-md-6">
					<label for="hours">ម៉ោងចេញ<span class="star"> * </span>:</label>
					<select name="hours" style="width:70px !important;">
						  <option value="0">12 am</option>
						  <option value="1">1 am</option>
						  <option value="2">2 am</option>
						  <option value="3">3 am</option>
						  <option value="4">4 am</option>
						  <option value="5">5 am</option>
						  <option value="6">6 am</option>
						  <option value="7">7 am</option>
						  <option value="8">8 am</option>
						  <option value="9">9 am</option>
						  <option value="10">10 am</option>
						  <option value="11">11 am</option>
						  <option value="12">12 pm</option>
						  <option value="13">1 pm</option>
						  <option value="14">2 pm</option>
						  <option value="15">3 pm</option>
						  <option value="16">4 pm</option>
						  <option value="17">5 pm</option>
						  <option value="18">6 pm</option>
						  <option value="19">7 pm</option>
						  <option value="20">8 pm</option>
						  <option value="21">9 pm</option>
						  <option value="22">10 pm</option>
						  <option value="23">11 pm</option>
					</select>
					<label for="minutes">:</label>
					<select name="minutes" style="width:60px !important;">
						<?php for($i=0; $i<60; $i++){?>
						  <option value="<?php echo $i;?>"><?php echo ($i<10)?"0".$i:$i;?></option>
						<?php }?>
					</select>
				</div>
			</div>
		</div>
	</div>
	
</div>