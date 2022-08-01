<?php  
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Daftar_akta.xls");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Excel</title>
</head>
<body>
	<h1>HRD & LEGAL GATRANS</h1>
    <h3>DAFTAR AKTA PT GHITA AVIA TRANS</h3>
    <table border="1">
    	<thead>
            <tr>
                <th>No.</th>
                <th>No. Legal</th>
                <th>Perihal</th>
                <th>Notaris</th>
                <th>Tanggal Buat</th>
                <th>Tempat Buat</th>
            </tr>
        </thead>
    	<tbody>
    		<?php 
    		$no=1;
    		foreach ($dataadmin['excel']->result() as $excel) {
    		?>
    		<tr>
    			<td><?php echo $no; ?></td>
                <td><?php echo $excel->nolegal; ?></td>
    			<td><?php echo $excel->perihal; ?></td>
    			<td><?php echo $excel->notaris; ?></td>
    			<td><?php echo date_format(date_create($excel->tglbuat), "d-m-Y"); ?></td>
    			<td><?php echo $excel->tmptbuat; ?></td>
    		</tr>
    		<?php 
    		$no++;
    		}
    		?>
    	</tbody>
    </table>
    <?php echo 'Printed By : '.$dataadmin['username'].' / '.date("d-m-Y"). ' / '.date("H:i:s") ?>
</body>
</html>