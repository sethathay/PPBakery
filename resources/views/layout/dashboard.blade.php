

@extends('master')

@section('content')
	<style>
		.dashboard{
			text-align: center;
		}
		.board{
			height: 150px; 
            border: 1px solid #ccc;
			border-radius:4px;
			margin:20px;
			padding-top: 20px;
		}
		.board:hover{
			background: #A1BFFC;
			box-shadow: 5px 5px 2px #ccc;
            cursor: pointer;
		}
		.board img{
			width:60px;
			height:60px;
			margin-bottom: 5px;
		}
	</style>
	<script type="text/javascript">
		$(document).ready(function(){

			$("#dsettting").click(function(){
				$("#settinglist").toggle();
			});

		});
	</script>
	<div class="col-lg-10 dashboard">
		<!-- check for flash notification message -->
        @if(Session::has('flash_notice'))
            <div id="flash_notice">{{ Session::get('flash_notice') }}</div>
        @endif
		<div class="row" style="width:99%; margin: 0 auto;">
			<div class="col-md-2 board" onclick="redirectPage('pos','_blank')"><img src="{{ URL::asset('img/house_sale_b.png') }}" /><br/>ការលក់</div>
			<div class="col-md-2 board" onclick="redirectPage('products')"><img src="{{ URL::asset('img/product_b.png') }}" /><br/>មុខទំនិញ</div>
			<div class="col-md-2 board" onclick="redirectPage('services')"><img src="{{ URL::asset('img/dollars_b.png') }}" /><br/>ការចំនាយ</div>
			<div class="col-md-2 board" onclick="redirectPage('exchangerates')"><img src="{{ URL::asset('img/emblem_money_b.png') }}" /><br/>អត្រា​ប្តូ​រ​ប្រាក់</div>
			<div class="col-md-2 board" onclick="redirectPage('#')"><img src="{{ URL::asset('img/discount_b.png') }}" /><br/>ការបញ្ចុះតំលៃ</div>
			<div class="col-md-2 board" onclick="redirectPage('saleOrders/index')"><img src="{{ URL::asset('img/receipt_b.png') }}" /><br/>វិក័យប័ត្រ</div>
			<div class="col-md-2 board" onclick="redirectPage('#')"><img src="{{ URL::asset('img/report_b.png') }}" /><br/>របាយការណ៍</div>
			<div class="col-md-2 board" onclick="redirectPage('{{ URL::asset('users/index') }}')"><img src="{{ URL::asset('img/users_2_b.png') }}" /><br/>អ្នកប្រើប្រាស់</div>
			<div class="col-md-2 board" onclick="redirectPage('{{ URL::asset('bookers/index') }}')"><img src="{{ URL::asset('img/book_b.png') }}" /><br/>លក់កក់</div>
			<div class="col-md-2 board" onclick="redirectPage('#')"><img src="{{ URL::asset('img/blue_external_drive_backup.png') }}" /><br/>រក្សាទុកទិន្នន័យរបស់ប្រព័ន្ធ</div>
		</div>
	</div>
	<script type="text/javascript">
	
		function redirectPage(url,target="_self"){
			window.open(url,target);
		}

	</script>
@stop