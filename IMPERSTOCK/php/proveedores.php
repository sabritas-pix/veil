<?php
include('db.php');

$sql = "SELECT * FROM proveedores";
$result = $conn->query($sql);

echo '<table border="1" cellpadding="10">';
echo '<tr><th>Nombre</th><th>Contacto</th><th>Teléfono</th><th>Giro</th><th>Acciones</th></tr>';

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $nombre = htmlspecialchars($row["nombre"]);
        $contacto = htmlspecialchars($row["contacto"]);
        $telefono = htmlspecialchars($row["telefono"]);
        $giro = htmlspecialchars($row["giro"]);
        $id = htmlspecialchars($row["id"]);

        echo "<tr>";
        echo "<td>$nombre</td>";
        echo "<td>$contacto</td>";
        echo "<td>$telefono</td>";
        echo "<td>$giro</td>";
        echo "<td><a href='php/eliminar.php?id=$id' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este proveedor?\");'>Eliminar</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No hay proveedores.</td></tr>";
}

echo "</table>";

$conn->close();
?>
