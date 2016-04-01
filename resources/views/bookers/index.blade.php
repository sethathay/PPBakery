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
.table-responsive{
	overflow: hidden;
	min-height: .01%;
}
</style>

<?php
function number_format_unlimited_precision($number,$decimal = '.')
{
   $broken_number = explode($decimal,$number);
   if(count($broken_number) > 1){
		return (number_format($broken_number[0]).$decimal.$broken_number[1]);
   }else{
		return (number_format($broken_number[0]));
   }
}
?>
<div class="table-responsive table-list">
	<div class="col-sm-12 panel-heading">
		<div class="col-sm-7">
			<img src="{{ URL::asset('/img/book_b.png') }}" /> <label>លក់កក់</label>
		</div>
		<div class="col-sm-5"
			style="text-align: right; padding: 23px 10px 0 0; vertical-align: middle;">
			<button onclick="redirectPage('book')" type="button"
				class="btn btn-md btn-success">
				<span class="glyphicon glyphicon-plus"></span> កក់ទំនិញ
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
				<!--<th><input type="checkbox" name="checkOptionAll" /></th>-->
				<th>Order Date</th>
				<th>Receipt Code</th>
				<th>Discount (៛)</th>
				<th>Discount ($)</th>
				<th>Total Amount (៛)</th>
				<th>Total Amount ($)</th>
				<th>Balance (៛)</th>
				<th>Action</th>
			</tr>
		</thead>
		<?php /*
		<tbody>
		<?php $i=1; ?>
			@foreach($saleOrders as $saleOrder)
			<tr>
				<td style="text-align: center;"><input type="checkbox"
					name="checkOption" /></td>
				<td>{{ $saleOrder->order_date }}</td>
				<td>{{ $saleOrder->so_code}}</td>
				<td>{{ number_format_unlimited_precision($saleOrder->discount_riel)}}</td>
				<td>{{ number_format($saleOrder->discount_us,2)}}</td>
				<td>{{ number_format_unlimited_precision($saleOrder->total_amount_riel)}}</td>
				<td>{{ number_format($saleOrder->total_amount_us,2)}}</td>
				<td>{{ number_format_unlimited_precision($saleOrder->balance)}}</td>
				<td class="last_td" style="text-align:right;">
					@if($saleOrder->is_book > 0)						
						<button type="button" id="{{ $saleOrder->id }}" class="btn btn-xs btn-warning paid">
							<span class="fa fa-dollar"></span> &nbsp;Pay&nbsp;
						</button>
					@endif
					<button type="button" id="{{ $saleOrder->id }}" class="btn btn-xs btn-info">
						<span class="glyphicon glyphicon-user"></span> View
					</button>
					<button type="button" onclick="redirectPage('edit/{{ $saleOrder->id }}')" class="btn btn-xs btn-primary">
						<span class="glyphicon glyphicon-edit"></span> Edit
					</button>
					<button type="button" onclick="if(confirm('Are you sure you want to delete this?')==true) redirectPage('destroy/{{ $saleOrder->id }}')" class="btn btn-xs btn-danger">
						<span class="glyphicon glyphicon-trash"></span> Delete
					</button>
				</td>
			</tr>
			@endforeach
		</tbody>
		*/?>
	</table>
</div>
	<!-- Modal Print Receipt -->
	<div id="myModalPrint" class="modal fade col-md-4" role="dialog">

	</div>
