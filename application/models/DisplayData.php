<?php
class DisplayData extends CI_Model{
	
	public function __construct(){
		$this->load->database();
	}

	public function hbd(){

		$this->db->select('hrddatadiri.namadiri as nama, hrddatadiri.tmptlahir as t, hrddatadiri.tgllahir as tl, hrddatapt.jbtn as jbtn, hrdattach.fotopath as fotolink, DATE_SUB(tgllahir, INTERVAL 14 DAY) AS tlnotif');
		$this->db->from('hrddatadiri');
		$this->db->join('hrddatapt', 'hrddatadiri.noktp = hrddatapt.noktp AND hrddatadiri.pcip = hrddatapt.pcip','inner');
		$this->db->join('hrdattach', 'hrddatadiri.noktp = hrdattach.noktp AND hrddatadiri.pcip = hrdattach.pcip','inner');
		$this->db->where('hrddatadiri.dlt',0);
		$this->db->where(("hrddatapt.statuspt != 'SK6'"));
		$this->db->where(("MONTH(hrddatadiri.tgllahir) = '".date('m')."' "));
		$this->db->order_by('hrddatadiri.tgllahir ASC');

		return $this->db->get();
	}

	public function showData($number,$offset){

		$this->db->select('hrddatadiri.namadiri as nama, hrddatadiri.noktp as ktp, hrddatadiri.tmptlahir as t, hrddatadiri.tgllahir as tl, hrddatadiri.noktp as ktp, hrddatadiri.agama as agama, hrddatadiri.jeka as jk, hrddatadiri.tlpon as tlp, hrddatadiri.tlpkel as tlpkel, hrddatadiri.namaibu as ibu, hrddatadiri.alamat as alamat, hrddatadiri.alamatrmh as domisili, hrddatadiri.nikah as nikah, hrddatadiri.pendidikan as ilmu, hrddatadiri.medsos as medsos, TIMESTAMPDIFF(YEAR, hrddatadiri.tgllahir, CURDATE()) AS umur, hrddatapt.nikpt as nik, hrddatapt.npwp as npwp, hrddatapt.divisi as div, hrddatapt.jbtn as jbtn, hrddatapt.statuspt as status, hrddatapt.norekpt as rek, hrddatapt.masali as lisensi, hrddatapt.tglon as on, hrddatapt.tgloff as off, hrdattach.fotopath as fotolink, hrdattach.ktppath as ktplink, hrdattach.kkpath as kklink, hrdattach.skckpath as skcklink, hrdattach.npwppath as npwplink, hrdattach.ijazpath as ijazlink, hrdattach.sertipath as sertilink, hrdattach.lisenpath as lisenlink, hrdattach.srtnaikpath as naiklink, hrdattach.sppath as splink, hrdattach.srtoutpath as outlink, hrdattach.faktapath as faktalink, hrdattach.sehatpath as sehatlink, hrdattach.larangpath as laranglink, hrdattach.refpath as reflink, hrdattach.terimapath as terimalink');
		$this->db->from('hrddatadiri');
		$this->db->join('hrddatapt', 'hrddatadiri.noktp = hrddatapt.noktp AND hrddatadiri.pcip = hrddatapt.pcip','inner');
		$this->db->join('hrdattach', 'hrddatadiri.noktp = hrdattach.noktp AND hrddatadiri.pcip = hrdattach.pcip','inner');
		$this->db->where('hrddatadiri.dlt',0);
		$this->db->where(("hrddatapt.statuspt != 'SK2' AND hrddatapt.statuspt != 'SK3' AND hrddatapt.statuspt != 'SK6'"));
		$this->db->order_by('hrddatadiri.iddiri ASC');
		$this->db->limit($number,$offset);

		return $this->db->get();
	}

	public function showJmlData(){

		$this->db->select('hrddatadiri.namadiri as nama, hrddatadiri.noktp as ktp, hrddatadiri.tmptlahir as t, hrddatadiri.tgllahir as tl, hrddatadiri.noktp as ktp, hrddatadiri.agama as agama, hrddatadiri.jeka as jk, hrddatadiri.tlpon as tlp, hrddatadiri.tlpkel as tlpkel, hrddatadiri.namaibu as ibu, hrddatadiri.alamat as alamat, hrddatadiri.alamatrmh as domisili, hrddatadiri.nikah as nikah, hrddatadiri.pendidikan as ilmu, hrddatadiri.medsos as medsos, hrddatapt.nikpt as nik, hrddatapt.npwp as npwp, hrddatapt.divisi as div, hrddatapt.jbtn as jbtn, hrddatapt.statuspt as status, hrddatapt.norekpt as rek, hrddatapt.masali as lisensi, hrddatapt.tglon as on, hrddatapt.tgloff as off, hrdattach.fotopath as fotolink, hrdattach.ktppath as ktplink, hrdattach.kkpath as kklink, hrdattach.skckpath as skcklink, hrdattach.npwppath as npwplink, hrdattach.ijazpath as ijazlink, hrdattach.sertipath as sertilink, hrdattach.lisenpath as lisenlink, hrdattach.srtnaikpath as naiklink, hrdattach.sppath as splink, hrdattach.srtoutpath as outlink, hrdattach.faktapath as faktalink, hrdattach.sehatpath as sehatlink, hrdattach.larangpath as laranglink, hrdattach.refpath as reflink, hrdattach.terimapath as terimalink');
		$this->db->from('hrddatadiri');
		$this->db->join('hrddatapt', 'hrddatadiri.noktp = hrddatapt.noktp AND hrddatadiri.pcip = hrddatapt.pcip','inner');
		$this->db->join('hrdattach', 'hrddatadiri.noktp = hrdattach.noktp AND hrddatadiri.pcip = hrdattach.pcip','inner');
		$this->db->where('hrddatadiri.dlt',0);
		$this->db->where(("hrddatapt.statuspt != 'SK2' AND hrddatapt.statuspt != 'SK3' AND hrddatapt.statuspt != 'SK6'"));
		$this->db->order_by('hrddatadiri.iddiri ASC');

		return $this->db->get()->num_rows();
	}

