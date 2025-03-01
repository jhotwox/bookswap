<?php
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
	header("Access-Control-Allow-Headers: Content-Type");
	
	require_once "include/functions.php";
	require_once "include/db_tools.php";

    use PHPMailer\PHPMailer\PHPMailer;
	
	require 'include/PHPMailer2022/src/Exception.php';
	require 'include/PHPMailer2022/src/PHPMailer.php';
	require 'include/PHPMailer2022/src/SMTP.php';		
	require_once "extensiones/vendor/autoload.php";

	
	require 'variables.php';

	/*
		#region valida_sesion
	*/
if (Requesting("action")=="valida_sesion"){ 
	session_start();
	$resultStatus 	= "ok"; 
	$resultText 	= "Sesion Válida";
	$id_usuario		= "NULL";
	$email 			= "NULL";
    $nombre         = "NULL";

	if(isset($_SESSION['id_sesion']) AND isset($_SESSION['email'])){    
		$query = "SELECT COUNT(id_usuario) AS existe_usuario, id_usuario, correo, nombres FROM usuarios WHERE id_usuario = ".$_SESSION['id_sesion'];
		//echo $query;
		$existe_usuario 	= GetValueSQL($query,"existe_usuario");
		if($existe_usuario < 1){
			$resultStatus 	= "error"; 
			$resultText 		= "Sesion NO válida";
		}else{
			$id_usuario 	= GetValueSQL($query,"id_usuario");
			$email      	= GetValueSQL($query,"correo");
			$nombres 		= GetValueSQL($query,"nombres");
		}		
	}else{
		$resultStatus 	= "error"; 
		$resultText 	= "Sesion NO válida";
	}

	$result = array(
		'id_usuario' 		=> $id_usuario,
		'email' 			=> $email, 
        'nombres'           => $nombres,
		'result' 			=> $resultStatus, 
		'result_text' 		=> $resultText
	);
	
	XML_Envelope($result);     
	exit;
}

	/*
		#region inicia_sesion
	*/
if (Requesting("action")=="inicia_sesion"){ 
	$login_email		= Requesting("login_email");
	$login_password 	= Requesting("login_password");

	// Siempre se ponen inicio
	$resultStatus 	= "ok"; 
	$resultText 		= "Inicio de sesión exitoso.";
	// Siempre se ponen fin
	$avance 			= 1;	
    $nombre_usuario = "";
	 
	$query = "SELECT COUNT(id_usuario) AS existe, id_usuario AS id_sesion, correo FROM usuarios WHERE correo = '".$login_email."' AND password = '".md5($login_password)."'";
	$existe = GetValueSQL($query,"existe");
	if($existe == 0){
		$resultStatus 	= "error"; 
		$resultText 		= "Verifique su correo o contraseña.";
	}else{		
		$id_sesion 	= GetValueSQL($query,"id_sesion");
        /*Define la pagina de inicio*/
		/* Si por cualquier motivo existe una sesión, la destruye primero */	
		session_start();
        session_destroy();
        session_start();
		$_SESSION['id_sesion'] 		= $id_sesion; 
		$_SESSION['email'] 			= $login_email;						
	} 
	 	
	$result = array( 
		'result' 			=> $resultStatus, 
		'result_text' 		=> $resultText, 
	);	 

	XML_Envelope($result);     
	exit;
 
}

	/*
		#region registro_user
	*/
if(Requesting("action")=="registro_user"){
    $registro_nombre        = Requesting("registro_nombre");
    $registro_apellidos     = Requesting("registro_apellidos");
    $registro_codigo      	= Requesting("registro_codigo");
    $registro_carrera	    = Requesting("registro_carrera");
    $registro_ciclo_ingreso = Requesting("registro_ciclo_ingreso");
    $registro_email         = Requesting("registro_email");
    $registro_password      = Requesting("registro_password");

    $resultStatus = 'ok';
    $resultText = '';

    $query1 = "SELECT COUNT(*) AS existe FROM usuarios WHERE codigo_usuario = '".$registro_codigo."'";
    $existe = GetValueSQL($query1, 'existe');

    if($existe > 0){
        $resultText = 'El código del estudiante ya existe.';
        $resultStatus = 'error';

    } else{

		$query2 = "SELECT COUNT(*) AS existe FROM usuarios WHERE correo = '".$registro_email."'";
		$existe2 = GetValueSQL($query2, 'existe');

		if($existe2 > 0){
			$resultText = 'El correo institucional del estudiante ya existe.';
			$resultStatus = 'error';

		} else{
			$query3 = 'INSERT INTO usuarios (nombres, apellidos, codigo_usuario, carrera, ciclo_ingreso, correo, password, status)
			VALUES ("'.$registro_nombre.'", "'.$registro_apellidos.'", "'.$registro_codigo.'", "'.$registro_carrera.'", "'.$registro_ciclo_ingreso.'", "'.$registro_email.'", "'.md5($registro_password).'", 2)';

			$id_sesion = ExecuteSQL_returnID($query3);
			 if($id_sesion !== false) {
				$resultStatus = "ok";
				$resultText = "Se inicio sesión con éxito";
				session_start();
				session_destroy();
				session_start();
				$_SESSION['id_sesion'] 		= $id_sesion; 
				$_SESSION['email'] 			= $registro_email;

			 } else {
				$resultStatus = "error";
				$resultText = "Error al iniciar sesión";
			 }

			// if(ExecuteSQL($query3)){
			// 	$resultText = 'Se ha creado la cuenta con éxito.';
				
				
			// } else{
			// 	$resultText = 'Ha ocurrido un error. Inténtalo de nuevo.';
			// 	$resultStatus = 'error';

			// }
		}
    }


    $result = array( 
		'result' 				=> $resultStatus, 
		'result_text' 			=> $resultText, 
	);	 

	XML_Envelope($result);     
	exit;
}



	/*
		#region cerrar_sesion
	*/
if (Requesting("action")=="cerrar_sesion"){
	$resultStatus 	= "ok"; 
	$resultText 		= "Sesion Cerrada";	
	
    session_start();
	session_destroy();
	
	$result = array(
		'result' 						=> $resultStatus, 
		'result_text' 				=> $resultText
	);	 
	XML_Envelope($result);     
	exit;
}



	/*
		#region llenar select carreras
	*/
