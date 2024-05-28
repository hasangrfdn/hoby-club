<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Üyeleri Listele</title>
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
        <h2>Üyeleri Listele</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ad</th>
                    <th>Soyad</th>
                    <th>Email</th>
                    <th>Telefon</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM uyeler";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['ad']}</td>
                            <td>{$row['soyad']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['telefon']}</td>
                            <td>
                                <a href='uye_duzenle.php?id={$row['id']}' class='btn btn-warning'>Düzenle</a>
                                <a href='uye_sil.php?id={$row['id']}' class='btn btn-danger'>Sil</a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Hiç üye bulunamadı</td></tr>";
                }

                $conn->close();
                ?>
                
            </tbody>
        </table>
    </div>
    <footer class="footer mt-4">
        <div class="container">
            <p>&copy; 2024 Hobi Kulübü