	public function findData($key){

		$this->db->select('hrddatadiri.namadiri as nama, hrddatadiri.noktp as ktp, hrddatadiri.tmptlahir as t, hrddatadiri.tgllahir as tl, hrddatadiri.noktp as ktp, hrddatadiri.agama as agama, hrddatadiri.jeka as jk, hrddatadiri.tlpon as tlp, hrddatadiri.tlpkel as tlpkel, hrddatadiri.namaibu as ibu, hrddatadiri.alamat as alamat, hrddatadiri.alamatrmh as domisili, hrddatadiri.nikah as nikah, hrddatadiri.pendidikan as ilmu, hrddatadiri.medsos as medsos, TIMESTAMPDIFF(YEAR, hrddatadiri.tgllahir, CURDATE()) AS umur, hrddatapt.nikpt as nik, hrddatapt.npwp as npwp, hrddatapt.divisi as div, hrddatapt.jbtn as jbtn, hrddatapt.statuspt as status, hrddatapt.norekpt as rek, hrddatapt.masali as lisensi, hrddatapt.tglon as on, hrddatapt.tgloff as off, hrdattach.fotopath as fotolink, hrdattach.ktppath as ktplink, hrdattach.kkpath as kklink, hrdattach.skckpath as skcklink, hrdattach.npwppath as npwplink, hrdattach.ijazpath as ijazlink, hrdattach.sertipath as sertilink, hrdattach.lisenpath as lisenlink, hrdattach.srtnaikpath as naiklink, hrdattach.sppath as splink, hrdattach.srtoutpath as outlink, hrdattach.faktapath as faktalink, hrdattach.sehatpath as sehatlink, hrdattach.larangpath as laranglink, hrdattach.refpath as reflink, hrdattach.terimapath as terimalink');
		$this->db->from('hrddatadiri');
		$this->db->join('hrddatapt', 'hrddatadiri.noktp = hrddatapt.noktp AND hrddatadiri.pcip = hrddatapt.pcip','inner');
		$this->db->join('hrdattach', 'hrddatadiri.noktp = hrdattach.noktp AND hrddatadiri.pcip = hrdattach.pcip','inner');
		if ($key['key']=='' && $key['urut']=='') {
			$this->db->where('hrddatadiri.dlt',0);
			$this->db->where(("hrddatapt.statuspt != 'SK2' AND hrddatapt.statuspt != 'SK3' AND hrddatapt.statuspt != 'SK6'"));
			return $this->db->get();
		} elseif ($key['key']=='') {
			if ($key['urut']=='20') {
				$this->db->where('hrddatadiri.dlt',0);
				$this->db->where(("hrddatapt.statuspt != 'SK2' AND hrddatapt.statuspt != 'SK3' AND hrddatapt.statuspt != 'SK6'"));
				$this->db->having('umur < 20');
				return $this->db->get();
			} elseif ($key['urut']=='50') {
				$this->db->where('hrddatadiri.dlt',0);
				$this->db->where(("hrddatapt.statuspt != 'SK2' AND hrddatapt.statuspt != 'SK3' AND hrddatapt.statuspt != 'SK6'"));
				$this->db->having('umur > 50');
				return $this->db->get();
			} elseif ($key['urut']=='2030') {
				$this->db->where('hrddatadiri.dlt',0);
				$this->db->where(("hrddatapt.statuspt != 'SK2' AND hrddatapt.statuspt != 'SK3' AND hrddatapt.statuspt != 'SK6'"));
				$this->db->having('umur BETWEEN 20 AND 30');
				return $this->db->get();
			} elseif ($key['urut']=='3040') {
				$this->db->where('hrddatadiri.dlt',0);
				$this->db->where(("hrddatapt.statuspt != 'SK2' AND hrddatapt.statuspt != 'SK3' AND hrddatapt.statuspt != 'SK6'"));
				$this->db->having('umur BETWEEN 30 AND 40');
				return $this->db->get();
			} elseif ($key['urut']=='4050') {
				$this->db->where('hrddatadiri.dlt',0);
				$this->db->where(("hrddatapt.statuspt != 'SK2' AND hrddatapt.statuspt != 'SK3' AND hrddatapt.statuspt != 'SK6'"));
				$this->db->having('umur BETWEEN 40 AND 50');
				return $this->db->get();
				$this->db->where('hrddatadiri.dlt',0);
			} elseif ($key['urut']=='namadiri' || $key['urut']=='pendidikan') {
				$this->db->where(("hrddatapt.statuspt != 'SK2' AND hrddatapt.statuspt != 'SK3' AND hrddatapt.statuspt != 'SK6'"));
				$this->db->order_by('hrddatadiri.'.$key['urut'].' ASC');
				return $this->db->get();
			} else {
				$this->db->where('hrddatadiri.dlt',0);
				$this->db->where(("hrddatapt.statuspt != 'SK2' AND hrddatapt.statuspt != 'SK3' AND hrddatapt.statuspt != 'SK6'"));
				$this->db->order_by('hrddatapt.'.$key['urut'].' ASC');
				return $this->db->get();
			}
		} elseif ($key['urut']=='') {
			if ($key['key']=='tidak aktif') {
				$this->db->where('hrddatadiri.dlt',0);
				$this->db->like('hrddatapt.statuspt', 'SK2');
				$this->db->where('hrddatadiri.dlt',0);
				$this->db->or_like('hrddatapt.statuspt', 'SK3');
				$this->db->where('hrddatadiri.dlt',0);
				$this->db->or_like('hrddatapt.statuspt', 'SK6');
				$this->db->where('hrddatadiri.dlt',0);
				return $this->db->get();
			} elseif ($key['key']=='SMA/K') {
				$this->db->where('hrddatadiri.dlt',0);
				$this->db->where(("hrddatapt.statuspt != 'SK2' AND hrddatapt.statuspt != 'SK3' AND hrddatapt.statuspt != 'SK6'"));
				$this->db->like('hrddatadiri.pendidikan', $this->db->escape_like_str($key['key']));
				$this->db->where('hrddatadiri.dlt',0);
				$this->db->where(("hrddatapt.statuspt != 'SK2' AND hrddatapt.statuspt != 'SK3' AND hrddatapt.statuspt != 'SK6'"));
				return $this->db->get();
			} else {
				$this->db->where('hrddatadiri.dlt',0);
				$this->db->where(("hrddatapt.statuspt != 'SK2' AND hrddatapt.statuspt != 'SK3' AND hrddatapt.statuspt != 'SK6'"));
				$this->db->like('hrddatadiri.namadiri', $this->db->escape_like_str($key['key']));
				$this->db->where('hrddatadiri.dlt',0);
				$this->db->where(("hrddatapt.statuspt != 'SK2' AND hrddatapt.statuspt != 'SK3' AND hrddatapt.statuspt != 'SK6'"));
				$this->db->or_like('hrddatadiri.pendidikan', $this->db->escape_like_str($key['key']));
				$this->db->where('hrddatadiri.dlt',0);
				$this->db->where(("hrddatapt.statuspt != 'SK2' AND hrddatapt.statuspt != 'SK3' AND hrddatapt.statuspt != 'SK6'"));
				$this->db->or_like('hrddatapt.jbtn', $this->db->escape_like_str($key['key']));
				$this->db->where('hrddatadiri.dlt',0);
				$this->db->where(("hrddatapt.statuspt != 'SK2' AND hrddatapt.statuspt != 'SK3' AND hrddatapt.statuspt != 'SK6'"));
				$this->db->or_like('hrddatapt.divisi', $this->db->escape_like_str($key['key']));
				$this->db->where('hrddatadiri.dlt',0);
				$this->db->where(("hrddatapt.statuspt != 'SK2' AND hrddatapt.statuspt != 'SK3' AND hrddatapt.statuspt != 'SK6'"));
				$this->db->or_like('hrddatapt.statuspt', $this->db->escape_like_str($key['key']));
				$this->db->where('hrddatadiri.dlt',0);
				$this->db->where(("hrddatapt.statuspt != 'SK2' AND hrddatapt.statuspt != 'SK3' AND hrddatapt.statuspt != 'SK6'"));
				return $this->db->get();
			}
		} else {
			if ($key['key']=='tidak aktif') {
				$this->db->where('hrddatadiri.dlt',0);
				$this->db->like('hrddatapt.statuspt', 'SK2');
				$this->db->where('hrddatadiri.dlt',0);
				$this->db->or_like('hrddatapt.statuspt', 'SK3');
				$this->db->where('hrddatadiri.dlt',0);
				$this->db->or_like('hrddatapt.statuspt', 'SK6');
				$this->db->where('hrddatadiri.dlt',0);
			} elseif ($key['key']=='SMA/K') {
				$this->db->where('hrddatadiri.dlt',0);
				$this->db->where(("hrddatapt.statuspt != 'SK2' AND hrddatapt.statuspt != 'SK3' AND hrddatapt.statuspt != 'SK6'"));
				$this->db->like('hrddatadiri.pendidikan', $this->db->escape_like_str($key['key']));
				$this->db->where('hrddatadiri.dlt',0);
				$this->db->where(("hrddatapt.statuspt != 'SK2' AND hrddatapt.statuspt != 'SK3' AND hrddatapt.statuspt != 'SK6'"));
			} else {
				$this->db->where('hrddatadiri.dlt',0);
				$this->db->where(("hrddatapt.statuspt != 'SK2' AND hrddatapt.statuspt != 'SK3' AND hrddatapt.statuspt != 'SK6'"));
				$this->db->like('hrddatadiri.namadiri', $this->db->escape_like_str($key['key']));
				$this->db->where('hrddatadiri.dlt',0);
				$this->db->where(("hrddatapt.statuspt != 'SK2' AND hrddatapt.statuspt != 'SK3' AND hrddatapt.statuspt != 'SK6'"));
				$this->db->or_like('hrddatadiri.pendidikan', $this->db->escape_like_str($key['key']));
				$this->db->where('hrddatadiri.dlt',0);
				$this->db->where(("hrddatapt.statuspt != 'SK2' AND hrddatapt.statuspt != 'SK3' AND hrddatapt.statuspt != 'SK6'"));
				$this->db->or_like('hrddatapt.jbtn', $this->db->escape_like_str($key['key']));
				$this->db->where('hrddatadiri.dlt',0);
				$this->db->where(("hrddatapt.statuspt != 'SK2' AND hrddatapt.statuspt != 'SK3' AND hrddatapt.statuspt != 'SK6'"));
				$this->db->or_like('hrddatapt.divisi', $this->db->escape_like_str($key['key']));
				$this->db->where('hrddatadiri.dlt',0);
				$this->db->where(("hrddatapt.statuspt != 'SK2' AND hrddatapt.statuspt != 'SK3' AND hrddatapt.statuspt != 'SK6'"));
				$this->db->or_like('hrddatapt.statuspt', $this->db->escape_like_str($key['key']));
				$this->db->where('hrddatadiri.dlt',0);
				$this->db->where(("hrddatapt.statuspt != 'SK2' AND hrddatapt.statuspt != 'SK3' AND hrddatapt.statuspt != 'SK6'"));
			}
			if ($key['urut']=='20') {
				$this->db->having('umur < 20');
				return $this->db->get();
			} elseif ($key['urut']=='50') {
				$this->db->having('umur > 50');
				return $this->db->get();
			} elseif ($key['urut']=='2030') {
				$this->db->having('umur BETWEEN 20 AND 30');
				return $this->db->get();
			} elseif ($key['urut']=='3040') {
				$this->db->having('umur BETWEEN 30 AND 40');
				return $this->db->get();
			} elseif ($key['urut']=='4050') {
				$this->db->having('umur BETWEEN 40 AND 50');
				return $this->db->get();
			} elseif ($key['urut']=='namadiri' || $key['urut']=='pendidikan') {
				$this->db->order_by('hrddatadiri.'.$key['urut'].' ASC');
				return $this->db->get();
			} else {
				$this->db->order_by('hrddatapt.'.$key['urut'].' ASC');
				return $this->db->get();
			}
		}
	}

