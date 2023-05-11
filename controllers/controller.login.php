<?php
$email = $_POST['email'];
$pass  = $_POST['pass'];


include '../resources/class/class.connection.php';
include '../models/model.usuario.php';

try {
    session_start();
    $db->debug();

    $sql = "SELECT * FROM usuarios WHERE Correo=? and Contrasena=?";

    $usuario->get($sql, array($email, $pass));

    if ($usuario->data->Correo == $email) {

        $_SESSION['usuario'] = $usuario->data;

        switch ($usuario->data->fk_TipoUsuario) {
            case 1:
                header("location:../?page=tec-inicio");
                break;
            case 2:
                header("location:../?page=rec-formulario");
                break;
            case 3:
                header("location:../?page=adm-inicio");
                break;
            case 4:
                header("location:../?page=cli-inicio");
                break;
        }
    } else {
        $_SESSION['error'] = true;
        header('location:../?page=inicio');
    }
} catch (Exception $e) {
}
