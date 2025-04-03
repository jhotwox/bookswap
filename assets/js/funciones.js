$("#btn_login").click(inicia_sesion);
// $("#btn_registro").click(registro_user);

// #region activar_actualizar_datos
function activar_actualizar_datos(id_usuario){
	$("#actualizar_info_usuario").show('slow');
	$("#cambiar_password").hide('slow');
	
	llenar_formulario_actualizar_datos(id_usuario);
}

// #region activar_cerrar_ventanas
function activar_cerrar_ventanas(){
	$("#actualizar_info_usuario").hide('slow');
	$("#cambiar_password").hide('slow');
	
	var div_perfil = $("#div-perfil");
	if(div_perfil.length) {
		var offset = div_perfil.offset().top;
		var scrollPosition = offset - 200; //Cantidad de compensación de posicionamiento
		$('html, body').animate({
			scrollTop: scrollPosition
		}, 400);
	}
}

$(document).ready(function() { 
	valida_sesion();	
	$("#actualizar_info_usuario").hide();
	$("#cambiar_password").hide();
	

	//perfil.php
	$("#div_mis_libros").hide();
	$("#div_historial_prestamos").hide();
	$("#div_validar_usuarios").hide();
	// $("#div_strikes_usuarios").hide();
	$("#div_prestamos_recibidos").hide();



	$('#input_busqueda').on('input', function() {
        busqueda();
    });
});

// #region valida_sesion
function valida_sesion(){
	console.log("Validando sesion...");
	$.post("controller.php", 
		{ 	action : "valida_sesion"
		}, end_valida_sesion);  
	
}

function end_valida_sesion(xml){
	$(xml).find("response").each(function(i){		  
		if ($(this).find("result").text()=="ok"){ 
			console.log("Sesion Validada");
			// $("#acciones_usuario").html('<a href="javascript:cerrar_sesion()" title="Cerrar sesión"><i class="icon-exit" style="font-size: 30px"></i></a>');
			// $("#perfil").html('<a class="" href="perfil"><i class="icon-user"></i><p></p></p></a> <a href="perfil"><i class="icon-user"></i><p></p></p></a>');

			// $("#acciones_usuario_mobile").html('<a href="javascript:cerrar_sesion()"  title="Cerrar sesión"><i class="icon-exit" style="font-size: 30px"></i></a>');
			// $("#perfil_mobile").html('<a class="" href="perfil"><i class="icon-user"></i></a>');
			// $("#nombre_usuario").html($(this).find("nombre").text());	
			// $("#id_usuario").val($(this).find("id_usuario").text());

		}else{
			console.log("Sesion NO Validada");
			$("#acciones_usuario").html('<a href="login">Ingresar</a>');
			$("#acciones_usuario_mobile").html('<a href="login">Ingresar</a>');
		}
	});
}

// #region inicia_sesion
function inicia_sesion(e){
	//Evita que se recargue la pagina
	e.preventDefault();
	var login_email  = $("#login_email").val();
	var login_password  = $("#login_password").val();
	
	$.post("controller.php",
		{ 	action 					: "inicia_sesion",
				login_email 		: login_email,
				login_password 		: login_password 
		}, end_inicia_sesion);
}

function end_inicia_sesion(xml){	   
	$(xml).find("response").each(function(i){		 
		if ($(this).find("result").text()=="ok"){ 
			console.log("Logeado"); 
			window.location.href  = 'index';
			//valida_sesion();
		}else{
			Swal.fire({
				icon: 'error',
				title: '¡Error!',
				text: $(this).find("result_text").text(),
				timer: 1000,
				timerProgressBar: true,
			})
		}
	});
}

// #region registro_user
function registro_user(e){
	e.preventDefault();
	// console.log("Registrando...");
	if ($('#aceptoTerminos').is(':checked')) {
		var registro_nombre  	= $("#registro_nombre").val();
		var registro_apellidos 	= $("#registro_apellidos").val();
		var registro_codigo 	= $("#registro_codigo").val();
		var registro_carrera 	= $("#registro_carrera").val();
		var registro_ciclo_ingreso 	= $("#registro_ciclo_ingreso").val();
		var registro_email 		= $("#registro_email").val();
		var registro_password  	= $("#registro_password").val();
		var registro_confirm_password = $("#registro_confirm_password").val();

		var continua = 1;
		var motivo_error = '';


		$("#form_registro .obligatorio").each(function (index) {
			// if($(this).val() == ""){
			// 		$(this).css("border", "2px solid #CB2413");
			// 		continua = 0;
			// 		motivo_error = "Llena todos los campos.";
			// } else{
			// 	$(this).css("border", "2px solid #dddddd");
			// }


			if ($(this).is('select')) { 
				if ($(this).val() == 0) { 
					$(this).css("border", "2px solid #CB2413");
					continua = 0;
					motivo_error = "Selecciona una opción en todos los campos.";
				} else {
					$(this).css("border", "2px solid #dddddd");
				}
			} else {
				if ($(this).val() == "") {
					$(this).css("border", "2px solid #CB2413");
					continua = 0;
					motivo_error = "Llena todos los campos.";
				} else {
					$(this).css("border", "2px solid #dddddd");
				}
			}
		});


		if(!validateCodigoUDG(registro_codigo)){
			$("#registro_codigo").css("border", "2px solid #CB2413");
			motivo_error = "Ingresa un código de estudiante válido.";
			continua = 0; 
		}

		
		if( !validateEmail(registro_email)) {
			$("#registro_email").css("border", "2px solid #CB2413");
			motivo_error = "Ingresa un correo institucional válido.";
			continua = 0; 
		}

		if(!validarTexto(registro_nombre) || !validarTexto(registro_apellidos)){
			motivo_error = "Por favor, ingresa tus nombres y apellidos.";
			continua = 0;
		}


		if(registro_password != registro_confirm_password){
			motivo_error = "Las contraseñas no coinciden.";
			continua = 0; 
		}

		$("#modalTerminos").modal('hide');
		if(continua == 1){
			$("#form_registro .obligatorio").each(function (index) {
				$(this).css("border", "2px solid #dddddd");
			});

			$.post("controller.php", {
                action: "registro_user",
                registro_nombre: registro_nombre,
                registro_apellidos: registro_apellidos,
                registro_codigo: registro_codigo,
                registro_carrera: registro_carrera,
                registro_ciclo_ingreso: registro_ciclo_ingreso,
                registro_email: registro_email,
                registro_password: registro_password
            }, function(xml) {
                end_registro_user(xml);
            });
		} else{
			Swal.fire({
				icon: 'error',
				title: '¡Error!',
				text: motivo_error,
				timer: 1000,
				timerProgressBar: true,
			})
		}
	} else {
		Swal.fire({
			icon: 'error',
			title: '¡Error!',
			text: 'Debes aceptar los términos y condiciones para continuar.',
			timer: 1000,
			timerProgressBar: true,
		});
	}
	
}

function end_registro_user(xml) {	   
    $(xml).find("response").each(function(i) {		 
        if ($(this).find("result").text() == "ok") {  	
            $("#form_registro")[0].reset();
            Swal.fire({
                icon: 'success',
                title: '¡Correcto!',
                text: $(this).find("result_text").text(),
                timer: 1000,
                timerProgressBar: true,
            }).then(() => {


                    window.location.href = 'index';

            });
        } else {		
            Swal.fire({
                icon: 'error',
                title: '¡Error!',
                text: $(this).find("result_text").text(),
                timer: 1000,
                timerProgressBar: true,
            });
        }
    });
}


// #region terminos y condiciones
function modalTerminos(result) {
	if (result == "ok") {     
		Swal.fire({
			icon: 'success',
			title: '¡Correcto!',
			text: 'Términos y condiciones aceptados.',
			timer: 1000,
			timerProgressBar: true,
		});

		$("#modalTerminos").modal('hide');

	} else { 
		Swal.fire({
			icon: 'error',
			title: '¡Error!',
			text: 'Debes aceptar los términos y condiciones para continuar.',
			timer: 1000,
			timerProgressBar: true,
		});
	}
}

