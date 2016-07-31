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
			<button onclick="redirectPage('expense')" type="button"
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
				<th>ខ្នាតនៃក្រុមចំនាយ</th>
				<th>ចំនួន</th>
				<th>តម្លៃ(​​៛)</th>
				<th>តម្លៃ(​​$)</th>
				<th>តម្លៃសរុប(​​៛)</th>
				<th>កាលបរិច្ឆេទ</th>
				<th>ម៉ោង</th>
				<th>សកម្មភាព</th>
			</tr>
		</thead>
	</table>
</div>

<script type="text/javascript">

	var rate = '<?php echo $exchangerate->riel; ?>';
	function redirectPage(url){
		window.location = url;
	}
	var table = $('#tbl_expense').DataTable( {

        "data": <?php echo $services ?>,
        "order": [[ 6, "desc" ]],
        "createdRow": function ( row, datas, index ) {
        	$('td', row).eq(9).addClass('last_td');
        },
        "columns": [
           	{ "data": "section_name" },
           	{ "data": "uom_expense_name" },
           	{ "data": "qty" },
            { "data": "riel_price" },
            { "data": "dollar_price" },
            { "data": "total_price" },
            { "data": "expense_date" },
            { "data": "expense_time" },
            { "data": null }
        ],
        "columnDefs": [ {
            "targets": -1,
            "defaultContent":
            '<button type="button" class="btn btn-xs btn-danger btndelete">'
			+'<span class="glyphicon glyphicon-trash"></span> Delete'
			+'</button>'
        },
        {
                "targets": 3,
                "render": function ( data, type, row ) {
                    return '<span class="badge" style="background-color:#5cb85c;font-size:14px;"> ៛ </span> <span class="label label-danger" style="font-size:14px;">' + addCommas(data) + '</span>';
                },
        },
        {
                "targets": 4,
                "render": function ( data, type, row ) {
                    return '<span class="badge" style="background-color:#5cb85c;font-size:14px;"> ៛ </span> <span class="label label-danger" style="font-size:14px;">' + addCommas(data) + '</span>';
                },
        },
        {
                "targets": 5,
                "mRender": function ( data, type, row ) {
                    return '<span class="badge" style="background-color:#5cb85c;font-size:14px;"> ៛ </span> <span class="label label-danger" style="font-size:14px;">' + addCommas(Number(row.qty*row.riel_price)+Number(row.qty*row.dollar_price*Number(rate)))  + '</span>';
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
			    url: 'destroy/' + data['id'],
			    type: 'get',
			    data:{"_token": "{{ csrf_token() }}"},
			    success: function(result) {
			    	table.row(ts.parents('tr')).remove().draw( false );
			    }
			});
		}
    } );

</script>
@stop
