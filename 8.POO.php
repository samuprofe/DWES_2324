<?php 


class Coche{

    private $marca;
    private $modelo;
    private $matricula;
    private $kilometros;

    /**
     * Get the value of marca
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set the value of marca
     */
    public function setMarca($marca): self
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get the value of modelo
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set the value of modelo
     */
    public function setModelo($modelo): self
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get the value of matricula
     */
    public function getMatricula()
    {
        return $this->matricula;
    }

    /**
     * Set the value of matricula
     */
    public function setMatricula($matricula): self
    {
        $this->matricula = $matricula;

        return $this;
    }

    /**
     * Get the value of kilometros
     */
    public function getKilometros()
    {
        return $this->kilometros;
    }

    /**
     * Set the value of kilometros
     */
    public function setKilometros($kilometros): self
    {
        $this->kilometros = $kilometros;

        return $this;
    }

}

$coche1 = new Coche();
$coche1->setKilometros(100000);
$coche1->setMarca("Seat");
$coche1->setModelo('Ibiza');
$coche1->setMatricula('1111AAA');

echo "Coche1: " . $coche1->getMarca() .' '. $coche1->getModelo().'<br>';

/**
 * El siguiente código es generado con ChatGPT
 */

class Persona {
    private $nombre;
    private $apellidos;
    private $edad;
    private $fechaNacimiento;

    public function __construct($nombre='', $apellidos='', $edad='', $fechaNacimiento='') {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->edad = $edad;
        $this->fechaNacimiento = $fechaNacimiento;
    }


    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    public function getEdad() {
        return $this->edad;
    }

    public function setEdad($edad) {
        $this->edad = $edad;
    }

    public function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    public function setFechaNacimiento($fechaNacimiento) {
        $this->fechaNacimiento = $fechaNacimiento;
    }
}

// Ejemplo de uso:
$persona = new Persona("Juan", "Pérez", 30, "1993-05-15");
echo "Nombre: " . $persona->getNombre() . "<br>";
echo "Apellidos: " . $persona->getApellidos() . "<br>";
echo "Edad: " . $persona->getEdad() . "<br>";
echo "Fecha de Nacimiento: " . $persona->getFechaNacimiento() . "<br>";
?>
