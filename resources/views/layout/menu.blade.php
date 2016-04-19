<script type="text/javascript">
		$(document).ready(function(){

			$("#setting").click(function(){
				$("#settinglist").toggle();
			});

		});
</script>

<style type="text/css">
	.inner_link{
		border: none !important;
		padding: 5px 45px 5px;
	}	
</style>
<div class="navbar col-md-2 left_menu">
	<div class="navbar-inner">
		<ul class="nav">
		
			@if ( Session::get('group_id') == 1)
			<li><a href="{{ URL::asset('/dashboard') }}"><img
				src="{{ URL::asset('img/control_panel.png') }}" alt="order" />
				&nbsp;&nbsp;<label style="vertical-align: middle; font-weight: normal;">ទំព័រមុខ</label></a>
			</li>
			@endif
			<li><a href="{{ URL::asset('/pos') }}" target="_blank" ><img
				src="{{ URL::asset('img/house_sale.png') }}" alt="order" />
				&nbsp;&nbsp;<label style="vertical-align: middle; font-weight: normal;">ការលក់</label></a>
			</li>
			@if ( Session::get('group_id') == 1)
			<li><a href="{{ URL::asset('products') }}"><img
				src="{{ URL::asset('img/product.png') }}" alt="Product" />
				&nbsp;&nbsp;<label
				style="vertical-align: middle; font-weight: normal;">មុខទំនិញ</label></a>
			</li>
			<li><a href="{{ URL::asset('exchangerates') }}"><img
				src="{{ URL::asset('img/emblem_money.png') }}" alt="Currency" />
				&nbsp;&nbsp;<label
				style="vertical-align: middle; font-weight: normal;">អត្រា​ប្តូ​រ​ប្រាក់</label></a>
			</li>
			<li><a href="{{ URL::asset('discounts') }}"><img
				src="{{ URL::asset('img/discounts.png') }}" alt="Discount" />
				&nbsp;&nbsp;<label
				style="vertical-align: middle; font-weight: normal;">ការបញ្ចុះតំលៃ</label></a>
			</li>
			<li><a href="{{ URL::asset('services') }}"><img
				src="{{ URL::asset('img/dollars.png') }}" alt="Table" />
				&nbsp;&nbsp;<label
				style="vertical-align: middle; font-weight: normal;">ការចំនាយ</label></a>
			</li>
			@endif
			<li><a href="{{ URL::asset('saleOrders/index') }}"><img
				src="{{ URL::asset('img/receipt.png') }}" alt="Receipt" />
				&nbsp;&nbsp;<label
				style="vertical-align: middle; font-weight: normal;">លក់ដុំ</label></a>
			</li>
			<li><a href="{{ URL::asset('bookers/index') }}"><img
				src="{{ URL::asset('img/books.png') }}" alt="Booking" />
				&nbsp;&nbsp;<label
				style="vertical-align: middle; font-weight: normal;">លក់កក់</label></a>
			</li>
			@if ( Session::get('group_id') == 1)
			<li><a href="{{ URL::asset('#') }}"><img
				src="{{ URL::asset('img/report.png') }}" alt="Report" />
				&nbsp;&nbsp;<label
				style="vertical-align: middle; font-weight: normal;">របាយការណ៍</label></a>
			</li>
			<li><a href="{{ URL::asset('users/index') }}"><img
				src="{{ URL::asset('img/users_2.png') }}" alt="Users" />
				&nbsp;&nbsp;<label
				style="vertical-align: middle; font-weight: normal;">អ្នកប្រើប្រាស់</label></a>
			</li>
			<li><a id="setting" href="#"><img
				src="{{ URL::asset('img/settings.png') }}" alt="Setting" />
				&nbsp;&nbsp;<label
				style="vertical-align: middle; font-weight: normal;">ការកំណត់របស់ប្រព័ន្ធ</label></a>
			</li>
			<li id="settinglist" style="display:none;">
				<ol class="nav">
					<li class="inner_link">
						<a href="{{ URL::asset('locations') }}"><span class="glyphicon glyphicon-hand-right"></span>&nbsp;ទីតាំងហាង</a>
					</li>
					<li class="inner_link">
						<a href="{{ URL::asset('customers') }}"><span class="glyphicon glyphicon-hand-right"></span>&nbsp;អតិថិជន</a>
					</li>
					<li class="inner_link">
						<a href="{{ URL::asset('sections/index') }}"><span class="glyphicon glyphicon-hand-right"></span>&nbsp;ក្រុមចំនាយ</a>
					</li>
					<li class="inner_link">
						<a href="{{ URL::asset('pgroups') }}"><span class="glyphicon glyphicon-hand-right"></span>&nbsp;ក្រុមទំនិញ</a>
					</li>
					<li class="inner_link">
						<a href="{{ URL::asset('cgroups') }}"><span class="glyphicon glyphicon-hand-right"></span>&nbsp;ក្រុមអតិថិជន</a>
					</li>
					<li class="inner_link">
						<a href="{{ URL::asset('groups') }}"><span class="glyphicon glyphicon-hand-right"></span>&nbsp;ក្រុមអ្នកប្រើប្រាស់</a>
					</li>
					<li class="inner_link">
						<a href="{{ URL::asset('uoms') }}"><span class="glyphicon glyphicon-hand-right"></span>&nbsp;វង្វាស់ខ្នាត</a>
					</li>
					<li class="inner_link">
						<a href="{{ URL::asset('uomconversions') }}"><span class="glyphicon glyphicon-hand-right"></span>&nbsp;ការប្តូរវង្វាស់ខ្នាត</a>
					</li>
				</ol>
			</li>
			<li><a href="{{ URL::asset('#') }}"><img src="{{ URL::asset('img/blue_external_drive_backup.png') }}"
				alt="Backup" /> &nbsp;&nbsp;<label
				style="vertical-align: middle; font-weight: normal;">រក្សាទុកទិន្នន័យរបស់ប្រព័ន្ធ</label></a>
			</li>
			@endif
		</ul>
		<div class="col-md-3 user_info header_title">ពត៍មានរបស់អ្នកប្រើប្រាស់</div>
		<div class="col-md-3 user_info">
			<ul style="margin: 0;">
				<li>{!! "ឈ្មោះ  <b>".Auth::user()->first_name . " " . Auth::user()->last_name ."</b>" !!}
				</li>
				<li>{!! "ថ្ងៃទី : <b>".date("Y-m-d")."</b>" !!}
				</li>
				<li style="text-align: right; background: none; border: none;">
					<button onclick="redirectPage('{{ URL::asset('users/logout') }}');" class="btn btn-md btn-danger">
						<span class="glyphicon glyphicon-logout"></span> ចាកចេញពីប្រព័ន្ធ
					</button>
				</li>
			</ul>
		</div>
	</div>
</div>
<script type="text/javascript">

	function redirectPage(url){
		window.location = url;
	}

</script>
