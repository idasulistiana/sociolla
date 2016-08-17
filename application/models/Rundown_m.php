<?php
	class Rundown_m extends CI_Model{
		private $id_ev;
		private $date_ev;
		private $stime;
		private $etime;
		private $event;
		private $id_speaker;
		private $category;

		public function setId($val){ $this->id_ev = $val; }
		public function setDate($val){ $this->date_ev = $val; }
		public function setSTime($val){ $this->stime = $val; }
		public function setETime($val){ $this->etime = $val; }
		public function setEvent($val){ $this->event = $val; }
		public function setIdSpeaker($val){ $this->id_speaker = $val; }
		public function setCategory($val){ $this->category = $val; }

		public function getId(){ return $this->id_ev; }
		public function getDate(){ return $this->date_ev; }
		public function getSTime(){ return $this->stime; }
		public function getETime(){ return $this->etime; }
		public function getEvent(){ return $this->event; }
		public function getIdSpeaker(){ return $this->id_speaker; }
		public function getCategory(){ return $this->category; }

		public function lihat($x){
			$this->db->select('*')->from('tbl_rundown')->where('date_ev', $x)->order_by('stime');
			return $this->db->get()->result();
		}
		public function edit(){
			$data = array(
				'event' => $this->getEvent()/*,
				'id_speaker' => $this->getIdSpeaker()*/
			);
			$this->db->where('id_ev', $this->getId());
			return $this->db->update('tbl_rundown', $data);
		}
	}
?>