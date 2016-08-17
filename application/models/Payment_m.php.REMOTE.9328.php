<?php
	class Payment_m extends CI_Model{
		private $id;
		private $fname;
		private $lname;
		private $company;
		private $email;
		private $jml;
		private $bank;
		private $a_name;
		private $a_number;
		private $message;
		private $id_status;
		private $id_regis;

		public function setId($val){ $this->id = $val; }
		public function setFName($val){ $this->fname = $val; }
		public function setLName($val){ $this->lname = $val; }
		public function setCompany($val){ $this->company = $val; }
		public function setEmail($val){ $this->email = $val; }
		public function setJml($val){ $this->jml = $val; }
		public function setBank($val){ $this->bank = $val; }
		public function setAName($val){ $this->a_name = $val; }
		public function setANumber($val){ $this->a_number = $val; }
		public function setMessage($val){ $this->message = $val; }
		public function setIdStatus($val){ $this->id_status = $val; }
		public function setIdRegis($val){ $this->id_regis = $val; }

		public function getId(){ return $this->id; }
		public function getFName(){ return $this->fname; }
		public function getLName(){ return $this->lname; }
		public function getCompany(){ return $this->company; }
		public function getEmail(){ return $this->email; }
		public function getJml(){ return $this->jml; }
		public function getBank(){ return $this->bank; }
		public function getAName(){ return $this->a_name; }
		public function getANumber(){ return $this->a_number; }
		public function getMessage(){ return $this->message; }
		public function getIdStatus(){ return $this->id_status; }
		public function getIdRegis(){ return $this->id_regis; }

		public function tambah(){
			$data = array(
				'fname' => $this->getFName(),
				'lname' => $this->getLName(),
				'company' => $this->getCompany(),
				'email' => $this->getEmail(),
				'jml' => $this->getJml(),
				'bank' => $this->getBank(),
				'a_name' => $this->getAName(),
				'a_number' => $this->getANumber(),
				'message' => $this->getMessage(),
				'id_status' => $this->getIdStatus(),
				'id_regis' => $this->getIdRegis()
			);
			return $this->db->insert('tbl_pembayaran', $data);
		}
		public function cek_idregis(){
			$tbl = ($this->getIdStatus() == 1) ? 'tbl_participant' : 'tbl_speaker';
			$id = ($this->getIdStatus() == 1) ? 'id_participant' : 'id_speaker';
			$data = array(
				'fname' => $this->getFName(),
				'lname' => $this->getLName(),
				'email' => $this->getEmail()
			);
			$this->db->select($id)->from($tbl)->where($data);
			return $this->db->get()->row()->$id;
		}
		public function updatePayment(){
			$data = array('status'=>1);
			return $this->db->where('id', $this->getId())->update('tbl_pembayaran', $data);
		}
		public function update1($stat,$x){
			$tbl = ($stat == 1) ? 'tbl_participant' : 'tbl_speaker';
			$id = ($stat == 1) ? 'id_participant' : 'id_speaker';
			$data = array('status'=>1);
			$this->db->where($id, $x);
			return $this->db->update($tbl,$data);
		}
		public function lihatPayment(){
			$this->db->select('*')->from('tbl_pembayaran')->where('status', 0)->order_by('tgl', 'asc');
			return $this->db->get()->result();
		}
		public function lihatPayment1(){
			$this->db->select('*')->from('tbl_pembayaran')->where_not_in('status', 0)->order_by('tgl', 'desc');
			return $this->db->get()->result();
		}
		public function hitung(){
			$this->db->select('count(*) as jml')->from('tbl_pembayaran')->where('status', 0);
			return $this->db->get()->row()->jml;
		}
	}
?>