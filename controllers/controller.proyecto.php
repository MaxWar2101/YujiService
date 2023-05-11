<?php

require_once("../models/model.proyecto.php");
require_once("../models/model.usuario.php");

if ($_POST) {

    $id   = $_POST["id"];
    $tipo = $_POST["tipo"];
    //print_r($_POST);
    //die();

    // guardar los datos del formulario (name) en el modelo
    $proyecto->values[] = $_POST["pro"];
    $proyecto->values[] = $_POST["fein"];
    $proyecto->values[] = $_POST["fefi"];
    $proyecto->values[] = $_POST['idge'];
    $proyecto->values[] = $_POST['ides'];


    session_start();
    if ($tipo == 'nuevo') {
        //$db->debug();
        $proyecto->insert();
        //die();
        if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->idTipoUsuario == 3) {
            header("location:../?page=adm-proyecto");
        } elseif (!isset($_SESSION['usuario']) or $_SESSION['usuario']->idTipoUsuario == 2) {
            header("location:../?page=ger-proyecto");
        }
    } elseif ($tipo == 'actualizar') {
        //$db->debug();
        $proyecto->update($id);
        //die();
        if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->idTipoUsuario == 3) {
            header("location:../?page=adm-proyecto");
        } elseif (!isset($_SESSION['usuario']) or $_SESSION['usuario']->idTipoUsuario == 2) {
            header("location:../?page=ger-proyecto");
        }
    } elseif ($tipo == 'borrar') {
        //$db->debug();
        $proyecto->deleteOne($id);
        //die();
        if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->idTipoUsuario == 3) {
            header("location:../?page=adm-proyecto");
        } elseif (!isset($_SESSION['usuario']) or $_SESSION['usuario']->idTipoUsuario == 2) {
            header("location:../?page=ger-proyecto");
        }
    }
}
