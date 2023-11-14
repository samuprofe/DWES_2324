<?php
class Mensaje {
    private $id;
    private $titulo;
    private $texto;
    private $idUsuario;
    private $fecha;
    private $usuario;

    /**
     * Obtiene el usuario propietario de este mensaje
     */
    public function getUsuario(){
        if(is_null($this->usuario)){
            $connexionDB = new ConnexionDB('root','','localhost','blog');
            $conn = $connexionDB->getConnexion();
            $usuariosDAO = new UsuariosDAO($conn);
            $this->usuario = $usuariosDAO->getById($this->getIdUsuario());
        }
        return $this->usuario;
    }


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of titulo
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     */
    public function setTitulo($titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of texto
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * Set the value of texto
     */
    public function setTexto($texto): self
    {
        $this->texto = $texto;

        return $this;
    }

    /**
     * Get the value of idUsuario
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Set the value of idUsuario
     */
    public function setIdUsuario($idUsuario): self
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get the value of fecha
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     */
    public function setFecha($fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }
}
?>
