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
		</tr>
    </thead>
    <tbody>
    	<?php if(count($userSaleLog) > 0){?>
			<?php foreach($userSaleLog as $detail){?>
        	<tr>
				<td><?php echo $detail->u_name; ?></td>
				<td style="text-align:center"><?php echo $detail->dates; ?></td>
				<td style="text-align:center"><?php echo substr($detail->time_in,0,5); ?></td>
				<td style="text-align:center"><?php echo substr($detail->time_out,0,5); ?></td>
				<td style="text-align:right"><?php echo number_format($detail->total_kh); ?></td>
				<td style="text-align:right"><?php echo number_format($detail->total_us); ?></td>
				<td style="text-align:right"><?php echo number_format($detail->sy_total); ?></td>
			</tr>
			<?php }?>
        <?php }else{?>
        
        <tr class="empty_data"><td colspan="7" style="text-align:center;">គ្នានទិន្ន័យនៅក្នុងតារាងទេ</td></tr>		
        
        <?php }?>
    </tbody>
</table>

