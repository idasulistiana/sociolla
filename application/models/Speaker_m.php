<?php
	class Speaker_m extends CI_Model{
		private $id;
		private $title;
		private $fname;
		private $lname;
		private $company;
		private $city;
		private $state;
		private $country;
		private $email;
		private $phone;
		private $address;
		private $abstract_category;
		private $title_speech;
		private $username;
		private $pass;
		private $abstract_file;

		public function setID($val){ $this->id = $val; }
		public function setTitle($val){ $this->title = $val; }
		public function setFName($val){ $this->fname = $val; }
		public function setLName($val){ $this->lname = $val; }
		public function setCompany($val){ $this->company = $val; }
		public function setCity($val){ $this->city = $val; }
		public function setState($val){ $this->state = $val; }
		public function setCountry($val){ $this->country = $val; }
		public function setEmail($val){ $this->email = $val; }
		public function setPhone($val){ $this->phone = $val; }
		public function setAddress($val){ $this->address = $val; }
		public function setAbstractCat($val){ $this->abstract_category = $val; }
		public function setTSpeech($val){ $this->title_speech = $val; }
		public function setUsername($val){ $this->username = $val; }
		public function setPass($val){ $this->pass = $val; }
		public function setAbstractFile($val){ $this->abstract_file = $val; }

		public function getID(){ return $this->id; }
		public function getTitle(){ return $this->title; }
		public function getFName(){ return $this->fname; }
		public function getLName(){ return $this->lname; }
		public function getCompany(){ return $this->company; }
		public function getCity(){ return $this->city; }
		public function getState(){ return $this->state; }
		public function getCountry(){ return $this->country; }
		public function getEmail(){ return $this->email; }
		public function getPhone(){ return $this->phone; }
		public function getAddress(){ return $this->address; }
		public function getAbstractCat(){ return $this->abstract_category; }
		public function getTSpeech(){ return $this->title_speech; }
		public function getUsername(){ return $this->username; }
		public function getPass(){ return $this->pass; }
		public function getAbstractFile(){ return $this->abstract_file; }

		public function checkAbstract(){
			$this->db->select('abstract_file')->from('tbl_speaker');
			$this->db->where('username', $this->session->userdata('username'));
			return $this->db->get()->row()->abstract_file;
		}
		public function addAbstract(){
			$data = array('abstract_file' => $this->getAbstractFile());
			$this->db->where('username', $this->session->userdata('username'));
			return $this->db->update('tbl_speaker', $data);
		}
		/*public function list_data_presenter(){
			$data['aColumns'] = array(
								'id_speaker AS id_speaker', 
								'1 AS no', 
								'title AS title',
								'fname AS fname',
								'lname AS lname',
								'company AS company',
								'city AS city',
								'state AS state',
								'country AS country',
								'email AS email',
								'phone AS phone',
								'address AS address',
								'abstract_category AS category',
								'title_speech AS speech',
								'abstract_file AS afile',
								'status_bayar AS bayar'
							);
			$data['sIndexColumn'] 	= "id_speaker";
			$data['sTable'] 		= "tbl_speaker";
			
			$Columns 	= array( 'id', 'no', 'fname', 'company','category', 'speech', 'afile', 'city', 'state', 'country', 'email', 'phone', 'address', 'bayar');
			$ret 			= data_table($data,$_REQUEST);
			$sQ 			= $ret['sQ'];
			$output 	= $ret['output'];
			$no = 0;
			foreach($sQ->result_array() as $aRow) {
				$row 	= array();
				for ( $i=0 ; $i<count($data['aColumns']) ; $i++ ) {
					if($Columns[$i] == 'no'){
						$aRow['no'] = $no+1;
					}
					if($Columns[$i] == 'fname'){
						$aRow['fname'] = $aRow['title']." ".$aRow['fname']." ".$aRow['lname'];
					}
					if($Columns[$i] == 'bayar'){
						if($aRow['bayar'] == 1)
							$aRow['bayar'] = 'Done';
						else
							$aRow['bayar'] = 'Pending'; 
					}
					if($Columns[$i] == 'afile')
						$aRow['afile'] = '<a href="'.base_url().'assets/uploads/pdf/'.$aRow['afile'].'">Download</a>';
					$row[] = $aRow[ $Columns[$i] ];	
				}
				$output['aaData'][] = $row;
				$no++;
			}
			
			return $output;
		}*/
		public function lihat(){
			$this->db->select('*')->from('tbl_speaker');
			return $this->db->get()->result();
		}
		public function lihatParticipant(){
			$this->db->select('*')->from('tbl_participant');
			return $this->db->get()->result();
		}
		public function hitung($x = 'tbl_speaker'){
			$this->db->select('count(*) as jml')->from($x)->where('status',2);
			return $this->db->get()->row()->jml;	
		}
	}
?>