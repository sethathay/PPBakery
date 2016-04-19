@extends('master') 

@section('content')

<link href="{{ URL::asset('css/general.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ URL::asset('js/typeahead.js') }}"></script>
<style>
.info div{
	padding: 5px 0;
}
.info div label{
	color:#337ab7;
}


.header-fixed {
    width: 100%;
    height: 430px;
}

.header-fixed > thead,
.header-fixed > tbody,
.header-fixed > thead > tr,
.header-fixed > tbody > tr,
.header-fixed > thead > tr > th,
.header-fixed > tbody > tr > td {
    display: block;
}

.header-fixed > tbody > tr:after,
.header-fixed > thead > tr:after {
    content: ' ';
    display: block;
    visibility: hidden;
    clear: both;
}

.header-fixed > tbody {
    overflow-y: auto;
    height: 300px;
}

.header-fixed > tbody > tr > td,
.header-fixed > thead > tr > th {
    width: 13%;
    float: left;
    text-align: right;
}
.header-fixed > thead > tr > th {
    text-align: center !important;
}
.first-column{
    width: 35% !important;
    text-align: left !important;
    padding-left: 20px !important;
}
.qty-column{
    text-align: center !important;
}
.row_input{
	display : none;
}
.txt_discount,.txt_unit_price, .txt_total_by_item{
	text-align : right;
	width: 120px;
}
.txt_qty{
	text-align:center;
	width:50px;
}

#myModalPayment input{
	text-align: right;
	height: 50px;
	font-size: 20px;
}

.block-total{
	position:fixed;
	bottom: 31px;
}
.amount-big{
	font-size: 26px;
	color: red;
}
.amount, .amount-big{
	text-align: right;
	padding-right : 50px;
}
.setBackground{
	background: #F9AEC3 !important;
}
</style>

