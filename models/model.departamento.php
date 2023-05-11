<?php
require_once("model.base.php");

class Departamento extends Model {
    public function __construct($db) {
        parent::__construct($db);
        $this->setView ("departamento");
        $this->setTable("departamento");
        // campos de la tabla
        $this->setKey  ("id");
        $this->addField("departamento");
    }

    public function select($value) {
        $this->getAll("id");
        echo "<select name='idde' id='' class='form-control'>";
        while ($row = $this->next()) {
            if ($row->id==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->id' {$sel}>$row->departamento</option>";
        }
        echo "</select>";
    }
}

$departamento = new Departamento($db);
$departamento->newRecord();
?>