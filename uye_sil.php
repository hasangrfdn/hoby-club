
<?php

include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM uyeler WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header('Location: uyeleri_listele.php');
        exit;
    } else {
        echo "Silme hatası: " . $conn->error;
    }
} else {
    echo "uye ID'si belirtilmedi.";
    exit;
}

$conn->close();
?>

