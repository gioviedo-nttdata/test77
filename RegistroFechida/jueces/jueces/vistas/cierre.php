<!-- Scripts -->
<!-- /.modal -->
<div class="modal modal-primary fade bs-modal-lg-primary6" id="bs-modal-lg-primary6" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel2" aria-hidden="true" style="z-index: 50000000;" >
                                        <div class="modal-dialog modal-lg" style="z-index: 50000000;">
                                            <div class="modal-content">
                                                <div class="modal-header text-inverse">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h5 class="modal-title" id="myLargeModalLabel2">Asistencia Técnica</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="formulario">
                                                        <!-- /.box-header -->
                                                        <!-- form start -->
                                                        <p style="color:#ff0000"> Si necesitas asistencia durante el proceso de registro no dudes en contactarnos via whatsapp al +56 9 4294 4264 o via correo electronica a info@pulpro.com</p>
                                                   </div>
                                                </div>
                                                <div class="modal-footer"> 
                                                    <button type="button" class="btn btn-danger btn-rounded ripple text-left" data-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->

<div class="modal fade" id="loadMe" tabindex="-1" role="dialog" aria-labelledby="loadMeLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body text-center">
        <div class="loader"></div>
        <div clas="loader-txt">
          <p><small>Cargando...</small></p>
        </div>
      </div>
    </div>
  </div>
