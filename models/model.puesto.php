<?php
require_once("model.base.php");

class Puesto extends Model {
    public function __construct($db) {
        parent::__construct($db);
        $this->setView ("puesto");
        $this->setTable("puesto");
        // campos de la tabla
        $this->setKey  ("id");
        $this->addField("puesto");
        $this->addField("descripcion");
    }

    public function select($value) {
        $this->getAll("id");
        echo "<select name='idpu' id='' class='form-control'>";
        while ($row = $this->next()) {
            if ($row->id==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->id' {$sel}>$row->puesto</option>";
        }
        echo "</select>";
    }
}

$puesto = new Puesto($db);
$puesto->newRecord();
?>