<!DOCTYPE html>
<html>
<head>
<title>Laravel</title>
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ URL::asset('js/jquery-1.11.3.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.validator.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
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
	width: 50px;
	height: 50px;
	margin: 10px 0 0 13px;
	vertical-align: middle;
}

.header .big_name {
	font-family: Arial;
	font-weight: bold;
	font-size: 16pt;
	margin: 18px 0 0 5px;
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
	padding: 41px 0px 43px;
	border: 1px #F84D36 solid; 
	border-radius: 5px;
	position: relative;
}
.product_name { 
   position: absolute; 
   top: 60px; 
   left: 0; 
   width: 100%; 
   background: rgba(0,0,255,0.4);
   color: #fff;
   text-align: center;
   padding: 10px 0;   
   border-bottom-right-radius:5px;
   border-bottom-left-radius:5px;
   
}
.photo_product li:hover{
	border: 1px #3E5C9A solid; 
	box-shadow: 3px 3px 2px #ccc;
	opacity: 0.5;
}
.photo_product li img{
	width: 100px; 
	height: 100px; 
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
    height: 330px;
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
    width: 15%;
    float: left;
    text-align: right;
}
.header-fixed > thead > tr > th {
    text-align: center !important;
}
.first-column{
    width: 40% !important;
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
	font-size: 26px;
	color: red;
}
.amount, .amount-big{
	text-align: right;
}

