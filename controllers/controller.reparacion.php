<?php

require_once("../models/model.reparacion.php");
require_once("../models/model.usuario.php");

if ($_POST) {

    $id   = $_POST["id"];
    $tipo = $_POST["tipo"];
    //print_r($_POST);
    //die();

    // guardar los datos del formulario (name) en el modelo
    $reparacion->values[] = $_POST["des"];
    $reparacion->values[] = $_POST["pro"];
    $reparacion->values[] = $_POST["fere"];
    $reparacion->values[] = $_POST['tidi'];
    $reparacion->values[] = $_POST['idcl'];
    $reparacion->values[] = $_POST['idte'];
    $reparacion->values[] = $_POST['dia'];
    $reparacion->values[] = $_POST['est'];
    $reparacion->values[] = $_POST['feen'];
    $reparacion->values[] = $_POST['not'];


    session_start();

    if ($tipo == 'nuevo') {
        //$db->debug();
        $reparacion->insert();
        //die();
        if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->fk_TipoUsuario == 2) {
            header("location:../?page=rec-formulario");
        } elseif (!isset($_SESSION['usuario']) or $_SESSION['usuario']->fk_TipoUsuario == 1) {
            header("location:../?page=tec-inicio");
        }

    } elseif ($tipo == 'actualizar') {
        //$db->debug();
        $reparacion->update($id);
        //die();
        if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->fk_TipoUsuario == 2) {
            header("location:../?page=rec-registro");
            
        } elseif (!isset($_SESSION['usuario']) or $_SESSION['usuario']->fk_TipoUsuario == 1) {
            header("location:../?page=tec-inicio");
        }
    } elseif ($tipo == 'borrar') {
        //$db->debug();
        $reparacion->deleteOne($id);
        //die();
        if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->fk_TipoUsuario == 2) {
            header("location:../?page=rec-registro");
        } elseif (!isset($_SESSION['usuario']) or $_SESSION['usuario']->fk_TipoUsuario == 1) {
            header("location:../?page=tec-inicio");
        }
    }
}
