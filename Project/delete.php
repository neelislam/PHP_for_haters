<?php
include "db.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM clients WHERE id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: index.php?deleted=1");
        exit;
    } else {
        die("Error deleting record: " . $connection->error);
    }
}
?>