</div>
    <script src="<?php echo BASE_PATH_CONTROL; ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo BASE_PATH_CONTROL; ?>assets/js/popper.min.js"></script>
    <script src="<?php echo BASE_PATH_CONTROL; ?>assets/js/metisMenu.min.js"></script>
    <script src="<?php echo BASE_PATH_CONTROL; ?>assets/js/perfect-scrollbar.min.js"></script>
    <script src="<?php echo BASE_PATH_CONTROL; ?>assets/js/bootstrap.min.js"></script>
 
    
    <script src="<?php echo BASE_PATH_CONTROL; ?>assets/js/select2.min.js"></script>
    <script src="<?php echo BASE_PATH_CONTROL; ?>assets/js/bootstrap-select.min.js"></script>
    <script src="<?php echo BASE_PATH_CONTROL; ?>assets/js/jquery.multi-select.min.js"></script>
    
    <script src="<?php echo BASE_PATH_CONTROL; ?>assets/js/moment.min.js"></script>
    <script src="<?php echo BASE_PATH_CONTROL; ?>assets/js/fullcalendar.min.js"></script>
    
    <script type="text/javascript" src="<?php echo BASE_PATH_CONTROL; ?>assets/js/jquery.numeric.js"></script>
    
    <script src="<?php echo BASE_PATH_CONTROL; ?>assets/vendors/dropzone/dropzone.js"></script>
    
    <script src="<?php echo BASE_PATH_CONTROL; ?>assets/js/tablesaw.jquery.js"></script>
    <script src="<?php echo BASE_PATH_CONTROL; ?>assets/js/tablesaw-init.js"></script>

    
    <script src="<?php echo BASE_PATH_CONTROL; ?>assets/js/jquery.Rut.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?php echo BASE_PATH_CONTROL; ?>assets/js/jquery.form-validator.min.js"></script>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>-->
    <script src="<?php echo BASE_PATH_CONTROL; ?>assets/js/jquery.maskedinput.js?v=1" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo BASE_PATH_CONTROL; ?>assets/js/jquery.numeric.js"></script>

    
  
    <script src="<?php echo BASE_PATH_CONTROL; ?>assets/js/jquery.multi-select.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo BASE_PATH_CONTROL; ?>assets/js/jquery.ui.datepicker.validation.js"></script>
    
      <script src="<?php echo BASE_PATH_CONTROL; ?>assets/js/template.js"></script>
     <script src="<?php echo BASE_PATH_CONTROL; ?>assets/js/custom.js"></script>
    

 
    <?php if ($_page == 'intro') { ?>
    <script type="text/javascript">
    $(".numeric").numeric();
    $( ".datepicker" ).datepicker({
                yearRange: "1940:2005",
                changeMonth: true,
                changeYear: true,
                dateFormat: "yy-mm-dd",
                defaultDate: "-20y"
            });
function changeResp() {
        $(".conv_respuesta").change(function() {
            var id = this.id;
            var splitid = id.split('_');
            var index = splitid[1];
            var respuesta = $(this).val();
            
            if (respuesta == 1) {
                $("#serv_"+index).removeClass( "oculto" ); 
            } else {
                $("#serv_"+index).addClass( "oculto" ); 
            }
            console.log("index: "+index);
            //$('#chkcod_'+index).val('0');
        });
        }
        
        function formConvResp() {
        
                $(".formConf").submit(function(e) {
                    $("#loadMe").modal({
                        backdrop: "static", //remove ability to close modal with click
                        keyboard: false, //remove option to close with keyboard
                        show: true //Display loader!
                      });
                      
                    console.log("se envia el form");
                  var contador = $(this).attr('rel'); 
                  var id = $(this).attr('id'); 
                  var nadador = $("#nadador_"+contador).val();
                  var competencia = $("#competencia_"+contador).val();
                  console.log(id+" competencia: "+competencia+" nadador:"+nadador);
                  var url = "<?php $baseUrl?>apoderados_convocar_confirm.php";
                  console.log($("#"+id).serialize());
                  $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#"+id).serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                      //var result = $.parseJSON(data);
                      console.log(data);
                      //$("#lineOut_"+contador).html();
                      if (data == 'ok') {
                            $("#form_"+contador).html("<div class=\"alert alert-icon alert-success border-success fade show\" role=\"alert\"><i class=\"material-icons list-icon\">check_circle</i>  <strong>Respuesta enviada!</strong> La respuesta a la convocatoria fue enviada.</div>");
                           $("#loadMe").modal("hide");
                      }              

                    }
                  });

                  e.preventDefault(); // avoid to execute the actual submit of the form.
                });
                }
                
             function changeBus() {
                $(".bus").click(function(e) {
                    var contador = $(this).attr('rel');
                    if( $(this).is(':checked') ) {
                        $("#div_acompanantes_"+contador).removeClass( "oculto" ); 
                    } else {
                        $("#acompanantes_"+contador).val('0')
                        $("#div_acompanantes_"+contador).addClass( "oculto" );
                        
                    }
                    
                });
             }
             
             function changeAcompanantes() {
                $(".acompanantes").change(function(e) {
                    var id = this.id;
                    var splitid = id.split('_');
                    var index = splitid[1];
                    var cantidad = $(this).val();
                    $(".div_acomp_"+index).addClass( "oculto" );
                    for (var i=1; i<=cantidad; i++) {
                        console.log('intento ' + i);
                        $("#acomp_"+index+"_"+i).removeClass( "oculto" ); 
                    }
                     
                    
                    
                });
             }
             
             function chequearRutAcomp(){
    console.log("entro");
    
      $(".rut").change(function() {
          var id = this.id;
           var splitid = id.split('_');
            var index = splitid[2];
            var contador = splitid[1];
            $('#chkcod_'+contador+'_'+index).val('0');



      });

  $(".rut").blur(function() {
    var id = this.id;
    var splitid = id.split('_');
    var index = splitid[2];
    var contador = splitid[1];



    var valor = $(this).val();
    console.log(valor);
    var chkcod = $('#chkcod_'+contador+'_'+index).val();
                  console.log(chkcod);
       
     

    if (valor != '' && chkcod == 0) {
      $('#chkcod_'+contador+'_'+index).val('1');
      $("#loadMe").modal({
                        backdrop: "static", //remove ability to close modal with click
                        keyboard: false, //remove option to close with keyboard
                        show: true //Display loader!
                      });
      $.ajax({
                            url: "<?php echo BASE_PATH_CONTROL; ?>acompanante_check4.php",
                            type: 'post',
                            dataType: "json",
                            data: { rut: valor },
                            success: function( data ) {
                                console.log("llego");
                                jQuery.each(data, function(i, v){
                                  console.log("nombre"+v.nombre);
                                  // $(this).val(v.label); // display the selected text
                                  var codigo = v.value; 
                                  var nombre = v.nombre; // selected id to input
                                  var apellido = v.apellido;
                                  var direccion = v.direccion;
                                  var fecnac = v.fecnac;
                                  console.log(nombre+" - "+apellido);
                                  //document.getElementById('codigo_'+index).value = codigo;
                                  //document.getElementById('nombre_nadador_'+index).text = nombre+" "+apellido;
                                  //$("#nombre_nadador_"+index).html(nombre+" "+apellido);
                                  $("#nombre_"+contador+"_"+index).val(nombre);
                                  $("#apellido_"+contador+"_"+index).val(apellido);
                                  $("#direccion_"+contador+"_"+index).val(direccion);
                                  $("#fecnac_"+contador+"_"+index).val(fecnac);
                                  
                                  $("#loadMe").modal("hide");
                                  if (codigo == 0) {
                                      
                                      alert("No está registrado el acompañante complete los datos");
                                      
                                      
                                  } 
                                  

                                  

                                });
                                
                                

                                /*if (data === "false") {
                                  $(this).focus();
                                  alert("Error en el codigo");
                                }*/
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                //alert(xhr.status);
                                alert(thrownError);
                            }
                        });

    } else if (valor == '' && chkcod == 0) {
        //document.getElementById('nombre_nadador_'+index).text ="";
        $("#nombre_"+contador+"_"+index).val("");
                                  $("#apellido_"+contador+"_"+index).val("");
                                  $("#direccion_"+contador+"_"+index).val("");
                                  $("#fecnac_"+contador+"_"+index).val("");
        $('#chkcod_'+index).val('1');

    }
    //alert( "Handler for .blur() called." );
  });
}
  $(document).ready(function() {

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,basicWeek,basicDay'
      },

      navLinks: true, // can click day/week names to navigate views

      eventLimit: true, // allow "more" link when too many events
      events: [
        <?php 
        foreach ($comp->row as $Elem) { 
            
?>
                        {
        title:"<?php echo $Elem['nombre']?>",
        start: '<?php echo $Elem['desde']." 00:00";?>', // a start time (10am in this example)
        end: '<?php echo $Elem['hasta']." 23:59";?>', // an end time (6pm in this example)
        url: '<?php echo BASE_PATH;?>competencias_det.php?id=<?php echo $Elem['id']?>',              
        textColor: '#fff'
            
    },<?php } ?>],
    
     
    });
  
    
    changeResp();
    formConvResp();
    changeBus();
    changeAcompanantes();
    chequearRutAcomp();
    $('.rut').Rut({  
        format_on: 'keyup'
    });

  });
  

      </script>
    <?php } ?>
    <?php if ($_page == 'pruebas') { ?>
    <script type="text/javascript">
        $(document).ready(function(){
          var nombre = '';
          $("#distancia, #estilo").change(function() {
              if ($('#distancia').val() != '' && $('#estilo').val() != '' && $('#nombre').val() == '') {
                  nombre = $('#distancia').val()+" mts. "+$('#estilo').val();
                  $('#nombre').val(nombre);
              }
        
          });
        })
    </script>
    
    <?php } ?>

    <?php if ($_page == 'usuarios_add' or $_page == 'nadadores' or $_page == 'usuarios_mod' or $_page == 'nadadores_mod' or $_page == 'misdatos' or $_page == 'entrenadores') { ?>
    <script type="text/javascript">
        
    $("#bt_buscar").click(function() {
        var valor = $(this).attr('rel');
        console.log(valor);
        if (valor == 'oculto') {
            $("#buscador_div").removeClass("oculto");
            $(this).attr('rel', 'visible');
        } else {
            $("#buscador_div").addClass("oculto");
            $(this).attr('rel', 'oculto');
        }
        
        
    });
    $('#rut, .rut_nadador').Rut({  
        format_on: 'keyup'
    });
    
     $.validator.addMethod("rut", function(value, element) {
  return this.optional(element) || $.Rut.validar(value);
}, "Este campo debe ser un rut valido.");
    
    $("#formU").validate({
  rules: {
    rut: {
      required: true,
      rut:true
    },
    nombre: {
      required: true
    },
    apellido: {
      required: true
    },
    email: {
      required: true,
      email: true
    }<?php if ($_page == 'nadadores') { ?>
    ,
    fecnac: {
      required: true
    }
    <?php } ?>
  },
    messages: {
       rut: {
        required: "Debe ingresar el rut",
        rut:"Este campo debe ser un rut valido"
      }, 
      nombre: {
        required: "Debe ingresar el nombre"
      },
      apellido: {
        required: "Debe ingresar el apellido"
      },
      email: {
        required: "Debe ingresar el email",
        email: "Debe ingresar un email válido"
      }<?php if ($_page == 'nadadores') { ?>
    ,
    fecnac: {
      required: "Debe ingresar fecha de nacimiento"
    }
    <?php } ?>
    }
});

function chequearRutNadador(){
    console.log("entro");

  $(".rut_nadador").blur(function() {
    var id = this.id;
    var splitid = id.split('_');
    var index = splitid[2];



    var valor = $(this).val();
    console.log(valor);
    var chkcod = $('#chkcod_'+index).val();
                  //console.log(valor);
       
     

    if (valor != '' && chkcod == 0) {
      $('#chkcod_'+index).val('1');
      $.ajax({
                            url: "<?php echo BASE_PATH_CONTROL; ?>nadador_check4.php",
                            type: 'post',
                            dataType: "json",
                            data: { rut: valor },
                            success: function( data ) {
                                jQuery.each(data, function(i, v){
                                  //console.log(v.codigo);
                                  // $(this).val(v.label); // display the selected text
                                  var codigo = v.value; 
                                  var nombre = v.nombre; // selected id to input
                                  var apellido = v.apellido;
                                  console.log(nombre+" - "+apellido);
                                  //document.getElementById('codigo_'+index).value = codigo;
                                  //document.getElementById('nombre_nadador_'+index).text = nombre+" "+apellido;
                                  $("#nombre_nadador_"+index).html(nombre+" "+apellido);
                                  
                                  if (codigo == 0) {
                                      alert("Error en el rut, no existe el nadador");
                                      $("#rut_nadador_"+index).focus();
                                      
                                  } else {                                

                                  

                                  var cant_nad = $('#cant_nad').val();

                                  

                                  }
                                  

                                  

                                });

                                /*if (data === "false") {
                                  $(this).focus();
                                  alert("Error en el codigo");
                                }*/
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                //alert(xhr.status);
                                alert(thrownError);
                            }
                        });

    } else if (valor == '' && chkcod == 0) {
        document.getElementById('nombre_nadador_'+index).text ="";
        $('#chkcod_'+index).val('1');

    }
    //alert( "Handler for .blur() called." );
  });
}

function chequearCod() {
  $(".rut_nadador").change(function() {
            var id = this.id;
            var splitid = id.split('_');
            var index = splitid[2];
            console.log("index: "+index);
            $('#chkcod_'+index).val('0');
  });
}

chequearCod();

$('#apoderado').click(function(){
    if($(this).is(':checked')) {  
            //alert("Está activado"); 
            $( "#nadadores" ).removeClass( "oculto" );
        } else {  
            $( "#nadadores" ).addClass( "oculto" );
        } 
});

$('#add_nadador').click(function(){

                // Get last id 
                
                var index = Number($( "#cant_nad" ).val()) + 1;

                // Create row with input elements
                //var html = "<div class='row row_producto'><div class='col-lg-2 col-md-2 col-xs-12'><div class='form-group'><label for='codigo_"+index+"'>Código Producto</label><input type='text' class='form-control codigov' id='codigo_"+index+"' name='codigo_"+index+"'><input type='hidden' name='chkcod_"+index+"' id='chkcod_"+index+"' value='0'><input type='hidden' name='inventario_"+index+"' id='inventario_"+index+"'value='0'></div></div><div class='col-lg-4 col-md-4 col-xs-12'><div class='form-group'><label for='nombre_"+index+"'>Nombre Producto</label><input type='text' class='form-control nombre' id='nombre_"+index+"' name='nombre_"+index+"'></div></div><div class='col-lg-2 col-md-2 col-xs-12'><div class='form-group'><label for='cant_"+index+"'>Cantidad a ingresar</label><input type='text' class='form-control numeric icant' id='cant_"+index+"' name='cant_"+index+"'></div></div><div class='col-lg-2 col-md-2 col-xs-12'><div class='form-group'><label for='precio_"+index+"'>Precio unitario</label><input type='text' class='form-control numeric iprecio' id='precio_"+index+"' name='precio_"+index+"' readonly></div></div><div class='col-lg-2 col-md-2 col-xs-12'><div class='form-group'><label for='precio_"+index+"'>Total</label><input type='text' class='form-control numeric' id='total_"+index+"' name='total_"+index+"' readonly></div></div></div>";
                
                var html = "<div class=\"nadador_"+index+"\"><label class=\"form-control-label\">Rut Nadador "+index+"</label><input class=\"form-control rut_nadador\" rel=\""+index+"\" id=\"rut_nadador_"+index+"\" name=\"rut_nadador_"+index+"\" placeholder=\"Rut nadador\" type=\"text\"><input type='hidden' name='chkcod_"+index+"' id='chkcod_"+index+"' value='0'><div id=\"nombre_nadador_"+index+"\"></div></div>";
                // Append data
                


                $( "#cant_nad" ).val(index);
                $('#nadadores_group').append(html);
                //$(".numeric").numeric();
                $('.rut_nadador').Rut({  
                    format_on: 'keyup'
                });
                chequearRutNadador();
                chequearCod();
                  $( "#rut_nadador_"+index ).focus();
               
         
                
            });
            
            chequearRutNadador();
            chequearCod();
            
            $( ".datepicker" ).datepicker({
                yearRange: "1940:2005",
                changeMonth: true,
                changeYear: true,
                dateFormat: "yy-mm-dd",
                defaultDate: "-20y"
            });
            
            $(".a_elim").change(function() {
  var id = this.id;
    var splitid = id.split('_');
    var index = splitid[2];
    //console.log(index);

    if(this.checked) {
     // console.log('#row_pro_'+index);
        $('#row_pro_'+index).addClass("tachado");
    } else {
        $('#row_pro_'+index).removeClass("tachado");
    }

});
</script>
    <?php } ?>

