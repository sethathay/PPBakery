@extends('master') 

@section('content')

<link href="{{ URL::asset('css/general.css') }}" rel="stylesheet">
<style>
.info div{
	padding: 5px 0;
}
.info div label{
	color:#337ab7;
}

.photo_product{
	margin: 8px 14px;
	padding: 0;
}
.photo_product li{
	width: 100px; 
	height: 100px;
	list-style: none;
	display: inline;
	margin: 10px 5px 0;
	padding: 65px 0 70px;
	border: 1px #F84D36 solid; 
	border-radius: 5px;
	position: relative;
}
.product_name { 
   position: absolute; 
   top: 102px; 
   left: 0; 
   width: 100%; 
   font-size: 11px;
   background: rgba(0,0,255,0.4);
   color: #fff;
   text-align: center;
   padding: 17px 0;   
   border-bottom-right-radius:5px;
   border-bottom-left-radius:5px;
   
}
.photo_product li:hover{
	border: 1px #3E5C9A solid; 
	box-shadow: 3px 3px 2px #ccc;
	opacity: 0.5;
}
.photo_product li img{
	width: 150px; 
	height: 150px; 
	border-radius: 5px;
}
.photo_product li img:hover{
	cursor: pointer;
}

.header-fixed {
    width: 100%;
    height: 430px;
}

.header-fixed > thead,
.header-fixed > tbody,
.header-fixed > thead > tr,
.header-fixed > tbody > tr,
.header-fixed > thead > tr > th,
.header-fixed > tbody > tr > td {
    display: block;
}

.header-fixed > tbody > tr:after,
.header-fixed > thead > tr:after {
    content: ' ';
    display: block;
    visibility: hidden;
    clear: both;
}

.header-fixed > tbody {
    overflow-y: auto;
    height: 300px;
}

.header-fixed > tbody > tr > td,
.header-fixed > thead > tr > th {
	font-size: 18px;
    width: 13%;
    float: left;
    text-align: right;
}
.header-fixed > thead > tr > th {
    text-align: center !important;
}
.first-column{
    width: 18% !important;
    text-align: left !important;
    padding-left: 20px !important;
}
.qty-column{
    text-align: center !important;
}
.row_input{
	display : none;
}
.txt_discount,.txt_unit_price,.txt_unit_price_us, .txt_total_by_item{
	text-align : right;
	width: 120px;
}
.txt_qty{
	text-align:center;
	width:100px;
}
select{
	height:40px !important;
}
#myModalPayment input{
	text-align: right;
	height: 50px;
	font-size: 20px;
}

.block-total{
	position:fixed;
	bottom: 31px;
}
.amount-big{
	font-size: 26px;
	color: red;
}
.amount, .amount-big{
	text-align: right;
	padding-right : 50px;
}

