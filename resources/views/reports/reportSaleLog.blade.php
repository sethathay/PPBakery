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
	padding-bottom: 160px;
}

input,select{
	height: 50px;
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
        	<div class="form-group">
                <div class='input-group'>
					<img src="{{ URL::asset('/img/saleReport.png') }}" /> <label>របាយការណ៍ បញ្ចីរប្រាក់សរុបពីការលក់</label>
                </div>
            </div>
		</div>
		<div class="col-sm-5" style="text-align: right; padding: 23px 10px 0 0; vertical-align: middle;">
        	<div class="col-sm-8">
            	<div class="form-group">
                    <div class='input-group date' id='datetimepicker6'>
                        <input type='text' class="form-control" id="dates" placeholder="ថ្ងៃចាប់ផ្តើម (YYYY-MM-DD)" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
        	<div class="col-sm-3">
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
	<table class="table table-hover table-bordered table-striped" id="tbl_expense">
		<thead>
			<tr>
				<th>អ្នកប្រើប្រាស់</th>
				<th>ថ្ងៃខែឆ្នាំ</th>
				<th>ម់ោងចូល</th>
				<th>ម់ោងចេញ</th>
				<th>ចំនួនបញ្ចូលសរុប (៛)</th>
				<th>ចំនួនបញ្ចូលសរុប ($)</th>
				<th>ចំនួនសរុប System ($)</th>
			</tr>
		</thead>
		<tbody>
			<tr class="empty_data"><td colspan="7" style="text-align:center;">គ្នានទិន្ន័យនៅក្នុងតារាងទេ</td></tr>		
        </tbody>
	</table>
    </div>
</div>
	<!-- Modal Print Receipt -->
	<div id="myModalPrint" class="modal fade col-md-4" role="dialog">

	</div>
<script type="text/javascript">
    $(function () {
		$('#dates').datepicker({
    		autoclose: true,
			format: 'yyyy-mm-dd'
       });
    });
</script>

<script type="text/javascript">

	function redirectPage(url){
		window.location = url;
	}
	
	jQuery(document).ready(function(){
		
		
		$(".btn-success").click(function(){						
			if($('#dates').val() == ""){
				alert("សូមបញ្ចូល ថ្ងៃខែឆ្នាំ !!");
			}else{
				$(".table_result").html('');
				waitingDialog.show('កំពុងដំណើរការ សូមមេត្តារង់ចាំ!');	
				
				var dates = $('#dates').val();
				
				$.ajax({
					url : 'selectReportSaleLog',
					type: 'POST',
					data: { dates : dates, _token : "{!! csrf_token() !!}"},
					success: function(htmls){
						$(".table_result").append(htmls);	
						$("#tbl_expense").find(".total_record").clone().insertAfter("tr:eq(0)");
						waitingDialog.hide();				
					}
				});		
			}
		});
	
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
