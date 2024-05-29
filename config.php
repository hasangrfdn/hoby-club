<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hobi_kulubu";

// Bağlantı oluşturma
$conn = new mysqli("localhost", "root", ""	, "hobi_kulubu");

// Bağlantıyı kontrol etme
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

// Oturum başlatma
session_start();

// Eğer kullanıcı oturum açmamışsa, login sayfasına yönlendirin
if (!isset($_SESSION['kullanici_adi']) && basename($_SERVER['PHP_SELF']) != 'login.php' && basename($_SERVER['PHP_SELF']) != 'register.php') {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && basename($_SERVER['PHP_SELF']) == 'register.php') {
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $email = $_POST['email'];
    $kullanici_adi = $_POST['kullanici_adi'];
    $telefon = $_POST['telefon'];
    $sifre = password_hash($_POST['sifre'], PASSWORD_DEFAULT);  // Şifre hash'leme

    // Kullanıcı adı kontrolü
    $sql = "SELECT * FROM uyeler WHERE kullanici_adi='$kullanici_adi'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<div class='alert alert-danger'>Bu kullanıcı adı zaten kullanılıyor.</div>";
    } else {
        // Yeni kullanıcı ekleme
        $sql = "INSERT INTO uyeler (ad, soyad, email, kullanici_adi, telefon, sifre) VALUES ('$ad', '$soyad', '$email', '$kullanici_adi', '$telefon', '$sifre')";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success'>Yeni üye başarıyla eklendi</div>";
        } else {
            echo "Hata: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>