// #region cerrar_sesion
function cerrar_sesion(){	
	console.log("Cerrando sesion");
	$.post("controller.php",
		{ 	action 					: "cerrar_sesion"
		}, end_cerrar_sesion);
}
function end_cerrar_sesion(xml){	  
	console.log("Sesion cerrada"); 
	$(xml).find("response").each(function(i){		 
		if ($(this).find("result").text()=="ok"){  
			window.location.href  = "index";	 
		}else{
		}
	});
}

// #region llenar_select_carreras
function llenar_select_carreras(){
	// console.log("llega aqui");
	$.post("controller.php",
	{	action : "llenar_select_carreras",
	}, end_llenar_select_carreras);
}

function end_llenar_select_carreras(xml){
	$(xml).find("response").each(function(i){		 
		if ($(this).find("result").text()=="ok"){       
			$("#registro_carrera").html($(this).find("select_carrera").text()); 

		}
		
	// console.log("pasa aqui");
	}); 
}

// #region llenar_select_ciclos
function llenar_select_ciclos(){
	$.post("controller.php",
	{	action : "llenar_select_ciclos",
	}, end_llenar_select_ciclos);
}

function end_llenar_select_ciclos(xml){
	$(xml).find("response").each(function(i){		 
		if ($(this).find("result").text()=="ok"){       
			$("#registro_ciclo_ingreso").html($(this).find("select_ciclo").text()); 
		}
	}); 
}

// #region sumar_visitas
function sumar_visitas(id_libro){
	$.post("controller.php",
    {    action : "sumar_visitas",
        id_libro : id_libro
    }, end_sumar_visitas);
}

function end_sumar_visitas(xml){
	$(xml).find("response").each(function(i){		 
		if ($(this).find("result").text()=="ok"){       
			
		}
	}); 
}

// #region wishlist_remove
function wishlist_remove(id_usuario, id_libro, event){
	event.preventDefault();

	$.post("controller.php",
    {    action : "wishlist_remove",
		id_usuario	: id_usuario,
        id_libro : id_libro
    }, end_wishlist_remove);
}

function end_wishlist_remove(xml){
	$(xml).find("response").each(function(i){         
        if ($(this).find("result").text()=="ok"){   
			// swal("¡Correcto!", "¡Libro eliminado de tu wishlist!", "success");

			Swal.fire({
				icon: 'success',
				title: '¡Correcto!',
				text: '¡Libro eliminado de tu wishlist!',
				timer: 1000,
				timerProgressBar: true,
			})

            var id_usuario = $(this).find("id_usuario").text();
            var id_libro = $(this).find("id_libro").text();      
            $("#wishlist_spot").html('<a onclick="wishlist_add('+id_usuario+', '+id_libro+', event)" href=""><i class="fa-regular fa-heart fa-xl"></i></a>');
			// $("#wishlist_spot").load(location.href + " #wishlist_spot"); 
			
			$("#div-wishlist").load(location.href + " #div-wishlist"); 
			$("#header_icons").load(location.href + " #header_icons"); 
			$("#header_icons_mobile").load(location.href + " #header_icons_mobile"); 

        } else{
			// swal("¡Error!", $(this).find("result_text").text(), "error");

			Swal.fire({
				icon: 'error',
				title: '¡Error!',
				text: $(this).find("result_text").text(),
				timer: 1000,
				timerProgressBar: true,
			})
		}
    });
}

// #region wishlist_add
function wishlist_add(id_usuario, id_libro, event){
	event.preventDefault();

	$.post("controller.php",
    {    action : "wishlist_add",
		id_usuario	: id_usuario,
        id_libro : id_libro
    }, end_wishlist_add);
}

function end_wishlist_add(xml){
	$(xml).find("response").each(function(i){         
        if ($(this).find("result").text()=="ok"){     
			// swal("Correcto", "¡Libro agregado a tu wishlist!", "success");
			Swal.fire({
				icon: 'success',
				title: '¡Correcto!',
				text: '¡Libro agregado a tu wishlist!',
				timer: 1000,
				timerProgressBar: true,
			})

            var id_usuario = $(this).find("id_usuario").text();
            var id_libro = $(this).find("id_libro").text();  
            $("#wishlist_spot").html('<a onclick="wishlist_remove('+id_usuario+', '+id_libro+', event)" href=""><i class="fas fa-heart fa-xl"></i></a>');
			// $("#wishlist_spot").load(location.href + " #wishlist_spot"); 

			$("#header_icons").load(location.href + " #header_icons"); 	
			$("#header_icons_mobile").load(location.href + " #header_icons_mobile"); 

        } else{
			// swal("¡Error!", $(this).find("result_text").text(), "error");
			
			Swal.fire({
				icon: 'error',
				title: '¡Error!',
				text: $(this).find("result_text").text(),
				timer: 1000,
				timerProgressBar: true,
			})
		}
    });
}

// #region solicitar_libro
function solicitar_libro(id_usuario, id_libro, event) { 
	event.preventDefault();

	$.post("controller.php",
    {    action 	: "solicitar_libro",
       	 	id_usuario  : id_usuario,
        	id_libro 	: id_libro
    }, end_solicitar_libro);
}

function end_solicitar_libro(xml){
	$(xml).find("response").each(function(i){         
        if ($(this).find("result").text()=="ok"){     
			// swal("Correcto", $(this).find("result_text").text(), "success");

			Swal.fire({
				icon: 'success',
				title: '¡Correcto!',
				text: $(this).find("result_text").text(),
				timer: 1500,
				timerProgressBar: true,
			})
        } else{

			Swal.fire({
				icon: $(this).find("result").text(),
				title: '¡Error!',
				text: $(this).find("result_text").text(),
				timer: 1500,
				timerProgressBar: true,
			})
		}
    });
}

// #region llenar_formulario_actualizar_datos
function llenar_formulario_actualizar_datos(id_usuario){

	$.post("controller.php",
    {    action 	: "llenar_formulario_actualizar_datos",
       	 	id_usuario  : id_usuario
    }, end_llenar_formulario_actualizar_datos);
}

function end_llenar_formulario_actualizar_datos(xml){
	$(xml).find("response").each(function(i){         
        if ($(this).find("result").text()=="ok"){     

			$("#nombres").val($(this).find("nombres").text());
			$("#apellidos").val($(this).find("apellidos").text());
			$("#codigo_usuario").val($(this).find("codigo_usuario").text());
			$("#carrera").val($(this).find("carrera").text());
			$("#ciclo_ingreso").val($(this).find("ciclo_ingreso").text());
			$("#correo").val($(this).find("correo").text());
			$("#imagen-perfil").html('<img style="max-width: 200px; height: auto;" src="'+$(this).find("ruta_foto_perfil").text()+'" alt="Foto de Perfil">');
			$("#imagen-credencial").html('<img style="max-width: 200px; height: auto;" src="'+$(this).find("ruta_foto_credencial").text()+'" alt="Credencial de Estudiante">');
            
        } 
    });
}

