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
                            <h6 class="page-title-heading mr-0 mr-r-5">Federación</h6>
                            <p class="page-title-description mr-0 d-none d-md-inline-block">Solicitudes de torneo</p>
                        </div>
                        <!-- /.page-title-left -->
                        <div class="page-title-right d-none d-sm-inline-flex">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Intro</a>
                            </li>
                            <li class="breadcrumb-item active">Solicitudes de torneo</li>
                            </ol>
                        </div>
                        <!-- /.page-title-right -->
                    </div>
                    <!-- /.page-title -->
                </div>
                <table id="solicitudesTable" class="table-striped" data-columns="nombre,lugar_ciudad,tipo,disciplina,juez,fecha_desde,fecha_hasta,organizador,info_persona_a_cargo,documentos,notas,estado_torneo">
                    <thead>
                        <tr>
                            <th>Torneo</th>
                            <th>Lugar</th>
                            <th>Tipo</th>
                            <th>Disciplina</th>
                            <th>Juez</th>
                            <th>Desde</th>
                            <th>Hasta</th>
                            <th>Organizador</th>
                            <th>Persona a cargo</th>
                            <th>Documentos</th>
                            <th>Notas</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                </main>
            </div>
            <?php include('footer.php');?>
        </div>
        <?php include('cierre.php');?>
        <style>
            button.set-estado{
            margin: 3px;
            }
            .down_doc{
            cursor: pointer;
            text-decoration: underline;
            color: blue !important;
            }
        </style>
        <script>
            let estados = ['<button class="btn btn-success set-estado" data-estado="1">Aceptar</button><button class="btn btn-danger set-estado" data-estado="2">Rechazar</button>',
                            '<span class="text-success">Aceptado</span>',
                            '<span class="text-danger">Rechazado</span>'
                        ];
            
            function estadoRender(data, type, row) {
                let torneo = data.split('|')[0];
                let estado = data.split('|')[1];
                data = estados[estado];
                return '<div data-torneo="'+torneo+'">'+data+'</div>';
            }

            $(document).ready(function() {
                let columnsArray = [];
                let dataColumns = $('#solicitudesTable').data('columns');
                if (dataColumns) {
                    let columnNames = dataColumns.split(',');
                    columnNames.forEach(function(columnName) {
                        let column = { data: columnName };
                        if(columnName=='estado_torneo') column.render = estadoRender;
                        columnsArray.push(column);
                    });
                }
                $('#solicitudesTable').DataTable({
                    responsive: true,
                    order: [],
                    columnDefs: [{ "orderable": false, "targets": "_all"}],
                    ajax: {
                        url: 'api/ajax.php?endpoint=get_solicitudes',
                    },
                    columns: columnsArray
                });
                
                $('#solicitudesTable tbody').on('click', '.set-estado', function() {
                    let parentElement = $(this).closest('div');
                    let torneo = parentElement.data('torneo');
                    let estado = this.dataset.estado;
                    
                    $.post( "api/ajax.php", { endpoint : 'set_estado_solicitud', estado : estado, id: torneo }, function( response ) {
                        try {
                            let json = JSON.parse(response);
                            if(!json.error){
                                $('[data-torneo="'+torneo+'"]').html(estados[estado]);
                            }
                        } catch (e) {
                            alert("Ocurrio un error");
                            console.log(response);
                            return;
                        }      
                    });
                });

                $('#solicitudesTable tbody').on('click', '.down_doc', function() {
                    let data = data.split('|');
                    location.href = 'api/ajax.php?endpoint=download_doc&type'+data[0]+'|'+data[1]+'f'+data[2];
                });
            });
        </script>
   </body>
</html>