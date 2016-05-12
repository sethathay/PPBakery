<?php if($footer == "no"){?>
<link href="<?php echo  URL::asset('css/bootstrap-3.3.2.css') ;?>" rel="stylesheet">
<?php }?>
<style>
.receipt, .receipt table{
	font-size: 16px !important;
}
.modal-content{
	width:100%;
}
th{	
	text-align: center;
	height: 30px;
	border-width: 1px;
	border-color: #ccc;
    border-style: solid;
	border-left:0px;
	border-right: 0px;
}
td{
	height: 30px;
	border-width: 1px;
	border-color: #ccc;
    border-style: solid;
	border-top: 0px;
	border-left:0px;
	border-right: 0px;
}
.content-body{
	width: 100%;
}
</style>
<div class="modal-content <?php echo ($footer == "no"?"col-md-3":"");?>">
	<div class="content-body modal-dialog modal-sm" <?php echo ($footer == "no"?"style='margin-left:0px;'":"");?>>
		<div class="modal-body receipt" style="text-align: center;">
			<div style="width:35%; float:left;"><img src="<?php echo  URL::asset('img/ppbakery.png') ;?>" alt="Logo" /></div>
			<div style="width:48%; float:left; text-align:center; margin-bottom:20px;">
				<label>ហាងនំបុ័ង ភ្នំពេញ</label><br/>
				<label>PHNOM PHNOM BAKERY</label><br/>
				<label>ទូរស័ព្ទ / Tel : 015 855 755/ 085 855 755</label>
			</div>
			<div style="text-align : center; float:left; width:100%;">
				លេខវិក័យបត្រ / InvID : <label><?php echo $saleOrder->so_code; ?></label><br/>
                
				កាលបរិច្ឆេទ / DateTime : <label><?php echo $saleOrder->created_at; ?></label>
			</div>
			<!--<div style="text-align : center;">
				កាលបរិច្ឆេទ / DateTime : <label><?php echo $saleOrder->created_at; ?></label>
			</div>-->

			<div style="width:90%; margin: 0 auto;">
				<table class="table-hover" style="width:100%">
					<tr style="border-top:1px solid #ccc;">
						<th>កូដ<br/>Code</th>
						<th>ឈ្មោះទំនិញ<br/>Name</th>
						<th>ចំនួន<br/>Qty</th>
						<th>តំលៃ<br/>Price</th>
						<!--<th>ចុះតំលៃ<br/>Discount</th>-->
						<th>សរុប<br/>Total</th>
					</tr>
				<?php $sub_total = 0; ?>
				<?php $total_discount = 0; ?>
				<?php foreach($saleOrderDetail as $saleorderdetail){?>
					<tr>
						<td style="text-align:left;"><?php echo $saleorderdetail->code;?></td>
						<td style="text-align:left;"><?php echo $saleorderdetail->name;?></td>
						<td style="text-align:center;"><?php echo number_format($saleorderdetail->qty);?></td>
						<td style="text-align:right;"><?php echo number_format($saleorderdetail->unit_price);?></td>
						<!--<td style="text-align:right;"><?php echo number_format($saleorderdetail->discount_price_riel);?></td>-->
						<td style="text-align:right;"><?php echo number_format($saleorderdetail->total_price_riel);?></td>
					</tr>
					<?php $sub_total = $sub_total + $saleorderdetail->total_price_riel; ?>
					<?php $total_discount = $total_discount + $saleorderdetail->discount_price_riel; ?>
				<?php }?>
				
					<tr>
						<td colspan="4" style="text-align:right;">សរុប / Total (៛)</td>
						<td colspan="2" style="text-align:right;"><label><?php echo number_format($sub_total); ?></label></td>
					</tr>
					<?php if($saleOrder->discount_riel != ""){?>
					<tr>
						<td colspan="4" style="text-align:right;">ចុះតំលៃ / Discount (៛)</td>
						<td colspan="2" style="text-align:right;"><label><?php echo number_format($saleOrder->discount_riel); ?></label></td>
					</tr>
					<?php }?>
					<?php if($saleOrder->discount_us != ""){?>
					<tr>
						<td colspan="4" style="text-align:right;">ចុះតំលៃ / Discount ($)</td>
						<td colspan="2" style="text-align:right;"><label><?php echo number_format($saleOrder->discount_us); ?></label></td>
					</tr>
					<?php }?>
					<tr>
						<td colspan="4" style="text-align:right;">ប្រាក់បានបង់ / Amount Paid (៛)</td>
						<td colspan="2" style="text-align:right;"><label><?php echo number_format($sub_total-$saleOrder->balance); ?></label></td>
					</tr>
					<?php if($saleOrder->balance != ""){?>
					<tr>
						<td colspan="4" style="text-align:right;">ប្រាក់អាប់  (៛)</td>
						<td colspan="2" style="text-align:right;"><label><?php echo number_format($saleOrder->balance); ?></label></td>
					</tr>
					<?php }?>
				</table>
			</div>
			<div style="width:90%; margin: 10px auto 30px; text-align:center;">
				សូមអរគុណ! អញ្ជើញមកម្តងទៀត៕
			</div>
			<?php if($footer == "yes"){?>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default btn-paid" data-dismiss="modal"><span class="glyphicon glyphicon-print"></span> Paid</button>
				<button type="button" class="btn btn-default btn-dismiss" data-dismiss="modal"><span class="glyphicon glyphicon-close"></span> Close</button>
			  </div>
			<?php }?>
		</div>
		
	</div>
</div>

<?php if($footer == "yes"){?>
<script>

	
	$(document).ready(function(){		
		$(".btn-paid").click(function(){
			var token = "<?php echo csrf_token();?>";
			var sales_order_id = '<?php echo $saleOrder->id; ?>';
			$.ajax({
				type : 'post',
				url : 'pay',
				data : {sales_order_id:sales_order_id, _token:token},
				dataType : 'json',
				success : function(result){
					// return sales_order_id;								
					
					$("#myModalPayment").hide();
					$("#myModalPrint").load('{{ URL::asset("bookers/print")}}/'+result+'/no', '', function(){
						//$("#myModalPrint").modal();
						$(".modal-footer").hide();
						$(".modal-content").css("width","99%");
						w = window.open();
						w.document.write("<div style='width:400px; font-size: 13px;'>"+$("#myModalPrint").html()+"</div>");
						w.print(false);
						w.close();
						window.location = 'index';
					});
					
				}
			});
			
		});
	});
</script>
<?php }?>