<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=amd-incio');
}
?>
<?php
include $base_dir . "/models/model.proyecto.php";
include $base_dir . "/models/model.usuario.php";
include $base_dir . "/models/model.estatus.php";
$id = $_GET['id'];
$proyecto->getOne($id);
?>
<?php include $templates_header_adm ?>

<body>
    <?php include $templates_navbar_adm ?>
    <br>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="card-header text-center p-1">
                    <h1>Proyectos</h1>
                    <legend>Ingrese los datos</legend>
                </div>
                <form action="controllers/controller.proyecto.php" method="post" id="form">
                    <div class="contenedor">
                        <div class="row justify-content-center m-3">
                            <div class="col-md-4">
                                <label>Proyecto</label>
                                <input type="text" placeholder="Nombre del proyecto" class="form-control" name="pro" value="<?= $proyecto->data->proyecto ?>">
                            </div>
                        </div>

                        <div class="row justify-content-center m-3">
                            <div class="col-md-4">
                                <label>Fecha Inicio</label>
                                <input type="date" placeholder="Seleccione Fecha" class="form-control" name="fein" value="<?= $proyecto->data->fecha_inicio ?>">
                            </div>
                            <div class="col-md-4">
                                <label>Fecha Final</label>
                                <input type="date" placeholder="00/00/0000" class="form-control" name="fefi" value="<?= $proyecto->data->fecha_fin ?>">
                            </div>
                        </div>

                        <div class="row justify-content-center m-3">
                            <div class="col-md-2">
                                <label>Gerente</label>
                                <?php
                                $usuario->selectG($proyecto->data->idGerente);
                                ?>
                            </div>
                            <div class="col-md-2">
                                <label>Estatus</label>
                                <?php
                                $estatus->select($proyecto->data->idEstatus);
                                ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <?php
                    if ($id) {
                        echo "<input type='hidden' name='tipo' value='actualizar'>";
                    } else {
                        echo "<input type='hidden' name='tipo' value='nuevo'>";
                    }
                    ?>
                    <a href="?page=adm-proyecto" class="btn btn-dark">Regresar</a>
                    <input type="submit" class="btn btn-primary" value="Guardar">
                </form>
            </div>
        </div>
    
    </div>

    <?php include $templates_footer_adm ?>