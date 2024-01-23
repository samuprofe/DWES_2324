<?php

class Foto{

    private $id;
    private $nombreArchivo;
    private $idMensaje;

    

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
     * Get the value of nombreArchivo
     */
    public function getNombreArchivo()
    {
        return $this->nombreArchivo;
    }

    /**
     * Set the value of nombreArchivo
     */
    public function setNombreArchivo($nombreArchivo): self
    {
        $this->nombreArchivo = $nombreArchivo;

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
}