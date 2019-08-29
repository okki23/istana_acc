<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_customer extends Parent_Model { 
  
    var $nama_tabel = 'm_customer';
    var $daftar_field = array('id','password','email','full_name','telp','alamat','status');
    var $primary_key = 'id';
  
	  
  public function __construct(){
        parent::__construct();
        $this->load->database();
  }
  

     public function fetch_customer(){
      
       $getdata = $this->db->get($this->nama_tabel)->result();
       $data = array();  
      
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
                
                $sub_array[] = $row->full_name;
                $sub_array[] = $row->email;  
                $sub_array[] = $row->telp;  
                $sub_array[] = $row->alamat;  
                if($row->status != '2'){
                  $sub_array[] = '<a href="javascript:void(0)" class="btn btn-warning btn-xs waves-effect" id="edit" onclick="Banned('.$row->id.');" > <i class="material-icons">block</i> Banned </a>  &nbsp; <a href="javascript:void(0)" id="delete" class="btn btn-danger btn-xs waves-effect" onclick="Hapus_Data('.$row->id.');" > <i class="material-icons">delete</i> Hapus </a>';  
                }else{
                  $sub_array[] = '<a href="javascript:void(0)" class="btn btn-success btn-xs waves-effect" id="edit" onclick="UnBanned('.$row->id.');" > <i class="material-icons">done</i> UnBanned </a>  &nbsp; <a href="javascript:void(0)" id="delete" class="btn btn-danger btn-xs waves-effect" onclick="Hapus_Data('.$row->id.');" > <i class="material-icons">delete</i> Hapus </a>';  
                }
                
                $sub_array[] = $row->id;  
                 
                  
                $data[] = $sub_array;  
              
           }  
          
       return $output = array("data"=>$data);
        
    }

  
  
	 
 
}
