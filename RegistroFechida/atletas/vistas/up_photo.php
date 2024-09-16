<!DOCTYPE html>
<html lang="en">

<?php include('header.php');?>
<style>
    .pace{
        z-index: 10000;
    }
</style>
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
                        <h6 class="page-title-heading mr-0 mr-r-5">Mis datos</h6>
                        <p class="page-title-description mr-0 d-none d-md-inline-block">Foto de perfil</p>
                    </div>
               
                    <!-- /.page-title-left -->
                    <div class="page-title-right d-none d-sm-inline-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Intro</a>
                            </li>
                            <li class="breadcrumb-item active">Foto de perfil</li>
                        </ol>
                    </div>
                    <!-- /.page-title-right -->
                </div>
                <!-- /.page-title -->
            </div>
            <!-- /.container-fluid -->
            <!-- =================================== -->
            <!-- Different data widgets ============ -->
            <!-- =================================== -->
            <div class="container-fluid">
                <div class="widget-list row">
                    <div class="col-md-12 widget-holder">
                        <div class="widget-bg">
                                <div class="widget-body">

                        <h5 class="box-title">Subir foto de perfil</h5>

<iframe src="imgViewer" id="imgViewer" frameborder="0"></iframe>
                        <a href="<?=$authj->rowff['gg']?>" download="documento.pdf">jbvljdk</a>
                        <div id="dropzone_photo" class="dropzone">

                        </div>
<div id="feedback"></div>


                        </div>
                </div>
            </div>
                   
                   
                    <!-- /.widget-holder -->
                </div>
                <!-- /.widget-list -->
            </div>
            <!-- /.container-fluid -->
        </main>
        
        <!-- /.main-wrappper -->
        <!-- RIGHT SIDEBAR -->
     
        <!-- CHAT PANEL -->
       
        <!-- /.chat-panel -->
    </div>
    <!-- /.content-wrapper -->
    <!-- FOOTER -->
    <?php include('footer.php');?>
    </div>
    <!--/ #wrapper -->
    <?php include('cierre.php');?>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/blazeface"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.js"></script>
    <script type="text/javascript">
		Dropzone.autoDiscover = false;
        var dropzonePhoto = new Dropzone("#dropzone_photo", {
			url: "uploads/perfil.php",
			addRemoveLinks: true,
			dictResponseError: "Ha ocurrido un error en el server",
			acceptedFiles: 'image/*,.jpeg,.jpg,.png,.JPEG,.JPG,.PNG',
			uploadMultiple: false,
			maxFiles: 1,
            autoProcessQueue: false,
            init: function() {
                this.on("addedfile", function(file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const imageData = e.target.result;
                        findFaces(imageData, file);
                    };
                    reader.readAsDataURL(file);
                });
            },
			complete: function(file, response){
				try {
                    let err = JSON.parse(file.xhr.response).error;
                    if(!err){
                        location.href = 'intro.php';
                    }else{
                        feedback.innerHTML = '<div class="alert alert-danger">Ocurrio un error</div>';
                        this.removeFile(file);
                    }   
                } catch (error) {
                    feedback.innerHTML = '<div class="alert alert-danger">Ocurrio un error</div>';
                }
			},
            error: function(file, response){
                feedback.innerHTML = '<div class="alert alert-danger">Ocurrio un error</div>';
			}
		});  

        async function findFaces(imageData, file) {
            $(".pace").removeClass('pace-inactive');
            const model = await blazeface.load();
            const img = new Image();
            img.src = imageData;
        
            img.onload = async function() {
                const predictions = await model.estimateFaces(img, false);
                if (predictions.length == 1) {
                    dropzonePhoto.processQueue();
                   
                } else {
                    feedback.innerHTML = '<div class="alert alert-danger">Solo puedes subir una imagen de tu rostro</div>';
                    dropzonePhoto.removeFile(file);
                }
                $(".pace").addClass('pace-inactive');
            };
        }

        $.ajax({
    url: 'descargar_licencia.php', // Cambia esto a tu archivo PHP
    method: 'GET',
    success: function(response) {
        var pdfDataUri = 'data:application/pdf;base64,' + response.pdfContent;

        // Cargar pdf.js
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.worker.js';

        // Cargar el PDF y renderizarlo como imagen en un canvas
        var canvas = document.createElement('canvas');
        var context = canvas.getContext('2d');
        var pdfDocument;

        pdfjsLib.getDocument(pdfDataUri).promise.then(function(pdf) {
            pdfDocument = pdf;
            return pdf.getPage(1);
        }).then(function(page) {
            var viewport = page.getViewport({ scale: 1 });
            canvas.width = viewport.width;
            canvas.height = viewport.height;

            // Configurar el fondo blanco antes de renderizar
            context.fillStyle = 'white';
            context.fillRect(0, 0, canvas.width, canvas.height);
            
            var renderContext = {
                canvasContext: context,
                viewport: viewport
            };
            
            return page.render(renderContext);
        }).then(function() {
            var imgViewer = document.getElementById('imgViewer'); // Cambia 'imgViewer' al ID de tu iframe
            imgViewer.src = canvas.toDataURL();
        });
    },
    error: function(response, error) {
        console.log(response, error);
        alert('Error al obtener el PDF');
    }
});



    </script>
</body>

</html>