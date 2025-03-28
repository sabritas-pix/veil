<?php
include('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM proveedores WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../prov.html");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
