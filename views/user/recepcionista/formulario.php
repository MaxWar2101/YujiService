<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=inicio');
}
?>
<?php include $base_dir . "/models/model.usuario.php"; ?>
<?php include $base_dir . "/models/model.estatus.php"; ?>
<?php include $base_dir . "/models/model.tipousuario.php"; ?>
<?php include $base_dir . "/models/model.reparacion.php"; ?>
<?php include $base_dir . "/models/model.tipodispositivo.php"; ?>

<?php include $templates_header_rec ?>

<body>
    <?php include $templates_navbar_rec ?>
    <main role="main">
        <!-- Header Start -->
        <div class="jumbotron jumbotron-fluid mb-3">
            <div class="container text-center py-3">
                <h1 class="text-white display-3">Bienvenido</h1>
                <div class="d-inline-flex align-items-center text-white">
                    <p class="m-0"><a class="text-white" href="#">Recepcionista</a></p>
                    <i class="fa fa-circle px-3"></i>
                    <p class="m-0">Formularios</p>
                </div>
            </div>
        </div>
        <!-- Header End -->

        <!-- Form´s Start -->
        <div class="container">
            <div class="row">
                <!-- Registro Usuarios-->
                <div class="col-md-6" id="usuario">
                    <div class="card" style="border-radius: 20px; background-color: #d7d7d7;">
                        <h2 class="card-header text-center text-primary font-weight-bold">Formulario de Usuarios</h2>
                        <div class="card-body">
                            <h4 class="card-title text-center text-white bg-primary mb-4 p-2">Ingrese los datos</h4>
                            <form action="controllers/controller.usuario.php" method="post" id="form">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" placeholder="Nombre" class="form-control" name="nom" value="<?= $usuario->data->Nombre ?>">
                                </div>
                                <div class="form-group">
                                    <label>Apellido P.</label>
                                    <input type="text" class="form-control" name="apep" value="<?= $usuario->data->Apellido_P ?>">
                                </div>
                                <div class="form-group">
                                    <label>Apellido M.</label>
                                    <input type="text" class="form-control" name="apem" value="<?= $usuario->data->Apellido_M ?>">
                                </div>
                                <div class="form-group">
                                    <label>Telefono</label>
                                    <input type="text" class="form-control" name="tel" value="<?= $usuario->data->Telefono ?>">
                                </div>
                                <div class="form-group">
                                    <label>Correo</label>
                                    <input type="email" class="form-control" name="cor" required value="<?= $usuario->data->Correo ?>">
                                </div>
                                <div class="form-group">
                                    <label>Tipo Usuario</label>
                                    <h6 class="card-text mb-3"><?= $tipousuario->select($tipousuario->data->tipoUsuario); ?></h6>
                                </div>
                                <div class="form-group">
                                    <label>Sexo</label>
                                    <input type="text" class="form-control" name="sex" value="<?= $usuario->data->Sexo ?>">
                                </div>
                                <div class="form-group">
                                    <label>Contraseña</label>

                                    <div class="input-group">
                                        <input id="txtPassword" type="password" class="form-control" name="con" value="<?= $usuario->data->Contrasena ?>">
                                        <div class="input-group-append">
                                            <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
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
                                <div class="card-footer text-center">
                                    <a href="?page=rec-formulario" class="btn btn-danger">Cancelar</a>
                                    <input type="submit" class="btn btn-primary" value="Guardar">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Registro Dispositivos-->
                <div class="col-md-6" id="dispositivos">
                    <div class="card" style="border-radius: 20px; background-color: #d7d7d7;">
                        <h2 class="card-header text-center text-primary font-weight-bold">Formulario de Dispositivos</h2>
                        <div class="card-body">
                            <h4 class="card-title text-center text-white bg-primary mb-4 p-2">Ingrese los datos</h4>
                            <form action="controllers/controller.reparacion.php" method="post" id="form">
                                <div class="form-group">
                                    <label>Descripción</label>
                                    <input type="text" class="form-control" name="des" value="">
                                </div>
                                <div class="form-group">
                                    <label>Problema</label>
                                    <input type="text" class="form-control" name="pro" value="">
                                </div>
                                <div class="form-group">
                                    <label>Fecha Recibido</label>
                                    <input type="date" class="form-control" name="fere" value="">
                                </div>
                                <div class="form-group">
                                    <label>Tipo de Dispositivo</label>
                                    <h6 class="card-text mb-3"><?= $tipodispositivo->select($tipodispositivo->data->Tipo_Dispositivo); ?></h6>
                                </div>
                                <div class="form-group">
                                    <label>Cliente</label>
                                    <h6 class="card-text mb-3"><?= $usuario->selectC($usuario->data->Nombre); ?></h6>
                                </div>
                                <div class="form-group">
                                    <label>Tecnico</label>
                                    <h6 class="card-text mb-3"><?= $usuario->selectT($usuario->data->Nombre); ?></h6>
                                </div>
                                <div class="form-group">
                                    <label>Estatus</label>
                                    <h6 class="card-text mb-3"><?= $estatus->selectC($estatus->data->Estatus_Clie); ?></h6>
                                </div>
                                <div class="form-group">
                                    <label>Fecha Entregado</label>
                                    <input type="date" class="form-control" name="feen" value="">
                                </div>

                                <input type="hidden" name="id" value="<?= $id ?>">
                                <?php
                                if ($id) {
                                    echo "<input type='hidden' name='tipo' value='actualizar'>";
                                } else {
                                    echo "<input type='hidden' name='tipo' value='nuevo'>";
                                }
                                ?>
                                <div class="card-footer text-center">
                                    <a href="?page=rec-formulario" class="btn btn-danger">Cancelar</a>
                                    <input type="submit" class="btn btn-primary" value="Guardar">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Registro Dispositivos-->

        </div>
    </main>
    <?php include $templates_footer_rec ?>