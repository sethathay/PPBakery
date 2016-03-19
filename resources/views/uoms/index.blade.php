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
			<img src="{{ URL::asset('/img/settings_b.png') }}" /> <label>វង្វាស់ខ្នាត</label>
		</div>
		<div class="col-sm-5"
			style="text-align: right; padding: 23px 10px 0 0; vertical-align: middle;">
			<button onclick="redirectPage('uoms/create')" type="button"
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
	<table class="table table-hover table-bordered table-striped" id="tbl_uom">
		<thead>
			<tr>
				<th>ឈ្មោះវង្វាស់ខ្នាត</th>
				<th>ពាក្យកាត់</th>
				<th>បរិយាយផ្សេងៗ</th>
				<th>ថ្ងៃនៃការកែប្រែ</th>
				<th>សកម្មភាព</th>
			</tr>
		</thead>
	</table>	
	
</div>

<script type="text/javascript">

	function redirectPage(url){
		window.location = url;
	}

	var table = $('#tbl_uom').DataTable( {

        "data": <?php echo $uoms ?>,
        "order": [[ 3, "desc" ]],
        "createdRow": function ( row, data, index ) {
        	$('td', row).eq(4).addClass('last_td');
        },
        "columns": [
           	{ "data": "name" },
            { "data": "abbr" },
            { "data": "description" },
            { "data": "updated_at" },
            { "data": null }
        ],
        "columnDefs": [ {
            "targets": -1,
            "defaultContent":
            '<button style="margin-right:5px" type="button" class="btnview btn btn-xs btn-info">'
            + '<span class="glyphicon glyphicon-user"></span> View</button>'
            +'<button style="margin-right:5px" type="button" class="btnedit btn btn-xs btn-primary">'
			+'<span class="glyphicon glyphicon-edit"></span> Edit</button>'
			+'<button type="button" class="btn btn-xs btn-danger btndelete">'
			+'<span class="glyphicon glyphicon-trash"></span> Delete'
			+'</button>'
        } ]
    } );

	$('#tbl_uom tbody').on( 'click', '.btnview', function () {
        var data = table.row( $(this).parents('tr') ).data();
        redirectPage('uoms/' + data['id']);
    } );

    $('#tbl_uom tbody').on( 'click', '.btnedit', function () {
        var data = table.row( $(this).parents('tr') ).data();
        redirectPage('uoms/' + data['id'] + '/edit');
    } );

    $('#tbl_uom tbody').on( 'click', '.btndelete', function () {
        var data = table.row( $(this).parents('tr') ).data();
        var ts = $(this);
        if(confirm('តើអ្នកពិតជាចង់លុបវាពិតមែនទេ?')){
			$.ajax({
			    url: 'uoms/' + data['id'],
			    type: 'DELETE',
			    data:{"_token": "{{ csrf_token() }}"},
			    success: function(result) {
			    	table.row(ts.parents('tr')).remove().draw( false );
			    }
			});
		}
    } );

</script>
@stop
