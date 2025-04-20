<?php
	ob_start();
	session_start();

	// Inicio de sesión
	require "../variables.php";
	require_once "../include/functions.php";
	require_once "../include/db_tools.php";

	if (isset($_SESSION['id_sesion']) and isset($_SESSION['email'])) {
			$id_usuario_global = $_SESSION['id_sesion'];
			$sesion = 1;

			$query0 = "SELECT * FROM usuarios WHERE id_usuario = $id_usuario_global";
			$nombre_usuario_global = GetValueSQL($query0, 'nombres');
			$codigo_usuario_global = GetValueSQL($query0, 'codigo_usuario');

			$query1 = "SELECT CASE WHEN EXISTS (SELECT id_usuario FROM administradores WHERE id_usuario = $id_usuario_global) THEN 1 ELSE 0 END AS result";
			$admin_usuario_global = GetValueSQL($query1, "result");
			// echo "<script>console.log('Admin response: ', " . $admin_usuario_global . ");</script>";

	} else {
			$sesion = 0;
			$id_usuario_global = 0;
			$nombre_usuario_global = " ";
			header("Location: index");
	}

	$host = $_SERVER['HTTP_HOST'];
	$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$base_path = "http://$host/bookswap/";

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

	<title>BookSwap | Prestados</title>
	<?php include ("../include/headertagbase.php"); ?>
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

	<!-- EMPEZAR AQUI -->

	<div
		id="prestados"
		style="background: linear-gradient(to-right,rgba(252, 184, 0, 0.8) 0%, rgba(255, 252, 105, 1) 20%, rgba(255, 255, 255, 1) 100%); overflow: hidden;"
	>
		<img src="<?php echo $base_path;?>img/pdf/stars.png" width="150" style="position: absolute; top: 5%; left: 75%;">
		<img src="<?php echo $base_path;?>img/pdf/star.png" width="150" style="position: absolute; top: 20px; left: 120px;">
		<img src="<?php echo $base_path;?>img/pdf/shinny.png" width="150" style="position: absolute; top: 70%; left: 75%;">
		<img src="<?php echo $base_path;?>img/pdf/OIP.png" width="650" style="position: absolute; top: -20px; left: -450px; transform: rotate(270deg);">
		
		<?php
			$query1 = "SELECT COUNT(*) AS cuantos FROM prestamos WHERE fecha_fin BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, '%Y-%m-01') AND LAST_DAY(NOW() - INTERVAL 1 MONTH) AND id_usuario_owner = $id_usuario_global";
			$cuantos_libros = GetValueSQL($query1, 'cuantos');

			if($cuantos_libros > 0) {
				$query2 = "SELECT 
					libros.id_libro,
					libros.titulo,
					libros.autor,
					libros.year,
					libros.ruta_foto_portada,
					COUNT(*) AS cantidad
				FROM prestamos
				INNER JOIN libros ON libros.id_libro = prestamos.id_libro
				WHERE fecha_fin BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, '%Y-%m-01')
					AND LAST_DAY(NOW() - INTERVAL 1 MONTH)
					AND id_usuario_owner = $id_usuario_global
				GROUP BY libros.id_libro, libros.titulo
				ORDER BY cantidad DESC";
				$prestados = DatasetSQL($query2);

				$prestamo = '<div class="pt-4">
					<table class="m-4 mx-auto ms-4">
						<thead>
							<tr class="mb-4">
								<th></th>
								<th colspan="2" class="text-end" style="position: relative;">
									<h2 class="pt-4 mb-4" style="
										background: linear-gradient(90deg, red, blue);
										-webkit-background-clip: text;
										-webkit-text-fill-color: transparent;
										left: 20%;
									">Libros Prestados</h2>
								</th>
								<th style="padding-left: 12em;"></th>
							</tr>  
						</thead>
						<tbody>';

				$index = 1;
				while($row1 = mysqli_fetch_array($prestados)) {
					$id_libro = $row1['id_libro'];
					$titulo = $row1['titulo'];
					$autor = $row1['autor'];
					$year = $row1['year'];
					$ruta_foto_portada = $row1['ruta_foto_portada'];
					$cantidad = $row1['cantidad'];

					if($year == NULL)
						$year = "";

					if($ruta_foto_portada == NULL)
						$ruta_foto_portada = $ruta_foto_no_existente;

					$url_producto = str_replace(" ", "-", $titulo);
					$url_producto = str_replace("/", "-", $url_producto);
					$url_producto = quitarAcentos($url_producto);
					$url_producto = preg_replace('/[^a-zA-Z0-9\s-]/', '', $url_producto);
					
					$prestamo .= '
							<tr class="pt-8 mb-4">
								<td class="text-center">
									<h2 style="
										width: 50px;
										height: 50px;
										border-radius: 50%;
										margin-right: 1em;
										margin-left: 1em;
										background: #e0e0e0;
										background: radial-gradient(circle,rgba(224, 224, 224, 1) 0%, rgba(255, 0, 0, 1) 100%);
										padding: 4px;
										color: #FFF;
									">'.$index.'</h2>
								</td>
								<td>
									<div class="ps-product--cart">
										<div class="ps-product__thumbnail">
											<a href="libro/'.$id_libro.'/'.$url_producto.'"><img src="'.$base_path.$ruta_foto_portada.'" alt="'.$base_path.$ruta_foto_portada.'"></a>
										</div>
										<div class="ps-product__content">
												<a href="libro/'.$id_libro.'/'.$url_producto.'">'.$titulo.'</a>
												<p></p>
												<p>
													<strong>'.$autor.'</strong><br>
													<strong>'.$year.'</strong>
												</p>
										</div>
									</div>
								</td>
								<td class="text-center" style="
									background: linear-gradient(90deg, red, blue);
									-webkit-background-clip: text;
									-webkit-text-fill-color: transparent;
									position: relative;
									left: 10%;
								">
									<h3>'.$cantidad.'</h3>
								</td>
							</tr>';
					$index += 1;
				}
				$prestamo .= '
						</tbody>
					</table>
				</div>';
			} else {
				$prestamo = "<h2>No se encontraron prestamos :'c</h2>";
			}
			echo $prestamo;
		?>
		
	</div>
  

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

</body>

</html>

<?php
	// Crear objeto (fuera de la condición porque se usa 'use')
	require_once 'dompdf/autoload.inc.php';
	use Dompdf\Dompdf;
	$dompdf = new Dompdf();
	
	// Condición para que cargue rapidamente 404 si no hay datos de sesión
	if ($sesion == 1) {
		// Limpiar HTML y guardarlo en variable
		$html=ob_get_clean();
		// echo $html;
		
		// Mostrar imagenes
		$options = $dompdf->getOptions();
		$options->set(array('isRemoteEnabled' => true));
		$dompdf->setOptions($options);
	
		// Crear PDF
		$dompdf->loadHtml($html);
		$dompdf->setPaper("letter");
	
		// Renderizar
		$dompdf->render();
	
		// Obtener fecha
		setlocale(LC_TIME, 'Spanish_Spain.1252');
		$mes = strftime("%B");
		$año = date("Y");
	
		// attachment es para no descargarlo
		$dompdf->stream("prestados_".ucfirst($mes)."_".$año.".pdf", array("Attachment" => false));
	}
?>