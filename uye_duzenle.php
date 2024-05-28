<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $email = $_POST['email'];
    $telefon = $_POST['telefon'];

    // Güncelleme işlemi için SQL sorgusu
    $sql = "UPDATE uyeler SET ad='$ad', soyad='$soyad', email='$email', telefon='$telefon' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // Güncelleme işlemi başarılıysa, kullanıcıyı listeleme sayfasına yönlendir
        header('Location: uyeleri_listele.php');
        exit;
    } else {
        // Güncelleme işlemi sırasında bir hata oluştuysa
        echo "Güncelleme işlemi başarısız oldu: " . $conn->error;
    }
}

// Üye bilgilerini getirmek için SQL sorgusu
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM uyeler WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Üye bulunamadı.";
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Üye Düzenle</title>
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

    <div class="container">
        <h2>Üye Düzenle</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
                <label for="ad">Ad:</label>
                <input type="text" class="form-control" id="ad" name="ad" value="<?php echo $row['ad']; ?>" required>
            </div>
            <div class="form-group">
                <label for="soyad">Soyad:</label>
                <input type="text" class="form-control" id="soyad" name="soyad" value="<?php echo $row['soyad']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="telefon">Telefon:</label>
                <input type="text" class="form-control" id="telefon" name="telefon" value="<?php echo $row['telefon']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Güncelle</button>
        </form>
    </div>

    <footer class="footer mt-4">
        <div class="container">
            <p>&copy; 2024 Hobi Kulübü. Tüm hakları saklıdır.</p>
        </div>
    </footer>
</body>
</html>
