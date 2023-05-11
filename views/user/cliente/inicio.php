<?php include $templates_header_cli ?>
<?php include $base_dir . "/models/model.reparacion.php"; ?>

<?php
$id = $_POST["codigo"];
$reparacion->getOne($id);
?>

<body>
    <?php include $templates_navbar_cli ?>
    <div class="jumbotron jumbotron-fluid mb-3">
        <div class="container text-center py-3">
            <h1 class="text-white display-3">Seguimiento de Dispositivo</h1>
            <div class="d-inline-flex align-items-center text-white">
                <p class="m-0"><a class="text-white" href="index.html">Home</a></p>
                <i class="fa fa-circle px-3"></i>
                <p class="m-0">Seguimiento</p>
            </div>
        </div>
    </div>

    <!-- Contenedor con los datos del Codigo -->
    <div class="container-fluid">
        <div class="container">
            <div class="text-center pb-2">
                <h6 class="text-primary text-uppercase font-weight-bold">Información</h6>
                <h1>Detalles del Servicio</h1>
            </div>
            <div class="card" style=" border-radius: 20px; background-color: #d7d7d7;">
                <div class="row">
                    <div class="col-lg-6 col-md-6 text-center mb-4">
                        <div class="d-flex align-items-center justify-content-center bg-primary mb-1 p-3">
                            <h4 class="text-white font-weight-medium m-0">Descripción del Dispositivo</h4>
                        </div>
                        <h5 class="text-primary bg-white p-2"><?= $reparacion->data->Descripcion ?></h5>
                    </div>
                    <div class="col-lg-6 col-md-6 text-center mb-4">
                        <div class="d-flex align-items-center justify-content-center bg-primary mb-1 p-3">
                            <i class="fa fa-2x fa-ship text-dark pr-3"></i>
                            <h4 class="text-white font-weight-medium m-0">Estatus</h4>
                        </div>
                        <h5 class="text-primary bg-white p-2"><?= $reparacion->data->Estatus_Clie ?></h5>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6 text-center mb-4">
                        <div class="d-flex align-items-center justify-content-center bg-primary mb-1 p-3">
                            <i class="fa fa-2x fa-truck text-dark pr-3"></i>
                            <h4 class="text-white font-weight-medium m-0">Problema</h4>
                        </div>
                        <h5 class="text-primary bg-white p-2"><?= $reparacion->data->Problema ?></h5>
                    </div>

                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6 text-center mb-4">
                        <div class="d-flex align-items-center justify-content-center bg-primary mb-1 p-3">
                            <i class="fa fa-2x fa-store text-dark pr-3"></i>
                            <h4 class="text-white font-weight-medium m-0">Tecnico Encargado</h4>
                        </div>
                        <h5 class="text-primary bg-white p-2"><?= $reparacion->data->Tecnico ?></h5>
                    </div>
                </div>
                <?php echo "<a class='btn btn-sm btn-primary' style='font-size: 25px;' href='?page=cli-chat&id=$id'>Chat con el Tecnico</a>"; ?>
            </div>
        </div>
        <div class="row justify-content-center pt-5">
            <a class='btn btn-sm btn-primary' style='font-size: 25px; width: 50%;' href='?page=inicio'>Regresar</a>";
        </div>
    </div>
    <!-- Contenedor con los datos del Codigo -->

    <?php include $templates_footer_cli ?>