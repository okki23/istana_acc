<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Register extends Parent_Controller {
 

 	public function __construct(){
 		parent::__construct();
		 $this->load->model('m_register');
 
 	}
 

	public function index(){
		 
 	 
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'register/register_view';
		$data['cat'] = $this->db->get('m_kategori')->result();
		$data['item'] = $this->m_register->fetch_item();
		$this->load->view('template_front',$data);
	}


	public function save(){ 
		

		//store to db
		$sql = $this->db->query("insert into m_customer 
				(email,password,full_name,telp,alamat,status) 
				VALUES 
				('".$this->input->post('email')."','".base64_encode($this->input->post('password'))."','".$this->input->post('full_name')."','".$this->input->post('telp')."','".$this->input->post('alamat')."','1')");
		
		if($sql){
			echo "<script language=javascript>
				alert('Pendaftaran Sukses!');
				window.location='" . base_url('front') . "';
				</script>";

		}

	}
}
 