.form-group {
	margin: 10px 5px;
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
</style>
</head>
<body>
	<div class="cover-container">
		<div class="col-md-12 header">
			<div class="row">
				<div class="col-md-1 header_logo">
					<img class="logo" src="{{ URL::asset('img/hamburger.png') }}"
						alt="hamburger.png" />
				</div>
				<div class="col-md-2 header_name">
					<label class="big_name">Khmer Food &nbsp;&nbsp;&nbsp;</label><label
						class="small_name">&nbsp;Restaurant</label>
				</div>
				<div class="col-md-9 header_info">
					<div>
						<span class="glyphicon glyphicon-map-marker"></span>&nbsp;&nbsp;&nbsp;<label>ដីឡូតិ៍៣A
							ផ្លូវលេខ១៦៩, សង្កាត់វាលវង់, រាជធានីភ្នំពេញ, ព្រះរាជាណាចក្រកម្ពុជា</label>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
							class="glyphicon glyphicon-phone-alt"></span>&nbsp;&nbsp;&nbsp;<label>(855)
							89 918 188</label>
					</div>
				</div>

			</div>
		</div>

		<div class="col-md-12 content">
			
			<div class="col-md-4 content-left">
				<div><input id="code" type="text" class="form-control" name="code" value="" placeholder="លេខកូដ"></div>
				
				<div style="padding-top:20px;">
					<label>ជំនួយ៖</label> បញ្ជូលលេខកូដរួចចុច ប៊ូតុងខាងក្រោម តាមចំនួនដែលចង់បាន
					<div style="padding-top:10px;">
						<label>F9 = ចំនួន 5</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<label>F10 = ចំនួន 10</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<label>F11 = ចំនួន 20</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<label>F12 = ចំនួន 50</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</div>
				</div>
				
				<div class="row">
					<img src="{{ URL::asset('img/bread.png') }}" alt="" />
				</div>
				<div class="row" style="background: #fff; padding:10px 10px; text-align: center; font-size: 34px; color: #FF6600; font-weight: bold;">
					PHNOM PENH BAKERY
				</div>
				
			</div>
			
			<div class="col-md-8 content-right">
				<div class="row">
					<div
						style="background: #F5F5F5; height: 120px; width: 100%; border: 2px #fff solid;">
						<ul class="photo_product">
							<li><img src="{{ URL::asset('img/product/1.jpg') }}" alt="" /><span class="product_name">Viggie Chili<span class='spacer'></span></li>
							<li><img src="{{ URL::asset('img/product/2.jpg') }}" alt="" /><span class="product_name">Viggie Chili<span class='spacer'></span></li>
							<li><img src="{{ URL::asset('img/product/3.jpg') }}" alt="" /><span class="product_name">Viggie Chili<span class='spacer'></span></li>
							<li><img src="{{ URL::asset('img/product/4.jpg') }}" alt="" /><span class="product_name">Viggie Chili<span class='spacer'></span></li>
							<li><img src="{{ URL::asset('img/product/5.jpg') }}" alt="" /><span class="product_name">Viggie Chili<span class='spacer'></span></li>
							<li><img src="{{ URL::asset('img/product/6.jpg') }}" alt="" /><span class="product_name">Viggie Chili<span class='spacer'></span></li>
							<li><img src="{{ URL::asset('img/product/7.jpg') }}" alt="" /><span class="product_name">Viggie Chili<span class='spacer'></span></li>
							<li><img src="{{ URL::asset('img/product/8.jpg') }}" alt="" /><span class="product_name">Viggie Chili<span class='spacer'></span></li>
						</ul>
					</div>
				</div>
				
				<div class="row">
					<div class="table-responsive">
					  <table class="table table-hover header-fixed">
						<thead>
					        <tr>
					            <th class="first-column">ឈ្មោះទំនិញ</th>
					            <th>ចំនួន</th>
					            <th>តំ.រាយ</th>
					            <th>សរុប</th>
					            <th></th>
					        </tr>
					    </thead>
					    <tbody>
					    	<tr style="display: none;">
					            <td class="first-column"></td>
					            <td class="qty-column"></td>
					            <td></td>
					            <td></td>
					            <td>
					            	<button type="button" class="btn btn-xs btn-primary">
										<span class="glyphicon glyphicon-edit"></span> 
									</button>
									<button type="button" class="btn btn-xs btn-danger">
										<span class="glyphicon glyphicon-trash"></span> 
									</button>
								</td>
					    	</tr>
					    </tbody>
					  </table>
					</div>
				</div>
				
				<div class="row" style="background: #DBEAF9; height: 160px; font-size: 16px; padding-top: 10px;">
					<div class="col-md-6">
						<div><label>ម៉ោង: {{ date('H:i') }}</label></div>
						<div><label>សារខា : A1</label></div>
						<div><label>ឈ្មោះអ្នកប្រើប្រាស់ : Administrator</label></div>
						<div style="font-size: 20px; border: 1px solid #aaa; padding: 10px; text-align: center;"><label>អត្រាប្តូរប្រាក់ :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label style="color:red;">1$ = 4000R</label></div>
					</div>
					<div class="col-md-6 block-amount">
						<div class="row">
							<div class="col-md-6"><label>តំលៃសរុប : </label></div>
							<div class="col-md-6 amount"><label class="subtotal">125,000R</label></div>
						</div>
						<div class="row">
							<div class="col-md-6"><label>បញ្ចុះតំលៃ : </label></div>
							<div class="col-md-6  amount"><label class="discount">5,000R</label></div>
						</div>
						<div class="row">
							<div class="col-md-6"><label>តំលៃសរុបត្រូវបង់ (R) : </label></div>
							<div class="col-md-6  amount-big"><label class="discount">120,000R</label></div>
						</div>
						<div class="row">
							<div class="col-md-6"><label>តំលៃសរុបត្រូវបង់ ($) : </label></div>
							<div class="col-md-6  amount-big"><label class="discount">120,000R</label></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-12 footer">
			<div class="footer_content">KHMER FOOD © {!! date('Y') !!}</div>
		</div>
	</div>
	
	
  		<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="">Open Modal</button>
	<!-- Modal -->
	  <div class="modal fade" id="myModal" role="dialog">
	    <div class="modal-dialog">
	    
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-body">
				<input id="qty_pro" type="text" class="form-control" name="qty_pro" value="" placeholder="ចំនួន">
	        </div>
	      </div>
	      
	    </div>
	  </div>
	<!-- End Modal -->
	<script type="text/javascript">
		$(document).ready(function(){
		    		    
			$("#code").focus();
			var rate = 4000;
			
			$("#code").bind('keypress', function(e) {
				var code = e.keyCode || e.which;
				var token = "{!! csrf_token() !!}";

				// F9	
				if(code == 119){
					//cloneRecord(5);
					var codeNumber = $("#code").val();
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
						success : function(result){
							if(jQuery.isEmptyObject(result)){
								alert("លេខកូដមិនត្រឹមត្រូវទេ!!");
								$("#code").val("");
							 	$("#code").focus();
							}else{
								cloneRecord(qty,result);
							}
						}
					});
					
				}else{
					alert('បង់ប្រាក់');
				}
			}
			// clone record
			function cloneRecord(qty, result){
				//Enter keycode
				$(".header-fixed tbody").find('tr:last').clone(true).appendTo(".header-fixed tbody");
			 	$(".header-fixed tbody").find("tr:last").css("display", "");
			 	$(".header-fixed tbody").find("tr:last").find("td:first").text(result.name);
			 	$(".header-fixed tbody").find("tr:last").find("td:eq(1)").text(qty);
			 	$(".header-fixed tbody").find("tr:last").find("td:eq(2)").text(addCommas( Number(result.price) * rate ));
			 	$(".header-fixed tbody").find("tr:last").find("td:eq(3)").text(addCommas( Number(result.price) * Number(qty) * Number(rate) ));
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
			
		});
		
	</script>
</body>
</html>