<?php if ($_page == 'misdatos') { ?>
<script type="text/javascript">
	
		Dropzone.autoDiscover = false;
		$("#dropzone").dropzone({
			url: "<?php echo $baseUrl?>uploads/perfil.php",
			addRemoveLinks: true,
			dictResponseError: "Ha ocurrido un error en el server",
			acceptedFiles: 'image/*,.jpeg,.jpg,.png,.gif,.JPEG,.JPG,.PNG,.GIF',
			uploadMultiple: false,
			maxFiles: 1,
			maxfilesexceeded: function(file) {
        		this.removeAllFiles();
				this.addFile(file);
			},
			params: {
				id: '',
				tipo: '0'
			},
			complete: function(file, response)
			{
				if(file.status == "success")
				{
                                        console.log(response);
					//alert("El siguiente archivo ha subido correctamente: " + response);
                                        $( "#foto_perfil" ).load( "<?php $baseUrl?>foto_perfil.php", function() {
					
           // $( "#foto_perfil" ).html( "<img src=\"<?php $baseUrl?>uploads/perfil_<?php echo $authj->rowff['id'];?>"+response['target_file']+".jpg\">", function() {
						//$('#nuevoCentro').modal().hide();
						$('.bs-modal-lg-primary').modal('hide');
					});
					this.removeFile(file);
					
				}
			},
			error: function(file)
			{
				alert("Error subiendo el archivo " + file.name);
			},
			removedfile: function(file, serverFileName)
			{
				var name = file.name;
				
							var element;
							(element = file.previewElement) != null ? 
							element.parentNode.removeChild(file.previewElement) : 
							false;
					
			}
		});
		
		

            $("#region").change(function () {
                   $("#region option:selected").each(function () {
                    elegido=$(this).val();
                    console.log(elegido);
                    $.post("<?php echo BASE_PATH_CONTROL; ?>cargar_provincia.php", { region: elegido }, function(data){
                    $("#dv_provincia").html(data);
                    }); 
                             
                });
           })
  
                
                </script>
<?php } ?>