// #region actualizar_usuario
function actualizar_usuario(id_usuario, e){
	e.preventDefault();
	var nombres = $("#nombres").val();
	var apellidos = $("#apellidos").val();
	var foto_perfil = $("#foto_perfil")[0].files[0];
	var foto_credencial = $("#foto_credencial")[0].files[0];

	console.log("Nombre: " + nombres);
	console.log("Apellidos: " + apellidos);

	var continua = 1;

	// Verificar la imagen de perfil
    if(foto_perfil){
        if(!validarImagen(foto_perfil)){
			continua = 0;
			Swal.fire({
				icon: 'error',
				title: '¡Error!',
				text: "La imagen de perfil no es válida.",
				timer: 1000,
				timerProgressBar: true,
			})
        }
    } 
	// else{
	// 	continua = 0;
	// 	swal("¡Error!", "Por favor, selecciona una imagen de perfil.", "error");
    // }

    // Verificar la foto de credencial
    if(foto_credencial){
        if(!validarImagen(foto_credencial)){
			continua = 0;
			
			Swal.fire({
				icon: 'error',
				title: '¡Error!',
				text: "La imagen de la credencial no es válida.",
				timer: 1000,
				timerProgressBar: true,
			})
        }
    } 
	// else{
	// 	continua = 0;
	// 	swal("¡Error!", "Por favor, selecciona una imagen de perfil.", "error");
    // }
	
	if(!validarTexto(nombres) || !validarTexto(apellidos)){
		continua = 0;
		Swal.fire({
			icon: 'error',
			title: '¡Error!',
			text: "Por favor, ingresa tus nombres y apellidos.",
			timer: 1000,
			timerProgressBar: true,
		})
	}


	if(continua == 1){
		//Crear un objeto FormData para enviar los datos del formulario, incluida la imagen
		var formData = new FormData();
		formData.append('action', 'actualizar_usuario');
		formData.append('id_usuario', id_usuario);
		formData.append('nombres', nombres);
		formData.append('apellidos', apellidos);
		formData.append('foto_perfil', foto_perfil);
		formData.append('foto_credencial', foto_credencial);
	
		//Realizar la solicitud POST utilizando AJAX
		$.ajax({
			url: 'controller.php',
			type: 'POST',
			data: formData,
			contentType: false, //No establecer el tipo de contenido, dejar que jQuery lo determine automáticamente
			processData: false, //No procesar los datos, dejar que jQuery maneje los datos del formulario
			success: end_actualizar_usuario 
		});
	}

	
}

function end_actualizar_usuario(xml){
	$(xml).find("response").each(function(i){         
        if ($(this).find("result").text()=="ok"){     

			Swal.fire({
				icon: 'success',
				title: '¡Correcto!',
				text: $(this).find("result_text").text(),
				timer: 1000,
				timerProgressBar: true,
			})

			$("#div-perfil").load(location.href + " #div-perfil");    
			$('#modalCambiarInfoUsuario').modal('hide');


        } else{ 

			Swal.fire({
				icon: 'error',
				title: '¡Error!',
				text: $(this).find("result_text").text(),
				timer: 1000,
				timerProgressBar: true,
			})
		}

		
		$("#actualizar_info_usuario").hide('slow');
		$("#cambiar_password").hide('slow');
    });
}

// #region cambiar_password
function cambiar_password(id_usuario){
	var password_actual = $("#password_actual").val();
	var nueva_password = $("#nueva_password").val();
	var confirmar_nueva_password = $("#confirmar_nueva_password").val();

	var continuar = 1;

	if(nueva_password !== confirmar_nueva_password){
		continuar = 0;
		
		Swal.fire({
			icon: 'error',
			title: '¡Error!',
			text: "Las contraseñas no coinciden. ",
			timer: 1000,
			timerProgressBar: true,
		})
	}

	if(continuar == 1){
		$.post("controller.php",
		{    action 	: "cambiar_password",
				id_usuario 					: id_usuario,
				password_actual 			: password_actual,
				nueva_password 				: nueva_password,
				confirmar_nueva_password 	: confirmar_nueva_password,
		}, end_cambiar_password);
	}
}

function end_cambiar_password(xml){
	$(xml).find("response").each(function(i){         
        if ($(this).find("result").text()=="ok"){     

			Swal.fire({
				icon: 'success',
				title: '¡Correcto!',
				text: $(this).find("result_text").text(),
				timer: 1000,
				timerProgressBar: true,
			})

			$("#form_cambiar_password")[0].reset();
			$('#modalCambiarPassword').modal('hide');
        } else{
			
			Swal.fire({
				icon: 'error',
				title: '¡Error!',
				text: $(this).find("result_text").text(),
				timer: 1000,
				timerProgressBar: true,
			})  
		}
		
    });
}

// #region ver_sinopsis
function ver_sinopsis(id_libro, e){
	e.preventDefault();
	$("#sinopsis_"+id_libro).toggle('fast');
}

// #region ver_waitlist
function ver_waitlist(id_libro, e){
	e.preventDefault();
	$("#waitlist_"+id_libro).toggle('fast');
}

// #region abrir_modal
function abrir_modal(tipo){
	console.log(tipo);
	
	if(tipo == 1){
		$('#modalAgregar').modal('show');
	}
}

// #region cambiar_opciones_perfil
function cambiar_opciones_perfil(tipo, e){
	e.preventDefault();
	switch(tipo){
		case 1:
			$("#li_mis_libros").addClass("active");
			$("#li_prestamos_activos").removeClass("active");
			$("#li_historial_prestamos").removeClass("active");
			$("#li_strikes_usuarios").removeClass("active");
			$("#li_validar_usuarios").removeClass("active");
			$("#li_prestamos_recibidos").removeClass("active");

			$("#div_mis_libros").show('slow');
			$("#div_prestamos_activos").hide('slow');
			$("#div_historial_prestamos").hide('slow');
			$("#div_strikes_usuarios").hide('slow');
			$("#div_validar_usuarios").hide('slow');
			$("#div_prestamos_recibidos").hide('slow');
		break;
		case 2:
			$("#li_mis_libros").removeClass("active");
			$("#li_prestamos_activos").addClass("active");
			$("#li_historial_prestamos").removeClass("active");
			$("#li_strikes_usuarios").removeClass("active");
			$("#li_validar_usuarios").removeClass("active");
			$("#li_prestamos_recibidos").removeClass("active");

			$("#div_mis_libros").hide('slow');
			$("#div_prestamos_activos").show('slow');
			$("#div_historial_prestamos").hide('slow');
			$("#div_strikes_usuarios").hide('slow');
			$("#div_validar_usuarios").hide('slow');
			$("#div_prestamos_recibidos").hide('slow');
		break;
		case 3:
			$("#li_mis_libros").removeClass("active");
			$("#li_prestamos_activos").removeClass("active");
			$("#li_historial_prestamos").addClass("active");
			$("#li_strikes_usuarios").removeClass("active");
			$("#li_validar_usuarios").removeClass("active");
			$("#li_prestamos_recibidos").removeClass("active");

			$("#div_mis_libros").hide('slow');
			$("#div_prestamos_activos").hide('slow');
			$("#div_historial_prestamos").show('slow');
			$("#div_strikes_usuarios").hide('slow');
			$("#div_validar_usuarios").hide('slow');
			$("#div_prestamos_recibidos").hide('slow');
		break;
		case 4:
			$("#li_mis_libros").removeClass("active");
			$("#li_prestamos_activos").removeClass("active");
			$("#li_historial_prestamos").removeClass("active");
			$("#li_strikes_usuarios").addClass("active");
			$("#li_validar_usuarios").removeClass("active");
			$("#li_prestamos_recibidos").removeClass("active");

			$("#div_mis_libros").hide('slow');
			$("#div_prestamos_activos").hide('slow');
			$("#div_historial_prestamos").hide('slow');
			$("#div_strikes_usuarios").show('slow');
			$("#div_validar_usuarios").hide('slow');
			$("#div_prestamos_recibidos").hide('slow');
		break;
		case 5:
			$("#li_mis_libros").removeClass("active");
			$("#li_prestamos_activos").removeClass("active");
			$("#li_historial_prestamos").removeClass("active");
			$("#li_strikes_usuarios").removeClass("active");
			$("#li_validar_usuarios").addClass("active");
			$("#li_prestamos_recibidos").removeClass("active");

			$("#div_mis_libros").hide('slow');
			$("#div_prestamos_activos").hide('slow');
			$("#div_historial_prestamos").hide('slow');
			$("#div_strikes_usuarios").hide('slow');
			$("#div_validar_usuarios").show('slow');
			$("#div_prestamos_recibidos").hide('slow');
		break;
		case 6:
			$("#li_mis_libros").removeClass("active");
			$("#li_prestamos_activos").removeClass("active");
			$("#li_historial_prestamos").removeClass("active");
			$("#li_strikes_usuarios").removeClass("active");
			$("#li_validar_usuarios").removeClass("active");
			$("#li_prestamos_recibidos").addClass("active");

			$("#div_mis_libros").hide('slow');
			$("#div_prestamos_activos").hide('slow');
			$("#div_historial_prestamos").hide('slow');
			$("#div_strikes_usuarios").hide('slow');
			$("#div_validar_usuarios").hide('slow');
			$("#div_prestamos_recibidos").show('slow');
		break;
	}
}

