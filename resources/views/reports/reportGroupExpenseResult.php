<table class="table table-bordered cell-border" id="tbl_expense">
		<thead>
			<tr>
				<?php
					$arrSectionGroup = array();
					foreach($sectionGroups as $sectionGroup){
					$arrSectionGroup[] = $sectionGroup->id;
				?>
				<th colspan="2"><?php echo $sectionGroup->name; ?></th>
				<?php }?>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="td-header">៛</td>
				<td class="td-header">$</td>
				<td class="td-header">៛</td>
				<td class="td-header">$</td>
				<td class="td-header">៛</td>
				<td class="td-header">$</td>
			</tr>
			<tr>
				<?php foreach($services as $service){?>
				<td><?php echo ($service->riel != null && $service->riel>0)?number_format($service->riel):0;?></td>
				<td><?php echo ($service->dollar != null && $service->dollar>0)?number_format($service->dollar,3):0;?></td>
				<?php } ?>
			</tr>
			<tr class="empty_data"><td colspan="6" style="text-align:center;">គ្នានទិន្ន័យនៅក្នុងតារាងទេ</td></tr>
        </tbody>
	</table>