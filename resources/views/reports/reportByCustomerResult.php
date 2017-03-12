<table class="table table-bordered cell-border" id="tbl_expense">
		<thead>
			<tr>
				<th>ឈ្មោះអតិថិជន</th>
				<th>ប្រាក់លក់សរុប (៛)</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<?php foreach($salsOrders as $salsOrder){?>
				<td><?php echo $salsOrder->firstname;?></td>
				<td><?php echo ($salsOrder->riel != null && $salsOrder->riel>0)?number_format($salsOrder->riel):0;?></td>
				<?php } ?>
			</tr>
        </tbody>
	</table>