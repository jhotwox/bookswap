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

	<title>BookSwap | Administrador</title>
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

    <div id="loader-wrapper">
        <img src="img/template/loader.jpg">
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>  

	<!--=====================================
	Header Promotion
	======================================-->


    <!--=====================================
	Header
	======================================-->

    <?php
    // Estos tres siempre se ponen despues del body, del archivo que estemos creando
	require_once "include/functions.php";
	require_once "include/db_tools.php";  
    include('main-header.php'); 

    if($sesion == 0){
        header("Location: index");
    }

    if($id_usuario_global != 0 &&  $admin_usuario_global != 1){
        header("Location: index");
    }

    ?>

    <input type="hidden" id="id_usuario_global" value="<?php echo $id_usuario_global; ?>">
    <!--=====================================
    Breadcrumb
    ======================================-->  
	
	<div class="ps-breadcrumb">

        <div class="container">

            <ul class="breadcrumb">

                <li><a href="index">Inicio</a></li>

                <li>Perfil</li>

            </ul>

        </div>

    </div>

<!-- Aqui se puede empezar a trabajar lo nuevo  -->

     <!--=====================================
    My Account Content
    ======================================--> 

    <!--=====================================
    #region Mi Perfil
    ======================================-->

    <div class="ps-vendor-dashboard pro" style="margin-top: -100px">

        <div class="container">

            <div class="ps-section__header">

                <!--=====================================
                Profile
                ======================================--> 

                <?php
                    if($sesion != 0){
                        $query1 = "SELECT * FROM usuarios WHERE id_usuario = $id_usuario_global";
                        $nombres = GetValueSQL($query1, 'nombres');
                        $apellidos = GetValueSQL($query1, 'apellidos');
                        $codigo_usuario = GetValueSQL($query1, 'codigo_usuario');
                        $id_carrera = GetValueSQL($query1, 'carrera');
                        $id_ciclo_ingreso = GetValueSQL($query1, 'ciclo_ingreso');
                        $correo = GetValueSQL($query1, 'correo');
                        $ruta_foto_perfil = GetValueSQL($query1, 'ruta_foto_perfil');
                        $ruta_foto_credencial = GetValueSQL($query1, 'ruta_foto_credencial');
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
                        
                        if($ruta_foto_credencial == NULL){
                            $ruta_foto_credencial = $ruta_foto_no_existente;
                        }

                        if($id_status_usuario != 1) {
                            $mensaje_status = "";
                            if($num_strikes > 2) {
                                $mensaje_status = "* Tu cuenta ha sido bloqueada debido a que cometiste 3 infracciones.";
                            }
                        } else{
                            $mensaje_status = "";
                        }

                        if($num_strikes > 0) {
                            // $mensaje_strikes = "<a class='text-decoration-underline' href=''>(Ver detalles)</a>";
                            $mensaje_strikes = "";
                        } else{
                            $mensaje_strikes = "";
                        }
                    
                    }
                
                ?> 


                <aside class="ps-block--store-banner container" id="div-perfil">

                    <div class="ps-block__user row" >

                        <div class="ps-block__user-avatar-quitar-esto text-center col-lg-2">

                            <img style="width: 300px; height: 150px; margin-bottom: 10px; border-radius: 50%;" src="<?php echo $ruta_foto_perfil ?>" alt="Foto de Perfil">

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
                                        <p><i class="fa-solid fa-xmark"></i> Strikes: <?php echo $num_strikes." ".$mensaje_strikes; ?> </p>
                                        <p><i class="fas fa-flag"></i> Status: <?php echo $status ?></p>
                                        <p style="color: yellow;"><?php echo $mensaje_status; ?></p>
                                    </div>

                                    <!-- Columna derecha (imagen de la credencial) -->
                                    <div class="col-lg-6">
                                        <p><i class="fas fa-id-card"></i> Credencial de UDG:</p>
                                        <img style="max-width: 250px; height: auto;" src="<?php echo $ruta_foto_credencial; ?>" class="img-fluid" alt="Credencial de Estudiante">
                                    </div>
                                </div>
                            </div>                            
                        </div>

                        <!-- Aqui se muestra lo del peerfil -->
                        <div class="row ml-lg-auto pt-5 col-lg-4">

                        <?php
                        $query2 = "SELECT COUNT(*) AS cuantos FROM wishlist WHERE id_usuario = $id_usuario_global";
                        $cuantos = GetValueSQL($query2, 'cuantos');

                        ?>
            
                            <!-- <div class="col-lg-3 col-6">
                                <div class="text-center">
                                    <a href="#">
                                        <h1><i class="fas fa-heart text-white"></i></h1>
                                        <h4 class="text-white">Wishlist <span class="badge badge-secondary rounded-circle"><?php echo $cuantos;?></span></h4>
                                    </a>
                                </div>
                            </div>
                
                            <div class="col-lg-3 col-6">
                                <div class="text-center">
                                    <a href="#">
                                        <h1><i class="fas fa-bell text-white"></i></h1>
                                        <h4 class="text-white">Nots <span class="badge badge-secondary rounded-circle">51</span></h4>
                                    </a>
                                </div>
                            </div>
                
                            <div class="col-lg-3 col-6">
                                <div class="text-center">
                                    <a href="#">
                                        <h1><i class="fas fa-comments text-white"></i></h1>
                                        <h4 class="text-white">Messages <span class="badge badge-secondary rounded-circle">51</span></h4>
                                    </a>
                                </div>
                            </div> -->

                        </div>

                    </div>

                </aside><!-- s -->
                
                
                <div class="ps-section__content">

                    <ul class="ps-section__links">
                        <?php
                            if ($admin_usuario_global == 1) {
                                echo '<li id="li_validar_usuarios"><a type="button" href=""  onclick="cambiar_opciones_perfil(5, event)">Validar usuarios</a></li>';
                            }
                        ?>
                    </ul>                    

                    <div class="ps-section--shopping ps-shopping-cart" style="margin-top: -120px;">

    <!---------------------------------------
        #region Validar Usuarios
    ---------------------------------------->

    <?php 
    if($admin_usuario_global == 1) {
        echo ' 
        <div class="container" id="div_validar_usuarios">
            
        <div class="ps-section__header">
            <h1>Validar usuarios</h1>
        </div>

            <div class="ps-section__content" style="margin-top: -50px;">

                <div class="table-responsive">
                                        
                    <div class="ps-section__cart-actions" style="margin-top: -100px; margin-bottom: -50px;">
                    </div>

                        <table class="table ps-table--shopping-cart">
                            <thead>
                                <tr>
                                    <th>Credencial</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Codigo</th>
                                    <th>Correo</th>
                                    <th>Carrera</th>
                                    <th>Ingreso</th>
                                    <th>Validar</th>
                                </tr>
                            </thead>
                            <tbody>';
        
                            $query12 = "SELECT COUNT(*) AS cuantos FROM usuarios WHERE status = 2";
                            $cuantos_usuarios = GetValueSQL($query12, 'cuantos');

                            if ($cuantos_usuarios > 0) {
                                $query13 = "SELECT * FROM usuarios WHERE status = 2 && num_strikes < 3 ORDER BY (id_usuario) DESC";
                                $mis_usuarios = DatasetSQL($query13);

                                while ($row13 = mysqli_fetch_array($mis_usuarios)) {
                                    $ruta_foto_credencial = $row13['ruta_foto_credencial'];
                                    $nombres = $row13['nombres'];
                                    $apellidos = $row13['apellidos'];
                                    $codigo = $row13['codigo_usuario'];
                                    $correo = $row13['correo'];
                                    $carrera = $row13['carrera'];
                                    $ciclo = $row13['ciclo_ingreso'];
                                    $id_usuario = $row13['id_usuario'];

                                    $query14 = "SELECT * FROM carreras WHERE id_carrera = '$carrera'";
                                    $carrera = GetValueSQL($query14, 'carrera');

                                    $query15 = "SELECT * FROM ciclos WHERE id_ciclo = '$ciclo'";
                                    $ciclo = GetValueSQL($query15, 'ciclo');

                                    if($ruta_foto_credencial == NULL){
                                        $ruta_foto_credencial = $ruta_foto_no_existente;
                                    }

                                    echo '<tr>
                                            <td>
                                                <div class="ps-product--cart">
                                                    <div class="ps-product__thumbnail">
                                                        <a target="_blank" href="' . $ruta_foto_credencial . '"><img src="' . $ruta_foto_credencial . '" alt="No se logro cargar"></a>
                                    
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="text-center">' . $nombres . '</td>
                                                            
                                            <td class="text-center">' . $apellidos . '</td>
                                    
                                            <td class="text-center">' . $codigo . '</td>
                                    
                                            <td class="text-center">' . $correo . '</td>                       
                                                                                    
                                            <td class="text-center">' . $carrera . '</td>                

                                            <td class="text-center">' . $ciclo . '</td>                       

                                            <td class="text-center">    
                                                <a class="btn btn-info btn-lg" type="button" style="font-size: 16px;" href="" onclick="validar_usuario(' . $id_usuario . ', event)">Validar</a>
                                            </td>
                                    
                                        </tr>';
                                }
                            }
                            ?>

                            </tbody>

                        </table>

                    </div>

                    <hr>

                </div> 

            </div>
            <!-- Fin sección -->
            <?php } ?>
        </div>           

    </div>

