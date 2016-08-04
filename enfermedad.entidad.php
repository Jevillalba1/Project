<?php
class Alumno
  {
    private $Id_Enfermedad;
    private $Nombre;
    private $Gravedad;
    private $Descripcion;

    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
  }
?>