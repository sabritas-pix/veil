<?php
include('db.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $contacto = $_POST['contacto'];
    $telefono = $_POST['telefono'];
    $giro = $_POST['giro'];

    $stmt = $conn->prepare("INSERT INTO proveedores (nombre, contacto, telefono, giro) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nombre, $contacto, $telefono, $giro); // "ssss" significa que son strings

    if ($stmt->execute()) {
        echo "Proveedor agregado exitosamente";
    } else {
        echo "Error al insertar proveedor: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
