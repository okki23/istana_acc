f 
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
                                Data Foto
                            </h2>
                            <br>
                            <a href="javascript:void(0);" id="addmodal" class="btn btn-primary waves-effect">  <i class="material-icons">add_circle</i>  Tambah Data </a>
 
                        </div>
                        <div class="body">
                                
                            <div class="table-responsive">
							   <table class="table table-bordered table-striped table-hover js-basic-example" id="example" >
									<thead>
										<tr>
											<th style="width:5%;">No</th>
                      <th style="width:10%;">Kategori</th>  
											<th style="width:10%;">Caption</th>  
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
                                <div class="input-group">
                                                <div class="form-line">
                                                    <input type="text" name="kategori" id="kategori" class="form-control" required readonly="readonly" >
                                                    <input type="hidden" name="id_kategori" id="id_kategori" required>
                                                    
                                                </div>
                                                <span class="input-group-addon">
                                                    <button type="button" onclick="PilihKategori();" class="btn btn-primary"> Pilih Kategori.. </button>
                                                </span>
                                </div>
                                   
								 
									<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="caption" id="caption" class="form-control" placeholder="Caption" />
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


    <!-- modal cari customer -->
    <div class="modal fade" id="PilihKategoriModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" > Pilih Kategori </h4>
                        </div>
                        <div class="modal-body">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">X Tutup</button>

                                <br>
                                <hr>

                                 <table width="100%" class="table table-bordered table-striped table-hover " id="daftar_kategori" >
  
                                    <thead>
                                        <tr> 
                                            <th style="width:5%;">No</th>
                                            <th style="width:95%;">Kategori</th>
                                             
                                        </tr>
                                    </thead> 
                                    <tbody id="daftar_kategorix">

                                </tbody>
                                </table> 
                       </div>
                     
                    </div>
                </div>
    </div>
	
	<!-- detail data customer -->
	<div class="modal fade" id="DetailModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Detail Foto</h4>
                        </div>
                        <div class="modal-body">
						
						<table class="table table-responsive">
							<tr>
								<td style="font-weight:bold;"> Kategori</td>
								<td> : </td>
								<td> <p id="kategori_dtl"> </p> </td>
								
								<td style="font-weight:bold;"> Caption</td>
								<td> : </td>
								<td> <p id="caption_dtl"> </p> </td> 
							</tr>
							 
							<tr>
								<td style="font-weight:bold;"> Foto  </td> 
								<td colspan="4">  : </td> 
							</tr> 
							<tr>
								<td colspan="6" align="center">  
								<img src="" class="img responsive" style="width:50%; height: 50%;" id="foto_dtl">
								</td>
							</tr>
						 
							 <div class="modal-footer">
							  <button type="button" class="btn btn-danger" data-dismiss="modal"> X Tutup </button>
							 </div>
						</table>
                           
					   </div>
                     
                    </div>
                </div>
    </div>
			
 
   <script type="text/javascript">
	function PilihKategori(){
        $("#PilihKategoriModal").modal({backdrop: 'static', keyboard: false,show:true});
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
        "ajax": "<?php echo base_url(); ?>foto/fetch_cat_foto" 
    });

     var daftar_kategori = $('#daftar_kategori').DataTable();
     
        $('#daftar_kategori tbody').on('click', 'tr', function () {
            
            var content = daftar_kategori.row(this).data()
            console.log(content);
            $("#kategori").val(content[1]);
            $("#id_kategori").val(content[2]);
            $("#PilihKategoriModal").modal('hide');
        } );


	 function Show_Detail(id){ 
		$("#DetailModal").modal({backdrop: 'static', keyboard: false,show:true});
		$.ajax({
			 url:"<?php echo base_url(); ?>foto/get_data_edit/"+id,
			 type:"GET",
			 dataType:"JSON", 
			 success:function(result){  
                 var nf = new Intl.NumberFormat();
                 $("#id_kategori_dtl").html(result.id_kategori);
                 $("#kategori_dtl").html(result.kategori);
                 $("#caption_dtl").html(result.caption); 
			 	  
				 $("#foto_dtl").attr("src","upload/"+result.foto);
				 
				 
				 
			 }
		 });
	 }
       
	 function Ubah_Data(id){
		$("#defaultModalLabel").html("Form Ubah Data");
		$("#defaultModal").modal('show');
 
		$.ajax({
			 url:"<?php echo base_url(); ?>foto/get_data_edit/"+id,
			 type:"GET",
			 dataType:"JSON", 
			 success:function(result){ 
                
				 $("#defaultModal").modal('show'); 
				 $("#id").val(result.id);
                 $("#id_kategori").val(result.id_kategori);
                 $("#kategori").val(result.kategori);
                 $("#caption").val(result.caption);
                  
				 $('#image1').attr('src',"upload/"+result.foto);
                  
			 }
		 });
	 }
 
	 function Bersihkan_Form(){
        $(':input').val(''); 
        $("#image1").attr('src','<?php echo base_url('upload/image_prev.jpg'); ?>');
     }

	 function Hapus_Data(id){
		if(confirm('Anda yakin ingin menghapus data ini?'))
        {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo base_url('foto/hapus_data')?>/"+id,
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
    
 
    $('.thumbnail').on('click',function(){
        $('.modal-body').empty();
        var title = $(this).parent('a').attr("title");
        $('.modal-title').html(title);
        $($(this).parents('div').html()).appendTo('.modal-body');
        $('#Prev').modal({show:true});
    });
  
	function Simpan_Data(){
	 
		 var formData = new FormData($('#user_form')[0]); 

          
         var foto = $('#foto').val();
		 var extension = $('#foto').val().split('.').pop().toLowerCase();  
 
  
         var id_kategori = $("#id_kategori").val();
         var item = $("#item").val();
         var satuan = $("#satuan").val();
		 var harga_satuan = $("#harga_satuan").val();
          
           
            $.ajax({
             url:"<?php echo base_url(); ?>foto/simpan_data",
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
                 } );
             }
            }); 

         

	}
     

	 $('.datepicker').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD',
        clearButton: true,
        weekStart: 1,
        time: false
     });
      
      
       $(document).ready(function() {
		   
		$("#addmodal").on("click",function(){
			$("#defaultModal").modal({backdrop: 'static', keyboard: false,show:true});
            $("#method").val('Add');
            $("#defaultModalLabel").html("Form Tambah Data");
		});
		
		$("#addmodalx").on("click",function(){
			$("#defaultModalx").modal({backdrop: 'static', keyboard: false,show:true});
            $("#defaultModalLabel").html("Form Tambah Datax");
		});
		
		$('#example').DataTable( {
			"ajax": "<?php echo base_url(); ?>foto/fetch_foto",
      'rowsGroup': [1] 
		});
	 
	    $('#daftar_sales').DataTable( {
            "ajax": "<?php echo base_url(); ?>foto/fetch_kategori" 
        });


		 
	  });
  
		
		 
    </script>