// #region agregar_libro
function agregar_libro(id_usuario){
	var titulo = $("#al_titulo").val();
	var autor = $("#al_autor").val();
	var isbn = $("#al_isbn").val();
	var editorial = $("#al_editorial").val();
	var year = $("#al_año").val();
	var sinopsis = $("#al_sinopsis").val();
	var foto_portada = $("#al_foto_portada")[0].files[0];

	var continua = 1;

	// Verificar la imagen de portada
    if(foto_portada){
        if(!validarImagen(foto_portada)){
			continua = 0;
			Swal.fire({
				icon: 'error',
				title: '¡Error!',
				text: "La imagen de portada no es válida.",
				timer: 1000,
				timerProgressBar: true,
			})
        }
    } 
	
	if(!validarTextoConSignos(titulo)) {
		continua = 0;
		Swal.fire({
			icon: 'error',
			title: '¡Error!',
			text: "El formato del título es incorrecto.",
			timer: 1000,
			timerProgressBar: true,
		})
	}
	
	if(!validarTextoConSignos(autor)) {
		continua = 0;
		Swal.fire({
			icon: 'error',
			title: '¡Error!',
			text: "El formato del autor es incorrecto.",
			timer: 1000,
			timerProgressBar: true,
		})
	}
	
	if(!validarTextoConSignos(editorial)) {
		continua = 0;
		Swal.fire({
			icon: 'error',
			title: '¡Error!',
			text: "El formato de la editorial es incorrecto.",
			timer: 1000,
			timerProgressBar: true,
		})
	}

	if(isbn){
		if(!validarISBN(isbn)){
			continua = 0;
			Swal.fire({
				icon: 'error',
				title: '¡Error!',
				text: "El formato del ISBN es incorrecto.",
				timer: 1000,
				timerProgressBar: true,
			})
		}
	}

	if(year){
		if(!validarYear(year)){
			continua = 0;
			Swal.fire({
				icon: 'error',
				title: '¡Error!',
				text: "El formato del año es incorrecto.",
				timer: 1000,
				timerProgressBar: true,
			})
		}
	}

	if(sinopsis){
		if(!validarTextoConSignos(sinopsis)){
			continua = 0;
			Swal.fire({
				icon: 'error',
				title: '¡Error!',
				text: "El formato de la sinopsis es incorrecto.",
				timer: 1000,
				timerProgressBar: true,
			})
		}
	}

	//Verificar campos vacíos
	$("#form_agregar_libro .obligatorio").each(function (index) {
		if ($(this).val() == "") {
			continua = 0;
			Swal.fire({
				icon: 'error',
				title: '¡Error!',
				text: "Llena todos los campos obligatorios.",
				timer: 1000,
				timerProgressBar: true,
			})
			return;
		} 
	});

	if(continua == 1){
		//Crear un objeto FormData para enviar los datos del formulario, incluida la imagen
		var formData = new FormData();
		formData.append('action', 'agregar_libro');
		formData.append('id_usuario', id_usuario);
		formData.append('titulo', titulo);
		formData.append('autor', autor);
		formData.append('isbn', isbn);
		formData.append('editorial', editorial);
		formData.append('year', year);
		formData.append('sinopsis', sinopsis);
		formData.append('foto_portada', foto_portada);
	
		//Realizar la solicitud POST utilizando AJAX
		$.ajax({
			url: 'controller.php',
			type: 'POST',
			data: formData,
			contentType: false, 
			processData: false, 
			success: end_agregar_libro 
		});
	}

	
}

function end_agregar_libro(xml){
	$(xml).find("response").each(function(i){         
        if ($(this).find("result").text()=="ok"){     

			Swal.fire({
				icon: 'success',
				title: '¡Correcto!',
				text: $(this).find("result_text").text(),
				timer: 1000,
				timerProgressBar: true,
			})

			$("#div_mis_libros").load(location.href + " #div_mis_libros");    
			$('#modalAgregarLibro').modal('hide');


        } else{ 

			Swal.fire({
				icon: 'error',
				title: '¡Error!',
				text: $(this).find("result_text").text(),
				timer: 1000,
				timerProgressBar: true,
			})
		}

    });
}

// #region llenar_form_editar_libro
function llenar_form_editar_libro(id_libro){
    var id_libro = id_libro;

	$.post("controller.php",
    {    action 	: "llenar_form_editar_libro",
       	 	id_libro  : id_libro
    }, end_llenar_form_editar_libro);
}

function end_llenar_form_editar_libro(xml){
	$(xml).find("response").each(function(i){         
        if ($(this).find("result").text()=="ok"){   
			
			$("#el_id_libro").val($(this).find("id_libro").text());
			$("#el_titulo").val($(this).find("titulo").text());
			$("#el_autor").val($(this).find("autor").text());
			$("#el_isbn").val($(this).find("isbn").text());
			$("#el_editorial").val($(this).find("editorial").text());
			$("#el_año").val($(this).find("year").text());
			$("#el_sinopsis").val($(this).find("sinopsis").text());

        } 
    });
}

// #region editar_libro
function editar_libro(id_usuario){
	var id_libro = $("#el_id_libro").val();
	var titulo = $("#el_titulo").val();
	var autor = $("#el_autor").val();
	var isbn = $("#el_isbn").val();
	var editorial = $("#el_editorial").val();
	var year = $("#el_año").val();
	var sinopsis = $("#el_sinopsis").val();
	var foto_portada = $("#el_foto_portada")[0].files[0];

	console.log(isbn);

	var continua = 1;

	// Verificar la imagen de portada
    if(foto_portada){
        if(!validarImagen(foto_portada)){
			continua = 0;
			Swal.fire({
				icon: 'error',
				title: '¡Error!',
				text: "La imagen de portada no es válida.",
				timer: 1000,
				timerProgressBar: true,
			})
        }
    } 
	
	if(!validarTextoConSignos(titulo)) {
		continua = 0;
		Swal.fire({
			icon: 'error',
			title: '¡Error!',
			text: "El formato del título es incorrecto.",
			timer: 1000,
			timerProgressBar: true,
		})
	}
	
	if(!validarTextoConSignos(autor)) {
		continua = 0;
		Swal.fire({
			icon: 'error',
			title: '¡Error!',
			text: "El formato del autor es incorrecto.",
			timer: 1000,
			timerProgressBar: true,
		})
	}
	
	if(!validarTextoConSignos(editorial)) {
		continua = 0;
		Swal.fire({
			icon: 'error',
			title: '¡Error!',
			text: "El formato de la editorial es incorrecto.",
			timer: 1000,
			timerProgressBar: true,
		})
	}

	if(isbn){
		if(!validarISBN(isbn)){
			continua = 0;
			Swal.fire({
				icon: 'error',
				title: '¡Error!',
				text: "El formato del ISBN es incorrecto.",
				timer: 1000,
				timerProgressBar: true,
			})
		}
	}

	if(year){
		if(!validarYear(year)){
			continua = 0;
			Swal.fire({
				icon: 'error',
				title: '¡Error!',
				text: "El formato del año es incorrecto.",
				timer: 1000,
				timerProgressBar: true,
			})
		}
	}

	if(sinopsis){
		if(!validarTextoConSignos(sinopsis)){
			continua = 0;
			Swal.fire({
				icon: 'error',
				title: '¡Error!',
				text: "El formato de la sinopsis es incorrecto.",
				timer: 1000,
				timerProgressBar: true,
			})
		}
	}

	//Verificar campos vacíos
	$("#form_editar_libro .obligatorio").each(function (index) {
		if ($(this).val() == "") {
			continua = 0;
			Swal.fire({
				icon: 'error',
				title: '¡Error!',
				text: "Llena todos los campos obligatorios.",
				timer: 1000,
				timerProgressBar: true,
			})
			return;
		} 
	});

	if(continua == 1){
		//Crear un objeto FormData para enviar los datos del formulario, incluida la imagen
		var formData = new FormData();
		formData.append('action', 'editar_libro');
		formData.append('id_libro', id_libro);
		formData.append('id_usuario', id_usuario);
		formData.append('titulo', titulo);
		formData.append('autor', autor);
		formData.append('isbn', isbn);
		formData.append('editorial', editorial);
		formData.append('year', year);
		formData.append('sinopsis', sinopsis);
		formData.append('foto_portada', foto_portada);
	
		//Realizar la solicitud POST utilizando AJAX
		$.ajax({
			url: 'controller.php',
			type: 'POST',
			data: formData,
			contentType: false, 
			processData: false, 
			success: end_editar_libro 
		});
	}

	
}

