<?php  
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data_Karyawan.xls");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Excel</title>
    <style>
        .text{
            mso-number-format:"\@";
        }
    </style>
</head>
<body>
	<h1>HRD GATRANS</h1>
    <h3>DATA KARYAWAN PT GHITA AVIA TRANS</h3>
    <table border="1">
    	<thead>
            <tr>
                <th>No.</th>
                <th>ID</th>
                <th>Nama</th>
                <th>Divisi</th>
                <th>Jabatan</th>
                <th>NIK</th>
                <th>NPWP</th>
                <th>Alamat</th>
                <th>TTL</th>
                <th>Tanggal Aktif</th>
                <th>Lama Bekerja</th>
            </tr>
        </thead>
    	<tbody>
    		<?php 
    		$no=1;
            if ($this->input->post('excel', TRUE)=='') {
                foreach ($dataadmin['excel']->result() as $excel) {
                    $tglon = new DateTime($excel->on);
                    $today = new DateTime();
                    $lb = $today->diff($tglon);
                    if ($lb->y==0 && $lb->m==0) {
                        $lamakerja = $lb->d.' Hari';
                    } elseif ($lb->y==0 && $lb->d==0) {
                        $lamakerja = $lb->m.' Bulan ';
                    } elseif ($lb->m==0 && $lb->d==0) {
                        $lamakerja = $lb->y.' Tahun ';
                    } elseif ($lb->y==0) {
                        $lamakerja = $lb->m.' Bulan '.$lb->d.' Hari';
                    } elseif ($lb->m==0) {
                        $lamakerja = $lb->y.' Tahun '.$lb->d.' Hari';
                    } elseif ($lb->d==0) {
                        $lamakerja = $lb->y.' Tahun '.$lb->m.' Bulan ';
                    } else {
                        $lamakerja = $lb->y.' Tahun '.$lb->m.' Bulan '.$lb->d.' Hari';
                    }
            ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td style="mso-number-format:\@;"><?php echo $excel->nik; ?></td>
                        <td><?php echo $excel->nama; ?></td>
                        <td><?php echo $excel->div; ?></td>
                        <td><?php echo $excel->jbtn; ?></td>
                        <td style="mso-number-format:\@;"><?php echo $excel->ktp; ?></td>
                        <td><?php echo $excel->npwp; ?></td>
                        <td><?php echo $excel->alamat; ?></td>
                        <td><?php echo $excel->t.', '.$excel->tl ?></td>
                        <td><?php echo $excel->on; ?></td>
                        <td><?php echo $lamakerja; ?></td>
                    </tr>
            <?php 
                    $no++;
                }
            } else {
                $val = explode('/', $this->input->post('excel', TRUE));
                $excel_arr = array();
                for ($i=0; $i < count($val)-1; $i++) { 
                    $tglon = new DateTime($dataadmin['excel'][$i]['on']);
                    $today = new DateTime();
                    $lb = $today->diff($tglon);
                    if ($lb->y==0 && $lb->m==0) {
                        $lamakerja = $lb->d.' Hari';
                    } elseif ($lb->y==0 && $lb->d==0) {
                        $lamakerja = $lb->m.' Bulan ';
                    } elseif ($lb->m==0 && $lb->d==0) {
                        $lamakerja = $lb->y.' Tahun ';
                    } elseif ($lb->y==0) {
                        $lamakerja = $lb->m.' Bulan '.$lb->d.' Hari';
                    } elseif ($lb->m==0) {
                        $lamakerja = $lb->y.' Tahun '.$lb->d.' Hari';
                    } elseif ($lb->d==0) {
                        $lamakerja = $lb->y.' Tahun '.$lb->m.' Bulan ';
                    } else {
                        $lamakerja = $lb->y.' Tahun '.$lb->m.' Bulan '.$lb->d.' Hari';
                    }
            ?>
                    <tr>
                        <td><?php echo $i+1; ?></td>
                        <td style="mso-number-format:\@;"><?php echo $dataadmin['excel'][$i]['nik']; ?></td>
                        <td><?php echo $dataadmin['excel'][$i]['nama']; ?></td>
                        <td><?php echo $dataadmin['excel'][$i]['div']; ?></td>
                        <td><?php echo $dataadmin['excel'][$i]['jbtn']; ?></td>
                        <td style="mso-number-format:\@;"><?php echo $dataadmin['excel'][$i]['ktp']; ?></td>
                        <td><?php echo $dataadmin['excel'][$i]['npwp']; ?></td>
                        <td><?php echo $dataadmin['excel'][$i]['alamat']; ?></td>
                        <td><?php echo $dataadmin['excel'][$i]['t'].', '.$dataadmin['excel'][$i]['tl']; ?></td>
                        <td><?php echo $dataadmin['excel'][$i]['on']; ?></td>
                        <td><?php echo $lamakerja; ?></td>
                    </tr>
            <?php
                }
            }
    		?>
    	</tbody>
    </table>
    <?php echo 'Printed By : '.$dataadmin['username'].' / '.date("d-m-Y"). ' / '.date("H:i:s") ?>
</body>
</html>