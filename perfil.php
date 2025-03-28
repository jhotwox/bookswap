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

	<title>BookSwap | Perfil</title>
	<?php include("include/headertagbase.php"); ?>

	<link rel="icon" href="imagenes/bookswap/logoBookswap.png">

	<!--=====================================
	CSS
	======================================-->
	
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700&display=swap" rel="stylesheet">

	<!-- font awesome -->
	<link rel="stylesheet" href="css/plugins/fontawesome.min.css">

	<!-- linear icons -->
	<link rel="stylesheet" href="css/plugins/linearIcons.css">

	<!-- Bootstrap 5 -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> -->
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
	PLUGINS JS
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-7U0k3Xu0BUw7+oTgnOUMW4JCxW3IaOwFNMDkPTi2B5cg7x17OOJUtGkObUcZDQw2FXmO1w+23r00Yod/7uCC3w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    
</head>

<body>
	<script src="assets/js/funciones.js"></script>

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

    ?>

    <input type="hidden" id="id_usuario_global" value="<?php echo $id_usuario_global; ?>">
    <!--=====================================
    Breadcrumb
    ======================================-->  
	
	<div class="ps-breadcrumb">

        <div class="container">

            <ul class="breadcrumb">

                <li><a href="index.php">Inicio</a></li>

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
                            $mensaje_status = "* Para validar tu cuenta, actualiza tu foto de perfil y la credencial de UDG.";
                            if($num_strikes > 2) {
                                $mensaje_status = "* Tu cuenta ha sido bloqueada debido a que cometiste 5 infracciones.";
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

                        $query19 = "SELECT COUNT(*) AS cuantas FROM reseñas WHERE id_usuario_evaluado = $id_usuario_global";
                        $cuantas_reseñas = GetValueSQL($query19, 'cuantas');
                        if($cuantas_reseñas == 0){
                            $calificacion = 5.0;
                        } else{
                            $query20 = "SELECT AVG(puntuacion) AS promedio FROM reseñas WHERE id_usuario_evaluado = $id_usuario_global";
                            $calificacion = GetValueSQL($query20, 'promedio');
                            $calificacion = round($calificacion, 1);
                        }
                    
                    }
                
                ?> 


                <aside class="ps-block--store-banner container" id="div-perfil">

                    <div class="ps-block__user row" >

                        <div class="ps-block__user-avatar-quitar-esto text-center col-lg-2">

                            <img style="width: 300px; height: 150px; margin-bottom: 10px; border-radius: 50%;" src="<?php echo $ruta_foto_perfil ?>" alt="Foto de Perfil">

                            <div class="br-wrapper">

                                <button class="btn btn-primary btn-lg rounded-circle" title="Editar" onclick="activar_actualizar_datos(<?php echo $id_usuario_global; ?>)" data-bs-toggle="modal" data-bs-target="#modalCambiarInfoUsuario" data-bs-whatever="@mdo">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>

                            </div>

                            <div class="br-wrapper mt-5">

                                <!-- <select class="ps-rating" data-read-only="true" style="display: none;">
                                    <option value="1">1</option>
                                    <option value="1">2</option>
                                    <option value="1">3</option>
                                    <option value="1">4</option>
                                    <option value="2">5</option>
                                </select> -->
                                <!-- <div class="text-center">
                                    <a type="button" href="lista-de-espera">
                                        <h1><i class="fas fa-clock fa-sm text-white"></i></h1>
                                        <h4 class="text-white">Lista de Espera </h4>
                                    </a>
                                </div> -->

                            </div>

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
                                        <p><i class="fa-solid fa-xmark"></i> Strikes: <?php echo $num_strikes." ".$mensaje_strikes; ?> </p>
                                        <p><i class="fas fa-flag"></i> Status: <?php echo $status ?></p>
                                        <p style="color: yellow;"><?php echo $mensaje_status; ?></p>
                                    </div>

                                    <!-- Columna derecha (imagen de la credencial) -->
                                    <div class="col-lg-6">
                                        <p><i class="fas fa-id-card"></i> Credencial de UDG:</p>
                                        <img style="max-width: 250px; height: auto;" src="<?php echo $ruta_foto_credencial; ?>" class="img-fluid" alt="Credencial de Estudiante">
                                    </div>

                                    <!-- Botones -->
                                    <div class="col-lg-12">
                                        <button class="btn btn-warning btn-lg" onclick="activar_actualizar_datos(<?php echo $id_usuario_global; ?>)" data-bs-toggle="modal" data-bs-target="#modalCambiarInfoUsuario" data-bs-whatever="@mdo">Actualizar datos</button>
                                        <button class="btn btn-info btn-lg" data-bs-toggle="modal" data-bs-target="#modalCambiarPassword" data-bs-whatever="@mdo">Cambiar contraseña</button>
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
                            if ($num_strikes < 5) {
                                echo '<li id="li_prestamos_activos" class="active"><a type="button" href="" onclick="cambiar_opciones_perfil(2, event)">Mis Préstamos</a></li>';
                                echo '<li id="li_prestamos_recibidos"><a type="button" href="" onclick="cambiar_opciones_perfil(6, event)">Préstamos Recibidos</a></li>';
                                echo '<li id="li_mis_libros"><a type="button" href="" onclick="cambiar_opciones_perfil(1, event)">Mis Libros</a></li>';
                                echo '<li id="li_historial_prestamos"><a type="button" href=""  onclick="cambiar_opciones_perfil(3, event)">Historial de Préstamos</a></li>';
                            }
                        ?>
                    </ul>                    

                    <div class="ps-section--shopping ps-shopping-cart" style="margin-top: -120px;">

                        
                        <!-- Inicio sección 
                            #region Mis Prestamos
                        -->

                        <div class="container" id="div_prestamos_activos">

                            <div class="ps-section__header">
                                <?php 
                                    if ($num_strikes < 5) echo "<h1>Mis Préstamos</h1>";
                                ?>

                            </div>

                            <div class="ps-section__content" style="margin-top: -50px;">

                                <div class="table-responsive">
                                    
                                <div class="ps-section__cart-actions" style="margin-top: -100px; margin-bottom: -50px;">

                                    <!-- <a class="ps-btn" onmouseover="this.style.color='white';" onmouseout="this.style.color='black';"  onclick="abrir_modal(1)">
                                        <i class="fa-solid fa-circle-plus" data-bs-whatever="@mdo"></i> Agregar Libro
                                    </a> -->

                                </div>

                                <table class="table ps-table--shopping-cart" id="tabla_prestamo">

                                    <thead>

                                        <tr>
                                            <?php 
                                                if ($num_strikes < 5) {
                                                    echo "<th>Libro</th>";
                                                    echo "<th>Fecha de Préstamo</th>";
                                                    echo "<th>Fecha de Entrega</th>";
                                                    echo "<th>Estatus</th>";
                                                    echo "<th>Préstamos</th>";
                                                }
                                            ?>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        <?php 
                                        $query5 = "SELECT COUNT(*) AS cuantos FROM libros WHERE id_usuario = $id_usuario_global";
                                        $cuantos_libros = GetValueSQL($query5, 'cuantos');

                                        if($cuantos_libros > 0 && $num_strikes < 5){
                                            $query6 = "SELECT * FROM libros
                                            INNER JOIN status_libro ON libros.status = status_libro.id_status
                                            WHERE id_usuario = $id_usuario_global
                                            ORDER BY (id_libro = 3) DESC";
                                            $mis_libros = DatasetSQL($query6);

                                            while($row6 = mysqli_fetch_array($mis_libros)){
                                                $id_libro = $row6['id_libro'];
                                                $titulo = $row6['titulo'];
                                                $autor = $row6['autor'];
                                                $editorial = $row6['editorial'];
                                                $isbn = $row6['isbn'];
                                                $year = $row6['year'];
                                                $fecha_agregado = $row6['fecha_agregado']; 
                                                $sinopsis = $row6['sinopsis'];
                                                $id_libro = $row6['id_libro'];
                                                $ruta_foto_portada = $row6['ruta_foto_portada'];
                                                $status = $row6['status_nombre'];

                                                $url_producto = str_replace(" ", "-", $titulo);
                                                $url_producto = str_replace("/", "-", $url_producto);
                                                $url_producto = quitarAcentos($url_producto);
                                                $url_producto = preg_replace('/[^a-zA-Z0-9\s-]/', '', $url_producto);

                                                $id_status = $row6['id_status'];

                                                switch($id_status){
                                                    case 1:
                                                        $cambiar_status_libro = '<a type="button" onclick="cambiar_status_libro('.$id_libro.', 1)" title="Cambiar estatus"><i class="fas fa-toggle-on"></i></a>';
                                                        $mensaje_status = '<i class="fas fa-book-openfas fa-book-open"></i> '.$status;
                                                    break;
                                                    case 2:
                                                        $cambiar_status_libro = '';
                                                        $mensaje_status = '<i class="fa-solid fa-stopwatch"></i> '.$status;
                                                    break;
                                                    case 3:
                                                        $cambiar_status_libro = '<a type="button" onclick="cambiar_status_libro('.$id_libro.', 3)"><i class="fas fa-toggle-off"></i></a>';
                                                        $mensaje_status = '<i class="fas fa-book"></i> '.$status;
                                                    break;
                                                    case 4:
                                                        $cambiar_status_libro = '';
                                                        $mensaje_status = '<i class="fas fa-book-reader"></i> '.$status.' | <a class="btn btn-link text-danger" style="font-size: 16px;" data-bs-toggle="modal" data-bs-target="#modalFinalizarPrestamo" data-bs-whatever="@mdo" data-id="'.$id_libro.'">Finalizar préstamo</a>';
                                                    break;
                                                }

                                                if($year == NULL){
                                                    $year = "Sin Año";
                                                }
                                            
                                                if($sinopsis == NULL){
                                                    $sinopsis = "Sin Sinopsis";
                                                }

                                                if($ruta_foto_portada == NULL){
                                                    $ruta_foto_portada = $ruta_foto_no_existente;
                                                }

                                                $query10 = "SELECT COUNT(*) AS existe FROM prestamos WHERE id_libro = $id_libro AND status_prestamo != 4 AND status_prestamo != 6";
                                                $existe_prestamos = GetValueSQL($query10, 'existe');

                                                if($existe_prestamos > 0){
                                                    $query11 = "SELECT * FROM prestamos 
                                                    INNER JOIN usuarios ON prestamos.id_usuario_destino = usuarios.id_usuario
                                                    INNER JOIN status_prestamos ON prestamos.status_prestamo = status_prestamos.id_status
                                                    WHERE id_libro = $id_libro AND status_prestamo != 4 AND status_prestamo != 6";

                                                    $id_prestamo = GetValueSQL($query11, 'id_prestamo');
                                                    $nombre_prestamo = GetValueSQL($query11, 'nombres'). " " .GetValueSQL($query11, 'apellidos');
                                                    $correo_prestamo = GetValueSQL($query11, 'correo');
                                                    $codigo_usuario_prestamo = GetValueSQL($query11, 'codigo_usuario');
                                                    $fecha_inicio = GetValueSQL($query11, 'fecha_inicio');
                                                    $fecha_fin = GetValueSQL($query11, 'fecha_fin');
                                                    $id_status_prestamo = GetValueSQL($query11, 'status_prestamo');
                                                    $status_prestamo = GetValueSQL($query11, 'status_nombre');
                                                    
                                                    if($fecha_fin == NULL){
                                                        $fecha_fin = "Por acordar";
                                                    }

                                                    if($fecha_inicio == NULL){
                                                        $fecha_inicio = "Por acordar";
                                                    }

                                                    $prestamo = '<div class="table-responsive" id="tabla_prestamo_'.$id_prestamo.'">
                                                                    <table class="table table-bordered">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Estatus</th>
                                                                                <th>Nombre</th>
                                                                                <th>Correo Institucional</th>
                                                                                <th>Código UDG</th>';
                                                                                if($id_status_prestamo == 1 ){
                                                                                    $prestamo .= '<th>Opciones</th>';
                                                                                }
                                                                                if($id_status_prestamo == 2 || $id_status_prestamo == 3 || $id_status_prestamo == 4){
                                                                                    $prestamo .= '<th>Inicio / Fin</th>';
                                                                                    $prestamo .= '<th>Chat</th>';
                                                                                    if($id_status_prestamo == 2)
                                                                                    {
                                                                                        $prestamo .= '<th>Denegar</th>';
                                                                                    }
                                                                                } 
                                                                            $prestamo .= '</tr>
                                                                        </thead>
                                                                        <tbody>';

                                                    $prestamo .= '<tr>
                                                        <td>' . $status_prestamo . '</td>
                                                        <td>' . $nombre_prestamo . '</td>
                                                        <td>' . $correo_prestamo . '</td>
                                                        <td class="text-center">' . $codigo_usuario_prestamo . '</td>';
                                                        
                                                        if($id_status_prestamo == 1 ){
                                                            $prestamo .= '<td class="text-center" >
                                                                <a class="btn btn-link" type="button" style="font-size: 16px;" href="" onclick="aceptar_denegar_prestamo('.$id_prestamo.', '.$id_libro.', 1, event)">Aceptar</a> / 
                                                                <a class="btn btn-link" type="button" style="font-size: 16px;" href="" onclick="aceptar_denegar_prestamo('.$id_prestamo.', '.$id_libro.', 2, event)">Denegar</a>
                                                            </td>';
                                                        }

                                                        if($id_status_prestamo == 2 || $id_status_prestamo == 3 || $id_status_prestamo == 4){
                                                            if($id_status_prestamo == 2){

                                                                if($fecha_inicio == "Por acordar" OR $fecha_fin == "Por acordar"){
                                                                    $prestamo .= '<td class="text-center">
                                                                        <a title="Acordar fechas" class="btn btn-secondary" type="button" style="font-size: 16px;"  data-bs-toggle="modal" data-bs-target="#modalAcordarFechas" data-bs-whatever="@mdo" data-id="'.$id_prestamo.'">Acordar fechas</a>
                                                                    </td>';
                                                                } else{
                                                                    $prestamo .= '<td class="text-center">Espera confirmación</td>';
                                                                }
                                                                
                                                            } else{
                                                                $prestamo .= '<td class="text-center">
                                                                '.$fecha_inicio.' / '.$fecha_fin.'
                                                            </td>';
                                                            }
                                                            
                                                            $prestamo .= '<td class="text-center" >
                                                                <a title="Ingresar a chat" class="btn btn-secondary" type="button" style="font-size: 16px;" href="chat/'.$codigo_usuario_prestamo.'"><i class="fa fa-comment chat-icon"></i></a>
                                                            </td>';
                                                            if($id_status_prestamo == 2){
                                                                $prestamo .= '<td class="text-center" >
                                                                <a title="Cancelar prestamo" class="text-danger" type="button" style="font-size: 27px;" onclick = "cancelar_prestamo('.$id_prestamo.')" ><i class="fa-regular fa-circle-xmark"></i></a>
                                                            </td>';
                                                            }
                                                        } 

                                                    $prestamo .= '</tr>';


                                                    $prestamo .= '</tbody>
                                                                </table>
                                                            </div>';
                                                    

                                                    $query8 = "SELECT COUNT(*) AS cuantos FROM waitlist
                                                    INNER JOIN usuarios ON waitlist.id_usuario = usuarios.id_usuario
                                                    WHERE id_libro = $id_libro";
                                                    $cuantos_waitlist = GetValueSQL($query8, 'cuantos');

                                                    if ($cuantos_waitlist > 0) {

                                                        $waitlist = '<div class="table-responsive">
                                                                    <table class="table table-bordered">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Turno</th>
                                                                                <th>Nombre</th>
                                                                                <th>Correo Institucional</th>
                                                                                <th>Código UDG</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>';

                                                        $query9 = "SELECT * FROM waitlist
                                                                    INNER JOIN usuarios ON waitlist.id_usuario = usuarios.id_usuario
                                                                    WHERE id_libro = $id_libro ORDER BY turno";
                                                        $query_waitlist = DatasetSQL($query9);
                                                        
                                                    
                                                        while ($row9 = mysqli_fetch_array($query_waitlist)) {
                                                            $turno = $row9['turno'];
                                                            $nombre_waitlist = $row9['nombres'] . " " . $row9['apellidos'];
                                                            $correo_waitlist = $row9['correo'];
                                                            $codigo_usuario_waitlist = $row9['codigo_usuario'];
                                                    
                                                            $waitlist .= '<tr>
                                                                            <td>' . $turno . '</td>
                                                                            <td>' . $nombre_waitlist . '</td>
                                                                            <td>' . $correo_waitlist . '</td>
                                                                            <td class="text-center">' . $codigo_usuario_waitlist . '</td>
                                                                        </tr>';
                                                        }

                                                        
                                                        $waitlist .= '</tbody>
                                                            </table>
                                                        </div>';
                                                    
                                                    } else {
                                                        $waitlist = "No existe lista de espera";
                                                    }


                                                } else{
                                                    $prestamo = "No hay ningún préstamo activo.";
                                                    $waitlist = "No existe lista de espera";
                                                }


                                                
                                                

                                                echo '<tr>
                                                    <td>

                                                        <div class="ps-product--cart">

                                                            <div class="ps-product__thumbnail">

                                                                <a href="libro/'.$id_libro.'/'.$url_producto.'"><img src="'.$ruta_foto_portada.'" alt="$titulo"></a>

                                                            </div>

                                                            <div class="ps-product__content">

                                                                <a href="libro/'.$id_libro.'/'.$url_producto.'">'.$titulo.'</a>

                                                                <p>Autor: <strong>'.$autor.'</strong></p>

                                                            </div>

                                                        </div>

                                                    </td>';
                                                    if($existe_prestamos > 0){
                                                        if($id_status_prestamo == 2){
                                                            if($fecha_inicio == "Por acordar" OR $fecha_fin == "Por acordar"){
                                                                echo '<td class="text-center">'.$fecha_inicio.'</td>
                                                                    <td class="text-center">'.$fecha_fin.'</td>';
                                                            } else{
                                                                echo '<td class="text-center">Espera confirmación</td>
                                                                        <td class="text-center">Espera confirmación</td>';
                                                            }
                                                        } else{
                                                            echo '<td class="text-center">'.$fecha_inicio.'</td>
                                                            <td class="text-center">'.$fecha_fin.'</td>';
                                                        }
                                                    } else{
                                                        echo '<td class="text-center">-</td>
                                                            <td class="text-center">-</td>';
                                                    }
                                                    

                                                    echo '<td class="text-center">'.$mensaje_status.'</td>                       


                                                    <td class="text-center">                                                               
                                                        <a class="btn btn-link" type="button" style="font-size: 16px;" href="" onclick="ver_waitlist('.$id_libro.', event)">Ver detalles</a>
                                                    </td>

                                                </tr>'; 

                                                echo '<tr id="waitlist_'.$id_libro.'" style="display: none;">
                                                    <td style="text-align: left !important;" colspan="7" id="table_prestamo_'.$id_libro.'">
                                                        <strong>Préstamo: </strong><br>'
                                                        .$prestamo.'
                                                        <br>
                                                        <strong>Lista de Espera: </strong><br>'
                                                        .$waitlist.'
                                                    </td>
                                                </tr>';

                                                //fas fa-book-openfas fa-book-open     - Disponible
                                                //fas fa-book-reader                   - Prestado
                                                //fas fa-book   -                      - Inactivo
                                                

                                            }
                                        }

                                        ?>

                                    </tbody>

                                    </table>

                                </div>

                                <hr>

                                <!-- <div class="d-flex flex-row-reverse">
                                <div class="p-2"><h3>Total <span>$414.00</span></h3></div>             
                                </div>

                                <div class="ps-section__cart-actions">

                                    <a class="ps-btn" href="categories.html.html">
                                        <i class="icon-arrow-left"></i> Back to Shop
                                    </a>

                                    <a class="ps-btn" href="checkout.html">
                                        Proceed to checkout <i class="icon-arrow-right"></i> 
                                    </a>

                                </div> -->

                            </div> 
                            
                        </div>

                        <!-- Fin sección -->



                        <!-- Inicio sección 
                            #region Prestamos Recibidos
                        -->

                        <div class="container" id="div_prestamos_recibidos">

                            <div class="ps-section__header">

                                <h1>Préstamos Recibidos</h1>

                            </div>

                            <div class="ps-section__content" style="margin-top: -50px;">

                                <div class="table-responsive">
                                    
                                <div class="ps-section__cart-actions" style="margin-top: -100px; margin-bottom: -50px;">

                                    <!-- <a class="ps-btn" onmouseover="this.style.color='white';" onmouseout="this.style.color='black';"  onclick="abrir_modal(1)">
                                        <i class="fa-solid fa-circle-plus" data-bs-whatever="@mdo"></i> Agregar Libro
                                    </a> -->

                                </div>

                                <table class="table ps-table--shopping-cart" id="tabla_prestamos_recibidos">

                                    <thead>

                                        <tr>

                                            <th>Estatus</th>
                                            <th>Libro</th>
                                            <th>Dueño</th>
                                            <th>Fecha de Préstamo</th>
                                            <th>Fecha de Entrega</th>
                                            <th>Detalles</th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        <?php 
                                        $query5 = "SELECT COUNT(*) AS cuantos FROM prestamos WHERE id_usuario_destino = $id_usuario_global AND (status_prestamo = 2 OR status_prestamo = 3)";
                                        $cuantos_prestamos = GetValueSQL($query5, 'cuantos');

                                        if($cuantos_prestamos > 0){
                                            $query6 = "SELECT * FROM prestamos
                                            INNER JOIN libros ON prestamos.id_libro = libros.id_libro
                                            INNER JOIN status_libro ON prestamos.status_prestamo = status_libro.id_status
                                            WHERE id_usuario_destino = $id_usuario_global AND (status_prestamo = 2 OR status_prestamo = 3)
                                            ORDER BY id_prestamo DESC";
                                            $prestamos_recibidos = DatasetSQL($query6);

                                            while($row6 = mysqli_fetch_array($prestamos_recibidos)){
                                                $id_prestamo = $row6['id_prestamo'];
                                                $id_usuario_owner = $row6['id_usuario_owner'];
                                                $id_libro = $row6['id_libro'];
                                                $titulo = $row6['titulo'];
                                                $autor = $row6['autor'];
                                                $isbn = $row6['isbn'];
                                                $editorial = $row6['editorial'];
                                                $year = $row6['year'];
                                                $fecha_agregado = $row6['fecha_agregado']; 
                                                $sinopsis = $row6['sinopsis'];
                                                $id_libro = $row6['id_libro'];
                                                $ruta_foto_portada = $row6['ruta_foto_portada'];
                                                $status = $row6['status_nombre'];

                                                $url_producto = str_replace(" ", "-", $titulo);
                                                $url_producto = str_replace("/", "-", $url_producto);
                                                $url_producto = quitarAcentos($url_producto);
                                                $url_producto = preg_replace('/[^a-zA-Z0-9\s-]/', '', $url_producto);

                                                $id_status = $row6['id_status'];

                                                switch($id_status){
                                                    case 1:
                                                        $cambiar_status_libro = '<a type="button" onclick="cambiar_status_libro('.$id_libro.', 1)" title="Cambiar estatus"><i class="fas fa-toggle-on"></i></a>';
                                                        $mensaje_status = '<i class="fas fa-book-openfas fa-book-open"></i> '.$status;
                                                    break;
                                                    case 2:
                                                        $cambiar_status_libro = '';
                                                        $mensaje_status = '<i class="fas fa-book-reader"></i> '.$status;
                                                    break;
                                                    case 3:
                                                        $cambiar_status_libro = '<a type="button" onclick="cambiar_status_libro('.$id_libro.', 3)"><i class="fas fa-toggle-off"></i></a>';
                                                        $mensaje_status = '<i class="fas fa-book"></i> '.$status;
                                                    break;
                                                }

                                                if($year == NULL){
                                                    $year = "Sin Año";
                                                }
                                            
                                                if($sinopsis == NULL){
                                                    $sinopsis = "Sin Sinopsis";
                                                }

                                                if($ruta_foto_portada == NULL){
                                                    $ruta_foto_portada = $ruta_foto_no_existente;
                                                }

                                                $query18 = "SELECT * FROM usuarios WHERE id_usuario = $id_usuario_owner";
                                                $nombres_owner = GetValueSQL($query18, 'nombres');
                                                $apellidos_owner = GetValueSQL($query18, 'apellidos');
                                                $nombre_owner = $nombres_owner.' '.$apellidos_owner;

                                                $query11 = "SELECT * FROM prestamos 
                                                INNER JOIN usuarios ON prestamos.id_usuario_owner = usuarios.id_usuario
                                                INNER JOIN status_prestamos ON prestamos.status_prestamo = status_prestamos.id_status
                                                WHERE id_prestamo = $id_prestamo";

                                                $nombre_prestamo = GetValueSQL($query11, 'nombres'). " " .GetValueSQL($query11, 'apellidos');
                                                $correo_prestamo = GetValueSQL($query11, 'correo');
                                                $codigo_usuario_prestamo = GetValueSQL($query11, 'codigo_usuario');
                                                $fecha_inicio = GetValueSQL($query11, 'fecha_inicio');
                                                $fecha_fin = GetValueSQL($query11, 'fecha_fin');
                                                $id_status_prestamo = GetValueSQL($query11, 'status_prestamo');
                                                $status_prestamo = GetValueSQL($query11, 'status_nombre');

                                                if($fecha_fin == NULL){
                                                    $fecha_fin = "Por acordar";
                                                }

                                                if($fecha_inicio == NULL){
                                                    $fecha_inicio = "Por acordar";
                                                }

                                                $detalles = '<div class="table-responsive" id="tabla_prestamo_'.$id_prestamo.'">
                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Prestador</th>
                                                                            <th>Correo Institucional</th>
                                                                            <th>Código UDG</th>';
                                                                            if($id_status_prestamo == 1 ){
                                                                                $detalles .= '<th>Opciones</th>';
                                                                            }
                                                                            if($id_status_prestamo == 2 || $id_status_prestamo == 3 || $id_status_prestamo == 4){
                                                                                $detalles .= '<th>Chat</th>';
                                                                                if($id_status_prestamo == 2)
                                                                                    $detalles .= '<th>Denegar</th>';
                                                                            }
                                                                        $detalles .= '</tr>
                                                                    </thead>
                                                                    <tbody>';

                                                $detalles .= '<tr>
                                                    <td>' . $nombre_prestamo . '</td>
                                                    <td>' . $correo_prestamo . '</td>
                                                    <td class="text-center">' . $codigo_usuario_prestamo . '</td>';
                                                    
                                                    if($id_status_prestamo == 1 ){
                                                        $detalles .= '<td class="text-center" >
                                                            <a class="btn btn-link" type="button" style="font-size: 16px;" href="" onclick="aceptar_denegar_prestamo('.$id_prestamo.', '.$id_libro.', 1, event)">Aceptar</a> / 
                                                            <a class="btn btn-link" type="button" style="font-size: 16px;" href="" onclick="aceptar_denegar_prestamo('.$id_prestamo.', '.$id_libro.', 2, event)">Denegar</a>
                                                        </td>';
                                                    }

                                                    if($id_status_prestamo == 2 || $id_status_prestamo == 3 || $id_status_prestamo == 4){
                                                        $detalles .= '<td class="text-center" >
                                                            <a title="Ingresar a chat" class="btn btn-secondary" type="button" style="font-size: 16px;" href="chat/'.$codigo_usuario_prestamo.'"><i class="fa fa-comment chat-icon"></i></a>
                                                        </td>';
                                                        if($id_status_prestamo == 2){
                                                            $detalles .= '<td class="text-center" >
                                                            <a title="Cancelar prestamo" class="text-danger" type="button" style="font-size: 27px;" onclick = "cancelar_prestamo('.$id_prestamo.')" ><i class="fa-regular fa-circle-xmark"></i></a>
                                                        </td>';
                                                        }
                                                    } 

                                                $detalles .= '</tr>';


                                                $detalles .= '</tbody>
                                                            </table>
                                                        </div>';
                                                                                        
                                                
                                                echo '<tr>

                                                <td class="text-center">
                                                        '.$status_prestamo.'
                                                    </td>
                                                    <td>

                                                        <div class="ps-product--cart">

                                                            <div class="ps-product__thumbnail">

                                                                <a href="libro/'.$id_libro.'/'.$url_producto.'"><img src="'.$ruta_foto_portada.'" alt="$titulo"></a>

                                                            </div>

                                                            <div class="ps-product__content">

                                                                <a href="libro/'.$id_libro.'/'.$url_producto.'">'.$titulo.'</a>

                                                                <p>Autor: <strong>'.$autor.'</strong></p>

                                                            </div>

                                                        </div>

                                                    </td>';

                                                    echo '<td class="text-center"><a class="btn btn-link" style="font-size: 16px;" href="usuario/'.$id_usuario_owner.'">'.$nombre_owner.'</a></td>';
                                                    
                                                    if($id_status_prestamo == 2){
                                                        if($fecha_inicio == "Por acordar" OR $fecha_fin == "Por acordar"){
                                                            echo '<td class="text-center">'.$fecha_inicio.'</td>
                                                                <td class="text-center">'.$fecha_fin.'</td>';
                                                        } else{
                                                            echo '<td class="text-center">Espera confirmación</td>
                                                                    <td class="text-center">
                                                                        <a href="" class="btn btn-danger" style="font-size: 16px;" data-bs-toggle="modal" data-bs-target="#modalVerificarFechas" data-bs-whatever="@mdo" data-id="'.$id_prestamo.'" onclick="llenar_form_confirmar_fechas('.$id_prestamo.')">Acciones necesarias *</a>
                                                                    </td>';
                                                        }
                                                    } else{
                                                        echo '<td class="text-center">'.$fecha_inicio.'</td>
                                                        <td class="text-center">'.$fecha_fin.'</td>';
                                                    }


                                                    echo '              
                                                    <td class="text-center">                                                               
                                                        <a class="btn btn-link" type="button" style="font-size: 16px;" href="" onclick="ver_waitlist('.$id_libro.', event)">Ver detalles</a>
                                                    </td>

                                                </tr>'; 

                                                echo '<tr id="waitlist_'.$id_libro.'" style="display: none;">
                                                    <td style="text-align: left !important;" colspan="7" id="table_prestamo_'.$id_libro.'">
                                                        <strong>Detalles: </strong><br>'
                                                        .$detalles.'
                                                        <br>
                                                    </td>
                                                </tr>';

                                                //fas fa-book-openfas fa-book-open     - Disponible
                                                //fas fa-book-reader                   - Prestado
                                                //fas fa-book   -                      - Inactivo
                                                

                                            }
                                        }

                                        ?>

                                    </tbody>

                                    </table>

                                </div>

                                <hr>

                                <!-- <div class="d-flex flex-row-reverse">
                                <div class="p-2"><h3>Total <span>$414.00</span></h3></div>             
                                </div>

                                <div class="ps-section__cart-actions">

                                    <a class="ps-btn" href="categories.html.html">
                                        <i class="icon-arrow-left"></i> Back to Shop
                                    </a>

                                    <a class="ps-btn" href="checkout.html">
                                        Proceed to checkout <i class="icon-arrow-right"></i> 
                                    </a>

                                </div> -->

                            </div> 
                            
                        </div>

                        <!-- Fin sección -->


                        <!--------------------------------------- 
                            #region Mis Libros
                        ---------------------------------------->
                        
                        <div class="container" id="div_mis_libros">

                            <div class="ps-section__header">

                                <h1>Mis Libros</h1>

                            </div>

                            <div class="ps-section__content" style="margin-top: -50px;">

                                <div class="table-responsive">
                                    
                                <div class="ps-section__cart-actions" style="margin-top: -100px; margin-bottom: -50px;">
                                    <?php
                                    if($id_status_usuario != 2){  ?>
                                        <!-- 
                                            #region CAMBIAR IF A != 2
                                        -->
                                        <a class="btn ps-btn" type="button" data-bs-toggle="modal" data-bs-target="#modalAgregarLibro" data-bs-whatever="@mdo">
                                            <i class="fa-solid fa-circle-plus"></i> Agregar Libro
                                        </a>
                                    <?php } ?>


                                </div>
                                    <div class="table-responsive">
                                        <table class="table ps-table--shopping-cart">

                                            <thead>

                                                <tr>

                                                    <th>Libro</th>
                                                    <th>Editorial</th>
                                                    <th>Año</th>
                                                    <th>Fecha de Agregado</th>
                                                    <th>Estatus</th>
                                                    <th>Opciones</th>

                                                </tr>

                                            </thead>

                                            <tbody>

                                                <?php 
                                                $query5 = "SELECT COUNT(*) AS cuantos FROM libros WHERE id_usuario = $id_usuario_global";
                                                $cuantos_libros = GetValueSQL($query5, 'cuantos');

                                                if($cuantos_libros > 0){
                                                    $query6 = "SELECT * FROM libros
                                                    INNER JOIN status_libro ON libros.status = status_libro.id_status
                                                    WHERE id_usuario = $id_usuario_global
                                                    ORDER BY (id_libro = 3) DESC";
                                                    $mis_libros = DatasetSQL($query6);

                                                    while($row6 = mysqli_fetch_array($mis_libros)){
                                                        $id_libro = $row6['id_libro'];
                                                        $titulo = $row6['titulo'];
                                                        $autor = $row6['autor'];
                                                        $isbn = $row6['isbn'];
                                                        $editorial = $row6['editorial'];
                                                        $year = $row6['year'];
                                                        $fecha_agregado = $row6['fecha_agregado']; 
                                                        $sinopsis = $row6['sinopsis'];
                                                        $id_libro = $row6['id_libro'];
                                                        $ruta_foto_portada = $row6['ruta_foto_portada'];
                                                        $status = $row6['status_nombre'];

                                                        $url_producto = str_replace(" ", "-", $titulo);
                                                        $url_producto = str_replace("/", "-", $url_producto);
                                                        $url_producto = quitarAcentos($url_producto);
                                                        $url_producto = preg_replace('/[^a-zA-Z0-9\s-]/', '', $url_producto);

                                                        $id_status = $row6['id_status'];

                                                        switch($id_status){
                                                            case 1:
                                                                $cambiar_status_libro = '<a type="button" onclick="cambiar_status_libro('.$id_libro.', 1)" title="Cambiar estatus"><i class="fas fa-toggle-on"></i></a>';
                                                                $mensaje_status = '<i class="fas fa-book-openfas fa-book-open"></i> '.$status;
                                                            break;
                                                            case 2:
                                                                $cambiar_status_libro = '';
                                                                $mensaje_status = '<i class="fas fa-book-reader"></i> '.$status;
                                                            break;
                                                            case 3:
                                                                $cambiar_status_libro = '<a type="button" onclick="cambiar_status_libro('.$id_libro.', 3)"><i class="fas fa-toggle-off"></i></a>';
                                                                $mensaje_status = '<i class="fas fa-book"></i> '.$status;
                                                            break;
                                                        }

                                                        if($year == NULL){
                                                            $year = "Sin Año";
                                                        }
                                                    
                                                        if($sinopsis == NULL){
                                                            $sinopsis = "Sin Sinopsis";
                                                        }

                                                        if($ruta_foto_portada == NULL){
                                                            $ruta_foto_portada = $ruta_foto_no_existente;
                                                        }

                                                        $query10 = "SELECT COUNT(*) AS existe FROM prestamos WHERE id_libro = $id_libro AND status_prestamo != 4 AND status_prestamo != 6";
                                                        $existe_prestamos = GetValueSQL($query10, 'existe');

                                                        if($existe_prestamos > 0){
                                                            $query11 = "SELECT * FROM prestamos 
                                                            INNER JOIN usuarios ON prestamos.id_usuario_destino = usuarios.id_usuario
                                                            INNER JOIN status_prestamos ON prestamos.status_prestamo = status_prestamos.id_status
                                                            WHERE id_libro = $id_libro AND status_prestamo != 4 AND status_prestamo != 6";

                                                            $id_prestamo = GetValueSQL($query11, 'id_prestamo');
                                                            $nombre_prestamo = GetValueSQL($query11, 'nombres'). " " .GetValueSQL($query11, 'apellidos');
                                                            $correo_prestamo = GetValueSQL($query11, 'correo');
                                                            $codigo_usuario_prestamo = GetValueSQL($query11, 'codigo_usuario');
                                                            $fecha_inicio = GetValueSQL($query11, 'fecha_inicio');
                                                            $fecha_fin = GetValueSQL($query11, 'fecha_fin');
                                                            $id_status_prestamo = GetValueSQL($query11, 'status_prestamo');
                                                            $status_prestamo = GetValueSQL($query11, 'status_nombre');

                                                            if($fecha_fin == NULL){
                                                                $fecha_fin = "Por acordar";
                                                            }

                                                            if($fecha_inicio == NULL){
                                                                $fecha_inicio = "Por acordar";
                                                            }

                                                            $prestamo = '<div class="table-responsive">
                                                                            <table class="table table-bordered">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Status</th>
                                                                                        <th>Nombre</th>
                                                                                        <th>Correo Institucional</th>
                                                                                        <th>Código UDG</th>
                                                                                        <th>Fecha Inicio</th>
                                                                                        <th>Fecha Fin</th>';
                                                                                        if($id_status_prestamo == 1 ){
                                                                                            $prestamo .= '<th>Opciones</th>';
                                                                                        }
                                                                                    $prestamo .= '</tr>
                                                                                </thead>
                                                                                <tbody>';

                                                            $prestamo .= '<tr>
                                                                <td>' . $status_prestamo . '</td>
                                                                <td>' . $nombre_prestamo . '</td>
                                                                <td>' . $correo_prestamo . '</td>
                                                                <td class="text-center">' . $codigo_usuario_prestamo . '</td>
                                                                <td class="text-center">' . $fecha_inicio . '</td>
                                                                <td class="text-center">' . $fecha_fin . '</td>';
                                                                if($id_status_prestamo == 1 ){
                                                                    $prestamo .= '<td class="text-center" >
                                                                        <a class="btn btn-link" type="button" style="font-size: 16px;" href="" onclick="aceptar_denegar_prestamo('.$id_prestamo.', '.$id_libro.', 1, event)">Aceptar</a> / 
                                                                        <a class="btn btn-link" type="button" style="font-size: 16px;" href="" onclick="aceptar_denegar_prestamo('.$id_prestamo.', '.$id_libro.', 2, event)">Denegar</a>
                                                                            
                                                                    </td>';
                                                                }
                                                            $prestamo .= '</tr>';


                                                            $prestamo .= '</tbody>
                                                                        </table>
                                                                    </div>';
                                                            

                                                            $query8 = "SELECT COUNT(*) AS cuantos FROM waitlist
                                                            INNER JOIN usuarios ON waitlist.id_usuario = usuarios.id_usuario
                                                            WHERE id_libro = $id_libro";
                                                            $cuantos_waitlist = GetValueSQL($query8, 'cuantos');

                                                            if ($cuantos_waitlist > 0) {

                                                                $waitlist = '<div class="table-responsive">
                                                                            <table class="table table-bordered">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Turno</th>
                                                                                        <th>Nombre</th>
                                                                                        <th>Correo Institucional</th>
                                                                                        <th>Código UDG</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>';

                                                                $query9 = "SELECT * FROM waitlist
                                                                            INNER JOIN usuarios ON waitlist.id_usuario = usuarios.id_usuario
                                                                            WHERE id_libro = $id_libro ORDER BY turno";
                                                                $query_waitlist = DatasetSQL($query9);
                                                                
                                                            
                                                                while ($row9 = mysqli_fetch_array($query_waitlist)) {
                                                                    $turno = $row9['turno'];
                                                                    $nombre_waitlist = $row9['nombres'] . " " . $row9['apellidos'];
                                                                    $correo_waitlist = $row9['correo'];
                                                                    $codigo_usuario_waitlist = $row9['codigo_usuario'];
                                                            
                                                                    $waitlist .= '<tr>
                                                                                    <td>' . $turno . '</td>
                                                                                    <td>' . $nombre_waitlist . '</td>
                                                                                    <td>' . $correo_waitlist . '</td>
                                                                                    <td class="text-center">' . $codigo_usuario_waitlist . '</td>
                                                                                </tr>';
                                                                }

                                                                
                                                                $waitlist .= '</tbody>
                                                                    </table>
                                                                </div>';
                                                            
                                                            } else {
                                                                $waitlist = "No existe lista de espera";
                                                            }


                                                        } else{
                                                            $prestamo = "No hay ningún préstamo activo.";
                                                            $waitlist = "No existe lista de espera";
                                                        }


                                                        
                                                        

                                                        echo '<tr>
                                                            <td>
            
                                                                <div class="ps-product--cart">
            
                                                                    <div class="ps-product__thumbnail">
            
                                                                        <a href="libro/'.$id_libro.'/'.$url_producto.'"><img src="'.$ruta_foto_portada.'" alt="$titulo"></a>
            
                                                                    </div>
            
                                                                    <div class="ps-product__content">
            
                                                                        <a href="libro/'.$id_libro.'/'.$url_producto.'">'.$titulo.'</a>
            
                                                                        <p>Autor: <strong>'.$autor.'</strong></p>
                                                                        <p>ISBN: <strong>'.$isbn.'</strong></p>
                                                                        <a type="button" href="" onclick="ver_sinopsis('.$id_libro.', event)">Ver sinopsis</a>
            
                                                                    </div>
            
                                                                </div>
            
                                                            </td>

                                                            <td class="text-center">'.$editorial.'</td>
                                                            
                                                            <td class="text-center">'.$year.'</td>
            
                                                            <td class="text-center">'.$fecha_agregado.'</td>
            
                                                            <td class="text-center">'.$mensaje_status.'</td>                       
            
                                                            <td class="text-center">
            
                                                                <a type="button" data-bs-toggle="modal" data-bs-target="#modalEditarLibro" data-bs-whatever="@mdo" onclick="llenar_form_editar_libro('.$id_libro.')" title="Editar libro"><i class="fa-solid fa-pen-to-square"></i></a>&emsp;
                                                                '.$cambiar_status_libro.'
            
                                                            </td>

                                                            
            
                                                        </tr>'; 

                                                        echo '<tr id="sinopsis_'.$id_libro.'" style="display: none;">
                                                            <td class="text-center " colspan="7"><strong>Sinopsis: </strong>'.$sinopsis.'</td>
                                                        </tr>';


                                                        //fas fa-book-openfas fa-book-open     - Disponible
                                                        //fas fa-book-reader                   - Prestado
                                                        //fas fa-book   -                      - Inactivo
                                                        

                                                    }
                                                }

                                                ?>

                                            </tbody>

                                        </table>

                                    </div>
                                    
                                </div>

                                <hr>

                                <!-- <div class="d-flex flex-row-reverse">
                                <div class="p-2"><h3>Total <span>$414.00</span></h3></div>             
                                </div>

                                <div class="ps-section__cart-actions">

                                    <a class="ps-btn" href="categories.html.html">
                                        <i class="icon-arrow-left"></i> Back to Shop
                                    </a>

                                    <a class="ps-btn" href="checkout.html">
                                        Proceed to checkout <i class="icon-arrow-right"></i> 
                                    </a>

                                </div> -->

                            </div> 
                            
                        </div>

                        <!-- Fin sección -->


                        <!-- Inicio sección 
                            #region Historial de Prestamos
                        -->

                        <div class="container" id="div_historial_prestamos">

                            <div class="ps-section__header">

                                <h1>Historial de Préstamos</h1>

                            </div>

                            



                            <div class="ps-section__content" style="margin-top: -50px;">

                                <div class="table-responsive">
                                    
                                <div class="ps-section__cart-actions" style="margin-top: -100px; margin-bottom: -50px;">

                                    <!-- <a class="ps-btn" onmouseover="this.style.color='white';" onmouseout="this.style.color='black';"  onclick="abrir_modal(1)">
                                        <i class="fa-solid fa-circle-plus" data-bs-whatever="@mdo"></i> Agregar Libro
                                    </a> -->


                                </div>

                                    <table class="table ps-table--shopping-cart" id="tabla_historial_prestamos">

                                        <thead>

                                            <tr>
                                                <td colspan="6" style="background-color: #f8f9fa;"><p class="h1 text-secondary " style="font-size: 20px;">LIBROS QUE ME PRESTARON</p></td>
                                            </tr>
                                            <tr>

                                                <th>Libro</th>
                                                <th>Prestador</th>
                                                <th>Fecha de Préstamo</th>
                                                <th>Fecha de Entrega</th>
                                                <th>Estatus</th>
                                                <th>Calificar usuario</th>

                                            </tr>

                                        </thead>

                                        <tbody>

                                            <?php 
                                            $query5 = "SELECT COUNT(*) AS cuantos FROM prestamos WHERE id_usuario_destino = $id_usuario_global AND status_prestamo = 4";
                                            $cuantos_libros = GetValueSQL($query5, 'cuantos');
                                            // echo $query5;

                                            if($cuantos_libros > 0){
                                                $query6 = "SELECT * FROM prestamos
                                                INNER JOIN libros ON prestamos.id_libro = libros.id_libro
                                                INNER JOIN usuarios ON prestamos.id_usuario_owner = usuarios.id_usuario
                                                INNER JOIN status_prestamos ON prestamos.status_prestamo = status_prestamos.id_status
                                                WHERE id_usuario_destino = $id_usuario_global AND status_prestamo = 4";
                                                
                                                $mis_libros = DatasetSQL($query6);

                                                while($row6 = mysqli_fetch_array($mis_libros)){
                                                    $id_libro = $row6['id_libro'];
                                                    $titulo = $row6['titulo'];
                                                    $autor = $row6['autor'];
                                                    $isbn = $row6['isbn'];
                                                    $editorial = $row6['editorial'];
                                                    $year = $row6['year'];
                                                    $sinopsis = $row6['sinopsis'];
                                                    $id_libro = $row6['id_libro'];
                                                    $ruta_foto_portada = $row6['ruta_foto_portada'];
                                                    $status_prestamo = $row6['status_nombre'];

                                                    $fecha_inicio = $row6['fecha_inicio'];
                                                    $fecha_fin = $row6['fecha_fin'];

                                                    $nombres_owner = $row6['nombres'];
                                                    $apellidos_owner = $row6['apellidos'];
                                                    $id_usuario_owner = $row6['id_usuario'];
                                                    $id_prestamo = $row6['id_prestamo'];

                                                    $url_producto = str_replace(" ", "-", $titulo);
                                                    $url_producto = str_replace("/", "-", $url_producto);
                                                    $url_producto = quitarAcentos($url_producto);
                                                    $url_producto = preg_replace('/[^a-zA-Z0-9\s-]/', '', $url_producto);

                                                    if($year == NULL){
                                                        $year = "Sin Año";
                                                    }
                                                
                                                    if($sinopsis == NULL){
                                                        $sinopsis = "Sin Sinopsis";
                                                    }

                                                    if($ruta_foto_portada == NULL){
                                                        $ruta_foto_portada = $ruta_foto_no_existente;
                                                    }

                                                    echo "<script>
                                                    rellenar_estrellas_rese($id_prestamo, $id_usuario_global, $id_usuario_owner);
                                                    </script>";


                                                    echo '<tr>
                                                        <td>
        
                                                            <div class="ps-product--cart">
        
                                                                <div class="ps-product__thumbnail">
        
                                                                    <a href="libro/'.$id_libro.'/'.$url_producto.'"><img src="'.$ruta_foto_portada.'" alt="$titulo"></a>
        
                                                                </div>
        
                                                                <div class="ps-product__content">
                                                                    
                                                                    <a href="libro/'.$id_libro.'/'.$url_producto.'">'.$titulo.'</a>
        
                                                                    <p>Autor: <strong>'.$autor.'</strong></p>
                                                                    <p>ISBN: <strong>'.$isbn.'</strong></p>
        
                                                                </div>
        
                                                            </div>
        
                                                        </td>

                                                        <td class="text-center"><a class="btn btn-link" style="font-size: 16px;" href="usuario/'.$id_usuario_owner.'">'.$nombres_owner.' '.$apellidos_owner.'</a></td>
                                                        
                                                        <td class="text-center">'.$fecha_inicio.'</td>
        
                                                        <td class="text-center">'.$fecha_fin.'</td>
        
                                                        <td class="text-center">'.$status_prestamo.'</td>     
                                                        
                                                        <td class="text-center">
                                                            <div class="rating" id="rating-'.$id_prestamo.'">
                                                            </div>
                                                            <button class="btn btn-info btn-lg" onclick="activar_agregar_review(<?php echo $id_libro; ?>)" data-bs-toggle="modal" data-bs-target="#modalAgregarReview" data-bs-whatever="@mdo" data-id_libro="'.$id_libro.'" data-id_reviewer="'.$id_usuario_global.'">Agregar reseña</button>
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


                            <!-- 
                                #region Libros que yo presté
                            -->

                            
                            <div class="ps-section__content ">

                                <div class="table-responsive">
                                    
                                <div class="ps-section__cart-actions" >

                                    <!-- <a class="ps-btn" onmouseover="this.style.color='white';" onmouseout="this.style.color='black';"  onclick="abrir_modal(1)">
                                        <i class="fa-solid fa-circle-plus" data-bs-whatever="@mdo"></i> Agregar Libro
                                    </a> -->


                                </div>

                                    <table class="table ps-table--shopping-cart" id="tabla_historial_preste">

                                        <thead>

                                            <tr>
                                                <td colspan="6" style="background-color: #f8f9fa;"><p class="h1 text-secondary " style="font-size: 20px;">LIBROS QUE YO PRESTÉ</p></td>
                                            </tr>
                                            <tr>

                                                <th>Libro</th>
                                                <th>Prestado a</th>
                                                <th>Fecha de Préstamo</th>
                                                <th>Fecha de Entrega</th>
                                                <th>Estatus</th>
                                                <th>Calificar usuario</th>

                                            </tr>

                                        </thead>

                                        <tbody>

                                            <?php 
                                            $query5 = "SELECT COUNT(*) AS cuantos FROM prestamos WHERE id_usuario_owner = $id_usuario_global AND status_prestamo = 4";
                                            $cuantos_libros = GetValueSQL($query5, 'cuantos');
                                            // echo $query5;

                                            if($cuantos_libros > 0){
                                                $query6 = "SELECT * FROM prestamos
                                                INNER JOIN libros ON prestamos.id_libro = libros.id_libro
                                                INNER JOIN usuarios ON prestamos.id_usuario_destino = usuarios.id_usuario
                                                INNER JOIN status_prestamos ON prestamos.status_prestamo = status_prestamos.id_status
                                                WHERE id_usuario_owner = $id_usuario_global AND status_prestamo = 4";
                                                // echo $query6;
                                                
                                                $mis_libros = DatasetSQL($query6);

                                                while($row6 = mysqli_fetch_array($mis_libros)){
                                                    $id_libro = $row6['id_libro'];
                                                    $titulo = $row6['titulo'];
                                                    $autor = $row6['autor'];
                                                    $isbn = $row6['isbn'];
                                                    $editorial = $row6['editorial'];
                                                    $year = $row6['year'];
                                                    $sinopsis = $row6['sinopsis'];
                                                    $id_libro = $row6['id_libro'];
                                                    $ruta_foto_portada = $row6['ruta_foto_portada'];
                                                    $status_prestamo = $row6['status_nombre'];

                                                    $fecha_inicio = $row6['fecha_inicio'];
                                                    $fecha_fin = $row6['fecha_fin'];

                                                    $nombres_destino = $row6['nombres'];
                                                    $apellidos_destino = $row6['apellidos'];
                                                    $id_usuario_destino = $row6['id_usuario_destino'];
                                                    $id_prestamo = $row6['id_prestamo'];

                                                    echo "<script>
                                                    rellenar_estrellas_rese($id_prestamo, $id_usuario_global, $id_usuario_destino);
                                                    </script>";

                                                    if($year == NULL){
                                                        $year = "Sin Año";
                                                    }
                                                
                                                    if($sinopsis == NULL){
                                                        $sinopsis = "Sin Sinopsis";
                                                    }

                                                    if($ruta_foto_portada == NULL){
                                                        $ruta_foto_portada = $ruta_foto_no_existente;
                                                    }

                                                    echo '<tr>
                                                        <td>
        
                                                            <div class="ps-product--cart">
        
                                                                <div class="ps-product__thumbnail">
        
                                                                    <a href="libro/'.$id_libro.'/'.$url_producto.'"><img src="'.$ruta_foto_portada.'" alt="$titulo"></a>
        
                                                                </div>
        
                                                                <div class="ps-product__content">
        
                                                                    <a href="libro/'.$id_libro.'/'.$url_producto.'">'.$titulo.'</a>
        
                                                                    <p>Autor: <strong>'.$autor.'</strong></p>
                                                                    <p>ISBN: <strong>'.$isbn.'</strong></p>
        
                                                                </div>
        
                                                            </div>
        
                                                        </td>

                                                        <td class="text-center"><a class="btn btn-link" style="font-size: 16px;" href="usuario/'.$id_usuario_destino.'">'.$nombres_destino.' '.$apellidos_destino.'</a></td>
                                                        
                                                        <td class="text-center">'.$fecha_inicio.'</td>
        
                                                        <td class="text-center">'.$fecha_fin.'</td>
        
                                                        <td class="text-center">'.$status_prestamo.'</td>       
                                                        
                                                        <td class="text-center">
                                                            <div class="rating" id="rating-'.$id_prestamo.'">
                                                                
                                                            </div>
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

                        <!-- Fin Sección -->
        </div>           

    </div>

</div>

</div>

</div>
    <!---------------------------------------
    #region Ventanas Modales
    ---------------------------------------->

    <!-- 
        #region Modal Cambiar Información de Usuario
    -->
    <div class="modal fade" id="modalCambiarInfoUsuario"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title title" id="exampleModalLabel">Actualizar Información</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form_actualizar_datos" name="form_actualizar_datos">
                        <div class="form-group row m-2">
                            <p class="h3 text-dark" >Nombre(s): <span class="text-danger">*</span></p>
                            <input class="obligatorio form-control" type="text" id="nombres" name="nombres" placeholder="Nombre(s)" required>
                        </div>

                        <div class="form-group row m-2">
                            <p class="h3 text-dark">Apellidos: <span class="text-danger">*</span></p>
                            <input class="obligatorio form-control" type="text" id="apellidos" name="apellidos" placeholder="Apellidos" required>
                        </div>

                        <!-- <div class="form-group row">
                            <p class="h3 text-dark">Código UDG:</p>
                            <input disabled class="obligatorio form-control" type="text" id="codigo_usuario" name="codigo_usuario" placeholder="Código UDG">
                        </div>

                        <div class="form-group row">
                            <p class="h3 text-dark">Carrera:</p>
                            <input disabled class="obligatorio form-control" type="text" id="carrera" name="carrera" placeholder="Carrera">
                        </div>

                        <div class="form-group row">
                            <p class="h3 text-dark">Cíclo de Ingreso:</p>
                            <input disabled class="obligatorio form-control" type="text" id="ciclo_ingreso" name="ciclo_ingreso" placeholder="Cíclo de Ingreso">
                        </div>

                        <div class="form-group row">
                            <p class="h3 text-dark">Correo Institucional:</p>
                            <input disabled class="obligatorio form-control" type="text" id="correo" name="correo" placeholder="Correo Institucional">
                        </div> -->

                        <div class="form-group m-2">
                            <p class="h3 text-dark">Foto de Perfil(Máximo 2mb): </p>
                            <div class="col">
                                <input type="file" class="form-control-file form-control" id="foto_perfil">
                                <div id="imagen-perfil" class="text-center mt-2"></div> <!-- Aquí se jala la imagen desde la funcion llenar_formulario_actualizar_datos -->
                            </div>
                        </div>
                            
                        <div class="form-group m-2">
                            <p class="h3 text-dark">Credencial de Estudiante(Máximo 2mb): </p>
                            <div class="col">
                                <input type="file" class="form-control-file form-control" id="foto_credencial">
                                <div id="imagen-credencial" class="text-center mt-2"></div> <!-- Aquí igual -->
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="button" class="btn ps-btn" data-bs-dismiss="modal" style="background-color: gray;">Cancelar</button>
                        <button type="button" class="btn ps-btn" onclick='actualizar_usuario(<?php echo $id_usuario_global; ?>, event)'>Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 
        #region Modal Cambiar Contraseña
    -->
    <div class="modal fade" id="modalCambiarPassword"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title title" id="exampleModalLabel">Cambiar Contraseña</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form_cambiar_password" name="form_cambiar_password">
                        <div class="form-group row m-2">
                            <p class="h3 text-dark" >Contraseña Actual: <span class="text-danger">*</span></p>
                            <input class="obligatorio form-control" type="password" id="password_actual" name="password_actual" placeholder="Contraseña actual">
                        </div>

                        <div class="form-group row m-2">
                            <p class="h3 text-dark" >Nueva Contraseña: <span class="text-danger">*</span></p>
                            <input class="obligatorio form-control" type="password" id="nueva_password" name="nueva_password" placeholder="Nueva contraseña">
                        </div>
                        
                        <div class="form-group row m-2">
                            <p class="h3 text-dark" >Confirmar Contraseña <span class="text-danger">*</span></p>
                            <input class="obligatorio form-control" type="password" id="confirmar_nueva_password" name="confirmar_nueva_password" placeholder="Confirmar contraseña">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="button" class="btn ps-btn" data-bs-dismiss="modal" style="background-color: gray;">Cancelar</button>
                        <button type="button" class="btn ps-btn" onclick='cambiar_password(<?php echo $id_usuario_global; ?>)'>Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- 
        #region Modal Agregar Nuevo Libro
    -->
    <div class="modal fade" id="modalAgregarLibro"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title title" id="exampleModalLabel">Nuevo Libro</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form_agregar_libro" name="form_agregar_libro">
                        <div class="form-group row m-2">
                            <p class="h3 text-dark">Título: <span class="text-danger">*</span></p>
                            <input class="obligatorio form-control" type="text" id="al_titulo" name="al_titulo" placeholder="Título" required>
                        </div>

                        <div class="form-group row m-2">
                            <p class="h3 text-dark">Autor: <span class="text-danger">*</span></p>
                            <input class="obligatorio form-control" type="text" id="al_autor" name="al_autor" placeholder="Autor" required>
                        </div>

                        <div class="form-group row m-2">
                            <p class="h3 text-dark">ISBN: <span class="text-danger">*</span></p>
                            <input class="obligatorio form-control" type="text" id="al_isbn" name="al_isbn" placeholder="ISBN" required>
                        </div>

                        <div class="form-group row m-2">
                            <p class="h3 text-dark">Editorial: <span class="text-danger">*</span></p>
                            <input class="obligatorio form-control" type="text" id="al_editorial" name="al_editorial" placeholder="Editorial" required>
                        </div>
                        
                        <div class="form-group row m-2">
                            <p class="h3 text-dark">Año de Publicación: </p>
                            <input class="form-control" type="text" id="al_año" name="al_año" placeholder="Año">
                        </div>
                        
                        <div class="form-group row m-2">
                            <p class="h3 text-dark">Sinopsis: </p>
                            <textarea class="form-control" rows="5" id="al_sinopsis" name="al_sinopsis" placeholder="Sinópsis"></textarea>
                        </div>

                        <div class="form-group m-2">
                            <p class="h3 text-dark">Foto del Libro (Máximo 2mb): <span class="text-danger">*</span></p>
                            <div class="col">
                                <input type="file" class="form-control-file form-control obligatorio" id="al_foto_portada">
                                <div id="imagen-perfil" class="text-center mt-2"></div> <!-- Aquí se jala la imagen desde la funcion llenar_formulario_actualizar_datos -->
                            </div>
                        </div>
                            

                    </form>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="button" class="btn ps-btn" data-bs-dismiss="modal" style="background-color: gray;">Cancelar</button>
                        <button type="button" class="btn ps-btn" onclick='agregar_libro(<?php echo $id_usuario_global; ?>)'>Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- 
        #region Modal Editar Libro
    -->
    <div class="modal fade" id="modalEditarLibro"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title title" id="exampleModalLabel">Nuevo Libro</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form_editar_libro" name="form_editar_libro">
                        <input type="hidden" id="el_id_libro" name="el_id_libro">
                        <div class="form-group row m-2">
                            <p class="h3 text-dark">Título: <span class="text-danger">*</span></p>
                            <input class="obligatorio form-control" type="text" id="el_titulo" name="el_titulo" placeholder="Título" required>
                        </div>

                        <div class="form-group row m-2">
                            <p class="h3 text-dark">Autor: <span class="text-danger">*</span></p>
                            <input class="obligatorio form-control" type="text" id="el_autor" name="el_autor" placeholder="Autor" required>
                        </div>

                        <div class="form-group row m-2">
                            <p class="h3 text-dark">ISBN: <span class="text-danger">*</span></p>
                            <input class="obligatorio form-control" type="text" id="el_isbn" name="el_isbn" placeholder="ISBN" required>
                        </div>

                        <div class="form-group row m-2">
                            <p class="h3 text-dark">Editorial: <span class="text-danger">*</span></p>
                            <input class="obligatorio form-control" type="text" id="el_editorial" name="el_editorial" placeholder="Editorial" required>
                        </div>
                        
                        <div class="form-group row m-2">
                            <p class="h3 text-dark">Año de Publicación: </p>
                            <input class="form-control" type="text" id="el_año" name="el_año" placeholder="Año">
                        </div>
                        
                        <div class="form-group row m-2">
                            <p class="h3 text-dark">Sinopsis: </p>
                            <textarea class="form-control" rows="5" id="el_sinopsis" name="el_sinopsis" placeholder="Sinópsis"></textarea>
                        </div>

                        <div class="form-group m-2">
                            <p class="h3 text-dark">Foto del Libro (Máximo 2mb): </p>
                            <div class="col">
                                <input type="file" class="form-control-file form-control" id="el_foto_portada">
                                <div id="imagen-perfil" class="text-center mt-2"></div> <!-- Aquí se jala la imagen desde la funcion llenar_formulario_actualizar_datos -->
                            </div>
                        </div>
                            

                    </form>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="button" class="btn ps-btn" data-bs-dismiss="modal" style="background-color: gray;">Cancelar</button>
                        <button type="button" class="btn ps-btn" onclick='editar_libro(<?php echo $id_usuario_global; ?>)'>Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


        
    <!-- Ventana modal para añadir nuevo registro -->
    <div class="modal fade" id="modalAgregar"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title title" id="exampleModalLabel">Añadir Nuevo Libro</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" onclick=''>Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
    <!-- 
        #region Modal Acordar Fechas
    -->
    <div class="modal fade" id="modalAcordarFechas"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title title" id="exampleModalLabel">Acordar Fechas</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_prestamo">
                    <form id="form_acordar_fechas" name="form_acordar_fechas">

                        <div class="form-group row m-2">
                            <p class="h3 text-dark">Fecha de Inicio: <span class="text-danger">*</span></p>
                            <input class="obligatorio form-control" type="date" id="fecha_inicio" name="fecha_inicio" required>
                        </div>
                            
                        <div class="form-group row m-2">
                            <p class="h3 text-dark">Fecha Final: <span class="text-danger">*</span></p>
                            <input class="obligatorio form-control" type="date" id="fecha_final" name="fecha_final" required>
                        </div>

                    </form>

                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="button" class="btn ps-btn" data-bs-dismiss="modal" style="background-color: gray;">Cancelar</button>
                        <button type="button" class="btn ps-btn" onclick='acordar_fechas()'>Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
    <!-- 
        #region Modal Verificar Fechas
    -->
    <div class="modal fade" id="modalVerificarFechas"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title title" id="exampleModalLabel">Confirmar Fechas</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_prestamo_fechas">
                    <form id="form_acordar_fechas" name="form_acordar_fechas">

                        <div class="form-group row m-2">
                            <p class="h3 text-dark">Fecha de Inicio: <span class="text-danger">*</span></p>
                            <input class="form-control" type="text" id="conf_fecha_inicio" name="conf_fecha_inicio" disabled>
                        </div>
                            
                        <div class="form-group row m-2">
                            <p class="h3 text-dark">Fecha Final: <span class="text-danger">*</span></p>
                            <input class="form-control" type="text" id="conf_fecha_final" name="conf_fecha_final" disabled>
                        </div>

                    </form>

                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" style="font-size: 16px; padding: 12px 30px;"  onclick='verificar_fechas(2)'>NO Confirmar</button>
                        <button type="button" class="btn btn-info" style="font-size: 16px; padding: 12px 30px;" onclick='verificar_fechas(1)'>Confirmar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <!-- 
        #region Modal Finalizar Préstamo
    -->
    <div class="modal fade" id="modalFinalizarPrestamo" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title title" id="exampleModalLabel">Finalizar Préstamo</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="fp_id_libro">
                    <p class="h4">¿Estas seguro de finalizar el préstamo?</p>
                    

                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="button" class="btn ps-btn" data-bs-dismiss="modal" style="background-color: gray;">Cancelar</button>
                        <button type="button" class="btn ps-btn" onclick='finalizar_prestamo()'>Continuar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 
        #region Modal Agregar Review
    -->
    <div class="modal fade" id="modalAgregarReview"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title title" id="exampleModalLabel">Agregar reseña</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_libro">
                    <input type="hidden" id="id_reviewer">
                    <form id="form_agregar_review" name="form_agregar_review">
                        <div class="form-group row m-2">
                            <p class="h3 text-dark" >Reseña</p>
                            <textarea class="obligatorio form-control" rows="5" id="review" name="review" placeholder="...."></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="button" class="btn ps-btn" data-bs-dismiss="modal" style="background-color: gray;">Cancelar</button>
                        <button type="button" class="btn ps-btn" id="submit">Enviar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    


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
	<!-- <script src="assets/js/funciones.js"></script> -->
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

        var modalAcordar = document.getElementById('modalAcordarFechas');

        modalAcordar.addEventListener('show.bs.modal', (e) => {
            var button = event.relatedTarget;
            var id_prestamo = button.getAttribute('data-id');
            console.log("ID -> ", id_prestamo);
            var inputIdPrestamo = modalAcordar.querySelector('#id_prestamo');
            inputIdPrestamo.value = id_prestamo;
        });
        
        var modalVerificar = document.getElementById('modalVerificarFechas');

        modalVerificar.addEventListener('show.bs.modal', (e) => {
            var button = event.relatedTarget;
            var id_prestamo = button.getAttribute('data-id');
            console.log("ID -> ", id_prestamo);
            var inputIdPrestamo = modalVerificar.querySelector('#id_prestamo_fechas');
            inputIdPrestamo.value = id_prestamo;
        });

        // $('#modalVerificarFechas').on('show.bs.modal', function (event) {
        //     var button = $(event.relatedTarget);
        //     var id_prestamo = button.data('id');
        //     var modal = $(this);
        //     // console.log(id);
        //     modal.find('#id_prestamo_fechas').val(id_prestamo);
        // });

        var modalFinalizar = document.getElementById('modalFinalizarPrestamo');

        modalFinalizar.addEventListener('show.bs.modal', (e) => {
            var button = event.relatedTarget;
            var id_prestamo = button.getAttribute('data-id');
            console.log("ID -> ", id_prestamo);
            var inputIdPrestamo = modalFinalizar.querySelector('#fp_id_libro');
            inputIdPrestamo.value = id_prestamo;
        });

        // $('#modalFinalizarPrestamo').on('show.bs.modal', function (event) {
        //     var button = $(event.relatedTarget);
        //     var id_libro = button.data('id');
        //     var modal = $(this);
        //     // console.log(id);
        //     modal.find('#fp_id_libro').val(id_libro);
        // });

        var modalReview = document.getElementById('modalAgregarReview');
        
        let id_libro_global = null;
        let id_reviewer_global = null;
        modalReview.addEventListener('show.bs.modal', (e) => {
            var button = event.relatedTarget;
            id_libro_global = button.getAttribute('data-id_libro');
            id_reviewer_global = button.getAttribute('data-id_reviewer');
            // console.log("ID libro -> ", id_libro_global);
            // console.log("ID reviewer -> ", id_reviewer_global);
            var inputIdLibro = modalReview.querySelector('#id_libro');
            var inputIdReviewer = modalReview.querySelector('#id_reviewer');
            inputIdLibro.value = id_libro_global;
            inputIdReviewer.value = id_reviewer_global;
        });

	</script>

<!-- 
		#region Reseñas
	-->
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>

	<script type="module">
        // Tu script JavaScript
        import { initializeApp } from "https://www.gstatic.com/firebasejs/10.11.1/firebase-app.js";
        import { getDatabase, set, ref, push, onChildAdded } from "https://www.gstatic.com/firebasejs/10.11.1/firebase-database.js";

        // Your web app's Firebase configuration
        const firebaseConfig = {
            apiKey: "AIzaSyCHNB64eKw2nyZFEXE0O482UqZQfx6I3Cw",
            authDomain: "bookswap-33e37.firebaseapp.com",
            projectId: "bookswap-33e37",
            storageBucket: "bookswap-33e37.appspot.com",
            messagingSenderId: "930267590",
            appId: "1:930267590:web:cfc931bf6d38799a4df2c7"
        };

        // Inicializar Firebase
        const app = initializeApp(firebaseConfig);
        const database = getDatabase(app);

        // var id_libro = id_libro_global;
        // var id_review = id_reviewer_global;
        // var id_libro = document.getElementById('modalAgregarReview').querySelector('#id_libro').value;
        // var id_review = document.getElementById('modalAgregarReview').querySelector('#id_reviewer').value;
        // console.log("id_libro -> ", id_libro);
        // console.log("id_review -> ", id_review);

        var nombres = "<?php echo $nombres; ?>";
        var apellidos = "<?php echo $apellidos; ?>";
        var nombre_completo = nombres + ' ' + apellidos;
        var foto_perfil = "<?php echo $ruta_foto_perfil; ?>";

		document.getElementById('submit').addEventListener('click', function() {
			enviarReview(); // Llama a la función que envía la reseña
		});

		function enviarReview() {
			var review = document.getElementById('review').value.trim();

			
				var review = $("#review").val();

				var maxLength = 1000; // Define el máximo número de caracteres permitidos
                var id_libro = id_libro_global;
                var id_reviewer = id_reviewer_global;

				if (review.length > maxLength) {
					Swal.fire({
						icon: 'error',
						title: '¡Error!',
						text: "La reseña no debe sobrepasar los " + maxLength + " caracteres",
						timer: 1000,
						timerProgressBar: true,
					});
					return;
				}
                
                console.log("Review -> ", review);
				if (review.trim() === "") {
                    Swal.fire({
                        icon: 'error',
						title: '¡Error!',
						text: "La reseña está vacía",
						timer: 1000,
						timerProgressBar: true,
					});
					return;
				}

				const reviewsRef = ref(database, 'reviews/' + id_libro + '/' + id_reviewer);

				set(reviewsRef, {
					sender: nombre_completo,
					review: review,
					timestamp: Date.now()
				}).then(() => {
                    Swal.fire({
						icon: 'success',
						title: 'Reseña enviada!',
						timer: 1000,
						timerProgressBar: true,
                        didOpen: () => {
                            $("#modalAgregarReview").modal('hide'); // Cierra el modal
                        }
					});
					$("#review").val('');
				}).catch((error) => {
					Swal.fire({
						icon: 'error',
						title: '¡Error!',
						text: 'Error al enviar la review: ' + error.message,
						timer: 1000,
						timerProgressBar: true,
					});
					return;
				});

				// Limpia el área de texto después de enviar el mensaje
				$("#review").val('');
		}
    </script>

</body> 
</html>