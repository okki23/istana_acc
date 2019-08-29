<!DOCTYPE html>
<html>
<head>
  <title>Invoice</title>
  <style type="text/css">
    .invoice-title h2, .invoice-title h3 {
    display: inline-block;
      }

      .table > tbody > tr > .no-line {
          border-top: none;
      }

      .table > thead > tr > .no-line {
          border-bottom: none;
      }

      .table > tbody > tr > .thick-line {
          border-top: 2px solid;
      }
  </style>
</head>
<body>
 
<div class="container">
    <div class="row">
    <button onclick="myFunction()">Print this page</button>
        <div class="col-xs-12">
        
          <h2>Invoice  : <?php echo $noso; ?></h2>
      
        <hr>
        <br>

<table border="0" cellpadding="3" cellspacing="0">
  <tr>
    <td style="width: 20%;"> <b> Billed To: </b> </td> 
  </tr>
  <tr>
    <td style="width: 80%;"> <b> <?php echo $listing->full_name; ?> </b> </td> 
  </tr>
  <tr>
    <td style="width: 80%;"> &nbsp; <?php echo $listing->telp; ?> </td> 
  </tr>
  <tr>
    <td style="width: 80%;"> &nbsp; <?php echo $listing->alamat; ?> </td> 
  </tr> 
  <tr>
    <td style="width: 80%;"> &nbsp; <?php echo $listing->email; ?> </td> 
  </tr> 
</table>
 
    
    
</div>

<h3 align="left"> Rincian Pesanan </h3>
 

<table border="1" cellpadding="3" cellspacing="0" style="width:100%;">
              
                <tr style='font-weight:bold; text-align: center; white-space:pre; width: 100%; background-color: yellow;'>
                  <td>No</td>
                  <td>Nama Barang</td> 
                  <td>Qty</td>
                  <td>Harga Satuan</td> 
                  <td>Total</td>
                
                </tr>
                
                <?php
                $no = 1;
                $sumtotalorder = 0;
                foreach ($items as $key => $value) {
                $sumtotalorder += ($value->harga * $value->qty);
        echo "<tr>
                  <td>".$no."</td>
                  <td>".$value->nama_barang."</td>
                  <td align='center'>".$value->qty."</td> 
                  <td align='center'> Rp. ".number_format($value->harga)."</td> 
                  <td align='center'> Rp. ".number_format($value->harga * $value->qty)."</td>
                   
                </tr> ";
?>
<?php
         $no++; }
         echo "<tr align='center'>
         <td colspan='4'> Total </td>
         <td> Rp. ".number_format($sumtotalorder)."</td>
       </tr> ";
echo "</table>";
?>
 
 

<h3> Transfer Pembayaran Bank </h3>

<table border="0" cellpadding="3" cellspacing="0">
                <tr style='font-weight:bold; text-align: center; white-space:pre; width: 100%;'>
                  <td>
                   <img src="<?php echo base_url('assets/images/bca.png'); ?>" style="width: 30%; height: 30%; ">
                   <br>
                      <b>BANK BCA <br>
                      24 111 055 90<br>
                      An. PT. ISTANA ACCESSORIES </b>
                  </td>
                  <td>
                    <img src="<?php echo base_url('assets/images/bri.jpg'); ?>" style="width: 30%; height: 30%; ">
                    <br>
                      <b>BANK BRI <br>
                      033801000604300<br>
                      An. PT. ISTANA ACCESSORIES </b>
                  </td>
                  <td>
                   <img src="<?php echo base_url('assets/images/mandiri.jpg'); ?>" style="width: 30%; height: 30%; ">
                   <br>
                      <b>BANK MANDIRI, Cabang Juanda <br>
                      119.000.6144.024<br>
                      An. PT. ISTANA ACCESSORIES</b>
                  </td>
                   
                </tr>
                  
</table>

</body>
<script>
function myFunction() {
  window.print();
}
</script>
</html>