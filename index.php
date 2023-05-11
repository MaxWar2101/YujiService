<?php
include "directorios.php";
include 'resources/class/class.connection.php';

//error_reporting(E_ERROR | E_WARNING | E_PARSE);
error_reporting(E_ERROR);

if (isset($_GET["page"])) {
    switch ($_GET['page']) {
            # pagina principal
        case 'nosotros':
            include 'views/home/nosotros.php';
            break;
        case 'contacto':
            include 'views/home/contacto.php';
            break;
        case 'login':
            include 'views/home/login.php';
            break;
            # Cliente
        case 'cli-inicio':
            include 'views/user/cliente/inicio.php';
            break;
        case 'cli-chat':
            include 'views/user/cliente/chat.php';
            break;
            # Tecnico
        case 'tec-inicio':
            include 'views/user/tecnico/inicio.php';
            break;
        case 'tec-chat':
            include 'views/user/tecnico/chat.php';
            break;
            # Recepcionista
        case 'rec-formulario':
            include 'views/user/recepcionista/formulario.php';
            break;
        case 'rec-registro':
            include 'views/user/recepcionista/registro.php';
            break;
            # Administrador
        case 'adm-inicio':
            include 'views/user/administrador/inicio.php';
            break;
        case "adm-proyecto":
            include 'views/user/administrador/proyecto.php';
            break;
        case "adm-proyecto-editar":
            include 'views/user/administrador/proyecto_editar.php';
            break;
        case 'adm-usuario':
            include 'views/user/administrador/usuario.php';
            break;
        case 'adm-usuario-editar':
            include 'views/user/administrador/usuario_editar.php';
            break;
        case 'adm-comentario':
            include 'views/user/administrador/comentario.php';
            break;
        case 'adm-actividad':
            include 'views/user/administrador/actividad.php';
            break;
        case 'adm-actividad-editar':
            include 'views/user/administrador/actividad_editar.php';
            break;
            # Luego las borro
        case 'adm-materia':
            include 'views/user/administrador/materia.php';
            break;
        case 'adm-materia-editar':
            include 'views/user/administrador/materia_editar.php';
            break;
            #No me acuerdo pero que ahi se quede ese ultimo
        case "inicio":
            include 'views/home/inicio.php';
            break;
    }
} else {
    include 'views/home/inicio.php';
}
