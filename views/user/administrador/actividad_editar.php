<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}
?>
<?php
include $base_dir . "/models/model.actividad.php";
include $base_dir . "/models/model.usuario.php";
include $base_dir . "/models/model.proyecto.php";
include $base_dir . "/models/model.estatus.php";
$id = $_GET['id'];
$actividad->getOne($id);
?>
<?php include $templates_header_adm ?>

<body>
    <?php include $templates_navbar_adm ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="controllers/controller.actividad.php" method="post" id="form">
                            <div class="form-group">
                                <label>Actividad</label>
                                <input type="text" class="form-control" name="act" value="<?= $actividad->data->actividad ?>">
                            </div>
                            <div class="form-group">
                                <label>Asignado</label>
                                <input type="date" class="form-control" name="asi" value="<?= $actividad->data->asignado ?>">
                            </div>
                            <div class="form-group">
                                <label>Gerente</label>
                                <?php
                                $usuario->selectG($actividad->data->idGerente);
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Empleado</label>
                                <?php
                                $usuario->selectU($actividad->data->idUsuario);
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Fecha inicio</label>
                                <input type="date" class="form-control" name="fein" value="<?= $actividad->data->fecha_inicio ?>">
                            </div>
                            <div class="form-group">
                                <label>Fecha Final</label>
                                <input type="date" class="form-control" name="fefi" value="<?= $actividad->data->fecha_fin ?>">
                            </div>
                            <div class="form-group">
                                <label>Proyecto</label>
                                <?php
                                $proyecto->selectG($actividad->data->idProyecto);
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Estatus</label>
                                <?php
                                $estatus->select($actividad->data->idEstatus);
                                ?>
                            </div>

                            <input type="hidden" name="id" value="<?= $id ?>">
                            <?php
                            if ($id) {
                                echo "<input type='hidden' name='tipo' value='actualizar'>";
                            } else {
                                echo "<input type='hidden' name='tipo' value='nuevo'>";
                            }
                            ?> <a href="?page=adm-actividad" class="btn btn-dark">Regresar</a>
                            <input type="submit" class="btn btn-primary" value="Guardar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>

    <?php include $templates_footer_adm ?>