$(document).ready(function(){
    
    var url=$("#URL").val();
    
    	
    
    $('.login_admin').validate();

    $('.form_default').validate();
	
    $('#datatable').dataTable({
        "aaSorting": [[ 0, "desc" ]]
    });
	
	
    var url_aux="";
	
    $("a.eliminar").live("click", function(){ 
        url_aux=this.href;
        jConfirm(this.title, 'Dialogo de Confirmacion', function(r) {
            if(r==true){
                location.href=url_aux;
            }
        });
        return false;
    });  
	
    $("#generar_password").click(function(event){

        $.post(url+'controllers/ajax_controller.php', {
            action:"generar_password"
        },function(data){	
            $("#mostrar_password").html(data);			
        });

    });

    $("#btnenviar").click(function(event){

        $("#dvLoading").addClass("dvLoading");
        $(".form_default").submit();
    });

    $(".datepicker").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
    });
	
	
	
	
	
	
    // Funciones para  Usuario Adicioanl
	
	
    $("#email").change(function(event){
		
        email=$(this).val();
        var_valida_editar_email=jQuery.trim($("#var_valida_editar_email").val());

        if((var_valida_editar_email=="")||(var_valida_editar_email!=email)){

            $("#error_user").html('<p align="center"> <img src="'+url+'images/load.gif" width="16" height="16" alt="Load"> </p>');
		
		

            $.post(url+'controllers/ajax_controller.php', {
                email:email, 
                action:'valid_email'
            },function(data){	
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
        $.post(url+'controllers/ajax_controller.php', {
            contrasena:contrasena, 
            action:'valid_contrasena'
        },function(data){	
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

        $.post(url+'controllers/ajax_controller.php', {
            contrasena:contrasena, 
            verificar_contrasena:verificar_contrasena, 
            action:'valid_verficar'
        },function(data){

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
   	
        
    $(".form_acceso_administrador").submit(function(){
		
		
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

        /*if(tipo_usuario!="admin"){
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

		}*/
        /*
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
		*/

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
		
        $.post(url+'controllers/ajax_controller.php', {
            action:"generar_password_text"
        },function(data){	
				
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
	
	



    $('#cantidad_polizas').validCampoFranz('0123456789');  //Solo permite ingresar numeros
    var cantidad;
    $("#cantidad_polizas").keyup(function(event){//change
	
        cantidad = $("#cantidad_polizas").val();
        var html="";
        $("#div_error_polizas_colectivas").html("");
        
        for(var i=0; i<cantidad; i++) {
            html += "<p>";
            html += "<label>Ruc del Contratante <span class='campo_obligatorio'>*</span> </label>";
            html += "<label>Nro Póliza <span class='campo_obligatorio'>*</span> </label>";
            html += "<label>Adjuntar archivo <span class='campo_obligatorio'>*</span> </label>";
            html += "<label> #"+(i+1)+" <span class='campo_obligatorio'> </span> </label>";
            html += "</p>";
            html += "<p>";
            html += "<p class='tooltip'>";
            html += "<input type='hidden' name='valid_nro_poliza["+i+"]' value='1' id='valid_nro_poliza["+i+"]' >";
            html += "<input type='text' name='nombre_contratante["+i+"]' value='' id='nombre_contratante["+i+"]'  autocomplete='off' class='contratante'> ";
            html += "<input type='text' name='nro_poliza["+i+"]' numero='"+i+"' value='' id='nro_poliza["+i+"]' class='nro_poliza' autocomplete='off' >";
            html += "<input name='archivo["+i+"]' type='file'  id='subirArchivoPolizaColectiva["+i+"]' class='archivo'>";
            html += "<span>Puedes cargar solo archivos pdf</span>";
            html += "</p>";
        
        }
        
        
        $("#div_polizas_colectivas").html(html);
         
         
		
    });
	
   

$('body').on('change', 'input.nro_poliza', function() {
            nro_poliza = $(this).val();
           var dato = $(this).attr("numero");
            $.post(url+'controllers/ajax_controller.php', {
                nro_poliza:nro_poliza, 
                action:'valid_nro_poliza_colectiva'
            },function(data){	                
            
                   if(data=="false")
                    {
                     $("#nro_poliza\\["+dato+"\\]").addClass("error");
                     $("#valido_nro_poliza").val("0");
                     $("#valid_nro_poliza\\["+dato+"\\]").val("0");
                     alert("El Número de Póliza de la Fila #"+(parseInt(dato)+1)+" ya existe.");
                    }
                    else
                     {
                      $("#valid_nro_poliza\\["+dato+"\\]").val("1");   
                     }
                   
            
            });
            
  
    $("#div_submit_polizas_colectivas").html('');
});



$('body').on('change', 'input.archivo', function() {
    check_extension_siniestro(this.value,$(this).attr("id"));
});

   
$("#agregar_polizas_colectivas").click(function(){//validar_polizas
		
        error=0;
	var polizas = new Array();
        
        cantidad = $("#cantidad_polizas").val();
        var html="<p><span> <ul>";
        arr_polizas=""
        for(var i=0; i<cantidad; i++) {
            nro_poliza = jQuery.trim($("#nro_poliza\\["+i+"\\]").val());
            nombre_contratante = jQuery.trim($("#nombre_contratante\\["+i+"\\]").val());
            archivo = jQuery.trim($("#subirArchivoPolizaColectiva\\["+i+"\\]").val());
            $("#valido_nro_poliza").val("1")
            polizas[i]=nro_poliza;
            arr_polizas+=nro_poliza+",";
                  
            $("#nro_poliza\\["+i+"\\]").removeClass("error");
            $("#nombre_contratante\\["+i+"\\]").removeClass("error");
            $("#subirArchivoPolizaColectiva\\["+i+"\\]").removeClass("error");
		
            $(".error_imagen").html("");
            $(".error_condiciones").html("");

            if(nro_poliza==""){
                $("#nro_poliza\\["+i+"\\]").addClass("error");
                error=1;	
                html+="<li><b>Fila #"+(i+1)+":</b> Numero de póliza no puede estar en blanco</li>";
            }
                 

            if(nombre_contratante==""){
                $("#nombre_contratante\\["+i+"\\]").addClass("error");	
                error=1;
                html+="<li><b>Fila #"+(i+1)+":</b> Nombre de Contratante no puede estar en blanco</li>";
            }  
                 
            if(archivo==""){
                $("#subirArchivoPolizaColectiva\\["+i+"\\]").addClass("error");	
                error=1;
                html+="<li><b>Fila #"+(i+1)+":</b> No hay archivo adjunto</li>";
            }
            
            if($("#valid_nro_poliza\\["+i+"\\]").val()==0)
                {
                  $("#nro_poliza\\["+i+"\\]").addClass("error");  
                  error=1;  
                  alert("El Número de Póliza de la Fila #"+(i+1)+" ya existe.");
                }
            
        }
        
       
         $.post(url+'controllers/ajax_controller.php', {
                nro_poliza:arr_polizas, 
                action:'valid_array_nro_poliza_colectiva'
            },function(data){	                
            var arr = data.split(",");
            
            for(var i=0; i<cantidad; i++) {
                if(arr[i]=="false")
                    {
                     $("#valido_nro_poliza").val("0"); 
                     //alert("El Número de Póliza de la Fila #"+(i+1)+" ya existe.");
                     $("#nro_poliza\\["+i+"\\]").addClass("error");
                    }
            }
            });
         
         repetidos = countRepeated(polizas)
         for(var i = 0; i < repetidos.length; i++){
         if(repetidos[i].count > 1)
             {
               error=1;
               alert("Hay pólizas repetidas en el formulario");
             }
         }
        
         
         if($("#valido_nro_poliza").val()==0){
                error=1; 
             }
        if(error==1)
        {
            $("#div_error_polizas_colectivas").html(html);
            return false;  
        }/*else
            {
            $("#div_submit_polizas_colectivas").html('<p align="center"><input type="submit" value="Guardar &rarr;" id="agregar_polizas_colectivas"></p>');
            }*/
    });






//Validar archivos que pueden subir desde el formulario de sinietro    
    var hash2 = {
    '.pdf' : 1
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
        //submitEl.disabled = true;
        submitEl.value = "";
        //document.getElementById("error_archivo").style.display='none';
        return false;
      }
}



$('body').on('focusin', 'input.contratante', function() {
    $(this).validCampoFranz('0123456789');
});
$('body').on('focusin', 'input.nro_poliza', function() {
    $(this).validCampoFranz('0123456789');
});

$('body').on('change', 'input.contratante', function() {
   var cadena = $(this).val();
   if(isNumeric(cadena))
   $(this).val(cadena);
   else
  $(this).val("");     
   
});
$('body').on('change', 'input.nro_poliza', function() {
    var cadena = $(this).val();
   if(isNumeric(cadena))
   $(this).val(cadena);
   else
  $(this).val("");
});

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


function countRepeated(array){
  var i, r = arguments[1] || [];
  function _indexOf(elm, array){
    for(var i = 0; i < array.length; i++)
      if(array[i].value === elm) return i;
    return -1;
  }
  for(i in array){
    if(Object.prototype.hasOwnProperty.call(array, i)){
      if(array[i] instanceof Array){
        r = countRepeated(array[i], r);
      } else {
        var iof = _indexOf(array[i], r);
        if(iof > -1)
          r[iof].count++;
        else
          r.push({"value": array[i], "count": 1});
      }
    }
  }
  return r;
}

function isNumeric(value){
  return typeof value === 'number' || !isNaN(Number(value.replace(/^\s*$/, 'a')));
}