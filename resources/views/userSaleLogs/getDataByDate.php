<table class="table table-hover table-bordered table-striped" id="tbl_cgroups">
    <thead>
		<tr>
			<th>ឈ្មោះអ្នកលក់</th>
			<th>ប្រាក់សរុប(៛)</th>
			<th>ប្រាក់សរុប($)</th>
			<th>ថ្ងៃខែឆ្នាំ</th>
			<th>ម៉ោងចូល</th>
			<th>ម៉ោងចេញ</th>
			<!--<th>ម៉ោងចេញក្នុង System</th>-->
			<th>សកម្មភាព</th>
		</tr>
    </thead>
    <tbody>
    	<?php if(count($userSaleLogs) > 0){?>
			<?php foreach($userSaleLogs as $userSaleLog){?>
                <tr>
                    <td><?php echo $userSaleLog->first_name; ?></td>
                    <td><?php echo $userSaleLog->total_kh; ?></td>
                    <td><?php echo $userSaleLog->total_us; ?></td>
                    <td><?php echo $userSaleLog->dates; ?></td>
                    <td><?php echo $userSaleLog->time_in; ?></td>
                    <td><?php echo $userSaleLog->time_out; ?></td>
                    <!--<td><?php echo $userSaleLog->auto_time_out; ?></td>-->
					<td><a href="edit/<?php echo $userSaleLog->id;?>" class="btnedit btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit"></span> Edit</a></td>
                </tr>
            <?php }?>
        <?php }else{?>
        
        <tr class="empty_data"><td colspan="7" style="text-align:center;">គ្នានទិន្ន័យនៅក្នុងតារាងទេ</td></tr>		
        
        <?php }?>
    </tbody>
</table>

