<?php
require_once("model.base.php");

class Estatus extends Model {
    public function __construct($db) {
        parent::__construct($db);
        $this->setView ("estatus");
        $this->setTable("estatus");
        // campos de la tabla
        $this->setKey  ("id_Estatus");
        $this->addField("Estatus_Tec");
        $this->addField("Estatus_Clie");
    }

    public function selectT($value) {
        $this->getAll("id_Estatus");
        echo "<select name='est' id='' class='form-control'>";
        while ($row = $this->next()) {
            if ($row->id_Estatus==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->id_Estatus' {$sel}>$row->Estatus_Tec</option>";
        }
        echo "</select>";
    }
    public function selectC($value) {
        $this->getAll("id_Estatus");
        echo "<select name='est' id='' class='form-control'>";
        while ($row = $this->next()) {
            if ($row->id_Estatus==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->id_Estatus' {$sel}>$row->Estatus_Clie</option>";
        }
        echo "</select>";
    }
}

$estatus = new Estatus($db);
$estatus->newRecord();
