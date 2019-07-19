<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class Register extends Parent_Controller {
 

 	public function __construct(){
 		parent::__construct();
		 $this->load->model('m_register');
		 $this->load->library('MyPHPMailer'); 
 	}
 

	public function index(){
		 
 	 
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'register/register_view';
		$data['cat'] = $this->db->get('m_kategori')->result();
		$data['item'] = $this->m_register->fetch_item();
		$this->load->view('template_front',$data);
	}


	public function pro_reg(){ 

		//store to db
		$this->db->query("insert into m_customer 
				(full_name,alamat,email,telp,username,password,status) 
				VALUES 
				('".$this->input->post('full_name')."','".$this->input->post('alamat')."','".$this->input->post('email')."','".$this->input->post('telp')."','".$this->input->post('username')."','".base64_encode($this->input->post('password'))."','1')");
				  
		$isiEmail = "Selamat ! akun anda berhasil dibuat, Berikut ini adalah data akun anda <br> 
			<b> Nama Lengkap </b> : ".$this->input->post('nama_lengkap')." <br>
			<b> Alamat </b> : ".$this->input->post('alamat')." <br>
			<b> No Telp </b> : ".$this->input->post('no_telp')." <br>
			<b> Username </b> : ".$this->input->post('username')." <br>
			<b> Password </b> : ".$this->input->post('password')." <br> 
		Simpan data ini baik baik untuk keperluan otentikasi login ";
        $mail = new MyPHPMailer();
        //$mail->IsHTML(true);    // set email format to HTML
        $mail->IsSMTP();   // we are going to use SMTP
		$mail->SMTPDebug = 2;
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
		//$mail->Host       = "mail.rantypesta.com";      // setting GMail as our SMTP server
		 	 
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        //$mail->Username   = "info@rantypesta.com";  // alamat email kamu
        $mail->Username   = "okkisetyawan@gmail.com";  // alamat email kamu
        $mail->Password   = "karlinamaksum19";            // password GMail
        //$mail->SetFrom('info@1980media.com', 'noreply');  //Siapa yg mengirim email
        $mail->SetFrom('okkisetyawan@gmail.com', 'noreply');  //Siapa yg mengirim email
        $mail->Subject    = "Informasi Akun";
        $mail->Body       = $isiEmail;
        $toEmail = $this->input->post('email'); // siapa yg menerima email ini
        $mail->AddAddress($toEmail);
		 
		 
        if(!$mail->Send()) {
            echo json_encode(array("message"=>"failed"));
        } else {
            echo json_encode(array("message"=>"success"));
        }


	}
}
 