function end_editar_libro(xml){
	$(xml).find("response").each(function(i){         
        if ($(this).find("result").text()=="ok"){     

			Swal.fire({
				icon: 'success',
				title: '¡Correcto!',
				text: $(this).find("result_text").text(),
				timer: 1000,
				timerProgressBar: true,
			})

			$("#div_mis_libros").load(location.href + " #div_mis_libros");    
			$('#modalEditarLibro').modal('hide');


        } else{ 

			Swal.fire({
				icon: 'error',
				title: '¡Error!',
				text: $(this).find("result_text").text(),
				timer: 1000,
				timerProgressBar: true,
			})
		}

    });
}

// #region cambiar_status_libro
function cambiar_status_libro(id_libro, tipo){
	
	$.post("controller.php",
    {    	action 		: "cambiar_status_libro",
       	 	id_libro  	: id_libro,
			tipo		: tipo
    }, end_cambiar_status_libro);
}

function end_cambiar_status_libro(xml){
	$(xml).find("response").each(function(i){         
        if ($(this).find("result").text()=="ok"){     

			Swal.fire({
				icon: 'success',
				title: '¡Correcto!',
				text: $(this).find("result_text").text(),
				timer: 1000,
				timerProgressBar: true,
			})

			$("#div_mis_libros").load(location.href + " #div_mis_libros");  

        }  else{
			Swal.fire({
				icon: 'error',
				title: '¡Error!',
				text: $(this).find("result_text").text(),
				timer: 1000,
				timerProgressBar: true,
			})
		}
    });
}

// #region validar_usuario
function validar_usuario(id_usuario, e){
	e.preventDefault();
	$.post("controller.php",
    {    	action 			: "validar_usuario",
       	 	id_usuario  	: id_usuario,
    }, end_validar_usuario);
}

function end_validar_usuario(xml){
	$(xml).find("response").each(function(i){         
        if ($(this).find("result").text()=="ok"){     

			Swal.fire({
				icon: 'success',
				title: '¡Usuario validado!',
				text: $(this).find("result_text").text(),
				timer: 1000,
				timerProgressBar: true,
			})

			$("#div_validar_usuarios").load(location.href + " #div_validar_usuarios");  

        }  else{
			Swal.fire({
				icon: 'error',
				title: '¡Error!',
				text: $(this).find("result_text").text(),
				timer: 1000,
				timerProgressBar: true,
			})
		}
    });
}

// #region strike_usuario
function strike_usuario(id_usuario) {
	$.post("controller.php",
    {    	action 			: "strike_usuario",
       	 	id_usuario  	: id_usuario,
    }, end_strike_usuario);
}

function end_strike_usuario(xml) {
	$(xml).find("response").each(function(i) {
		if ($(this).find("result").text()=="ok") {

			// $("#form_reportar_usuario")[0].reset();
			// $('#modalReportarUsuario').modal("hide");
			
			document.getElementById('modalReportarUsuario').classList.remove('show');
			document.getElementById('modalReportarUsuario').setAttribute('aria-hidden', 'true');
			$('.modal-backdrop').remove(); // Elimina el fondo oscuro en caso de que persista
			// document.body.classList.remove('modal-open');
			
			Swal.fire({
				icon: 'success',
				title: '¡Strike puesto!',
				text: $(this).find("result_text").text(),
				timer: 1000,
				timerProgressBar: true,
				willClose: () => window.history.back(),
			})

			// $("#div_usuario").load(location.href + "# div_usuario");

		}  else {
			Swal.fire({
				icon: 'error',
				title: '¡Error!',
				text: $(this).find("result_text").text(),
				timer: 1000,
				timerProgressBar: true,
			})
		}
    });
}

// #region nuevo_strike_usuario
function nuevo_strike_usuario(id_usuario, detalles) {
	var detalles = $("#ns_detalles").val();
	console.log("Detalles: ", detalles);
	$.post("controller.php",
    {    	action 		: "nuevo_strike_usuario",
       	 	id_usuario  : id_usuario,
       	 	detalles  	: detalles,
    }, end_nuevo_strike_usuario);
}

function end_nuevo_strike_usuario(xml) {
	$(xml).find("response").each(function(i) {
		if ($(this).find("result").text()=="ok") {

			
			$("#form_reportar_usuario")[0].reset();
			$('#modalReportarUsuario').modal("hide");

			Swal.fire({
				icon: 'success',
				title: '¡Strike creado!',
				text: $(this).find("result_text").text(),
				timer: 1000,
				timerProgressBar: true,
			})

			$("#div_usuario").load(location.href + " #div_usuario");  

		}  else {
			Swal.fire({
				icon: 'error',
				title: '¡Error!',
				text: $(this).find("result_text").text(),
				timer: 1000,
				timerProgressBar: true,
			})
		}
    });
}

// #region ocultar_strike
function ocultar_strike(id_strike) {
	$.post("controller.php",
    {    	action 			: "ocultar_strike",
       	 	id_strike  	: id_strike,
    }, end_ocultar_strike);
}

function end_ocultar_strike(xml) {
	$(xml).find("response").each(function(i) {
        if ($(this).find("result").text()=="ok") {

			Swal.fire({
				icon: 'success',
				title: '¡Strike cancelado!',
				text: $(this).find("result_text").text(),
				timer: 1000,
				timerProgressBar: true,
			})

			$("#div_strikes_usuarios").load(location.href + " #div_strikes_usuarios");  

        }  else {
			Swal.fire({
				icon: 'error',
				title: '¡Error!',
				text: $(this).find("result_text").text(),
				timer: 1000,
				timerProgressBar: true,
			})
		}
    });
}

function bloquear_usuario(id_usuario) {
	$.post("controller.php",
    {    	action 			: "bloquear_usuario",
       	 	id_usuario  	: id_usuario,
    }, end_bloquear_usuario);
}

