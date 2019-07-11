<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

class Foto extends Parent_Controller {
  

  var $nama_tabel = 'm_foto';
  var $daftar_field = array('id','id_kategori','caption','foto');
  var $primary_key = 'id';
 
  
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_foto');
 		$this->load->model('cat_foto/m_cat_foto'); 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	}

  
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'foto/foto_view';
		$this->load->view('template_view',$data);		
   
	}
 
  	public function fetch_foto(){  
       $getdata = $this->m_foto->fetch_foto();
       echo json_encode($getdata);   
  	}  

  	public function fetch_cat_foto(){  
       $getdata = $this->m_foto->fetch_cat_foto();
       echo json_encode($getdata);   
  	} 
	
   
	public function get_data_edit(){
		$id = $this->uri->segment(3); 
		$sql = "select a.*,b.deskripsi as kategori from m_foto a left join m_cat_foto b on b.id = a.id_kategori where a.id = '".$id."' "; 
		$get = $this->db->query($sql)->row();
		echo json_encode($get,TRUE);
	}
	 
	public function hapus_data(){
		$id = $this->uri->segment(3);  
    //cek apakah foto/gambar tersedia
		$cek_foto = $this->db->where($this->primary_key,$id)->get($this->nama_tabel)->row(); 
   
		if($cek_foto->foto != '' || $cek_foto->foto != NULL){
          //apabila foto ada maka dihapus,apabila sebaliknya maka tidak dihapus
          unlink("upload/".str_replace(" ","_",$cek_foto->foto));
		}   

    $sqlhapus = $this->m_foto->hapus_data($id);
		
		if($sqlhapus){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);
	}
	 
	public function simpan_data(){
    
    
    $data_form = $this->m_foto->array_from_post($this->daftar_field);

    $id = isset($data_form['id']) ? $data_form['id'] : NULL; 
 

    $simpan_data = $this->m_foto->simpan_data($data_form,$this->nama_tabel,$this->primary_key,$id);
    $simpan_foto = $this->upload_foto();
  
 
	
		if($simpan_data && $simpan_foto){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);

	}
 
  function upload_foto(){  
    if(isset($_FILES["user_image"])){  
        $extension = explode('.', $_FILES['user_image']['name']);   
        $destination = './upload/' . $_FILES['user_image']['name'];  
        return move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
         
    }  
  }  
       


}
