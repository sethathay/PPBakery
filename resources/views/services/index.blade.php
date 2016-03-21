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
			<img src="{{ URL::asset('/img/dollars_b.png') }}" /> <label>ការចំនាយ</label>
		</div>
		<div class="col-sm-5"
			style="text-align: right; padding: 23px 10px 0 0; vertical-align: middle;">
			<button onclick="redirectPage('services/create')" type="button"
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
	<table class="table table-hover table-bordered table-striped" id="tbl_expense">
		<thead>
			<tr>				
				<th>ក្រុមចំនាយ</th>
				<th>ឈ្មោះនៃការចំនាយ</th>
				<th>កាលបរិច្ឆេទ</th>
				<th>តម្លៃ($)</th>
				<th>តម្លៃ(​​៛)</th>
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

	var table = $('#tbl_expense').DataTable( {

        "data": <?php echo $services ?>,
        "order": [[ 6, "desc" ]],
        "createdRow": function ( row, datas, index ) {
        	$('td', row).eq(7).addClass('last_td');
        },
        "columns": [
           	{ "data": "section_name" },
            { "data": "name" },
            { "data": "expense_date" },
            { "data": "dollar_price" },
            { "data": "riel_price" },
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
        },
        {
                "targets": 3,
                "render": function ( data, type, row ) {
                    return '<span class="badge" style="background-color:#5cb85c;font-size:14px;"> $ </span> <span class="label label-danger" style="font-size:14px;">' + data + '</span>';
                },
        },
        {
                "targets": 4,
                "render": function ( data, type, row ) {
                    return '<span class="badge" style="background-color:#5cb85c;font-size:14px;"> ៛ </span> <span class="label label-danger" style="font-size:14px;">' + data + '</span>';
                },
            },
         ]
    } );

	$('#tbl_expense tbody').on( 'click', '.btnview', function () {
        var data = table.row( $(this).parents('tr') ).data();
        redirectPage('services/' + data['id']);
    } );

    $('#tbl_expense tbody').on( 'click', '.btnedit', function () {
        var data = table.row( $(this).parents('tr') ).data();
        redirectPage('services/' + data['id'] + '/edit');
    } );

    $('#tbl_expense tbody').on( 'click', '.btndelete', function () {
        var data = table.row( $(this).parents('tr') ).data();
        var ts = $(this);
        if(confirm('តើអ្នកពិតជាចង់លុបវាពិតមែនទេ?')){
			$.ajax({
			    url: 'services/' + data['id'],
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
