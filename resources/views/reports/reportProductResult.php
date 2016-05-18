<table class="table table-hover table-bordered table-striped" id="tbl_expense">
    <thead>
        <tr>
            <th>ឈ្មោះក្រុមទំនិញ</th>
            <th>ឈ្មោះទំនិញ</th>
            <th>ចំនួន</th>
            <th>តំលៃលក់រាយ (៛)</th>
            <th>បញ្ចុះតំលៃ (៛)</th>
            <th>សរុប (៛)</th>
        </tr>
    </thead>
    <tbody>
    	<?php if(count($saleOrderDetail) > 0){?>
        	<?php $category = array(); $i = 1; $total = $totalDiscount = 0; ?>
			<?php foreach($saleOrderDetail as $detail){?>
            	<?php $data = explode("|",$detail->group_amount);?>
            	<?php if(!in_array($detail->pgroup_name,$category)){?>
					<?php $category[] = $detail->pgroup_name;?>
                    <tr><td colspan="7" style="font-size:14px; color:#F00; padding-left:20px; background-color:#E8CC5B;"><b><?php echo ($i++).". ".$detail->pgroup_name; ?></b></td></tr>
                <?php }?>
                <tr>
                    <td></td>
                    <td><?php echo $detail->code." -- ".$detail->pro_name; ?></td>
                    <td style="text-align:center"><?php echo number_format($data[0]); ?></td>
                    <td style="text-align:right"><?php echo number_format($detail->unit_price); ?></td>
                    <td style="text-align:right"><?php echo number_format($data[1]); ?></td>
                    <td style="text-align:right"><?php echo number_format($data[2]); ?></td>
                </tr>
                <?php $total = $total + $data[2]; ?>
                <?php $totalDiscount = $totalDiscount + $data[1]; ?>
            <?php }?>
        		<tr>
                	<td style="text-align:right; font-size:20px; font-weight:bold;" colspan="4">សរុប​ :</td>
                    <td style="text-align:right; font-size:20px; font-weight:bold; color:#F00;"><?php echo number_format($totalDiscount)." ៛";?></td>
                    <td style="text-align:right; font-size:20px; font-weight:bold; color:#F00;"><?php echo number_format($total)." ៛";?></td>
                </tr>
        <?php }else{?>
        
        <tr class="empty_data"><td colspan="8" style="text-align:center;">គ្នានទិន្ន័យនៅក្នុងតារាងទេ</td></tr>		
        
        <?php }?>
    </tbody>
</table>

