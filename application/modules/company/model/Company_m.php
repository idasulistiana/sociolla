<?php
	class Company_m extends CI_Model{
		private $name;
		private $street;
		private $city;
		private $province;
		private $postal;

		public function setName($val){
			$this->name=$val;
		}
		public function setStreet($val){
			$this->street=$val;
		}
		public function setCity($val){
			$this->city=$val;
		}
		public function setProvince($val){
			$this->province=$val;
		}
		public function setPostal($val){
			$this->postal=$val;
		}

		public function getName(){
			return $this->name;
		}
		public function getStreet(){
			return $this->street;
		}
		public function getCity(){
			return $this->city;
		}
		public function getProvince(){
			return $this->province;
		}
		public function getPostal(){
			return $this->postal;
		}
		public function cek(){
			$this->db->select(*);
			$this->db->from('company_profile');
			$query=$this->db->get();
			return $query->result();
		}
		public function insert($data){
			$query=$this->db->insert('company_profile',$data);
			return $query;

	}	
}
?>