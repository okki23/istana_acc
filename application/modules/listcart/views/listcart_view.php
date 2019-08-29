<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

 <!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title> Istana Acessories  </title>
    <!-- Favicon-->
    <link rel="stylesheet" type="text/css" href="assets_front/styles/bootstrap4/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets_front/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets_front/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets_front/plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets_front/styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets_front/styles/responsive.css">
    <link href="<?php echo base_url(); ?>assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/sweetalert.css" rel="stylesheet">
   

</head>
<body>
 
<div class="super_container">

<!-- Header -->

<header class="header trans_300">

    <!-- Top Navigation -->

    <div class="top_nav">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="top_nav_left">free shipping on all u.s orders over $50</div>
                </div>
               
            </div>
        </div>
    </div>

    <!-- Main Navigation -->

    <div class="main_nav_container">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-right">
                    <div class="logo_container">
                         <img src="<?php echo base_url('upload/isclogo.png'); ?>" width="500px">
                    </div>
                    <nav class="navbar">
                        <ul class="navbar_menu">
                        <li><a href="<?php echo base_url('front'); ?>">home</a></li>
                      
                        <li><a href="<?php echo base_url('contact'); ?>">contact</a></li>
                            <?php 
                            if($this->session->userdata('email')){
                                echo ' <li><a href="javascript:void(0);">Welcome '.$this->session->userdata('full_name').'!</a></li>';
                            }else{
                                echo ' <li><a href="'.base_url('loginfront').'">Login</a></li>';
                            }
                            ?>
                           
                        </ul>
                        <ul class="navbar_user">
                            <?php
                            if($this->session->userdata('email')){
                            ?>

                                <li class="checkout">
                                <a href="<?php echo base_url('loginfront/logout'); ?>">
                                <i class="fa fa-unlock" aria-hidden="true"></i> 
                                </a>
                                </li>
                            
                            <li class="checkout">
                                <a href="#">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span id="checkout_items" class="checkout_items"> <?php echo $count_cart; ?></span>
                                </a>
                            </li>
                            <?php
                            }else{
                            ?>
                            
                            
                            <?php
                            }
                            ?>
                      
                            
                        </ul>
                        <div class="hamburger_container">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

</header>

<div class="fs_menu_overlay"></div>
<div class="hamburger_menu">
    <div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
    <div class="hamburger_menu_content text-right">
        <ul class="menu_top_nav">
           
            <li class="menu_item has-children">
                <a href="#">
                    My Account
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="menu_selection">
                    <li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
                    <li><a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
                </ul>
            </li>
            <li class="menu_item"><a href="<?php echo base_url('front'); ?>">home</a></li>
           
           <li class="menu_item"><a href="<?php echo base_url('contact'); ?>">contact</a></li>
        </ul>
    </div>
</div>

 
<div class="container contact_container">
		<div class="row">
			<div class="col">

				<!-- Breadcrumbs -->

			 

			</div>
		</div>

		<!-- Map Container -->

		<div class="row" >
			<div class="col" style="margin-top:180px;">
            
            <h4 align="center"> Order History </h4>
            <br>
            
			</div>
        </div>
        

        
