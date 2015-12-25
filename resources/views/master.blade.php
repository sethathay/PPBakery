<!DOCTYPE html>
<html>
<head>
<title>Laravel</title>
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ URL::asset('js/jquery-1.11.3.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<link href="{{ URL::asset('js/posabsolute-jQuery-Validation-Engine-25e4691/css/validationEngine.jquery.css') }}" rel="stylesheet">
<link href="{{ URL::asset('js/posabsolute-jQuery-Validation-Engine-25e4691/css/template.css') }}" rel="stylesheet">

<script src="{{ URL::asset('js/posabsolute-jQuery-Validation-Engine-25e4691/js/jquery.1.4.4.min.js') }}" type="text/javascript"></script>
<script type="text/javascript"
	src="{{ URL::asset('js/posabsolute-jQuery-Validation-Engine-25e4691/js/jquery.validationEngine-kh.js') }}"></script>
<script type="text/javascript"
	src="{{ URL::asset('js/posabsolute-jQuery-Validation-Engine-25e4691/js/jquery.validationEngine.js') }}"></script>
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

/* Left column */
.left_menu {
	background: #CBE2FE;
	margin: 3px 0 0 2px;
	padding: 0;
}

.left_menu ul {
	list-style: none;
	text-align: left;
	margin: 5px;
	padding: 0;
}

.left_menu ul li {
	width: 98%;
	margin: 0 auto 1px;
	padding: 6px 5px;
	background: #EBF4FE;
	border: 1px solid #ccc;
	color: #333;
}

.left_menu li:hover {
	background: #A1BFFC;
	border: 1px solid #B9BBBF;
	cursor: pointer;
}

.left_menu li label:hover {
	cursor: pointer;
}

.left_menu img {
	width: 32px;
	height: 32px;
	margin-left: 10px;
}

.user_info {
	margin: 10px 0 0;
	background: #A1BFFC;
	width: 100%;
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
					<img class="logo" src="{{ URL::asset('img/hamburger.png') }}" alt="hamburger.png" />
				</div>
				<div class="col-md-2 header_name">
					<label class="big_name">Khmer Food &nbsp;&nbsp;&nbsp;</label><label
						class="small_name">&nbsp;Restaurant</label>
				</div>
			</div>
		</div>

		<div class="col-md-12 content">
			@include('layout/menu')
			@yield('content')
		</div>
		
		<div class="col-md-12 footer">
			<div class="footer_content">KHMER FOOD © {!! date('Y') !!}</div>
		</div>
	</div>
	</div>
</body>
</html>
