<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_barang extends Parent_Model { 
  
     var $nama_tabel = 'm_barang';
     var $daftar_field = array('id','id_kat','nama_barang','harga','berat','foto','stock','keterangan');
     var $primary_key = 'id';
  
	  
  public function __construct(){
        parent::__construct();
        $this->load->database();
  }
  public function fetch_barang(){
       $sql = "select a.*,b.nama_kategori from m_barang a
               LEFT JOIN m_kategori b on b.id = a.id_kat"; 
		   $getdata = $this->db->query($sql)->result();
		   $data = array();  
		   $no = 1;
           foreach($getdata as $row){                  
                $sub_array = array();   
                $sub_array[] = $row->nama_barang;  
                $sub_array[] = $row->nama_kategori;  
                $sub_array[] = $row->stock; 
                $sub_array[] = '
                <a href="javascript:void(0)" class="btn btn-default btn-xs waves-effect" id="detail" onclick="Detail('.$row->id.');" > <i class="material-icons">aspect_ratio</i> Detail </a>  &nbsp; 
                <a href="javascript:void(0)" class="btn btn-warning btn-xs waves-effect" id="edit" onclick="Ubah_Data('.$row->id.');" > <i class="material-icons">create</i> Ubah </a>  
                &nbsp; <a href="javascript:void(0)" id="delete" class="btn btn-danger btn-xs waves-effect" onclick="Hapus_Data('.$row->id.');" > <i class="material-icons">delete</i> Hapus </a>';  
               
                $data[] = $sub_array;  
                $no++;
           }  
          
		   return $output = array("data"=>$data);
		    
    }
 
  
	 
 
}
