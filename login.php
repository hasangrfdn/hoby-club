<?php
include 'config.php';

if (isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kullanici_adi = $_POST['kullanici_adi'];
    $sifre = $_POST['sifre'];

    $sql = "SELECT * FROM uyeler WHERE kullanici_adi='$kullanici_adi'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($sifre, $user['sifre'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['kullanici_adi'] = $kullanici_adi;
            header('Location: index.php');
            exit;
        } else {
            $error = "Yanlış şifre!";
        }
    } else {
        $error = "Kullanıcı bulunamadı!";
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Giriş Yap</title>
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
        <h2>Giriş Yap</h2>
        <form action="login.php" method="post">
            <?php if (isset($error)): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>
            <div class="form-group">
                <label>Kullanıcı Adı:</label>
                <input type="text" class="form-control" name="kullanici_adi" required>
            </div>
            <div class="form-group">
                <label>Şifre:</label>
                <input type="password" class="form-control" name="sifre" required>
            </div>
            <button type="submit" class="btn btn-primary">Giriş Yap</button>
        </form>
        <p>Henüz üye değil misiniz? <a href="register.php">Üye Ol</a></p>
    </div>

    <footer class="footer mt-4">
        <div class="container">
            <p>&copy; 2024 Hobi Kulübü. Tüm hakları saklıdır.</p>
        </div>
    </footer>
</body>
</html>
