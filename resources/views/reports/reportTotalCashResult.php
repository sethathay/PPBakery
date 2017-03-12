<table class="table table-bordered cell-border" id="tbl_expense">
		<thead>
			<tr>
				<th colspan="2">សាច់ប្រាក់សរុបបញ្ចូលដោយ Cashier​(1)</th>
				<th colspan="2">ចំនាយសរុប(ទូទៅ, ទឹកឡាន, ខ្ចីលុយ) (2)</th>
				<th colspan="2">សាច់ប្រាក់សរុបពីការទូទាត់ (1) - (2)</th>
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
				<td><?php echo ($totalUserInput->total_kh != null && $totalUserInput->total_kh>0)?number_format($totalUserInput->total_kh):0;?></td>
				<td><?php echo ($totalUserInput->total_us != null && $totalUserInput->total_us>0)?number_format($totalUserInput->total_us,3):0;?></td>
				<td><?php echo ($services->riel != null && $services->riel>0)?number_format($services->riel):0;?></td>
				<td><?php echo ($services->dollar != null && $services->dollar>0)?number_format($services->dollar,3):0;?></td>
				<td><?php echo number_format($totalUserInput->total_kh - $services->riel);?></td>
				<td><?php echo number_format($totalUserInput->total_us-$services->dollar,3);?></td>
			</tr>
        </tbody>
	</table>