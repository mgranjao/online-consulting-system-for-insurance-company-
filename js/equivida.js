$(document).ready(function(){
	var url=$("#URL").val();
        
	$(window).load(function(){
                  
                  
                  if(String($("#hddControlador").val()) == String("empresas"))
                  cargar_polizas_empresa();
                  if(String($("#hddControlador").val()) == String("personas"))
                  cargar_polizas_persona();
                  
                  
              
                  var valor = $("#poliza").val();
                  if(valor == null){
                   $('#select_empresa').html("Cargando pólizas...");
                   $('#select_persona').html("Cargando pólizas...");
                  }
		  $('#dvLoading').fadeOut(1000);
                   
                  
              }             
      );



function cargar_polizas_empresa(){
    var poliza = $("#poliza").val();
   
    $.post(url+'controllers/ajax_controller.php', { poliza:poliza, action:'cargar_index_empresas' },function(data){
            $("#view_data_poliza").html(data);
		});
    
    $.post(url+'controllers/ajax_controller.php', { poliza:poliza, action:'cargar_select_empresas' },function(data){
           $("#select_empresa").html(data);
            
             var valor = $("#poliza").val();
                  if(valor == null){
                     $('#insidePoliza').html("No se han cargado pólizas.");
                  }
		}); 
}
function cargar_polizas_persona(){
    var poliza = $("#poliza").val();
   
    $.post(url+'controllers/ajax_controller.php', { poliza:poliza, action:'cargar_index_personas' },function(data_poliza){
            
            $.post(url+'controllers/ajax_controller.php', { poliza:poliza, action:'valida_estado_de_cuenta_personas' },function(data){
           if (data==1){
               $("#menu_persona").load('personas_controller/menu');//"getLatestData.php");
               $("#view_data_poliza").html(data_poliza);
        }
		});
                
            
             $.post(url+'controllers/ajax_controller.php', { poliza:poliza, action:'variables_globales' },function(data){
           //Quita las polozas colectivas de la lista
		});
                
		});
                
    
                
    $.post(url+'controllers/ajax_controller.php', { poliza:poliza, action:'cargar_select_empresas' },function(data){
           $("#select_persona").html(data);
            
             var valor = $("#poliza").val();
                  if(valor == null){
                     $('#insidePoliza').html("No se han cargado pólizas.");
                  }
		}); 
}


	$('.page .body .right .inside .data .formulario form input[type="submit"]').hover(function(){
		$(this).addClass("hover");
	},function(){
		$(this).removeClass("hover");
	});
	
	$('#datatable').dataTable({
	                "bSort": false
	});

	$('#datatable_estadodecuenta').dataTable({
        "aaSorting": [[ 0, "desc" ]]
    });


	$('#datatable_clientes').dataTable({
        "aaSorting": [[ 0, "asc" ]]
    });
	
        
	$('#datatable_liberadas').dataTable({
        "aaSorting": [[ 1, "asc" ]]
       });
	
        $('#datatable_pagadas').dataTable({
        "aaSorting": [[ 0, "asc" ]]
       });
        
        
	$(".view-data p:odd").addClass("impar");
	
	
	var boton_aux=0;
	
/*	$(".botonmenu").click(function(event){*/
        $('body').on('click', 'a.botonmenu', function() {
		id=this.id.split("-");
		id=id[1];
		
		if(boton_aux!=id){
		
			if(boton_aux==0){
				$("#submenu-"+id).slideDown("fast");
			}else{
				$("#submenu-"+id).slideDown("fast");
				$("#submenu-"+boton_aux).slideUp("fast");
			}
		
		}
		
		boton_aux=id;
	});
	
	
	$(".form_acceso").validate({
			rules: {
				email:{
					required: true,
					email: true
				},
				contrasena:{
					required: true,
					minlength: 8
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
					email:"Ingrese un correo electrónico válido ",
					contrasena:"Ingrese contraseña actual",
					nueva_contrasena:"Ingrese la nueva contraseña",
					verificar_contrasena:"Vuelva a escribir la contraseña nueva"
			}
	});
	
	
	
	
	
	
	$("#email").change(function(event){
		
		email=$(this).val();
		var_valida_editar_email=jQuery.trim($("#var_valida_editar_email").val());

		if((var_valida_editar_email=="")||(var_valida_editar_email!=email)){

		$("#error_user").html('<p align="center"> <img src="'+url+'images/load.gif" width="16" height="16" alt="Load"> </p>');
		
		

		$.post(url+'controllers/ajax_controller.php', { email:email, action:'valid_email' },function(data){	
			switch(data){
				case "1":
					$("#error_user").html('<div class="email_ok">Usuario Disponible</div>');
					$("#var_valida_email").val("1");
				break;
				
				case "2":
					$("#email").addClass("error");
					$("#error_user").html('<div class="email_error">Usuario No disponible</div>');
					$("#var_valida_email").val("0");
				break;
				
				case "3":
					$("#email").addClass("error");
					$("#error_user").html('<div class="email_error">Email incorrecto</div>');
					$("#var_valida_email").val("0");
				break;
				
			}
			
		});

		}
		
	});
	
 /***************************************************************/
	 
        $(function() {
    //Extends JQuery Methods to get current cursor postion in input text.
    //GET CURSOR POSITION
    jQuery.fn.getCursorPosition = function() {
        if (this.lengh == 0) return -1;
        return $(this).getSelectionStart();
    }

    jQuery.fn.getSelectionStart = function() {
        if (this.lengh == 0) return -1;
        input = this[0];

        var pos = input.value.length;

        if (input.createTextRange) {
            var r = document.selection.createRange().duplicate();
            r.moveEnd('character', input.value.length);
            if (r.text == '') pos = input.value.length;
            pos = input.value.lastIndexOf(r.text);
        } else if (typeof(input.selectionStart) != "undefined") pos = input.selectionStart;

        return pos;
    }

  //Iguala en vacio a los campos escondidos si los visuales estan vacios
    $("#contrasenav").bind('input', function() {
           if($("#contrasenav").val()=="")
           $("#contrasena").val("");
    });
    
    $("#verificar_contrasenav").bind('input', function() {
           if($("#verificar_contrasenav").val()=="")
           $("#verificar_contrasena").val("");
    });
    
  //Bind Key Press event with password field    
      $("#contrasenav").keypress(function(e) {
        setTimeout(function() {
            maskPassword(e)
        }, 500);
    }).on('keydown', function(e) {
   if (e.keyCode==8 || e.keyCode==46)
    { 
	maskPassword(e);
     }
 });

//Bind Key Press event with password field    
      $("#verificar_contrasenav").keypress(function(e) {
        setTimeout(function() {
            maskPasswordvc(e)
        }, 500);
    }).on('keydown', function(e) {
   if (e.keyCode==8 || e.keyCode==46)
    { 
	maskPasswordvc(e);
     }
 });

});


function generateStars(n) {
    var stars = '';
    for (var i = 0; i < n; i++) {
        stars += '\u25CF'//stars += '*';
    }
    return stars;
}

function maskPassword(e) {

    var text = $('#contrasena').val();//.trim();
    var stars = $('#contrasena').val().length;//.trim().length;
    var unicode = e.keyCode ? e.keyCode : e.charCode;
    $("#keycode").html(unicode);

    //Get Current Cursor Position on Password Textbox
    var curPos = $("#contrasenav").getCursorPosition();
    var PwdLength = $("#contrasenav").val().trim().length;

    if (unicode != 9 && unicode != 13 && unicode != 37 && unicode != 40 && unicode != 37 && unicode != 39) {
        //If NOT <Back Space> OR <DEL> Then...
        if (unicode != 8 && unicode != 46) {
            text = text + String.fromCharCode(unicode);
            stars += 1;
        }
        //If Press <Back Space> Or <DEL> Then...
        else if ((unicode == 8 || unicode == 46) && stars != PwdLength) {
            stars -= 1;
            text = text.replace(text.charAt(curPos), "");
        }else{
	   // stars -= 1;	    
            text = text.replace(text.charAt(curPos-1), "");
	}
        //Set New String on both input fields
        $('#contrasena').val(text);
        $('#contrasenav').val(generateStars(stars));
    }

}



function maskPasswordvc(e) {

    var text = $('#verificar_contrasena').val();//.trim();
    var stars = $('#verificar_contrasena').val().length;//.trim().length;
    var unicode = e.keyCode ? e.keyCode : e.charCode;
    $("#keycode").html(unicode);

    //Get Current Cursor Position on Password Textbox
    var curPos = $("#verificar_contrasenav").getCursorPosition();
    var PwdLength = $("#verificar_contrasenav").val().trim().length;

    if (unicode != 9 && unicode != 13 && unicode != 37 && unicode != 40 && unicode != 37 && unicode != 39) {
        //If NOT <Back Space> OR <DEL> Then...
        if (unicode != 8 && unicode != 46) {
            text = text + String.fromCharCode(unicode);
            stars += 1;
        }
        //If Press <Back Space> Or <DEL> Then...
        else if ((unicode == 8 || unicode == 46) && stars != PwdLength) {
            stars -= 1;
            text = text.replace(text.charAt(curPos), "");
        }else{
	   // stars -= 1;	    
            text = text.replace(text.charAt(curPos-1), "");
	}
        //Set New String on both input fields
        $('#verificar_contrasena').val(text);
        $('#verificar_contrasenav').val(generateStars(stars));
    }

}
 /********************************************************************************/	
	
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
						$("#contrasena").addClass("0");
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
						$("#verificar_contrasena").addClass("0");
						$("#error_verificar_password").html('<div class="email_error">Debe ser igual a la contraseña ingresada</div>');
						$("#var_valida_verificar_contrasena").val("0");
					break;
				}

		});


	});
	
	var contrasena_generada="0";
	
	$(".form_acceso_2").submit(function(){
		
		$("#contrasena").trigger("change");
		$("#verificar_contrasena").trigger("change");
		
		error=0;
		
		nombre_completo=jQuery.trim($("#nombre_completo").val());
		email=jQuery.trim($("#email").val());
		contrasena=jQuery.trim($("#contrasena").val());
		verificar_contrasena=jQuery.trim($("#verificar_contrasena").val());
		var_valida_email=jQuery.trim($("#var_valida_email").val());
		var_valida_contrasena=jQuery.trim($("#var_valida_contrasena").val());
		var_valida_verificar_contrasena=jQuery.trim($("#var_valida_verificar_contrasena").val());
		var_valida_editar_contrasena=jQuery.trim($("#var_valida_editar_contrasena").val());
		var_valida_editar_email=jQuery.trim($("#var_valida_editar_email").val());
		tipo_usuario=jQuery.trim($("#tipo_usuario").val());


		if(contrasena==verificar_contrasena){
				var_valida_verificar_contrasena=1;
		}

		if(tipo_usuario!="admin"){
			if(nombre_completo==""){
				error=1;
				$("#nombre_completo").addClass("error");
			}
		}
		
		if(tipo_usuario=="admin"){
			contrasena_actual=jQuery.trim($("#contrasena_actual").val());

			if(contrasena_actual==""){
				error=1;
				$("#contrasena_actual").addClass("error");
			}

		}

		if((var_valida_editar_email=="")||(var_valida_editar_email!=email)){

		if(email==""){
			error=1;
			$("#email").addClass("error");
		}
		
		if(var_valida_email=="0"){
			error=1;
			$("#email").addClass("error");
		}

		}
		

		if((var_valida_editar_contrasena=="1")&&(contrasena_generada=="0")){

			if(contrasena==""){
				error=1;
				$("#contrasena").addClass("error");
			}
		
			if(verificar_contrasena==""){
				error=1;
				$("#verificar_contrasena").addClass("error");
			}
		
			if(var_valida_contrasena=="0"){
				error=1;
				$("#contrasena").addClass("error");
			}
		
			if(var_valida_verificar_contrasena=="0"){
				error=1;
				$("#verificar_contrasena").addClass("error");
			}


		}


		if(error==0){
			return true;
		}else{
			return false;
		}

	
	});
   	
	$(".error").live("keyup", function(){ 
		$(this).removeClass("error");
	});

	$("#actualizar_password").click(function(event){

		if ($("#ver_campos_contrasena").is(":hidden")) {
			$("#ver_campos_contrasena").show();

			$("#var_valida_editar_contrasena").val("1");

		}else{
			$("#ver_campos_contrasena").hide();
			$("#var_valida_editar_contrasena").val("0");			
		}

	});

	$(".usuario_generar_contraseña").click(function(){
		
		$.post(url+'controllers/ajax_controller.php', { action:"generar_password_text" },function(data){	
				
				$("#contrasena").val(data);
				$("#verificar_contrasena").val(data);

                                var stars = data.length;
                                $("#contrasenav").val(generateStars(stars));
                                $("#verificar_contrasenav").val(generateStars(stars));
                                
				$("#texto_password_generado").html("La contraseña generada es: <b>"+data+"</b>");
				$("#texto_password_generado").show();	
				contrasena_generada="1";	
				//Trigger	
				$("#contrasena").trigger("change");
				$("#verificar_contrasena").trigger("change");
		});

		return false;
	});
	
	
	$(".page .body .right .inside .data .formulario  p:odd").addClass("impar");
	
	
	//$(".form_valida").validate();

	$("#form_email").validate();
	
	$("#form_telefonos").validate();
	
	$("#form_actualiza").validate();
	
	
	$(".box").colorbox({inline:true, href:"#box",
	onOpen:function(){ 
		$('a.cerrar').click(function(event){
			parent.$.fn.colorbox.close();
		});
	}});
	

	$(".box_2").colorbox({inline:true, href:"#box_2",
	onOpen:function(){ 
		$('a.cerrar').click(function(event){
			parent.$.fn.colorbox.close();
		});
	}});


	$(".box_3").colorbox({inline:true, href:"#box_3",
	onOpen:function(){ 
		$('a.cerrar').click(function(event){
			parent.$.fn.colorbox.close();
		});
	}});
	
	
	$(".box_4").colorbox({inline:true, href:"#box_4",
	onOpen:function(){ 
		$('a.cerrar').click(function(event){
			parent.$.fn.colorbox.close();
		});
	}});
	
	
	

	$(".beneficiarios").colorbox({inline:true, href:"#box",
	onOpen:function(){ 
		$('a.cerrar').click(function(event){
			parent.$.fn.colorbox.close();
		});

		id=this.id.split("-"); 
		id=id[1];

		$("#ajax_tabla").html('<br><br><br><br><p align="center"><img src="'+url+'images/loading_ajax.gif" /></p>');	

		$.post(url+'controllers/ajax_controller.php', { action:"beneficiarios", code:id },function(data){	
			$("#ajax_tabla").html(data);			
		});

		

	}});	

	$(".beneficiarios2").colorbox({inline:true, href:"#box",
	onOpen:function(){ 
		$('a.cerrar').click(function(event){
			parent.$.fn.colorbox.close();
		});

		id=this.id.split("-"); 
		id=id[1];

		$("#ajax_tabla").html('<br><br><br><br><p align="center"><img src="'+url+'images/loading_ajax.gif" /></p>');	

		$.post(url+'controllers/ajax_controller.php', { action:"beneficiarios2", code:id },function(data){	
			$("#ajax_tabla").html(data);			
		});

		

	}});	









	$(".datepicker").datepicker({
		 	changeMonth: true,
			changeYear: true,
			dateFormat: 'yy-mm-dd'
	});
	
	
	d = new Date();
	
	
	$(".datepicker_fact").datepicker({
			minDate: new Date(d.getFullYear()-1, d.getMonth()-1 , 1),
			maxDate: new Date(d.getFullYear(), d.getMonth() , d.getDate()),
		 	changeMonth: true,
			changeYear: true,
			dateFormat: 'yy-mm-dd'
	});
	
	




	$("#cliente").change(function(event){
			/*
			nombre_cliente=$("#nombre_cliente").val();
			alert(nombre_cliente);
			$("#cliente").val(""+nombre_cliente+"");
			//alert($("#cliente").val());
			*/
			/*
			$('#dvLoading').fadeIn(2000);
			
			valor=$(this).val();
			
			$("#poliza_cliente").removeOption(/./);
			$("#poliza_cliente").addOption("#","Cargando Pólizas..."); 

			if(valor!=""){

				$.post('controllers/ajax_controller.php', { id:valor, action:'polizas_cliente' },function(data){	


				
					$("#poliza_cliente").removeOption(/./);
					datos=data.split(";");

					if(data!=""){
							//$("#poliza_cliente").addOption("#","Seleccione la póliza"); 
							for (var i=0; i<=datos.length-2;i++){
									poner=datos[i].split("|");
									$("#poliza_cliente").addOption(poner[0],poner[1]); 
							}
					}else{
							$("#poliza_cliente").addOption("#","No tiene pólizas");
					}

					$("#poliza_cliente").val("#");
					 $('#dvLoading').fadeOut(2000);

			});

			}
			*/

	});
	
	
	
	/*
	var borrar_buscar_cliente=0;
	
	$("#buscar_cliente").click(function(event){
		
		if(borrar_buscar_cliente==0){
			$("#buscar_cliente").val("");
		}
		borrar_buscar_cliente++;
	});
	
	
	$("#buscar_poliza").click(function(event){
		

		
		buscar_cliente=jQuery.trim($("#buscar_cliente").val());
		
		
		if(buscar_cliente!=""){
			
			
			$('#dvLoading').fadeIn(2000);
			$("#ver_polizas_cliente").hide();
			
			$("#poliza_cliente").removeOption(/./);
			$("#poliza_cliente").addOption("#","Cargando Pólizas...");
			
			
			$.post('controllers/ajax_controller.php', { buscar_cliente:buscar_cliente, action:'polizas_cliente_nombre' },function(data){	
				//alert(data);
				$("#ver_polizas_cliente").show();
				
				
				$("#poliza_cliente").removeOption(/./);
				datos=data.split(";");
				poner_primero="";
				if(data!=""){
						//$("#poliza_cliente").addOption("#","Seleccione la póliza"); 
						for (var i=0; i<datos.length;i++){
								poner=datos[i].split("|");
								if(i==0){
									poner_primero=poner[0];
								}
								
								$("#poliza_cliente").addOption(poner[0],poner[1]); 
						}
				}else{
						$("#poliza_cliente").addOption("#","No tiene pólizas");
				}

				$("#poliza_cliente").val(poner_primero);
				$('#dvLoading').fadeOut(2000);	
				

		});

		}else{
			$("#buscar_cliente").addClass("error");
			jAlert("Revisar campos en rojo, campo obligatorio", "Equivida");  
		}
		
		
		
	});
	*/
	
	
	$(".donde_envio").click(function(event){
		
		if($(this).val()=="email"){
			
			if($("#vista_direccion").is(":hidden")) {
				$("#vista_email").fadeIn();
			}else{
				$("#vista_direccion").fadeOut();
				$("#vista_email").fadeIn();
			}
				
		}else{
			
			if($("#vista_email").is(":hidden")) {
				$("#vista_direccion").fadeIn();
			}else{
				$("#vista_email").fadeOut();
				$("#vista_direccion").fadeIn();
			}
			
			
			
		}
		
	});
	
	
	var url_aux="";
	$("a.eliminar").click(function(event){
		url_aux=this.href;
		jConfirm(this.title, 'Dialogo de Confirmacion', function(r) {
			if(r==true){
				location.href=url_aux;
			}
		});
		return false;
	});
	
	
	$('abbr.verinfo').tooltip({
		track: true,
		delay: 0,
		showURL: false,
		showBody: " - ",
		fade: 250
	});
	
	
	$("#valor_a_retirar").keyup(function(event){
		monto_a_retirar=$("#monto_a_retirar").val();
		valor_a_retirar=$("#valor_a_retirar").val();
		monto_a_retirar=parseFloat(monto_a_retirar);
		valor_a_retirar=parseFloat(valor_a_retirar);
		if(valor_a_retirar>monto_a_retirar){
			$(".error_valor_mas").html("El valor no puede ser mayor al monto");
			$("#valor_a_retirar").addClass("error");
                        $("#bandera_imprimir").val("0");
		}
		
		if(valor_a_retirar<=monto_a_retirar){
			$(".error_valor_mas").html("");
			$("#valor_a_retirar").removeClass("error");
                        $("#valor_a_retirar_imprimir").val(valor_a_retirar);
                        $("#bandera_imprimir").val("1");
		}
		
	});
	
	
	$("#valor_a_prestar").keyup(function(event){
			monto_a_prestar=$("#monto_a_prestar").val();
			valor_a_prestar=$("#valor_a_prestar").val();

			monto_a_prestar=parseFloat(monto_a_prestar);
			valor_a_prestar=parseFloat(valor_a_prestar);

			if(valor_a_prestar>monto_a_prestar){
				$(".error_valor_mas").html("El valor no puede ser mayor al monto");
				$("#valor_a_prestar").addClass("error");
			}

			if(valor_a_prestar<=monto_a_prestar){
				$(".error_valor_mas").html("");
				$("#valor_a_prestar").removeClass("error");
			}
	});
	
	
        $("#imprimir_solicitud_retiro").click(function(){//validar_polizas
         error=0;
         if($("#valor_a_retirar_imprimir").val()=="0"){
                //error=1;
                //html+="<li>El valor no puede ser 0</li>";
                //alert("El valor no puede ser 0");
            }
            
         if($("#bandera_imprimir").val()==0){
                error=1; 
             }
             
        if(error==1)
        {
            //$("#div_error_polizas_colectivas").html(html);
            alert("El valor no puede ser 0 ó mayor al monto");
            return false;  
        }
         
    });

	
	$(".solo-numero").keyup(function(){
			if ($(this).val() != '')
    			$(this).val($(this).attr('value').replace(/[^0-9.]/g, ""));
	 });
		
	$(".solo-entero").live("keyup",function(){
		if ($(this).val() != '')
			$(this).val($(this).attr('value').replace(/[^0-9]/g, ""));
	});

	$(".solo-texto").keyup(function(){
		if ($(this).val() != '')
			$(this).val($(this).attr('value').replace(/[^A-Za-z.áéíóúñÁÉÍÓÚÑ ]/g, ""));
	});
	
	$(".generar_certificado").click(function(){

		identificacion=$("input[name='seleccionado']:checked").val();
                
                dirigido_a=jQuery.trim($("#dirigido_a").val());
		
                ciudad=jQuery.trim($("#ciudad").val());
                
		error=0;
		
		if(dirigido_a=="-1"){//-1 para que no valide el campo el cual fue comentado en la vista
			error=1;
			$("#dirigido_a").addClass("error");
			$(".error_dirigida_a").html("Ingrese los nombres de la persona que va dirigido");
		}

		/*if(ciudad==""){
			error=1;
			$("#ciudad").addClass("error");
			$(".error_ciudad").html("Ingrese la ciudad para generar certificado");
		}*/
                
               
		if(error==0){
                        if(identificacion){
                            document.cookie='error=0';
                            if(check_cedula(jQuery.trim(identificacion))!=true){
                                document.cookie='error=1';
                                window.location.reload();  
                            }else{
                                document.cookie='error=0';
                                $("form#certificado_individual").submit();
                            }
                            
                        }else{
                            alert('Seleccione un Beneficiario.','Equivida');
                        }
                       
				
		}
	
	});
       

	$("#dirigido_a").keyup(function(event){
		$("#dirigido_a").removeClass("error");
		$(".error_dirigida_a").html("");
	});

	$("#ciudad").keyup(function(event){
		$("#ciudad").removeClass("error");
		$(".error_ciudad").html("");
	});

	
	//$(".telefono").mask("(09)9999999");
        $("#telefono_contacto").validCampoFranz('0123456789');
	$(".celular").mask("(09)999-99999");
	
	$(".click_box").click(function(event){

		id=this.id.split("-");
		id=id[1];
		if ($("#tabview-"+id).is(":hidden")) {
		$("#tabview-"+id).slideDown("slow");
		} else {
		$("#tabview-"+id).hide();
		}
	});
	
	
	
	
	
	
	$(".ver_ano").click(function(event){
		id=this.id.split("-");
		id=id[1];
		if ($("#tabano-"+id).is(":hidden")) {
		$("#tabano-"+id).slideDown("slow");
		} else {
		$("#tabano-"+id).hide();
		}
		
	});


        $(".mes").click(function(event){
		id=this.id.split("-");
		id=id[1];
		if ($("#tabmes-"+id).is(":hidden")) {
		$("#tabmes-"+id).slideDown("slow");
		} else {
		$("#tabmes-"+id).hide();
		}

		
	});
	
        $(".cerrar_tabmes").click(function(event){
		id=this.id.split("-");
		id=id[1];
		$("#tabmes-"+id).hide();
	});
        
	$(".cerrar_tab").click(function(event){
		id=this.id.split("-");
		id=id[1];
		$("#tabano-"+id).hide();
	});
	
	$(".politicamontoyplazo").click(function(event){
		if ($("#montoyplazos").is(":hidden")) {
		$("#montoyplazos").slideDown("slow");
		} else {
		$("#montoyplazos").hide();
		}	
	});


	$("a.cerrar_mensaje").click(function(event){
		$("#bg_enviado").fadeOut();
	});
	
	//Listado Clientes
	
	$(".info_cliente").hover(function(event){
		$(this).addClass("active");
	},function(event){
		$(this).removeClass("active");
	});
	
	$(".vermas").click(function(event){
		pagina=$("#pagina").val();
		
		$(".vermas").html("Cargando<blink>......</blink>");
		
		$.post(url+'controllers/ajax_controller.php', { pagina:pagina, action:'brokers_mas_clientes' },function(data){	
			
			if(jQuery.trim(data)!=""){
				$(".ver_clientes_brokers").append(data);
				$(".vermas").html("Ver más Clientes");
			}else{
				$(".vermas").html("Ya se desplegaron todo el listado de clientes");
			}
		});
		pagina++;
		$("#pagina").val(pagina);
		return false;
	});
	
	
	$(".page .body .right .inside .data .buscador input[type=button]").hover(function(event){
		$(this).addClass("hover");
	},function(event){
		$(this).removeClass("hover");
	});
	
	$("#buscar_broker").click(function(){
		texto=$("#buscar_texto_broker").val();
		$(".vermas").fadeOut();
		$(".ver_clientes_brokers").html('<br><br><br><br><p align="center"><img src="'+url+'images/loading_ajax.gif" /></p>');
		
		$.post(url+'controllers/ajax_controller.php', { buscar:texto, action:'buscar_cliente_broker' },function(data){	
			$(".ver_clientes_brokers").html(data);	
		});
		
		
	});
    
    
    
    
    /***********Contacto*****************/
	
    //Validar tipo de Archivo

    var hash = {
    '.xls'  : 1,
    '.xlsx' : 1,
    '.doc' : 1,
    '.docx' : 1,
    '.pdf' : 1
    };

