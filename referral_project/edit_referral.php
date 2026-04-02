<?php
$pdo = new PDO("mysql:host=localhost;dbname=referrals;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM referrals WHERE id = :id");
$stmt->execute([':id' => $id]);
$referral = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Referral</title>
</head>
<body>

<h2>Edit Referral</h2>

<form action="update_referral.php" method="POST">

<input type="hidden" name="id" value="<?= $referral['id'] ?>">

<h3>Receiving Office</h3>
Agent: <input type="text" name="receiving_agent" value="<?= $referral['receiving_agent'] ?>"><br>
Firm: <input type="text" name="receiving_firm" value="<?= $referral['receiving_firm'] ?>"><br>
City: <input type="text" name="receiving_city" value="<?= $referral['receiving_city'] ?>"><br>
State: <input type="text" name="receiving_state" value="<?= $referral['receiving_state'] ?>"><br>
Zip: <input type="text" name="receiving_zip" value="<?= $referral['receiving_zip'] ?>"><br>
Phone: <input type="text" name="receiving_phone" value="<?= $referral['receiving_phone'] ?>"><br><br>

<h3>Sending Office</h3>
Agent: <input type="text" name="sending_agent" value="<?= $referral['sending_agent'] ?>"><br>
Firm: <input type="text" name="sending_firm" value="<?= $referral['sending_firm'] ?>"><br>
City: <input type="text" name="sending_city" value="<?= $referral['sending_city'] ?>"><br>
State: <input type="text" name="sending_state" value="<?= $referral['sending_state'] ?>"><br>
Zip: <input type="text" name="sending_zip" value="<?= $referral['sending_zip'] ?>"><br>
Phone: <input type="text" name="sending_phone" value="<?= $referral['sending_phone'] ?>"><br><br>

<h3>Buyer Information</h3>
Name: <input type="text" name="buyer_name" value="<?= $referral['buyer_name'] ?>"><br>
Address: <input type="text" name="buyer_address" value="<?= $referral['buyer_address'] ?>"><br>
City: <input type="text" name="buyer_city" value="<?= $referral['buyer_city'] ?>"><br>
State: <input type="text" name="buyer_state" value="<?= $referral['buyer_state'] ?>"><br>
Zip: <input type="text" name="buyer_zip" value="<?= $referral['buyer_zip'] ?>"><br>
Business Phone: <input type="text" name="buyer_business_phone" value="<?= $referral['buyer_business_phone'] ?>"><br>
Home Phone: <input type="text" name="buyer_home_phone" value="<?= $referral['buyer_home_phone'] ?>"><br>
Preferred Location: <input type="text" name="buyer_pref_location" value="<?= $referral['buyer_pref_location'] ?>"><br>
Home Size: <input type="text" name="buyer_home_size" value="<?= $referral['buyer_home_size'] ?>"><br>
Home Type: <input type="text" name="buyer_home_type" value="<?= $referral['buyer_home_type'] ?>"><br>
Price Range: <input type="text" name="buyer_price_range" value="<?= $referral['buyer_price_range'] ?>"><br>
Adults: <input type="text" name="buyer_num_adults" value="<?= $referral['buyer_num_adults'] ?>"><br>
Children: <input type="text" name="buyer_num_children" value="<?= $referral['buyer_num_children'] ?>"><br>
Children Ages: <input type="text" name="buyer_children_ages" value="<?= $referral['buyer_children_ages'] ?>"><br><br>

<h3>Referral Acceptance</h3>
Date Contacted: <input type="date" name="date_contacted" value="<?= $referral['date_contacted'] ?>"><br>
First Appointment: <input type="date" name="first_appointment" value="<?= $referral['first_appointment'] ?>"><br>
Referral Fee %: <input type="text" name="referral_fee_percent" value="<?= $referral['referral_fee_percent'] ?>"><br>

Receiving Sale Signature: <input type="text" name="receiving_sale_signature" value="<?= $referral['receiving_sale_signature'] ?>"><br>
Signature Date: <input type="date" name="receiving_sale_signature_date" value="<?= $referral['receiving_sale_signature_date'] ?>"><br>

Receiving Broker Signature: <input type="text" name="receiving_broker_signature" value="<?= $referral['receiving_broker_signature'] ?>"><br>
Broker Signature Date: <input type="date" name="receiving_broker_signature_date" value="<?= $referral['receiving_broker_signature_date'] ?>"><br><br>

<button type="submit">Update Referral</button>

</form>

</body>
</html>