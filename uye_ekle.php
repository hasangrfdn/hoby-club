<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Üye Ekle</title>
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

    <div class="container mt-4">
        <h2>Üye Ekle</h2>
        <form action="uye_ekle.php" method="post">
            <div class="form-group">
                <label>Ad:</label>
                <input type="text" class="form-control" name="ad" required>
            </div>
            <div class="form-group">
                <label>Soyad:</label>
                <input type="text" class="form-control" name="soyad" required>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
                <label>Kullanıcı Adı:</label>
                <input type="text" class="form-control" name="kullanici_adi" required>
            </div>
            <div class="form-group">
                <label>Şifre:</label>
                <input type="password" class="form-control" name="sifre" required>
            </div>
            <div class="form-group">
                <label>Telefon:</label>
                <input type="text" class="form-control" name="telefon" required>
            </div>
            <button type="submit" class="btn btn-primary">Ekle</button>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ad = $_POST['ad'];
        $soyad = $_POST['soyad'];
        $email = $_POST['email'];
        $kullanici_adi = $_POST['kullanici_adi'];
        $telefon = $_POST['telefon'];
        $sifre = password_hash($_POST['sifre'], PASSWORD_DEFAULT); // Şifre hashleme
    
        // Kullanıcı adı kontrolü
        $sql = "SELECT * FROM uyeler WHERE kullanici_adi='$kullanici_adi'";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            echo "<div class='alert alert-danger'>Bu kullanıcı adı zaten kullanılıyor.</div>";
        } else {
            $sql = "INSERT INTO uyeler (ad, soyad, email, kullanici_adi, telefon, sifre) VALUES ('$ad', '$soyad', '$email', '$kullanici_adi', '$telefon', '$sifre')";
    
            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert alert-success'>Yeni üye başarıyla eklendi</div>";
            } else {
                echo "Hata: " . $sql . "<br>" . $conn->error;
            }
        }
    }

    $conn->close();
    ?>
   

    <footer class="footer mt-4">
        <div class="container">
            <p>&copy; 2024 Hobi Kulübü. Tüm hakları saklıdır.</p>
        </div>
    </footer>
</body>
</html>