function end_bloquear_usuario(xml) {
	$(xml).find("response").each(function(i) {
		if ($(this).find("result").text()=="ok") {

		Swal.fire({
			icon: 'success',
			title: '¡Usuario bloqueado!',
			text: $(this).find("result_text").text(),
			timer: 1000,
			timerProgressBar: true,
		})

		$("#div_strikes_usuarios").load(location.href + " #div_strikes_usuarios");

		} else {
			Swal.fire({
				icon: 'error',
				title: '¡Error!',
				text: $(this).find("result_text").text(),
				timer: 1000,
				timerProgressBar: true,
			})
		}
	});
}

function no_bloquear_usuario(id_usuario) {
	$.post("controller.php",
    {    	action 			: "no_bloquear_usuario",
       	 	id_usuario  	: id_usuario,
    }, end_no_bloquear_usuario);
}

function end_no_bloquear_usuario(xml) {
	$(xml).find("response").each(function(i) {
		if ($(this).find("result").text()=="ok") {

		Swal.fire({
			icon: 'success',
			title: '¡Se resto un strike al usuario!',
			text: $(this).find("result_text").text(),
			timer: 1000,
			timerProgressBar: true,
		})

		$("#div_strikes_usuarios").load(location.href + " #div_strikes_usuarios");

		} else {
			Swal.fire({
				icon: 'error',
				title: '¡Error!',
				text: $(this).find("result_text").text(),
				timer: 1000,
				timerProgressBar: true,
			})
		}
	});
}

// #region aceptar_denegar_prestamo
function aceptar_denegar_prestamo(id_prestamo, id_libro, tipo, e){
	e.preventDefault();

	$.post("controller.php",
    {    	action 		: "aceptar_denegar_prestamo",
       	 	id_prestamo	: id_prestamo,
			id_libro	: id_libro,
			tipo		: tipo
    }, end_aceptar_denegar_prestamo);
}

function end_aceptar_denegar_prestamo(xml){
	$(xml).find("response").each(function(i){         
        if ($(this).find("result").text()=="ok"){     

			Swal.fire({
				icon: 'success',
				title: '¡Correcto!',
				text: $(this).find("result_text").text(),
				timer: 1000,
				timerProgressBar: true,
			})

			$("#tabla_prestamo_"+$(this).find("id_prestamo").text()).load(location.href + " #tabla_prestamo_"+$(this).find("id_prestamo").text());  

        }  else{
			Swal.fire({
				icon: 'error',
				title: '¡Error!',
				text: $(this).find("result_text").text(),
				timer: 1000,
				timerProgressBar: true,
			})
		}
    });
}


// #region acordar fechas
function acordar_fechas(){
	var id_prestamo = $("#id_prestamo").val();
	var fecha_inicio = $("#fecha_inicio").val();
	var fecha_fin = $("#fecha_final").val();

	console.log(fecha_fin);

	continua = 1;

	$("#form_acordar_fechas .obligatorio").each(function (index) {
		console.log("Bandera 1");
		if ($(this).val() == "") {
			continua = 0;
			Swal.fire({
				icon: 'error',
				title: '¡Error!',
				text: "Llena todos los campos obligatorios.",
				timer: 1000,
				timerProgressBar: true,
			})
			return;
		}
	});

	console.log("Bandera 2");
	if(fecha_inicio > fecha_fin){
		continua = 0;
		Swal.fire({
			icon: 'error',
			title: '¡Error!',
			text: "Fechas no válidas.",
			timer: 1000,
			timerProgressBar: true,
		})
		return;
	}

	console.log("Bandera 3");
	if(continua == 1){
		$.post("controller.php",
		{    	action 		: "acordar_fechas",
				id_prestamo  	: id_prestamo,
				fecha_inicio	: fecha_inicio,
				fecha_fin		: fecha_fin
		}, end_acordar_fechas);
	}
}


function end_acordar_fechas(xml){
	console.log("Bandera 4");
	console.log("Result -> ", $(xml).find("response").text());
	$(xml).find("response").each(function(i){         
        console.log("Bandera 5");
		if ($(this).find("result").text()=="ok"){     
			$("#modalAcordarFechas").modal('hide');
			$("#tabla_prestamo").load(location.href + " #tabla_prestamo");  
			Swal.fire({
				icon: 'success',
				title: '¡Correcto!',
				text: $(this).find("result_text").text(),
				timer: 1000,
				timerProgressBar: true,
			})
        } else {
			Swal.fire({
				icon: 'error',
				title: '¡Error!',
				text: $(this).find("result_text").text(),
				timer: 1000,
				timerProgressBar: true,
			})
		}
		console.log("Bandera 6");
    });
}

// #region llenar form fechas
function llenar_form_confirmar_fechas(id_prestamo){
	$.post("controller.php",
	{    	action 		: "llenar_form_confirmar_fechas",
			id_prestamo  	: id_prestamo,
	}, end_llenar_form_confirmar_fechas);
}

function end_llenar_form_confirmar_fechas(xml){
	$(xml).find("response").each(function(i){         
        if ($(this).find("result").text()=="ok"){     
			$("#conf_fecha_inicio").val($(this).find("fecha_inicio").text());
			$("#conf_fecha_final").val($(this).find("fecha_fin").text());

        } 
    });
}

// #region verificar fechas
function verificar_fechas(accion){
	var id_prestamo = $("#id_prestamo_fechas").val();
	
	$.post("controller.php",
	{    	action 		: "verificar_fechas",
			accion  	: accion,
			id_prestamo	: id_prestamo
	}, end_verificar_fechas);
}

function end_verificar_fechas(xml){
	$(xml).find("response").each(function(i){         
        if ($(this).find("result").text()=="ok"){     
			$("#modalVerificarFechas").modal('hide');
			$("#tabla_prestamos_recibidos").load(location.href + " #tabla_prestamos_recibidos");  

			Swal.fire({
				icon: 'success',
				title: '¡Correcto!',
				text: $(this).find("result_text").text(),
				timer: 1000,
				timerProgressBar: true,
			})


        }  else{
			Swal.fire({
				icon: 'error',
				title: '¡Error!',
				text: $(this).find("result_text").text(),
				timer: 1000,
				timerProgressBar: true,
			})
		}
    });
}

// #region finalizar prestamo
function finalizar_prestamo(){
	var id_libro = $("#fp_id_libro").val();

    $.post("controller.php",
    {       action         : "finalizar_prestamo",
			id_libro      : id_libro
    }, end_finalizar_prestamo);
}

function end_finalizar_prestamo(xml){
	$(xml).find("response").each(function(i){         
        if ($(this).find("result").text()=="ok"){     
			$("#modalFinalizarPrestamo").modal('hide');
			$("#tabla_prestamo").load(location.href + " #tabla_prestamo");  

			Swal.fire({
				icon: 'success',
				title: '¡Correcto!',
				text: $(this).find("result_text").text(),
				timer: 1000,
				timerProgressBar: true,
			})


        }  else{
			Swal.fire({
				icon: 'error',
				title: '¡Error!',
				text: $(this).find("result_text").text(),
				timer: 1000,
				timerProgressBar: true,
			})
		}
    });
}

// #region Cancelar prestamo
function cancelar_prestamo(id_prestamo){
	$.post("controller.php",
    {       action         : "cancelar_prestamo",
			id_prestamo    : id_prestamo
    }, end_cancelar_prestamo);
}

function end_cancelar_prestamo(xml){
	$(xml).find("response").each(function(i){         
        if ($(this).find("result").text()=="ok"){     
			//$("#modalFinalizarPrestamo").modal('hide');
			$("#tabla_prestamo").load(location.href + " #tabla_prestamo");  

			Swal.fire({
				icon: 'success',
				title: '¡Correcto!',
				text: $(this).find("result_text").text(),
				timer: 1000,
				timerProgressBar: true,
			})


        }  else{
			Swal.fire({
				icon: 'error',
				title: '¡Error!',
				text: $(this).find("result_text").text(),
				timer: 1000,
				timerProgressBar: true,
			})
		}
    });
}





