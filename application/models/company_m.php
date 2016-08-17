<?php
	class Company_m extends CI_Model{
		public function insert($data){
			$query=$this->db->insert('company_profile',$data);
			return $query;
		}	
		public function insert_askus($data){
			$query=$this->db->insert('ask_us',$data);
			return $query;
		}
		public function get($data){
			$query=$this->db->select('name_ask_us')->from('ask_us')->where(array('name_ask_us'=>$data))->get();
			return $query;
		}
		public function get_name($data){
			$query=$this->db->select('name')->from('company_profile')->where(array('name'=>$data))->get();
			return $query;
		}
}
?>