	public function upData($ktp){

		$this->db->select('hrddatadiri.iddiri as id, hrddatadiri.namadiri as nama, hrddatadiri.noktp as ktp, hrddatadiri.tmptlahir as t, hrddatadiri.tgllahir as tl, hrddatadiri.noktp as ktp, hrddatadiri.agama as agama, hrddatadiri.jeka as jk, hrddatadiri.tlpon as tlp, hrddatadiri.tlpkel as tlpkel, hrddatadiri.namaibu as ibu, hrddatadiri.alamat as alamat, hrddatadiri.alamatrmh as domisili, hrddatadiri.nikah as nikah, hrddatadiri.pendidikan as ilmu, hrddatadiri.medsos as medsos, hrddatapt.nikpt as nik, hrddatapt.npwp as npwp, hrddatapt.divisi as div, hrddatapt.jbtn as jbtn, hrddatapt.statuspt as status, hrddatapt.norekpt as rek, hrddatapt.masali as lisensi, hrddatapt.tglon as on, hrddatapt.tgloff as off, hrddatapt.expidcard as expidcard, hrdattach.fotopath as fotolink, hrdattach.ktppath as ktplink, hrdattach.kkpath as kklink, hrdattach.skckpath as skcklink, hrdattach.npwppath as npwplink, hrdattach.ijazpath as ijazlink, hrdattach.sertipath as sertilink, hrdattach.lisenpath as lisenlink, hrdattach.srtnaikpath as naiklink, hrdattach.sppath as splink, hrdattach.srtoutpath as outlink, hrdattach.faktapath as faktalink, hrddatadiri.userinput as user, hrdattach.sehatpath as sehatlink, hrdattach.larangpath as laranglink, hrdattach.refpath as reflink, hrdattach.terimapath as terimalink');
		$this->db->from('hrddatadiri');
		$this->db->join('hrddatapt', 'hrddatadiri.noktp = hrddatapt.noktp AND hrddatadiri.pcip = hrddatapt.pcip');
		$this->db->join('hrdattach', 'hrddatadiri.noktp = hrdattach.noktp AND hrddatadiri.pcip = hrdattach.pcip');
		$this->db->where('hrddatadiri.noktp', $this->db->escape_like_str($ktp));

		return $this->db->get()->row_array();
	}

