<div class="navbar col-md-2 left_menu">
    <div class="navbar-inner">
        <ul class="nav">
			<li onclick="redirectPage('/')"><img src="{{ URL::asset('img/control_panel.png') }}" alt="order" /> &nbsp;&nbsp;<label style="vertical-align: middle;font-weight: normal;">Control Panel</label></li>
			<li onclick="redirectPage('{{ URL::asset('users/index') }}')"><img src="{{ URL::asset('img/house_sale.png') }}" alt="order" /> &nbsp;&nbsp;<label style="vertical-align: middle;font-weight: normal;">Sales</label></li>
			<li onclick="redirectPage('/products/index')"><img src="{{ URL::asset('img/product.png') }}" alt="Product" /> &nbsp;&nbsp;<label style="vertical-align: middle;font-weight: normal;">Products</label></li>
			<li onclick="redirectPage('/tables/index')"><img src="{{ URL::asset('img/furoisu_bath_chair.png') }}" alt="Table" /> &nbsp;&nbsp;<label style="vertical-align: middle;font-weight: normal;">Tables</label></li>
			<li onclick="redirectPage('/currencies/index')"><img src="{{ URL::asset('img/emblem_money.png') }}" alt="Currency" /> &nbsp;&nbsp;<label style="vertical-align: middle;font-weight: normal;">Currencies</label></li>
			<li onclick="redirectPage('/discounts/index')"><img src="{{ URL::asset('img/discounts.png') }}" alt="Discount" /> &nbsp;&nbsp;<label style="vertical-align: middle;font-weight: normal;">Discounts</label></li>
			<li onclick="redirectPage('{{ URL::asset('/users/index') }}')"><img src="{{ URL::asset('img/users_2.png') }}" alt="Users" /> &nbsp;&nbsp;<label style="vertical-align: middle;font-weight: normal;">Users</label></li>
			<li onclick="redirectPage('/reports/indexs')"><img src="{{ URL::asset('img/report.png') }}" alt="Report" /> &nbsp;&nbsp;<label style="vertical-align: middle;font-weight: normal;">Report</label></li>
			<li onclick="redirectPage('/settings/indexs')"><img src="{{ URL::asset('img/settings.png') }}" alt="Setting" /> &nbsp;&nbsp;<label style="vertical-align: middle;font-weight: normal;">Settings</label></li>
			<li><img src="{{ URL::asset('img/blue_external_drive_backup.png') }}" alt="Backup" /> &nbsp;&nbsp;<label style="vertical-align: middle;font-weight: normal;">Database Backup</label></li>
		</ul>
		
		<div class="col-md-3 user_info">
			<h5>USER INFORMATION</h5>
		</div>
    </div>
</div>
<script type="text/javascript">

	function redirectPage(url){
		window.location = url;
	}

</script>