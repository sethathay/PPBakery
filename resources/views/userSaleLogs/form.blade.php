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
						<?php for($i=0; $i<24; $i++){ ?>
						  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>	
						<?php }?>
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