	public function statusData($ktp){

		$this->db->select('tgloff, tglawal, tglakhir');
		$this->db->from('hrdstatus');
		$this->db->where('nikstatus', $this->db->escape_like_str($ktp));

		return $this->db->get()->row_array();
	}

	public function cetak($ktp){

		$this->db->select('hrddatadiri.namadiri as nama, hrddatadiri.noktp as ktp, hrddatadiri.tmptlahir as t, hrddatadiri.tgllahir as tl, hrddatadiri.noktp as ktp, hrddatadiri.agama as agama, hrddatadiri.jeka as jk, hrddatadiri.tlpon as tlp, hrddatadiri.tlpkel as tlpkel, hrddatadiri.namaibu as ibu, hrddatadiri.alamat as alamat, hrddatadiri.alamatrmh as domisili, hrddatadiri.nikah as nikah, hrddatadiri.pendidikan as ilmu, hrddatadiri.medsos as medsos, TIMESTAMPDIFF(YEAR, hrddatadiri.tgllahir, CURDATE()) AS umur, hrddatapt.nikpt as nik, hrddatapt.npwp as npwp, hrddatapt.divisi as div, hrddatapt.jbtn as jbtn, hrddatapt.statuspt as status, hrddatapt.norekpt as rek, hrddatapt.masali as lisensi, hrddatapt.tglon as on, hrddatapt.tgloff as off, hrdattach.fotopath as fotolink, hrdattach.ktppath as ktplink, hrdattach.kkpath as kklink, hrdattach.skckpath as skcklink, hrdattach.npwppath as npwplink, hrdattach.ijazpath as ijazlink, hrdattach.sertipath as sertilink, hrdattach.lisenpath as lisenlink, hrdattach.srtnaikpath as naiklink, hrdattach.sppath as splink, hrdattach.srtoutpath as outlink, hrdattach.faktapath as faktalink, hrdattach.sehatpath as sehatlink, hrdattach.larangpath as laranglink, hrdattach.refpath as reflink, hrdattach.terimapath as terimalink');
		$this->db->from('hrddatadiri');
		$this->db->join('hrddatapt', 'hrddatadiri.noktp = hrddatapt.noktp AND hrddatadiri.pcip = hrddatapt.pcip');
		$this->db->join('hrdattach', 'hrddatadiri.noktp = hrdattach.noktp AND hrddatadiri.pcip = hrdattach.pcip');
		$this->db->where('hrddatadiri.noktp', $this->db->escape_like_str($ktp));

		return $this->db->get();
	}

