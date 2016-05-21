<!DOCTYPE html>
<html>
<head>
<title>ហាងនំបុ័ងភ្នំពេញ</title>

<meta name="viewport"
	content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ URL::asset('js/jquery-1.11.3.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.validator.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/loading.js') }}"></script>
<link href="{{ URL::asset('css/bootstrap-3.3.2.css') }}" rel="stylesheet">

<style>
html, body {
	height: 100%;
}

body {
	margin: 0;
	padding: 0;
	width: 100%;
	display: table;
	font-weight: 100;
	font-family: "Arial Regular", "Arial";
}

.container {
	display: table-cell;
	vertical-align: top;
}

.header {
	background-color: #3E5C9A;
	height: 70px;
	color: #fff;
}

.header_logo {
	width: 4.333%;
}

.header_name {
	line-height: 15px;
}

.header .logo {
	width: 80px;
	height: 80px;
	margin: -2px 0 0 1px;
	vertical-align: middle;
}

.header .big_name {
	font-family: Arial;
	font-weight: bold;
	font-size: 16pt;
	margin: 30px 0 0 5px;
}

.header .small_name label {
	font-family: Arial;
	font-size: 13px;
	font-weight: 0;
}

.content {
	display: inline-block;
	padding: 0;
	margin: 0;
}

.title {
	font-size: 96px;
}

/* end left column */
@font-face {
	font-family: 'Glyphicons Halflings';
	src: url('{{URL::asset('bootstrap-3.3.2/fonts/glyphicons-halflings-regular.eot')}}');
	src:
		url('{{URL::asset('bootstrap-3.3.2/fonts/glyphicons-halflings-regular.eot?#iefix')}}')
		format('embedded-opentype'),
		url('{{URL::asset('bootstrap-3.3.2/fonts/glyphicons-halflings-regular.woff')}}')
		format('woff'),
		url('{{URL::asset('bootstrap-3.3.2/fonts/glyphicons-halflings-regular.ttf')}}')
		format('truetype'),
		url('{{URL::asset('bootstrap-3.3.2/fonts/glyphicons-halflings-regular.svg#glyphicons-halflingsregular')}}')
		format('svg');
}
.content-right{
	border-left: 2px solid #DBEAF9; 
}
.header_info {
	margin: 25px 0 0;
}

.header_info div {
	margin: 0 0 5px;
	text-align: right;
	font-size: 12px;
}

.photo_product{
	margin: 8px 14px;
	padding: 0;
}
.photo_product li{
	width: 100px; 
	height: 100px;
	list-style: none;
	display: inline;
	margin: 10px 5px 0;
	padding: 65px 0 70px;
	border: 1px #F84D36 solid; 
	border-radius: 5px;
	position: relative;
}
.product_name { 
   position: absolute; 
   top: 102px; 
   left: 0; 
   width: 100%; 
   font-size: 11px;
   background: rgba(0,0,255,0.4);
   color: #fff;
   text-align: center;
   padding: 17px 0;   
   border-bottom-right-radius:5px;
   border-bottom-left-radius:5px;
   
}
.photo_product li:hover{
	border: 1px #3E5C9A solid; 
	box-shadow: 3px 3px 2px #ccc;
	opacity: 0.5;
}
.photo_product li img{
	width: 150px; 
	height: 150px; 
	border-radius: 5px;
}
.photo_product li img:hover{
	cursor: pointer;
}

.table thead{
	background: #E2E2E2;
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
    height: 350px;
}

.header-fixed > tbody > tr > td,
.header-fixed > thead > tr > th {
	font-size: 18px;
    width: 13%;
    float: left;
    text-align: right;
}
.header-fixed > thead > tr > th {
    text-align: center !important;
	font-size: 20px;
}
.first-column{
    width: 35% !important;
    text-align: left !important;
    padding-left: 20px !important;
}
.qty-column{
    text-align: center !important;
}

.content-left{
	background: #DBEAF9;
	padding: 24px 12px 0;
}

#code{
	font-size: 20px;
	color: red;
	font-weight: bold;
}
.block-amount{
	font-size: 18px;
}
.amount-big{
	font-size: 30px;
	color: red;
}
.amount, .amount-big{
	text-align: center;
	padding-right : 50px;
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

.form-group {
	margin: 10px 5px;
}

.block-total{
	position:fixed;
	bottom: 31px;
	right:15px;
}

.footer {
	background-color: #3E5C9A;
	height: 30px;
	color: #fff;
	position:fixed;
	bottom: 0;
	text-align: center;
}
.footer_content{
	padding-top: 5px;
}

#slideshow {
	margin:8px;
    height:506px;
}

#slideshow IMG {
    position:absolute;
    z-index:8;
}

