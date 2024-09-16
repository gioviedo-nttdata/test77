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
                        <h6 class="page-title-heading mr-0 mr-r-5">Mi datos</h6>
                        <p class="page-title-description mr-0 d-none d-md-inline-block">Certificado de nacimiento</p>
                    </div>
                    <!-- /.page-title-left -->
                    <div class="page-title-right d-none d-sm-inline-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Intro</a>
                            </li>
                            <li class="breadcrumb-item active">Certificado de nacimiento</li>
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
                        <h5 class="box-title">Subir certificado de nacimiento</h5>
                       
                        <div id="dropzone_certificado" class="dropzone"></div>

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

    <script type="text/javascript">
		Dropzone.autoDiscover = false;
		$("#dropzone_certificado").dropzone({
			url: "uploads/up_document.php",
			addRemoveLinks: true,
			dictResponseError: "Ha ocurrido un error en el server",
			acceptedFiles: '.PDF',
			uploadMultiple: false,
			maxFiles: 1,
			complete: function(file, response){
                console.log(file);
				try {
                    let err = JSON.parse(file.xhr.response).error;
                    if(!err){
                        //location.href = 'intro.php';
                    }else{
                        alert("Ocurrio un error");
                    }   
                } catch (error) {
                    alert("Ocurrio un error");
            //        location.href = 'intro.php';
                }
			}
		});  
    </script>
</body>

</html>