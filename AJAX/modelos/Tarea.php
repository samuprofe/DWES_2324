<?php 

class Tarea {
    private $id;
    private $texto;
    private $fecha;

    public function __construct($id, $texto, $fecha) {
        $this->id = $id;
        $this->texto = $texto;
        $this->fecha = $fecha;
    }

    public function getId() {
        return $this->id;
    }

    public function getTexto() {
        return $this->texto;
    }

    public function getFecha() {
        return $this->fecha;
    }
}
