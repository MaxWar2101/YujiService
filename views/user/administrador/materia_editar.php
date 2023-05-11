<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}

    include $base_dir . "/models/model.materia.php";
    $id = $_GET['id'];
    $materia->getOne($id);

?>

<?php include $templates_header_adm?>
    <body>
<?php include $templates_navbar_adm ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="controllers/controller.materia.php" method="post">
                        <div class="form-group">
                            <label>Clave</label>
                            <input class="form-control" type="text" name='clave' value='<?=$materia->data->ClaveMateria?>'/>
                        </div>
                        <div class="form-group">
                                <label>Materia</label>
                                <input type="text" class="form-control" name="materia" value="<?=$materia->data->Materia?>">
                                <input type="hidden" name="id" value="<?= $id ?>">
                                <?php
                                if($id) {
                                    echo "<input type='hidden' name='tipo' value='actualizar'>";
                                } else {
                                    echo "<input type='hidden' name='tipo' value='nuevo'>";
                                }
                                ?>
                            </div>
                            <a href="?page=adm-materia" class="btn btn-dark">Regresar</a>
                            <input type="submit" class="btn btn-primary" value="Guardar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>

<?php include $templates_footer_adm ?>