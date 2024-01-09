<?php

class TareasDAO {
    private $conexion;

    public function __construct() {
        $this->conexion = new mysqli("localhost", "root", "", "tareas");

        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    public function obtenerTodasLasTareas() {
        $query = "SELECT * FROM tareas";
        $resultados = $this->conexion->query($query);
        $tareas = array();

        if ($resultados->num_rows > 0) {
            while ($fila = $resultados->fetch_assoc()) {
                $tarea = new Tarea($fila['id'], $fila['texto'], $fila['fecha']);
                $tareas[] = $tarea;
            }
        }

        return $tareas;
    }

    public function insertarTarea($texto) {
        $texto = $this->conexion->real_escape_string($texto);
        $query = "INSERT INTO tareas (texto) VALUES ('$texto')";
        
        if ($this->conexion->query($query) === TRUE) {
            $idInsertado = $this->conexion->insert_id;
            $nuevaTarea = $this->obtenerTareaPorID($idInsertado);
            return $nuevaTarea;
        } else {
            return null;
        }
    }

    public function obtenerTareaPorID($id) {
        $query = "SELECT * FROM tareas WHERE id = $id";
        $resultado = $this->conexion->query($query);

        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
            $tarea = new Tarea($fila['id'], $fila['texto'], $fila['fecha']);
            return $tarea;
        } else {
            return null;
        }
    }

    public function cerrarConexion() {
        $this->conexion->close();
    }
}
?>
