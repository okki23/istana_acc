 
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
                                Customer
                            </h2>
                             
                        </div>
                        <div class="body">
                                
                            <div class="table-responsive">
							   <table class="table table-bordered table-striped table-hover js-basic-example" id="example" >
  
									<thead>
										<tr>  
											<th style="width:5%;">Full Name</th> 
                                            <th style="width:5%;">Email</th> 
                                            <th style="width:5%;">Telp</th> 
                                            <th style="width:5%;">Alamat</th> 
											<th style="width:5%;">Opsi</th> 
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

    
   <script type="text/javascript">
 
    function Banned(id){
        $.ajax({
			 url:"<?php echo base_url(); ?>customer/bannedcust/"+id,
			 type:"POST",
             data:{id:id},
			 dataType:"JSON", 
			 success:function(result){  
                console.log(result);                  
                location.reload(true); 
			 }
		 });
    }

    function UnBanned(id){
        $.ajax({
			 url:"<?php echo base_url(); ?>customer/unbannedcust/"+id,
			 type:"POST",
             data:{id:id},
			 dataType:"JSON", 
			 success:function(result){  
                console.log(result);                  
                location.reload(true); 
			 }
		 });
    }
       
	 function Ubah_Data(id){
		$("#defaultModalLabel").html("Form Ubah Data");
		$("#defaultModal").modal('show');
 
		$.ajax({
			 url:"<?php echo base_url(); ?>customer/get_data_edit/"+id,
			 type:"GET",
			 dataType:"JSON", 
			 success:function(result){ 
                  
				 $("#defaultModal").modal('show'); 
				 $("#id").val(result.id);
                 $("#npp").val(result.npp);
                 $("#id_lokasi").val(result.id_lokasi);                 
                 $("#nama_customer").val(result.nama_customer);
                 $("#nama_lokasi").val(result.nama_lokasi);
                 $('#image1').attr('src',"upload/"+result.foto);
              
                  
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
            url : "<?php echo base_url('customer/hapus_data')?>/"+id,
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
             url:"<?php echo base_url(); ?>customer/simpan_data",
             type:"POST",
             data:formData,
             contentType:false,  
             processData:false,   
             success:function(result){ 
                
                 $("#defaultModal").modal('hide');
                 $('#example').DataTable().ajax.reload(); 
                 $('#user_form')[0].reset();
                
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
		 
	         
        $('#example').DataTable( {
            "ajax": "<?php echo base_url(); ?>customer/fetch_customer" 
               
        });
 
 
		 
	  });
  
		
		 
    </script>