<?php if ($_page == 'nadadores_foto') { ?>
<script type="text/javascript">
	
		Dropzone.autoDiscover = false;
		$("#dropzone").dropzone({
			url: "<?php echo $baseUrl?>uploads/nad_perfil.php",
			addRemoveLinks: true,
			dictResponseError: "Ha ocurrido un error en el server",
			acceptedFiles: 'image/*,.jpeg,.jpg,.png,.gif,.JPEG,.JPG,.PNG,.GIF',
			uploadMultiple: false,
			maxFiles: 1,
			maxfilesexceeded: function(file) {
        		this.removeAllFiles();
				this.addFile(file);
			},
			params: {
				id: '<?php echo $id;?>',
				tipo: '0'
			},
			complete: function(file, response)
			{
				if(file.status == "success")
				{
                                        console.log(response);
					//alert("El siguiente archivo ha subido correctamente: " + response);
                                        $( "#foto_perfil" ).load( "<?php $baseUrl?>nadadores_foto.php?id=<?php echo $id?>", function() {
					
           // $( "#foto_perfil" ).html( "<img src=\"<?php $baseUrl?>uploads/perfil_<?php echo $authj->rowff['id'];?>"+response['target_file']+".jpg\">", function() {
						//$('#nuevoCentro').modal().hide();
						$('.bs-modal-lg-primary').modal('hide');
					});
					this.removeFile(file);
					
				}
			},
			error: function(file)
			{
				alert("Error subiendo el archivo " + file.name);
			},
			removedfile: function(file, serverFileName)
			{
				var name = file.name;
				
							var element;
							(element = file.previewElement) != null ? 
							element.parentNode.removeChild(file.previewElement) : 
							false;
					
			}
		});
		
		
		
		$('#rut, .rut_nadador').Rut({  
        format_on: 'keyup'
    });
    
     $.validator.addMethod("rut", function(value, element) {
  return this.optional(element) || $.Rut.validar(value);
}, "Este campo debe ser un rut valido.");
    
    $("#formU").validate({
  rules: {
    rut: {
      required: true,
      rut:true
    },
    nombre: {
      required: true
    },
    apellido: {
      required: true
    },
    email: {
      required: true,
      email: true
    }<?php if ($_page == 'nadadores') { ?>
    ,
    fecnac: {
      required: true
    }
    <?php } ?>
  },
    messages: {
       rut: {
        required: "Debe ingresar el rut",
        rut:"Este campo debe ser un rut valido"
      }, 
      nombre: {
        required: "Debe ingresar el nombre"
      },
      apellido: {
        required: "Debe ingresar el apellido"
      },
      email: {
        required: "Debe ingresar el email",
        email: "Debe ingresar un email válido"
      }<?php if ($_page == 'nadadores') { ?>
    ,
    fecnac: {
      required: "Debe ingresar fecha de nacimiento"
    }
    <?php } ?>
    }
});

  
                
                </script>
<?php } ?>

