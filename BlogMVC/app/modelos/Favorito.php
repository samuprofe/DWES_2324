<?php

class Favorito{
    
    private $id;
    private $idMensaje;
    private $idUsuario;

    

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
     * Get the value of idMensaje
     */
    public function getIdMensaje()
    {
        return $this->idMensaje;
    }

    /**
     * Set the value of idMensaje
     */
    public function setIdMensaje($idMensaje): self
    {
        $this->idMensaje = $idMensaje;

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
}