	public function cetakpdfall(){

		$this->db->select('hrddatadiri.namadiri as nama, hrddatadiri.noktp as ktp, hrddatadiri.tmptlahir as t, hrddatadiri.tgllahir as tl, hrddatadiri.noktp as ktp, hrddatadiri.agama as agama, hrddatadiri.jeka as jk, hrddatadiri.tlpon as tlp, hrddatadiri.tlpkel as tlpkel, hrddatadiri.namaibu as ibu, hrddatadiri.alamat as alamat, hrddatadiri.alamatrmh as domisili, hrddatadiri.nikah as nikah, hrddatadiri.pendidikan as ilmu, hrddatadiri.medsos as medsos, TIMESTAMPDIFF(YEAR, hrddatadiri.tgllahir, CURDATE()) AS umur, hrddatapt.nikpt as nik, hrddatapt.npwp as npwp, hrddatapt.divisi as div, hrddatapt.jbtn as jbtn, hrddatapt.statuspt as status, hrddatapt.norekpt as rek, hrddatapt.masali as lisensi, hrddatapt.tglon as on, hrddatapt.tgloff as off, hrdattach.fotopath as fotolink, hrdattach.ktppath as ktplink, hrdattach.kkpath as kklink, hrdattach.skckpath as skcklink, hrdattach.npwppath as npwplink, hrdattach.ijazpath as ijazlink, hrdattach.sertipath as sertilink, hrdattach.lisenpath as lisenlink, hrdattach.srtnaikpath as naiklink, hrdattach.sppath as splink, hrdattach.srtoutpath as outlink, hrdattach.faktapath as faktalink, hrdattach.sehatpath as sehatlink, hrdattach.larangpath as laranglink, hrdattach.refpath as reflink, hrdattach.terimapath as terimalink');
		$this->db->from('hrddatadiri');
		$this->db->join('hrddatapt', 'hrddatadiri.noktp = hrddatapt.noktp AND hrddatadiri.pcip = hrddatapt.pcip');
		$this->db->join('hrdattach', 'hrddatadiri.noktp = hrdattach.noktp AND hrddatadiri.pcip = hrdattach.pcip');
		$this->db->where('hrddatadiri.dlt',0);
		$this->db->where(("hrddatapt.statuspt != 'SK2' AND hrddatapt.statuspt != 'SK3' AND hrddatapt.statuspt != 'SK6'"));
		$this->db->order_by('hrddatadiri.iddiri ASC');

		return $this->db->get();
	}