<?php if ($_page == 'competencias') { ?>
<script type="text/javascript">
    $( ".datepicker" ).datepicker({
                yearRange: "1940:2005",
                changeMonth: true,
                changeYear: true,
                dateFormat: "yy-mm-dd",
                defaultDate: "-20y"
            });
    $('.datepicker1').datepicker({
      yearRange: "1940:2005",
                changeMonth: true,
                changeYear: true,
                dateFormat: "yy-mm-dd",
                defaultDate: "-20y"
            });
    $('.datepickerd').datepicker({
      yearRange: "1940:2005",
                changeMonth: true,
                changeYear: true,
                dateFormat: "yy-mm-dd",
                defaultDate: "-20y"
            });
    $('.timepicker').wickedpicker({
        title: '',
        now: "09:00",
        twentyFour: true,
        timeSeparator: ':'
    });
    $('.pickdesde').change(function(){
        
        $('.datepicker1').datepicker('setStartDate', $('.pickdesde').val());
        $('.datepicker1').datepicker('update', $('.pickdesde').val());
        
    });
    $('.pickhasta').change(function(){
        
        $('.datepicker1').datepicker('setEndDate', $('.pickhasta').val());
        
    });
            
    $('#local').click(function(){
    if($(this).is(':checked')) {  
            //alert("Está activado");
            $( "#box_admin" ).addClass( "oculto" );            
        } else {  
            $( "#box_admin" ).removeClass( "oculto" );
        } 
    });
    
    $('#federacion').change(function(){
        //console.log($('#federacion').val());
        var valor = $('#federacion').val();
        console.log(valor);
        if (valor == '') {
            $( "#box_categorias" ).addClass( "oculto" );
        } else {
            $( "#box_categorias" ).removeClass( "oculto" );
            $.ajax({
                            url: "<?php echo BASE_PATH_CONTROL; ?>competencias_categorias.php",
                            type: 'post',
                            data: { federacion: valor },
                            success: function( data ) {
                                //console.log("lo hizo"+data);
                                $("#lacategorias0" ).html(data);
                                $( "#lacategorias0" ).multiSelect("destroy").multiSelect();
                                //$('#lacategorias0').multiSelect();
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                               alert(xhr.status);
                                //alert(thrownError);
                            }
                        });
        }
        
        

         
    });
    
    $('#add_jornada').click(function(){

                // Get last id 
                
                var index = Number($( "#cant_jor" ).val()) + 1;

                // Create row with input elements
                //var html = "<div class='row row_producto'><div class='col-lg-2 col-md-2 col-xs-12'><div class='form-group'><label for='codigo_"+index+"'>Código Producto</label><input type='text' class='form-control codigov' id='codigo_"+index+"' name='codigo_"+index+"'><input type='hidden' name='chkcod_"+index+"' id='chkcod_"+index+"' value='0'><input type='hidden' name='inventario_"+index+"' id='inventario_"+index+"'value='0'></div></div><div class='col-lg-4 col-md-4 col-xs-12'><div class='form-group'><label for='nombre_"+index+"'>Nombre Producto</label><input type='text' class='form-control nombre' id='nombre_"+index+"' name='nombre_"+index+"'></div></div><div class='col-lg-2 col-md-2 col-xs-12'><div class='form-group'><label for='cant_"+index+"'>Cantidad a ingresar</label><input type='text' class='form-control numeric icant' id='cant_"+index+"' name='cant_"+index+"'></div></div><div class='col-lg-2 col-md-2 col-xs-12'><div class='form-group'><label for='precio_"+index+"'>Precio unitario</label><input type='text' class='form-control numeric iprecio' id='precio_"+index+"' name='precio_"+index+"' readonly></div></div><div class='col-lg-2 col-md-2 col-xs-12'><div class='form-group'><label for='precio_"+index+"'>Total</label><input type='text' class='form-control numeric' id='total_"+index+"' name='total_"+index+"' readonly></div></div></div>";
                
                //var html = "<div class=\"nadador_"+index+"\"><label class=\"form-control-label\">Rut Nadador "+index+"</label><input class=\"form-control rut_nadador\" rel=\""+index+"\" id=\"rut_nadador_"+index+"\" name=\"rut_nadador_"+index+"\" placeholder=\"Rut nadador\" type=\"text\"><input type='hidden' name='chkcod_"+index+"' id='chkcod_"+index+"' value='0'><div id=\"nombre_nadador_"+index+"\"></div></div>";
                var html = "<div class=\"row\"><div class=\"col-md-6\"><label class=\"form-control-label\">Jornada "+index+": Fecha</label><input type=\"text\" class=\"form-control datepicker1\" name=\"fec_jornada_"+index+"\"></div><div class=\"col-md-6\"><label class=\"form-control-label\">Hora</label><input type=\"text\" class=\"form-control timepicker\" name=\"hora_jornada_"+index+"\"></div></div>";
// Append data
                


                $( "#cant_jor" ).val(index);
                $('#contenido_jornadas').append(html);
                //$(".numeric").numeric();
                $('.datepicker1').datepicker({
                    format: 'yyyy/mm/dd',
                    autoclose: true,
                    startDate: $('.pickdesde').val(),
                    endDate: $('.pickhasta').val()
                });
                $('.timepicker').wickedpicker({
                    title: '',
                    now: "09:00",
                    twentyFour: true,
                    timeSeparator: ':'
                });
             
                //  $( "#rut_nadador_"+index ).focus();
               
         
                
            });
</script>


<?php } ?>
<?php if ($_page == 'competencias_reporte') { ?>
<script type="text/javascript">
    //$( "#competencias" ).multiSelect("destroy").multiSelect();
    
    $(document).ready(function() {
        /*
          var last_valid_selection = null;

          $('#competencias').change(function(event) {
              console.log("entra al cambio: "+$(this).val().length);
              
            if ($(this).val().length > 3) {

              $(this).val(last_valid_selection);
            } else {
              last_valid_selection = $(this).val();
            }
          });
        */
       $('#competencias').multiSelect({
            afterSelect: function(values){
                
              console.log();
              if ($('#competencias').val().length > 7) {
                  $('#competencias').multiSelect('deselect', values);
              }
              //alert("Select value: "+values);
            },
            afterDeselect: function(values){
              //alert("Deselect value: "+values);
            }
          });
        });
        
        
    </script>


<?php } ?>
<?php //echo $_page;
if ($_page == 'competencias_marcas_xnadador') { ?>
<script type="text/javascript">
    $(".vermasmarc").click(function(e) {
        var id = this.id;
            var splitid = id.split('_');
            var indext = splitid[1];
            
            var estado = $(this).attr('rel');
            
            
                    if( estado == 'menos' ) {
                       $(this).attr('rel', 'mas');
                        $(".oculto_"+indext).removeClass( "oculto" ); 
                        $("#vermasmarc_"+indext).html('<i class="fas fa-minus-circle"></i> Ver menos');
                    } else {
                         $(this).attr('rel', 'menos');
                        $(".oculto_"+indext).addClass( "oculto" ); 
                        $("#vermasmarc_"+indext).html('<i class="fas fa-plus-circle"></i> Ver todas las marcas');
                    }
                    
                });
    </script>
<?php } ?>
<?php //echo $_page;
if ($_page == 'nadadores') { ?>

   <script>

            
            
            <?php $uniquevalor= uniqid();?>
            Dropzone.autoDiscover = false;
		$("#dropzone").dropzone({
			url: "<?php echo $baseUrl?>uploads/excel_nadadores.php",
			addRemoveLinks: true,
			dictResponseError: "Ha ocurrido un error en el server",
                        uploadMultiple: false,
			maxFiles: 1,
			maxfilesexceeded: function(file) {
        		this.removeAllFiles();
				this.addFile(file);
			},
			params: {
				id: '',
				tipo: '0',
				disciplina: '<?php echo $disciplina?>',
                unico : '<?php echo $uniquevalor;?>'
			},
			complete: function(file, response)
			{
				if(file.status == "success")
				{
                       console.log(response);
					
						$('.bs-modal-lg-primary').modal('hide');
					location.href ="nadadores_add_excel.php?disciplina=<?php echo $disciplina;?>&valor=<?php echo $uniquevalor;?>";
					this.removeFile(file);
					
				}
			},
			error: function(file)
			{
				alert("Error subiendo el archivo " + file.name);
			},
			removedfile: function(file, serverFileName)
			{
				var name = file.name;
				
							var element;
							(element = file.previewElement) != null ? 
							element.parentNode.removeChild(file.previewElement) : 
							false;
					
			}
		});
</script>
<?php } ?>
<?php if ($_page == 'competencias_convocatoria') { ?>
<script type="text/javascript">
    $('.datepicker').datepicker({
                format: 'yyyy/mm/dd',
                autoclose: true,
                startDate: '<?php echo $dayhoy;?>',
                endDate: '<?php echo $comp->row[0]['desde'];?>'
            });
            
    $("#checkAll").click(function(){
        console.log("hizo click1");
        $("input[type='checkbox'].inp_ck").attr('checked', true);   
    });
    $("#descheckAll").click(function(){
        console.log("hizo click");
        $("input[type='checkbox'].inp_ck").attr('checked', false);   
    });
    
    
    $(".formOut").submit(function(e) {
          var contador = $(this).attr('rel'); 
          var id = $(this).attr('id'); 
          console.log(id+" rel: "+contador);
          var url = "<?php $baseUrl?>competencias_convocatoria_add_ind.php";

          $.ajax({
            type: "POST",
            url: url,
            data: $("#"+id).serialize(), // serializes the form's elements.
            success: function(data)
            {
              //var result = $.parseJSON(data);
              //console.log(result);
              //$("#lineOut_"+contador).html();
              if (data == 'ok') {
                    $("#tab_convocados").load("<?php $baseUrl?>competencias_convocatoria_convocados.php?id=<?php echo $id;?>")
                    $("#lineOut_"+contador).addClass( "oculto" ); 
              }              

            }
          });

          e.preventDefault(); // avoid to execute the actual submit of the form.
        });
        
        function changeResp() {
        $(".conv_respuesta").change(function() {
            var id = this.id;
            var splitid = id.split('_');
            var index = splitid[1];
            var respuesta = $(this).val();
            
            if (respuesta == 1) {
                $("#serv_"+index).removeClass( "oculto" ); 
            } else {
                $("#serv_"+index).addClass( "oculto" ); 
            }
            console.log("index: "+index);
            //$('#chkcod_'+index).val('0');
        });
        }
        
       
       

        function formConvResp() {
        
                $(".send_conv").click(function(e) {
                    var cont = 1;
                    forma = $(this).attr('rel');
                     $("#loadMe").modal({
                        backdrop: "static", //remove ability to close modal with click
                        keyboard: false, //remove option to close with keyboard
                        show: true //Display loader!
                      });
                  var contador = $("#"+forma).attr('rel'); 
                  var id = $("#"+forma).attr('id'); 
                  var nadador = $("#nadador_"+contador).val();
                  console.log(id+" rel: "+contador);
                  console.log("contador:"+cont);
                  var url = "<?php $baseUrl?>competencias_convocar_confirm.php";
                  console.log($("#"+id).serialize());
                  $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#"+id).serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                      //var result = $.parseJSON(data);
                      console.log(data);
                      cont++;
                      //$("#lineOut_"+contador).html();
                      if (data == 'ok') {
                        //REVISARR********************
                            $("#conv_linea_"+contador).load("<?php $baseUrl?>competencias_conv_convocados_action.php?id=<?php echo $id;?>&contador="+contador+"&nadador="+nadador+"&viajax=1", function() {
                                    $("#loadMe").modal("hide");
                                });
                            //location.href ="competencias_convocatoria.php?id=<?php echo $id;?>";
                    
                      }   
                      
                      
                    }
                  });

                  e.preventDefault(); // avoid to execute the actual submit of the form.
                });
                
                $(".elim_resp").click(function(e) {
                var contador = $(this).attr('rel'); 
                var url = $(this).attr('href'); 
                var nadador = $("#nadador_"+contador).val();
                var categoria = $("#categoria_"+contador).val();
                //var id = $("competencia_"+contador).val();
                console.log(url);
                console.log(nadador);
                console.log(categoria);
                $.ajax({
                    
                    url: url,
                    success: function(data)
                    {
                      console.log(data);
                      if (data == 'ok') {
                            //console.log("llego hasta aqui");
                            $("#conv_linea_"+contador).load("<?php $baseUrl?>competencias_conv_convocados_action.php?id=<?php echo $id;?>&contador="+contador+"&nadador="+nadador);
                    
                      }              

                    }
                  });
                
                 e.preventDefault(); // avoid to execute the actual submit of the form.
                });
                
                 
        
        }
        
        
        changeResp();
        formConvResp();
  
  
