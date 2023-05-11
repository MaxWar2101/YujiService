<?php

require_once("../models/model.actividad.php");

if ($_POST) {

    $id   = $_POST["id"];
    $tipo = $_POST["tipo"];
    //print_r($_POST);
    //die();

    // guardar los datos del formulario (name) en el modelo
    $actividad->values[] = $_POST["act"];
    $actividad->values[] = $_POST['asi'];
    $actividad->values[] = $_POST['idge'];
    $actividad->values[] = $_POST['idus'];
    $actividad->values[] = $_POST['fein'];
    $actividad->values[] = $_POST['fefi'];
    $actividad->values[] = $_POST['idpr'];
    $actividad->values[] = $_POST['ides'];

    session_start();
    if ($tipo == 'nuevo') {
        //$db->debug();
        $actividad->insert();
        //die();
        if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->idTipoUsuario == 3) {
            header("location:../?page=adm-actividad");
        } elseif (!isset($_SESSION['usuario']) or $_SESSION['usuario']->idTipoUsuario == 2) {
            header("location:../?page=ger-actividad");
        }

    } elseif ($tipo == 'actualizar') {
        //$db->debug();
        $actividad->update($id);
        //die();
        if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->idTipoUsuario == 3) {
            header("location:../?page=adm-actividad");
        } elseif (!isset($_SESSION['usuario']) or $_SESSION['usuario']->idTipoUsuario == 2) {
            header("location:../?page=ger-actividad");
        }
    }
    elseif ($tipo == 'borrar') {
        //$db->debug();
        $actividad->deleteOne($id);
        //die();
        if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->idTipoUsuario == 3) {
            header("location:../?page=adm-actividad");
        } elseif (!isset($_SESSION['usuario']) or $_SESSION['usuario']->idTipoUsuario == 2) {
            header("location:../?page=ger-actividad");
        }
    }
}
