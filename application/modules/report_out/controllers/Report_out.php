<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Report_out extends Parent_Controller {
 
  var $nama_tabel = 'm_report_out';
  var $daftar_field = array('id','nama_report_out');
  var $primary_key = 'id';
  
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_report_out'); 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	}
 
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'report_out/report_out_view';
		$this->load->view('template_view',$data);		
   
	} 

 
	 
	public function print(){  
		
		$from = $this->input->post('from');
		$to = $this->input->post('to');
 
		$filename ="Report.xls";
		header('Content-type: application/ms-excel');
		header('Content-Disposition: attachment; filename='.$filename);
		
		$sql = "select a.*,b.id as idlist,c.nama_barang,c.harga,b.qty,d.full_name from t_invoice a
		inner join t_invoice_detail b on b.no_invoice = a.no_invoice
		inner join m_barang c on c.id = b.id_barang
		inner join m_customer d on d.id = a.id_customer
		where a.date_assign BETWEEN '".$from."' AND '".$to."' ";

		$exsql = $this->db->query($sql)->result();
		echo ' 
		<table width="100%" border="1" cellpadding="3" cellspacing="0"> 
		<tr>
			<th> No Invoice </th>
			<th> Nama Customer</th>
			<th> Status </th>
			<th> Tanggal Bayar </th>
			<th> No Resi </th> 
		</tr> 
		'; 
		$st = 0;
		foreach($exsql as $k=>$v){
		echo '
		<tr> 
			<td>'."'".$v->no_invoice.'</td>
			<td>'.$v->full_name.'</td>
			<td>'.status_paid($v->status).'</td>
			<td>'.$v->date_paid.'</td>
			<td>'.$v->no_resi.'</td> 
		</tr> 
	 
		<tr>
		<td colspan="7"><b> Detail </b> </td>
		</tr>
			
		<tr>
				 <td> <b> Nama Barang </b> </td>
				 <td> <b> Qty </b> </td>
				 <td> <b> Harga Satuan </b> </td>
				 <td colspan = 2> <b> Total  </b> </td>
				 
				
			 </tr>';

			 $listdetail = $this->db->query("select a.*,b.nama_barang,b.harga from t_invoice_detail a
			 left join m_barang b on b.id = a.id_barang where a.no_invoice = '".$v->no_invoice."' ");
			foreach($listdetail->result() as $ky=>$vy){
				$st+=($vy->harga * $vy->qty);
				echo '
				<tr>
					<td>'.$vy->nama_barang.'</td>
					<td align="center"> '.$vy->qty.'</td>
					<td align="center"> Rp. ' .number_format($vy->harga).'</td>
					<td colspan = 2 align="center"> Rp. '.number_format(($vy->qty * $vy->harga)).'</td>
				 
				</tr>';
			}
			echo '
			<tr>
				 
					<td colspan="3" align="center"> <b>Total </b> </td>
					<td colspan="2" align="center"  align="center"> Rp. '.number_format($st).'</td> 
				</tr>';
	 
	 
	 
		 echo ' 
		 <tr>
			<td colspan="5" style="background-color:blue;"> &nbsp; </td> 
		</tr>
		  ';
		}
		 
		echo '</table>';

	}
	

	public function report_out_out(){

	}
 


}