</script>
<?php } ?>
<?php if ($_page == 'competencias_asistentes') { ?>
<script type="text/javascript">
    $("#formato").click(function(e) {
                    if( $(this).is(':checked') ) {
                        $("#items_extra").addClass( "oculto" ); 
                    } else {
                        $("#items_extra").removeClass( "oculto" ); 
                    }
                    
                });
</script>
<?php } ?>
<?php if ($_page == 'competencias_relevos') { ?>
<script type="text/javascript">
    $("#prioridad").change(function() {
            var id = this.id;

            var respuesta = $(this).val();
            
            if (respuesta == 1) {
                $("#group_tiempo_marca").removeClass( "oculto" ); 
            } else {
                $("#group_tiempo_marca").addClass( "oculto" );
            }
            console.log("#w_"+id);
            //$('#chkcod_'+index).val('0');
        });
        
        $("#checkAll").click(function(){
        console.log("hizo click1");
        $("input[type='checkbox'].inp_ck").attr('checked', true);   
    });
    $("#descheckAll").click(function(){
        console.log("hizo click");
        $("input[type='checkbox'].inp_ck").attr('checked', false);   
    });
    
    $("#frm_relevo").submit(function(e){
        
        var cant = $("#conta_nad").val();
        var cont = 0;
        //console.log("empezamos a contar:"+cant);
        for (var i=1; i<=cant; i++) {
            console.log("verificamos #p_nadador_"+i);
                        if($('#p_nadador_'+i).is(':checked')) {                         
                            cont++;
                            //console.log("aqui va 1");
                        }
                    }
       if (cont >= 4) {
           return;
           
       }
       alert ("debes seleccionar al menos 4 nadadores");
        e.preventDefault();
    });
    
    </script>
  <?php } ?>  
 <?php if ($_page == 'competencias_relevos_paso1') { ?>
<script type="text/javascript">      
    $(".tiemposel").change(function() {
            var id = this.id;

            var respuesta = $(this).val();
            
            if (respuesta == 't') {
                $("#marca_"+id).removeClass( "oculto" ); 
            } else {
                $("#marca_"+id).addClass( "oculto" );
            }
            console.log("#marca_"+id);
            //$('#chkcod_'+index).val('0');
        });
        </script>
  <?php } ?>  
