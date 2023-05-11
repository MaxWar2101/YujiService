<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}
?>

<?php include $templates_header_tec ?>
<?php include $base_dir . "/models/model.reparacion.php"; ?>


<body>
    <?php include $templates_navbar_tec ?>
    <main role="main">
        <!-- Header Start -->
        <div class="jumbotron jumbotron-fluid mb-3">
            <div class="container text-center py-2">
                <h1 class="text-white display-3">Dispositivos Disponibles</h1>
                <div class="d-inline-flex align-items-center text-white">
                    <p class="m-0"><a class="text-white" href="">Home</a></p>
                    <i class="fa fa-circle px-3"></i>
                    <p class="m-0">Dispositivos</p>
                </div>
            </div>
        </div>
        <!-- Header End -->

        <!-- Contenedor -->
        <div class="container-fluid ">
            <hr>
            <div class="text-center pb-2">
                <h6 class="text-primary text-uppercase font-weight-bold">Dispositivos</h6>
                <h1>Elija un dispositivo para ver sus detalles </h1>
            </div>
            <!-- <div class="text-center">
                <a href='#dis'><button class="btn btn-primary">Dispositivos</button> </a>
                <a href='#det'><button class="btn btn-primary">Detalles</button> </a>
            </div> -->
            <hr>
            <!-- Dispositivos -->
            <div class="row">
                <div class="col-md-8">
                    <?php
                    $reparacion->getAll();

                    while ($row = $reparacion->next() ) {
                        echo
                        "<div class='row' id='dis'>
                                <div class='col-md-12'>
                                    <div class='row align-items-center' style='border-radius: 20px; background-color: #d7d7d7;'>
                                        <div class='col-md-1'>
                                            <img class='img p-1' src='resources/img/celular.png' height='70' width='70'>
                                        </div>
                                        <div class='col-md-9'>
                                            <h6 class='text-primary text-uppercase font-weight-bold pt-1'>Información:</h6>
                                            <h5>" . $row->Tipo_Dispositivo . " " . $row->Descripcion . "</h5>
                                        </div>
                                        <div class='col-md-2 text-center'>
                                            <a href='?page=tec-inicio&id=$row->id_Reparacion'><button class='btn btn-primary py-2 px-3' >Ver</button></a>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>";
                    }
                    ?>
                </div>
                <!-- Dispositivos -->

                <!-- Detalles -->
                <div class="col-md-4">
                    <?php
                    $id = $_GET["id"];
                    $reparacion->getOne($id);
                    ?>
                    <div class="row justify-content-center" id="det">
                        <div class="col-md-12" id="detalles">
                            <div class="card" style="border-radius: 20px; background-color: #d7d7d7;">
                                <div class="card-body">
                                    <h3 class="card-title text-center text-white bg-primary mb-4 p-2 ">Detalles</h3>
                                    <h5 class="text-primary font-weight-bold">Dispositivo: </h5>
                                    <h5 class="card-text mb-2"><?= $reparacion->data->Tipo_Dispositivo ?></h5>
                                    <h5 class="text-primary font-weight-bold">Descripción:</h5>
                                    <h5 class="card-text mb-2"><?= $reparacion->data->Descripcion ?></h5>
                                    <h5 class="text-primary font-weight-bold">Problema:</h5>
                                    <h5 class="card-text mb-2"><?= $reparacion->data->Problema ?></h5>
                                    <h5 class="text-primary font-weight-bold">Fecha de Recibido:</h4>
                                    <h5 class="card-text mb-2"><?= $reparacion->data->Fecha_Recibido ?></h5>
                                    <h5 class="text-primary font-weight-bold">Estatus:</h5>
                                    <h5 class="card-text mb-2"><?= $reparacion->data->Estatus_Tec ?></h5>
                                    <h5 class="text-primary font-weight-bold">Diagnostico:</h5>
                                    <h5 class="card-text mb-2"><?= $reparacion->data->Diagnostico ?></h5>
                                </div>
                                <div class="card-footer text-center">
                                    <?php echo "<a class='btn btn-primary px-3' href='?page=tec-chat&id=$id'>Asignar</a>"; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Detalles -->
                </div>
            </div>
        </div>
        <!-- Contenedor -->
        <hr>
    </main>
    <?php include $templates_footer_tec ?>