<?php

class Conexion {

    // Método para establecer una conexión con la base de datos
    public function conectar() {
        // Datos de conexión
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bd_venta";
        
        // Conexión a la base de datos
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }
        
        return $conn;
    }

    // Método para sanitizar entradas de usuario
    public function test_input($data) {
        $conn = self::conectar();

        // Escapar caracteres especiales en una cadena para su uso en una instrucción SQL
        $data = mysqli_real_escape_string($conn, $data);
        
        // Eliminar espacios en blanco al inicio y al final
        $data = trim($data);
        
        // Eliminar las barras invertidas de una cadena con comillas escapadas
        $data = stripslashes($data);
        
        // Convertir caracteres especiales en entidades HTML
        $data = htmlspecialchars($data);

        // Cerrar la conexión
        $conn->close();
        
        return $data;
    }
}

?>