if(Requesting("action")=="llenar_select_carreras"){
	$resultStatus 	= "ok";
	$resultText 		= "Correcto.";	 
	$xmlRow = "<option value='0'>Selecciona carrera...</option>";

	$query = "SELECT * FROM carreras ORDER BY id_carrera ASC";
	$carreras = DatasetSQL($query);
	while($row1 = mysqli_fetch_array($carreras)){
		$xmlRow .= "<option value='".$row1['id_carrera']."'>".$row1['carrera']."</option>";
	}
	
	$result = array( 
		'select_carrera' 	=> $xmlRow,   
		'result' 			=> $resultStatus, 
		'result_text' 		=> $resultText
	);		 
	XML_Envelope($result);  
	exit;		
}


	/*
		#region llenar select ciclos
	*/
if(Requesting("action")=="llenar_select_ciclos"){
	$resultStatus 	= "ok";
	$resultText 		= "Correcto.";	 
	$xmlRow = "<option value='0'>Selecciona ciclo de ingreso...</option>";

	$query = "SELECT * FROM ciclos ORDER BY id_ciclo ASC";
	$ciclos = DatasetSQL($query);
	while($row1 = mysqli_fetch_array($ciclos)){
		$xmlRow .= "<option value='".$row1['id_ciclo']."'>".$row1['ciclo']."</option>";
	}
	
	$result = array( 
		'select_ciclo' 	=> $xmlRow,   
		'result' 			=> $resultStatus, 
		'result_text' 		=> $resultText
	);		 
	XML_Envelope($result);  
	exit;		
}

	/*
		#region sumar visitas
	*/
if(Requesting("action")=="sumar_visitas"){
	$id_libro = Requesting("id_libro");
	$resultText = "Correcto.";
	$resultStatus = "ok";

	$query1 = "SELECT COUNT(*) AS cuantos FROM libros WHERE id_libro = $id_libro";
	$cuantos = GetValueSQL($query1, 'cuantos');

	if($cuantos > 0){
		$query2 = "UPDATE libros SET num_visitas = num_visitas + 1 WHERE id_libro = $id_libro";
        ExecuteSQL($query2);
	}

	$result = array(    
		'result' 			=> $resultStatus, 
		'result_text' 		=> $resultText
	);		 
	XML_Envelope($result);  
	exit;	
}


	/*
		#region wishlist remove
	*/
if(Requesting("action")=="wishlist_remove"){
	$id_usuario = Requesting("id_usuario");
	$id_libro = Requesting("id_libro");

	$resultText = "Correcto.";
	$resultStatus = "ok";

	
	$query1 = "DELETE FROM wishlist WHERE id_usuario = $id_usuario AND id_libro = $id_libro";
	if(ExecuteSQL($query1)){
		$result = "Correcto.";
		$resultStatus = "ok";
	} else {
		$result = "Ocurrió un error.";
		$resultStatus = "error";
	}


	$result = array(    
		'id_usuario' 		=> $id_usuario,
		'id_libro' 			=> $id_libro, 
		'result' 			=> $resultStatus, 
		'result_text' 		=> $resultText
	);		 
	XML_Envelope($result);  
	exit;	
    

}



	/*
		#region wishlist add
	*/
if(Requesting("action")=="wishlist_add"){
	$id_usuario = Requesting("id_usuario");
	$id_libro = Requesting("id_libro");

	$resultText = "Correcto.";
	$resultStatus = "ok";

	
	$query1 = "SELECT COUNT(*) AS existe FROM wishlist WHERE id_usuario = $id_usuario AND id_libro = $id_libro";
	$existe = GetValueSQL($query1, 'existe');

	if($existe > 0){
		$result = "El libro ya se encuentra en la wishlist.";
		$resultStatus = "error";
	} else{
		$query2 = "INSERT INTO wishlist (id_usuario, id_libro) VALUES ($id_usuario, $id_libro)";
        if(ExecuteSQL($query2)){
            $result = "Correcto.";
            $resultStatus = "ok";
        } else {
            $result = "Ocurrió un error.";
            $resultStatus = "error";
        }
	}


	$result = array(   
		'id_usuario' 		=> $id_usuario,
		'id_libro' 			=> $id_libro, 
		'result' 			=> $resultStatus, 
		'result_text' 		=> $resultText
	);		 
	XML_Envelope($result);  
	exit;	
    

}

	/*
		#region solicitar libro
	*/
if(Requesting("action")=="solicitar_libro"){
	$id_usuario_destino = Requesting("id_usuario");
    $id_libro = Requesting("id_libro");

	$fecha_hoy = date("Y-m-d");

	// echo date('Y-m-d');

	// echo "usuario: ".$id_usuario_destino;

    $resultText = "Correcto.";
    $resultStatus = "ok";

	$query1 = "SELECT * FROM libros WHERE id_libro = $id_libro";
	$id_usuario_owner = GetValueSQL($query1, 'id_usuario');

	//Status de préstamos
	//1. Solicitado			2. Aceptado 		3. En proceso 		4. Concluído 		5. Fecha de entrega excedida 		6. Denegado
	//*NOTA: Al momento del dueño aceptar a un usuario, el sistema tiene que verificar que no haya un préstamo con dicho usuario con status 2, 3 o 5

	$query9 = "SELECT COUNT(*) AS existe FROM prestamos WHERE id_usuario_destino = $id_usuario_destino AND (status_prestamo = 2 OR status_prestamo = 3 OR status_prestamo = 5)";
	$existe = GetValueSQL($query9, 'existe');

	if($existe == 0){ //El usuario no tiene ningun préstamo activo

		$query5 = "SELECT COUNT(*) AS existe_prestamos_usuario FROM prestamos WHERE id_usuario_destino = $id_usuario_destino AND id_libro = $id_libro AND (status_prestamo != 4 AND status_prestamo != 6)";
		$existe_prestamos_usuario = GetValueSQL($query5, 'existe_prestamos_usuario');
	
		if($existe_prestamos_usuario == 0){ // No ha solicitado el libro
			
	
			$query2 = "SELECT COUNT(*) AS existe_waitlist FROM waitlist WHERE id_libro = $id_libro";
			$existe_waitlist = GetValueSQL($query2, 'existe_waitlist');
	
			if($existe_waitlist == 0){ //No hay nadie en la waitlist que haya solicitado el libro
	
				$query8 = "SELECT COUNT(*) AS existe_prestamos FROM prestamos WHERE id_libro = $id_libro AND (status_prestamo != 4 AND status_prestamo != 6)";
				$existe_prestamos = GetValueSQL($query8, 'existe_prestamos');
	
				if($existe_prestamos == 0){ //El libro no se encuentra prestado

					$query3 = "INSERT INTO prestamos (id_usuario_owner, id_usuario_destino, id_libro, status_prestamo) VALUES ($id_usuario_owner, $id_usuario_destino, $id_libro, 1)";
					$resultText = "Solicitud enviada. Espera a que el dueño del libro apruebe tu solicitud.";

				} else{ //El libro se encuentra prestado. Se inserta en la waitlist con turno 1

					$query3 = "INSERT INTO waitlist (id_usuario, id_libro, turno, fecha_inicio_turno) VALUES ($id_usuario_destino, $id_libro, 1, '$fecha_hoy')";
					$resultText = "Solicitud enviada. Espera tu turno.";

				}
				
				if(ExecuteSQL($query3)){
					$resultStatus = "ok";
	
				} else{
					$resultText = "Ocurrió un error.";
					$resultStatus = "error";
	
				}
			} else{ //Hay gente en la waitlist que solicitó el libro
	
				$query4 = "SELECT COUNT(*) AS existe_waitlist FROM waitlist WHERE id_usuario = $id_usuario_destino AND id_libro = $id_libro";
				$existe_waitlist_usuario = GetValueSQL($query4, 'existe_waitlist');
	
				if($existe_waitlist_usuario == 0){ //No ha ingresado a la waitlist
					$query6 = "SELECT * FROM waitlist WHERE id_libro = $id_libro ORDER BY turno ASC";
					$waitlist = DatasetSQL($query6);
	
					while($row6 = mysqli_fetch_array($waitlist)){
						$turno = $row6['turno'];
					}
					$turno = $turno + 1;
					$query7 = "INSERT INTO waitlist (id_usuario, id_libro, turno, fecha_inicio_turno) VALUES ($id_usuario_destino, $id_libro, $turno, '$fecha_hoy')";
					if(ExecuteSQL($query7)){
						$resultText = "Solicitud enviada. Espera tu turno.";
						$resultStatus = "ok";
	
					} else{
						$resultText = "Ocurrió un error.";
						$resultStatus = "error";
					}
	
				} else{ //El usuario ya está en la waitlist por el libro
					$resultText = "¡Ya te encuentras en la lista de espera!";
					$resultStatus = "warning";
	
				}
			}
					
		} else{ //El libro ya fue solicitado por el usuario
			$resultText = "¡Ya solicitaste este libro!";
			$resultStatus = "warning";
		}

	} else{ //El usuario tiene un préstamo activo

		$resultText = "¡Ya cuentas con un préstamo activo!";
		$resultStatus = "warning";
	}

	

	$result = array(   
		'result' 			=> $resultStatus, 
		'result_text' 		=> $resultText
	);		 
	XML_Envelope($result);  
	exit;	
    
}

