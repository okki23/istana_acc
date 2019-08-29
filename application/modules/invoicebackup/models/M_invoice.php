<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_invoice extends Parent_Model { 
  
  var $nama_tabel = 't_pengeluaran';
  var $daftar_field = array('id','no_transaksi','id_instansi','keterangan','id_pegawai','date_assign');  
  var $primary_key = 'id';
    
  public function __construct(){
        parent::__construct();
        $this->load->database();
  }

  public function get_no(){
    $query = $this->db->query("SELECT SUBSTR(MAX(no_transaksi),-7) AS id  FROM t_pengeluaran");
         
    return $query;
  }

   
  public function fetch_invoicelist_table(){
       $getdata = $this->db->query("select 
                  SELECT a.*,b.harga,c.nama_produk FROM t_invoice_detail a
                  LEFT JOIN m_pricelist b on b.id = a.id_pricelist
                  LEFT JOIN m_produk c on c.id = b.id_produk")->result();
       $data = array();  
       $no = 1;
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = $no;
                $sub_array[] = $row->nama_produk;   
                $sub_array[] = $row->design_file_upload;   
                $sub_array[] = $row->qty;  
                $sub_array[] = $row->total;  
          
                $sub_array[] = "<button typpe='button' onclick='HapusDetailList(".$value->id.");' class = 'btn btn-danger'> <i class='material-icons'>delete_forever</i> Hapus </button>  ";  
               
                $data[] = $sub_array;  
                 $no++;
           }  
          
       return $output = array("data"=>$data);
  }

  public function list_order_customer(){
      $getdata = $this->db->query('select * from t_invoice where id_pelanggan = "'.$this->session->userdata('userid').'" ')->result();
      $data = array();  
          $no = 1;
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
             
                $sub_array[] = $no;  
                $sub_array[] = $row->no_order; 
                $sub_array[] = "<button typpe='button' onclick='Hapus(".$row->id.");' class = 'btn btn-primary'> <i class='material-icons'>aspect_ratio</i> Detail </button> &nbsp; <button typpe='button' onclick='Hapus(".$row->id.");' class = 'btn btn-danger'> <i class='material-icons'>delete_forever</i> Hapus </button>";  
                 
                  
                $data[] = $sub_array;  
          $no++;
           }  
          
       return $output = array("data"=>$data);
  }

  public function fetch_invoice_list(){
      
       $getdata = $this->db->query("select a.*,b.full_name from t_invoice a
       left join m_customer b on b.id = a.id_customer")->result();
       $data = array();  
           $no = 1;
         
           foreach($getdata as $row)  
           {  
                
                $sub_array = array();  
                
                $sub_array[] = $row->no_invoice;
                $sub_array[] = $row->full_name;
                $sub_array[] = $row->date_assign;
                if($row->bukti_bayar == ''){
                    $sub_array[] = 'Unpaid';     
                }else{
                    $sub_array[] = 'Paid';      
                }
                
               $sub_array[] = '   <div class="dropdown">
               <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Opsi
               <span class="caret"></span></button>
               <ul class="dropdown-menu">
                 <li><a href="javascript:void(0)" onclick="Show_Detail('.$row->no_invoice.');"> <i class="material-icons">aspect_ratio</i> Detail </a></li>
                 <li><a href="javascript:void(0)" onclick="SendResi('.$row->no_invoice.');"> <i class="material-icons">send</i>  Send No.Resi</a></li>
                 <li><a href="javascript:void(0)" onclick="Hapus_Data('.$row->no_invoice.');" > <i class="material-icons">delete</i> Hapus </a></li>
               </ul>
               </div>'; 
               //  $sub_array[] = '<a href="javascript:void(0)" class="btn btn-default btn-xs waves-effect" id="edit" onclick="Show_Detail('.$row->no_invoice.');" > <i class="material-icons">aspect_ratio</i> Detail </a>  &nbsp; 
               //  <a href="javascript:void(0)" id="delete" class="btn btn-danger btn-xs waves-effect" onclick="Hapus_Data('.$row->no_invoice.');" > <i class="material-icons">delete</i> Hapus </a>';  
                $data[] = $sub_array;  
              
          $no++;
          }  
          
       return $output = array("data"=>$data);
        
  }

  public function fetch_jabatan(){
      
       $getdata = $this->db->get('m_jabatan')->result();
       $data = array();  
      
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
             
                $sub_array[] = $row->nama_jabatan;  
                $sub_array[] = $row->id;  
                 
                  
                $data[] = $sub_array;  
              
           }  
          
       return $output = array("data"=>$data);
        
  }
  
   
 
}
