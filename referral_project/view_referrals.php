<?php
$host = "localhost";
$dbname = "referrals";
$user = "root";
$pass = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT * FROM referrals ORDER BY id DESC");
    $referrals = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Referrals</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }

        /* hover tooltip style */
        td[data-details] {
            position: relative;
        }

        td[data-details]:hover::after {
            content: attr(data-details);
            position: absolute;
            left: 0;
            top: 100%;
            white-space: pre-line; /* preserves line breaks */
            background: #fff;
            border: 1px solid #ccc;
            padding: 8px;
            z-index: 10;
            width: 400px;
            box-shadow: 0px 2px 8px rgba(0,0,0,0.2);
        }

        a { text-decoration: none; margin: 0 5px; }
    </style>
</head>
<body>

<h2>All Referrals</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Receiving Agent</th>
        <th>Sending Agent</th>
        <th>Buyer Name</th>
        <th>Date Contacted</th>
        <th>First Appointment</th>
        <th>Referral Fee %</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($referrals as $referral): ?>
    <?php
        // Prepare full details for hover
        $details = "
Receiving Firm: {$referral['receiving_firm']}
Receiving City/State/ZIP: {$referral['receiving_city']}, {$referral['receiving_state']} {$referral['receiving_zip']}
Receiving Phone: {$referral['receiving_phone']}

Sending Firm: {$referral['sending_firm']}
Sending City/State/ZIP: {$referral['sending_city']}, {$referral['sending_state']} {$referral['sending_zip']}
Sending Phone: {$referral['sending_phone']}

Buyer Address: {$referral['buyer_address']}
Buyer City/State/ZIP: {$referral['buyer_city']}, {$referral['buyer_state']} {$referral['buyer_zip']}
Business Phone: {$referral['buyer_business_phone']}
Home Phone: {$referral['buyer_home_phone']}
Preferred Location: {$referral['buyer_pref_location']}
Home Size: {$referral['buyer_home_size']}
Home Type: {$referral['buyer_home_type']}
Adults: {$referral['buyer_num_adults']}
Children: {$referral['buyer_num_children']} ({$referral['buyer_children_ages']})

Receiving Sale Signature: {$referral['receiving_sale_signature']} ({$referral['receiving_sale_signature_date']})
Receiving Broker Signature: {$referral['receiving_broker_signature']} ({$referral['receiving_broker_signature_date']})
        ";
    ?>
    <tr>
        <td><?= $referral['id'] ?></td>
        <td data-details="<?= htmlspecialchars($details) ?>"><?= htmlspecialchars($referral['receiving_agent']) ?></td>
        <td data-details="<?= htmlspecialchars($details) ?>"><?= htmlspecialchars($referral['sending_agent']) ?></td>
        <td data-details="<?= htmlspecialchars($details) ?>"><?= htmlspecialchars($referral['buyer_name']) ?></td>
        <td><?= htmlspecialchars($referral['date_contacted']) ?></td>
        <td><?= htmlspecialchars($referral['first_appointment']) ?></td>
        <td><?= htmlspecialchars($referral['referral_fee_percent']) ?></td>
        <td>
            <a href="edit_referral.php?id=<?= $referral['id'] ?>">Edit</a>
            <a href="delete_referral.php?id=<?= $referral['id'] ?>"
               onclick="return confirm('Delete this referral?');">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>

</table>

</body>
</html>