<?php if ($_page == 'competencias_res_temp') { ?>
<script type="text/javascript">
$(".marca").blur(function(e) {
                    forma = $(this).attr('rel');
                    
                  //var contador = $("#forma_"+forma).attr('rel'); 
                  
                  var url = "<?php $baseUrl?>competencias_temp_marca.php";
                  console.log($("#forma_"+forma).serialize());
                  $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#forma_"+forma).serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                      //var result = $.parseJSON(data);
                      console.log(data);
                      //$("#lineOut_"+contador).html();
                      if (data == 'ok') {
                          console.log("guardado");
                        //REVISARR********************
                           /* $("#conv_linea_"+contador).load("<?php $baseUrl?>competencias_conv_convocados_action.php?id=<?php echo $id;?>&contador="+contador+"&nadador="+nadador, function() {
                                    $("#loadMe").modal("hide");
                                });*/
                            //location.href ="competencias_convocatoria.php?id=<?php echo $id;?>";
                            $("#resul_"+forma).html("<span class=\"azul\">Guardado</span>");
                            $("#celda_"+forma).css("background-color", "#a0ffad");
                            //$("#forma_"+forma+" #marca").val("");
                      }   else {
                          //console.log(data);
                          $("#resul_"+forma).html("<span class=\"roja\">Error</span>");
                          $("#celda_"+forma).css("background-color", "#fdafa0");
                          $("#forma_"+forma+" #marca").val("");
                      }
                      
                      
                    }
                  });

                  e.preventDefault(); // avoid to execute the actual submit of the form.
                });
