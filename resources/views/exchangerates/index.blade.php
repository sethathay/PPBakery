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

.table-responsive{
	overflow: hidden;
	min-height: .01%;
}

.table thead th {
	text-align: center;
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
			<img src="{{ URL::asset('/img/emblem_money_b.png') }}" /> <label>អត្រា​ប្តូ​រ​ប្រាក់</label>
		</div>
		<div class="col-sm-5"
			style="text-align: right; padding: 23px 10px 0 0; vertical-align: middle;">
			<button onclick="redirectPage('exchangerates/create')" type="button"
				class="btn btn-md btn-success">
				<span class="glyphicon glyphicon-plus"></span> បង្កើតថ្មី
			</button>
		</div>
	</div>
	<!-- check for flash notification message -->
	@if(Session::has('flash_notice'))
		<div id="login-alert" class="alert alert-success col-sm-12">
			<div id="flash_notice">{{ Session::get('flash_notice') }}</div>
		</div>
	@endif
	<table class="table table-hover table-bordered table-striped" id="tbl_exchange">
		<thead>
			<tr>
				<th>អត្រា​ប្រាក់</th>
				<th>បរិយាយផ្សេងៗ</th>
				<th>ថ្ងៃនៃការកែប្រែ</th>
			</tr>
		</thead>
	</table>
</div>
<script type="text/javascript">
	var table = $('#tbl_exchange').DataTable( {

        "data": <?php echo $rates ?>,
        "order": [[ 2, "desc" ]],
        "columns": [
           	{ "data": "riel" },
            { "data": "description" },
            { "data": "updated_at" }
        ],
        "columnDefs": [
            {
                "targets": 0,
                "render": function ( data, type, row ) {
                    return '<span class="badge" style="background-color:#5cb85c;font-size:14px;"> 1$</span> <span class="label label-danger" style="font-size:14px;">' + data + '</span>';
                },
            },
        ]
    } );
</script>
@stop
