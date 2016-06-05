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
{!! Form::open(array('url' => 'saleOrders/update', 'method' => 'post', 'class' => 'form-inline', 'role'=>'form', 'id'=>'adminForm', 'data-toggle'=>'validator')) !!}

<div class="table-responsive table-list">
	<div class="col-sm-12 panel-heading">
		<div class="col-sm-5">
			<img src="{{ URL::asset('/img/receipt_b.png') }}" /> <label>វិក័យប័ត្រ មិនទាន់បង់ប្រាក់</label>
		</div>
		<div class="col-sm-7" style="text-align: right; padding: 30px 10px; vertical-align: middle; color:#FFF;">
            <div class="col-sm-12">
            <button type="button"
				class="btnSave btn btn-md btn-primary">
				<span class="glyphicon glyphicon-save"></span> រក្សាទុក
			</button>
			<button onclick="redirectPage('{{ URL::asset('saleOrders/remain') }}')" type="button"
				class="btn btn-md btn-danger">
				<span class="glyphicon"></span> ត្រឡប់ក្រោយ
			</button>
            </div>
		</div>
	</div>
	
	<div class="col-sm-12">
		<div class="row">
			<div class="col-sm-12 info">
				<div class="col-sm-4">
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-12" style="padding:10px 0;">	
    	<div>
        	<label>ឈ្មោះអតិថិជន : {{ $customer->firstname }}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        	<label>លេខទូរស័ព្ទ : {{ $customer->mobile_number }}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        	<label>អស័យដ្ឋាន: {{ $customer->address }}</label>
        </div>
		<div class="table-responsive">
		  <table class="table table-hover header-fixed table-striped">
			<thead>
				<tr>
					<th>ថ្ងៃខែឆ្នាំទិញ</th>
                    <th>លេខកូដវិក័យប័ត្រ</th>
                    <th>បញ្ចុះតំលៃ (៛)</th>
                    <th>បញ្ចុះតំលៃ ($)</th>
                    <th>តំលៃសរុប (៛)</th>
                    <th>តំលៃសរុប ($)</th>
                    <th>ប្រាក់នៅខ្ងះ (៛)</th>
                    <th>បង់ប្រាក់</th>
				</tr>
			</thead>
			<tbody>
				@foreach($saleOrder as $saleOrders)
                <tr>
                	<td>{{ $saleOrders->created_at }}</td>
                	<td>{{ $saleOrders->so_code }}</td>
                	<td>{{ number_format($saleOrders->discount_riel) }}</td>
                	<td>{{ number_format($saleOrders->discount_us,2) }}</td>
                	<td>{{ number_format($saleOrders->total_amount_riel) }}</td>
                	<td>{{ number_format($saleOrders->total_amount_us,2) }}</td>
                	<td>{{ number_format($saleOrders->balance) }}{!! Form::hidden('id[]', $saleOrders->id, array('class'=>'amount', 'style'=>'text-align:center')) !!}</td>
                    <td>{!! Form::text('amount[]', null, array('class'=>'amount', 'style'=>'text-align:center')) !!}</td>
                </tr>
                @endforeach
			</tbody>
		  </table>
		</div>
	</div>		
</div>

<script type="text/javascript">
$(".btnSave").click(function(){
	var options = false;
	$.each($('.amount'),function(key, value){
		if(value.value != ""){
			options = true;
		}
	});
	
	if(options){
		$.ajax({
			type : 'post',
			url : '{{ URL::asset("saleOrders/paidRemain") }}',
			data : $("#adminForm").serialize(),
			dataType : 'json',
			success : function(objResult){	
				if(objResult != ""){
					alert("ទិន្ន័យត្រូវបានរក្សាទុក!!!");
					window.location = '{{ URL::asset("saleOrders/remain") }}';
				}
			}
		});
	}else{
		alert("សូមបញ្ចូលចំនួនទឹកប្រាក់ក្នុងប្រអប់ណាមួយ មុនចុចរក្សាទុក!!!");
	}
});
</script>

@stop
