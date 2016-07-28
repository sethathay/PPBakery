@extends('master') 

@section('content')
<style>
.table-list {
	width: 82%;
	margin: 3px auto 0;
}

.table thead {
	background: #3E5C9A;
	color: #fff;
}

.table thead th {
	text-align: center;
}

.table-responsive{
	overflow: hidden;
	min-height: .01%;
}

.last_td {
	text-align: center;
}

.panel-heading {
	background: #ebf4fe;
	padding: 0 0 0 10px;
	margin: 5px 0 10px;
	border: 1px solid #ccc;
}

.panel-heading img {
	width: 60px;
	height: 60px;
	vertical-align: middle;
}

.panel-heading label {
	padding: 20px;
	font-size: 24px;
	font-weight: bold;
}
</style>
<div class="table-responsive table-list">
	<div class="col-sm-12 panel-heading">
		<div class="col-sm-7">
			<img src="{{ URL::asset('/img/saleReport.png') }}" /> <label>បញ្ចីរប្រាក់សរុបពីការលក់</label>
		</div>
		<div class="col-sm-5"
			style="text-align: right; padding: 23px 10px 0 0; vertical-align: middle;">
			<!--<button onclick="redirectPage('user_sale_logs/create')" type="button"
				class="btn btn-md btn-success">
				<span class="glyphicon glyphicon-plus"></span> បង្កើតថ្មី
			</button>-->
		</div>
	</div>
	<!-- check for flash notification message -->
	@if(Session::has('flash_notice'))
		<div id="login-alert" class="alert alert-success col-sm-12">
			<div id="flash_notice">{{ Session::get('flash_notice') }}</div>
		</div>
	@endif
	<table class="table table-hover table-bordered table-striped" id="tbl_cgroups">
		<thead>
			<tr>
				<th>ឈ្មោះអ្នកលក់</th>
				<th>ប្រាក់សរុប(៛)</th>
				<th>ប្រាក់សរុប($)</th>
				<th>ថ្ងៃខែឆ្នាំ</th>
				<th>ម៉ោងចូល</th>
				<th>ម៉ោងចេញ</th>
				<th>សកម្មភាព</th>
			</tr>
		</thead>
	</table>
</div>

<script type="text/javascript">

	function redirectPage(url){
		window.location = url;
	}

	var table = $('#tbl_cgroups').DataTable( {

        "data": <?php echo $userSaleLogs ?>,
        "order": [[ 1, "desc" ]],
        "createdRow": function ( row, data, index ) {
        	$('td', row).eq(6).addClass('last_td');
        },
        "columns": [
           	{ "data": "first_name" },
            { "data": "total_kh" },
            { "data": "total_us" },
            { "data": "dates" },
            { "data": "time_in" },
            { "data": "time_out" },
            { "data": null }
        ],
        "columnDefs": [ {
            "targets": -1,
            "defaultContent":
            '<button style="margin-right:5px" type="button" class="btnedit btn btn-xs btn-primary">'
			+'<span class="glyphicon glyphicon-edit"></span> Edit</button>'
			
        } ]
    } );

    $('#tbl_cgroups tbody').on( 'click', '.btnedit', function () {
        var data = table.row( $(this).parents('tr') ).data();
        redirectPage('edit/'+data['id']);
    } );

</script>
@stop
