
<?php

include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM etkinlikler WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header('Location: etkinlikleri_listele.php');
        exit;
    } else {
        echo "Silme hatası: " . $conn->error;
    }
} else {
    echo "Etkinlik ID'si belirtilmedi.";
    exit;
}

$conn->close();
?>

