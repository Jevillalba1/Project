<?php
		//Se crea una clase llamada "alumno" la cual tiene las entidades de las bases de datos
class Usuario
  {
    private $Id;
    private $Nombre;
    private $Apellido;
    private $Direccion;
    private $Telefono;
    private $Correo;
    private $Id_Usuario;
    private $Contrasena;

    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
  }
?>