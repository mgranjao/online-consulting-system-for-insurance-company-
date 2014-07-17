$(document).ready(function(){
	var url=$("#URL").val();
        
	$(window).load(function(){
		  $('#dvLoading').fadeOut(2000);
	});
	
	$('.login form input[type="submit"]').hover(function(event){
		$(this).addClass("hover");
	},function(event){
		$(this).removeClass("hover");
	});

/*Hovers para notas*/	
  	$('#botonlogin-1,#btn-note-1').hover(function(){
        $('#btn-note-1').css('background-position', '0px -110px');
    }, function(){
        $('#btn-note-1').css('background-position', '0px 0px');
    });
	$('#botonlogin-2,#btn-note-2').hover(function(){
        $('#btn-note-2').css('background-position', '0px -110px');
    }, function(){
        $('#btn-note-2').css('background-position', '0px 0px');
    });
	$('#botonlogin-3,#btn-note-3').hover(function(){
        $('#btn-note-3').css('background-position', '0px -110px');
    }, function(){
        $('#btn-note-3').css('background-position', '0px 0px');
    });
	$('#botonlogin-4,#btn-note-4').hover(function(){
        $('#btn-note-4').css('background-position', '0px -110px');
    }, function(){
        $('#btn-note-4').css('background-position', '0px 0px');
    });
	
	
	var botonaux=0;
	$(".botonlogin").click(function(event){
		
		id=this.id.split("-");
		id=id[1];
		
		if(botonaux==0){
			$("#login-"+id).fadeIn();
		}else{
			
			$("#login-"+botonaux).fadeOut(function(){
				$("#login-"+id).fadeIn();
			});
		}
		botonaux=id;
	});
	
	
	$(".solo-numero").keyup(function(){
			if ($(this).val() != '')
    			$(this).val($(this).attr('value').replace(/[^0-9.]/g, ""));
	 });
	
	
	$(".solo-numero").keyup(function(){
			if ($(this).val() != '')
    			$(this).val($(this).attr('value').replace(/[^0-9.]/g, ""));
	 });
		

	$(".solo-texto").keyup(function(){
		if ($(this).val() != '')
			$(this).val($(this).attr('value').replace(/[^A-Za-z.áéíóúñÁÉÍÓÚÑ ]/g, ""));
	});
	
	
	$('.formulario_crear .body_box .inside .box_chico .body_chico .inside input[type="submit"]').hover(function(){
		$(this).addClass("hover");
	},function(event){
		$(this).removeClass("hover");
	});
	
	
	$('.login form').validate();
	
	$('.login_admin').validate();
	
	$(".imagen-seguridad").click(function(event){
		
		id=this.id.split("-");
		id=id[1];
		
		for(i=1;i<=10;i++){
			$("#imagen-"+i).removeClass("seleccionada");
		}
		$(this).addClass("seleccionada");
		$("#imagen_seguridad").val(id);
	});
	
	//Valida solo numeros
        
        function validaSoloNumeros(numero) {
           if (!/^([0-9])*$/.test(numero))
             return false;
         else
             return true;
        }
        
        
        //Verifica Cedula Ecuador
        //
        
        function check_cedula( ced )
{
  var cedula = ced//form.cedula.value;
  array = cedula.split( "" );
  num = array.length;
  if ( num == 10 )
  {
    total = 0;
    digito = (array[9]*1);
    for( i=0; i < (num-1); i++ )
    {
      mult = 0;
      if ( ( i%2 ) != 0 ) {
        total = total + ( array[i] * 1 );
      }
      else
      {
        mult = array[i] * 2;
        if ( mult > 9 )
          total = total + ( mult - 9 );
        else
          total = total + mult;
      }
    }
    decena = total / 10;
    decena = Math.floor( decena );
    decena = ( decena + 1 ) * 10;
    finalced = ( decena - total );
    if ( ( finalced == 10 && digito == 0 ) || ( finalced == digito ) ) {
      //alert( "La c\xe9dula ES v\xe1lida!!!" );
      return true;
    }
    else
    {
      //alert( "La c\xe9dula NO es v\xe1lida!!!" );
      return false;
    }
  }
  else
  {
    //alert("La c\xe9dula no puede tener menos de 10 d\xedgitos");
    return false;
  }
}
        
	//Valida Personas
	
	
	$("#registrarse_persona").click(function(){
		 
		 error=0;
		 
		 primer_nombre=jQuery.trim($("#primer_nombre").val());
		 primer_apellido=jQuery.trim($("#primer_apellido").val());
		 tipo_de_documento=jQuery.trim($("#tipo_de_documento").val());
		 n_documento=jQuery.trim($("#n_documento").val());
		 email=jQuery.trim($("#email").val());
		 contrasena=jQuery.trim($("#contrasena").val());
		 verificar_contrasena=jQuery.trim($("#verificar_contrasena").val());
                 
                 calle_principal=jQuery.trim($("#calle_principal").val());
                 calle_secundaria=jQuery.trim($("#calle_secundaria").val());
                 numero_casa=jQuery.trim($("#numero_casa").val());
                 
                 telefono_convencional=jQuery.trim($("#telefono_convencional").val());
                 telefono_movil=jQuery.trim($("#telefono_movil").val());
                 $("#telefono_convencional").removeClass("error");
                 $("#telefono_movil").removeClass("error");
                 
		 $("#primer_nombre").removeClass("error");
		 $("#primer_apellido").removeClass("error");
		 $("#tipo_de_documento").removeClass("error");	
		 $("#n_documento").removeClass("error");
		 $("#email").removeClass("error");	
		 $("#email").removeClass("error");	
		 $("#contrasena").removeClass("error");	
                 $("#calle_principal").removeClass("error");
                 $("#calle_secundaria").removeClass("error");
                 $("#numero_casa").removeClass("error");
		 $("#verificar_contrasena").removeClass("error");	
		 $(".error_imagen").html("");
		 $(".error_condiciones").html("");


		 if(primer_nombre==""){
		 	$("#primer_nombre").addClass("error");
		 	error=1;	
		 }

		 if(primer_apellido==""){
		 	$("#primer_apellido").addClass("error");	
		 	error=1;
		 }

		if(tipo_de_documento==""){
		 	$("#tipo_de_documento").addClass("error");	
		 	error=1;
		 }

		 if(n_documento==""){
		 	$("#n_documento").addClass("error");
		 	error=1;	
		 }
                 if(check_cedula(n_documento)!=true){
		 	$("#n_documento").addClass("error");
		 	error=2;	
		 }

		if(email==""){
		 	$("#email").addClass("error");	
		 	error=1;
		 }
		if(validaSoloNumeros(telefono_convencional)!=true || telefono_convencional==""){
		 	$("#telefono_convencional").addClass("error");	
		 	error=3;
		 }
                 if(validaSoloNumeros(telefono_movil)!=true || telefono_movil==""){
		 	$("#telefono_movil").addClass("error");	
		 	error=3;
		 }
		
		if(calle_principal==""){
		 	$("#calle_principal").addClass("error");	
		 	error=1;
		 }
                 if(calle_secundaria==""){
		 	$("#calle_secundaria").addClass("error");	
		 	error=1;
		 }
                 if(numero_casa==""){
		 	$("#numero_casa").addClass("error");	
		 	error=1;
		 }
	

		 if($("#imagen_seguridad").val()=="0"){
		 	$(".error_imagen").html("Por favor elija una imagen para su seguridad");
		 	error=1;
		 }

		 if(!($("#condiciones").is(':checked'))) {  
		 	$(".error_condiciones").html("Por favor confirmar las condiciones de uso.");
		 	error=1;
		 }
		
		 if($("#var_valida_email").val()=="0"){
		 	error=1;
		 }
		if($("#var_valida_n_documento").val()=="0"){
		 	error=1;
		 }
		
		
		

					if($("#var_valida_contrasena").val()=="0"){
					 	error=1;
					 }

					if($("#var_valida_verificar_contrasena").val()=="0"){
					 	error=1;
					 }
					
					 if(contrasena==""){
					 	$("#contrasena").addClass("error");	
					 	error=1;
					 }

					 if(verificar_contrasena==""){
					 	$("#verificar_contrasena").addClass("error");	
					 	error=1;
					 }

		


	


		 if(error==1){
		 	    jAlert("Revisa los campos en verde, son campos obligatorios", "Equivida");  
		 }else{
		 	if(error==2){
		 	    jAlert("La c\xe9dula ingresada no es v\xe1lida", "Equivida");  
                        }else
                            {
                            if(error==3){
		 	    jAlert("Los telefonos deben ser numericos", "Equivida");  
                            }else{$(".default_form").submit();}
                            }
		 }

	});
	
	
	//Valida Empresas y Brokers
	
	
	
	$("#registrarse_empresa").click(function(){
		 
		 error=0;
		 
		 primer_nombre=jQuery.trim($("#primer_nombre").val());
		 primer_apellido=jQuery.trim($("#primer_apellido").val());
		 tipo_de_documento=jQuery.trim($("#tipo_de_documento").val());
		 n_documento=jQuery.trim($("#n_documento").val());
		 email=jQuery.trim($("#email").val());
		 contrasena=jQuery.trim($("#contrasena").val());
		 verificar_contrasena=jQuery.trim($("#verificar_contrasena").val());
		
		 telefono_convencional=jQuery.trim($("#telefono_convencional").val());
                 telefono_movil=jQuery.trim($("#telefono_movil").val());
                 $("#telefono_convencional").removeClass("error");
                 $("#telefono_movil").removeClass("error");
		

		 $("#primer_nombre").removeClass("error");
		 $("#primer_apellido").removeClass("error");
		 $("#tipo_de_documento").removeClass("error");	
		 $("#n_documento").removeClass("error");
		 $("#email").removeClass("error");	
		 $("#email").removeClass("error");	
		 $("#contrasena").removeClass("error");	
		 $("#verificar_contrasena").removeClass("error");	
		 $(".error_imagen").html("");
		 $(".error_condiciones").html("");

		 $("#nombre_de_la_empresa").removeClass("error");
 		 $("#razon_social").removeClass("error");
		 $("#ruc").removeClass("error");
		 $("#cargo").removeClass("error");

		 if(primer_nombre==""){
		 	$("#primer_nombre").addClass("error");
		 	error=1;	
		 }

		 if(primer_apellido==""){
		 	$("#primer_apellido").addClass("error");	
		 	error=1;
		 }

		if(tipo_de_documento==""){
		 	$("#tipo_de_documento").addClass("error");	
		 	error=1;
		 }

		 if(n_documento==""){
		 	$("#n_documento").addClass("error");
		 	error=1;	
		 }
                 if(check_cedula(n_documento)!=true){
		 	$("#n_documento").addClass("error");
		 	error=2;	
		 }

		if(email==""){
		 	$("#email").addClass("error");	
		 	error=1;
		 }
                 if(validaSoloNumeros(telefono_convencional)!=true || telefono_convencional==""){
		 	$("#telefono_convencional").addClass("error");	
		 	error=3;
		 }
                 if(validaSoloNumeros(telefono_movil)!=true || telefono_movil==""){
		 	$("#telefono_movil").addClass("error");	
		 	error=3;
		 }
                 
		
		
		
		
			
			nombre_de_la_empresa=jQuery.trim($("#nombre_de_la_empresa").val());
			razon_social=jQuery.trim($("#razon_social").val());
			ruc=jQuery.trim($("#ruc").val());
			cargo=jQuery.trim($("#cargo").val());
			
			
			if(nombre_de_la_empresa==""){
				$("#nombre_de_la_empresa").addClass("error");
				error=1;
			}
			
			if(razon_social==""){
				$("#razon_social").addClass("error");
				error=1;
			}
			
			if(ruc==""){
				$("#ruc").addClass("error");
				error=1;
			}
			
			if(cargo==""){
				$("#cargo").addClass("error");
				error=1;
			}
			
			
	
		

		 if($("#imagen_seguridad").val()=="0"){
		 	$(".error_imagen").html("Por favor elija una imagen para su seguridad");
		 	error=1;
		 }

		 if(!($("#condiciones").is(':checked'))) {  
		 	$(".error_condiciones").html("Por favor confirmar las condiciones de uso.");
		 	error=1;
		 }
		
		 if($("#var_valida_email").val()=="0"){
		 	error=1;
		 }
		if($("#var_valida_n_documento").val()=="0"){
		 	error=1;
		 }
		
		
		

			

			if($("#var_valida_ruc").val()=="0"){
			 	error=1;
			 }
		
		


	


		 if(error==1){
		 	    jAlert("Revisa los campos en verde, son campos obligatorios", "Equivida");  
		 }else{
		 	if(error==2){
		 	    jAlert("La c\xe9dula ingresada no es v\xe1lida", "Equivida");  
                        }else
                            {
                            if(error==3){
		 	    jAlert("Los telefonos deben ser numericos", "Equivida");  
                            }else{$(".default_form").submit();}
                            }	
		 }

	});
	
	
	//Valida Accionistas
	
	
	
	$("#registrarse_accionista").click(function(){
		 
		 error=0;
		 
		 primer_nombre=jQuery.trim($("#primer_nombre").val());
		 primer_apellido=jQuery.trim($("#primer_apellido").val());
		 tipo_de_documento=jQuery.trim($("#tipo_de_documento").val());
		 n_documento=jQuery.trim($("#n_documento").val());
		 email=jQuery.trim($("#email").val());
                 
                 telefono_convencional=jQuery.trim($("#telefono_convencional").val());
                 telefono_movil=jQuery.trim($("#telefono_movil").val());
                 $("#telefono_convencional").removeClass("error");
                 $("#telefono_movil").removeClass("error");
                 
		 $("#primer_nombre").removeClass("error");
		 $("#primer_apellido").removeClass("error");
		 $("#tipo_de_documento").removeClass("error");	
		 $("#n_documento").removeClass("error");
		 $("#email").removeClass("error");	
		 $("#email").removeClass("error");	
		 $(".error_imagen").html("");
		 $(".error_condiciones").html("");


		 if(primer_nombre==""){
		 	$("#primer_nombre").addClass("error");
		 	error=1;	
		 }

		 if(primer_apellido==""){
		 	$("#primer_apellido").addClass("error");	
		 	error=1;
		 }

		if(tipo_de_documento==""){
		 	$("#tipo_de_documento").addClass("error");	
		 	error=1;
		 }

		 if(n_documento==""){
		 	$("#n_documento").addClass("error");
		 	error=1;	
		 }
                 
                 if(check_cedula(n_documento)!=true){
		 	$("#n_documento").addClass("error");
		 	error=2;	
		 }

		if(email==""){
		 	$("#email").addClass("error");	
		 	error=1;
		 }
                 if(validaSoloNumeros(telefono_convencional)!=true || telefono_convencional==""){
		 	$("#telefono_convencional").addClass("error");	
		 	error=3;
		 }
                 if(validaSoloNumeros(telefono_movil)!=true || telefono_movil==""){
		 	$("#telefono_movil").addClass("error");	
		 	error=3;
		 }
		
		
		
	

		 if($("#imagen_seguridad").val()=="0"){
		 	$(".error_imagen").html("Por favor elija una imagen para su seguridad");
		 	error=1;
		 }

		 if(!($("#condiciones").is(':checked'))) {  
		 	$(".error_condiciones").html("Por favor confirmar las condiciones de uso.");
		 	error=1;
		 }
		
		 if($("#var_valida_email").val()=="0"){
		 	error=1;
		 }
		if($("#var_valida_n_documento").val()=="0"){
		 	error=1;
		 }
		
		
		 if(error==1){
		 	    jAlert("Revise los campos en verde, son campos obligatorios", "Equivida");  
		 }else{
		 	if(error==2){
		 	    jAlert("La c\xe9dula ingresada no es v\xe1lida", "Equivida");  
                        }else
                            {
                            if(error==3){
		 	    jAlert("Los telefonos deben ser numericos", "Equivida");  
                            }else{$(".default_form").submit();}
                            }
		 }

	});
	
	
	
	
	$("#telefono_convencional").change(function(event){
		telefono_convencional=jQuery.trim($("#telefono_convencional").val());
                                 
		$("#error_telefono_convencional").html('<p align="center"> <img src="'+url+'images/load.gif" width="16" height="16" alt="Load"> </p>');
                if(validaSoloNumeros(telefono_convencional)!=true || telefono_convencional==""){
		 	$("#error_telefono_convencional").html('<div class="email_error">Tel&eacute;fono debe ser num&eacute;rico</div>');
		 }
                 else
                  {$("#error_telefono_convencional").html('<div class="email_ok">Tel&eacute;fono correcto</div>');}
	});
        
        $("#telefono_movil").change(function(event){
		telefono_movil=jQuery.trim($("#telefono_movil").val());
                                 
		$("#error_telefono_movil").html('<p align="center"> <img src="'+url+'images/load.gif" width="16" height="16" alt="Load"> </p>');
                if(validaSoloNumeros(telefono_movil)!=true || telefono_movil==""){
		 	$("#error_telefono_movil").html('<div class="email_error">Tel&eacute;fono debe ser num&eacute;rico</div>');
		 }
                 else
                  {$("#error_telefono_movil").html('<div class="email_ok">Tel&eacute;fono correcto</div>');}
	});
	
	$("#email").change(function(event){
		
		$("#error_user").html('<p align="center"> <img src="'+url+'images/load.gif" width="16" height="16" alt="Load"> </p>');
		
		email=$(this).val();

		$.post(url+'controllers/ajax_controller.php', { email:email, action:'valid_email' },function(data){	
			switch(data){
				case "1":
					$("#error_user").html('<div class="email_ok">Usuario Disponible</div>');
					$("#var_valida_email").val("1");
				break;
				
				case "2":
					$("#error_user").html('<div class="email_error">Usuario No disponible</div>');
					$("#var_valida_email").val("0");
				break;
				
				case "3":
					$("#error_user").html('<div class="email_error">Email incorrecto</div>');
					$("#var_valida_email").val("0");
				break;
				
			}
			
		});
		
	});
	
	
	$("#n_documento").change(function(event){
		
		$("#error_cedula").html('<p align="center"> <img src="'+url+'images/load.gif" width="16" height="16" alt="Load"> </p>');
		
		cedula=$(this).val();
                tipo_usuario=$("#tipo_usuario").val();
                
                if(check_cedula(cedula)!=true)
                {
					$("#error_cedula").html('<div class="email_error"> Número de documento inválido </div>');
					$("#var_valida_n_documento").val("0");
                }
                else
		$.post(url+'controllers/ajax_controller.php', { cedula:cedula, tipo_usuario:tipo_usuario, action:'valid_cedula' },function(data){	
			
			switch(data){
				case "1":
					$("#error_cedula").html('<div class="email_ok">Número de documento Disponible</div>');
					$("#var_valida_n_documento").val("1");
				break;
				
				case "2":
					$("#error_cedula").html('<div class="email_error"> Número de documento no disponible</div>');
					$("#var_valida_n_documento").val("0");
				break;
				case "3":
					$("#error_cedula").html('<div class="email_error"> Número de documento inválido </div>');
					$("#var_valida_n_documento").val("0");
				break;
                               
			}
			
		});
		
	});
	
	
	$("#ruc").change(function(event){
		
		$("#error_ruc").html('<p align="center"> <img src="'+url+'images/load.gif" width="16" height="16" alt="Load"> </p>');
		
		ruc=$(this).val();

		$.post(url+'controllers/ajax_controller.php', { ruc:ruc, action:'valid_ruc' },function(data){	
			switch(data){
				case "1":
					$("#error_ruc").html('<div class="email_ok">RUC Disponible</div>');
					$("#var_valida_ruc").val("1");
				break;
				
				case "2":
					$("#error_ruc").html('<div class="email_error">RUC no disponible</div>');
					$("#var_valida_ruc").val("0");
				break;
				
				case "3":
				
					$("#error_ruc").html('<div class="email_error"> RUC inválido </div>');
					$("#var_valida_ruc").val("0");
					
				break;
			}
			
		});
		
	});
	
	
	
	
	$("#contrasena").change(function(event){
		
		$("#error_password").html('<p align="center"> <img src="'+url+'images/load.gif" width="16" height="16" alt="Load"> </p>');
		contrasena=$(this).val();
		$.post(url+'controllers/ajax_controller.php', { contrasena:contrasena, action:'valid_contrasena' },function(data){	
				switch(data){
					case "1":
						$("#error_password").html('<div class="email_ok">Contraseña Correcta</div>');
						$("#var_valida_contrasena").val("1");
					break;
					case "0":
						$("#error_password").html('<div class="email_error">Contraseña Invalida, debe tener letras y números</div>');
						$("#var_valida_contrasena").val("0");
					break;
				}
		});
		
	});
	

	$("#verificar_contrasena").change(function(event){

		$("#error_verificar_password").html('<p align="center"> <img src="'+url+'images/load.gif" width="16" height="16" alt="Load"> </p>');
		verificar_contrasena=$(this).val();
		contrasena=$("#contrasena").val();

		$.post(url+'controllers/ajax_controller.php', { contrasena:contrasena, verificar_contrasena:verificar_contrasena, action:'valid_verficar' },function(data){

				switch(data){
					case "1":
						$("#error_verificar_password").html('<div class="email_ok">Es igual a la contraseña</div>');
						$("#var_valida_verificar_contrasena").val("1");
					break;
					case "0":
						$("#error_verificar_password").html('<div class="email_error">Debe ser igual a la contraseña ingresada</div>');
						$("#var_valida_verificar_contrasena").val("0");
					break;
				}

		});


	});
	
	
	
	
	$("#nueva_contrasena").change(function(event){
		
		$("#error_password").html('<p align="center"> <img src="'+url+'images/load.gif" width="16" height="16" alt="Load"> </p>');
		contrasena=$(this).val();
		$.post(url+'controllers/ajax_controller.php', { contrasena:contrasena, action:'valid_contrasena' },function(data){	
				switch(data){
					case "1":
						$("#error_password").html('<div class="email_ok">Contraseña Correcta</div>');
						$("#var_valida").val("1");
					break;
					case "0":
						$("#error_password").html('<div class="email_error">Contraseña Invalida, debe tener letras y números</div>');
						$("#var_valida").val("");
					break;
				}
		});
		
	});
	
	
	
	$("#verificar_nueva_contrasena").change(function(event){

		$("#error_verificar_password").html('<p align="center"> <img src="'+url+'images/load.gif" width="16" height="16" alt="Load"> </p>');
		verificar_contrasena=$(this).val();
		contrasena=$("#nueva_contrasena").val();

		$.post(url+'controllers/ajax_controller.php', { contrasena:contrasena, verificar_contrasena:verificar_contrasena, action:'valid_verficar' },function(data){

				switch(data){
					case "1":
						$("#error_verificar_password").html('<div class="email_ok">Es igual a la contraseña</div>');
						$("#var_valida").val("1");
					break;
					case "0":
						$("#error_verificar_password").html('<div class="email_error">Debe ser igual a la contraseña ingresada</div>');
						$("#var_valida").val("");
					break;
				}

		});


	});
	
	

	
	$('.form_forget').validate();
	
	$(".form_acceso").validate({
			rules: {
				var_valida:{
					required: true
				},
				nueva_contrasena:{
					required: true,
					minlength: 8
				},
				verificar_contrasena: {
					required: true,
					minlength: 8,
					equalTo: "#nueva_contrasena"
				}
			},
			messages: {
					var_valida:"Ingrese la nueva contraseña",
					nueva_contrasena:"Ingrese la nueva contraseña",
					verificar_contrasena:"Vuelva a escribir la contraseña nueva"
			}
	});
	
	
	
	
	
	$(".box").colorbox({inline:true, href:"#box",
	onOpen:function(){ 
		$('a.cerrar').click(function(event){
			parent.$.fn.colorbox.close();
		});
	}});
	
	$(".telefono").mask("(09)999-9999");
	$(".celular").mask("(09)999-9999");
	
});