<?php
function number_format_unlimited_precision($number,$decimal = '.')
{
   $broken_number = explode($decimal,$number);
   if(count($broken_number) > 1){
		return (number_format($broken_number[0]).$decimal.$broken_number[1]);
   }else{
		return (number_format($broken_number[0]));
   }
}
?>
{!! Form::open(array('url' => 'saleOrders/store', 'method' => 'post', 'class' => 'form-inline', 'role'=>'form', 'id'=>'adminForm', 'data-toggle'=>'validator')) !!}
<div class="table-responsive table-list">
	<div class="col-sm-12 panel-heading" style="background:#286090;">
		<div class="col-sm-7">
			<img src="{{ URL::asset('/img/receipt_b.png') }}" /> <label style="color:#fff;">លក់ដុំ</label>
		</div>
		<div class="col-sm-5"
			style="text-align: right; padding: 30px 10px; vertical-align: middle;">
			<button onclick="redirectPage('{{ URL::asset('saleOrders/index') }}')" type="button"
				class="btn btn-md btn-danger">
				<span class="glyphicon"></span> ត្រឡប់ក្រោយ
			</button>
		</div>
	</div>
	
	<div class="col-sm-12 form">
		<div class="row">
			<div class="col-sm-12 info">
				<div class="col-sm-3">លេខវិក័យប័ត្រ: <label>{{ $codeGenerator }}</label></div>
				<div class="col-sm-3">ថ្ងៃកូម៉ង់ទំនេញ :  {!! Form::text('date_order', date('Y-m-d'), array('class'=>'form-control date_order')) !!} </div>
				<div class="col-sm-3">ថ្ងៃទទួលទំនេញ :  {!! Form::text('date_due', date('Y-m-d'), array('class'=>'form-control date_due')) !!}</div>
			</div>
			<div class="col-sm-12 info">
				<div class="col-sm-3">អតិថិជន :  {!! Form::select('customer_id', $customers, 1, ['class'=>'form-control', 'id'=>'customer_id']) !!}</div>
			</div>
			<div class="col-sm-12">
				<div class="form-group col-md-6">
					<input id="code" type="text" class="form-control" name="code" style="width:60%;" value="" placeholder="លេខកូដ">
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-12" style="padding:10px 0;">
		<div class="table-responsive">
		  <table class="table table-hover header-fixed table-striped">
			<thead>
				<tr>
					<th class="first-column">ឈ្មោះទំនិញ</th>
					<th>ចំនួន</th>
					<th>តំ.រាយ</th>
					<th>បញ្ចុះតំលៃ</th>
					<th>សរុប</th>
					<th>ប៊ូតុង</th>
				</tr>
			</thead>
			<tbody>
				<tr style="display: none;">
					<td class="first-column"></td>
					<td class="qty-column"><label class="lbl_qty"></label>{!! Form::text('txt_qty[]', null, array('class'=>'row_input txt_qty numberInput')) !!}</td>
					<td><label class="lbl_unit_price"></label>{!! Form::text('txt_unit_price[]', null, array('class'=>'row_input txt_unit_price numberInput')) !!}</td>
					<td><label class="lbl_discount"></label>{!! Form::text('txt_discount[]', null, array('class'=>'row_input txt_discount numberInput')) !!}</td>
					<td><label class="lbl_total_by_item"></label>{!! Form::text('txt_total_by_item[]', null, array('class'=>'row_input txt_total_by_item numberInput')) !!}</td>
					<td>
						{!! Form::hidden('id[]', null, array('class'=>'row_input id')) !!}
						<button type="button" class="btn_decrease btn btn-xs btn-danger">
							<span class="glyphicon glyphicon-minus"></span> 
						</button>
						<button type="button" class="btn_increase btn btn-xs btn-success">
							<span class="glyphicon glyphicon-plus"></span> 
						</button>
						&nbsp;&nbsp;&nbsp;
						<button type="button" class="btn_edit btn btn-xs btn-primary">
							<span class="glyphicon glyphicon-edit"></span> 
						</button>
						<button type="button" class="btn_save btn btn-xs btn-success" style="display:none;">
							<span class="glyphicon glyphicon-save"></span> 
						</button>
						<button type="button" class="btn btn-xs btn-danger btn_delete">
							<span class="glyphicon glyphicon-trash"></span> 
						</button>
					</td>
				</tr>
				
				<div class="row block-total" style="background: #DBEAF9; height: 200px; font-size: 16px; padding-top: 10px; width:83%;">
					<div class="col-md-6">
						<div><label>សារខា :  {{ Session::get('location_name') }} </label></div>
						<div><label>ឈ្មោះអ្នកប្រើប្រាស់ :  {{  Auth::user()->first_name." ".Auth::user()->last_name }} </label></div>
						<div><label>ថ្ងៃ-ខែ-ឆ្នាំ:  &nbsp;&nbsp;&nbsp;&nbsp; <span id="fullDate" style="color:blue;"></span> </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <label>ម៉ោង:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <label style="color:blue;" id="dateBox"></label></div>
						<div style="font-size: 20px; border: 1px solid #aaa; padding: 15px 10px 10px; text-align: center;"><label>អត្រាប្តូរប្រាក់ :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label style="color:blue;">1$ = {{ number_format_unlimited_precision(Session::get('exchangerate')->riel) }}R</label>{!! Form::hidden('exchange_rate_id', Session::get('exchangerate')->id, array('class'=>'exchange_rate_id')) !!}</div>
					</div>
					<div class="col-md-6 block-amount">
						<div class="row">
							<div class="col-md-6"><label>តំលៃសរុប : </label></div>
							<div class="col-md-6 amount"><label class="subtotal">0</label> <label>៛</label>{!! Form::hidden('subtotal', 0, array('class'=>'txt_subtotal')) !!}</div>
						</div>
						<!--<div class="row">
							<div class="col-md-6"><label>បញ្ចុះតំលៃ : </label></div>
							<div class="col-md-6  amount"><label class="discount">0</label> <label>៛</label>{!! Form::hidden('txt_total_discount', 0, array('class'=>'txt_total_discount')) !!}</div>
						</div>-->
						<div class="row" style="padding-top:30px;">
							<div class="col-md-6" style="color:red;"><label>តំលៃសរុបត្រូវបង់ (៛) : </label></div>
							<div class="col-md-6  amount-big"><label class="total_amount_riel">0</label> <label>៛</label>{!! Form::hidden('total_amount_riel', 0, array('class'=>'txt_total_amount_riel')) !!}</div>
						</div>
						<div class="row">
							<div class="col-md-6" style="color:red;"><label>តំលៃសរុបត្រូវបង់ ($) : </label></div>
							<div class="col-md-6  amount-big"><label class="total_amount_us">0</label> <label>$</label>{!! Form::hidden('total_amount_us', 0, array('class'=>'txt_total_amount_us')) !!}</div>
						</div>
					</div>
				</div>
			</tbody>
		  </table>
		</div>
	</div>
		
	
	<!-- Modal Payment -->
	<div id="myModalPayment" class="modal fade bs-example-modal-lg" role="dialog">
	  <div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-body"><br/>
				<div class="row">
					<div class="col-md-4"><label>តំលៃសរុបត្រូវបង់ (៛) : </label></div>
					<div class="col-md-7 amount-big"><label class="popup_total_amount_riel"></label> <label>៛</label></div>
				</div>
				<div class="row">
					<div class="col-md-4"><label>តំលៃសរុបត្រូវបង់ ($) : </label></div>
					<div class="col-md-7 amount-big"><label class="popup_total_amount_us"></label> <label>$</label></div>
				</div>
				<div class="row">
					<div style="margin-bottom: 50px">
						<div class="col-md-4"><label>បញ្ចុះតំលៃ (៛) : </label></div>
						<div class="col-md-7 amount-big"><input id="custom-discount-riel" type="text" class="form-control custom-discount-riel numberInput" name="custom-discount-riel" value="0" placeholder=""></div>
					</div>
				</div>
				<div class="row">
					<div style="margin-bottom: 70px">
						<div class="col-md-4"><label>បញ្ចុះតំលៃ ($) : </label></div>
						<div class="col-md-7 amount-big"><input id="custom-discount-us" type="text" class="form-control custom-discount-us numberInput" name="custom-discount-us" value="0" placeholder=""></div>
					</div>
				</div>
				<div class="row">
					<div style="margin-bottom: 50px">
						<div class="col-md-4"><label>បង់ប្រាក់ (៛) : </label></div>
						<div class="col-md-7 amount-big"><input id="amount_riel" type="text" class="form-control custom-amount numberInput" name="amount_riel" value="0" placeholder=""></div>
					</div>
				</div>
				<div class="row">
					<div style="margin-bottom: 50px">
						<div class="col-md-4"><label>បង់ប្រាក់ ($) : </label></div>
						<div class="col-md-7 amount-big"><input id="amount_us" type="text" class="form-control custom-amount numberInput" name="amount_us" value="0" placeholder=""></div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4"><label>ប្រាក់អាប់ (៛) : </label></div>
					<div class="col-md-7 amount-big" style="color:blue;"><label class="remain_total_amount_riel">0</label> <label>៛</label></div>
				</div>
				<div class="row">
					<div class="col-md-4"><label>ប្រាក់អាប់ ($) : </label></div>
					<div class="col-md-7 amount-big" style="color:blue;"><label class="remain_total_amount_us">0</label> <label>$</label></div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-print btn-primary" id="btn-paid" data-dismiss="modal">បង់ប្រាក់</button>				
				<button type="button" class="btn btn-print btn-danger" data-dismiss="modal">ត្រឡប់ក្រោយ</button>
			</div>
		</div>

	  </div>
	</div>	
	<!-- Modal QTY -->	
	
	{!! Form::close() !!}
