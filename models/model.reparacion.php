<?php
require_once("model.base.php");

class Reparacion extends Model
{
    public function __construct($db)
    {
        parent::__construct($db);
        $this->setView("vw_reparacion");
        $this->setTable("reparacion");

        $this->setKey("id_Reparacion");
        $this->addField("Descripcion");
        $this->addField("Problema");    
        $this->addField("Fecha_Recibido");
        $this->addField("fk_Tipo_Disp");
        $this->addField("fk_Cliente");
        $this->addField("fk_Tecnico");
        $this->addField("Diagnostico");
        $this->addField("fk_Estatus");
        $this->addField("Fecha_Entregado");
        $this->addField("Notas");
    }

    public function getAdministradores()
    {
        $this->getWhere("idTipoUsuario=3");
    }

    public function getMaestros()
    {
        $this->getWhere("idTipoUsuario=2");
    }

    public function getAlumnos()
    {
        $this->getWhere("idTipoUsuario=1");
    }

    public function selectMaestros($value)
    {
        $this->getMaestros();
        echo "<select name='idmae' id='' class='form-control'>";
        while ($row = $this->next()) {
            if ($row->IdUsuario == $value) $sel = "SELECTED";
            else $sel = "";
            echo "<option value='$row->IdUsuario' {$sel}>$row->Nombre $row->Apellidos</option>";
        }
        echo "</select>";
    }

    public function selectAlumnos($value)
    {
        $this->getAlumnos();
        echo "<select name='idalu' id='' class='form-control'>";
        while ($row = $this->next()) {
            if ($row->IdAlumno == $value) $sel = "SELECTED";
            else $sel = "";
            echo "<option value='$row->IdUsuario' {$sel}>$row->Nombre $row->Apellidos</option>";
        }
        echo "</select>";
    }
}

$reparacion = new Reparacion($db);
$reparacion->newRecord();