<script type="text/javascript">

	function redirectPage(url){
		window.location = url;
	}
	
	var table = $('#tbl_expense').DataTable( {

        "data": <?php echo $saleOrders ?>,
        "order": [[ 6, "desc" ]],
        "createdRow": function ( row, datas, index ) {
        	$('td', row).eq(7).addClass('last_td');
        },
        "columns": [
           	{ "data": "order_date" },
            { "data": "so_code" },
            { "data": "discount_riel" },
            { "data": "discount_us" },
            { "data": "total_amount_riel" },
            { "data": "total_amount_us" },
            { "data": "balance" },
            { "data": null }
        ],
        "columnDefs": [ {
            "targets": -1,
            "defaultContent":
			'<button style="margin-right:5px" type="button" class="btn btn-xs btn-warning paid"><span class="fa fa-dollar"></span> &nbsp;Pay&nbsp;</button>'
            +'<button style="margin-right:5px" type="button" class="btnview btn btn-xs btn-info">'
            + '<span class="glyphicon glyphicon-user"></span> View</button>'
            +'<button style="margin-right:5px" type="button" class="btnedit btn btn-xs btn-primary">'
			+'<span class="glyphicon glyphicon-edit"></span> Edit</button>'
			+'<button type="button" class="btn btn-xs btn-danger btndelete">'
			+'<span class="glyphicon glyphicon-trash"></span> Delete'
			+'</button>'
        },
        {
                "targets": 2,
                "render": function ( data, type, row ) {
                    return '<span class="badge" style="background-color:#5cb85c;font-size:14px;"> $ </span> <span class="label label-danger" style="font-size:14px;">' + addCommas(data) + '</span>';
                },
		},
        {
                "targets": 3,
                "render": function ( data, type, row ) {
                    return '<span class="badge" style="background-color:#5cb85c;font-size:14px;"> $ </span> <span class="label label-danger" style="font-size:14px;">' + addCommas(getMathRound100(data)) + '</span>';
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
                "render": function ( data, type, row ) {
                    return '<span class="badge" style="background-color:#5cb85c;font-size:14px;"> $ </span> <span class="label label-danger" style="font-size:14px;">' + addCommas(getMathRound100(data)) + '</span>';
                },
		},
        {
                "targets": 6,
                "render": function ( data, type, row ) {
                    return '<span class="badge" style="background-color:#5cb85c;font-size:14px;"> $ </span> <span class="label label-danger" style="font-size:14px;">' + addCommas(data) + '</span>';
                },
		},
	 ]
    } );

	$('#tbl_expense tbody').on( 'click', '.paid', function () {
        var data = table.row( $(this).parents('tr') ).data();
		var token = "{!! csrf_token() !!}";
		$.ajax({
			type : 'post',
			url : '{{ URL::asset("bookers/pay") }}',
			data : {sales_order_id:data['id'], _token:token},
			dataType : 'json',
			success : function(result){
				// return sales_order_id;								
				
				$("#myModalPayment").hide();
				$("#myModalPrint").load('{{ URL::asset("bookers/print")}}/'+result+'/no', '', function(){
					//$("#myModalPrint").modal();
					w = window.open();
					w.document.write($("#myModalPrint").html());
					w.print(false);
					w.close();
					window.location = '{{ URL::asset("bookers/index") }}';
				});
				
			}
		});
    } );

	$('#tbl_expense tbody').on( 'click', '.btnview', function () {
        var data = table.row( $(this).parents('tr') ).data();
		$("#myModalPrint").load("{{ URL::asset('pos/print/') }}/"+data['id']+"/yes", '', function(){
			$("#myModalPrint").modal();
		});
    } );

    $('#tbl_expense tbody').on( 'click', '.btnedit', function () {
        var data = table.row( $(this).parents('tr') ).data();
        redirectPage('edit/' + data['id']);
    } );

    $('#tbl_expense tbody').on( 'click', '.btndelete', function () {
        var data = table.row( $(this).parents('tr') ).data();
        var ts = $(this);
        if(confirm('តើអ្នកពិតជាចង់លុបវាពិតមែនទេ?')){
			$.ajax({
			    url: 'destroy/' + data['id'],
			    type: 'GET',
			    data:{"_token": "{{ csrf_token() }}"},
			    success: function(result) {
			    	table.row(ts.parents('tr')).remove().draw( false );
			    }
			});
		}
    } );
	// add commas for number 120,000
	function addCommas(nStr)
	{
		nStr += '';
		x = nStr.split('.');
		x1 = x[0];
		x2 = x.length > 1 ? '.' + x[1] : '';
		var rgx = /(\d+)(\d{3})/;
		while (rgx.test(x1)) {
			x1 = x1.replace(rgx, '$1' + "," + '$2');
		}
		return x1 + x2;
	}
	
	// Round number 0.0
	function getMathRound(amount){
		return Math.round( (amount) * 10 ) / 10;
	}
	
	// Round number 0.00
	function getMathRound100(amount){
		return Math.round( (amount) * 100 ) / 100;
	}
</script>
@stop
