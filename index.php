<?php
session_start();
if (!isset($_SESSION['kullanici_adi'])) {
    header("Location: login.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Hobi Kulübü Yönetim Sistemi</title>
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
        .jumbotron {
            background: url('img/312') no-repeat center center;
            background-size: cover;
            color: black;
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
                <li class="nav-item">
                <a class="nav-link" href="logout.php">Çıkış Yap</a> 
            </li>
            </ul>
        </div>
    </nav>

    <div class="jumbotron">
        <div class="container">
        
            <h1 >Hobi Kulübüne Hoşgeldiniz!</h1>
            <p>Birbirinden farklı hobiler ve etkinliklerle dolu bir dünya sizi bekliyor.</p>
        </div>
    </div>

    <div class="container mt-4">
        <h2>Hakkımızda</h2>
        <p>Hobi Kulübü, hobilerinizi paylaşabileceğiniz, yeni etkinliklere katılabileceğiniz ve yeni insanlarla tanışabileceğiniz bir platformdur.</p>

        <p> 
        <a href="https://github.com/hasangrfdn/hoby_club">
    <img src="GitHub.png" alt="hasangrfdn github" width="480" height="220">
</a>
    </p>

    </div>

    

    <footer class="footer mt-4">
        <div class="container">
            <p>&copy; 2024 Hobi Kulübü. Tüm hakları saklıdır.</p>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