// #region updateFileName
function updateFileName(input, labelId) {
    var fileName = input.files[0].name;
    var label = document.getElementById(labelId);
    label.innerText = fileName;
}

// #region stars
function stars(id_evaluador, id_evaluado, id_prestamo, puntuacion) {
	const ratingElement = document.getElementById("rating-"+id_prestamo);
	const stars = ratingElement.querySelectorAll(".star");

    stars.forEach((star, index) => {
        if(index < puntuacion)
			star.classList.add("checked");
		else
			star.classList.remove("checked");
    });
	console.log("EValuador: "+ id_evaluador);
	console.log("Evaludado: " + id_evaluado);
	console.log("Prestamo: " + id_prestamo);
	console.log("Puntuacion: " + puntuacion);

	$.post("controller.php",
    {       action         : "stars",
			id_evaluador	: id_evaluador,
			id_evaluado    : id_evaluado,
			id_prestamo    : id_prestamo,
			puntuacion   	: puntuacion
    }, end_stars);

}

// #region end_stars
function end_stars(xml){
	$(xml).find("response").each(function(i){ 
		const id_usuario_evaluador = parseInt($(this).find('id_usuario_evaluador').text(), 10);
		const id_usuario_evaluado = parseInt($(this).find('id_usuario_evaluado').text(), 10);
		const id_prestamo = parseInt($(this).find('id_prestamo').text(), 10);

		rellenar_estrellas_rese(id_prestamo, id_usuario_evaluador, id_usuario_evaluado);
			
			
        if ($(this).find("result").text()=="ok"){     

			Swal.fire({
				icon: 'success',
				title: '¡Correcto!',
				text: $(this).find("result_text").text(),
				timer: 1000,
				timerProgressBar: true,
			})

			// $("#tabla_historial_prestamos").load(location.href + " #tabla_historial_prestamos");
			// $("#tabla_historial_preste").load(location.href + " #tabla_historial_preste");
        }  else{
			Swal.fire({
				icon: 'error',
				title: '¡Error!',
				text: $(this).find("result_text").text(),
				timer: 1000,
				timerProgressBar: true,
			})
			// $("#tabla_historial_prestamos").load(location.href + " #tabla_historial_prestamos");
			// $("#tabla_historial_preste").load(location.href + " #tabla_historial_preste");
		}
    });
}

// #region llenar_stars
function llenar_stars(){
	// console.log("llega aqui");
	$.post("controller.php",
	{	action : "llenar_stars",
	}, end_llenar_stars);
}

function end_llenar_stars(xml){
	$(xml).find("response").each(function(i){		 
		if ($(this).find("result").text()=="ok"){       
			$("#tabla_historial_prestamos").html($(this).find("select_carrera").text()); 

		}
		
	// console.log("pasa aqui");
	}); 
}



function rellenar_estrellas_rese(id_prestamo, id_usuario_evaluador, id_usuario_evaluado){
	// console.log("Volver a rellenar estrellas");
	$.post("controller.php",
	{	action 					: "rellenar_estrellas_rese",
		id_prestamo 		 	: id_prestamo,
		id_usuario_evaluador 	: id_usuario_evaluador,
        id_usuario_evaluado 	: id_usuario_evaluado
	}, end_rellenar_estrellas_rese);
}


function end_rellenar_estrellas_rese(xml){
	$(xml).find("response").each(function(i){		 
		if ($(this).find("result").text()=="ok"){       
			// console.log($(this).find("puntuacion").text());

			const id_usuario_evaluador = parseInt($(this).find('id_usuario_evaluador').text(), 10);
			const id_usuario_evaluado = parseInt($(this).find('id_usuario_evaluado').text(), 10);
			const id_prestamo = parseInt($(this).find('id_prestamo').text(), 10);

			// console.log("Evaluado: " + id_usuario_evaluado);

			switch($(this).find("puntuacion").text()){
				case "0":
					$("#rating-"+$(this).find("id_prestamo").text()).html("<i class='fa-solid fa-star star' data-rating='1' onclick='stars("+id_usuario_evaluador+", "+id_usuario_evaluado+", "+id_prestamo+", 1)'></i><i class='fa-solid fa-star star' data-rating='2' onclick='stars("+id_usuario_evaluador+", "+id_usuario_evaluado+", "+id_prestamo+", 2)'></i><i class='fa-solid fa-star star' data-rating='3' onclick='stars("+id_usuario_evaluador+", "+id_usuario_evaluado+", "+id_prestamo+", 3)'></i><i class='fa-solid fa-star star' data-rating='4' onclick='stars("+id_usuario_evaluador+", "+id_usuario_evaluado+", "+id_prestamo+", 4)'></i><i class='fa-solid fa-star star' data-rating='5' onclick='stars("+id_usuario_evaluador+", "+id_usuario_evaluado+", "+id_prestamo+", 5)'></i>");
				break;
				case "1":
					$("#rating-"+$(this).find("id_prestamo").text()).html("<i class='fa-solid fa-star star checked' data-rating='1' onclick='stars("+id_usuario_evaluador+", "+id_usuario_evaluado+", "+id_prestamo+", 1)'></i><i class='fa-solid fa-star star' data-rating='2' onclick='stars("+id_usuario_evaluador+", "+id_usuario_evaluado+", "+id_prestamo+", 2)'></i><i class='fa-solid fa-star star' data-rating='3' onclick='stars("+id_usuario_evaluador+", "+id_usuario_evaluado+", "+id_prestamo+", 3)'></i><i class='fa-solid fa-star star' data-rating='4' onclick='stars("+id_usuario_evaluador+", "+id_usuario_evaluado+", "+id_prestamo+", 4)'></i><i class='fa-solid fa-star star' data-rating='5' onclick='stars("+id_usuario_evaluador+", "+id_usuario_evaluado+", "+id_prestamo+", 5)'></i>");
				break;
				case "2":
					$("#rating-"+$(this).find("id_prestamo").text()).html("<i class='fa-solid fa-star star checked' data-rating='1' onclick='stars("+id_usuario_evaluador+", "+id_usuario_evaluado+", "+id_prestamo+", 1)'></i><i class='fa-solid fa-star star checked' data-rating='2' onclick='stars("+id_usuario_evaluador+", "+id_usuario_evaluado+", "+id_prestamo+", 2)'></i><i class='fa-solid fa-star star' data-rating='3' onclick='stars("+id_usuario_evaluador+", "+id_usuario_evaluado+", "+id_prestamo+", 3)'></i><i class='fa-solid fa-star star' data-rating='4' onclick='stars("+id_usuario_evaluador+", "+id_usuario_evaluado+", "+id_prestamo+", 4)'></i><i class='fa-solid fa-star star' data-rating='5' onclick='stars("+id_usuario_evaluador+", "+id_usuario_evaluado+", "+id_prestamo+", 5)'></i>");
				break;
				case "3":
					$("#rating-"+$(this).find("id_prestamo").text()).html("<i class='fa-solid fa-star star checked' data-rating='1' onclick='stars("+id_usuario_evaluador+", "+id_usuario_evaluado+", "+id_prestamo+", 1)'></i><i class='fa-solid fa-star star checked' data-rating='2' onclick='stars("+id_usuario_evaluador+", "+id_usuario_evaluado+", "+id_prestamo+", 2)'></i><i class='fa-solid fa-star star checked' data-rating='3' onclick='stars("+id_usuario_evaluador+", "+id_usuario_evaluado+", "+id_prestamo+", 3)'></i><i class='fa-solid fa-star star' data-rating='4' onclick='stars("+id_usuario_evaluador+", "+id_usuario_evaluado+", "+id_prestamo+", 4)'></i><i class='fa-solid fa-star star' data-rating='5' onclick='stars("+id_usuario_evaluador+", "+id_usuario_evaluado+", "+id_prestamo+", 5)'></i>");
				break;
				case "4":
					$("#rating-"+$(this).find("id_prestamo").text()).html("<i class='fa-solid fa-star star checked' data-rating='1' onclick='stars("+id_usuario_evaluador+", "+id_usuario_evaluado+", "+id_prestamo+", 1)'></i><i class='fa-solid fa-star star checked' data-rating='2' onclick='stars("+id_usuario_evaluador+", "+id_usuario_evaluado+", "+id_prestamo+", 2)'></i><i class='fa-solid fa-star star checked' data-rating='3' onclick='stars("+id_usuario_evaluador+", "+id_usuario_evaluado+", "+id_prestamo+", 3)'></i><i class='fa-solid fa-star star checked' data-rating='4' onclick='stars("+id_usuario_evaluador+", "+id_usuario_evaluado+", "+id_prestamo+", 4)'></i><i class='fa-solid fa-star star' data-rating='5' onclick='stars("+id_usuario_evaluador+", "+id_usuario_evaluado+", "+id_prestamo+", 5)'></i>");
				break;
				case "5":
					$("#rating-"+$(this).find("id_prestamo").text()).html("<i class='fa-solid fa-star star checked' data-rating='1' onclick='stars("+id_usuario_evaluador+", "+id_usuario_evaluado+", "+id_prestamo+", 1)'></i><i class='fa-solid fa-star star checked' data-rating='2' onclick='stars("+id_usuario_evaluador+", "+id_usuario_evaluado+", "+id_prestamo+", 2)'></i><i class='fa-solid fa-star star checked' data-rating='3' onclick='stars("+id_usuario_evaluador+", "+id_usuario_evaluado+", "+id_prestamo+", 3)'></i><i class='fa-solid fa-star star checked' data-rating='4' onclick='stars("+id_usuario_evaluador+", "+id_usuario_evaluado+", "+id_prestamo+", 4)'></i><i class='fa-solid fa-star star checked' data-rating='5' onclick='stars("+id_usuario_evaluador+", "+id_usuario_evaluado+", "+id_prestamo+", 5)'></i>");
				break;
			}

		}
		
	}); 
}


