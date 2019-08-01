<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_cart extends Parent_Model { 
 
  
  var $nama_tabel = 'm_customer';
 

	  
	public function __construct(){
        parent::__construct();
        $this->load->database();
	}
 
	public function autentikasi($email,$password){
                $sql = $this->db->get_where($this->nama_tabel,array('email'=>$email,'password'=>$password));
		return $sql;
	}
 
 
}
