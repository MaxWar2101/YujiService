<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->idTipoUsuario <> 3) {
    header('location:?page=inicio');
}
?>
<?php include $base_dir . "/models/model.actividad.php"; ?>
<?php include $base_dir . "/models/model.usuario.php"; ?>
<?php include $templates_header_adm ?>

<body>
    <?php include $templates_navbar_adm ?>
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center text-center">
                            <div class="col-md-7">
                                <h1>Actividades</h1>
                            </div>
                            <div class="col-md-4">
                                <form class="form-inline" action="?page=adm-actividad" method="POST">
                                    <button class="btn btn-primary mr-sm-2" type="submit">Todos</button>
                                    <input class="form-control mr-sm-2" name="buscar" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-success mr-sm-2" type="submit">Buscar</button>
                                </form>
                            </div>
                            <div class="col-md-1">
                                <a class="btn btn-sm btn-success py-2 px-3" href='?page=adm-actividad-editar'>Nuevo</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover ">
                            <thead class="">
                                <tr class="table-dark ">
                                    <th>Actividad</th>
                                    <th>Asignado</th>
                                    <th>Gerente</th>
                                    <th>Empleado</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Final</th>
                                    <th>Proyecto</th>
                                    <th>Estatus</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $buscar = $_POST["buscar"];
                                if ($buscar) {
                                    $actividad->getWhere("Actividad LIKE '%{$buscar}%'");
                                } else {
                                    $actividad->getAll();
                                }

                                while ($row = $actividad->next()) {
                                    echo "<tr>";
                                    echo "<td>" . $row->actividad . "</td>";
                                    echo "<td>" . $row->asignado . "</td>";
                                    echo "<td>" . $row->gerente . "</td>";
                                    echo "<td>" . $row->empleado . "</td>";
                                    echo "<td>" . $row->fecha_inicio . "</td>";
                                    echo "<td>" . $row->fecha_fin . "</td>";
                                    echo "<td>" . $row->proyecto . "</td>";
                                    echo "<td>" . $row->estatus . "</td>";
                                    echo "<td>
                                    <a class='btn btn-sm btn-primary' href='?page=adm-actividad-editar&id=$row->id'>Editar</a>
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
        </div>
        <br>
        <!-- borrar -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Borrar Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="controllers/controller.actividad.php" method="post" id="form2">
                            <div class="form-group">
                                <h3 class="text-danger">¿Estas seguro de borrar esta actividad?</h3>
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

    <?php include $templates_footer_adm ?>