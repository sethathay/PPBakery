<table class="table table-hover table-bordered table-striped" id="tbl_expense">
    <thead>
        <tr>
            <th>ឈ្មោះក្រុមចំនាយ</th>
            <th>ខ្នាតក្រុមចំនាយ</th>
            <th>កាលបរិច្ឆេទ</th>
            <th>ចំនួន</th>
            <th>តំលៃ (៛)</th>
            <th>តំលៃ ($)</th>
        </tr>
    </thead>
    <tbody>
    	<?php if(count($services) > 0){?>
        	<?php $totalReil = $totalDollar = 0; ?>
			<?php foreach($services as $service){?>
                <tr>
                    <td><?php echo $service->section_name; ?></td>
                    <td><?php echo $service->expense_uom_name; ?></td>
                    <td><?php echo $service->expense_date; ?></td>
                    <td style="text-align:center"><?php echo $service->qty; ?></td>
                    <td style="text-align:center"><?php echo $service->riel_price; ?></td>
                    <td style="text-align:center"><?php echo $service->dollar_price; ?></td>
                </tr>
                <?php $totalReil = $totalReil + $service->riel_price; ?>
                <?php $totalDollar = $totalDollar + $service->dollar_price; ?>
            <?php }?>
        		<tr class="total_record">
                	<td style="text-align:right; font-size:20px; font-weight:bold;" colspan="4">សរុប​ :</td>
                    <td style="text-align:right; font-size:20px; font-weight:bold; color:#F00;"><?php echo number_format($totalReil)." ៛";?></td>
                    <td style="text-align:right; font-size:20px; font-weight:bold; color:#F00;"><?php echo number_format($totalDollar)." $";?></td>
                </tr>
        <?php }else{?>
        
        <tr class="empty_data"><td colspan="6" style="text-align:center;">គ្នានទិន្ន័យនៅក្នុងតារាងទេ</td></tr>		
        
        <?php }?>
    </tbody>
</table>