<section id="tabs" class="project-tab">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- <a href="javascript:void(0);" id="asu" class="btn btn-primary"> Jancuk! </a> -->
                         <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Keranjang Belanja</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Order History</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Confirm Payment</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                               
                                <table class="table table-bordered table-hovered">
                                    <tr>
                                        <th> No </th>
                                        <th> Nama Barang </th>
                                        <th> Jumlah </th>
                                        <th> Harga </th>
                                        <th> Opsi </th>
                                    </tr>
                                    <?php
                                    $no=1;
                                    $tot=0;
                                    if($listing->num_rows() > 0){

                                        foreach($listing->result() as $key=>$value){
                                            echo '<tr> 
                                            <td>'.$no.'</td>
                                            <td>'.$value->nama_barang.'</td>
                                            <td>'.$value->qty.'</td>
                                            <td> Rp. '.number_format(($value->harga) * ($value->qty)).'</td>
                                            <td> <a href='.base_url('listcart/delete/'.$value->idlist.'/'.$value->no_invoice).' class="btn btn-danger btn-xs"> <i class="fa fa-trash" aria-hidden="true"></i> Hapus </a></td>
                                            </tr>';
                                    $no++;
                                    $tot+=($value->harga*$value->qty);
                                        }
                                        echo '<tr> 
                                        <td colspan="3"> Total </td>
                                        <td colspan="2"> Rp. '.number_format($tot).'</td>
                                        </tr>';
                                        echo '<tr>
                                        <td colspan="5"> 
                                        
                                        <input type="hidden" name="activeinvoice" id="activeinvoice" value="'.$activenoinv.'">
                                        <button type="button" id="checkouts" class="btn btn-block btn-primary" > <i class="fa fa-shopping-cart" aria-hidden="true"></i> Checkout Item(s) </button>
                                        </td>
                                        </tr>';
                                    }else{
                                        
                                        echo '<tr>
                                        <td colspan="5"> Tidak Ada Data </td>
                                        </tr>';
                                    }
                                    
                                    ?>
                                    </table>
                                    <br>
                                    
                                    
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                   
                                <table class="table table-bordered table-hovered">
                                    <tr>
                                        <th> No </th>
                                        <th> No Invoice </th>
                                        <th> Status </th>
                                        <th> Opsi </th>
                                        
                                    </tr>
                                    <?php
                                    $nos=1;
                               
                                    if($history->num_rows() > 0){

                                        foreach($history->result() as $keys=>$values){
                                            echo '<tr> 
                                            <td>'.$nos.'</td>
                                            <td>'.$values->no_invoice.'</td>
                                            <td>'.status_paid($values->status).'</td> 
                                            <td> <a href="javascript:void(0)" onclick="Show_Detail('.$values->no_invoice.');">   Detail </a> </td> 
                                            </tr>';
                                    $nos++;
                                        }
                                    }else{
                                        echo '<tr>
                                        <td colspan="4"> Tidak Ada Data </td>
                                        </tr>';
                                    }
                                    ?>
                                    </table>
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            
                            <table class="table table-bordered table-hovered">
                                    <tr>
                                        <th> No </th>
                                        <th> No Invoice </th>
                                        <th> Status </th>
                                        <th> Opsi </th>
                                        
                                    </tr>
                                    <?php
                                    $no=1;
                                    $tot=0;
                                    if($payment->num_rows() > 0){
                                         
                                        foreach($payment->result() as $keyz=>$valuez){
                                            echo '<tr> 
                                            <td>'.$no.'</td>
                                            <td>'.$valuez->no_invoice.'</td>
                                            <td>'.status_paid($valuez->status).'</td>';
                                            if($valuez->status == '2' ){
                                                echo '<td>  Paid  </td>';
                                            }else{
                                                echo '<td> <a href="javascript:void(0)" onclick="OpenPayment('.$valuez->no_invoice.');">   Upload Bukti Bayar </a> </td>';
                                            }
                                             
                                            echo '</tr>';
                                    $no++;
                                        }
                                    }else{
                                        echo '<tr>
                                        <td colspan="4"> Tidak Ada Data </td>
                                        </tr>';
                                    }
                                    ?>
                                    </table> 
                            
                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                        
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            Form Upload Bukti Bayar
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        
                                            </div>
                                            <div class="modal-body">

                                            <form method="post" id="user_form_payment" enctype="multipart/form-data">   
                                            <input type="hidden" name="nosoz" id="nosoz"> 
                                            
                                             
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        Upload Foto 
                                                        <input type="file" name="user_image" id="user_image" class="form-control" onchange="PreviewGambar(this);" placeholder="Foto" />  
                                                    </div>
                                                    <input type="hidden" name="foto" id="foto">
                                                </div>
                                                <br>
                                                <img onerror="this.onerror=null;this.src='<?php echo base_url('upload/image_prev.jpg'); ?>';" id="image1" src="<?php echo base_url('upload/image_prev.jpg');?>" style="height: 300px;" alt="..." class="img-rounded img-responsive">
                                            <br>
                                            <button type="button" onclick="SavePayment();" class="btn btn-success waves-effect"> Simpan</button>

                                   <button type="button" name="cancel" id="cancel" class="btn btn-danger waves-effect" onclick="javascript:Bersihkan_Form();" data-dismiss="modal">  Batal</button>
                                            </form>
                                            

                                            </div>
                                            
                                        </div>
                                        
                                        </div>
                                    </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
  

	</div>
<!-- Footer -->

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                
            </div>
            <div class="col-lg-6">
                <div class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer_nav_container">
                    <div class="cr">©2018 All Rights Reserverd. This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#">Colorlib</a></div>
                </div>
            </div>
        </div>
    </div>
</footer>