#slideshow IMG.active {
    z-index:10;
}

#slideshow IMG.last-active {
    z-index:9;
}

.setBackground{
	background: #F9AEC3 !important;
}
.align_right{
	text-align:right;
}

.user_info{
	padding : 2px 0;
}
.numberInput{
	font-size:20px;
	font-weight: bold;
}
</style>
</head>
<body>
	<div class="cover-container">
		<div class="col-md-12 header">
			<div class="row">
				<div class="col-md-1 header_logo">
					<img class="logo" src="{{ URL::asset('img/ppbakery.png') }}" alt="hamburger.png" />
				</div>
				<div class="col-md-2 header_name">
					<label class="big_name">ហាងនំបុ័ងភ្នំពេញ</label>
				</div>
				<div class="col-md-9" style="text-align:right; padding-top: 20px;">
					<button onclick="redirectPage('saleOrders/create')" type="button"
						class="btn btn-md btn-primary">
						<span class="glyphicon glyphicon-plus"></span> លក់ដុំ
					</button>
					<button onclick="redirectPage('bookers/book')" type="button"
						class="btn btn-md btn-success">
					<span class="glyphicon glyphicon-plus"></span> កក់ទំនេញ
				</button>
				</div>
			</div>
		</div>

		<div class="col-md-12 content">
			{!! Form::open(array('url' => 'pos/sale', 'method' => 'post', 'class' => 'form-inline', 'role'=>'form', 'id'=>'adminForm', 'data-toggle'=>'validator')) !!}
			<div class="col-md-4 content-left">
				<div><input id="code" type="text" class="form-control" name="code" style="width:100%;" value="" placeholder="លេខកូដ"></div>
				
				<div style="padding-top:20px;">
					<label>ជំនួយ៖</label> បញ្ជូលលេខកូដរួចចុច ប៊ូតុងខាងក្រោម តាមចំនួនដែលចង់បាន
					<div style="padding-top:10px;">- 
						<label>F9 = ចំនួន 5</label>&nbsp;&nbsp;&nbsp;&nbsp;
						<label>F10 = ចំនួន 10</label>&nbsp;&nbsp;&nbsp;&nbsp;
						<label>F11 = ចំនួន 20</label>&nbsp;&nbsp;&nbsp;&nbsp;
						<label>F12 = ចំនួន 50</label>&nbsp;&nbsp;&nbsp;&nbsp;
					</div>
					<div style="padding:10px 0;">
						- បញ្ជូលលេខកូដរួចចុច ប៊ូតុង <label>F8</label> គឺដើម្បីបញ្ចូលចំនួនតាមដែលយើងត្រូវការ<br/>
						- បញ្ជូលលេខកូដរួចចុច ប៊ូតុង <label>F7</label> គឺដើម្បីដកចំនួនទំនេញតាមដែលយើងត្រូវការ						
					</div>					
				</div>
				
				<div class="row">
					<div id="slideshow">
						<img class="img-responsive" src="{{ URL::asset('img/slide/1.jpg') }}" alt="1.jpg" class="active" />
						<img class="img-responsive" src="{{ URL::asset('img/slide/2.jpg') }}" alt="2.jpg" />
						<img class="img-responsive" src="{{ URL::asset('img/slide/3.jpg') }}" alt="3.jpg" />
						<img class="img-responsive" src="{{ URL::asset('img/slide/4.jpg') }}" alt="4.jpg" />
					</div>
				</div>
				<div class="row" style="background: #fff; padding:10px 10px; text-align: center; font-size: 34px; color: #FF6600; font-weight: bold;">
					<label>ហាងនំបុ័ង ភ្នំពេញ</label><br/>
					PHNOM PENH BAKERY
				</div>
				
			</div>
			
			<div class="col-md-8 content-right">
				<div class="row">
					<div
						style="background: #F5F5F5; height: 170px; width: 100%; border: 2px #fff solid;">
						<ul class="photo_product">
							
						</ul>
					</div>
				</div>
				
				 
				<div class="row">
					<div class="table-responsive">
					  <table class="table table-hover header-fixed table-striped">
						<thead>
					        <tr>
					            <th class="first-column">ឈ្មោះទំនិញ</th>
					            <th>ចំនួន</th>
					            <th>តំ.រាយ</th>
					            <th>បញ្ចុះតំលៃ</th>
					            <th>សរុប</th>
					            <th></th>
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
					    </tbody>
					  </table>
					</div>
				</div>
				<div class="row block-total" style="background: #DBEAF9; height: 200px; font-size: 16px; padding-top: 10px; width:67%;">
					<div class="col-md-6">
						<div class="user_info"><label>សារខា :   {{ Session::get('location_name') }} </label></div>
						<div class="user_info"><label>ឈ្មោះអ្នកប្រើប្រាស់ :  {{  Auth::user()->first_name." ".Auth::user()->last_name }} </label></div>
						<div class="user_info"><label>ថ្ងៃ-ខែ-ឆ្នាំ:  &nbsp;&nbsp;&nbsp;&nbsp; <span id="fullDate" style="color:blue;"></span> </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <label>ម៉ោង:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <label style="color:blue;" id="dateBox"></label></div>
						<div style="font-size: 30px; border: 1px solid #aaa; padding: 15px 10px 10px; text-align: center;"><label>អត្រាប្តូរប្រាក់ :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label style="color:blue;">1$ = {{ number_format(Session::get('exchangerate')->riel) }}R</label>{!! Form::hidden('exchange_rate_id', Session::get('exchangerate')->id, array('class'=>'exchange_rate_id')) !!}</div>
					</div>
					<div class="col-md-6 block-amount">
						<div class="row">
							<div class="col-md-6" style="font-size:22px;"><label>តំលៃសរុប : </label></div>
							<div class="col-md-6 amount" style="font-size:24px;"><label class="subtotal">0</label> <label>៛</label>{!! Form::hidden('subtotal', 0, array('class'=>'txt_subtotal')) !!}</div>
						</div>
						<!--<div class="row">
							<div class="col-md-6"><label>បញ្ចុះតំលៃ : </label></div>
							<div class="col-md-6  amount"><label class="discount">0</label> <label>៛</label>{!! Form::hidden('txt_total_discount', 0, array('class'=>'txt_total_discount')) !!}</div>
						</div>-->
						<div class="row" style="padding:20px 0 10px;">
							<div class="col-md-6" style="color:red; font-size:26px;"><label>តំលៃសរុបត្រូវបង់ (៛) : </label></div>
							<div class="col-md-6 amount-big"><label class="total_amount_riel">0</label> <label>៛</label>{!! Form::hidden('total_amount_riel', 0, array('class'=>'txt_total_amount_riel')) !!}</div>
						</div>
						<div class="row">
							<div class="col-md-6" style="color:red; font-size:26px;"><label>តំលៃសរុបត្រូវបង់ ($) : </label></div>
							<div class="col-md-6 amount-big"><label class="total_amount_us">0</label> <label>$</label>{!! Form::hidden('total_amount_us', 0, array('class'=>'txt_total_amount_us')) !!}</div>
						</div>
					</div>
				</div>
			</div>			
	
			<!-- Modal Payment -->
			<div id="myModalPayment" class="modal fade bs-example-modal-lg" role="dialog">
			  <div class="modal-dialog modal-md">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-body"><br/>
						<div class="row">
							<div class="col-md-5 align_right" style="color:red; font-size:20px;"><label>តំលៃសរុបត្រូវបង់ (៛) : </label></div>
							<div class="col-md-5 amount-big" style="padding-right:0;"><label class="popup_total_amount_riel"></label> <label>៛</label></div>
						</div>
						<div class="row">
							<div class="col-md-5 align_right" style="color:red; font-size:20px;"><label>តំលៃសរុបត្រូវបង់ ($) : </label></div>
							<div class="col-md-5 amount-big" style="padding-right:0;"><label class="popup_total_amount_us"></label> <label>$</label></div>
						</div>
						<div class="row" style="margin-top: 20px">
							<div style="margin-bottom: 50px">
								<div class="col-md-4 align_right" style="font-size:20px;"><label>បញ្ចុះតំលៃ (៛) : </label></div>
								<div class="col-md-5 amount-big"><input id="custom-discount-riel" type="text" class="form-control custom-discount-riel numberInput" name="custom-discount-riel" value="0" placeholder=""></div>
							</div>
						</div>
						<div class="row">
							<div style="margin-bottom: 70px">
								<div class="col-md-4 align_right" style="font-size:20px;"><label>បញ្ចុះតំលៃ ($) : </label></div>
								<div class="col-md-5 amount-big align_right"><input id="custom-discount-us" type="text" class="form-control custom-discount-us numberInput" name="custom-discount-us" value="0" placeholder=""></div>
							</div>
						</div>
						<div class="row">
							<div style="margin-bottom: 50px">
								<div class="col-md-4 align_right" style="font-size:20px;"><label>ប្រាក់ទទួល (៛) : </label></div>
								<div class="col-md-5 amount-big align_right"><input id="amount_riel" type="text" class="form-control custom-amount numberInput" name="amount_riel" value="0" placeholder=""></div>
							</div>
						</div>
						<div class="row">
							<div style="margin-bottom: 50px">
								<div class="col-md-4 align_right" style="font-size:20px;"><label>ប្រាក់ទទួល ($) : </label></div>
								<div class="col-md-5 amount-big align_right"><input id="amount_us" type="text" class="form-control custom-amount numberInput" name="amount_us" value="0" placeholder=""></div>
							</div>
						</div>
						<div class="row" style="margin-top: 20px">
							<div class="col-md-5 align_right" style="color:blue; font-size:26px;"><label>ប្រាក់អាប់ (៛) : </label></div>
							<div class="col-md-5 amount-big" style="color:blue;padding-right:0;"><label class="remain_total_amount_riel">0</label> <label>៛</label></div>
						</div>
						<div class="row">
							<div class="col-md-5 align_right" style="color:blue; font-size:26px;"><label>ប្រាក់អាប់ ($) : </label></div>
							<div class="col-md-5 amount-big" style="color:blue;padding-right:0;"><label class="remain_total_amount_us">0</label> <label>$</label></div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-print btn-primary" id="btn-paid" data-dismiss="modal">គិតលុយ</button>				
						<button type="button" class="btn btn-print btn-danger" id="cancel" data-dismiss="modal">ត្រឡប់ក្រោយ</button>
					</div>
				</div>

			  </div>
			</div>	
			<!-- Modal Payment -->		
			{!! Form::close() !!}
		</div>

		<div class="col-md-12 footer">
			<div class="footer_content">ហាងនំបុ័ងភ្នំពេញ © {!! date('Y') !!}</div>
		</div>
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
		
		function redirectPage(url){
			window.open(url);
		}
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
			
			$(".numberInput").keypress(function(event){	
				if((event.which != 8 && isNaN(String.fromCharCode(event.which))) && event.which != 46){
				   event.preventDefault(); //stop character from entering input
			   }else if(event.which == 46){
				   if($(this).val() == ""){
					  $(this).val(0); 
				   }
			   }
			});

			
			$("#code").val('');
			$("#code").focus();
			var rate = "{{ Session::get('exchangerate')->riel }}";
			var index = 1;
			var productItem = Array();
			var record = 0;
			var token = "{!! csrf_token() !!}";

			$(".txt_subtotal").val(0);
			$(".txt_total_discount").val(0);
			$(".txt_total_amount_riel").val(0);
			$(".txt_total_amount_us").val(0);
			
			/*$("#myModalPrint").on('shown.bs.modal', function(){
			});*/
			
			// when press enter button and amount paid < amount to be pay
			$("#myModalPayment").find("input").keyup(function(e){
				var key = e.keyCode || e.which;
				if(key === 13){
					var amount_riel = Number($("#amount_riel").val().replaceAll(",",""));
					var amount_us = Number($("#amount_us").val().replaceAll(",",""));
					var custom_discount_riel = Number($("#custom-discount-riel").val().replaceAll(",",""));
					var custom_discount_us = Number($("#custom-discount-us").val().replaceAll(",",""));
					var total_amount = $(".txt_total_amount_riel").val();
					var total_amount_tobe_paid = amount_riel+(amount_us*rate)+custom_discount_riel+(custom_discount_us*rate);
					
					if(total_amount <= total_amount_tobe_paid){
						if(record > 0){
							$.ajax({
								type : 'post',
								url : '{{ URL::asset("pos/sale") }}',
								data : $("#adminForm").serialize(),
								dataType : 'json',
								success : function(result){
									// return sales_order_id;								
									$("#myModalPayment").hide();
									$("#myModalPrint").load('pos/print/'+result+'/no', '', function(){
										//$("#myModalPrint").modal();
										//$(".modal-content").css("width","100%").css("padding","0").css("margin","0");
										$(".modal-content").css("width","75%");
										$(".table-body").css("width","89%");
										$(".modal-body").css("padding","0").css("margin","0");
										//$(".table-body").css("width","98%");
										w = window.open();
										w.document.write("<div style='width:400px; font-size: 12px;'>"+$("#myModalPrint").html()+"</div>");
										w.print(false);
										w.close();
										window.location.reload();
									});
								}
							});
						}
					}else{
						alert("លុយបង់មិនគ្រប់មិនអាចលក់បានទេ!");
					}
				}
			});
			
			
			// when click button Paid
			$("#btn-paid").click(function(){
				
				var amount_riel = Number($("#amount_riel").val().replaceAll(",",""));
				var amount_us = Number($("#amount_us").val().replaceAll(",",""));
				var custom_discount_riel = Number($("#custom-discount-riel").val().replaceAll(",",""));
				var custom_discount_us = Number($("#custom-discount-us").val().replaceAll(",",""));
				var total_amount = $(".txt_total_amount_riel").val();
				var total_amount_tobe_paid = amount_riel+(amount_us*rate)+custom_discount_riel+(custom_discount_us*rate);
				
				if(total_amount <= total_amount_tobe_paid){
					if(record > 0){
						$.ajax({
							type : 'post',
							url : '{{ URL::asset("pos/sale") }}',
							data : $("#adminForm").serialize(),
							dataType : 'json',
							success : function(result){
								// return sales_order_id;							
								$("#myModalPayment").hide();
								$("#myModalPrint").load('pos/print/'+result+'/no', '', function(){
									//$("#myModalPrint").modal();
									//$(".modal-content").css("width","100%").css("padding","0").css("margin","0");
									$(".modal-content").css("width","75%");
									$(".table-body").css("width","89%");
									$(".modal-body").css("padding","0").css("margin","0");
									//$(".table-body").css("width","98%");
									w = window.open();
									w.document.write("<div style='width:400px; font-size: 12px;'>"+$("#myModalPrint").html()+"</div>");
									w.print(false);
									w.close();
									window.location.reload();
								});
							}
						});
					}
				}else{
					alert("លុយបង់មិនគ្រប់មិនអាចលក់បានទេ!");
				}
			});
			
			
			// when click on button ត្រឡប់ក្រោយ in dialog payment
			$("#cancel").click(function(){
				$(".remain_total_amount_riel").text(0);
				$(".remain_total_amount_us").text(0);
				
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
			
			// click on button edit
			$(".btn_edit").click(function(){
				$(this).toggle();
				$(this).closest("tr").find(".btn_save").toggle();
				$(this).closest("tr").find("input").toggle();
				$(this).closest("tr").find("label").toggle();
			});
			
			// when click on increase button
			$(".btn_increase").click(function(){				
				var getObj = $(this).parents("tr");
				var newQty = Number(getObj.find(".txt_qty").val())+1;
				getObj.find(".txt_qty").val( newQty );
				
				var unit_price = Number(getObj.find(".txt_unit_price").val());
				var oldDiscount = Number(getObj.find(".lbl_discount").text().replaceAll(",","")) / Number(getObj.find(".lbl_qty").text());
				$(".txt_subtotal").val( Number($(".txt_subtotal").val()) - Number(getObj.find(".lbl_total_by_item").text().replaceAll(",","")) );
				
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
					var oldDiscount = Number(getObj.find(".lbl_discount").text().replaceAll(",","")) / Number(getObj.find(".lbl_qty").text());
					$(".txt_subtotal").val( Number($(".txt_subtotal").val()) - Number(getObj.find(".lbl_total_by_item").text().replaceAll(",","")) );
					
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
			
			// when qty is change
			$(".txt_qty").keyup(function(){		
				
				if(Number($(this).val()) > 0){
					var getObj = $(this).parents("tr");
					var newQty = Number(getObj.find(".txt_qty").val());
					var unit_price = Number(getObj.find(".txt_unit_price").val());
					var oldDiscount = Number(getObj.find(".lbl_discount").text().replaceAll(",","")) / Number(getObj.find(".lbl_qty").text());
					$(".txt_subtotal").val( Number($(".txt_subtotal").val()) - Number(getObj.find(".lbl_total_by_item").text().replaceAll(",","")) );
					
					getObj.find(".lbl_qty").text(getObj.find(".txt_qty").val());
					
					getObj.find(".lbl_discount").text(addCommas( oldDiscount * newQty ));
					getObj.find(".txt_discount").val(oldDiscount * newQty);
					var newDiscount = oldDiscount * newQty;
					
					var total_by_item = unit_price*newQty - newDiscount;				
					getObj.find(".lbl_total_by_item").text(addCommas(total_by_item));
					getObj.find(".txt_total_by_item").val(total_by_item);
					
					calculateTotalBlock(total_by_item);
					
				}
			});
			
			// when unit price is change
			$(".txt_unit_price").keyup(function(){	
				if(Number($(this).val()) > 0){
					var getObj = $(this).parents("tr");
					var newQty = Number(getObj.find(".txt_qty").val());
					var unit_price = Number(getObj.find(".txt_unit_price").val());
					var discount = Number(getObj.find(".lbl_discount").text().replaceAll(",","")) / Number(getObj.find(".lbl_qty").text());
					$(".txt_subtotal").val( Number($(".txt_subtotal").val()) - Number(getObj.find(".lbl_total_by_item").text().replaceAll(",","")) );
					
					var total_by_item = unit_price*newQty - discount;
					
					getObj.find(".lbl_unit_price").text(addCommas(unit_price));
					getObj.find(".txt_unit_price").val(unit_price);
					
					getObj.find(".lbl_total_by_item").text(addCommas(total_by_item));
					getObj.find(".txt_total_by_item").val(total_by_item);
					
					calculateTotalBlock(total_by_item);
				}
			});
			
			// when discount is change
			$(".txt_discount").keyup(function(){	
				if(Number($(this).val()) > 0){
					var getObj = $(this).parents("tr");
					var newQty = Number(getObj.find(".txt_qty").val());
					var unit_price = Number(getObj.find(".txt_unit_price").val());
					var discount = Number($(this).val());
					$(".txt_subtotal").val( Number($(".txt_subtotal").val()) - Number(getObj.find(".lbl_total_by_item").text().replaceAll(",","")) );
					
					var total_by_item = unit_price*newQty - discount;
					
					getObj.find(".lbl_unit_price").text(addCommas(unit_price));
					getObj.find(".txt_unit_price").val(unit_price);
					
					getObj.find(".lbl_total_by_item").text(addCommas(total_by_item));
					getObj.find(".txt_total_by_item").val(total_by_item);
					
					calculateTotalBlock(total_by_item);
				}
			});
			
			// Click Save Record
			$(".btn_save").click(function(){
				$(this).toggle();
				$(this).closest("tr").find(".btn_edit").toggle();
				var getObj = $(this).parents("tr");
				$(".txt_subtotal").val(Number($(".txt_subtotal").val()) - Number(getObj.find(".lbl_total_by_item").text().replaceAll(",","")));
								
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
			
			// Calculate total block
			function calculateTotalBlock(total_by_item){			
								
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
			}
			
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
				amount_us = Number($("#amount_us").val().replaceAll(",",""));
				amount_riel = Number($("#amount_riel").val().replaceAll(",",""));
				
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
				amount_us = Number($("#amount_us").val().replaceAll(",",""));
				amount_riel = Number($("#amount_riel").val().replaceAll(",",""));
				
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
				amount_us = Number($("#amount_us").val().replaceAll(",",""));
				amount_riel = Number($("#amount_riel").val().replaceAll(",",""));
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
				amount_us = Number($("#amount_us").val().replaceAll(",",""));
				amount_riel = Number($("#amount_riel").val().replaceAll(",",""));
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
					
					
					// Display product picture
					if(index > 10){
						$(".photo_product").find('li:eq('+(index-11)+')').hide();
					}
					if(index > 1){						
						$(".photo_product li:eq(0)").before('<li><img src="{{ URL::asset("img/product/") }}/'+picture+'" alt="" /><span class="product_name">'+result.name+'<span class="spacer"></span></li>');
					}else{
						$(".photo_product").append('<li><img src="{{ URL::asset("img/product/") }}/'+picture+'" alt="" /><span class="product_name">'+result.name+'<span class="spacer"></span></li>');
					}
					index++;
					
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
			
			
			
			setInterval( "slideSwitch()", 5000 );
		});
		
		String.prototype.replaceAll = function(search, replacement) {
			var target = this;
			return target.split(search).join(replacement);
		}
		
		//slideshow
		function slideSwitch() {
			var $active = $('#slideshow IMG.active');

			if ( $active.length == 0 ) $active = $('#slideshow IMG:last');

			var $next =  $active.next().length ? $active.next()
				: $('#slideshow IMG:first');

			$active.addClass('last-active');
				
			$next.css({opacity: 0.0})
				.addClass('active')
				.animate({opacity: 1.0}, 1000, function() {
					$active.removeClass('active last-active');
				});
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
</body>
</html>