function busqueda(){
	var input_busqueda = $("#input_busqueda").val();

	// console.log("Volver a rellenar estrellas");
	$.post("controller.php",
	{	action 					: "busqueda",
		input_busqueda 		 	: input_busqueda,
	}, end_busqueda);


}



function end_busqueda(xml){
	$(xml).find("response").each(function(i){	
		console.log($(this).find("busqueda").text());	 
		if ($(this).find("result").text()=="ok"){       
			// console.log($(this).find("puntuacion").text());
			$("#div_buscar_libro").html($(this).find("busqueda").text());

		}
		
	}); 
}


// #region validateCodigoUDG
function validateCodigoUDG(codigo) {
    var regex = /^[0-9]{9}$/;
    
    if (regex.test(codigo)) {
        return true; 
    } else {
        return false; 
    }
}

// #region validateEmail
function validateEmail(email) {
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	var dominioUdgReg = /\.udg\.mx$/;


	if(emailReg.test(email) && dominioUdgReg.test(email)){
        return true; //El email es válido y termina con ".udg.mx"
    } else {
        return false; //El email no es válido o no termina con ".udg.mx"
    }
  }

  function validarImagen(image){
    var allowedTypes = ['image/jpeg', 'image/png', 'image/gif']; 
    if(allowedTypes.indexOf(image.type) === -1){
        return false;
    }

    //Verificar el tamaño de la imagen
    var maxSize = 2 * 1024 * 1024; //2MB en bytes
    if (image.size > maxSize) {
        return false;
    }

    var fileName = image.name;
    var fileExtension = fileName.split('.').pop().toLowerCase();
    var allowedExtensions = ['jpg', 'jpeg', 'png', 'gif']; 
    if(allowedExtensions.indexOf(fileExtension) === -1){
        return false;
    }

    return true;
}

// #region validarTexto
function validarTexto(cadena){
    var regex = /^[a-zA-ZáéíóúÁÉÍÓÚ\s]+$/;
    return regex.test(cadena);
}

// #region validarTextoConSignos
function validarTextoConSignos(texto) {
    // Expresión regular para validar texto con letras, números, signos de puntuación y acentos
    var regex = /^[a-zA-Z0-9\s\.,:;!?'"()\-_áéíóúüñÁÉÍÓÚÜÑ¿¡]+$/;
    
    // Verificar si el texto cumple con la expresión regular
    if (regex.test(texto)) {
        return true; // El texto es válido
    } else {
        return false; // El texto no es válido
    }
}

// #region validarISBN
function validarISBN(isbn) {
    // Eliminar cualquier guión o espacio del ISBN
    isbn = isbn.replace(/[\s-]/g, '');
    
    // Verificar si es un ISBN-10
    if (/^\d{9}[\dX]$/.test(isbn)) {
		// console.log("Primera funcion");
        return validarISBN10(isbn);
    }
    
    // Verificar si es un ISBN-13
    if (/^\d{13}$/.test(isbn)) {
		// console.log("Segunda funcion");
        return validarISBN13(isbn);
    }
    
    // No es un formato válido de ISBN
    return false;
}

function validarISBN10(isbn) {
    // Expresión regular para validar un ISBN-10
  const regex = /^\d{9}[\dX]$/;

  // Retorna true si la cadena cumple con la expresión regular, de lo contrario, false
  return regex.test(isbn);
}

function validarISBN13(isbn) {
    // Expresión regular para validar un ISBN-13
    const regex = /^\d{13}$/;

  // Retorna true si la cadena cumple con la expresión regular, de lo contrario, false
  return regex.test(isbn);
}

// #region validarYear
function validarYear(year) {
    // Verificar si el año es una cadena de texto
    if (typeof year === 'string' || year instanceof String) {
        // Verificar si la cadena de texto representa un número entero
        if (/^\d{4}$/.test(year)) {
            // Convertir la cadena de texto a un número entero y verificar si está dentro del rango comúnmente aceptado
            var yearInt = parseInt(year, 10);
            if (yearInt >= 1000 && yearInt <= 9999) {
                return true; // El año es válido
            } else {
                return false; // El año está fuera del rango comúnmente aceptado
            }
        } else {
            return false; // No es un número entero de cuatro dígitos
        }
    } else {
        return false; // No es una cadena de texto
    }
}

function comprobarFecha(fecha) {
    // Obtener la fecha actual
    var fechaActual = new Date();
    
    // Obtener la fecha actual en formato UTC sin la hora
    var fechaActualFormato = new Date(fechaActual.getUTCFullYear(), fechaActual.getUTCMonth(), fechaActual.getUTCDate());
    
    // Obtener la fecha recibida en formato UTC sin la hora
    var fechaFormato = new Date(fecha.getFullYear(), fecha.getMonth(), fecha.getDate());
    
    // Verificar si la fecha recibida es válida y está después de la fecha actual
    if (fechaFormato >= fechaActualFormato) {
        return true;
    } else {
        return false;
    }
}









  function fecha_formato_sql(fecha){  
	var res = fecha.split("-");
	var dia = res[0];
	var mes = res[1];
	var ano = res[2];
	var mes_num = "0";
	switch (mes){
		case "Ene": mes_num = "01"; break;
		case "Feb": mes_num = "02"; break;
		case "Mar": mes_num = "03"; break;
		case "Abr": mes_num = "04"; break;
		case "May": mes_num = "05"; break;
		case "Jun": mes_num = "06"; break;
		case "Jul": mes_num = "07"; break;
		case "Ago": mes_num = "08"; break;
		case "Sep": mes_num = "09"; break;
		case "Oct": mes_num = "10"; break;
		case "Nov": mes_num = "11"; break;
		case "Dic": mes_num = "12"; break;
	}	
	var nueva_fecha = ano + "-" + mes_num + "-" + dia;
	return nueva_fecha;
}