	public function rekam($ktp){

		$this->db->select('hrddatadiri.namadiri as nama, hrddatadiri.noktp as ktp, hrddatadiri.tmptlahir as t, hrddatadiri.tgllahir as tl, hrddatadiri.noktp as ktp, hrddatadiri.agama as agama, hrddatadiri.jeka as jk, hrddatadiri.tlpon as tlp, hrddatadiri.tlpkel as tlpkel, hrddatadiri.namaibu as ibu, hrddatadiri.alamat as alamat, hrddatadiri.alamatrmh as domisili, hrddatadiri.nikah as nikah, hrddatadiri.pendidikan as ilmu, hrddatadiri.medsos as medsos, hrddatapt.nikpt as nik, hrddatapt.npwp as npwp, hrddatapt.divisi as div, hrddatapt.jbtn as jbtn, hrddatapt.statuspt as status, hrddatapt.norekpt as rek, hrddatapt.masali as lisensi, hrddatapt.tglon as on, hrddatapt.tgloff as off, hrdhistory.divisihis as divhis, hrdhistory.jbtnhis as jbtnhis, hrdhistory.statushis as statushis, hrdhistory.tglonhis as onhis, hrdhistory.tgloffhis as offhis');
		$this->db->from('hrddatadiri');
		$this->db->join('hrddatapt', 'hrddatadiri.noktp = hrddatapt.noktp AND hrddatadiri.pcip = hrddatapt.pcip');
		$this->db->join('hrdhistory', 'hrddatadiri.noktp = hrdhistory.ktphis');
		$this->db->where('hrddatadiri.noktp', $this->db->escape_like_str($ktp));

		return $this->db->get();
	}

	public function hispt($ktp){

		$this->db->select('jbtnhis, tglupdate, tglonhis');
		$this->db->from('hrdhistory');
		$this->db->where('ktphis', $this->db->escape_like_str($ktp));
		//$this->db->order_by('tglupdate','DESC');
		$this->db->group_by('jbtnhis');
		// $this->db->limit(2);

		return $this->db->get();
	}

	public function getUser($user){

		$this->db->select('iduser, namauser, akunuser');
		$this->db->from('hrduser');
		$this->db->where('namauser', $user);

		return $this->db->get()->row_array();
	}

	public function akta(){

		$this->db->select('idlegal, attach, nolegal, perihal, notaris, tglbuat, tmptbuat');
		$this->db->from('hrdlegal');

		return $this->db->get();
	}

	public function showJmlDataAkta(){

		$this->db->select('idlegal, attach, nolegal, perihal, notaris, tglbuat, tmptbuat');
		$this->db->from('hrdlegal');
		$this->db->order_by('idlegal ASC');

		return $this->db->get()->num_rows();
	}

	public function showDataAkta($number,$offset){

		$this->db->select('idlegal, attach, nolegal, perihal, notaris, tglbuat, tmptbuat');
		$this->db->from('hrdlegal');
		$this->db->order_by('idlegal ASC');
		$this->db->limit($number,$offset);

		return $this->db->get();
	}

	public function findAkta($kw){

		$this->db->select('idlegal, attach, nolegal, perihal, notaris, tglbuat, tmptbuat');
		$this->db->from('hrdlegal');
		$this->db->like('nolegal', $this->db->escape_like_str($kw));
		$this->db->or_like('perihal', $this->db->escape_like_str($kw));
		$this->db->or_like('notaris', $this->db->escape_like_str($kw));
		$this->db->order_by('idlegal ASC');

		return $this->db->get();
	}

	public function izinPks(){

		$this->db->select('hrdizinpks.idizinpks as id, hrdizinpks.attach as file, hrdizinpks.instansi as instansi, hrdizinpks.perihal as perihal, hrdizinpks.tglakhir as tglakhir, hrdizinpks.tglawal as tglawal');
		$this->db->from('hrdizinpks');
		$this->db->join('hrdizinpksup', 'hrdizinpks.idizinpks = hrdizinpksup.idizinpks AND hrdizinpks.ippc = hrdizinpksup.ippc','left');
		$this->db->where(("hrdizinpks.ket != ''"));

		return $this->db->get();
	}

	public function izinPksUp($a, $b){

		$this->db->select('hrdizinpks.idizinpks as id, hrdizinpks.ippc as ip, hrdizinpks.attach as file, hrdizinpks.instansi as instansi, hrdizinpks.tglawal as tglawal, hrdizinpks.tglakhir as tglakhir, hrdizinpks.noizinpks as noip');
		$this->db->from('hrdizinpks');
		$this->db->join('hrdizinpksup', 'hrdizinpks.idizinpks = hrdizinpksup.idizinpks AND hrdizinpks.ippc = hrdizinpksup.ippc','left');
		$this->db->where(("hrdizinpks.ket != ''"));
		$this->db->where('hrdizinpks.idizinpks', $this->db->escape_like_str($a));
		$this->db->where('hrdizinpks.ippc', $this->db->escape_like_str($b));

		return $this->db->get();
	}

