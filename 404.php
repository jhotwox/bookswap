<?php
//ob_start();
session_start();
?>


<!DOCTYPE html>
<html lang="es">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="format-detection" content="telephone=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="author" content="">
	<meta name="keywords" content="">
	<meta name="description" content="">

	<title>BookSwap | Sobre nosotros</title>
	<?php include ("include/headertagbase.php"); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="icon" href="imagenes/bookswap/logoBookswap.png">

	<!--=====================================
	#region CSS
	======================================-->

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700&display=swap" rel="stylesheet">

	<!-- font awesome -->
	<link rel="stylesheet" href="css/plugins/fontawesome.min.css">

	<!-- linear icons -->
	<link rel="stylesheet" href="css/plugins/linearIcons.css">

	<!-- Estilo Admin -->
    <link rel="stylesheet" href="assets/css/admin-style.css">

	<!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/plugins/owl.carousel.css">

	<!-- Slick -->
	<link rel="stylesheet" href="css/plugins/slick.css">

	<!-- Light Gallery -->
	<link rel="stylesheet" href="css/plugins/lightgallery.min.css">

	<!-- Font Awesome Start -->
	<link rel="stylesheet" href="css/plugins/fontawesome-stars.css">

	<!-- jquery Ui -->
	<link rel="stylesheet" href="css/plugins/jquery-ui.min.css">

	<!-- Select 2 -->
	<link rel="stylesheet" href="css/plugins/select2.min.css">

	<!-- Scroll Up -->
	<link rel="stylesheet" href="css/plugins/scrollUp.css">

	<!-- DataTable -->
	<link rel="stylesheet" href="css/plugins/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="css/plugins/responsive.bootstrap.datatable.min.css">

	<!-- estilo principal -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Market Place 4 -->
	<link rel="stylesheet" href="css/market-place-4.css">

	<!--=====================================
	#region PLUGINS JS
	======================================-->

	<!-- jQuery library -->
	<script src="js/plugins/jquery-1.12.4.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

	<!-- Owl Carousel -->
	<script src="js/plugins/owl.carousel.min.js"></script>

	<!-- Images Loaded -->
	<script src="js/plugins/imagesloaded.pkgd.min.js"></script>

	<!-- Masonry -->
	<script src="js/plugins/masonry.pkgd.min.js"></script>

	<!-- Isotope -->
	<script src="js/plugins/isotope.pkgd.min.js"></script>

	<!-- jQuery Match Height -->
	<script src="js/plugins/jquery.matchHeight-min.js"></script>

	<!-- Slick -->
	<script src="js/plugins/slick.min.js"></script>

	<!-- jQuery Barrating -->
	<script src="js/plugins/jquery.barrating.min.js"></script>

	<!-- Slick Animation -->
	<script src="js/plugins/slick-animation.min.js"></script>

	<!-- Light Gallery -->
	<script src="js/plugins/lightgallery-all.min.js"></script>
	<script src="js/plugins/lg-thumbnail.min.js"></script>
	<script src="js/plugins/lg-fullscreen.min.js"></script>
	<script src="js/plugins/lg-pager.min.js"></script>

	<!-- jQuery UI -->
	<script src="js/plugins/jquery-ui.min.js"></script>

	<!-- Sticky Sidebar -->
	<script src="js/plugins/sticky-sidebar.min.js"></script>

	<!-- Slim Scroll -->
	<script src="js/plugins/jquery.slimscroll.min.js"></script>

	<!-- Select 2 -->
	<script src="js/plugins/select2.full.min.js"></script>

	<!-- Scroll Up -->
	<script src="js/plugins/scrollUP.js"></script>

	<!-- DataTable -->
	<script src="js/plugins/jquery.dataTables.min.js"></script>
	<script src="js/plugins/dataTables.bootstrap4.min.js"></script>
	<script src="js/plugins/dataTables.responsive.min.js"></script>

	<!-- Chart -->
	<script src="js/plugins/Chart.min.js"></script>


	<script src="https://kit.fontawesome.com/471d91ac13.js" crossorigin="anonymous"></script>
	<!--alerts CSS -->
	<link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
		integrity="sha512-7U0k3Xu0BUw7+oTgnOUMW4JCxW3IaOwFNMDkPTi2B5cg7x17OOJUtGkObUcZDQw2FXmO1w+23r00Yod/7uCC3w=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

	<!--=====================================
	Preload
	======================================-->

	<!-- <div id="loader-wrapper">
		<img src="img/template/loader.jpg">
		<div class="loader-section section-left"></div>
		<div class="loader-section section-right"></div>
	</div>   -->

	<!--=====================================
	Header Promotion
	======================================-->


	<!--=====================================
	#region HEADER
	======================================-->

	<?php
	// Estos tres siempre se ponen despues del body, del archivo que estemos creando
	require_once "include/functions.php";
	require_once "include/db_tools.php";
	include ('main-header.php');

	?>

	<!--=====================================
	#region Breadcrumb
	======================================-->

	<div class="ps-breadcrumb">

		<div class="container">

			<ul class="breadcrumb">

				<li><a href="index">Inicio</a></li>

				<li>Error 404</li>

			</ul>

		</div>

	</div>

	

	<!-- EMPEZAR AQUI -->

	<div class="ps-page--404">
        <div class="container">
            <div class="ps-section__content"><img src="img/404.jpg" alt="">
                <h3>¡Página no encontrada!</h3>
                <p>Parece que no encontramos la página que estas buscando. Puedes volver a <a href="index"> Inicio</a></p>
            </div>
        </div>
    </div>

	<!--=====================================
	#region Footer
	======================================-->
	<!-- Este es el pie de pagina, el cual va antes de que se acabe el body -->
	<?php include ('main-footer.php'); ?>


	<!--=====================================
	#region JS PERSONALIZADO
	======================================-->

	<script src="js/main.js"></script>

	<script src="assets/js/jquery-2.2.4.min.js"></script>
	<script src="assets/js/slick.min.js"></script>
	<script src="assets/js/jquery-ui.js"></script>
	<script src="assets/js/jquery.nice-select.js"></script>
	<script src="assets/js/scripts.js"></script>
	<script src="assets/js/funciones.js"></script>

	<script src="assets/plugins/sweetalert/sweetalert.min.js"></script>
	<script src="assets/plugins/sweetalert/jquery.sweet-alert.custom.js"></script>

	<script>
		$(document).ready(function () {
			// llenar_select_carreras();
			// llenar_select_ciclos();
		});
	</script>
</body>

</html>