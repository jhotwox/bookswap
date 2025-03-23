<?php
ob_start();
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

	<title>BookSwap | Usuario</title>
	<?php include ("include/headertagbase.php"); ?>

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

	<!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Estilo Admin -->
    <link rel="stylesheet" href="assets/css/admin-style.css">

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

	if($id_usuario_global == 0){
		header("Location: ../404");
		exit();
	}

    if(isset($_GET['id'])) {
		$id_usuario_local = $_GET['id'];
        // echo "<script>console.log('ID: " . addsslashes($id_usuario_local) . "');</script>";
        $query0 = "SELECT COUNT(*) AS existe FROM usuarios WHERE id_usuario = $id_usuario_local && id_usuario > 0 && num_strikes < 5";
        $existe = GetValueSQL($query0, 'existe');
        // echo "<script>console.log('Existe: ', $existe)</script>";
        if($existe == 0) {
            header("Location: ../404");
			exit();
		}
    } else {
        echo "<script>console.log('[-] No hubo id por get')</script>";
        $id_usuario_local = 0;
        header("Location: 404");
        exit();
    }

	$query1 = "SELECT * FROM usuarios WHERE id_usuario = $id_usuario_local";
    $nombres = GetValueSQL($query1, 'nombres');

	?>

	<!--=====================================
	#region Breadcrumb
	======================================-->

	<div class="ps-breadcrumb">

		<div class="container">

			<ul class="breadcrumb">

				<li><a href="index">Inicio</a></li>

				<li>Usuario</li>

                <li><?php echo $nombres; ?></li>

			</ul>

		</div>

	</div>

	<!-- Aqui se puede empezar a trabajar lo nuevo  -->


    <!--=====================================
    #region Usuario
    ======================================-->

    <div class="ps-vendor-dashboard pro" style="margin-top: -50px">
        <div class="container">
            <div class="ps-section__header" id="div_usuario">

                <!--=====================================
                Profile
                ======================================--> 

                <?php
                    if($sesion != 0) {
                        $query1 = "SELECT * FROM usuarios WHERE id_usuario = $id_usuario_local";
    
                        $nombres = GetValueSQL($query1, 'nombres');
                        $apellidos = GetValueSQL($query1, 'apellidos');
                        $codigo_usuario = GetValueSQL($query1, 'codigo_usuario');
                        $id_carrera = GetValueSQL($query1, 'carrera');
                        $id_ciclo_ingreso = GetValueSQL($query1, 'ciclo_ingreso');
                        $correo = GetValueSQL($query1, 'correo');
                        $ruta_foto_perfil = GetValueSQL($query1, 'ruta_foto_perfil');
                        $id_status_usuario = GetValueSQL($query1, 'status');
                        $num_strikes = GetValueSQL($query1, 'num_strikes');

                        $query2 = "SELECT * FROM carreras WHERE id_carrera = '$id_carrera'";
                        $carrera = GetValueSQL($query2, 'carrera');

                        $query3 = "SELECT * FROM ciclos WHERE id_ciclo = '$id_ciclo_ingreso'";
                        $ciclo_ingreso = GetValueSQL($query3, 'ciclo');

                        $query4 = "SELECT * FROM status_usuario WHERE id_status = $id_status_usuario";
                        $status = GetValueSQL($query4,'status');

                        if($ruta_foto_perfil == NULL){
                            $ruta_foto_perfil = $ruta_foto_no_usuario;
                        }


						$query19 = "SELECT COUNT(*) AS cuantas FROM reseñas WHERE id_usuario_evaluado = $id_usuario_local";
                        $cuantas_reseñas = GetValueSQL($query19, 'cuantas');
                        if($cuantas_reseñas == 0){
                            $calificacion = 5.0;
                        } else{
                            $query20 = "SELECT AVG(puntuacion) AS promedio FROM reseñas WHERE id_usuario_evaluado = $id_usuario_local";
                            $calificacion = GetValueSQL($query20, 'promedio');
                            $calificacion = round($calificacion, 1);
                        }
                    }
                ?> 


            	<aside class="ps-block--store-banner container" id="div-perfil">
                    <div class="ps-block__user row">    
						<div class="ps-block__user-avatar-quitar-esto text-center col-lg-2">
                            <img style="width: 300px; height: 150px; margin-bottom: 10px; border-radius: 50%;" src="<?php echo $ruta_foto_perfil ?>" alt="Foto de Perfil">
                            <div class="br-wrapper mt-5"></div>
                        </div>

                        <!-- Aqui se muestra lo del perfil -->
                        <div class="ps-block__user-content text-left text-lg-left col-lg-6">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <h2 class="text-white"><?php echo $nombres . ' ' . $apellidos; ?></h2>
                                    </div>
                                    <div class="col-lg-6">
                                        <p><i class="fas fa-user"></i> Código: <?php echo $codigo_usuario; ?></p>
                                        <p><i class="fas fa-envelope"></i> Correo Institucional: <?php echo $correo; ?></p>
                                        <p><i class="fas fa-graduation-cap"></i>Carrera: <?php echo $carrera; ?></p>
                                        <p><i class="fas fa-calendar-days"></i> Ciclo de ingreso: <?php echo $ciclo_ingreso; ?></p>
                                        <p><i class="fas fa-star"></i> Calificación: <?php echo $calificacion; ?></p>
                                    </div>
																		<div class="col-12">
                                    </div>
                                </div>
                            </div>                            
                        </div>

                    </div>
                </aside>

			</div>
		</div>
	</div>

	<!--=====================================
        #region Customers who bought
    ======================================--> 
	<div class="ps-page--product">

        <div class="ps-container">

			<div class="ps-section--default ps-customer-bought">
				<div class="ps-section__header">
					<h3>Libros del usuario</h3>
				</div>
				<div class="ps-section__content">
					<div class="row">        
						<?php 
							// $query5 = "SELECT * FROM libros WHERE 
							// id_usuario = $id_usuario_local AND status != 3 UNION ALL (
							// 	SELECT * FROM libros WHERE id_usuario = $id_usuario_local AND status != 3 UNION ALL (
							// 	SELECT * FROM libros WHERE id_usuario = $id_usuario_local AND status != 3 UNION ALL (
							// 	SELECT * FROM libros WHERE id_usuario = $id_usuario_local AND status != 3 UNION ALL (
							// 	SELECT * FROM libros WHERE id_usuario = $id_usuario_local AND status != 3 UNION ALL (
							// 	SELECT * FROM libros WHERE id_usuario = $id_usuario_local AND status != 3))))) LIMIT 6";
							$query5 = "SELECT * FROM libros WHERE 
							id_usuario = $id_usuario_local AND status != 3";
								
							$libros_usuario = DatasetSQL($query5);
							
							while($row5 = mysqli_fetch_array($libros_usuario)){
								$row_id_libro = $row5['id_libro'];
								$row_titulo = $row5['titulo'];
								$row_autor = $row5['autor'];
								$row_year = $row5['year'];
								$row_sinopsis = $row5['sinopsis'];
								$row_ruta_foto_portada = $row5['ruta_foto_portada'];
								$row_statusLibro = $row5['status'];
								$row_id_usuario = $row5['id_usuario'];

								$row_query = "SELECT * FROM usuarios WHERE id_usuario = $row_id_usuario";
								$row_nombres = GetValueSQL($row_query, 'nombres');
								$row_apellidos = GetValueSQL($row_query, 'apellidos');
										
								$row_nombre_usuario_completo = rtrim($row_nombres)." ".rtrim($row_apellidos);

										
								$url_producto = str_replace(" ", "-", $row_titulo);
								$url_producto = str_replace("/", "-", $url_producto);
								$url_producto = quitarAcentos($url_producto);
								$url_producto = preg_replace('/[^a-zA-Z0-9\s-]/', '', $url_producto);
						?>
						
						<!-- Inicio Producto -->
						<div class="col-lg-2 col-md-4 col-6 ">
							<div class="ps-product ps-product--simple">
								<div class="ps-product__thumbnail">
									<a onclick="sumar_visitas(<?php echo $row_id_libro; ?>)" href="libro/<?php echo $row_id_libro; ?>/<?php echo $url_producto; ?> ">
										<img src="<?php echo $row_ruta_foto_portada ?>" alt="<?php echo $row_titulo ?>">
									</a>
								</div>
							
								<div class="ps-product__container">
									<a onclick="sumar_visitas(<?php echo $row_id_libro; ?>)" class="ps-product__title" href="libro/<?php echo $row_id_libro; ?>/<?php echo $url_producto; ?> "><?php echo $row_titulo; ?></a>
									<p><?php echo $row_autor; ?></p>
								</div>
							</div>
						</div>
						<!-- Fin Producto -->
						<?php
						}    
						?>
					</div>
				</div>
   			</div><!--  End Customers who bought -->
		</div>
    </div>

	<!-- 
        #region Modal Reportar Usuario
    -->
    <div class="modal fade" id="modalReportarUsuario"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title title" id="exampleModalLabel">Reportar usuario</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form_reportar_usuario" name="form_reportar_usuario">
                        <div class="form-group row m-2">
                            <p class="h3 text-dark" >Razón: </p>
                            <input class="obligatorio form-control" type="text" id="ns_detalles" name="ns_detalles" placeholder="Razón" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="button" class="btn ps-btn" data-bs-dismiss="modal" style="background-color: gray;">Cancelar</button>
                        <button type="button" class="btn ps-btn" onclick='nuevo_strike_usuario(<?php echo $id_usuario_local; ?>, event)'>Reportar</button>
                    </div>
                </div>
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
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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