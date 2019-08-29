<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Front extends Parent_Controller {
 
  	var $nama_tabel = 'm_user';
  	var $daftar_field = array('id','id_user','username','password','user_insert','date_insert','user_update','date_update');
  	var $primary_key = 'id';

 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_front');
 	}
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['listcat'] = $this->db->get('m_kategori')->result();
		$data['listitem'] = $this->db->query("select a.*,b.nama_kategori from m_barang a
		left join m_kategori b on b.id = a.id_kat ")->result();

		$count_cart  = $this->db->query("select a.* from t_invoice a
		inner join t_invoice_detail b on b.no_invoice = a.no_invoice where a.id_customer = '".$this->session->userdata('userid')."' and STATUS  = 1")->num_rows();
		$data['count_cart'] = $count_cart;
		$this->load->view('front/front_view',$data);
	}

	public function get_detail(){
		$id = $this->uri->segment(3);
		$sql = "select a.*,b.nama_kategori from m_barang a
				LEFT JOIN m_kategori b on b.id = a.id_kat where a.id = '".$id."' ";
		$get = $this->db->query($sql)->row();
		echo json_encode($get,TRUE);
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
		window.location='" . base_url('front') . "';
		</script>";

		//kalo ga ada ya bikin nomer baru
		}else{

			$newid = $this->get_last_id();

			//store new id
			$this->db->query("insert into t_invoice (no_invoice,date_assign,id_customer,status,is_checkout) VALUES ('".$newid."','".date('Y-m-d')."','".$this->session->userdata('userid')."','1','1')");
			
			//store item to detail
			$this->db->query("insert into t_invoice_detail (no_invoice,id_barang,qty) VALUES ('".$newid."','".$id_barang."','".$qty."') ");
			
			echo "<script language=javascript>
			alert('Berhasil dimasukkan ke keranjang belanja!');
			window.location='" . base_url('front') . "';
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
        $data = $this->m_front->get_no();
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
			 
			$auth = $this->m_front->autentikasi($username,$password);
			 
			$session = $this->m_front->autentikasi($username,$password)->row();
			 
			if($auth->num_rows() > 0){
				$this->session->set_userdata(array('username'=>$session->username,'session'=>$posisi));
				redirect(base_url('dashboard'));
			}else{
				echo "<script language=javascript>
				alert('Akun yang anda masukkan tidak tersedia, Periksa kembali!');
				window.location='" . base_url('front') . "';
				</script>";
			}
		 
	}

	public function logout(){
		$this->session->sess_destroy();
		echo "<script language=javascript>
             alert('Anda telah keluar dari ".$this->data['judul']." ');
             window.location='" . base_url('front') . "';
             </script>";
		 
	}
}
