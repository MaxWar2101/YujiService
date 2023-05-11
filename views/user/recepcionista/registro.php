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
    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid mb-3">
        <div class="container text-center py-3">
            <h1 class="text-white display-3">Bienvenido</h1>
            <div class="d-inline-flex align-items-center text-white">
                <p class="m-0"><a class="text-white" href="#">Recepcionista</a></p>
                <i class="fa fa-circle px-3"></i>
                <p class="m-0">Registros</p>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <hr>
    <div class="row justify-content-center p-1">
        <div class="text-center">
            <a href='#usu'><button class="btn btn-primary py-2 px-3">Usuario</button> </a>
            <a href='#dis'><button class="btn btn-primary py-2 px-3">Dispositivos</button> </a>
        </div>
    </div>
    <hr>

    <div class="container" id="usu">
        <!-- Usuarios -->
        <div class="card">
            <div class="card-header bg-primary ">
                <div class="row align-items-center text-center">
                    <div class="col-md-6">
                        <h1 class="text-white">Usuarios</h1>
                    </div>
                    <div class="col-md-6">
                        <form class="form-inline" action="?page=rec-registro" method="POST">
                            <button class="btn btn-info mr-sm-2" type="submit">Todos</button>
                            <input class="form-control mr-sm-2" name="buscar1" type="search" placeholder="Search"
                                aria-label="Search">
                            <button class="btn btn-success mr-sm-2" type="submit">Buscar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr class="table-dark">
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Telefono</th>
                            <th>Tipo Usuario</th>
                            <th>Sexo</th>
                            <th>Contraseña</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $buscar1 = $_POST["buscar1"];
                        if ($buscar1) {
                            $usuario->getWhere("Nombre LIKE '%{$buscar1}%'");
                        } else {
                            $usuario->getAll();
                        }

                        while ($row = $usuario->next()) {
                            echo "<tr>";
                            echo "<td>" . $row->Nombre . "</td>";
                            echo "<td>" . $row->Apellido_P . "</td>";
                            echo "<td>" . $row->Apellido_M . "</td>";
                            echo "<td>" . $row->Telefono . "</td>";
                            echo "<td>" . $row->tipoUsuario . "</td>";
                            echo "<td>" . $row->Sexo . "</td>";
                            echo "<td>" . $row->Contrasena . "</td>";
                            echo "<td>
                                    <a class='btn btn-sm btn-primary' href='?page=adm-usuario-editar&id=$row->id_Usuario'>Editar</a>
                                    <a class='btn btn-sm btn-danger linkborrar' href='$row->id_Usuario' data-toggle='modal' data-target='#deleteModal'>Borrar</a>
                                </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Usuarios -->
    </div>

    <br>

    <div class="container-fluid" id="dis">
        <!-- Dispositivos -->
        <div class="card">
            <div class="card-header bg-primary ">
                <div class="row align-items-center text-center">
                    <div class="col-md-6">
                        <h1 class="text-white">Dispositivos</h1>
                    </div>
                    <div class="col-md-6">
                        <form class="form-inline" action="?page=rec-registro" method="POST">
                            <button class="btn btn-info mr-sm-2" type="submit">Todos</button>
                            <input class="form-control mr-sm-2" name="buscar" type="search" placeholder="Search"
                                aria-label="Search">
                            <button class="btn btn-success mr-sm-2" type="submit">Buscar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr class="table-dark">
                            <th>Descripcion</th>
                            <th>Problema</th>
                            <th>Recibido</th>
                            <th>Dispositivo</th>
                            <th>Cliente</th>
                            <th>Tecnico</th>
                            <th>Diagnostico</th>
                            <th>Estatus</th>
                            <th>Entregado </th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $buscar = $_POST["buscar"];
                        if ($buscar) {
                            $reparacion->getWhere("Descripcion LIKE '%{$buscar}%'");
                        } else {
                            $reparacion->getAll();
                        }

                        while ($row = $reparacion->next()) {
                            echo "<tr>";
                            echo "<td>" . $row->Descripcion . "</td>";
                            echo "<td>" . $row->Problema . "</td>";
                            echo "<td>" . $row->Fecha_Recibido . "</td>";
                            echo "<td>" . $row->Tipo_Dispositivo . "</td>";
                            echo "<td>" . $row->Cliente . "</td>";
                            echo "<td>" . $row->Tecnico . "</td>";
                            echo "<td>" . $row->Diagnostico . "</td>";
                            echo "<td>" . $row->Estatus_Clie . "</td>";
                            echo "<td>" . $row->Fecha_Entregado . "</td>";
                            echo "<td>
                                    <a class='btn btn-sm btn-primary' href='?page=adm-reparacion-editar&id=$row->id'>Editar</a>
                                    <a class='btn btn-sm btn-danger linkborrar' href='$row->id' data-toggle='modal' data-target='#deleteModal'>Borrar</a>
                                </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <hr>
    <div class="row justify-content-center">
        <div class="text-center">
            <a href='#usu'><button class="btn btn-primary py-2 px-3">Usuario</button> </a>
            <a href='#dis'><button class="btn btn-primary py-2 px-3">Dispositivos</button> </a>
        </div>
    </div>
    <hr>

    <!-- borrar -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Borrar proyecto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="controllers/controller.proyecto.php" method="post" id="form2">
                        <div class="form-group">
                            <h3 class="text-danger">¿Estas seguro de borrar este proyecto?</h3>
                            <input id="inpborrar" type="hidden" name="id">
                            <input type="hidden" name="tipo" value="borrar">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" form="form2">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
    </div>

    <?php include $templates_footer_rec ?>