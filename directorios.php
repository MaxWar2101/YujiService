<?php
$base_dir = $_SERVER["DOCUMENT_ROOT"] . "/YujiService";
# ---------------------------------------------------
# Recursos
# ---------------------------------------------------
$recursos_dir = $base_dir . "/recursos";

#Bootstrap
$recursos_bs_css  = "vendor/bootstrap/css/styles.css";
$recursos_bs_js   = "vendor/bootstrap/js/bootstrap.js";
$recursos_bs_jq   = "vendor/bootstrap/js/jquery-3.2.1.slim.min.js";
$recursos_pop_js  = "vendor/bootstrap/js/popper.min.js";

# Templates
$templates_dir = $base_dir . "/views/template";
#Index
$templates_navbar = $base_dir . "/views/template/navbar.php";
$templates_header = $base_dir . "/views/template/header.php";
$templates_footer = $base_dir . "/views/template/footer.php";
#Cliente
$templates_navbar_cli = $base_dir . "/views/template/navbar_cli.php";
$templates_header_cli = $base_dir . "/views/template/header_cli.php";
$templates_footer_cli = $base_dir . "/views/template/footer_cli.php";
#Tecnico
$templates_navbar_tec = $base_dir . "/views/template/navbar_tec.php";
$templates_header_tec = $base_dir . "/views/template/header_tec.php";
$templates_footer_tec = $base_dir . "/views/template/footer_tec.php";
#Recepcionista
$templates_navbar_rec = $base_dir . "/views/template/navbar_rec.php";
$templates_header_rec = $base_dir . "/views/template/header_rec.php";
$templates_footer_rec = $base_dir . "/views/template/footer_rec.php";
#Admin
$templates_navbar_adm = $base_dir . "/views/template/navbar_adm.php";
$templates_header_adm = $base_dir . "/views/template/header_adm.php";
$templates_footer_adm = $base_dir . "/views/template/footer_adm.php";