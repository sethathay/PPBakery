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
			<li><a href="{{ URL::asset('/dashboard') }}"><img
				src="{{ URL::asset('img/control_panel.png') }}" alt="order" />
				&nbsp;&nbsp;<label style="vertical-align: middle; font-weight: normal;">Dashboard</label></a>
			</li>
			<li><a href="{{ URL::asset('/pos') }}" target="_blank" ><img
				src="{{ URL::asset('img/house_sale.png') }}" alt="order" />
				&nbsp;&nbsp;<label style="vertical-align: middle; font-weight: normal;">Sales</label></a></li>
			<li><a href="{{ URL::asset('products') }}"><img
				src="{{ URL::asset('img/product.png') }}" alt="Product" />
				&nbsp;&nbsp;<label
				style="vertical-align: middle; font-weight: normal;">Products</label></a>
			</li>
			<li><a href="{{ URL::asset('exchangerates') }}"><img
				src="{{ URL::asset('img/emblem_money.png') }}" alt="Currency" />
				&nbsp;&nbsp;<label
				style="vertical-align: middle; font-weight: normal;">Exchange Rate</label></a>
			</li>
			<li><a href="{{ URL::asset('#') }}"><img
				src="{{ URL::asset('img/discounts.png') }}" alt="Discount" />
				&nbsp;&nbsp;<label
				style="vertical-align: middle; font-weight: normal;">Discounts</label></a>
			</li>
			<li><a href="{{ URL::asset('services') }}"><img
				src="{{ URL::asset('img/dollars.png') }}" alt="Table" />
				&nbsp;&nbsp;<label
				style="vertical-align: middle; font-weight: normal;">Expenses</label></a>
			</li>
			<li><a href="{{ URL::asset('users/index') }}"><img
				src="{{ URL::asset('img/users_2.png') }}" alt="Users" />
				&nbsp;&nbsp;<label
				style="vertical-align: middle; font-weight: normal;">Users</label></li></a>
			<li><a href="{{ URL::asset('#') }}"><img
				src="{{ URL::asset('img/report.png') }}" alt="Report" />
				&nbsp;&nbsp;<label
				style="vertical-align: middle; font-weight: normal;">Report</label></a>
			</li>
			<li><a id="setting" href="#"><img
				src="{{ URL::asset('img/settings.png') }}" alt="Setting" />
				&nbsp;&nbsp;<label
				style="vertical-align: middle; font-weight: normal;">Settings</label></a>
			</li>
			<li id="settinglist" style="display:none;">
				<ol class="nav">
					<li class="inner_link">
						<a href="{{ URL::asset('locations') }}"><span class="glyphicon glyphicon-hand-right"></span>&nbsp;Shop Location</a>
					</li>
					<li class="inner_link">
						<a href="{{ URL::asset('customers') }}"><span class="glyphicon glyphicon-hand-right"></span>&nbsp;Customer</a>
					</li>
					<li class="inner_link">
						<a href="{{ URL::asset('sections/index') }}"><span class="glyphicon glyphicon-hand-right"></span>&nbsp;Group Expense</a>
					</li>
					<li class="inner_link">
						<a href="{{ URL::asset('pgroups') }}"><span class="glyphicon glyphicon-hand-right"></span>&nbsp;Product Group</a>
					</li>
					<li class="inner_link">
						<a href="{{ URL::asset('cgroups') }}"><span class="glyphicon glyphicon-hand-right"></span>&nbsp;Customer Group</a>
					</li>
					<li class="inner_link">
						<a href="{{ URL::asset('groups') }}"><span class="glyphicon glyphicon-hand-right"></span>&nbsp;User Group</a>
					</li>
					<li class="inner_link">
						<a href="{{ URL::asset('uoms') }}"><span class="glyphicon glyphicon-hand-right"></span>&nbsp;វង្វាស់ខ្នាត</a>
					</li>
					<li class="inner_link">
						<a href="{{ URL::asset('uomconversions') }}"><span class="glyphicon glyphicon-hand-right"></span>&nbsp;UOM Conversion</a>
					</li>
				</ol>
			</li>
			<li><a href="{{ URL::asset('#') }}"><img src="{{ URL::asset('img/blue_external_drive_backup.png') }}"
				alt="Backup" /> &nbsp;&nbsp;<label
				style="vertical-align: middle; font-weight: normal;">Database Backup</label></a>
			</li>
		</ul>
		<div class="col-md-3 user_info header_title">USER INFORMATION</div>
		<div class="col-md-3 user_info">
			<ul style="margin: 0;">
				<li>{!! "Username : <b>".Auth::user()->username."</b>" !!}
				</li>
				<li>{!! "Date : <b>".date("Y-m-d")."</b>" !!}
				</li>
				<li style="text-align: right; background: none; border: none;">
					<button onclick="redirectPage('{{ URL::asset('users/logout') }}');" class="btn btn-md btn-danger">
						<span class="glyphicon glyphicon-logout"></span> Logout
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
