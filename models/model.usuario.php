<?php
require_once("model.base.php");

class Usuario extends Model
{
    public function __construct($db)
    {
        parent::__construct($db);
        $this->setView("vw_usuarios");
        $this->setTable("usuarios");

        $this->setKey("id_Usuario");
        $this->addField("Nombre");
        $this->addField("Apellido_P");
        $this->addField("Apellido_M");
        $this->addField("Telefono");
        $this->addField("Correo");
        $this->addField("fk_TipoUsuario");
        $this->addField("Sexo");
        $this->addField("Contrasena");

    }

    public function selectC($value)
    {
        $this->getAll("id_Usuario");
        echo "<select name='idcl' id='' class='form-control'>";
        while ($row = $this->next()) {
            if ($row->id_Usuario == $value) $sel = "SELECTED";
            else $sel = "";
            echo "<option value='$row->id_Usuario' {$sel}>$row->Nombre</option>";
        }
        echo "</select>";
    }

    public function selectT($value)
    {
        $this->getAll("id_Usuario");
        echo "<select name='idte' id='' class='form-control'>";
        while ($row = $this->next()) {
            if ($row->id_Usuario == $value) $sel = "SELECTED";
            else $sel = "";
            echo "<option value='$row->id_Usuario' {$sel}>$row->Nombre</option>";
        }
        echo "</select>";
    }
}

$usuario = new Usuario($db);
$usuario->newRecord();
