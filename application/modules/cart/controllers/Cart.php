<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class cart extends Parent_Controller {
 
  	var $nama_tabel = 'm_user';
  	var $daftar_field = array('id','id_user','username','password','user_insert','date_insert','user_update','date_update');
  	var $primary_key = 'id';

 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_cart');
 	}
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$this->load->view('cart/cart_view',$data);
	}
	public function auth(){
	 
		$email = $this->input->post('email');
		$password = base64_encode($this->input->post('password'));
	 
			 
			$auth = $this->m_cart->autentikasi($email,$password);
			 
			$session = $this->m_cart->autentikasi($email,$password)->row();
			 
			if($auth->num_rows() > 0){
				/*
				id
username
password
email
full_name
telp
alamat

*/
				$this->session->set_userdata(array('username'=>$session->username,'email'=>$email,'full_name'=>$session->full_name,'telp'=>$session->telp,'alamat'=>$session->alamat));
				//redirect(base_url('cart'));
				echo "<script language=javascript>
				alert('Login sukses!');
				window.location='" . base_url('front') . "';
				</script>";
			}else{
				echo "<script language=javascript>
				alert('Akun yang anda masukkan tidak tersedia, Periksa kembali!');
				window.location='" . base_url('cart') . "';
				</script>";
			}
		 
	}

	public function logout(){
		$this->session->sess_destroy();
		echo "<script language=javascript>
             alert('Anda telah keluar');
             window.location='" . base_url('cart') . "';
             </script>";
		 
	}
}
