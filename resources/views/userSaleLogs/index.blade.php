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
		<div class="col-sm-6">
			<img src="{{ URL::asset('/img/saleReport.png') }}" /> <label>បញ្ចីរប្រាក់សរុបពីការលក់</label>
		</div>
		<div class="col-sm-6" style="text-align: right; padding: 23px 10px 0 0; vertical-align: middle;">
            <div class="col-sm-6">
            	<div class="form-group">
                    <div class='input-group date' id='datetimepicker7'>
                        <input type='text' class="form-control" value="<?php echo date('Y-m-d');?>" id="dates" placeholder="ថ្ងៃបញ្ចប់ (YYYY-MM-DD)" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
        	<div class="col-sm-6">
            	<div class="form-group">
                	<div class='input-group'>
                        <button type="button"
                            class="btn btn-md btn-success">
                            <span class="glyphicon glyphicon-search"></span> ទាញយក
                        </button>
                    </div>
                </div>
            </div>
		</div>
	</div>
	<!-- check for flash notification message -->
	@if(Session::has('flash_notice'))
		<div id="login-alert" class="alert alert-success col-sm-12">
			<div id="flash_notice">{{ Session::get('flash_notice') }}</div>
		</div>
	@endif	
    <div class="col-md-12 table_result">
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
	
	jQuery(document).ready(function(){
		
		
		$(".btn-success").click(function(){	
			
			waitingDialog.show('កំពុងដំណើរការ សូមមេត្តារង់ចាំ!');	
			$(".table_result").html('');
			
			$.ajax({
				url : 'getDataByDate',
				type: 'POST',
				data: { dates : $("#dates").val(), _token : "{!! csrf_token() !!}"},
				success: function(htmls){
					$(".table_result").append(htmls);	
					//$("#tbl_expense").find(".total_record").clone().insertAfter("tr:eq(0)");
					waitingDialog.hide();				
				}
			});	
		});
	
	});
	
	
	$('#datetimepicker7').datepicker({
		autoclose: true,
		format: 'yyyy-mm-dd'
   });

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
