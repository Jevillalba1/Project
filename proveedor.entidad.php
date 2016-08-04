<?php
class Proveedor
  {
    private $Id_Proveedor;
    private $Nombre;
    private $Telefono;
    private $Direccion;
    private $Estado;

    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
  }
?>