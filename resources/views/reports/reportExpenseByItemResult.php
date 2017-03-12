<table class="table table-hover table-bordered table-striped" id="tbl_expense">
    <thead>
        <tr>
            <th>ឈ្មោះក្រុមចំនាយ</th>
            <th>សរុប​ (៛)</th>
            <th>សរុប​ ($)</th>
        </tr>
    </thead>
    <tbody>
    	<?php if(count($services) > 0){?>
        	<?php $totalReil = $totalDollar = $total = 0; ?>
			<?php foreach($services as $service){?>
                <tr>
                    <td><?php echo $service->section_name; ?></td>
                    <td style="text-align:right"><?php echo number_format($service->riel); ?></td>
                    <td style="text-align:right"><?php echo number_format($service->dollar); ?></td>
                </tr>
                <?php $totalDollar 	= $totalDollar + $service->dollar; ?>
                <?php $totalReil 	= $totalReil + ($service->riel); ?>
            <?php }?>
        		<tr class="total_record">
                	<td style="text-align:right; font-size:20px; font-weight:bold;">សរុប​ :</td>
                    <td style="text-align:right; font-size:20px; font-weight:bold; color:#F00;"><?php echo number_format($totalReil)." ៛";?></td>
                    <td style="text-align:right; font-size:20px; font-weight:bold; color:#F00;"><?php echo number_format($totalDollar)." $";?></td>
                </tr>
        <?php }else{?>
        
        <tr class="empty_data"><td colspan="3" style="text-align:center;">គ្នានទិន្ន័យនៅក្នុងតារាងទេ</td></tr>		
        
        <?php }?>
    </tbody>
</table>

