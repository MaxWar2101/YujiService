<?php
require_once("model.base.php");

class Cotizacion extends Model {
    public function __construct($db) {
        parent::__construct($db);
        $this->setView ("cotizacion");
        $this->setTable("cotizacion");
        // campos de la tabla
        $this->setKey  ("id_Cotizacion");
        $this->addField("fk_Reparacion");
        $this->addField("fk_Usuario");
        $this->addField("Valor_Revision");
        $this->addField("Descripcion_Reparacion");
        $this->addField("Valor_Reparacion");
        $this->addField("Fecha_Cotizacion");
        $this->addField("Limite_Recoleccion");
    }

    public function select($value) {
        $this->getAll("id");
        echo "<select name='idco' id='' class='form-control'>";
        while ($row = $this->next()) {
            if ($row->id_Cotizacion==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->id_Cotizacion' {$sel}>$row->Valor_Reparacion</option>";
        }
        echo "</select>";
    }
}

$cotizacion = new Cotizacion($db);
$cotizacion->newRecord();
?>