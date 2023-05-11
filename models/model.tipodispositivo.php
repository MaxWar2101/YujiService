<?php
require_once("model.base.php");

class TipoDispositivo extends Model {
    public function __construct($db) {
        parent::__construct($db);
        $this->setView ("tipo_disp");
        $this->setTable("tipo_disp");
        // campos de la tabla
        $this->setKey  ("id_Tipo_Disp");
        $this->addField("Tipo_Dispositivo");
    }

    public function select($value) {
        $this->getAll("id_Tipo_Disp");
        echo "<select name='tidi' id='' class='form-control'>";
        while ($row = $this->next()) {
            if ($row->id_Tipo_Disp==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->id_Tipo_Disp' {$sel}>$row->Tipo_Dispositivo</option>";
        }
        echo "</select>";
    }
}

$tipodispositivo = new TipoDispositivo($db);
$tipodispositivo->newRecord();
?>