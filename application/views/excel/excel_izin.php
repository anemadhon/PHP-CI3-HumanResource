<?php  
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Daftar_Perizinan.xls");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Excel</title>
</head>
<body>
	<h1>HRD & LEGAL GATRANS</h1>
    <h3>DAFTAR SURAT PERIZINAN PT GHITA AVIA TRANS</h3>
    <table border="1">
    	<thead>
            <tr>
                <th>No.</th>
                <th>No. Surat Perizinan</th>
                <th>Perihal</th>
                <th>Instansi</th>
                <th>Tanggal Buat</th>
                <th>Tanggal Akhir</th>
            </tr>
        </thead>
    	<tbody>
    		<?php 
    		$no=1;
    		foreach ($dataadmin['excel']->result() as $excel) {
                if ($excel->tglakhir==date("Y-m-d")) {
                    $akhir = '';
                } else {
                    $akhir = date_format(date_create($excel->tglakhir), "d-m-Y");
                }
    		?>
    		<tr>
    			<td><?php echo $no; ?></td>
                <td><?php echo $excel->noizinpks; ?></td>
    			<td><?php echo $excel->perihal; ?></td>
    			<td><?php echo $excel->instansi; ?></td>
    			<td><?php echo date_format(date_create($excel->tglawal), "d-m-Y"); ?></td>
    			<td><?php echo $akhir; ?></td>
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