#region llenar_formulario_actualizar_datos
if(Requesting("action")=="llenar_formulario_actualizar_datos"){
	$id_usuario = Requesting("id_usuario");

	$resultText = "Correcto.";
	$resultStatus = "ok";

	$query1 = "SELECT * FROM usuarios WHERE id_usuario = $id_usuario";
	
	$nombres = GetValueSQL($query1, 'nombres');
	$apellidos = GetValueSQL($query1, 'apellidos');
	$codigo_usuario = GetValueSQL($query1, 'codigo_usuario');
	$id_carrera = GetValueSQL($query1, 'carrera');
	$id_ciclo_ingreso = GetValueSQL($query1, 'ciclo_ingreso');
	$correo = GetValueSQL($query1, 'correo');
	$ruta_foto_perfil = GetValueSQL($query1, 'ruta_foto_perfil');
	$ruta_foto_credencial = GetValueSQL($query1, 'ruta_foto_credencial');

	$query2 = "SELECT * FROM carreras WHERE id_carrera = '$id_carrera'";
	$carrera = GetValueSQL($query2, 'carrera');

	$query3 = "SELECT * FROM ciclos WHERE id_ciclo = '$id_ciclo_ingreso'";
	$ciclo_ingreso = GetValueSQL($query3, 'ciclo');

	if($ruta_foto_perfil == NULL){
		$ruta_foto_perfil = $ruta_foto_no_usuario;
	}
	
	if($ruta_foto_credencial == NULL){
		$ruta_foto_credencial = $ruta_foto_no_existente;
	}



	$result = array(   
		'id_usuario' 			=> $id_usuario,
		'nombres'				=> $nombres,
		'apellidos'            	=> $apellidos,
        'codigo_usuario'    	=> $codigo_usuario,
        'carrera'            	=> $carrera,
        'ciclo_ingreso'        	=> $ciclo_ingreso,
        'correo'            	=> $correo,
		'ruta_foto_perfil'    	=> $ruta_foto_perfil,
        'ruta_foto_credencial'  => $ruta_foto_credencial,
		'result' 				=> $resultStatus, 
		'result_text' 			=> $resultText
	);		 
	XML_Envelope($result);  
	exit;	
}

