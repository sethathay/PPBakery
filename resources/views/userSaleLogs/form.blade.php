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
					{!! Form::hidden('dates', $userSaleLogs->dates, array('class' => 'form-control')) !!}
				</div>
				<div class="form-group col-md-6">
					<label for="first_name">ប្រាក់សរុបពីការលក់ ($)<span class="star"> * </span>:</label>
					{!! Form::text('total_us', null, array('class' => 'form-control', 'placeholder' => 'ប្រាក់សរុប ($)', 'id'=>'total_us','style'=>'width:55%')) !!}
				</div>				
				<div class="form-group col-md-6">
					<label for="hours">ម៉ោងចេញ<span class="star"> * </span>:</label>
					<select name="hours" style="width:70px !important;">
						  <option value="0">12 ព្រឹក</option>
						  <option value="1">1 ព្រឹក</option>
						  <option value="2">2 ព្រឹក</option>
						  <option value="3">3 ព្រឹក</option>
						  <option value="4">4 ព្រឹក</option>
						  <option value="5">5 ព្រឹក</option>
						  <option value="6">6 ព្រឹក</option>
						  <option value="7">7 ព្រឹក</option>
						  <option value="8">8 ព្រឹក</option>
						  <option value="9">9 ព្រឹក</option>
						  <option value="10">10 ព្រឹក</option>
						  <option value="11">11 ព្រឹក</option>
						  <option value="12">12 ថ្វៃ</option>
						  <option value="13">1 ថ្វៃ</option>
						  <option value="14">2 ថ្វៃ</option>
						  <option value="15">3 ថ្វៃ</option>
						  <option value="16">4 ថ្វៃ</option>
						  <option value="17">5 ថ្វៃ</option>
						  <option value="18">6 ថ្វៃ</option>
						  <option value="19">7 ថ្វៃ</option>
						  <option value="20">8 ថ្វៃ</option>
						  <option value="21">9 ថ្វៃ</option>
						  <option value="22">10 ថ្វៃ</option>
						  <option value="23">11 ថ្វៃ</option>
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