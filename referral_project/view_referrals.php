<?php
// view_referrals.php

$host = "localhost";
$dbname = "referrals"; // your database name
$user = "root";
$pass = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch all referrals
    $stmt = $pdo->query("SELECT * FROM referrals ORDER BY created_at DESC");
    $referrals = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Referrals</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; }
        tr:nth-child(even) { background-color: #f9f9f9; }
    </style>
</head>
<body>
    <h1>All Referrals</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Receiving Agent</th>
                <th>Sending Agent</th>
                <th>Buyer Name</th>
                <th>Date Contacted</th>
                <th>First Appointment</th>
                <th>Referral Fee %</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($referrals): ?>
                <?php foreach ($referrals as $referral): ?>
                    <tr>
                        <td><?= $referral['id'] ?></td>
                        <td><?= htmlspecialchars($referral['receiving_agent']) ?></td>
                        <td><?= htmlspecialchars($referral['sending_agent']) ?></td>
                        <td><?= htmlspecialchars($referral['buyer_name']) ?></td>
                        <td><?= $referral['date_contacted'] ?></td>
                        <td><?= $referral['first_appointment'] ?></td>
                        <td><?= $referral['referral_fee_percent'] ?></td>
                        <td><?= $referral['created_at'] ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="8">No referrals found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>