<?php
require_once("model.base.php");

class TipoUsuario extends Model {
    public function __construct($db) {
        parent::__construct($db);
        $this->setView ("tipousuario");
        $this->setTable("tipousuario");
        // campos de la tabla
        $this->setKey  ("id");
        $this->addField("tipoUsuario");
    }

    public function select($value) {
        $this->getAll("id");
        echo "<select name='idtipo' id='' class='form-control'>";
        while ($row = $this->next()) {
            if ($row->id==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->id' {$sel}>$row->tipoUsuario</option>";
        }
        echo "</select>";
    }
}

$tipousuario = new TipoUsuario($db);
$tipousuario->newRecord();
?>