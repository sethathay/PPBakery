@extends('master') 

@section('content')
<style>
.table-list {
	width: 82%;
	margin: 3px auto 0;
}

.table thead {
	background: #3E5C9A;
	color: #fff;
}

.table thead th {
	text-align: center;
}

.last_td {
	text-align: center;
}

.table-responsive{
	overflow: hidden;
	min-height: .01%;
}

.panel-heading {
	background: #ebf4fe;
	padding: 0 0 0 10px;
	margin: 5px 0 10px;
	border: 1px solid #ccc;
}

.panel-heading img {
	width: 60px;
	height: 60px;
	vertical-align: middle;
}

.panel-heading label {
	padding: 20px;
	font-size: 24px;
	font-weight: bold;
}
</style>
<div class="table-responsive table-list">
	{!! Form::open(array('url' => 'inventories/save', 'method' => 'post', 'class' => 'form-inline', 'role'=>'form', 'id'=>'adminForm', 'data-toggle'=>'validator')) !!}
	<div class="col-sm-12 panel-heading">
		<div class="col-sm-5">
			<img src="{{ URL::asset('/img/product.png') }}" /> <label>ស្តុកទំនិញ</label>
		</div>
		<div class="col-sm-7" style="text-align: right; padding: 23px 10px 0 0; vertical-align: middle;">			
			<div class="col-sm-3">
				<button type="button"
					class="btn btn-md btn-primary btn-save" style="display:none;">
					<span class="glyphicon glyphicon-save"></span> រក្សាទុក
				</button>
			</div>
			<div class="col-sm-4">					
				<input name="date" type="text" value="<?php echo date('Y-m-d'); ?>" id="date" style="height:45px;" placeholder="ថ្ងៃ-ខែ-ឆ្នាំ"​ class="form-control" />
			</div>
			<div class="col-sm-3">					
				{!! Form::select('qty', [''=>'ទាំងអស់', '1'=>'ច្រើនជាង > 0', '0'=>'តូចជាង ឬស្មើ <=0'], null, array('class'=>'form-control', 'id'=>'qty', 'style'=>'height:45px;')) !!}
			</div>
			<div class="col-sm-2">
				<button type="button"
					class="btn btn-md btn-success">
					<span class="glyphicon glyphicon-search"></span> ទាញយក
				</button>
			</div>
		</div>
	</div>
	<!-- check for flash notification message -->
	@if(Session::has('flash_notice'))
		<div id="login-alert" class="alert alert-success col-sm-12">
			<div id="flash_notice">{{ Session::get('flash_notice') }}</div>
		</div>
	@endif
	
	<table class="table table-hover table-bordered table-striped" id="tbl_product">
		<thead>
			<tr>
				<th>លេខរៀង</th>
				<th>ក្រុមទំនិញ</th>
				<th>លេខកូដ</th>
				<th>ឈ្មោះទំនិញ</th>
				<th>ចំនួនទំនិញ</th>
				<th>សកម្មភាព</th>
			</tr>
		</thead>
		
		<tbody>
			<tr class="empty_data"><td colspan="6" style="text-align:center;">គ្នានទិន្ន័យនៅក្នុងតារាងទេ</td></tr>			
		</tbody>
		 
	</table>
	
	{!! Form::close() !!}
</div>

<script type="text/javascript">
	
	$(document).ready(function(){
		$(".btn-success").click(function(){
			if($("#date").val() != ""){
				var token = "{!! csrf_token() !!}";
				$.ajax({
					url : '{{ route("inventories.searchInventory") }}',
					type: 'post',
					data: {date:($("#date").val()), qty:($("#qty").val()), _token:token},
					success: function(objResult){
						if(objResult != ""){
							$(".table tbody").find("tr").remove();
							$.each(objResult, function(index, value){
								var records = "<tr>";
								records += "<td style='text-align:center;'>"+(++index)+"<input type='hidden' name='product_id[]' value='"+value.product_id+"' /></td>";
								records += "<td>"+value.product_group+"</td>";
								records += "<td style='text-align:center;'>"+value.code+"</td>";
								records += "<td>"+value.name+"</td>";
								records += "<td style='text-align:center;'>"+(value.total_qty!=null?value.total_qty:'')+"<input type='hidden' name='current_qty[]' value='"+value.total_qty+"' /></td>";
								records += "<td><input type='text' name='amount[]' class='amount' placeholder='ចំនួន' style='width:100px;height:30px; text-align:center;'/>&nbsp;&nbsp;&nbsp;";
								records += "<select name='actions[]' style='width:130px;'><option value='0'>បញ្ចូលស្តុក</option><option value='1'>កែស្តុក</option></select></td>";
								records += "</tr>";
								$(".table tbody").append(records);
							});
							$('.btn-save').show();
						}else{
							$(".table tbody").find("tr").remove();
							
						}
					}
				});
			}else{
				alert("សូមជ្រើសរើស ថ្ងៃខែឆ្នាំ!!");
			}
		});
		
		$(".btn-save").click(function(){
			var options = false;
			$.each($('.amount'),function(key, value){
				if(value.value != ""){
					options = true;
				}
			});
			
			if(options){
				$.ajax({
					type : 'post',
					url : '{{ URL::asset("inventories/save") }}',
					data : $("#adminForm").serialize(),
					dataType : 'json',
					success : function(objResult){
						if(objResult != ""){
							$(".table tbody").find("tr").remove();
							$.each(objResult, function(index, value){
								var records = "<tr>";
								records += "<td style='text-align:center;'>"+(++index)+"<input type='hidden' name='product_id[]' value='"+value.product_id+"' /></td>";
								records += "<td>"+value.product_group+"</td>";
								records += "<td style='text-align:center;'>"+value.code+"</td>";
								records += "<td>"+value.name+"</td>";
								records += "<td style='text-align:center;'>"+(value.total_qty!=null?value.total_qty:'')+"<input type='hidden' name='current_qty[]' value='"+value.total_qty+"' /></td>";
								records += "<td><input type='text' name='amount[]' class='amount' placeholder='ចំនួន' style='width:100px;height:30px; text-align:center;'/>&nbsp;&nbsp;&nbsp;";
								records += "<select name='actions[]' style='width:130px;'><option value='0'>បញ្ចូលស្តុក</option><option value='1'>កែស្តុក</option></select></td>";
								records += "</tr>";
								$(".table tbody").append(records);
							});
							$('.btn-save').show();
						}
					}
				});
			}else{
				alert("សូមបញ្ចូលចំនួនស្តុក សម្រាប់ទំនិញណាមួយ មុនចុចរក្សាទុក!!!");
			}
		});
		
		// datepicker
		$('#date').datepicker({
			format: 'yyyy-mm-dd',
			autoclose: true
		});
	});
</script>
@stop
