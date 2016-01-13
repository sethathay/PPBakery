<div class="navbar col-md-2 left_menu">
	<div class="navbar-inner">
		<ul class="nav">
			<li onclick="redirectPage('{{ URL::asset('/dashboard') }}')"><img
				src="{{ URL::asset('img/control_panel.png') }}" alt="order" />
				&nbsp;&nbsp;<label
				style="vertical-align: middle; font-weight: normal;">Control Panel</label>
			</li>
			<li><a href="{{ URL::asset('/pos') }}" target="_blank" ><img
				src="{{ URL::asset('img/house_sale.png') }}" alt="order" />
				&nbsp;&nbsp;<label style="vertical-align: middle; font-weight: normal;">Sales</label></a></li>
			<li><a href="{{ URL::asset('products/index') }}"><img
				src="{{ URL::asset('img/product.png') }}" alt="Product" />
				&nbsp;&nbsp;<label
				style="vertical-align: middle; font-weight: normal;">Products</label></a>
			</li>
			<li onclick="redirectPage('/tables/index')"><img
				src="{{ URL::asset('img/furoisu_bath_chair.png') }}" alt="Table" />
				&nbsp;&nbsp;<label
				style="vertical-align: middle; font-weight: normal;">Tables</label>
			</li>
			<li onclick="redirectPage('/currencies/index')"><img
				src="{{ URL::asset('img/emblem_money.png') }}" alt="Currency" />
				&nbsp;&nbsp;<label
				style="vertical-align: middle; font-weight: normal;">Currencies</label>
			</li>
			<li onclick="redirectPage('/discounts/index')"><img
				src="{{ URL::asset('img/discounts.png') }}" alt="Discount" />
				&nbsp;&nbsp;<label
				style="vertical-align: middle; font-weight: normal;">Discounts</label>
			</li>
			<li onclick="redirectPage('{{ URL::asset('/users/index') }}')"><img
				src="{{ URL::asset('img/users_2.png') }}" alt="Users" />
				&nbsp;&nbsp;<label
				style="vertical-align: middle; font-weight: normal;">Users</label></li>
			<li onclick="redirectPage('/reports/indexs')"><img
				src="{{ URL::asset('img/report.png') }}" alt="Report" />
				&nbsp;&nbsp;<label
				style="vertical-align: middle; font-weight: normal;">Report</label>
			</li>
			<li onclick="redirectPage('/settings/indexs')"><img
				src="{{ URL::asset('img/settings.png') }}" alt="Setting" />
				&nbsp;&nbsp;<label
				style="vertical-align: middle; font-weight: normal;">Settings</label>
			</li>
			<li><img src="{{ URL::asset('img/blue_external_drive_backup.png') }}"
				alt="Backup" /> &nbsp;&nbsp;<label
				style="vertical-align: middle; font-weight: normal;">Database Backup</label>
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
