<!DOCTYPE html>
<html lang="en">
<head>
<title>Colo Shop</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="assets_front/styles/bootstrap4/bootstrap.min.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="assets_front/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="assets_front/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="assets_front/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="assets_front/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="assets_front/styles/responsive.css">
</head>

<body>

<?php 
	echo $this->load->view($konten);
?>


<script src="assets_front/js/jquery-3.2.1.min.js"></script>
<script src="assets_front/styles/bootstrap4/popper.js"></script>
<script src="assets_front/styles/bootstrap4/bootstrap.min.js"></script>
<script src="assets_front/plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="assets_front/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="assets_front/plugins/easing/easing.js"></script>
<script src="assets_front/js/custom.js"></script>
<script type="text/javascript">
function ShowDetail(id){
 
$("#DetailModal").modal({backdrop: 'static', keyboard: false,show:true});
}
</script>
</body>

</html>
