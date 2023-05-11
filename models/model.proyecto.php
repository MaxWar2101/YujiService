<?php
require_once("model.base.php");

class Proyecto extends Model
{
    public function __construct($db)
    {
        parent::__construct($db);
        $this->setView("vw_proyecto");
        $this->setTable("proyecto");

        $this->setKey("id");
        $this->addField("proyecto");
        $this->addField("fecha_inicio");
        $this->addField("fecha_fin");
        $this->addField("idGerente");
        $this->addField("idEstatus");
    }

    public function selectG($value)
    {
        $this->getAll("id");
        echo "<select name='idpr' id='' class='form-control'>";
        while ($row = $this->next()) {
            if ($row->id == $value) $sel = "SELECTED";
            else $sel = "";
            echo "<option value='$row->id' {$sel}>$row->proyecto</option>";
        }
        echo "</select>";
    }

    /* public function getAdministradores() {
        $this->getWhere("idTipoUsuario=3");
    }

    public function getGerentes() {
        $this->getWhere("idTipoUsuario=2");
    }

    public function getEmpleados() {
        $this->getWhere("idTipoUsuario=1");
    }

    public function selectGerentes($value) {
        $this->getGerentes();
        echo "<select name='idmae' id='' class='form-control'>";
        while ($row = $this->next()) {
            if ($row->IdUsuario==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->IdUsuario' {$sel}>$row->Nombre $row->Apellidos</option>";
        }
        echo "</select>";
    }

    public function selectEmpleados($value) {
        $this->getEmpleados();
        echo "<select name='idalu' id='' class='form-control'>";
        while ($row = $this->next()) {
            if ($row->IdAlumno==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->IdUsuario' {$sel}>$row->Nombre $row->Apellidos</option>";
        }
        echo "</select>";
    } */
}

$proyecto = new Proyecto($db);
$proyecto->newRecord();
