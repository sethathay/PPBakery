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
			<div class="col-md-4 content-left">Left</div>
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
					  <table class="table table-hover">
						<thead>
					        <tr>
					            <th>Description</th>
					            <th>Qty</th>
					            <th>Price</th>
					            <th>Amount</th>
					            <th></th>
					        </tr>
					    </thead>
					    <tbody>
					        <tr>
					            <td>This is going to put our text right up on</td>
					            <td>Item 1</td>
					            <td>$1</td>
					            <td>$1</td>
					            <td>
					            	<button type="button" class="btn btn-xs btn-primary">
										<span class="glyphicon glyphicon-edit"></span> 
									</button>
									<button type="button" class="btn btn-xs btn-danger">
										<span class="glyphicon glyphicon-trash"></span> 
									</button>
								</td>
					        </tr>
					        <tr>
					            <td>This is going to put our text </td>
					            <td>Item 2</td>
					            <td>$2</td>
					            <td>$1</td>
					            <td>
					            	<button type="button" class="btn btn-xs btn-primary">
										<span class="glyphicon glyphicon-edit"></span> 
									</button>
									<button type="button" class="btn btn-xs btn-danger">
										<span class="glyphicon glyphicon-trash"></span> 
									</button>
								</td>
					        </tr>
					        <tr>
					            <td>This is going to put our text </td>
					            <td>Item 2</td>
					            <td>$2</td>
					            <td>$1</td>
					            <td>
					            	<button type="button" class="btn btn-xs btn-primary">
										<span class="glyphicon glyphicon-edit"></span> 
									</button>
									<button type="button" class="btn btn-xs btn-danger">
										<span class="glyphicon glyphicon-trash"></span> 
									</button>
								</td>
					        </tr>
					        <tr>
					            <td>This is going to put our text </td>
					            <td>Item 2</td>
					            <td>$2</td>
					            <td>$1</td>
					            <td>
					            	<button type="button" class="btn btn-xs btn-primary">
										<span class="glyphicon glyphicon-edit"></span> 
									</button>
									<button type="button" class="btn btn-xs btn-danger">
										<span class="glyphicon glyphicon-trash"></span> 
									</button>
								</td>
					        </tr>
					        <tr>
					            <td>This is going to put our text </td>
					            <td>Item 2</td>
					            <td>$2</td>
					            <td>$1</td>
					            <td>
					            	<button type="button" class="btn btn-xs btn-primary">
										<span class="glyphicon glyphicon-edit"></span> 
									</button>
									<button type="button" class="btn btn-xs btn-danger">
										<span class="glyphicon glyphicon-trash"></span> 
									</button>
								</td>
					        </tr>
					        <tr>
					            <td>This is going to put our text </td>
					            <td>Item 2</td>
					            <td>$2</td>
					            <td>$1</td>
					            <td>
					            	<button type="button" class="btn btn-xs btn-primary">
										<span class="glyphicon glyphicon-edit"></span> 
									</button>
									<button type="button" class="btn btn-xs btn-danger">
										<span class="glyphicon glyphicon-trash"></span> 
									</button>
								</td>
					        </tr>
					        <tr>
					            <td>This is going to put our text </td>
					            <td>Item 2</td>
					            <td>$2</td>
					            <td>$1</td>
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
			</div>
		</div>

		<div class="col-md-12 footer">
			<div class="footer_content">KHMER FOOD © {!! date('Y') !!}</div>
		</div>
	</div>
</body>
</html>
