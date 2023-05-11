<?php

require_once("../models/model.comentario.php");

if ($_POST) {

    $id   = $_POST["id"];
    $tipo = $_POST["tipo"];
    //print_r($_POST);
    //die();

    // guardar los datos del formulario en el modelo
    $comentario->values[] = $_POST["id"];
    $comentario->values[] = $_POST["comentario"];
    $comentario->values[] = $_POST["fecha"];
    $comentario->values[] = $_POST['idActividad'];
    $comentario->values[] = $_POST['idUsuario'];

    if ($tipousuario == 1) {
        # code...
    } else {
        # code...
    }
    
    if ($tipo == 'nuevo') {
        //$db->debug();
        $comentario->insert();
        //die();
        header("location:../?page=adm-comentario");

    } elseif ($tipo == 'actualizar') {
        //$db->debug();
        $comentario->update($id);
        //die();
        header("location:../?page=adm-comentario");
    }
    elseif ($tipo == 'borrar') {
        //$db->debug();
        $comentario->deleteOne($id);
        //die();
        header("location:../?page=adm-comentario");
    }
}

?>