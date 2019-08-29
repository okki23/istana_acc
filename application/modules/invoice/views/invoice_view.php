 
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                 
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Invoice
                            </h2>
                            <!-- <br>
                            <a href="javascript:void(0);" id="addmodal" class="btn btn-primary waves-effect">  <i class="material-icons">add_circle</i>  Tambah Data </a> -->
                            
                        </div>
                        <div class="body"> 
                           
                             <div class="table-responsive">
                               <table class="table table-bordered table-striped table-hover js-basic-example" id="example" > 
                                    <thead>
                                        <tr>
                                            <th style="width:1%;">No Invoice</th>  
                                            <th style="width:2%;">Customer</th> 
                                            <th style="width:5%;">Tanggal Checkout</th>
                                            <th style="width:5%;">Paid</th> 
                                            <th style="width:10%;">Opsi</th> 
                                        </tr>
                                    </thead> 
                                </table> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         


        </div>
    </section>

    
 
    <!-- modal resi -->
    <div class="modal fade" id="ResiFormModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" >Kirim No Resi</h4>
                        </div>
                        <div class="modal-body">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">X Tutup</button>

                                <br>
                                <hr>
                            
                                <form method="post" id="user_form_resi" enctype="multipart/form-data">   
                                  
                                 <input type="hidden" name="no_invoiceresi" id="no_invoiceresi">    

                                    <div class="input-group">
                                    <label> Masukkan No Resi : </label>
                                            <div class="form-line">
                                                <input type="text" name="no_resi" id="no_resi" class="form-control" placeholder="Masukkan no resi" >
                                                 
                                            </div>
                                          
                                    </div>

                                <button type="button" onclick="Simpan_DataResi();" class="btn btn-success waves-effect"> <i class="material-icons">save</i> Simpan </button>
 
                                </form>

                       </div>
                     
                    </div>
                </div>
    </div>

	
	
	<!-- detail data -->
	<div class="modal fade" id="DetailModal" tabindex="-1" role="dialog">
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

                            <br>

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
            
    
       
   <script type="text/javascript">
   
   function Simpan_DataResi(){
        //setting semua data dalam form dijadikan 1 variabel 
         var formDataResi = new FormData($('#user_form_resi')[0]); 
           
         var no_resi = $("#no_resi").val();
           
        if(no_resi == ''){
            alert("Nomor Resi Belum anda masukkan!");
            $("#no_resi").parents('.form-line').addClass('focused error');
            $("#no_resi").focus();
        }else{
            $.ajax({
             url:"<?php echo base_url(); ?>invoice/setup_resi",
             type:"POST",
             data:formDataResi,
             contentType:false,  
             processData:false,   
             success:function(result){ 
                
                 $("#ResiFormModal").modal('hide');
                 $('#example').DataTable().ajax.reload();  
                 $('#user_form_resi')[0].reset();
                 Bersihkan_Form();
                 $.notify("Nomor resi berhasil dikirim!", {
                    animate: {
                        enter: 'animated fadeInRight',
                        exit: 'animated fadeOutRight'
                 } 
                 },{
                    type: 'success'
                });
             }
            }); 

  
        }
            

    }



   

    // cari direktorat
    $('#daftar_instansi').DataTable( {
            "ajax": "<?php echo base_url(); ?>instansi/fetch_instansi"           
    });

     
    function SendResi(noinv){
        $("#no_invoiceresi").val(noinv);

        $("#ResiFormModal").modal({backdrop: 'static', keyboard: false,show:true});
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

	 function Show_Detail(no_invoice){ 
		$("#DetailModal").modal({backdrop: 'static', keyboard: false,show:true});

        $('#tabeldetail').DataTable({
            "processing" : true,
            "ajax" : {
                "url" : "<?php echo base_url('invoice/listingdetail'); ?>",
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
			 url:"<?php echo base_url(); ?>invoice/detailmodal/"+no_invoice,
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
                 
			 }
		 });
	 }
       
  
     function defaultModalChildClose(){
        $("#defaultModalChild").modal('hide'); 
     }
     function CloseModalDetail(){
        $("#defaultModalChild").modal('hide'); 
     }
        $("#addmodal").on("click",function(){
          $("#defaultModal").modal({backdrop: 'static', keyboard: false,show:true});
          $("#defaultModalLabel").html("Form Tambah Data");
            var no_transaksi = $("#no_transaksi").val();
         
        
          $.ajax({
          url:"<?php echo base_url('invoice/get_last_id'); ?>",
          type:"GET",
          data:{id:1},
          success:function(result){

            $("#no_transaksi").val(result);

            $.get("<?php echo base_url('invoice/datalist/'); ?>"+result, function(data) {
                //console.log(data); 
                $("#datalist").html(data);
            });
          
          } 
          }); 
          
        });

          
 
        
     function Bersihkan_Form(){
        $(':input').val('');  
     }
 

    function Bersihkan_Form_Order(){
        
        var no_transaksi = $("#no_transaksi").val();
        swal({
        title: "Anda yakin ingin membatalkan transaksi ini?",
        text: "ini akan membatalkan transaksi "+no_transaksi+" !",
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
                $.ajax(
                    {
                        type: "POST",
                        url: "<?php echo base_url('invoice/'); ?>hapus_no_transaksi",
                        data: {no_transaksi:$("#no_transaksi").val()},
                        success: function(data){
                        }
                    }
                ).done(function(data) {
                    swal("Transaksi Batal!", "Transaksi berhasil dibatalkan", "success");
                    $("#defaultModal").modal('hide');
                    $(':input').val('');  
                    }); 
            }else{
            swal("Lanjut", "Transaksi tetap dilanjutkan", "success");
          }
        });
      
       
    }
  
 

     function Hapus_Data(no_invoice){  
        swal({
        title: "Anda yakin ingin menghapus transaksi ini?",
        text: "ini akan menghapus Invoice : "+no_invoice+" !",
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
                $.ajax(
                    {
                        type: "POST",
                        url: "<?php echo base_url('invoice/'); ?>hapus_data",
                        data: {no_invoice:no_invoice},
                        success: function(data){
                        }
                    }
                ).done(function(data) {
                    swal("Invoice Dihapus!", "Invoice berhasil dibatalkan", "success"); 
                    $('#example').DataTable().ajax.reload(); 
                    $("#defaultModal").modal('hide'); 
                    $(':input').val('');  
                    }); 
            }else{
            swal("Batal", "Data Tidak Dihapus!", "info");
          }
        }); 
 
    }
    
        
  
    $(document).ready(function() {  
       
      $('#example').DataTable({
        "ajax": "<?php echo base_url(); ?>invoice/fetch_invoice_list" 
      }); 
 
      });
  
        
         
    </script>