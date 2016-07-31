<table class="table table-hover table-bordered table-striped" id="tbl_expense">
    <thead>
		<tr>
			<th>អ្នកប្រើប្រាស់</th>
			<th>ថ្ងៃខែឆ្នាំ</th>
			<th>ម់ោងចូល</th>
			<th>ម់ោងចេញ</th>
			<th>ចំនួនបញ្ចូលសរុប (៛)</th>
			<th>ចំនួនបញ្ចូលសរុប ($)</th>
			<th>ចំនួនសរុប System (៛)</th>
			<th>Cashier Vs System (៛)</th>
		</tr>
    </thead>
    <tbody>
    	<?php if(count($userSaleLog) > 0){?>
			<?php $total_kh = $total_us = $sy_total = $balances = 0; ?>
			<?php foreach($userSaleLog as $detail){?>
			<?php $balance = ($detail->total_kh+($detail->total_us*$exchangerate->riel))-$detail->sy_total;?>
			<?php
				$total_kh = $detail->total_kh + $total_kh;
				$total_us = $detail->total_us + $total_us;
				$sy_total = $detail->sy_total + $sy_total;
				$balances  = $balance + $balances;
			?>
        	<tr>
				<td><?php echo $detail->u_name; ?></td>
				<td style="text-align:center"><?php echo $detail->dates; ?></td>
				<td style="text-align:center"><?php echo substr($detail->time_in,0,5); ?></td>
				<td style="text-align:center"><?php echo substr($detail->time_out,0,5); ?></td>
				<td style="text-align:right"><?php echo number_format($detail->total_kh); ?></td>
				<td style="text-align:right"><?php echo number_format($detail->total_us); ?></td>
				<td style="text-align:right"><?php echo number_format($detail->sy_total); ?></td>
				<td style="text-align:right; color:<?php echo ($balance>0)?'blue':'red';?>"><?php echo number_format($balance); ?></td>
			</tr>
			<?php }?>
			<tr>
				<td style="text-align:right; font-weight:bold;" colspan="4">សរុប</td>
				<td style="text-align:right; font-weight:bold;"><?php echo number_format($total_kh);?></td>
				<td style="text-align:right; font-weight:bold;"><?php echo number_format($total_us);?></td>
				<td style="text-align:right; font-weight:bold;"><?php echo number_format($sy_total);?></td>
				<td style="text-align:right; font-weight:bold;"><?php echo number_format($totalSale->totalSale);?></td>
			</tr>
        <?php }else{?>
        
        <tr class="empty_data"><td colspan="8" style="text-align:center;">គ្នានទិន្ន័យនៅក្នុងតារាងទេ</td></tr>		
        
        <?php }?>
    </tbody>
</table>

