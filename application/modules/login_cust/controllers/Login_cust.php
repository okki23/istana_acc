<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class Login_cust extends Parent_Controller {
 

 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_login_cust');
 	}
 

	public function index(){
		 
 	 
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'login_cust/login_cust_view';
		$data['cat'] = $this->db->get('m_kategori')->result();
		$data['item'] = $this->m_login_cust->fetch_item();
		$this->load->view('template_front',$data);
	}
}
 