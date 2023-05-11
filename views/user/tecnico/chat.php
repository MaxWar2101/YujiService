<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}
?>

<?php include $templates_header_tec ?>
<?php include $base_dir . "/models/model.reparacion.php"; ?>
<?php include $base_dir . "/models/model.cotizacion.php"; ?>
<?php include $base_dir . "/models/model.estatus.php"; ?>

<?php
$id = $_GET["id"];
$reparacion->getOne($id);
$cotizacion->getOne($id);
?>

<body>
    <?php include $templates_navbar_tec ?>

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
        <form action="controllers/controller.reparacionUpdate.php" method="post" id="form">
            <div class="row">
                <!-- Información -->
                <div class="col-md-2">
                    <div class="card" style="align-items: center; border-radius: 20px; background-color: #d7d7d7;">
                        <img class="img pt-1" src="resources/img/info.png" height="70" width="70">
                        <div class="card-body text-center">
                            <h6 class="card-title text-primary text-uppercase font-weight-bold">Información</h6>
                            <h5 class="card-text">Dispositivo: </h5>
                            <h6 class="card-text mb-3"><?= $reparacion->data->Descripcion ?></h6>
                            <h5 class="card-text mb">Problema:</h5>
                            <h6 class="card-text mb-3"><?= $reparacion->data->Problema ?></h6>
                            <h5 class="card-text mb">Estatus:</h5>
                            <h6 class="card-text mb-3"><?= $estatus->selectT($reparacion->data->fk_Estatus); ?></h6>
                            <h5 class="card-text mb">Diagnostico:</h5>
                            <input type="text" placeholder="Ingrese Diagnostico" class="form-control mb-3" name="dia" value="<?= $reparacion->data->Diagnostico ?>">
                            <h5 class="card-text mb">Cotizacion:</h5>
                            <input type="text" placeholder="150" class="form-control" name="cot" value="<?= $cotizacion->data->Valor_Reparacion ?>">
                        </div>
                    </div>
                </div>

                <!-- Chat -->
                <div class="col-md-8">
                    <div class="card" style="border-radius: 20px; background-color: #d7d7d7;">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-center bg-primary mb-4 p-2">
                                <h4 class="text-white font-weight-medium m-0">Chat</h4> <br>
                                <h5 class="text-white font-weight-medium m-2"> <?= $reparacion->data->Cliente ?></h5>
                            </div>
                            <br><br><br><br><br><br><br><br><br><br><br><br>
                            <div class="input-group">
                                <input type="text" class="form-control border-dark" style="padding: 20px;" placeholder="Escribir Mensaje">
                                <a href="#"><button class="btn btn-primary py-2 px-4 ">Enviar</button></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Notas -->
                <div class="col-md-2">
                    <div class="card" style="align-items: center; border-radius: 20px; background-color: #d7d7d7;">
                        <img class="img pt-1" src="resources/img/notas.png" height="70" width="70">
                        <div class="card-body text-center">
                            <h6 class="card-title text-primary text-uppercase font-weight-bold">Notas</h6>
                            <textarea class="form-control" name="not" rows="12" cols="50"><?=$reparacion->data->Notas?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <input type="hidden" name="id" value="<?= $id ?>">
            <?php
            if ($id) {
                echo "<input type='hidden' name='tipo' value='actualizar'>";
            } else {
                echo "<input type='hidden' name='tipo' value='nuevo'>";
            }
            ?>
            <div class="row pt-3 justify-content-center">
                <a href="?page=tec-inicio" class="btn btn-dark">Cancelar</a>
                <input type="submit" class="btn btn-primary" value="Guardar">
            </div>

        </form>

    </div>
    <!-- Services End -->

    <?php include $templates_footer_tec ?>