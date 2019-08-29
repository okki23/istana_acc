<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Contact extends Parent_Controller {
 
  	var $nama_tabel = 'm_user';
  	var $daftar_field = array('id','id_user','username','password','user_insert','date_insert','user_update','date_update');
  	var $primary_key = 'id';

 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_contact');
 	}
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$count_cart  = $this->db->query("select a.* from t_invoice a
		inner join t_invoice_detail b on b.no_invoice = a.no_invoice where a.id_customer = '".$this->session->userdata('userid')."' and STATUS  = 1")->num_rows();
		$data['count_cart'] = $count_cart;
		$this->load->view('contact/contact_view',$data);
	}
	public function autentikasi(){
	 
		$username = $this->input->post('username');
		$password = base64_encode($this->input->post('password'));
		$posisi = $this->input->post('posisi');
	
		$list = array("username"=>$username,"password"=>$password,"posisi"=>$posisi);
			 
			$auth = $this->m_contact->autentikasi($username,$password);
			 
			$session = $this->m_contact->autentikasi($username,$password)->row();
			 
			if($auth->num_rows() > 0){
				$this->session->set_userdata(array('username'=>$session->username,'session'=>$posisi));
				redirect(base_url('dashboard'));
			}else{
				echo "<script language=javascript>
				alert('Akun yang anda masukkan tidak tersedia, Periksa kembali!');
				window.location='" . base_url('contact') . "';
				</script>";
			}
		 
	}

	public function logout(){
		$this->session->sess_destroy();
		echo "<script language=javascript>
             alert('Anda telah keluar dari ".$this->data['judul']." ');
             window.location='" . base_url('contact') . "';
             </script>";
		 
	}
}
