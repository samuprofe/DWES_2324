<?php 

class Tarea {
    private $id;
    private $texto;
    private $fecha;


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

    public function toJSON(){
        return json_encode(
                ['id'=>$this->getId(),
                'texto' => $this->getTexto(),
                'fecha' => $this->getFecha()]
        );
    }
}
