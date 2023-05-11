<?php

require_once("../models/model.reparacion.php");
require_once("../models/model.usuario.php");

if ($_POST) {

    $id   = $_POST["id"];
    $tipo = $_POST["tipo"];
    //print_r($_POST);
    //die();

    $reparacion->getOne($id);
        // guardar los datos del formulario (name) en el modelo
    $reparacion->values[] = $reparacion->data->Descripcion;
    $reparacion->values[] = $reparacion->data->Problema;
    $reparacion->values[] = $reparacion->data->Fecha_Recibido;
    $reparacion->values[] = $reparacion->data->fk_Tipo_Disp;
    $reparacion->values[] = $reparacion->data->fk_Cliente;
    $reparacion->values[] = $reparacion->data->fk_Tecnico;
    $reparacion->values[] = $_POST['dia'];
    $reparacion->values[] = $_POST['est'];
    $reparacion->values[] = $reparacion->data->Fecha_Entregado;
    $reparacion->values[] = $_POST['not'];


    if ($tipo == 'actualizar') {
        //$db->debug();
        $reparacion->update($id);
        //die();
            header("location:../?page=tec-inicio");
    }
}