function check_extension(filename,submitId) {
      var re = /\..+$/;
      var ext = filename.match(re);
      var submitEl = document.getElementById(submitId);
      
      if (hash[ext]) {
        submitEl.disabled = false;
        return true;
      } else {
        alert("Archivo Invalido, seleccione otro archivo");
        submitEl.disabled = true;
        document.getElementById("error_archivo").style.display='none';
        return false;
      }
}
  
function limpiar(submitId)	{
    
	f = document.getElementById(submitId);
	nuevoFile = document.createElement("input");
	nuevoFile.id = f.id;
	nuevoFile.type = "file";
	nuevoFile.name = "archivo";
	nuevoFile.value = "";
	nuevoFile.onchange = f.onchange;
	nodoPadre = f.parentNode;
	nodoSiguiente = f.nextSibling;
	nodoPadre.removeChild(f);
	(nodoSiguiente == null) ? nodoPadre.appendChild(nuevoFile):
		nodoPadre.insertBefore(nuevoFile, nodoSiguiente);
}  
      
      $("#subirArchivo").change(function(event){
         check_extension(this.value,"upload");
	});
        
    
//Validar archivos que pueden subir desde el formulario de sinietro    
    var hash2 = {
    '.xls'  : 1,
    '.xlsx' : 1,
    '.doc' : 1,
    '.docx' : 1,
    '.pdf' : 1,
    '.png' : 1,
    '.bmp' : 1,
    '.jpg' : 1,
    '.jpeg' : 1,
    '.gif' : 1
    };

