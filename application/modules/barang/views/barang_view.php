 
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
                                Barang
                            </h2>
                            <br>
                            <a href="javascript:void(0);" id="addmodal" class="btn btn-primary waves-effect">  <i class="material-icons">add_circle</i>  Tambah Data </a>
 
                        </div>
                        <div class="body">
                                
                            <div class="table-responsive">
							   <table class="table table-bordered table-striped table-hover js-basic-example" id="example" >
									<thead>
										<tr> 
											<th style="width:5%;">Barang</th>
                                            <th style="width:5%;">Kategori</th> 
                                            <th style="width:5%;">Stock</th> 
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

   
	<!-- form tambah dan ubah data -->
	<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Form Tambah Data</h4>
                        </div>
                        <div class="modal-body">
                              <form method="post" id="user_form" enctype="multipart/form-data">   
                                 
                                    <input type="hidden" name="id" id="id"> 
                                    <!-- hidden -->
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nama_barang" id="nama_barang" class="form-control" placeholder="Nama Barang" />
                                        </div>
                                    </div>

									<div class="input-group">
                                                <div class="form-line">
                                                    <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" required readonly="readonly" >
                                                    <input type="hidden" name="id_kat" id="id_kat" required>
                                                    
                                                </div>
                                                <span class="input-group-addon">
                                                    <button type="button" onclick="CariKategori();" class="btn btn-primary"> Pilih Kategori... </button>
                                                </span>
                                    </div>

									<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="harga" id="harga" class="form-control" placeholder="Harga" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="berat" id="berat" class="form-control" placeholder="Berat (Gram)" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="stock" id="stock" class="form-control" placeholder="Stock" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan" />
                                        </div>
                                    </div>

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
									 

								   <button type="button" onclick="Simpan_Data();" class="btn btn-success waves-effect"> <i class="material-icons">save</i> Simpan</button>

                                   <button type="button" name="cancel" id="cancel" class="btn btn-danger waves-effect" onclick="javascript:Bersihkan_Form();" data-dismiss="modal"> <i class="material-icons">clear</i> Batal</button>
							 </form>
					   </div>
                     
                    </div>
                </div>
    </div>


    <!-- modal cari kategori -->
    <div class="modal fade" id="CariKategoriModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" >Cari Kategori</h4>
                        </div>
                        <div class="modal-body">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">X Tutup</button>

                                <br>
                                <hr>

                                 <table width="100%" class="table table-bordered table-striped table-hover " id="daftar_kategori" >
  
                                    <thead>
                                        <tr>  
                                            <th style="width:98%;">Nama Kategori </th> 
                                         </tr>
                                    </thead> 
                                    <tbody id="daftar_kategorix">

                                </tbody>
                                </table> 
                       </div>
                     
                    </div>
                </div>
    </div>

    
     <!-- modal detail -->
     <div class="modal fade" id="DetailModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" >Detail</h4>
                        </div>
                        <div class="modal-body">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">X Tutup</button>
                                <br>
                                <hr>
                                <table class="table table-bordered table-hovered">
                                <tr>
                                    <td>Nama Barang</td>
                                    <td>:</td>
                                    <td><div id="nama_barangdtl"> </div></td>
                                </tr>
                                <tr>
                                    <td>Kategori</td>
                                    <td>:</td>
                                    <td><div id="nama_kategoridtl"> </div></td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td>:</td>
                                    <td><div id="hargadtl"> </div></td>
                                </tr>
                                <tr>
                                    <td>Berat</td>
                                    <td>:</td>
                                    <td><div id="beratdtl"> </div></td>
                                </tr>
                                <tr>
                                    <td>Stock</td>
                                    <td>:</td>
                                    <td><div id="stockdtl"> </div></td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td>:</td>
                                    <td><div id="keterangandtl"> </div></td>
                                </tr>
                                <tr>
                                    <td>Foto</td>
                                    <td>:</td>
                                    <td>
                                     
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" align="center">  <img src="" class="img responsive" style="width:50%; height: 50%;" id="foto_dtl"> </td>
                                </tr>
                                </table>
                                 
                       </div>
                     
                    </div>
                </div>
    </div>

			
 
   <script type="text/javascript">
        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

    function Detail(id){
        $("#DetailModal").modal({backdrop: 'static', keyboard: false,show:true});
 
		$.ajax({
			 url:"<?php echo base_url(); ?>barang/get_data_edit/"+id,
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
   

	function PreviewGambar(input) {
        if (input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image1').attr('src', e.target.result);
                $("#foto").val($('#user_image').val().replace(/C:\\fakepath\\/i, ''));
            };
            reader.readAsDataURL(input.files[0]);
            
        }
     }
     

    $('#daftar_kategori').DataTable( {
            "ajax": "<?php echo base_url(); ?>kategori/fetch_kategori"           
    });

     
     
    function CariKategori(){
        $("#CariKategoriModal").modal({backdrop: 'static', keyboard: false,show:true});
    } 
   
        
        var daftar_kategori = $('#daftar_kategori').DataTable();
     
        $('#daftar_kategori tbody').on('click', 'tr', function () {
            
            var content = daftar_kategori.row(this).data()
            console.log(content);
            $("#nama_kategori").val(content[0]);
            $("#id_kat").val(content[2]);
            $("#CariKategoriModal").modal('hide');
        } );
 
       
	 function Ubah_Data(id){
		$("#defaultModalLabel").html("Form Ubah Data");
		$("#defaultModal").modal('show');
 
		$.ajax({
			 url:"<?php echo base_url(); ?>barang/get_data_edit/"+id,
			 type:"GET",
			 dataType:"JSON", 
			 success:function(result){ 
                  
				 $("#defaultModal").modal('show'); 
				 $("#id").val(result.id);
                 $("#nama_barang").val(result.nama_barang);
                 $("#nama_kategori").val(result.nama_kategori);                 
                 $("#id_kat").val(result.id_kat);
                 $("#harga").val(result.harga);
                 $("#berat").val(result.berat);
                 $("#stock").val(result.stock);
                 $("#keterangan").val(result.keterangan); 
                 $('#image1').attr('src',"upload/"+result.foto);
                 $("#foto").val(result.foto); 
                   
			 }
		 });
	 }
 
	 function Bersihkan_Form(){
        $(':input').val(''); 
         
     }

	 function Hapus_Data(id){
		if(confirm('Anda yakin ingin menghapus data ini?'))
        {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo base_url('barang/hapus_data')?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
			   
               $('#example').DataTable().ajax.reload(); 
			   
			    $.notify("Data berhasil dihapus!", {
					animate: {
						enter: 'animated fadeInRight',
						exit: 'animated fadeOutRight'
					}  
				 },{
					type: 'success'
					});
				 
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
   
    }
	}
    
      
  
	function Simpan_Data(){
		//setting semua data dalam form dijadikan 1 variabel 
		 var formData = new FormData($('#user_form')[0]);  
            

            //transaksi dibelakang layar
            $.ajax({
             url:"<?php echo base_url(); ?>barang/simpan_data",
             type:"POST",
             data:formData,
             contentType:false,  
             processData:false,   
             success:function(result){ 
                
                 $("#defaultModal").modal('hide');
                 $('#example').DataTable().ajax.reload(); 
                 $('#user_form')[0].reset();
                 $("#image1").attr("src","<?php echo base_url(); ?>/upload/image_prev.jpg");
                 $.notify("Data berhasil disimpan!", {
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
      
	 
       $(document).ready(function() {
		   
		$("#addmodal").on("click",function(){
			$("#defaultModal").modal({backdrop: 'static', keyboard: false,show:true});
            $("#method").val('Add');
            $("#defaultModalLabel").html("Form Tambah Data");
		});
		 
        $('#example').DataTable({
             
             "ajax": "<?php echo base_url(); ?>barang/fetch_barang",
                 'filterDropDown': {                                       
                         columns: [
                             { 
                                 idx: 1
                             },
                             { 
                                 idx: 2
                             } 
                         ],
                         bootstrap: true
                     } 
         });
 
		 
	  });
  
		
		 
    </script>