#region actualizar_usuario
if(Requesting("action")=="actualizar_usuario"){
	$id_usuario = $_POST["id_usuario"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    
	$resultText = "Correcto.";
	$resultStatus = "ok";


	$query1 = "SELECT * FROM usuarios WHERE id_usuario = $id_usuario";
	$codigo = GetValueSQL($query1, 'codigo_usuario');

	$query_imagenes = "";

	if(isset($_FILES["foto_perfil"]) && $_FILES["foto_perfil"]["size"] > 0){
		$foto_perfil = $_FILES["foto_perfil"];

		//Obtener la extensión de la imagen
		$extension_perfil = ".".strtolower(pathinfo($foto_perfil["name"], PATHINFO_EXTENSION));

		//Generar la ruta de la foto
		$ruta_foto_perfil = "imagenes/perfil/perfil_".$codigo."".$extension_perfil;

		//Mover la imagen a la ruta
		move_uploaded_file($foto_perfil["tmp_name"], $ruta_foto_perfil);

		//query para concatenar en la sentencia sql
		$query_imagenes .= ", ruta_foto_perfil = '".$ruta_foto_perfil."'";
	}

	if(isset($_FILES["foto_credencial"]) && $_FILES["foto_credencial"]["size"] > 0){
		$foto_credencial = $_FILES["foto_credencial"];

		//Obtener la extensión de la imagen
		$extension_credencial = ".".strtolower(pathinfo($foto_credencial["name"], PATHINFO_EXTENSION));
		
		//Generar la ruta de la foto
		$ruta_foto_credencial = "imagenes/credenciales/credencial_".$codigo."".$extension_credencial;

		//Mover la imagen a la ruta
		move_uploaded_file($foto_credencial["tmp_name"], $ruta_foto_credencial);

		//query para concatenar en la sentencia sql
		$query_imagenes .= ", ruta_foto_credencial = '".$ruta_foto_credencial."'";
	}


	$query1 = "UPDATE usuarios SET nombres = '".$nombres."', apellidos = '".$apellidos."'".$query_imagenes." WHERE id_usuario = $id_usuario";
	if(ExecuteSQL($query1)){
		$resultText = "Los datos se han actualizado correctamente.";
		$resultStatus = "ok";
	} else{
		$resultText = "Ocurrió un error. Por favor, inténtalo de nuevo. ";
		$resultStatus = "error";
	}


	$result = array(   
		'result' 				=> $resultStatus, 
		'result_text' 			=> $resultText
	);		 
	XML_Envelope($result);  
	exit;	
}

#region cambiar_password
if(Requesting("action")=="cambiar_password") {
	$id_usuario = Requesting("id_usuario");
	$password_actual = Requesting("password_actual");
	$nueva_password = Requesting("nueva_password");

	$resultText = "Correcto.";
	$resultStatus = "ok";

	$query1 = "SELECT COUNT(*) AS existe FROM usuarios WHERE id_usuario = $id_usuario AND password = '".md5($password_actual)."'";
	// echo $query1;
	$existe = GetValueSQL($query1, 'existe');

    if($existe > 0){
		$query2 = "UPDATE usuarios SET password = '".md5($nueva_password)."' WHERE id_usuario = $id_usuario";
		if(ExecuteSQL($query2)){
			$resultText = "Los datos se han actualizado correctamente.";
            $resultStatus = "ok";
		} else{
			$resultText = "Ocurrió un error. Por favor, inténtalo de nuevo. ";
            $resultStatus = "error";
		}
	} else{
		$resultText = "La contraseña actual es incorrecta.";
        $resultStatus = "error";
	}

	$result = array(   
		'result' 				=> $resultStatus, 
		'result_text' 			=> $resultText
	);		 
	XML_Envelope($result);  
	exit;
}

#region agregar_libro
if(Requesting("action")=="agregar_libro"){
	$id_usuario = $_POST["id_usuario"];
	$titulo = $_POST["titulo"];
	$autor = $_POST["autor"];
	$isbn = $_POST["isbn"];
	$editorial = $_POST["editorial"];
	$year = $_POST["year"];
	$sinopsis = $_POST["sinopsis"];

	$fecha_actual = date("Y-m-d");

	$ruta_nombre_libro = str_replace(' ', '_', strtolower($titulo));
    
	$resultText = "Correcto.";
	$resultStatus = "ok";


	$query1 = "SELECT * FROM usuarios WHERE id_usuario = $id_usuario";
	$codigo = GetValueSQL($query1, 'codigo_usuario');

	$query2 = "INSERT INTO libros (id_usuario, titulo, autor, isbn, editorial, year, sinopsis, fecha_agregado) 
				VALUES ($id_usuario, '$titulo', '$autor', '$isbn', '$editorial', '$year', '$sinopsis', '$fecha_actual')";

	$id_libro = ExecuteSQL_returnID($query2);		
	
	

	if(isset($_FILES["foto_portada"]) && $_FILES["foto_portada"]["size"] > 0){
		$foto_portada = $_FILES["foto_portada"];

		//Obtener la extensión de la imagen
		$extension_foto = ".".strtolower(pathinfo($foto_portada["name"], PATHINFO_EXTENSION));

		//Generar la ruta de la foto
		$ruta_foto = "imagenes/libros/".$id_libro."_".$ruta_nombre_libro."_".$codigo."".$extension_foto;


		//Mover la imagen a la ruta
		move_uploaded_file($foto_portada["tmp_name"], $ruta_foto);

	}

	$query3 = "UPDATE libros SET ruta_foto_portada = '$ruta_foto' WHERE id_libro = $id_libro";

	
	if(ExecuteSQL($query3)){
		$resultText = "El libro se ha añadido a tu colección.";
		$resultStatus = "ok";
	} else{
		$resultText = "Ocurrió un error. Por favor, inténtalo de nuevo. ";
		$resultStatus = "error";
	}


	$result = array(   
		'result' 				=> $resultStatus, 
		'result_text' 			=> $resultText
	);		 
	XML_Envelope($result);  
	exit;	
}

#region llenar_form_editar_libro
if(Requesting("action") == "llenar_form_editar_libro"){
	$id_libro = Requesting("id_libro");

    $resultText = "Correcto.";
    $resultStatus = "ok";

    $query1 = "SELECT * FROM libros WHERE id_libro = $id_libro";
    $titulo = GetValueSQL($query1, 'titulo');
    $autor = GetValueSQL($query1, 'autor');
	$isbn = GetValueSQL($query1, 'isbn');
    $editorial = GetValueSQL($query1, 'editorial');
    $year = GetValueSQL($query1, 'year');
    $sinopsis = GetValueSQL($query1,'sinopsis');
    $ruta_foto_portada = GetValueSQL($query1, 'ruta_foto_portada');

	$result = array(   
		'id_libro'				=> $id_libro,
		'titulo'                => $titulo,
        'autor'                 => $autor,
		'isbn'					=> $isbn,
        'editorial'             => $editorial,
        'year'                  => $year,
        'sinopsis'              => $sinopsis,
		'result' 				=> $resultStatus, 
		'result_text' 			=> $resultText
	);		 
	XML_Envelope($result);  
	exit;	
}

#region editar_libro
if(Requesting("action") == "editar_libro"){
	$id_libro = $_POST["id_libro"];
	$id_usuario = $_POST["id_usuario"];
	$titulo = $_POST["titulo"];
	$autor = $_POST["autor"];
	$isbn = $_POST["isbn"];
	$editorial = $_POST["editorial"];
	$year = $_POST["year"];
	$sinopsis = $_POST["sinopsis"];

	$ruta_nombre_libro = str_replace(' ', '_', strtolower($titulo));
    
	$resultText = "Correcto.";
	$resultStatus = "ok";


	$query1 = "SELECT * FROM usuarios WHERE id_usuario = $id_usuario";
	$codigo = GetValueSQL($query1, 'codigo_usuario');

	$query_imagenes = "";

	if(isset($_FILES["foto_portada"]) && $_FILES["foto_portada"]["size"] > 0){
		$foto_portada = $_FILES["foto_portada"];

		//Obtener la extensión de la imagen
		$extension_foto = ".".strtolower(pathinfo($foto_portada["name"], PATHINFO_EXTENSION));

		//Generar la ruta de la foto
		$ruta_foto = "imagenes/libros/".$ruta_nombre_libro."_".$codigo."".$extension_foto;

		//Mover la imagen a la ruta
		move_uploaded_file($foto_portada["tmp_name"], $ruta_foto);

		//query para concatenar en la sentencia sql
		// $query_imagenes .= ", ruta_foto_portada = '".$ruta_foto."'";

		$query2 = "UPDATE libros SET titulo = '$titulo', autor = '$autor', isbn = '$isbn', editorial = '$editorial', year = '$year', sinopsis = '$sinopsis', ruta_foto_portada = '$ruta_foto' 
		WHERE id_libro = $id_libro AND id_usuario = $id_usuario";
	} else{
		$query2 = "UPDATE libros SET titulo = '$titulo', autor = '$autor', isbn = '$isbn', editorial = '$editorial', year = '$year', sinopsis = '$sinopsis' 
        WHERE id_libro = $id_libro AND id_usuario = $id_usuario";
	}

	
	if(ExecuteSQL($query2)){
		$resultText = "El libro se ha actualizado.";
		$resultStatus = "ok";
	} else{
		$resultText = "Ocurrió un error. Por favor, inténtalo de nuevo. ";
		$resultStatus = "error";
	}


	$result = array(   
		'result' 				=> $resultStatus, 
		'result_text' 			=> $resultText
	);		 
	XML_Envelope($result);  
	exit;	
}

#region cambiar_status_libro
if(Requesting("action") == "cambiar_status_libro"){
	$id_libro = Requesting("id_libro");
	$tipo = Requesting("tipo");

	
	$resultText = "Correcto.";
	$resultStatus = "ok";

	if($tipo == 3){
		$query1 = "UPDATE libros SET status = 1 WHERE id_libro = $id_libro";
		$resultText = "El libro se ha habilitado.";
	} else{
		$query1 = "UPDATE libros SET status = 3 WHERE id_libro = $id_libro";
		$resultText = "El libro se ha deshabilitado.";
	}
	

	if(ExecuteSQL($query1)){
        $resultStatus = "ok";
	} else{
		$resultText = "Ocurrió un error. Por favor, inténtalo de nuevo. ";
        $resultStatus = "error";
	}


	$result = array(   
		'result' 				=> $resultStatus, 
		'result_text' 			=> $resultText
	);		 
	XML_Envelope($result);  
	exit;
}

#region validar_usuario
if(Requesting("action") == "validar_usuario"){
	$id_usuario = Requesting("id_usuario");

	$resultText = "Correcto.";
	$resultStatus = "ok";
	
	$query3 = "SELECT ruta_foto_credencial FROM usuarios WHERE id_usuario = $id_usuario"; 
	$ruta_foto_credencial = GetValueSQL($query3, "ruta_foto_credencial");

	if($ruta_foto_credencial != null){
		$query1 = "UPDATE usuarios SET status = 1 WHERE id_usuario = $id_usuario";
		$resultText = "El usuario se validó.";
		
		if(ExecuteSQL($query1)){
			$resultStatus = "ok";
		} else{
			$resultText = "Ocurrió un error. Por favor, inténtalo de nuevo.";
			$resultStatus = "error";
		}
	
		$result = array(
			'result'       => $resultStatus,
			'result_text'  => $resultText
		);     
		XML_Envelope($result);
		exit;
	} else {
		$resultText = "No se ha encontrado una foto de credencial.";
		$resultStatus = "error";
	}
	
	$result = array(
		'result'       => $resultStatus,
		'result_text'  => $resultText
	);     
	XML_Envelope($result);
	exit;
	
}

#region strike_usuarios
if(Requesting("action") == "strike_usuario"){
	$id_usuario = Requesting("id_usuario");
	$id_strike = Requesting("id_strike");

	$resultText = "Correcto.";
	$resultStatus = "ok";

	$query0 = "SELECT * FROM usuarios WHERE id_usuario = $id_usuario";
	$num_strikes = GetValueSQL($query0, 'num_strikes');

	$query1 = "UPDATE usuarios SET num_strikes = $num_strikes + 1 WHERE id_usuario = $id_usuario";
	$query2 = "UPDATE strikes SET status = 2 WHERE id_strike = $id_strike";
	$query3 = "UPDATE usuarios SET status = 2 WHERE id_usuario = $id_usuario";
	
	if(ExecuteSQL($query1)){
		if(ExecuteSQL($query2)) {
			if($num_strikes + 1 > 2) {
				if(ExecuteSQL($query3)) {
					$resultText = "El strike fue añadido y el usuario suspendido.";
					$resultStatus = "ok";
				} else {
					$resultText = "Ocurrió un error en status. Por favor, inténtalo de nuevo. ";
        			$resultStatus = "error";
				}
			} else {
				$resultText = "El strike fue añadido.";
				$resultStatus = "ok";
			}
		} else {
			$resultText = "Ocurrió un error en strikes. Por favor, inténtalo de nuevo. ";
        	$resultStatus = "error";
		}
	} else{
		$resultText = "Ocurrió un error en usuarios. Por favor, inténtalo de nuevo. ";
        $resultStatus = "error";
	}

	$result = array(   
		'result' 				=> $resultStatus,
		'result_text' 			=> $resultText
	);		 
	XML_Envelope($result);
	exit;
}

#region ocultar_strike
if(Requesting("action") == "ocultar_strike"){
	$id_strike = Requesting("id_strike");

	$resultText = "Correcto.";
	$resultStatus = "ok";

	$query1 = "UPDATE strikes SET status = 0 WHERE id_strike = $id_strike";
	
	if(ExecuteSQL($query1)){
		$resultText = "El strike fue cancelado.";
		$resultStatus = "ok";
	} else{
		$resultText = "Ocurrió un error. Por favor, inténtalo de nuevo. ";
        $resultStatus = "error";
	}

	$result = array(   
		'result' 				=> $resultStatus,
		'result_text' 			=> $resultText
	);		 
	XML_Envelope($result);
	exit;
}

#region nuevo_strike_usuario
if(Requesting("action") == "nuevo_strike_usuario"){
	$id_usuario = Requesting("id_usuario");
	$detalles = Requesting("detalles");

	$resultText = "Correcto.";
	$resultStatus = "ok";

	$query1 = "INSERT INTO strikes (id_usuario, detalles, status) VALUES ($id_usuario, '$detalles', 1)";
	
	if(ExecuteSQL($query1)) {
		$resultText = "El strike se revisara proximamente.";
		$resultStatus = "ok";
	} else {
		$resultText = "Ocurrió un error. Por favor, inténtalo de nuevo. ";
        $resultStatus = "error";
	}

	$result = array(   
		'result' 				=> $resultStatus,
		'result_text' 			=> $resultText
	);		 
	XML_Envelope($result);
	exit;
}

#region stars
if(Requesting("action") == "stars"){
	$id_evaluador = Requesting("id_evaluador");
	$id_evaluado = Requesting("id_evaluado");
	$id_prestamo = Requesting("id_prestamo");
	$puntuacion = Requesting("puntuacion");

	$resultText = "Correcto.";
	$resultStatus = "ok";

	$query0 = "SELECT COUNT(*) AS cuantos FROM reseñas WHERE id_prestamo = $id_prestamo AND id_usuario_evaluador = $id_evaluador AND id_usuario_evaluado = $id_evaluado";
	$cuantos = GetValueSQL($query0, "cuantos");
	if($cuantos > 0) {
		$query1 = "UPDATE reseñas SET puntuacion = $puntuacion WHERE id_prestamo = $id_prestamo AND id_usuario_evaluador = $id_evaluador AND id_usuario_evaluado = $id_evaluado";
		ExecuteSQL($query1);
		$resultText = "La calificación se actualizó correctamente.";
		$resultStatus = "ok";
	} else {
		$query1 = "INSERT INTO reseñas (id_usuario_evaluador, id_usuario_evaluado, id_prestamo, puntuacion) VALUES ($id_evaluador, $id_evaluado, $id_prestamo, $puntuacion)";
			
		if(ExecuteSQL($query1)) {
			$resultText = "El usuario fue calificado correctamente";
			$resultStatus = "ok";
		} else {
			$resultText = "Ocurrió un error. Por favor, inténtalo de nuevo.";
			$resultStatus = "error";
		}
	}

	$result = array(
		'id_prestamo'			=> $id_prestamo,
		'id_evaluador' 			=> $id_evaluador,	
		'id_evaluado' 			=> $id_evaluado,
		'result' 				=> $resultStatus,
		'result_text' 			=> $resultText
	);		 
	XML_Envelope($result);
	exit;
}

/*
	#region llenar stars
*/
if(Requesting("action")=="llenar_stars"){
		$resultStatus 	= "ok";
		$resultText 	= "Correcto.";	 
		$xmlRow = "<option value='0'>Selecciona carrera...</option>";
	
		$query = "SELECT * FROM carreras ORDER BY id_carrera ASC";
		$carreras = DatasetSQL($query);
		while($row1 = mysqli_fetch_array($carreras)){
			$xmlRow .= "<option value='".$row1['id_carrera']."'>".$row1['carrera']."</option>";
		}
		
		$result = array( 
			'select_carrera' 	=> $xmlRow,   
			'result' 			=> $resultStatus, 
			'result_text' 		=> $resultText
		);		 
		XML_Envelope($result);  
		exit;		
}

#region aceptar_denegar_prestamo
if(Requesting("action") == "aceptar_denegar_prestamo") {
	$id_prestamo = Requesting("id_prestamo");
	$id_libro = Requesting("id_libro");
	$tipo = Requesting("tipo");
	
	$resultText = "Correcto.";
	$resultStatus = "ok";

	$query0 = "SELECT * FROM libros WHERE id_libro = $id_libro";
	$id_usuario_owner = GetValueSQL($query0, "id_usuario");
	$status_libro = GetValueSQL($query0, 'status');

	if($status_libro == 3){
		$resultText = "Habilita el libro para realizar la operación.";
		$resultStatus = "error";
	} else{
		switch($tipo){ //Si acepta o deniega al usuario 
			case 1:
				$query1 = "UPDATE prestamos SET status_prestamo = 2 WHERE id_prestamo = $id_prestamo";
				$resultText = "Se ha aceptado el préstamo";
			break;
			case 2:
				$query1 = "UPDATE prestamos SET status_prestamo = 6 WHERE id_prestamo = $id_prestamo";
				$resultText = "Se ha denegado el préstamo";
			break;
		}
	
		if(ExecuteSQL($query1)){
			$resultStatus = "ok";
		} else{
			$resultText = "Ocurrió un error. Por favor, inténtalo de nuevo. ";
			$resultStatus = "error";
		}
	
		switch($tipo){
			case 1: //Si lo acepta, cambia el status del libro
				$query2 = "UPDATE libros SET status = 2 WHERE id_libro = $id_libro";
				ExecuteSQL($query2);
			break;
			case 2: //Si no lo acepta, se recorre la waitlist.
				$query2 = "SELECT COUNT(*) AS cuantos FROM waitlist WHERE id_libro = $id_libro";
				$cuantos_waitlist = GetValueSQL($query2, 'cuantos');

				if($cuantos_waitlist > 0){ //Hay mas de uno en waitlist 
					$query3 = "SELECT * FROM waitlist WHERE id_libro = $id_libro AND turno = 1";
                    $id_usuario_destino = GetValueSQL($query3, 'id_usuario');

					$query4 = "INSERT INTO prestamos (id_usuario_owner, id_usuario_destino, id_libro, status_prestamo) 
					VALUES ($id_usuario_owner, $id_usuario_destino, $id_libro, 1)"; //El turno 1 en la waitlist pasa a la tabla prestamos con status 1 (solicitado)
                    ExecuteSQL($query4);

					$query5 = "DELETE FROM waitlist WHERE id_libro = $id_libro AND turno = 1"; //Se borra el turno 1 de la waitlist
					ExecuteSQL($query5);

					$query6 = "SELECT COUNT(*) AS cuantos FROM waitlist WHERE id_libro = $id_libro";
					$cuantos_post_eliminar = GetValueSQL($query6, 'cuantos');

					if($cuantos_post_eliminar > 0){ //Si quedan mas usuarios en la waitlist, se recorre su turno
						$query7 = "UPDATE waitlist SET turno = turno - 1 WHERE id_libro = $id_libro";
						ExecuteSQL($query7);
					}
				}
			break;
		}
	}


	$result = array(   
		'id_prestamo'			=> $id_prestamo,
		'id_libro'				=> $id_libro,
		'result' 				=> $resultStatus, 
		'result_text' 			=> $resultText
	);		 
	XML_Envelope($result);  
	exit;
}

#region acordar fechas
if(Requesting("action") == "acordar_fechas"){
	file_put_contents('debudg.txt', print_r($_POST, true));
	$id_prestamo = Requesting("id_prestamo");
	$fecha_inicio = Requesting("fecha_inicio");
	$fecha_fin = Requesting("fecha_fin");
	
	$resultText = "Correcto.";
	$resultStatus = "ok";

	$query1 = "SELECT COUNT(*) AS existe FROM prestamos WHERE id_prestamo = $id_prestamo";
	$existe = GetValueSQL($query1, 'existe');

	if($existe > 0){
		$query2 = "UPDATE prestamos SET fecha_inicio = '$fecha_inicio', fecha_fin = '$fecha_fin' WHERE id_prestamo = $id_prestamo";
        if(ExecuteSQL($query2)){
			$resultStatus = "ok";
			$resultText = "Las fechas se han actualizado.";
		} else {
			$resultText = "Ocurrió un error. Por favor, inténtalo de nuevo. ";
            $resultStatus = "error";
		}
	} else{
		$resultText = "El préstamo no existe.";
        $resultStatus = "error";
	}

	$result = array(   
		'id_prestamo'			=> $id_prestamo,
		'result' 				=> $resultStatus, 
		'result_text' 			=> $resultText
	);		 
	XML_Envelope($result);
	exit;
}


if(Requesting("action") == "llenar_form_confirmar_fechas"){
	$id_prestamo = Requesting("id_prestamo");
	
	$resultText = "Correcto.";
	$resultStatus = "ok";


	$query1 = "SELECT * FROM prestamos WHERE id_prestamo = $id_prestamo";
	$fecha_inicio = GetValueSQL($query1, 'fecha_inicio');
	$fecha_fin = GetValueSQL($query1, 'fecha_fin');


	
	$result = array(   
		'fecha_inicio'			=> $fecha_inicio,
		'fecha_fin'				=> $fecha_fin,
		'result' 				=> $resultStatus, 
		'result_text' 			=> $resultText
	);		 
	XML_Envelope($result);  
	exit;
}

#region verificar fechas
if(Requesting("action") == "verificar_fechas"){
	file_put_contents('debug.txt', print_r($_POST, true));
	$accion = Requesting("accion");
	$id_prestamo = Requesting("id_prestamo");

	$resultText = "Correcto.";
	$resultStatus = "ok";

	switch($accion){
		case 1:
			$query1 = "UPDATE prestamos SET status_prestamo = 3 WHERE id_prestamo = $id_prestamo";
			$resultText = "Préstamo iniciado.";

			$query2 = "SELECT id_libro FROM prestamos WHERE id_prestamo = $id_prestamo";
			$id_libro = GetValueSQL($query2, 'id_libro');

			$query3 = "UPDATE libros SET status = 4 WHERE id_libro = $id_libro";
            ExecuteSQL($query3);

			
        break;
		case 2:
			$query1 = "UPDATE prestamos SET fecha_inicio = NULL, fecha_fin = NULL WHERE id_prestamo = $id_prestamo";
			// echo $query1;
			$resultText = "Fechas rechazadas. Espera las nuevas. ";
		break;
	}

	if(ExecuteSQL($query1)){
		$resultStatus = "ok";
	} else{
		$resultText = "Ocurrió un error. Por favor, inténtalo de nuevo. ";
        $resultStatus = "error";
	}


	
	$result = array(   
		'result' 				=> $resultStatus, 
		'result_text' 			=> $resultText
	);		 
	XML_Envelope($result);  
	exit;
}


#region finalizar prestamo
if(Requesting("action") == "finalizar_prestamo"){
	$id_libro = Requesting("id_libro");

	$resultText = "Correcto.";
	$resultStatus = "ok";


	$query0 = "SELECT COUNT(*) AS existe FROM libros 
	INNER JOIN prestamos ON libros.id_libro = prestamos.id_libro
	WHERE status_prestamo = 3";
	$existe = GetValueSQL($query0, 'existe');
	
	if($existe > 0){
		$query1 = "UPDATE prestamos SET status_prestamo = 4 WHERE id_libro = $id_libro AND status_prestamo = 3";
		if(ExecuteSQL($query1)){
			$resultStatus = "ok";
            $resultText = "Préstamo finalizado.";

			//Cambiar status de libro
			$query9 = "UPDATE libros SET status = 1 WHERE id_libro = $id_libro";
            ExecuteSQL($query9);

			//Recorrer waitlist
			
			$query10 = "SELECT * FROM libros WHERE id_libro = $id_libro";
			$id_usuario_owner = GetValueSQL($query10, "id_usuario");

			$query2 = "SELECT COUNT(*) AS cuantos FROM waitlist WHERE id_libro = $id_libro";
			$cuantos_waitlist = GetValueSQL($query2, 'cuantos');

			if($cuantos_waitlist > 0){ //Hay mas de uno en waitlist 
				$query3 = "SELECT * FROM waitlist WHERE id_libro = $id_libro AND turno = 1";
				$id_usuario_destino = GetValueSQL($query3, 'id_usuario');

				$query4 = "INSERT INTO prestamos (id_usuario_owner, id_usuario_destino, id_libro, status_prestamo) 
				VALUES ($id_usuario_owner, $id_usuario_destino, $id_libro, 1)"; //El turno 1 en la waitlist pasa a la tabla prestamos con status 1 (solicitado)
				ExecuteSQL($query4);

				$query5 = "DELETE FROM waitlist WHERE id_libro = $id_libro AND turno = 1"; //Se borra el turno 1 de la waitlist
				ExecuteSQL($query5);

				$query6 = "SELECT COUNT(*) AS cuantos FROM waitlist WHERE id_libro = $id_libro";
				$cuantos_post_eliminar = GetValueSQL($query6, 'cuantos');

				if($cuantos_post_eliminar > 0){ //Si quedan mas usuarios en la waitlist, se recorre su turno
					$query7 = "UPDATE waitlist SET turno = turno - 1 WHERE id_libro = $id_libro";
					ExecuteSQL($query7);
				}
			}
		} else{
			$resultText = "Ocurrió un error. Por favor, inténtalo de nuevo. ";
            $resultStatus = "error";
		}
	} else{
		$resultText = "No hay un préstamo con este libro activo.";
		$resultStatus = "error";
	}



	$result = array(   
		'result' 				=> $resultStatus, 
		'result_text' 			=> $resultText
	);		 
	XML_Envelope($result);  
	exit;
}



#region Cancelar Prestamo Activo

if(Requesting("action") == "cancelar_prestamo"){
	$id_prestamo = Requesting("id_prestamo");
	
	$resultText = "Correcto.";
	$resultStatus = "ok";
	
	$query1 = "UPDATE prestamos SET status_prestamo = 6 WHERE id_prestamo = $id_prestamo";
	if(ExecuteSQL($query1)){
		$resultText = "Se cancelo con éxito.";
		$resultStatus = "ok";

		//Recorrer waitlist
		//////////////////////////////////
		$query2 = "SELECT id_libro FROM prestamos WHERE id_prestamo = $id_prestamo";
		$id_libro = GetValueSQL($query2, 'id_libro');


		$query10 = "SELECT * FROM libros WHERE id_libro = $id_libro";
			$id_usuario_owner = GetValueSQL($query10, "id_usuario");

			$query2 = "SELECT COUNT(*) AS cuantos FROM waitlist WHERE id_libro = $id_libro";
			$cuantos_waitlist = GetValueSQL($query2, 'cuantos');

			if($cuantos_waitlist > 0){ //Hay mas de uno en waitlist 
				$query3 = "SELECT * FROM waitlist WHERE id_libro = $id_libro AND turno = 1";
				$id_usuario_destino = GetValueSQL($query3, 'id_usuario');

				$query4 = "INSERT INTO prestamos (id_usuario_owner, id_usuario_destino, id_libro, status_prestamo) 
				VALUES ($id_usuario_owner, $id_usuario_destino, $id_libro, 1)"; //El turno 1 en la waitlist pasa a la tabla prestamos con status 1 (solicitado)
				ExecuteSQL($query4);

				$query5 = "DELETE FROM waitlist WHERE id_libro = $id_libro AND turno = 1"; //Se borra el turno 1 de la waitlist
				ExecuteSQL($query5);

				$query6 = "SELECT COUNT(*) AS cuantos FROM waitlist WHERE id_libro = $id_libro";
				$cuantos_post_eliminar = GetValueSQL($query6, 'cuantos');

				if($cuantos_post_eliminar > 0){ //Si quedan mas usuarios en la waitlist, se recorre su turno
					$query7 = "UPDATE waitlist SET turno = turno - 1 WHERE id_libro = $id_libro";
					ExecuteSQL($query7);
				}
			}
			/////////////////////////////
			$query3 = "UPDATE libros SET status = 1 WHERE id_libro = $id_libro";
			ExecuteSQL($query3);
	} else {
		$resultText = "Ocurrió un error. Inténtalo de nuevo.";
		$resultStatus = "error";
	}
	$result = array(   
		'result' 				=> $resultStatus, 
		'result_text' 			=> $resultText
	);		 
	XML_Envelope($result);  
	exit;
}


if(Requesting("action") == "rellenar_estrellas_rese"){
	$id_prestamo = Requesting("id_prestamo");
	$id_usuario_evaluador = Requesting("id_usuario_evaluador");
	$id_usuario_evaluado = Requesting("id_usuario_evaluado");
	
	$resultText = "Correcto.";
	$resultStatus = "ok";


	$query1 = "SELECT COUNT(*) AS existe FROM reseñas WHERE id_prestamo = $id_prestamo AND id_usuario_evaluador = $id_usuario_evaluador";
	$existe = GetValueSQL($query1, 'existe');

	if($existe > 0){
		$query2 = "SELECT * FROM reseñas WHERE id_prestamo = $id_prestamo AND id_usuario_evaluador = $id_usuario_evaluador";
		$puntuacion = GetValueSQL($query2, 'puntuacion');


	} else{
		$puntuacion = 0;
	}

	
	$result = array(   
		'id_prestamo'			=> $id_prestamo,
		'id_usuario_evaluador'	=> $id_usuario_evaluador,
		'id_usuario_evaluado'	=> $id_usuario_evaluado,
		'puntuacion'			=> $puntuacion,
		'result' 				=> $resultStatus, 
		'result_text' 			=> $resultText
	);		 
	XML_Envelope($result);  
	exit;
}


if(Requesting("action") == "busqueda"){
	$search = Requesting("input_busqueda");

	
	$resultText = "Correcto.";
	$resultStatus = "ok";


	$xmlRow = "";

	$xmlRow .= '<div class="container" id="div_buscar_libro">
            
            <div class="ps-section__header" style="margin-top: 50px;">
                <h1>Resultados</h1>
            </div>

            <div class="ps-section__content" style="margin-top: -20px;">

                <div class="table-responsive">
                                        
                    <div class="ps-section__cart-actions" style="margin-top: 100px; margin-bottom: -50px;"></div>

                    <table class="table ps-table--shopping-cart">
                        <tbody>';

        $query = "SELECT * FROM libros INNER JOIN status_libro ON libros.status = status_libro.id_status WHERE libros.titulo LIKE '%$search%' AND status != 3";
        $result = DatasetSQL($query);
        $count = 0;
        while ($row = mysqli_fetch_array($result)) {
            $count++;
            $id_libro = $row['id_libro'];
            $titulo = $row['titulo'];
            $autor = $row['autor'];
            $editorial = $row['editorial'];
            $sinopsis = $row['sinopsis'];
            $year = $row['year'];
            $status = $row['status_nombre'];
            $ruta_foto_portada = $row['ruta_foto_portada'];

            $url_producto = str_replace(" ", "-", $titulo);
            $url_producto = str_replace("/", "-", $url_producto);
            $url_producto = quitarAcentos($url_producto);
            $url_producto = preg_replace('/[^a-zA-Z0-9\s-]/', '', $url_producto);

            $id_status = $row['id_status'];

            switch($id_status){
                case 1:
                    $mensaje_status = '<i class="fas fa-book-openfas fa-book-open"></i> '.$status;
                break;
                case 2:
                    $mensaje_status = '<i class="fas fa-book-reader"></i> '.$status;
                break;
                case 3:
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

			$xmlRow .= '<tr>
                                <td>
                                    <div class="ps-product--cart">
                                        <div class="ps-product__thumbnail">
                                            <a href="libro/'.$id_libro.'/'.$url_producto.'"><img src="'.$ruta_foto_portada.'" alt="$titulo"></a>
                                        </div>
                            
                                        <div class="ps-product__content">
                                            <a href="libro/'.$id_libro.'/'.$url_producto.'">'.$titulo.'</a>
                                            <p>Autor: <strong>'.$autor.'</strong></p>
                                            <a type="button" href="" onclick="ver_sinopsis('.$id_libro.', event)">Ver sinopsis</a>
                                        </div>
                                    </div>
                                </td>

                                <td class="text-center"><p>Editorial</p>'.$editorial.'</td>

                                <td class="text-center"><p>Año de publicación</p>'.$year.'</td>

                                <td class="text-center">'.$mensaje_status.'</td>                       

                            </tr>'; 

                            $xmlRow .= '<tr id="sinopsis_'.$id_libro.'" style="display: none;">
                                <td class="text-center " colspan="7"><strong>Sinopsis: </strong>'.$sinopsis.'</td>
                            </tr>';
        }
        if($count <= 0) {
            $xmlRow .= '<tr><td><h3>No se encontraron resultados</h3></td><td></td></tr>';
        }
		$xmlRow .= '</tbody>
                    </table>
                </div>
                <hr>
            </div> 
        </div>';


	$result = array(
		'busqueda'				=> $xmlRow,
		'result' 				=> $resultStatus, 
		'result_text' 			=> $resultText
	);		 
	XML_Envelope($result);  
	exit;
}


?>