	public function upToIP($a, $b){

		$this->db->select('upto');
		$this->db->from('hrdizinpksup');
		$this->db->where('hrdizinpksup.idizinpks', $this->db->escape_like_str($a));
		$this->db->where('hrdizinpksup.ippc', $this->db->escape_like_str($b));

		return $this->db->get();
	}

	public function showJmlDataIP(){

		$this->db->select('hrdizinpks.idizinpks as id');
		$this->db->from('hrdizinpks');
		$this->db->where(("hrdizinpks.ket != ''"));
		$this->db->order_by('hrdizinpks.idizinpks ASC');

		return $this->db->get()->num_rows();
	}

	public function showDataIP($number,$offset){

		$this->db->select('hrdizinpks.idizinpks as id, hrdizinpks.ippc as ip, hrdizinpks.attach as file, hrdizinpks.instansi as instansi, hrdizinpks.perihal as perihal, hrdizinpks.tglakhir as tglakhir, hrdizinpks.tglawal as tglawal, hrdizinpks.noizinpks as nopks, hrdizinpks.perihal as perihal, hrdizinpks.tglawal as tglbuat, hrdizinpks.ket as ket');
		$this->db->from('hrdizinpks');
		$this->db->where(("hrdizinpks.ket != ''"));
		$this->db->order_by('hrdizinpks.idizinpks ASC');
		$this->db->limit($number,$offset);

		return $this->db->get();
	}

	public function findIP($kw){

		$this->db->select('hrdizinpks.idizinpks as id, hrdizinpks.ippc as ip, hrdizinpks.attach as file, hrdizinpks.instansi as instansi, hrdizinpks.perihal as perihal, hrdizinpks.tglakhir as tglakhir, hrdizinpks.ket as ket, hrdizinpks.noizinpks as nopks, hrdizinpks.tglawal as tglbuat');
		$this->db->from('hrdizinpks');
		$this->db->where(("hrdizinpks.ket != ''"));
		$this->db->like('hrdizinpks.instansi', $this->db->escape_like_str($kw));
		$this->db->or_like('hrdizinpks.perihal', $this->db->escape_like_str($kw));
		$this->db->or_like('hrdizinpks.ket', $this->db->escape_like_str($kw));

		return $this->db->get();
	}

	public function izin(){

		$this->db->select('hrdizinpks.idizinpks as id, hrdizinpks.attach as file, hrdizinpks.instansi as instansi, hrdizinpks.perihal as perihal, hrdizinpks.tglakhir as tglakhir');
		$this->db->from('hrdizinpks');
		$this->db->join('hrdizinpksup', 'hrdizinpks.idizinpks = hrdizinpksup.idizinpks AND hrdizinpks.ippc = hrdizinpksup.ippc','left');
		$this->db->where('hrdizinpks.ket', '');

		return $this->db->get();
	}

	public function izinUp($a, $b){

		$this->db->select('hrdizinpks.idizinpks as id, hrdizinpks.ippc as ip, hrdizinpks.attach as file, hrdizinpks.instansi as instansi, hrdizinpks.tglawal as tglawal, hrdizinpks.tglakhir as tglakhir, hrdizinpks.noizinpks as noip');
		$this->db->from('hrdizinpks');
		$this->db->join('hrdizinpksup', 'hrdizinpks.idizinpks = hrdizinpksup.idizinpks AND hrdizinpks.ippc = hrdizinpksup.ippc','left');
		$this->db->where('hrdizinpks.ket', '');
		$this->db->where('hrdizinpks.idizinpks', $this->db->escape_like_str($a));
		$this->db->where('hrdizinpks.ippc', $this->db->escape_like_str($b));

		return $this->db->get();
	}

	public function upToIzin($a, $b){

		$this->db->select('upto');
		$this->db->from('hrdizinpksup');
		$this->db->where('hrdizinpksup.idizinpks', $this->db->escape_like_str($a));
		$this->db->where('hrdizinpksup.ippc', $this->db->escape_like_str($b));

		return $this->db->get();
	}

	public function showJmlDataIzin(){

		$this->db->select('hrdizinpks.idizinpks as id');
		$this->db->from('hrdizinpks');
		$this->db->where('hrdizinpks.ket', '');
		$this->db->order_by('hrdizinpks.idizinpks ASC');

		return $this->db->get()->num_rows();
	}

	public function showDataIzin($number,$offset){

		$this->db->select('hrdizinpks.idizinpks as id, hrdizinpks.ippc as ip, hrdizinpks.attach as file, hrdizinpks.instansi as instansi, hrdizinpks.perihal as perihal, hrdizinpks.tglakhir as tglakhir, hrdizinpks.noizinpks as nopks, hrdizinpks.perihal as perihal, hrdizinpks.tglawal as tglbuat, hrdizinpks.ket as ket');
		$this->db->from('hrdizinpks');
		$this->db->where('hrdizinpks.ket', '');
		$this->db->order_by('hrdizinpks.idizinpks ASC');
		$this->db->limit($number,$offset);

		return $this->db->get();
	}

