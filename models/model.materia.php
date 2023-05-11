<?php
require_once("model.base.php");

class Materia extends Model {
    public function __construct($db) {
        parent::__construct($db);
        $this->setView ("materias");
        $this->setTable("materias");

        // campos de la tabla
        $this->setKey  ("IdMateria");
        $this->addField("ClaveMateria");
        $this->addField("Materia");
    }

    public function selectMaterias($value) {
        $this->getAll("ClaveMateria");
        echo "<select name='idmat' id='' class='form-control'>";
        while ($row = $this->next()) {
            if ($row->IdMateria==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->IdMateria' {$sel}>$row->ClaveMateria $row->Materia</option>";
        }
        echo "</select>";
    }
}

$materia = new Materia($db);
$materia->newRecord();
?>