</div>

</div>

</div>
    <!---------------------------------------
    #region Ventanas Modales
    ---------------------------------------->


    <!--=====================================
	Footer
	======================================-->  
    <!-- Este es el pie de pagina, el cual va antes de que se acabe el body -->
    <?php include('main-footer.php'); ?>


	<!--=====================================
	JS PERSONALIZADO
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
		 $(document).ready(function() { 
			llenar_select_carreras();
			llenar_select_ciclos();
		});

        // $('#modalEditarLibro').on('show.bs.modal', function (event) {
        //     var button = $(event.relatedTarget);
        //     var id = button.data('id');
        //     var modal = $(this);
        //     // console.log(id);
        //     modal.find('#el_id_libro').val(id);
        // });


        $('#modalAcordarFechas').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id_prestamo = button.data('id');
            var modal = $(this);
            // console.log(id);
            modal.find('#id_prestamo').val(id_prestamo);
        });

        
        $('#modalVerificarFechas').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id_prestamo = button.data('id');
            var modal = $(this);
            // console.log(id);
            modal.find('#id_prestamo_fechas').val(id_prestamo);
        });

        
        $('#modalFinalizarPrestamo').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id_libro = button.data('id');
            var modal = $(this);
            // console.log(id);
            modal.find('#fp_id_libro').val(id_libro);
        });
	</script>
</body>

</html>