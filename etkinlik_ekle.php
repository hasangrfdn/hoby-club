<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Etkinlik Ekle</title>
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
        .jumbotron {
            background: url('img/hobi1.jpg') no-repeat center center;
            background-size: cover;
            color: white;
            height: 400px;
            text-align: center;
        }
        .jumbotron h1 {
            margin-top: 100px;
            font-size: 4em;
        }
        .jumbotron p {
            font-size: 1.5em;
        }
        .footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="index.php">Hobi Kulübü</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Ana Sayfa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="uye_ekle.php">Üye Ekle</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="uyeleri_listele.php">Üyeleri Listele</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="etkinlik_ekle.php">Etkinlik Ekle</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="etkinlikleri_listele.php">Etkinlikleri Listele</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <h2>Etkinlik Ekle</h2>
        <form action="etkinlik_ekle.php" method="post">
            <div class="form-group">
                <label>Etkinlik Adı:</label>
                <input type="text" class="form-control" name="ad" required>
            </div>
            <div class="form-group">
                <label>Tarih:</label>
                <input type="date" class="form-control" name="tarih" required>
            </div>
            <div class="form-group">
                <label>Açıklama:</label>
                <textarea class="form-control" name="aciklama" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Ekle</button>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ad = $_POST['ad'];
        $tarih = $_POST['tarih'];
        $aciklama = $_POST['aciklama'];

        $sql = "INSERT INTO etkinlikler (ad, tarih, aciklama) VALUES ('$ad', '$tarih', '$aciklama')";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success'>Yeni etkinlik başarıyla eklendi</div>";
        } else {
            echo "Hata: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
    ?>
</body>
<footer class="footer mt-4">
        <div class="container">
            <p>&copy; 2024 Hobi Kulübü. Tüm hakları saklıdır.</p>
        </div>
    </footer>
</html>
