<style type="text/css">
select{
	height: 40px !important;
}
#default_price{
	color:red;
}
</style>
<div class="table-responsive table-list">
	<div class="col-sm-12 panel-heading">
		<div class="col-sm-7">
			<img src="{{ URL::asset('/img/discount_b.png') }}" /> <label>បញ្ចុះតំលៃ សម្រាប់អតិថិជន</label>
		</div>
		<div class="col-sm-5"
			style="text-align: right; padding: 30px 10px; vertical-align: middle;">
			<button type="submit" class="btn btn-md btn-success btnsave">
				<span class="glyphicon glyphicon-saved"></span> រក្សាទុក
			</button>
			<button onclick="redirectPage('{{ URL::asset('pricingRules/index') }}')" type="button"
				class="btn btn-md btn-danger">
				<span class="glyphicon"></span> ត្រឡប់ក្រោយ
			</button>
		</div>
	</div>
	
	<div class="col-sm-12 form">
		<div class="row">
			<div class="col-sm-12">
				<h4>ពត៍មានបញ្ចុះតំលៃ សម្រាប់អតិថិជន</h4>
			</div>
			<div class="row-form col-sm-6">
				<div class="form-group col-md-12">
					<label for="first_name">ឈ្មោះអតិថិជន<span class="star"> * </span>:</label>
					{!! Form::select('customer_id', [null=>'សូមជ្រើសរើស'] + $customers, null, array('class' => 'form-control', 'id'=>'customer_id','style'=>'width:55%')) !!}
				</div>
				<div class="form-group col-md-12">
					<label for="first_name">ឈ្មោះទំនិញ<span class="star"> * </span>:</label>
					{!! Form::select('product_id', [null=>'សូមជ្រើសរើស'] + $products, null, array('class' => 'form-control', 'id'=>'product_id','style'=>'width:55%')) !!}
				</div>
				<div class="form-group col-md-12">
					<label for="first_name">តំលៃលក់ធម្មតា(៛) :</label>
					<label id="default_price"></label>
				</div>
				<div class="form-group col-md-12">
					<label for="first_name">តំលៃលក់អោយម៉ូយ (៛)<span class="star"> * </span>:</label>
					<div class="input-group" style="width:55%">
						{!! Form::text('amount_kh', null, array('class' => 'form-control', 'placeholder' => 'តំលៃលក់អោយម៉ូយ', 'id'=>'amount_kh')) !!}
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#product_id").change(function(){
			$.ajax({
				type : "post",
				url : "{{ URL::asset('pricingRules/getProductPrice') }}",
				data : {product_id:$(this).val(), _token:"{!! csrf_token() !!}"},
				success : function(result){
					$("#default_price").text(addCommas(result) + "៛");
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
	});
</script>