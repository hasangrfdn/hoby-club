<?php
include 'config.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $email = $_POST['email'];
    $kullanici_adi = $_POST['kullanici_adi'];
    $telefon = $_POST['telefon'];
    $sifre = password_hash($_POST['sifre'], PASSWORD_DEFAULT);

    $sql = "SELECT * FROM uyeler WHERE kullanici_adi='$kullanici_adi'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $error = "Bu kullanıcı adı zaten kullanılıyor.";
    } else {
        $sql = "INSERT INTO uyeler (ad, soyad, email, kullanici_adi, telefon, sifre) VALUES ('$ad', '$soyad', '$email', '$kullanici_adi', '$telefon', '$sifre')";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['register_success'] = "Üye olma işlemi başarıyla tamamlandı.";
            header('Location: login.php');
            exit;
        } else {
            $error = "Hata: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Üye Ol</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="index.php">Hobi Kulübü</a>
    </nav>

    <div class="container">
        <h2>Üye Ol</h2>
        <form action="register.php" method="post">
            <?php if (isset($error)): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>
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
                <label>Telefon:</label>
                <input type="text" class="form-control" name="telefon" required>
            </div>
            <div class="form-group">
                <label>Şifre:</label>
                <input type="password" class="form-control" name="sifre" required>
            </div>
            <button type="submit" class="btn btn-primary">Üye Ol</button>
        </form>
        <p>Zaten üye misiniz? <a href="login.php">Giriş Yap</a></p>
    </div>

    <footer class="footer mt-4">
        <div class="container">
            <p>&copy; 2024 Hobi Kulübü. Tüm hakları saklıdır.</p>
        </div>
    </footer>
</body>
</html>