</div>
	
<!-- Modal QTY -->
<div id="myModal" class="modal fade myModal" role="dialog">
  <div class="modal-dialog">

	<!-- Modal content-->
	<div class="modal-content">
	  <div class="modal-body"><br/>
		<input id="custom-amount" type="text" class="form-control custom-amount" name="custom-amount" value="" placeholder="ចំនួន">
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-default btn-ok" data-dismiss="modal">OK</button>
	  </div>
	</div>

  </div>
</div>	
<!-- Modal QTY -->

<!-- Modal QTY minus -->
<div class="modal fade myModal" role="dialog">
  <div class="modal-dialog">

	<!-- Modal content-->
	<div class="modal-content">
	  <div class="modal-body"><br/>
		<input id="custom-amount-minus" type="text" class="form-control custom-amount" name="custom-amount-minus" value="" placeholder="ចំនួន">
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-default btn-ok" data-dismiss="modal">OK</button>
	  </div>
	</div>

  </div>
</div>	
<!-- Modal QTY  minus-->


<!-- Modal Print Receipt -->
<div id="myModalPrint" class="modal fade col-md-3" role="dialog">
</div>
<script type="text/javascript">
		$(document).ready(function(){
		
			
		$("#myModalPayment").find("input").keydown(
			function(e)
			{    
				if (e.keyCode==38) {
					navigate(e.target, -1);
				}
				if (e.keyCode==40) {
					navigate(e.target, 1);
				}
			}
		);
		function navigate(origin, sens) {
			var inputs = $('#myModalPayment').find('input:enabled');
			var index = inputs.index(origin);
			index += sens;
			if (index < 0) {
				index = inputs.length - 1;
			}
			if (index > inputs.length - 1) {
				index = 0;
			}
			inputs.eq(index).focus();
			inputs.eq(index).select();
		}
					
		$("#code").val('');
		$("#code").focus();
				
		$(".numberInput").keypress(function(event){	
			if((event.which != 8 && isNaN(String.fromCharCode(event.which))) && event.which != 46){
			   event.preventDefault(); //stop character from entering input
		   }
		});
		
		var rate = "{{ Session::get('exchangerate')->riel }}";
		var index = 1;
		var productItem = Array();
		var record = 0;
		var token = "{!! csrf_token() !!}";

		$(".txt_subtotal").val(0);
		$(".txt_total_discount").val(0);
		$(".txt_total_amount_riel").val(0);
		$(".txt_total_amount_us").val(0);
		
		// when press enter button and amount paid < amount to be pay
		$("#myModalPayment").find("input").keyup(function(e){
			var key = e.keyCode || e.which;
			if(key === 13){
				if(record > 0){
					$.ajax({
						type : 'post',
						url : '{{ URL::asset("saleOrders/store") }}',
						data : $("#adminForm").serialize(),
						dataType : 'json',
						success : function(result){
							// return sales_order_id;								
							$("#myModalPayment").hide();
							$("#myModalPrint").load('{{ URL::asset("saleOrders/print")}}/'+result+'/no', '', function(){
								//$("#myModalPrint").modal();
								w = window.open();
								w.document.write($("#myModalPrint").html());
								w.print(false);
								w.close();
								window.location = '{{ URL::asset("saleOrders/index") }}';
							});
						}
					});
				}
			}
		});
		
		
		// when click button Paid
		$("#btn-paid").click(function(){
			if(record > 0){
				$.ajax({
					type : 'post',
					url : '{{ URL::asset("saleOrders/store") }}',
					data : $("#adminForm").serialize(),
					dataType : 'json',
					success : function(result){
						// return sales_order_id;							
						$("#myModalPayment").hide();
							$("#myModalPrint").load('{{ URL::asset("saleOrders/print")}}/'+result+'/no', '', function(){
							//$("#myModalPrint").modal();
							w = window.open();
							w.document.write($("#myModalPrint").html());
							w.print(false);
							w.close();
							window.location = '{{ URL::asset("saleOrders/index") }}';
						});
					}
				});
			}
		});
		
		$("#myModal").on('shown.bs.modal', function(){
			$(this).find('input[type="text"]').focus();
		});
		$("#myModal").on('hide.bs.modal', function(){
			$("#code").focus();
		});
		
		$(".btn-ok").click(function(){
			var token1 = "{!! csrf_token() !!}";
			var codeNumber1 = $("#code").val();
			var qty_fill = Number($("#custom-amount").val());
			getProduct(qty_fill, codeNumber1, token1);
			$('#myModal').modal('hide');
			$("#code").focus();
		});
		
		// F8
		$("#custom-amount").keypress(function(e) {
				
			var codes = e.keyCode || e.which;
			
			if(codes == 13){						
				var token1 = "{!! csrf_token() !!}";
				var codeNumber1 = $("#code").val();
				var qty_fill = Number($(this).val());
				
				getProduct(qty_fill, codeNumber1, token1);
				
				$(this).val('');
				$('#myModal').modal('hide');
				$("#code").focus();
			}
			
		});
		
		$(".myModal").on('shown.bs.modal', function(){
			$(this).find('input[type="text"]').focus();
		});
		$(".myModal").on('hide.bs.modal', function(){
			$("#code").focus();
		});
		
		// F7
		$("#custom-amount-minus").keypress(function(e) {
				
			var codes = e.keyCode || e.which;
			
			if(codes == 13){						
				var token1 = "{!! csrf_token() !!}";
				var codeNumber1 = $("#code").val();
				var qty_fill = Number($(this).val())*(-1);
				
				getProduct(qty_fill, codeNumber1, token1);
				
				$(this).val('');
				$('.myModal').modal('hide');
				$("#code").focus();
			}
			
		});
		// when fill product code
		$("#code").keydown(function(e) {
			var code = e.keyCode || e.which;
			
			// F7	
			if(code == 118){
				e.preventDefault(); //Disable shortcut browser
				var codeNumber = $("#code").val();
				if(codeNumber != ""){	
					$('.myModal').modal({ keyboard: true, backdrop: 'static' });
				}
			}
			
			// F8	
			if(code == 119){
				var codeNumber = $("#code").val();
				if(codeNumber != ""){	
					$('#myModal').modal({ keyboard: true, backdrop: 'static' });		
				}
			}
			
			// F9	
			if(code == 120){
				//cloneRecord(5);
				var codeNumber = $("#code").val();
				getProduct(5, codeNumber, token);
			}
			// F10
			if(code == 121){
				e.preventDefault(); //Disable shortcut browser
				//cloneRecord(10);
				var codeNumber = $("#code").val();
				getProduct(10, codeNumber, token);
			}
			// F11
			if(code == 122){
				e.preventDefault(); //Disable shortcut browser
				//cloneRecord(20);
				var codeNumber = $("#code").val();
				getProduct(20, codeNumber, token);
			}
			// F12
			if(code == 123){
				e.preventDefault(); //Disable shortcut browser
				//cloneRecord(50);
				var codeNumber = $("#code").val();
				getProduct(50, codeNumber, token);
			}

			if(code == 13) { 
				var codeNumber = $("#code").val();
				getProduct(1, codeNumber, token);
			}
		});
		
		// Find product
		function getProduct(qty, codeNumber, token){
			if(codeNumber != ""){
				$.ajax({
					type : 'post',
					url : '{{ route("products.searchProdctByCode") }}',
					data : { _token : token, "codeNumber":codeNumber},
					dataType : 'json',
					beforeSend: function(){
						//waitingDialog.show();
					},
					success : function(result){
						//waitingDialog.hide();
						if(jQuery.isEmptyObject(result)){
							alert("លេខកូដមិនត្រឹមត្រូវទេ!!");
							$("#code").val("");
							$("#code").focus();
						}else{
							cloneRecord(qty,result);
							record++;
						}
						$("#code").focus();
					}
				});
				
			}else if(record == 0){
				alert("សូមបញ្ចូលលេខកូដទំនេញ!!");
			}else{
				$('#myModalPayment').modal({ keyboard: true, backdrop: 'static' });
			}
		}
		$("#myModalPayment").on('shown.bs.modal', function(){
			//$(".header-fixed tbody").find('tr:last').remove();
			$("#amount_us").val(0);
			$("#custom-discount-riel").val(0);
			$("#custom-discount-us").val(0);
			$("#amount_riel").focus();
			$(".popup_total_amount_riel").text(addCommas($(".txt_total_amount_riel").val()));
			$(".popup_total_amount_us").text(addCommas(getMathRound100($(".txt_total_amount_us").val())));
			
			$("#amount_riel").val(addCommas($(".txt_total_amount_riel").val())).select();
		});
		$("#myModalPayment").on('hidden.bs.modal', function(e) { 
			$("#amount_us").val(0);
			$("#custom-discount-riel").val(0);
			$("#custom-discount-us").val(0);
			$("#code").focus();
		});
		
		// when update paid price in riel
		$("#amount_riel").keyup(function(){
			var amount_pay = Number($(".txt_total_amount_riel").val());
			var amount_riel = 0;
			var amount_us = 0;
			var discount_riel = 0;
			var discount_us = 0;
							
			discount_riel = Number($("#custom-discount-riel").val());
			discount_us = Number($("#custom-discount-us").val());
			amount_us = Number($("#amount_us").val().replace(",",""));
			amount_riel = Number($("#amount_riel").val().replace(",",""));
			
			var amountPaidRiel = amount_pay - ( Number(amount_riel) + Number(amount_us)*rate + discount_riel + discount_us*rate );
			var amountPaidUs = amountPaidRiel/rate;
			var remain_riel = addCommas(getMathRound100(amountPaidRiel));
			var remain_us = addCommas(getMathRound100(amountPaidUs));
			
			$(".remain_total_amount_riel").text(remain_riel);
			$(".remain_total_amount_us").text(remain_us);
		});
		
		// when update paid price us
		$("#amount_us").keyup(function(){
			var amount_pay = Number($(".txt_total_amount_riel").val());
			var amount_riel = 0;
			var amount_us = 0;
			var discount_riel = 0;
			var discount_us = 0;
										
			discount_riel = Number($("#custom-discount-riel").val());
			discount_us = Number($("#custom-discount-us").val());	
			amount_us = Number($("#amount_us").val().replace(",",""));
			amount_riel = Number($("#amount_riel").val().replace(",",""));
			
			var amountPaidRiel = amount_pay - ( Number(amount_riel) + Number(amount_us)*rate + discount_riel + discount_us*rate  );
			var amountPaidUs = amountPaidRiel/rate;
			var remain_riel = addCommas(getMathRound100(amountPaidRiel));
			var remain_us = addCommas(getMathRound100(amountPaidUs));
			
			$(".remain_total_amount_riel").text(remain_riel);
			$(".remain_total_amount_us").text(remain_us);
		});
		
		// when update paid discount in riel
		$("#custom-discount-riel").keyup(function(){
			var amount_pay = Number($(".txt_total_amount_riel").val());
			var amount_riel = 0;
			var amount_us = 0;
			var discount_riel = 0;
			var discount_us = 0;
			
			discount_riel = Number($("#custom-discount-riel").val());
			discount_us = Number($("#custom-discount-us").val());	
			amount_us = Number($("#amount_us").val().replace(",",""));
			amount_riel = Number($("#amount_riel").val().replace(",",""));
			var amountPaidRiel = amount_pay - ( Number(amount_riel) + Number(amount_us)*rate + discount_riel + discount_us*rate  );
			var amountPaidUs = amountPaidRiel/rate;
			var remain_riel = addCommas(getMathRound100(amountPaidRiel));
			var remain_us = addCommas(getMathRound100(amountPaidUs));
			
			$(".remain_total_amount_riel").text(remain_riel);
			$(".remain_total_amount_us").text(remain_us);
		});
		
		// when update paid discount in us
		$("#custom-discount-us").keyup(function(){
			var amount_pay = Number($(".txt_total_amount_riel").val());
			var amount_riel = 0;
			var amount_us = 0;
			var discount_riel = 0;
			var discount_us = 0;
			
			discount_riel = Number($("#custom-discount-riel").val());
			discount_us = Number($("#custom-discount-us").val());	
			amount_us = Number($("#amount_us").val().replace(",",""));
			amount_riel = Number($("#amount_riel").val().replace(",",""));
			var amountPaidRiel = amount_pay - ( Number(amount_riel) + Number(amount_us)*rate + discount_riel + discount_us*rate  );
			var amountPaidUs = amountPaidRiel/rate;
			var remain_riel = addCommas(getMathRound100(amountPaidRiel));
			var remain_us = addCommas(getMathRound100(amountPaidUs));
			
			$(".remain_total_amount_riel").text(remain_riel);
			$(".remain_total_amount_us").text(remain_us);
		});
		
		// clone record
		function cloneRecord(qty, result){
			
			var unit_price = Number(result.price);
			var discount = (Number(result.discount_amount) + Number(result.discount_percent))*Number(qty);
			var total_by_item = getMathRound((unit_price * Number(qty) - discount));
			var picture = result.photo;
			
			
			if(productItem.indexOf(Number(result.id)) == -1){
				
				
				var obj = $(".header-fixed tbody").find('tr:first');
				// Add product id into array
				productItem.push(result.id);
				// Create row and set value
				obj.clone(true).insertAfter(".header-fixed tbody tr:nth-child(1)");
				obj.css("display", "");
				obj.find("td:first").text(result.name);
				obj.find("td:eq(1)").find(".lbl_qty").text(qty);
				obj.find("td:eq(1)").find(".txt_qty").val(qty);
				obj.find("td:eq(2)").find(".lbl_unit_price").text(addCommas(unit_price));
				obj.find("td:eq(2)").find(".txt_unit_price").val(unit_price);
				obj.find("td:eq(3)").find(".lbl_discount").text(addCommas(discount));
				obj.find("td:eq(3)").find(".txt_discount").val(discount);
				obj.find("td:eq(4)").find(".lbl_total_by_item").text(addCommas(total_by_item));
				obj.find("td:eq(4)").find(".txt_total_by_item").val(total_by_item);
				obj.find("td:eq(5)").find(".id").val(result.id);
					
				$("tr").removeClass("setBackground");					
				obj.addClass("setBackground");
				
				
			}else{
				
				
				var oldQty = $(".header-fixed tbody").find(".id[value="+Number(result.id)+"]").parent().parent().find("td:eq(1)").find(".txt_qty").val();
				var newQty = ((Number(qty)+Number(oldQty)>=0)?Number(qty)+Number(oldQty):0);
				var newDiscountByItem = (Number(result.discount_amount) + Number(result.discount_percent))*Number(newQty);
				var newTotalPrice = newQty * Number(unit_price) - newDiscountByItem;
				total_by_item = newTotalPrice - (oldQty * unit_price - (Number(result.discount_amount) + Number(result.discount_percent)) * oldQty);
				
				// Update record
				var newObj = $(".header-fixed tbody").find(".id[value="+Number(result.id)+"]").parents('tr');
				
				newObj.find("td:eq(1)").find(".lbl_qty").text(newQty);
				newObj.find("td:eq(1)").find(".txt_qty").val(newQty);					
				newObj.find("td:eq(3)").find(".lbl_discount").text(addCommas(newDiscountByItem));
				newObj.find("td:eq(3)").find(".txt_discount").val(newDiscountByItem);
				newObj.find("td:eq(4)").find(".lbl_total_by_item").text(addCommas(newTotalPrice));
				newObj.find("td:eq(4)").find(".txt_total_by_item").val(newTotalPrice);
				
				if(newQty == 0){
					
					// Remove product id from array in table list
					productItem.splice(productItem.indexOf( result.id ), 1);
					newObj.remove();
					// Remove product picture
					$(".product_name:contains('"+newObj.find("td:eq(0)").text()+"')").parents("li").remove();
				}
				
				$("tr").removeClass("setBackground");					
				newObj.addClass("setBackground");
			}
			
			// Sum total discount
			var txt_total_discount = Number($(".txt_total_discount").val());
			var total_discount     = txt_total_discount;				
			$(".discount").text(addCommas(total_discount));
			$(".txt_total_discount").val(total_discount);
			
			// Sum subtotal
			var txt_subtotal = Number($(".txt_subtotal").val());
			var subtotal     = txt_subtotal + total_by_item;				
			$(".subtotal").text(addCommas(getMathRound(subtotal)));
			$(".txt_subtotal").val(subtotal);
							
			// Sum total amount in riel
			var total_amount_riel     = (subtotal);				
			$(".total_amount_riel").text(addCommas(getMathRound(total_amount_riel)));
			$(".txt_total_amount_riel").val(total_amount_riel);
			
			// Sum total amount in us
			var total_amount_us     = total_amount_riel / rate;				
			$(".total_amount_us").text(addCommas(getMathRound100(total_amount_us)));
			$(".txt_total_amount_us").val(total_amount_us);
			
			$("#code").val("");
			$("#code").focus();
		}
			
		//click on button delete
		$(".btn_delete").click(function(){
			if(confirm("តើអ្នកពិតជាចង់លុបទំនេញ "+($(this).parents("tr").find("td:eq(0)").text())+" មែនទេ?")){
				
				// Calculate total block
				calculateTotalBlock(- Number($(this).parents("tr").find(".txt_total_by_item").val()));
				
				// Remove product id from array in table list
				productItem.splice(productItem.indexOf(Number($(this).parents("tr").find(".id").val()) ), 1);
				
				//Remove html record from table list
				$(this).closest("tr").remove();
				
				// Remove product picture
				$(".product_name:contains('"+$(this).parents("tr").find("td:eq(0)").text()+"')").parents("li").remove();
			}
			
			$("#code").focus();				
		});
		
			
		// when click on increase button
		$(".btn_increase").click(function(){				
			var getObj = $(this).parents("tr");
			var newQty = Number(getObj.find(".txt_qty").val())+1;
			getObj.find(".txt_qty").val( newQty );
			
			var unit_price = Number(getObj.find(".txt_unit_price").val());
			var oldDiscount = Number(getObj.find(".lbl_discount").text().replace(",","")) / Number(getObj.find(".lbl_qty").text());
			$(".txt_subtotal").val( Number($(".txt_subtotal").val()) - Number(getObj.find(".lbl_total_by_item").text().replace(",","")) );
			
			getObj.find(".lbl_qty").text(Number(getObj.find(".txt_qty").val()));
			
			getObj.find(".lbl_discount").text(addCommas( oldDiscount * newQty ));
			getObj.find(".txt_discount").val(oldDiscount * newQty);
			var newDiscount = oldDiscount * newQty;
			
			var total_by_item = unit_price*newQty - newDiscount;				
			getObj.find(".lbl_total_by_item").text(addCommas(total_by_item));
			getObj.find(".txt_total_by_item").val(total_by_item);
			
			calculateTotalBlock(total_by_item);
			
			$("#code").focus();
		});
		// when click on decrease button
		$(".btn_decrease").click(function(){				
			var getObj = $(this).parents("tr");
			if(Number(getObj.find(".txt_qty").val()) > 1){
				var newQty = Number(getObj.find(".txt_qty").val())-1;
				getObj.find(".txt_qty").val( newQty );
				
				
				var unit_price = Number(getObj.find(".txt_unit_price").val());
				var oldDiscount = Number(getObj.find(".lbl_discount").text().replace(",","")) / Number(getObj.find(".lbl_qty").text());
				$(".txt_subtotal").val( Number($(".txt_subtotal").val()) - Number(getObj.find(".lbl_total_by_item").text().replace(",","")) );
				
				getObj.find(".lbl_qty").text(Number(getObj.find(".txt_qty").val()));
				
				getObj.find(".lbl_discount").text(addCommas( oldDiscount * newQty ));
				getObj.find(".txt_discount").val(oldDiscount * newQty);
				var newDiscount = oldDiscount * newQty;
				
				var total_by_item = unit_price*newQty - newDiscount;				
				getObj.find(".lbl_total_by_item").text(addCommas(total_by_item));
				getObj.find(".txt_total_by_item").val(total_by_item);
				
				calculateTotalBlock(total_by_item);
			}else{
				alert("មិនអាចដកទៀតបានទេ ទំនិញយ៉ាងហោចណាស់ត្រូវទុកចំនួន​ 1!!");
			}
			
			$("#code").focus();
		});
		
		// click on button edit
		$(".btn_edit").click(function(){
			$(this).toggle();
			$(this).closest("tr").find(".btn_save").toggle();
			$(this).closest("tr").find("input").toggle();
			$(this).closest("tr").find("label").toggle();
		});
		
		// when qty is change
		$(".txt_qty").keyup(function(){				
			var getObj = $(this).parents("tr");
			var newQty = Number(getObj.find(".txt_qty").val());
			var oldQty = getObj.find(".lbl_qty").text();
			
			if(oldQty == 0 || oldQty == ""){
				oldQty = 1;
			}
			
			var unit_price = Number(getObj.find(".txt_unit_price").val());
			var oldDiscount = Number(getObj.find(".lbl_discount").text().replace(",","")) / Number(oldQty);
			$(".txt_subtotal").val( Number($(".txt_subtotal").val()) - Number(getObj.find(".lbl_total_by_item").text().replace(",","")) );
			
			getObj.find(".lbl_qty").text(getObj.find(".txt_qty").val());
			
			if(newQty == 0 || newQty == ""){
				newQty = 1;
			}
			
			getObj.find(".lbl_discount").text(addCommas( oldDiscount * newQty ));
			getObj.find(".txt_discount").val(oldDiscount * newQty);
			var newDiscount = oldDiscount * newQty;
			
			var total_by_item = unit_price*newQty - newDiscount;				
			getObj.find(".lbl_total_by_item").text(addCommas(total_by_item));
			getObj.find(".txt_total_by_item").val(total_by_item);
			
			calculateTotalBlock(total_by_item);
		});
		
		// when unit price is change
		$(".txt_unit_price").keyup(function(){	
			var getObj = $(this).parents("tr");
			var newQty = Number(getObj.find(".txt_qty").val());
			var unit_price = Number(getObj.find(".txt_unit_price").val());
			var discount = Number(getObj.find(".lbl_discount").text().replace(",","")) / Number(getObj.find(".lbl_qty").text());
			$(".txt_subtotal").val( Number($(".txt_subtotal").val()) - Number(getObj.find(".lbl_total_by_item").text().replace(",","")) );
			
			var total_by_item = unit_price*newQty - discount;
			
			getObj.find(".lbl_unit_price").text(addCommas(unit_price));
			getObj.find(".txt_unit_price").val(unit_price);
			
			getObj.find(".lbl_total_by_item").text(addCommas(total_by_item));
			getObj.find(".txt_total_by_item").val(total_by_item);
			
			calculateTotalBlock(total_by_item);
		});
		
		// when discount is change
		$(".txt_discount").keyup(function(){	
			var getObj = $(this).parents("tr");
			var newQty = Number(getObj.find(".txt_qty").val());
			var unit_price = Number(getObj.find(".txt_unit_price").val());
			var discount = Number($(this).val());
			$(".txt_subtotal").val( Number($(".txt_subtotal").val()) - Number(getObj.find(".lbl_total_by_item").text().replace(",","")) );
			
			var total_by_item = unit_price*newQty - discount;
			
			getObj.find(".lbl_unit_price").text(addCommas(unit_price));
			getObj.find(".txt_unit_price").val(unit_price);
			
			getObj.find(".lbl_total_by_item").text(addCommas(total_by_item));
			getObj.find(".txt_total_by_item").val(total_by_item);
			
			calculateTotalBlock(total_by_item);
		});
		
		// Click Save Record
		$(".btn_save").click(function(){
			$(this).toggle();
			$(this).closest("tr").find(".btn_edit").toggle();
			var getObj = $(this).parents("tr");
			$(".txt_subtotal").val(Number($(".txt_subtotal").val()) - Number(getObj.find(".lbl_total_by_item").text().replace(",","")));
							
			getObj.find(".lbl_qty").text(getObj.find(".txt_qty").val());
			
			getObj.find(".lbl_discount").text(addCommas(getObj.find(".txt_discount").val()));
			getObj.find(".txt_discount").val(getObj.find(".txt_discount").val());
			
			getObj.find(".lbl_total_by_item").text(addCommas(getObj.find(".txt_total_by_item").val()));
			getObj.find(".txt_total_by_item").val(getObj.find(".txt_total_by_item").val());
			
			total_by_item = getMathRound(getObj.find(".txt_total_by_item").val());
			
			calculateTotalBlock(total_by_item);
			
			$(this).closest("tr").find("input").toggle();
			$(this).closest("tr").find("label").toggle();
			$("#code").focus();
		});
		
		// datepicker
		$('.date_due, .date_order').datepicker({
			format: 'yyyy/mm/dd',
			autoclose: true
		});
		
		// Calculate total block
		function calculateTotalBlock(total_by_item){			
							
			// Sum total discount
			var txt_total_discount_riel = Number($(".txt_total_discount_riel").val());	
			var txt_total_discount_us = Number($(".txt_total_discount_us").val());	
			$(".lbl_total_discount_riel").text(addCommas(txt_total_discount_riel));
			$(".lbl_total_discount_us").text(addCommas(txt_total_discount_us));
			$(".txt_total_discount_riel").val(txt_total_discount_riel);
			$(".txt_total_discount_us").val(txt_total_discount_us);
			
			// Sum subtotal
			var txt_subtotal = Number($(".txt_subtotal").val());
			var subtotal     = txt_subtotal + total_by_item;	
			$(".subtotal").text(addCommas(getMathRound(subtotal)));
			$(".txt_subtotal").val(subtotal);
															
			// Sum total amount in riel
			var total_amount_riel     = (subtotal);				
			$(".total_amount_riel").text(addCommas(getMathRound(total_amount_riel)));
			$(".txt_total_amount_riel").val(total_amount_riel);
			
			// Sum total amount in us
			var total_amount_us     = total_amount_riel / rate;				
			$(".total_amount_us").text(addCommas(getMathRound(total_amount_us)));
			$(".txt_total_amount_us").val(total_amount_us);
		}
	});
	

	// add commas for number 120,000
	function addCommas(nStr)
	{
		nStr += '';
		x = nStr.split('.');
		x1 = x[0];
		x2 = x.length > 1 ? '.' + x[1] : '';
		var rgx = /(\d+)(\d{3})/;
		while (rgx.test(x1)) {
			x1 = x1.replace(rgx, '$1' + "," + '$2');
		}
		return x1 + x2;
	}
	
	// Round number 0.0
	function getMathRound(amount){
		return Math.round( (amount) * 10 ) / 10;
	}
	
	// Round number 0.00
	function getMathRound100(amount){
		return Math.round( (amount) * 100 ) / 100;
	}

	
	function updateClock ( )
	{
		var currentTime = new Date ( );
		var currentHours = currentTime.getHours ( );
		var currentMinutes = currentTime.getMinutes ( );
		var currentSeconds = currentTime.getSeconds ( );

		// Pad the minutes and seconds with leading zeros, if required
		currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
		currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;

		// Choose either "AM" or "PM" as appropriate
		var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";

		// Convert the hours component to 12-hour format if needed
		currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;

		// Convert an hours component of "0" to "12"
		currentHours = ( currentHours == 0 ) ? 12 : currentHours;

		// Compose the string for display
		var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;
		
		var month=currentTime.getMonth()+1;
		var today=currentTime.getDate();
		var year=currentTime.getFullYear();
		
		today = (today < 10? "0":"")+today;
		month = (month < 10? "0":"")+month;
			
		$("#fullDate").html(today+"-"+month+"-"+year);
		$("#dateBox").html(currentTimeString);
			
	 }
		setInterval('updateClock()', 1000);
</script>
@stop
