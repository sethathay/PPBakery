

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

			$("#dsetting").click(function(){
				$("#dsettinglist").toggle();
			});
                        $("#dreport").click(function(){
				$("#dreportlist").toggle();
			});

		});
	</script>
	<div class="col-lg-10 dashboard">
		<!-- check for flash notification message -->
        @if(Session::has('flash_notice'))
            <div id="flash_notice">{{ Session::get('flash_notice') }}</div>
        @endif
		<div class="row" style="width:99%; margin: 0 auto;">
                        <?php
                            $gUser = Session::get('group_id'); 
                            $menus = \App\Permission::join('modules','permissions.module_id','=','modules.id')
                                    ->wheregroup_id($gUser)
                                    ->whereparents(null)
                                    ->whereis_active(1)
                                    ->get();
                            foreach($menus as $menu){
                                if($menu->target == null){
                        ?>
                                    <div class="col-md-2 board" id="<?php echo $menu->menu_id ?>" onclick="redirectPage('{{URL::asset($menu->link == null ? "#" : $menu->link)}}')">
                                        <img src="{{URL::asset($menu->img_path)}}" />
                                        <br/>
                                        <?php echo $menu->name?>
                                    </div>
                        <?php 
                                }else{
                        ?>
                                    <div class="col-md-2 board" id="<?php echo $menu->menu_id ?>" 
                                         onclick="redirectPage('{{URL::asset($menu->link == null ? "#" : $menu->link)}}','<?php echo $menu->target ?>')">
                                        <img src="{{URL::asset($menu->img_path)}}" />
                                        <br/>
                                        <?php echo $menu->name?>
                                    </div>
                        <?php            
                                }
                            }
                        ?>
                        <!--
			<div class="col-md-2 board" onclick="redirectPage('pos','_blank')"><img src="{{ URL::asset('img/house_sale_b.png') }}" /><br/>ការលក់</div>
			<div class="col-md-2 board" onclick="redirectPage('products')"><img src="{{ URL::asset('img/product_b.png') }}" /><br/>មុខទំនិញ</div>
			<div class="col-md-2 board" onclick="redirectPage('exchangerates')"><img src="{{ URL::asset('img/emblem_money_b.png') }}" /><br/>អត្រា​ប្តូ​រ​ប្រាក់</div>
			<div class="col-md-2 board" onclick="redirectPage('discounts')"><img src="{{ URL::asset('img/discount_b.png') }}" /><br/>ការបញ្ចុះតំលៃ</div>
                        <div class="col-md-2 board" onclick="redirectPage('services/index')"><img src="{{ URL::asset('img/dollars_b.png') }}" /><br/>ការចំនាយ</div>
			<div class="col-md-2 board" onclick="redirectPage('saleOrders/index')"><img src="{{ URL::asset('img/receipt_b.png') }}" /><br/>លក់ដុំ</div>
			<div class="col-md-2 board" onclick="redirectPage('bookers/index')"><img src="{{ URL::asset('img/book_b.png') }}" /><br/>លក់កក់</div>
                        <div class="col-md-2 board" onclick="redirectPage('user_sale_logs/index'"><img src="{{ URL::asset('img/Salereport.png') }}" /><br/>បញ្ចូលប្រាក់សរុបពីការលក់</div>
			<div class="col-md-2 board" onclick="redirectPage('inventories/index')"><img src="{{ URL::asset('img/stock.png') }}" /><br/>ស្តុកទំនិញ</div>
			<div class="col-md-2 board" id="dreport"><img src="{{ URL::asset('img/report_b.png') }}" /><br/>របាយការណ៍</div>
			<div class="col-md-2 board" onclick="redirectPage('users/index'"><img src="{{ URL::asset('img/users_2_b.png') }}" /><br/>អ្នកប្រើប្រាស់</div>
                        <div class="col-md-2 board" id="dsetting"><img src="{{ URL::asset('img/settings_b.png') }}" /><br/>ការកំណត់របស់ប្រព័ន្ធ</div>
			<div class="col-md-2 board"><img src="{{ URL::asset('img/blue_external_drive_backup.png') }}" /><br/>រក្សាទុកទិន្នន័យរបស់ប្រព័ន្ធ</div>
                        -->
		</div>
	</div>
	<script type="text/javascript">
	
		function redirectPage(url,target="_self"){
			window.open(url,target);
		}

	</script>
@stop