.setBackground{
	background: #F9AEC3 !important;
}
.numberInput{
	font-size:20px;
	font-weight: bold;
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
{!! Form::open(array('url' => 'services/addExpense', 'method' => 'post', 'class' => 'form-inline', 'role'=>'form', 'id'=>'adminForm', 'data-toggle'=>'validator')) !!}
<div class="table-responsive table-list">
	<div class="col-sm-12 panel-heading">
		<div class="col-sm-3">
			<img src="{{ URL::asset('/img/dollars_b.png') }}" /> <label>ការចំនាយ</label>
		</div>
		<div class="col-sm-9"​​ style="text-align: right; padding: 30px 10px; vertical-align: middle;">
            <div class="col-sm-12">	
			<?php if(Session::get('group_id') == 1 || Session::get('group_id') == 3){ ?>			
			<div class="form-group">
				<div class='input-group date' id='datetimepicker7'>
					<input type='text' class="form-control" value="<?php echo date('Y-m-d');?>" name="expense_date" id="dates" placeholder="ថ្ងៃបញ្ចប់ (YYYY-MM-DD)" />
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
			</div>
			<?php }?>
			<button type="button"
				class="btn btn-md btn-primary btn-save">
				<span class="glyphicon glyphicon-save"></span> រក្សាទុក
			</button>
			<button onclick="redirectPage('{{ URL::asset('services/index') }}')" type="button"
				class="btn btn-md btn-danger">
				<span class="glyphicon"></span> ត្រឡប់ក្រោយ
			</button>
            </div>
		</div>
	</div>
	<div class="col-sm-12" style="padding:10px 0;">    
		<div class="table-responsive">
		  <table class="table table-hover header-fixed table-striped">
			<thead>
				<tr>
					<th style="width:12%;">ម៉ោង</th>
					<th class="first-column">ឈ្មោះទំនិញ</th>
					<th style="width:18%;">ខ្នាតនៃក្រុមចំនាយ</th>
					<th>ចំនួន</th>
					<th>តំ.រាយ (៛)</th>
					<th>តំ.រាយ ($)</th>
					<th>សរុប</th>
					<th>ប៊ូតុង</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="width:12%;">
						<select name="times[]" style="width:100px !important;">
							<?php for($i=0; $i<24; $i++){ ?>
							  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>	
							<?php }?>
						</select>
						<select name="minutes[]" style="width:60px !important;">
						<?php for($i=0; $i<60; $i++){?>
						  <option value="<?php echo $i;?>"><?php echo ($i<10)?"0".$i:$i;?></option>
						<?php }?>
					</select>
					</td>
					<td class="first-column">
						{!! Form::select('section_id[]', [null=>'សូមជ្រើសរើស']+$sections, Input::old('sections'), ['class'=>'form-control section_id']) !!}</td>
					<td style="width:18%;">{!! Form::select('uom_expense_id[]', [null=>'សូមជ្រើសរើស']+$uom, Input::old('uom_expense_id'), ['class'=>'form-control uom_expense_id']) !!}</td>
					<td class="qty-column">{!! Form::text('txt_qty[]', null, array('class'=>'txt_qty numberInput')) !!}</td>
					<td>{!! Form::text('txt_unit_price[]', null, array('class'=>'txt_unit_price numberInput')) !!}</td>
					<td>{!! Form::text('txt_unit_price_us[]', null, array('class'=>'txt_unit_price_us numberInput')) !!}</td>
					<td>{!! Form::text('txt_total_by_item[]', null, array('class'=>'txt_total_by_item numberInput', 'readonly'=>'readonly')) !!}</td>
					<td style="text-align:center;">
						{!! Form::hidden('id[]', null, array('class'=>'row_input id')) !!}
						
						<button type="button" class="btn_plus btn btn-xs btn-success">
							<span class="glyphicon glyphicon-plus"></span> 
						</button>
						<button type="button" class="btn btn-xs btn-danger btn_delete" style="display:none;">
							<span class="glyphicon glyphicon-trash"></span> 
						</button>
					</td>
				</tr>
				
				<div class="row block-total" style="background: #DBEAF9; height: 160px; font-size: 16px; padding-top: 10px; width:83%;">
					<div class="col-md-6">
						<div><label>សារខា :  {{ Session::get('location_name') }} </label></div>
						<div><label>ឈ្មោះអ្នកប្រើប្រាស់ :  {{  Auth::user()->first_name." ".Auth::user()->last_name }} </label></div>
						<div><label>ថ្ងៃ-ខែ-ឆ្នាំ:  &nbsp;&nbsp;&nbsp;&nbsp; <span id="fullDate" style="color:blue;"></span> </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <label>ម៉ោង:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <label style="color:blue;" id="dateBox"></label></div>
						<div style="font-size: 20px; border: 1px solid #aaa; padding: 15px 10px 10px; text-align: center;"><label>អត្រាប្តូរប្រាក់ :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label style="color:blue;">1$ = {{ number_format_unlimited_precision(Session::get('exchangerate')->riel) }}R</label>{!! Form::hidden('exchange_rate_id', Session::get('exchangerate')->id, array('class'=>'exchange_rate_id')) !!}</div>
					</div>
					<div class="col-md-6 block-amount">
						<div class="row" style="padding-top:30px;">
							<div class="col-md-6" style="color:red;"><label>តំលៃសរុបត្រូវបង់ (៛) : </label>{!! Form::hidden('subtotal', 0, array('class'=>'txt_subtotal')) !!}</div>
							<div class="col-md-6  amount-big"><label class="total_amount_riel">0</label> <label>៛</label>{!! Form::hidden('total_amount_riel', 0, array('class'=>'txt_total_amount_riel')) !!}</div>
						</div>
						<div class="row">
							<div class="col-md-6" style="color:red;"><label>តំលៃសរុបត្រូវបង់ ($) : </label></div>
							<div class="col-md-6  amount-big"><label class="total_amount_us">0</label> <label>$</label>{!! Form::hidden('total_amount_us', 0, array('class'=>'txt_total_amount_us')) !!}</div>
						</div>
					</div>
				</div>
			</tbody>
		  </table>
		</div>
	</div>
	{!! Form::hidden('rate', $exchangerate->riel, array('class'=>'riel')) !!}
	{!! Form::close() !!}
</div>
<script type="text/javascript">
		$(document).ready(function(){
		
			$(".numberInput").keypress(function(event){	
				if((event.which != 8 && isNaN(String.fromCharCode(event.which))) && event.which != 46){
				   event.preventDefault(); //stop character from entering input
			   }else if(event.which == 46){
				   if($(this).val() == ""){
					  $(this).val(0); 
				   }
			   }
			});
			
			var rate = "{{ Session::get('exchangerate')->riel }}";
			var index = 1;
			var productItem = Array();
			var record = 0;
			var token = "{!! csrf_token() !!}";

			$(".txt_subtotal").val(0);
			$(".txt_total_amount_riel").val(0);
			$(".txt_total_amount_us").val(0);
			
			
			$(".section_id").val('');
			$(".uom_expense_id").val('');
			$(".txt_qty").val('');
			$(".txt_unit_price").val('');
			$(".txt_total_by_item").val('');
			
						
			//click on button delete
			$(".btn_delete").click(function(){
				if(confirm("តើអ្នកពិតជាចង់លុបទំនេញនេះ មែនទេ?")){
					
					// Calculate total block
					calculateTotalBlock(- Number($(this).parents("tr").find(".txt_total_by_item").val()));
					//Remove html record from table list
					$(this).closest("tr").remove();
					
					$(".table>tbody>tr:last").find(".btn_plus").css("display","");	
					
				}		
			});
			
				
			// when click on increase button
			$(".btn_plus").click(function(){				
				$(".table > tbody > tr:last").clone(true).appendTo(".table");
				
				// button
				$(".table > tbody > tr").find(".btn_plus").css("display", "none");
				$(".table > tbody > tr:last").find(".btn_plus").css("display", "");
				$(".table > tbody > tr:last").find(".btn_delete").css("display", "");
				
				//record
				$(".table > tbody > tr:last").find(".txt_qty").val('');
				$(".table > tbody > tr:last").find(".txt_unit_price").val('');
				$(".table > tbody > tr:last").find(".txt_unit_price_us").val('');
				$(".table > tbody > tr:last").find(".txt_total_by_item").val('');
				
			});
			
			// when qty is change
			$(".txt_qty").keyup(function(){		
				if(Number($(this).val()) > 0){			
					var getObj = $(this).parents("tr");
					var newQty = Number(getObj.find(".txt_qty").val());
					var unit_price = (Number(getObj.find(".txt_unit_price").val()) > 0)? Number(getObj.find(".txt_unit_price").val()) : 0;
					$(".txt_subtotal").val(Number($(".txt_subtotal").val()) - Number(getObj.find(".txt_total_by_item").val()));
					//$(".txt_subtotal").val( Number($(".txt_subtotal").val()) - Number(newQty * unit_price) );
										
					var total_by_item = unit_price*newQty ;				
					getObj.find(".txt_total_by_item").val(total_by_item);
					
					calculateTotalBlock(total_by_item);
				}
			});
			
			// when unit price is change
			$(".txt_unit_price").keyup(function(){	
				if(Number($(this).val()) > 0){	
					var getObj = $(this).parents("tr");
					var newQty = Number(getObj.find(".txt_qty").val());
					var unit_price = (Number(getObj.find(".txt_unit_price").val()) > 0)? Number(getObj.find(".txt_unit_price").val()) : 0;
					$(".txt_subtotal").val(Number($(".txt_subtotal").val()) - Number(getObj.find(".txt_total_by_item").val()));
					
					var total_by_item = unit_price*newQty;
										
					getObj.find(".txt_total_by_item").val(total_by_item);
					
					calculateTotalBlock(total_by_item);
				}
			});
			
			// when unit price is change
			$(".txt_unit_price_us").keyup(function(){	
				if(Number($(this).val()) > 0){	
					var getObj = $(this).parents("tr");
					var newQty = Number(getObj.find(".txt_qty").val());
					var unit_price_us = ((Number(getObj.find(".txt_unit_price_us").val()) > 0)? Number(getObj.find(".txt_unit_price_us").val()) : 0) * Number($(".riel").val());
					$(".txt_subtotal").val(Number($(".txt_subtotal").val()) - Number(getObj.find(".txt_total_by_item").val()));
					var total_by_item = unit_price_us*newQty;
										
					getObj.find(".txt_total_by_item").val(total_by_item);
					
					calculateTotalBlock(total_by_item);
				}
			});
			
			$(".btn-save").click(function(){
				var options = false;
				$.each($('.txt_total_by_item'),function(key, value){
					if(value.value != ""){
						options = true;
					}
				});
				
				if(options){
					$.ajax({
						type : 'post',
						url : '{{ URL::asset("services/addExpense") }}',
						data : $("#adminForm").serialize(),
						dataType : 'json',
						success : function(objResult){
							
						}
					});
					if(options){
						alert("ទិន្ន័យត្រូវបានរក្សាទុក!!!");
						window.location = "index";
					}
				}else{
					alert("សូមបញ្ចូលចំនាយ មុនចុចរក្សាទុក!!!");
				}
			});
			
			
			$('#datetimepicker7').datepicker({
				autoclose: true,
				format: 'yyyy-mm-dd'
		   });
						
			// Calculate total block
			function calculateTotalBlock(total_by_item){	
			
				// Sum subtotal
				var txt_subtotal = Number($(".txt_subtotal").val());
				var subtotal     = txt_subtotal + total_by_item;	
				$(".txt_subtotal").val(subtotal);
				
				// Sum total amount in riel
				var total_amount_riel     = (subtotal);					
				$(".total_amount_riel").text(addCommas(getMathRound(total_amount_riel)));
				$(".txt_total_amount_riel").val(total_amount_riel);
				
				// Sum total amount in us
				var total_amount_us     = total_amount_riel / rate;				
				$(".total_amount_us").text(addCommas(getMathRound(total_amount_us)));
				$(".txt_total_amount_us").val(total_amount_us);
			}
		});
	

	
	// Round number 0.0
	function getMathRound(amount){
		return Math.round( (amount) * 10 ) / 10;
	}
	
	// Round number 0.00
	function getMathRound100(amount){
		return Math.round( (amount) * 100 ) / 100;
	}

	
	function updateClock ( )
	{
		var currentTime = new Date ( );
		var currentHours = currentTime.getHours ( );
		var currentMinutes = currentTime.getMinutes ( );
		var currentSeconds = currentTime.getSeconds ( );

		// Pad the minutes and seconds with leading zeros, if required
		currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
		currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;

		// Choose either "AM" or "PM" as appropriate
		var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";

		// Convert the hours component to 12-hour format if needed
		currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;

		// Convert an hours component of "0" to "12"
		currentHours = ( currentHours == 0 ) ? 12 : currentHours;

		// Compose the string for display
		var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;
		
		var month=currentTime.getMonth()+1;
		var today=currentTime.getDate();
		var year=currentTime.getFullYear();
		
		today = (today < 10? "0":"")+today;
		month = (month < 10? "0":"")+month;
			
		$("#fullDate").html(today+"-"+month+"-"+year);
		$("#dateBox").html(currentTimeString);
			
	 }
		setInterval('updateClock()', 1000);
</script>
@stop
