<!DOCTYPE html>
<html lang="en">
   <?php include('header.php');?>
   <body class="sidebar-light sidebar-expand navbar-brand-dark">
      <div id="wrapper" class="wrapper">
         <!-- HEADER & TOP NAVIGATION -->
         <?php include('cabeza.php');?>
         <!-- /.navbar -->
         <div class="content-wrapper">
            <!-- SIDEBAR -->
            <?php include('menu.php');?>
            <!-- /.site-sidebar -->
            <main class="main-wrapper clearfix">
               <!-- Page Title Area -->
               <div class="container-fluid">
                  <div class="row page-title clearfix">
                     <div class="page-title-left">
                        <h6 class="page-title-heading mr-0 mr-r-5">Clubes</h6>
                        <p class="page-title-description mr-0 d-none d-md-inline-block">Solicitud de torneo</p>
                     </div>
                     <!-- /.page-title-left -->
                     <div class="page-title-right d-none d-sm-inline-flex">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.html">Intro</a>
                           </li>
                           <li class="breadcrumb-item active">Solicitud de torneo</li>
                        </ol>
                     </div>
                     <!-- /.page-title-right -->
                  </div>
                  <!-- /.page-title -->
               </div>
               <div class="container-fluid">
                  <div class="widget-list row">
                     <div class="col-md-12 widget-holder">
                        <div class="widget-bg mx-auto" style="max-width: 800px;">
                           <div class="widget-body">
                              <form method="post" action="" id="solicitud_torneo" enctype="multipart/form-data">
                                 <div class="row " >
                                    <div class="form-group col-12">
                                       <label class="form-control-label" for="nombre_campeonato">Nombre del campeonato</label>
                                       <input class="form-control" id="nombre_campeonato" name="nombre_campeonato" placeholder="Nombre del campeonato" type="text"  value="">
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label class="form-control-label" for="instalacion">Lugar o instalación</label>
                                       <input class="form-control" id="instalacion" name="instalacion" placeholder="Lugar o instalación" type="text"  value="">
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label class="form-control-label" for="ciudad">Ciudad</label>                                            
                                       <input class="form-control" id="ciudad" name="ciudad" placeholder="Ciudad" type="text"  value="">
                                    </div>
                                    <div class="form-group col-12">
                                       <label class="form-control-label" for="organizador">Organizador</label>                                            
                                       <input class="form-control" id="organizador" name="organizador" placeholder="organizador" type="text" value="">
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label class="form-control-label" for="disciplina">Disciplina</label>                                            
                                       <select class="form-control" id="disciplina" name="id_disciplina" >
                                          <option value="">Seleccionar</option>
                                          <?php foreach($especialidades as $esp){ ?>
                                          <option value="<?=$esp['id']?>"><?=$esp['especialidad']?></option>
                                          <?php } ?>
                                       </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label class="form-control-label" for="juez">Juéz general</label>                                            
                                       <select class="form-control" id="juez" name="id_juez" disabled>
                                          <option value="">Seleccionar</option>
                                       </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label class="form-control-label"  for="fecha_desde">Fecha desde</label>
                                       <div class="input-group">
                                          <input type="text" class="form-control datepicker" name="fecha_desde" id="fecha_desde" value="">
                                          <div class="input-group-append">
                                             <div class="input-group-text"><i class="list-icon material-icons">date_range</i>
                                             </div>
                                             <!-- /.input-group-text -->
                                          </div>
                                          <!-- /.input-group-append -->
                                       </div>
                                       <!-- /.input-group -->
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label class="form-control-label"  for="fecha_hasta">Fecha hasta</label>
                                       <div class="input-group">
                                          <input type="text" class="form-control datepicker" name="fecha_hasta" id="fecha_hasta" value="">
                                          <div class="input-group-append">
                                             <div class="input-group-text"><i class="list-icon material-icons">date_range</i>
                                             </div>
                                             <!-- /.input-group-text -->
                                          </div>
                                          <!-- /.input-group-append -->
                                       </div>
                                       <!-- /.input-group -->
                                    </div>
                                    <div class="form-group col-12">
                                       <label class="form-control-label" for="persona_a_cargo">Persona a cargo</label>                                            
                                       <input class="form-control" id="persona_a_cargo" name="persona_a_cargo" placeholder="Persona a cargo" type="text" value="">
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label class="form-control-label" for="email">E-mail</label>                                            
                                       <input class="form-control" id="email" name="email" placeholder="E-mail" type="email"  value="">
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label class="form-control-label" for="telefono">Teléfono</label>                                            
                                       <input class="form-control" id="telefono" name="telefono" placeholder="Teléfono" type="text"  value="">
                                    </div>
                                    <div class="form-group col-12">
                                       <label class="form-control-label" for="bases_torneo">Subir bases del torneo</label>
                                       <div id="dropzone" class="dropzone"></div>
                                    </div>
                                    <div class="form-group col-12">
                                       <label class="form-control-label" for="notas">Notas</label>
                                       <textarea class="form-control" maxlength="500" rows="4" name="notas"></textarea>
                                    </div>
                                    <input type="hidden" name="id_user" value="<?= $idUser ?>">
                                    <input type="hidden" name="tipo_user" value="2">
                                    <div class="form-group col-12">
                                       <button class="btn btn-primary w-100" type="submit">Enviar</button>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </main>
        </div>
        <?php include('footer.php');?>
        </div>
        <?php include('cierre.php');?>
        <script type="text/javascript">
            Dropzone.autoDiscover = false;
            var myDropzone = new Dropzone("#dropzone", { 
                                                url: "uploads/uploads_torneos.php",
                                                autoProcessQueue: false,
                                                acceptedFiles: 'image/*,.jpeg,.jpg,.png,.xlsx,.xls,.doc,.docx,.pdf,.ppt,.pptx,.gif,.JPEG,.JPG,.PNG,.XLSX,.XLS,.DOC,.DOCX,.PDF,.PPT,.PPTX,.GIF,.zip',
                                                maxFiles: 2,
                                                addRemoveLinks: true
                                            });

            $('#solicitud_torneo').on("submit",function (e) {
                e.preventDefault();
                myDropzone.processQueue();
                let formData = new FormData(this);
                let myDropzoneFiles = myDropzone.files;
                for (let i = 0; i < myDropzoneFiles.length; i++) {
                    formData.append('file'+i, myDropzoneFiles[i]);
                }
                $.ajax({
                    url: 'uploads/uploads_torneos.php',
                    type: 'post',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        try {
                            let json = JSON.parse(response);
                            if(!json.error) alert("Solicitud enviada correctamente");
                        } catch (e) {
                            alert("Ocurrio un error");
                            console.log(response);
                            return;
                        }
                    },
                });
            });
         
            $('#disciplina').on("change",function (e) {
                $('#juez').attr('disabled',true);
                $('#juez').html('<option value="">Seleccionar</option>');
                $.post( "api/ajax.php", { endpoint : 'get_jueces', disciplina : this.value }, function( data ) {
                    try {
                        let json = JSON.parse(data);
                        $.each(json, function(index, item) {
                            console.log(item);
                            $('#juez').append($('<option>', {
                                value: item.id,
                                text: item.nombre + " " + item.apellido
                            }));
                            $('#juez').attr('disabled',false);
                        });
                    } catch (e) {
                        alert("Error al intentar cargar jueces");
                        console.log(data);
                        return;
                    }         
                });
            });

            $( ".datepicker" ).datepicker({
               autoclose: true,
               format: "yyyy-mm-dd"
            });
      </script>
   </body>
</html>