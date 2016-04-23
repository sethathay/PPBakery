<div class="table-responsive table-list">
	<div class="col-sm-12 panel-heading">
		<div class="col-sm-7">
			<img src="{{ URL::asset('/img/product.png') }}" /> <label>មុខទំនិញ</label>
		</div>
		<div class="col-sm-5"
			style="text-align: right; padding: 30px 10px; vertical-align: middle;">
			<button type="submit" class="btn btn-md btn-success btnsave">
				<span class="glyphicon glyphicon-saved"></span> រក្សាទុក
			</button>
			<button onclick="redirectPage('{{ URL::asset('products') }}')" type="button"
				class="btn btn-md btn-danger">
				<span class="glyphicon"></span> ត្រឡប់ក្រោយ
			</button>
		</div>
	</div>
	
	<div class="col-sm-12 form">
		<div class="row">
			<div class="col-sm-12">
				<h4>ពត៍មានរបស់ទំនិញ</h4>
			</div>
			<div class="row-form col-sm-6">
				<div class="form-group col-md-12">
					<label for="first_name">លេខកូដ<span class="star"> * </span>:</label>
					{!! Form::text('code', null, array('class' => 'form-control', 'placeholder' => 'លេខកូដ', 'id'=>'code','style'=>'width:55%')) !!}
				</div>
				<div class="form-group col-md-12">
					<label for="first_name">ឈ្មោះទំនិញ<span class="star"> * </span>:</label>
					{!! Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'ឈ្មោះទំនិញ', 'id'=>'name','style'=>'width:55%')) !!}
				</div>
				<div class="form-group col-md-12">
					<label for="country_id">ក្រុមទំនិញ:</label>
					{!! Form::select('pgroup_id', $pgroups, Input::old('pgroups'), ['class'=>'form-control', 'id'=>'pgroup_id']) !!}
				</div>
				<div class="form-group col-md-12">
					<label for="first_name">តម្លៃ(៛)<span class="star"> * </span>:</label>
					<div class="input-group" style="width:55%">
						<div class="input-group-addon">៛</div>
						{!! Form::text('price', null, array('class' => 'form-control', 'placeholder' => 'តម្លៃ(៛)', 'id'=>'price')) !!}
					</div>
				</div>
			</div>
			<div class="row-form col-sm-6">
				<div style="text-align: center;">
					{!! html_entity_decode( Html::link("#", Html::image("img/image_png.png", "Logo", array('class'=>'pro_image')) ) ) !!}
					<div><span class="label label-danger">Size: 280px * 175px</span></div><br/>
					<div class="fileupload fileupload-new" id="pic" data-provides="fileupload">
					    <span class="btn btn-primary btn-file"><span class="fileupload-new">ជ្រើសរើស</span>
					    {!! Form::file('image', ['class' => 'upload']) !!}</span>
				  	</div>
				</div>
			</div>
		</div>
	</div>
	
</div>
<script>
$(document).ready(function(){
	// this block use to detect if product code already exist.
	var token = "{!! csrf_token() !!}";
	var productId  = '<?php echo (isset($product->id))? $product->id : "";?>';
	$("#code").blur(function(){
		var obj = $(this);
		$.ajax({
			type : 'post',
			url : '{{ route("products.checkProductExist") }}',
			data: { _token : token, "code":$(this).val()},
			success: function(id){
				if(id > 0 && id != productId){
					if(confirm("លេខកូនេះបានបង្កើតម្ដងហើយ!! តើអ្នកចង់ចូលទៅកាន់ទំនិញដែលមានលេខកូដនេះទេ?")){
						//window.location = id+"/edit";
						window.location = '{!! URL::asset("products/'+id+'/edit") !!}';
					}else{
						if(productId != ""){
							obj.val('<?php echo (isset($product->code))? $product->code : "";?>');
							obj.focus();
						}else{
							obj.val('');
							obj.focus();
						}
					}
				}
			}
		});
	});
	//---------------------------------------------------------
});
</script>