<?php
$host = "localhost";
$dbname = "referrals";
$user = "root";
$pass = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['id'])) {
        $stmt = $pdo->prepare("DELETE FROM referrals WHERE id = :id");
        $stmt->execute([':id' => $_GET['id']]);
    }

    header("Location: view_referrals.php");
    exit;

} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>