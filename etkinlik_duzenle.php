<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM etkinlikler WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $etkinlik_ad = $row['ad'];
        $etkinlik_tarih = $row['tarih'];
        $etkinlik_aciklama = $row['aciklama'];
    } else {
        echo "Etkinlik bulunamadı.";
        exit;
    }
} else {
    echo "Etkinlik ID'si belirtilmedi.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $etkinlik_ad = $_POST['ad'];
    $etkinlik_tarih = $_POST['tarih'];
    $etkinlik_aciklama = $_POST['aciklama'];

    $sql = "UPDATE etkinlikler SET ad='$etkinlik_ad', tarih='$etkinlik_tarih', aciklama='$etkinlik_aciklama' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header('Location: etkinlikleri_listele.php');
        exit;
    } else {
        echo "Güncelleme hatası: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Etkinlik Düzenle</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background: url('123.jpg') no-repeat center center;
            background-size: cover;
        }
        .navbar {
            background-color: #333;
        }
        .navbar-brand {
            font-size: 1.8em;
            color: #fff;
        }
        .navbar-nav .nav-link {
            color: #fff;
        }
        .footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="index.php">Hobi Kulübü</a>
    </nav>
</head>
<body>

<div class="container">
    <h2>Etkinlik Düzenle</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="ad">Etkinlik Adı:</label>
            <input type="text" class="form-control" id="ad" name="ad" value="<?php echo $etkinlik_ad; ?>">
        </div>
        <div class="form-group">
            <label for="tarih">Tarih:</label>
            <input type="date" class="form-control" id="tarih" name="tarih" value="<?php echo $etkinlik_tarih; ?>">
        </div>
        <div class="form-group">
            <label for="aciklama">Açıklama:</label>
            <textarea class="form-control" id="aciklama" name="aciklama"><?php echo $etkinlik_aciklama; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kaydet</button>
    </form>
</div>
<footer class="footer mt-4">
        <div class="container">
            <p>&copy; 2024 Hobi Kulübü. Tüm hakları saklıdır.</p>
        </div>
    </footer>
</body>
</html>
