<!DOCTYPE html>
<html>
<head>
<title>Laravel</title>
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
<script type="text/javascript"
	src="{{ URL::asset('js/jquery-1.11.3.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.validator.js') }}"></script>
<script type="text/javascript"
	src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<link href="{{ URL::asset('css/bootstrap-3.3.2.css') }}"
	rel="stylesheet">

<!-- DatePicker -->
<link
	href="{{ URL::asset('bootstrap_datepicker/css/bootstrap-datepicker3.css') }}"
	rel="stylesheet">
<script type="text/javascript"
	src="{{ URL::asset('bootstrap_datepicker/js/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript"
	src="{{ URL::asset('bootstrap_datepicker/locales/bootstrap-datepicker.en-GB.min.js') }}"></script>
<script type="text/javascript"
	src="{{ URL::asset('bootstrap_datepicker/locales/bootstrap-datepicker.kh.min.js') }}"></script>
<!-- End DatePicker -->

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
	src: url('{{URL::asset(' bootstrap-3.3.2/ fonts/
		glyphicons-halflings-regular.eot ')}}');
	src: url('{{URL::asset(' bootstrap-3.3.2/ fonts/
		glyphicons-halflings-regular.eot ? #iefix ')}}')
		format('embedded-opentype'),
		url('{{URL::asset(' bootstrap-3.3.2/ fonts/
		glyphicons-halflings-regular.woff ')}}') format('woff'),
		url('{{URL::asset(' bootstrap-3.3.2/ fonts/
		glyphicons-halflings-regular.ttf ')}}') format('truetype'),
		url('{{URL::asset(' bootstrap-3.3.2/ fonts/
		glyphicons-halflings-regular.svg #glyphicons-halflingsregular ')}}')
		format('svg');
}

.header_info {
	text-align: right;
	margin: 25px 0 0;
}

.header_info div {
	margin: 0 0 5px;
	font-size: 12px;
}

.form-group {
	margin: 10px 5px;
}

.row-form {
	margin: 10px 0;
	text-align: right;
}

.footer {
	background-color: #3E5C9A;
	height: 30px;
	color: #fff;
	position: fixed;
	bottom: 0;
	text-align: center;
}

.footer_content {
	padding-top: 5px;
}

.photo_product {
	margin: 0;
	padding: 0;
}

.photo_product li {
	margin: 8px 5px 0px 10px;
	list-style: none;
	display: inline-block;
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
							<li style="width: 100px; height: 100px;"><img
								src="{{ URL::asset('img/product/1.jpg') }}"
								style="width: 100px; height: 100px; border: 1px #353F48 solid; border-radius: 5px;"
								alt="" /></li>
							<li style="width: 100px; height: 100px;"><img
								src="{{ URL::asset('img/product/2.jpg') }}"
								style="width: 100px; height: 100px; border: 1px #353F48 solid; border-radius: 5px;"
								alt="" /></li>
							<li style="width: 100px; height: 100px;"><img
								src="{{ URL::asset('img/product/3.jpg') }}"
								style="width: 100px; height: 100px; border: 1px #353F48 solid; border-radius: 5px;"
								alt="" /></li>
							<li style="width: 100px; height: 100px;"><img
								src="{{ URL::asset('img/product/4.jpg') }}"
								style="width: 100px; height: 100px; border: 1px #353F48 solid; border-radius: 5px;"
								alt="" /></li>
							<li style="width: 100px; height: 100px;"><img
								src="{{ URL::asset('img/product/5.jpg') }}"
								style="width: 100px; height: 100px; border: 1px #353F48 solid; border-radius: 5px;"
								alt="" /></li>
							<li style="width: 100px; height: 100px;"><img
								src="{{ URL::asset('img/product/6.jpg') }}"
								style="width: 100px; height: 100px; border: 1px #353F48 solid; border-radius: 5px;"
								alt="" /></li>
							<li style="width: 100px; height: 100px;"><img
								src="{{ URL::asset('img/product/7.jpg') }}"
								style="width: 100px; height: 100px; border: 1px #353F48 solid; border-radius: 5px;"
								alt="" /></li>
							<li style="width: 100px; height: 100px;"><img
								src="{{ URL::asset('img/product/8.jpg') }}"
								style="width: 100px; height: 100px; border: 1px #353F48 solid; border-radius: 5px;"
								alt="" /></li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="table-responsive">
						<table class="table">
							
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-12 footer">
			<div class="footer_content">KHMER FOOD Â© {!! date('Y') !!}</div>
		</div>
	</div>
</body>
</html>
