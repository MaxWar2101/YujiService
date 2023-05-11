<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}
?>

<?php include $base_dir . "/models/model.usuario.php"; ?>
<?php include $base_dir . "/models/model.estatus.php"; ?>
<?php include $base_dir . "/models/model.tipousuario.php"; ?>
<?php include $base_dir . "/models/model.reparacion.php"; ?>
<?php include $base_dir . "/models/model.tipodispositivo.php"; ?>
<?php include $templates_header_adm ?>

<body>
    <?php include $templates_navbar_adm ?>

    <main role="main">
        <!-- Header Start -->
        <div class="jumbotron jumbotron-fluid mb-5">
            <div class="container text-center py-3">
                <h1 class="text-white display-3">Dispositivos</h1>
                <div class="d-inline-flex align-items-center text-white">
                    <p class="m-0"><a class="text-white" href="">Admin</a></p>
                    <i class="fa fa-circle px-3"></i>
                    <p class="m-0">Dispositivos</p>
                </div>
            </div>
        </div>
        <!-- Header End -->


        <!-- CRUD Start -->

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
                                <input class="form-control mr-sm-2" name="buscar" type="search" placeholder="Search" aria-label="Search">
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
                                    <a class='btn btn-sm btn-primary' href='?page=adm-proyecto-editar&id=$row->id'>Editar</a>
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


        <!-- CRUD End -->
    </main>


    <?php include $templates_footer_adm ?>