	public function findIzin($kw){

		$this->db->select('hrdizinpks.idizinpks as id, hrdizinpks.ippc as ip, hrdizinpks.attach as file, hrdizinpks.instansi as instansi, hrdizinpks.perihal as perihal, hrdizinpks.tglakhir as tglakhir, hrdizinpks.noizinpks as nopks, hrdizinpks.tglawal as tglbuat');
		$this->db->from('hrdizinpks');
		$this->db->where('hrdizinpks.ket', '');
		$this->db->like('hrdizinpks.instansi', $this->db->escape_like_str($kw));
		$this->db->or_like('hrdizinpks.perihal', $this->db->escape_like_str($kw));
		$this->db->or_like('hrdizinpks.ket', $this->db->escape_like_str($kw));

		return $this->db->get();
	}

	public function reminder(){

		$this->db->select('hrdizinpks.idizinpks as id, hrdizinpks.ippc as ip, hrdizinpks.instansi as instansi, hrdizinpks.perihal as perihal, hrdizinpks.tglakhir as tglakhir, hrdizinpks.tglawal as tglawal');
		$this->db->from('hrdizinpks');
		$this->db->where(("hrdizinpks.ket != ''"));

		return $this->db->get();
	}

	public function reminder_izin(){

		$this->db->select('hrdizinpks.idizinpks as id, hrdizinpks.ippc as ip, hrdizinpks.instansi as instansi, hrdizinpks.perihal as perihal, hrdizinpks.tglakhir as tglakhir, hrdizinpks.tglawal as tglawal');
		$this->db->from('hrdizinpks');
		$this->db->where('hrdizinpks.ket','');

		return $this->db->get();
	}

	public function cetak_akta(){

		$this->db->select('nolegal, perihal, tglbuat, tmptbuat, notaris');
		$this->db->from('hrdlegal');
		$this->db->order_by('idlegal ASC');

		return $this->db->get();
	}

	public function cetak_pks(){

		$this->db->select('noizinpks, perihal, tglawal, tglakhir, instansi');
		$this->db->from('hrdizinpks');
		$this->db->where(("hrdizinpks.ket != ''"));
		$this->db->order_by('idizinpks ASC');

		return $this->db->get();
	}

	public function cetak_izin(){

		$this->db->select('noizinpks, perihal, tglawal, tglakhir, instansi');
		$this->db->from('hrdizinpks');
		$this->db->where('hrdizinpks.ket','');
		$this->db->order_by('idizinpks ASC');

		return $this->db->get();
	}

	public function tepeUp($a){

		$this->db->select('hrddatadiri.iddiri as iddiri, hrddatapt.idpt as idpt, hrddatadiri.namadiri as nama, hrddatadiri.noktp as ktp, hrddatadiri.tlpon as tlp, hrddatapt.jbtn as jbtn, hrdtp.tipeskp as tipeskp, hrdtp.noskp as noskp, hrdtp.valid as valid, hrdtp.tmpt as tmpt, hrdtp.tgltp as tgltp, hrdtp.jenistp as jenistp');
		$this->db->from('hrddatadiri');
		$this->db->join('hrddatapt', 'hrddatadiri.noktp = hrddatapt.noktp AND hrddatadiri.pcip = hrddatapt.pcip');
		$this->db->join('hrdtp', 'hrddatadiri.noktp = hrdtp.niktp AND hrddatadiri.pcip = hrdtp.ippc','left');
		//$this->db->join('hrdtpattach', 'hrddatadiri.noktp = hrddatapt.noktp AND hrddatadiri.pcip = hrddatapt.pcip');
		$this->db->where('hrddatadiri.noktp', $this->db->escape_like_str($a));

		return $this->db->get()->row_array();
	}

	public function reminderLicense(){
		$this->db->select('hrddatadiri.namadiri as nama, hrddatadiri.noktp as ktp, hrddatapt.nikpt as nik, hrddatapt.jbtn as jbtn, hrddatapt.masali as lisensi');
		$this->db->from('hrddatadiri');
		$this->db->join('hrddatapt', 'hrddatadiri.noktp = hrddatapt.noktp AND hrddatadiri.pcip = hrddatapt.pcip');
		$this->db->where('hrddatapt.masali <>','0000-00-00');
		$this->db->where('hrddatadiri.dlt',0);
		$this->db->where('hrddatapt.statuspt <>','SK2');
		$this->db->where('hrddatapt.statuspt <>','SK3');
		$this->db->where('hrddatapt.statuspt <>','SK6');

		return $this->db->get();
	}

	public function reminderIdCard(){
		$this->db->select('hrddatadiri.namadiri as nama, hrddatadiri.noktp as ktp, hrddatapt.nikpt as nik, hrddatapt.jbtn as jbtn, hrddatapt.expidcard as expidcard');
		$this->db->from('hrddatadiri');
		$this->db->join('hrddatapt', 'hrddatadiri.noktp = hrddatapt.noktp AND hrddatadiri.pcip = hrddatapt.pcip');
		$this->db->where('hrddatapt.expidcard <>','0000-00-00');
		$this->db->where('hrddatadiri.dlt',0);
		$this->db->where('hrddatapt.statuspt <>','SK2');
		$this->db->where('hrddatapt.statuspt <>','SK3');
		$this->db->where('hrddatapt.statuspt <>','SK6');

		return $this->db->get();
	}
}
