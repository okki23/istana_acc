<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class listcart extends Parent_Controller {
 
  	var $nama_tabel = 'm_user';
  	var $daftar_field = array('id','id_user','username','password','user_insert','date_insert','user_update','date_update');
  	var $primary_key = 'id';

 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_listcart');
 	}
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['listcat'] = $this->db->get('m_kategori')->result();
		$data['history'] = $this->db->query("select a.*,b.full_name from t_invoice a 
		left join m_customer b on b.id = a.id_customer where a.id_customer =  '".$this->session->userdata('userid')."' ");
		$data['payment'] = $this->db->query("select a.*,b.full_name from t_invoice a 
		left join m_customer b on b.id = a.id_customer where id_customer =  '".$this->session->userdata('userid')."'  and a.STATUS  = 1  and is_checkout = 2 ");
		$data['listitem'] = $this->db->query("select a.*,b.nama_kategori from m_barang a
		left join m_kategori b on b.id = a.id_kat ")->result();

		$ceklastinv = $this->db->query("select * from t_invoice where status = 1");
		if($ceklastinv->num_rows() > 0){
			$parsing = $ceklastinv->row();
			$data['activenoinv'] = $parsing->no_invoice;
		}else{
			$data['activenoinv'] = 0;
		}
		
		$count_cart  = $this->db->query("select a.* from t_invoice a
		inner join t_invoice_detail b on b.no_invoice = a.no_invoice where a.id_customer = '".$this->session->userdata('userid')."' and STATUS  = 1")->num_rows();
		$data['count_cart'] = $count_cart;
		$data['listing'] = $this->db->query("select a.*,b.id as idlist,c.nama_barang,c.harga,b.qty from t_invoice a
		inner join t_invoice_detail b on b.no_invoice = a.no_invoice
		inner join m_barang c on c.id = b.id_barang
		where a.id_customer = '".$this->session->userdata('userid')."' and a.STATUS  = 1 and a.is_checkout = 1 ");
		$this->load->view('listcart/listcart_view',$data);
	}

	public function cetak_invoice(){
		$data['noso'] = $this->uri->segment(3);
		$data['listing'] = $this->db->query("select a.*,b.* from t_invoice a 
		left join m_customer b on b.id = a.id_customer where a.no_invoice =  '".$this->uri->segment(3)."' ")->row();

		$data['items'] = $this->db->query("select a.*,b.id as idlist,c.nama_barang,c.harga,b.qty from t_invoice a
		inner join t_invoice_detail b on b.no_invoice = a.no_invoice
		inner join m_barang c on c.id = b.id_barang
		where a.no_invoice = '".$this->uri->segment(3)."'  ")->result();
		$this->load->view('listcart/invoice_print',$data);


	}
    public function listingdetail(){  
 
		$no_invoice =  $this->input->post('no_invoice');
		 
		$sql = "select a.*,b.nama_barang,b.harga,c.nama_kategori from t_invoice_detail a
		left join m_barang b on b.id = a.id_barang
		left join m_kategori c on c.id = b.id_kat 
					where a.no_invoice = '".$no_invoice."' ";
		  $exsql = $this->db->query($sql)->result();
		
			$dataparse = array();  
			$no = 1;
			 foreach ($exsql as $key => $value) {  
				  $sub_array['no'] = $no;
				  $sub_array['nama_barang'] = $value->nama_barang;  
				  $sub_array['nama_kategori'] = $value->nama_kategori;
				  $sub_array['qty'] = $value->qty;
				  $sub_array['harga'] = $value->harga;
				  $sub_array['total'] = ($value->qty * $value->harga); 
				 array_push($dataparse,$sub_array); 
				 $no++;
			  }  
		 
		  echo json_encode($dataparse);
   
	  }

	  public function cetak_report(){
		echo 'asoy';
	  }
	  
	  public function detailmodal(){
		$no_invoice = $this->uri->segment(3);
		 
		$sql = "select a.*,b.full_name,b.alamat,b.email,b.telp from t_invoice a
		left join m_customer b on b.id = a.id_customer where a.no_invoice = '".$no_invoice."' ";
		$parse = $this->db->query($sql)->row();
		echo json_encode($parse,TRUE);
	  }
	public function delete(){
		$id = $this->uri->segment(3);
		$noinv = $this->uri->segment(4);
		$this->db->query("delete from t_invoice_detail where no_invoice = '".$noinv."' and id = '".$id."' ");
		$this->db->query("delete from t_invoice where no_invoice = '".$noinv."' ");

		echo "<script language=javascript>
		alert('Barang dihapus dari keranjang belanja!');
		window.location='" . base_url('listcart') . "';
		</script>";
	}
	public function get_detail(){
		$id = $this->uri->segment(3);
		$sql = "select a.*,b.nama_kategori from m_barang a
				LEFT JOIN m_kategori b on b.id = a.id_kat where a.id = '".$id."' ";
		$get = $this->db->query($sql)->row();
		echo json_encode($get,TRUE);
	}

	public function checkout(){
		$no_invoice = $this->uri->segment(3);
		$arr = array('status'=>1,'is_checkout'=>2);
		$sql = $this->db->set($arr)->where('no_invoice',$no_invoice)->update('t_invoice');
		 
		if($sql){
			echo 1;
		}else{
			echo 2;
		}
	 
	}

	public function carting(){
		$email = $this->session->userdata('email');
		$id_barang = $this->input->post('id_barang');
		$qty = $this->input->post('qty');
		//cek invoice dari akun ini yang udah cart
		//kalau dia belum menyelesaikan 1 invoice aja ,maka dia akan meneruskan invoice tsb sampai checkout

		$sql = $this->db->query("select * from t_invoice where id_customer = '".$this->session->userdata('userid')."' AND status = 1 ");
		//kalo ada
		if($sql->num_rows() > 0){ 

		$exsql = $sql->row();
	 
		$this->db->query("insert into t_invoice_detail (no_invoice,id_barang,qty) VALUES ('".$exsql->no_invoice."','".$id_barang."','".$qty."') ");
		
		echo "<script language=javascript>
		alert('Berhasil dimasukkan ke keranjang belanja!');
		window.location='" . base_url('listcart') . "';
		</script>";

		//kalo ga ada ya bikin nomer baru
		}else{

			$newid = $this->get_last_id();

			//store new id
			$this->db->query("insert into t_invoice (no_invoice,date_assign,id_customer,status) VALUES ('".$newid."','".date('Y-m-d')."','".$this->session->userdata('userid')."','1')");
			
			//store item to detail
			$this->db->query("insert into t_invoice_detail (no_invoice,id_barang,qty) VALUES ('".$newid."','".$id_barang."','".$qty."') ");
			
			echo "<script language=javascript>
			alert('Berhasil dimasukkan ke keranjang belanja!');
			window.location='" . base_url('listcart') . "';
			</script>";
	

		}
		
	}
	 


	public function get_last_id(){
		$params = date('Ymd');
		//echo $this->transaksi_id($params); 
		$dataid = $this->transaksi_id($params); 
		return $dataid;
	
	}


     
	public function transaksi_id($param = '') {
        $data = $this->m_listcart->get_no();
        $lastid = $data->row();
        $idnya = $lastid->id;


        if($idnya == '') { // bila data kosong
            $ID = $param . "0000001";
            //00000001
        }else {
            $MaksID = $idnya;
            $MaksID++;
            if ($MaksID < 10)
                $ID = $param . "000000" . $MaksID;
            else if ($MaksID < 100)
                $ID = $param . "00000" . $MaksID;
            else if ($MaksID < 1000)
                $ID = $param . "0000" . $MaksID;
            else if ($MaksID < 10000)
                $ID = $param . "000" . $MaksID;
            else if ($MaksID < 100000)
                $ID = $param . "00" . $MaksID;
            else if ($MaksID < 1000000)
                $ID = $param . "0" . $MaksID;
            else
                $ID = $MaksID;
        }

        return $ID;
    }  	
	public function autentikasi(){
	 
		$username = $this->input->post('username');
		$password = base64_encode($this->input->post('password'));
		$posisi = $this->input->post('posisi');
	
		$list = array("username"=>$username,"password"=>$password,"posisi"=>$posisi);
			 
			$auth = $this->m_listcart->autentikasi($username,$password);
			 
			$session = $this->m_listcart->autentikasi($username,$password)->row();
			 
			if($auth->num_rows() > 0){
				$this->session->set_userdata(array('username'=>$session->username,'session'=>$posisi));
				redirect(base_url('dashboard'));
			}else{
				echo "<script language=javascript>
				alert('Akun yang anda masukkan tidak tersedia, Periksa kembali!');
				window.location='" . base_url('listcart') . "';
				</script>";
			}
		 
	}

	public function logout(){
		$this->session->sess_destroy();
		echo "<script language=javascript>
             alert('Anda telah keluar dari ".$this->data['judul']." ');
             window.location='" . base_url('listcart') . "';
             </script>";
		 
	}

	 
	public function savepayment(){
    
 
		$nosoz = $this->input->post('nosoz');
		$simpan_data = $this->db->query("update t_invoice set bukti_bayar = '".$this->input->post('foto')."', status = 2, date_paid = '".date('Y-m-d')."' where no_invoice = '".$nosoz."' ");
		 
		$simpan_foto = $this->upload_payment(); 
		
			if($simpan_data && $simpan_foto){
				$result = array("response"=>array('message'=>'success'));
			}else{
				$result = array("response"=>array('message'=>'failed'));
			}
			
			echo json_encode($result,TRUE);
	
		}
	 
	  function upload_payment(){  
		if(isset($_FILES["user_image"])){  
			$extension = explode('.', $_FILES['user_image']['name']);   
			$destination = './upload/' . $_FILES['user_image']['name'];  
			return move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
			 
		}  
	  }  
}