</div> 

    <!-- detail data -->
	<div class="modal fade" id="DetailModalInvoice" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Detail Invoice</h4>
                            <div class="modal-footer">
							  <button type="button" class="btn btn-danger" data-dismiss="modal"> X Tutup </button>
							</div>
                             
                        </div>
                        <div class="modal-body">

                        <div class="row clearfix">

                        <div class="col-lg-12">

                            <table class="table table-responsive">
                            <tr>
                                <td style="font-weight:bold;"> No Invoice</td>
                                <td> : </td>
                                <td> <p id="noinvdtl"> </p> </td>
                                
                                <td style="font-weight:bold;"> Nama Customer</td>
                                <td> : </td>
                                <td> <p id="nmcustdtl"> </p> </td> 
                            </tr>
                            
                            <tr>
                                <td style="font-weight:bold;"> Tanggal Terbit Invoice</td>
                                <td> : </td>
                                <td> <p id="dateassigndtl"> </p> </td>
                                
                                <td style="font-weight:bold;"> Status </td>
                                <td> : </td>
                                <td> <p id="statusdtl"> </p> </td> 
                            </tr>

                            
                            <tr>
                                <td style="font-weight:bold;"> Tanggal Pembayaran  </td> 
                                <td> : </td>
                                <td> <p id="datepaiddtl"> </p> </td>

                                <td style="font-weight:bold;"> No Resi </td>
                                <td> : </td>
                                <td> <p id="noresidtl"> </p> </td> 
                               
                            </tr> 
                            <tr>
                                <td colspan="6">  </td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;"> Alamat  </td> 
                                <td> : </td>
                                <td> <p id="alamatdtl"> </p> </td>
                                <td style="font-weight:bold;"> Telp </td>
                                <td> : </td>
                                <td> <p id="telpdtl"> </p> </td>
                            </tr> 
                            </table> 

                       

                            <table width="100%" class="table table-bordered table-striped table-hover " id="tabeldetail" > 
                                    <thead>
                                        <tr>  
                                            <th style="width:15%;">No</th> 
                                            <th style="width:15%;">Nama Barang</th> 
                                            <th style="width:15%;">Kategori</th> 
                                            <th style="width:15%;">Qty</th> 
                                            <th style="width:15%;">Harga Satuan </th> 
                                            <th style="width:15%;">Total Harga </th> 
                                         </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>  
                                    <tfoot>
                                    <tr>
                                        <th colspan="5" style="text-align:right">Total:</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>  

                        </div>
 
                  
					   </div>
                     
                    </div>
                </div>
    </div>
 
 
  
    <script src="<?php echo base_url(); ?>assets_front/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets_front/styles/bootstrap4/popper.js"></script>
    <script src="<?php echo base_url(); ?>assets_front/styles/bootstrap4/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets_front/plugins/Isotope/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url(); ?>assets_front/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="<?php echo base_url(); ?>assets_front/plugins/easing/easing.js"></script>
    <script src="<?php echo base_url(); ?>assets_front/js/custom.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/sweetalert.js"></script> 
     
     <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
     <script src="<?php echo base_url(); ?>js/jquery.dataTables.min.js"></script>
     <script src="<?php echo base_url(); ?>js/dataTables.buttons.min.js"></script> 
     <script src="<?php echo base_url(); ?>assets/js/dataTables.rowsGroup.js"></script>
     <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script> 
    <script type="text/javascript">
    function Bersihkan_Form(){
        $(':input').val(''); 
        $("#image1").attr('src','<?php echo base_url('upload/image_prev.jpg'); ?>');
     }

     function PreviewGambar(input) {
        if (input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image1').attr('src', e.target.result);
                $('#image1').attr('class','img-responsive');
               
                $("#foto").val($('#user_image').val().replace(/C:\\fakepath\\/i, ''));
            };
            reader.readAsDataURL(input.files[0]);
            
        }
     }
      
    function Kunyuk(){
    //$("#exampleModal").modal('show');
 
    }
    
            function addCommas(nStr){
            nStr += '';
            x = nStr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2;
            }
            function OpenPayment(noso){
                
                $("#myModal").modal();
                $("#nosoz").val(noso);
            }
        $(document).ready(function() { 

            


            $("#checkouts").on("click",function(){
            
            var noinvoice = $("#activeinvoice").val();

            swal({
            title: "Anda yakin ingin mengkonfirmasi pesanan beserta pengiriman  transaksi ini?",
            text: "ini akan menyimpan transaksi dengan nomor order "+noinvoice+" !",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
            closeOnConfirm: false,
            
            closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                    url : "<?php echo base_url('listcart/checkout'); ?>/"+noinvoice,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data){
                        if(data == 1){
                            location.reload();
                        } 
                    }
                    }); 

                    window.open('<?php echo base_url('listcart/cetak_invoice/'); ?>'+window.btoa(noinvoice), 'print_invoice', 'width=1366, height=768, status=1,scrollbar=yes'); 
 
                swal("Lanjut", "Transaksi selesai", "success");
                
                }else{
                swal("Lanjut", "Transaksi tetap dilanjutkan", "success");
            }
            });
 
            }); 
        });


        function Show_Detail(no_invoice){ 
		$("#DetailModalInvoice").modal({backdrop: 'static', keyboard: false,show:true});

        $('#tabeldetail').DataTable({
            "processing" : true,
            "ajax" : {
                "url" : "<?php echo base_url('listcart/listingdetail'); ?>",
                "data":{no_invoice},
                "type":"POST",
                dataSrc : '',

            },
            
            "columns" : [ {
                "data" : "no"
            },{
                "data" : "nama_barang"
            },
            {
                "data" : "nama_kategori"
            },
            {
                "data" : "qty"
            },
            {
                "data" : "harga"
            },
            {
                "data" : "total"
            }],

            "rowReorder": {
                "update": false
            },

            "destroy":true,
            "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column(5)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 5, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 5 ).footer() ).html(
                'Rp. '+addCommas(pageTotal)
            );
        }
        });
    

		$.ajax({
			 url:"<?php echo base_url(); ?>listcart/detailmodal/"+no_invoice,
			 type:"GET",
			 dataType:"JSON", 
			 success:function(result){  
                 
                 $("#noinvdtl").html(result.no_invoice);
                 $("#nmcustdtl").html(result.full_name);
                 $("#dateassigndtl").html(result.date_assign); 
                 $("#datepaiddtl").html(result.date_paid); 
                 $("#alamatdtl").html(result.alamat); 
                 $("#telpdtl").html(result.telp); 
                 $("#noresidtl").html(result.no_resi); 
                if(result.status == 1){
                    $("#statusdtl").html('Not Paid'); 
                }else{
                    $("#statusdtl").html('Paid'); 
                }
                  
                 
			 }
		 });
     }
     
     
    function ShowUploadForm(){ 
	 
    $("#exampleModal").modal({backdrop: 'static', keyboard: false,show:true});
     }
     


	function SavePayment(){
	 
     var formData = new FormData($('#user_form_payment')[0]); 
 
        $.ajax({
         url:"<?php echo base_url(); ?>listcart/savepayment",
         type:"POST",
         data:formData,
         contentType:false,  
         processData:false,   
         success:function(result){ 
            
             $("#myModal").modal('hide');
          
             $('#user_form_payment')[0].reset();
             $("#image1").attr("src","<?php echo base_url(); ?>/upload/image_prev.jpg");
             alert('Upload Bukti Transfer Berhasil');
             location.reload();
           
         }
        }); 

     

}
 
 
    function Carting(id){
        $("#id_barang").val(id);
 
        var ses = '<?php echo $this->session->userdata('email'); ?>';
        if(!ses){
            alert('anda tidak dapat membeli sebelum anda login!');
        }else{
          
            $("#CartModal").modal({backdrop: 'static', keyboard: false,show:true});
            $.ajax({
                url:"<?php echo base_url(); ?>front/get_detail/"+id,
                type:"GET",
                dataType:"JSON", 
                success:function(result){ 
                    $("#id").val(result.id);
                    $("#nama_barangdtlx").html(result.nama_barang);
                    $("#nama_kategoridtlx").html(result.nama_kategori);            
                    $("#hargadtlx").html("IDR "+numberWithCommas(result.harga));
                    $("#beratdtlx").html(result.berat+" Gram");
                    $("#stockdtlx").html(result.stock);
                    $("#keterangandtlx").html(result.keterangan); 
                    //$("#fotodtl").html(result.foto); 
                    $("#foto_dtlx").attr("src","upload/"+result.foto);
                    
                }
            });
        }
    }
    function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
    function ShowDetail(id){
    
        $("#DetailModal").modal({backdrop: 'static', keyboard: false,show:true});
 
            $.ajax({
                url:"<?php echo base_url(); ?>front/get_detail/"+id,
                type:"GET",
                dataType:"JSON", 
                success:function(result){ 
                    $("#id").val(result.id);
                    $("#nama_barangdtl").html(result.nama_barang);
                    $("#nama_kategoridtl").html(result.nama_kategori);            
                    $("#hargadtl").html("IDR "+numberWithCommas(result.harga));
                    $("#beratdtl").html(result.berat+" Gram");
                    $("#stockdtl").html(result.stock);
                    $("#keterangandtl").html(result.keterangan); 
                    //$("#fotodtl").html(result.foto); 
                    $("#foto_dtl").attr("src","upload/"+result.foto);
                    
                }
            });
    }
    </script>
</body>

</html>