<?php

class Company extends CI_Controller {

	function __construct(){
        // Call the Model constructor
        parent::__construct();
     	$this->load->model('company_m');
     	$this->load->library('form_validation');
     	error_reporting(~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);  
    }
	function index()
	{	
		$data['content_view']='company';
		$this->load->view('layout',$data);
	}
	public function company_profile(){
		$rules = array(
               		array(
               			'field'   => 'name', 
                     	'label'   => 'Name', 
                     	'rules'   => 'required'
                  		),
               		 array(
               			'field'   => 'description', 
                     	'label'   => 'Description', 
                     	'rules'   => 'required'
                  		),
            		);
    	$this->form_validation->set_rules($rules);
    	if($this->form_validation->run()==TRUE){

    		$query_name=$this->input->post('name');
    		$query=$this->company_m->get_name($query_name);


    		if(! $query->num_rows()>0){
    			$data=array(
							'name'=>$this->input->post('name'),
							'street'=>$this->input->post('street'),
							'description'=>$this->input->post('description'),
							'city'=>$this->input->post('city'),
							'province'=>$this->input->post('province'),
							'postal'=>$this->input->post('postal')
						);
				$result=$this->company_m->insert($data);
				if($result){
					 	$result=array(
					 			'is_success' => true,
								'message' => "Add Company Profile is success.",
								'parameter' => array(
													'name'=>$this->input->post('name'),
													'description'=>$this->input->post('description'),
													'street'=>$this->input->post('street'),
													'city'=>$this->input->post('city'),
													'province'=>$this->input->post('province'),
													'postal'=>$this->input->post('postal')
											),
								'validation_errors' => validation_errors()
					 		);
					 }else{
					 	$result=array(
					 		   'is_success' => false,
								'message' => "Add Company Profile is failed",
								'parameter' => array(
													'name'=>$this->input->post('name'),
													'description'=>$this->input->post('description'),
													'street'=>$this->input->post('street'),
													'city'=>$this->input->post('city'),
													'province'=>$this->input->post('province'),
													'postal'=>$this->input->post('postal')
											),
								'validation_errors' => validation_errors()
							);
						}

		    		}else{
							$result=array(
							 		   'is_success' => false,
										'message' => "Company name already exists",
										'parameter' => array(
													'name'=>$this->input->post('name')
													),
										'validation_errors' => validation_errors()
									);
						}
		}else{
			 	$result=array(
			 		   'is_success' => false,
						'message' => "Add Company Profile is failed",
						'parameter' => array(
											'name'=>$this->input->post('name'),
											'description'=>$this->input->post('description'),
											'street'=>$this->input->post('street'),
											'city'=>$this->input->post('city'),
											'province'=>$this->input->post('province'),
											'postal'=>$this->input->post('postal')
									),
						'validation_errors' => validation_errors()
					);
		}echo json_encode($result); 
	}
	public function ask_us(){
		$rules = array(
               		array(
               			'field'   => 'name_ask_us', 
                     	'label'   => 'Name', 
                     	'rules'   => 'required'
                  		),
               		);
           $this->form_validation->set_rules($rules);
         if($this->form_validation->run()==TRUE){
		         	$query_name=$this->input->post('name_ask_us');
					$query=$this->company_m->get($query_name);
				
				if(!$query->num_rows()>0){
					$data=array(
						'division'=>$this->input->post('division'),
						'name_ask_us'=>$this->input->post('name_ask_us'),
						'question'=>$this->input->post('question')
					);
				$result=$this->company_m->insert_askus($data);
				if($result){
					$result=array(
					 			'is_success' => true,
								'message' => "Sent Message Ask Us is success.",
								'parameter' => array(
											'division'=>$this->input->post('division'),
											'name_ask_us'=>$this->input->post('name_ask_us'),
											'question'=>$this->input->post('question')
											),
								'validation_errors' => validation_errors()
					 		);
					 }else{
					 	$result=array(
					 		   'is_success' => false,
								'message' => "Sent Message is failed",
								'parameter' => array(
														'division'=>$this->input->post('division'),
														'name_ask_us'=>$this->input->post('name_ask_us'),
														'question'=>$this->input->post('question')
											),
								'validation_errors' => validation_errors()
							);
				}
				}else{
					$result=array(
					 		   'is_success' => false,
								'message' => "Name already exists",
								'parameter' => array(
											'name_ask_us'=>$this->input->post('name_ask_us')
											),
								'validation_errors' => validation_errors()
							);
				}
         }else{
			 	$result=array(
			 		   'is_success' => false,
						'message' => "Sent Massege is failed",
						'parameter' => array(
											'name'=>$this->input->post('name')
									),
						'validation_errors' => validation_errors()
					);
		}echo json_encode($result); 
	}
}
?>