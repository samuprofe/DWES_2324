<?php
class Mensaje {
    private $id;
    private $titulo;
    private $texto;
    private $idUsuario;
    private $fecha;

    // Métodos para acceder a las propiedades
    public function getId() {
        return $this->id;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getTexto() {
        return $this->texto;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setId($id) {
        $this->id = $id;
    }

    // Otros métodos que puedas necesitar
}
?>