</script>
<?php } ?>
<?php if ($_page == 'competencias_resultados') { ?>
<script type="text/javascript">
    $(".select_nadador").change(function() {
            var id = this.id;

            var respuesta = $(this).val();
            
            if (respuesta == '') {
                $("#w_"+id).removeClass( "oculto" ); 
            } else {
                $("#w_"+id).addClass( "oculto" );
            }
            console.log("#w_"+id);
            //$('#chkcod_'+index).val('0');
        });
    </script>
<?php } ?>
<?php if ($_page == 'competencias_conf_pruebas') { ?>
<script type="text/javascript">
    function iniciarCuentas() {
        $("#pru_warning").addClass( "oculto" );
         contarInscripciones();  
         contaJornadas();
    }
    
    function contarInscripciones() {
        var contador = 0;
        $(".inscribir").each(function(){
			if($(this).is(":checked")) {
				contador++;
                            }
		});
                
                $('#pru_insc').html(contador);
                <?php if ($max_pruebas > 0) { ?>
                        if (contador > <?php echo $max_pruebas;?>) {
                            $("#pru_warning").removeClass( "oculto" );
                            alert("Estás inscribiendo mas pruebas que las permitidas en la competencia");                            
                        } else {
                           // $("#pru_warning").addClass( "oculto" );
                        }
                <?php } ?>
                     
    }
    function contaJornadas() {
        <?php if ($max_jornadas > 0 and !empty($arrayJor)) { ?>
            <?php foreach ($arrayJor as $idJor) { ?>
                var contador_<?php echo $idJor;?> = 0;
            $(".insc_jor_<?php echo $idJor; ?>").each(function(){
			if($(this).is(":checked"))
				contador_<?php echo $idJor;?>++;
		});
                if (contador_<?php echo $idJor;?> > <?php echo $max_jornadas;?>) {
                            $("#pru_warning").removeClass( "oculto" );
                            alert("Estás inscribiendo mas pruebas que las permitidas en la Jornada <?php echo $idJor;?> ");                            
                        } else {
                            //
                        }
            <?php } ?>
                
                        
                <?php } ?>
    }
    
    
    
    $(".inscribir").click(function(e) {
        
                     var id = this.id;
                     console.log("#resp_"+id);
                     iniciarCuentas();
                    if( $(this).is(':checked') ) {
                        $("#resp_"+id).removeClass( "oculto" ); 
                    } else {
                        $("#resp_"+id).addClass( "oculto" ); 
                        
                    }
                    
                });
    $(".max_nad_prueba").click(function(e) {
        var contador = $(this).attr('rel'); 
        var splitid = contador.split('_');
        var prueba = splitid[0];
        var cant_max = splitid[1];
        if( $(this).is(':checked') ) {
            $("#pru_warning").removeClass( "oculto" );
            alert("Se ha superado el numero max de nadadores ("+cant_max+") inscritos en la prueba "+prueba);
        }
    });
    
                iniciarCuentas();
         
                
    $(".tiemposel").change(function() {
            var id = this.id;

            var respuesta = $(this).val();
            
            if (respuesta == 't') {
                $("#marca_"+id).removeClass( "oculto" ); 
            } else {
                $("#marca_"+id).addClass( "oculto" );
            }
            console.log("#marca_"+id);
            //$('#chkcod_'+index).val('0');
        });
    </script>
<?php } ?>
<?php if ($_page == 'documentos' or $_page == 'intro') { ?>
<script type="text/javascript">
	
		Dropzone.autoDiscover = false;
		$("#dropzone").dropzone({
			url: "<?php $baseUrl?>uploads/uploads.php",
			addRemoveLinks: true,
			dictResponseError: "Ha ocurrido un error en el server",
			acceptedFiles: 'image/*,.jpeg,.jpg,.png,.xlsx,.xls,.doc,.docx,.pdf,.ppt,.pptx,.gif,.JPEG,.JPG,.PNG,.XLSX,.XLS,.DOC,.DOCX,.PDF,.PPT,.PPTX,.GIF',
			uploadMultiple: false,
			maxFiles: 1,
			maxfilesexceeded: function(file) {
        		this.removeAllFiles();
				this.addFile(file);
			},
			params: {
				id: '<?php echo $id;?>',
				tipo: '1'
			},
			complete: function(file, response)
			{
				if(file.status == "success")
				{
			
					//alert("El siguiente archivo ha subido correctamente: " + response);
					$( "#docu_id" ).load( "<?php echo BASE_PATH_CONTROL; ?>documentos_int.php?tipo=1", function() {
						$('#statusMsg').html('<span style="color:green;">Gracias por agregar documentp.</p>');
						//$('#nuevoCentro').modal().hide();
						//$('#nuevoCentro').modal('hide');
					});
					this.removeFile(file);
					
				}
			},
			error: function(file)
			{
				alert("Error subiendo el archivo " + file.name);
			},
			removedfile: function(file, serverFileName)
			{
				var name = file.name;
				
							var element;
							(element = file.previewElement) != null ? 
							element.parentNode.removeChild(file.previewElement) : 
							false;
					
			}
		});

    $("#dropzone1").dropzone({
			url: "<?php $baseUrl?>uploads/uploads.php",
			addRemoveLinks: true,
			dictResponseError: "Ha ocurrido un error en el server",
			acceptedFiles: 'image/*,.jpeg,.jpg,.png,.xlsx,.xls,.doc,.docx,.pdf,.ppt,.pptx,.gif,.JPEG,.JPG,.PNG,.XLSX,.XLS,.DOC,.DOCX,.PDF,.PPT,.PPTX,.GIF',
			uploadMultiple: false,
			maxFiles: 1,
			maxfilesexceeded: function(file) {
        		this.removeAllFiles();
				this.addFile(file);
			},
			params: {
				id: '<?php echo $id;?>',
				tipo: '2'
			},
			complete: function(file, response)
			{
				if(file.status == "success")
				{
			
					//alert("El siguiente archivo ha subido correctamente: " + response);
					$( "#docu_id2" ).load( "<?php echo BASE_PATH_CONTROL; ?>documentos_int.php?tipo=2", function() {
						$('#statusMsg').html('<span style="color:green;">Gracias por agregar documentp.</p>');
						//$('#nuevoCentro').modal().hide();
						//$('#nuevoCentro').modal('hide');
					});
					this.removeFile(file);
					
				}
			},
			error: function(file)
			{
				alert("Error subiendo el archivo " + file.name);
			},
			removedfile: function(file, serverFileName)
			{
				var name = file.name;
				
							var element;
							(element = file.previewElement) != null ? 
							element.parentNode.removeChild(file.previewElement) : 
							false;
					
			}
		});
  
                
                </script>
<?php } ?>
<?php if ($_page == 'nadadores_marcas') { ?>
<script type="text/javascript">
$( ".datepicker1" ).datepicker({
                yearRange: "1940:2005",
                changeMonth: true,
                changeYear: true,
                dateFormat: "yy-mm-dd",
                defaultDate: "-20y"
            });
</script>
<?php } ?>

<?php if ($_page == 'grupos') { ?>
<script type="text/javascript">

    $('.timepicker').wickedpicker({
        title: '',
        now: "09:00",
        twentyFour: true,
        timeSeparator: ':'
    });
    $('#actividad').change(function(){
        
        var valor = $(this).val();
        if (valor == 'Otra') {
            $("#otra_actividad").removeClass( "oculto" ); 
        } else {
            $("#otra_actividad").addClass( "oculto" ); 
        }
        
    });
    </script>
<?php } ?>

     <?php if ($_page == 'nadadores_calendario') { ?>
    <script type="text/javascript">
    

  $(document).ready(function() {

   
    $('#agenda').fullCalendar({
    defaultView: 'agendaWeek',    //3pm
    
                  
    events: [
        <?php 
        $min_hora = "23:00:00";
        foreach ($gru->horario as $Elem) { 
            if ($Elem['desde'] < $min_hora) { 
                $min_hora = $Elem['desde'];
            }
?>
                        {
        title:"<?php echo $Elem['actividad']?>",
        start: '<?php echo $Elem['desde']?>', // a start time (10am in this example)
        end: '<?php echo $Elem['hasta']?>', // an end time (6pm in this example)
        
        dow: [ <?php echo $Elem['dia']?> ], // Repeat monday and thursday
        <?php if ($Elem['actividad'] == 'Preparacion Física') { ?>
        color  : '#E2BF1C',
        <?php } else if ($Elem['actividad'] == 'Piscina') { ?>
            color  : '#1968BF',
            <?php } else { ?>
                color  : '#A2250F',
                
        <?php } ?>
        textColor: '#fff'
            
    },<?php } ?>],
    textColor: '#fff',
    scrollTime :  "<?php echo $min_hora;?>",
    
});
    

  });


      </script>
    <?php } ?>

        
