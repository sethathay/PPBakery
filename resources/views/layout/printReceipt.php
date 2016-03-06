<link href="<?php echo  URL::asset('css/bootstrap-3.3.2.css') ;?>" rel="stylesheet">
<style>
.receipt, .receipt table{
	font-size: 10px !important;
}
</style>
<div class="modal-content">
	<div class="modal-dialog modal-sm">
		<div class="modal-body receipt" style="text-align: center">
			<label>ហាងនំបុ័ង ភ្នំពេញ</label><br/>
			<label>PHNOM PHNOM BAKERY</label>
			<div>
				Tel: 015 855 755
			</div>
			<div style="text-align : left;">
				លេខវិក័យបត្រ : <label><?php echo $saleOrder->so_code; ?></label>
			</div>
			<div style="text-align : left;">
				កាលបរិច្ឆេទ : <label><?php echo date("d/m/Y")." ". date("H:i:s"); ?></label>
			</div>

			<div>
				<table class="table table-hover">
					<tr>
						<th>កូដទំនិញ</th>
						<th>ឈ្មោះទំនិញ</th>
						<th>ចំនួន</th>
						<th>តំលៃ</th>
						<th>ចុះតំលៃ</th>
						<th>សរុប</th>
					</tr>
				<?php $sub_total = 0; ?>
				<?php $total_discount = 0; ?>
				<?php foreach($saleOrderDetail as $saleorderdetail){?>
					<tr>
						<td style="text-align:left;"><?php echo $saleorderdetail->code;?></td>
						<td style="text-align:left;"><?php echo $saleorderdetail->name;?></td>
						<td style="text-align:center;"><?php echo number_format($saleorderdetail->qty);?></td>
						<td style="text-align:right;"><?php echo number_format($saleorderdetail->unit_price);?></td>
						<td style="text-align:right;"><?php echo number_format($saleorderdetail->discount_price_riel);?></td>
						<td style="text-align:right;"><?php echo number_format($saleorderdetail->total_price_riel);?></td>
					</tr>
					<?php $sub_total = $sub_total + $saleorderdetail->total_price_riel; ?>
					<?php $total_discount = $total_discount + $saleorderdetail->discount_price_riel; ?>
				<?php }?>
				
					<tr>
						<td colspan="4" style="text-align:right;">តំលៃសរុបត្រូវបង់ (R)</td>
						<td colspan="2" style="text-align:right;"><label><?php echo number_format($sub_total); ?></label></td>
					</tr>
					<tr>
						<td colspan="4" style="text-align:right;">ចុះតំលៃ (R)</td>
						<td colspan="2" style="text-align:right;"><label><?php echo number_format($saleOrder->discount_riel); ?></label></td>
					</tr>
					<tr>
						<td colspan="4" style="text-align:right;">ចុះតំលៃ ($)</td>
						<td colspan="2" style="text-align:right;"><label><?php echo number_format($saleOrder->discount_us); ?></label></td>
					</tr>
					<tr>
						<td colspan="4" style="text-align:right;">ប្រាក់បង់រួច (R)</td>
						<td colspan="2" style="text-align:right;"><label><?php echo number_format($sub_total); ?></label></td>
					</tr>
				</table>
			</div>
			
		</div>
		
	</div>
</div>