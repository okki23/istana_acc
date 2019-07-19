<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_login_cust extends Parent_Model { 
  
  
  var $nama_tabel = 'm_struktur';
  var $daftar_field = array('id','kode_menu','nama_menu','link','kode_parent');
  var $primary_key = 'id';
  
	  
  public function __construct(){
        parent::__construct();
        $this->load->database();
  }
  
  public function fetch_item(){
      $sql = "select a.*,b.nama_kategori from m_barang a
      left join m_kategori b on b.id = a.id_kat";
      return $this->db->query($sql)->result();
  }
 
}
