<div class="table-responsive table-list">
	<div class="col-sm-12 panel-heading">
		<div class="col-sm-7">
			<img src="{{ URL::asset('/img/product.png') }}" /> <label>Products</label>
		</div>
		<div class="col-sm-5"
			style="text-align: right; padding: 30px 10px; vertical-align: middle;">
			<button type="submit" class="btn btn-md btn-success btnsave">
				<span class="glyphicon glyphicon-saved"></span> Save
			</button>
			<button onclick="redirectPage('{{ URL::asset('products') }}')" type="button"
				class="btn btn-md btn-danger">
				<span class="glyphicon"></span> Cancel
			</button>
		</div>
	</div>
	
	<div class="col-sm-12 form">
		<div class="row">
			<div class="col-sm-12">
				<h4>PRODUCT INFORMATION</h4>
			</div>
			<div class="row-form col-sm-6">
				<div class="form-group col-md-12">
					<label for="first_name">Code<span class="star"> * </span>:</label>
					{!! Form::text('code', null, array('class' => 'form-control', 'placeholder' => 'Product Code', 'id'=>'code','style'=>'width:55%')) !!}
				</div>
				<div class="form-group col-md-12">
					<label for="first_name">Name<span class="star"> * </span>:</label>
					{!! Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Product Name', 'id'=>'name','style'=>'width:55%')) !!}
				</div>
				<div class="form-group col-md-12">
					<label for="country_id">Category:</label>
					{!! Form::select('pgroup_id', $pgroups, Input::old('pgroups'), ['class'=>'form-control', 'id'=>'pgroup_id']) !!}
				</div>
				<div class="form-group col-md-12">
					<label for="first_name">Price (R)<span class="star"> * </span>:</label>
					<div class="input-group" style="width:55%">
						<div class="input-group-addon">R</div>
						{!! Form::text('price', null, array('class' => 'form-control', 'placeholder' => 'Product Price', 'id'=>'price')) !!}
					</div>
				</div>
			</div>
			<div class="row-form col-sm-6">
				<div style="text-align: center;">
					{!! html_entity_decode( Html::link("#", Html::image("img/image_png.png", "Logo", array('class'=>'pro_image')) ) ) !!}
					<div><span class="label label-danger">Size: 280px * 175px</span></div><br/>
					<div class="fileupload fileupload-new" id="pic" data-provides="fileupload">
					    <span class="btn btn-primary btn-file"><span class="fileupload-new">Choose File</span>
					    {!! Form::file('image', ['class' => 'upload']) !!}</span>
				  	</div>
				</div>
			</div>
		</div>
	</div>
	
</div>