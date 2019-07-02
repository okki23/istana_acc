<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class Front extends Parent_Controller {
 

 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_front');
 	}
 

	public function index(){
		 
 	 
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'front/front_view';

		$this->load->view('template_front',$data);
	}
}
 