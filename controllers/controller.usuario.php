<?php

require_once("../models/model.usuario.php");

if ($_POST) {

    $id   = $_POST["id"];
    $tipo = $_POST["tipo"];
    //print_r($_POST);
    //die();

    // guardar los datos del formulario (name) en el modelo
    $usuario->values[] = $_POST["nom"];
    $usuario->values[] = $_POST["apep"];
    $usuario->values[] = $_POST["apem"];
    $usuario->values[] = $_POST["tel"];
    $usuario->values[] = $_POST['cor'];
    $usuario->values[] = $_POST['idtipo'];
    $usuario->values[] = $_POST['sex'];
    $usuario->values[] = $_POST['con'];

    session_start();
    if ($tipo == 'nuevo') {
        //$db->debug();
        $usuario->insert();
        //die();
        if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->fk_TipoUsuario == 3) {
            header("location:../?page=adm-usuario");
        } elseif (!isset($_SESSION['usuario']) or $_SESSION['usuario']->fk_TipoUsuario == 2) {
            header("location:../?page=rec-formulario");
        }
    } elseif ($tipo == 'actualizar') {
        //$db->debug();
        $usuario->update($id);
        //die();
        if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->fk_TipoUsuario == 3) {
            header("location:../?page=adm-usuario");
        } elseif (!isset($_SESSION['usuario']) or $_SESSION['usuario']->fk_TipoUsuario == 2) {
            header("location:../?page=rec-formulario");
        }
    } elseif ($tipo == 'borrar') {
        //$db->debug();
        $usuario->deleteOne($id);
        //die();
        if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->fk_TipoUsuario == 3) {
            header("location:../?page=adm-usuario");
        } elseif (!isset($_SESSION['usuario']) or $_SESSION['usuario']->fk_TipoUsuario == 2) {
            header("location:../?page=rec-formulario");
        }
    }
}
