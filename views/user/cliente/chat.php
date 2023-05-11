<?php include $templates_header_cli ?>
<?php include $base_dir . "/models/model.reparacion.php"; ?>

<?php
$id = $_GET["id"];
$reparacion->getOne($id);
?>

<body>
    <?php include $templates_navbar_cli ?>

    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid mb-3">
        <div class="container text-center py-3">
            <h1 class="text-white display-3">Chat</h1>
            <div class="d-inline-flex align-items-center text-white">
                <p class="m-0"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-circle px-3"></i>
                <p class="m-0">Chat</p>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Services Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <!-- Información -->
                <div class="col-md-3">
                    <form action="controllers/controller.proyecto.php" method="post" id="form">
                        <div class="card" style="align-items: center; border-radius: 20px; background-color: #d7d7d7;">
                            <img class="img pt-1" src="resources/img/info.png" height="70" width="70">
                            <div class="card-body text-center">
                                <h6 class="card-title text-primary text-uppercase font-weight-bold">Información</h6>
                                <h5 class="card-text">Dispositivo: </h5>
                                <h6 class="card-text mb-3"><?= $reparacion->data->Descripcion ?></h6>
                                <h5 class="card-text mb">Problema:</h5>
                                <h6 class="card-text mb-3"><?= $reparacion->data->Problema ?></h6>
                                <h5 class="card-text mb">Estatus:</h5>
                                <h6 class="card-text mb-3"><?= $reparacion->data->Estatus_Clie ?></h6>
                                <h5 class="card-text mb">Diagnostico:</h5>
                                <h6 class="card-text mb-3"><?= $reparacion->data->Diagnostico ?></h6>
                                <!--<input type="text" placeholder="Nombre del proyecto" class="form-control" name="pro" value="<?= $reparacion->data->Diagnostico ?>"> -->
                            </div>
                        </div>
                        <!-- <input type="hidden" name="id_Reparacion" value="<?= $id ?>">
                        <?php
                        if ($id) {
                            echo "<input type='hidden' name='tipo' value='actualizar'>";
                        } else {
                            echo "<input type='hidden' name='tipo' value='nuevo'>";
                        }
                        ?>
                        <a href="?page=adm-proyecto" class="btn btn-dark">Cancelar</a>
                        <input type="submit" class="btn btn-primary" value="Guardar"> -->
                    </form>
                </div>

                <div class="col-md-9">
                    <div class="card" style="border-radius: 20px; background-color: #d7d7d7;">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-center bg-primary mb-4 p-2">
                                <h5 class="text-white font-weight-medium m-2">Tecnico: <?= $reparacion->data->Tecnico ?></h5>
                            </div>
                            <br><br><br><br><br><br><br><br><br><br><br><br>
                            <div class="input-group">
                                <input type="text" class="form-control border-dark" style="padding: 20px;" placeholder="Escribir Mensaje">
                                <a href="#"><button class="btn btn-primary py-2 px-4 ">Enviar</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center pt-5">
            <a class='btn btn-sm btn-primary' style='font-size: 25px; width: 50%;' href='?page=inicio'>Regresar</a>";
        </div>
    </div>


    <!-- Services End -->

    <?php include $templates_footer_cli ?>