function check_extension_siniestro(filename,submitId) {
      var re = /\..+$/;
      var ext = filename.match(re);
      var submitEl = document.getElementById(submitId);
      
      if (hash2[ext]) {
        submitEl.disabled = false;
        return true;
      } else {
        alert("Archivo Invalido, seleccione otro archivo");
        submitEl.disabled = true;
        document.getElementById("error_archivo").style.display='none';
        return false;
      }
}

$("#subirArchivoSiniestro").change(function(event){
         check_extension_siniestro(this.value,"upload");
	});
        
$("#sendDatos").click(function(){
    error=0;
        if($("#tipo_usuario").val()=="2" || $("#tipo_usuario").val()=="3"){
            if(jQuery.trim($("#razonSocialTxt").val())==""){
                $("#razonSocialTxt").addClass("error");
                error=1;	
            }
            if(jQuery.trim($("#razonSocialTxt").val()).length > 30){
                $("#razonSocialTxt").addClass("error");
                error=2;	
            }
            
            if(jQuery.trim($("#emailTxt").val())==""){
                $("#emailTxt").addClass("error");
                error=1;	
            }
            if(jQuery.trim($("#rucTxt").val())==""){
                $("#rucTxt").addClass("error");
                error=1;	
            }
            
            if(validaSoloNumeros(jQuery.trim($("#rucTxt").val()))!=true){
                $("#rucTxt").addClass("error");
                error=3;	
            }
            if(jQuery.trim($("#rucTxt").val()).length>13){
                $("#rucTxt").addClass("error");
                error=4;	
            }
            if(error==1){
                alert("Revisa los campos en verde, son campos obligatorios");  
            }else if(error==2){
                alert("La Raz\u00F3n social puede tener un m\u00E1ximo de 30 caracteres");  
            }else if(error==3){
                alert("El RUC s\u00F3lo puede tener n\u00FAmeros");  
            }else if(error==4){
                alert("El RUC puede tener un m\u00E1ximo de 13 caracteres");  
            }else{
                $(".form_valida").submit();
                //alert("aaa");
            }
              
            
        } else{
            if(validaSoloLetras(jQuery.trim($("#apellidoPaternoTxt").val()))!=true){
                $("#apellidoPaternoTxt").addClass("error");
                error=7;	
            }
            if(validaSoloLetras(jQuery.trim($("#apellidoMaternoTxt").val()))!=true){
                $("#apellidoMaternoTxt").addClass("error");
                error=7;	
            } 
            if(validaSoloLetras(jQuery.trim($("#primerNombreTxt").val()))!=true){
                $("#primerNombreTxt").addClass("error");
                error=7;	
            } 
            if(validaSoloLetras(jQuery.trim($("#segundoNombreTxt").val()))!=true){
                $("#segundoNombreTxt").addClass("error");
                error=7;	
            } 
            
            if(jQuery.trim($("#apellidoPaternoTxt").val()).length>30){
                $("#apellidoPaternoTxt").addClass("error");
                error=2;	
            }
            if(jQuery.trim($("#apellidoMaternoTxt").val()).length>30){
                $("#apellidoMaternoTxt").addClass("error");
                error=2;	
            }
            if(jQuery.trim($("#primerNombreTxt").val()).length>30){
                $("#primerNombreTxt").addClass("error");
                error=2;	
            }
            if(jQuery.trim($("#segundoNombreTxt").val()).length>30){
                $("#segundoNombreTxt").addClass("error");
                error=2;	
            }
            if(jQuery.trim($("#emailTxt").val())==""){
                $("#emailTxt").addClass("error");
                error=1;	
            }
            
            if(jQuery.trim($("#cedulaTxt").val())==""){
                $("#cedulaTxt").addClass("error");
                error=1;	
            }
            if($("#tipoDocumentoTxt").val()=="C")
            {
                if(check_cedula(jQuery.trim($("#cedulaTxt").val()))!=true){
                    $("#cedulaTxt").addClass("error");
                    error=4;	
                }
            }else{
                if(validaSoloNumeros(jQuery.trim($("#cedulaTxt").val()))!=true){
                 $("#cedulaTxt").addClass("error");
                 error=3;	
                } 
            }
            if(jQuery.trim($("#n_contactoTxt").val())==""){
                $("#n_contactoTxt").addClass("error");
                error=1;	
            }
            if(jQuery.trim($("#n_contactoTxt").val()).length>15){
                $("#n_contactoTxt").addClass("error");
                error=5;	
            }
            if(validaSoloNumeros(jQuery.trim($("#n_contactoTxt").val()))!=true){
                $("#n_contactoTxt").addClass("error");
                error=6;	
            }
            if(error==1){
                alert("Revisa los campos en verde, son campos obligatorios");  
            }else if(error==2){
                alert("Los Nombres y Apellidos s\u00F3lo pueden tener un m\u00E1ximo de 30 caracteres");  
            }else if(error==3){
                alert("El pasaporte s\u00F3lo puede tener n\u00FAmeros"); 
            }else if(error==4){
                alert("La c\u00E9dula no es v\u00E1lida");  
            }else if(error==5){
                alert("El N\u00FAmero de contacto s\u00F3lo puede tener 15 n\u00FAmeros");  
            }else if(error==6){
                alert("El N\u00FAmero de contacto s\u00F3lo puede tener n\u00FAmeros");  
            }else if(error==7){
                alert("Los Nombres y Apellidos s\u00F3lo pueden tener letras");  
            }else{
                //$(".form_valida").submit();
                alert("aaa");
            }
                            
        }
});   
//Valida solo numeros
        
        function validaSoloNumeros(numero) {
           if (!/^([0-9])*$/.test(numero))
             return false;
         else
             return true;
        }
//Valida solo letras
        
        function validaSoloLetras(letras) {
           if (!/^([a-zA-Z ñ Ñ á Á éÉ íÍ óÓ úÚ])*$/.test(letras))
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
        
});

(function(a){
    a.fn.validCampoFranz=function(b){
        a(this).on({
            keypress:function(a){
                var c=a.which,d=a.keyCode,e=String.fromCharCode(c).toLowerCase(),f=b;
                (-1!=f.indexOf(e)||9==d||37!=c&&37==d||39==d&&39!=c||8==d||46==d&&46!=c)&&161!=c||a.preventDefault()
                }
            })
    }
})(jQuery);