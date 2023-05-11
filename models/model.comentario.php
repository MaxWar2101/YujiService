<?php
require_once("model.base.php");

class Comentario extends Model {
    public function __construct($db) {
        parent::__construct($db);
        $this->setView ("vw_comentario");
        $this->setTable("comentario");

        $this->setKey  ("id");
        $this->addField("comentario");
        $this->addField("fecha");
        $this->addField("idActividad");
        $this->addField("idUsuario");
    }

    public function getAdministradores() {
        $this->getWhere("idTipoUsuario=3");
    }

    public function getMaestros() {
        $this->getWhere("idTipoUsuario=2");
    }

    public function getAlumnos() {
        $this->getWhere("idTipoUsuario=1");
    }

    public function selectMaestros($value) {
        $this->getMaestros();
        echo "<select name='idmae' id='' class='form-control'>";
        while ($row = $this->next()) {
            if ($row->IdUsuario==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->IdUsuario' {$sel}>$row->Nombre $row->Apellidos</option>";
        }
        echo "</select>";
    }

    public function selectAlumnos($value) {
        $this->getAlumnos();
        echo "<select name='idalu' id='' class='form-control'>";
        while ($row = $this->next()) {
            if ($row->IdAlumno==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->IdUsuario' {$sel}>$row->Nombre $row->Apellidos</option>";
        }
        echo "</select>";
    }

}

$comentario = new Comentario($db);
$comentario->newRecord();
