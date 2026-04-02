<?php
$pdo = new PDO("mysql:host=localhost;dbname=referrals;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "UPDATE referrals SET
    receiving_agent = :receiving_agent,
    receiving_firm = :receiving_firm,
    receiving_city = :receiving_city,
    receiving_state = :receiving_state,
    receiving_zip = :receiving_zip,
    receiving_phone = :receiving_phone,
    sending_agent = :sending_agent,
    sending_firm = :sending_firm,
    sending_city = :sending_city,
    sending_state = :sending_state,
    sending_zip = :sending_zip,
    sending_phone = :sending_phone,
    buyer_name = :buyer_name,
    buyer_address = :buyer_address,
    buyer_city = :buyer_city,
    buyer_state = :buyer_state,
    buyer_zip = :buyer_zip,
    buyer_business_phone = :buyer_business_phone,
    buyer_home_phone = :buyer_home_phone,
    buyer_pref_location = :buyer_pref_location,
    buyer_home_size = :buyer_home_size,
    buyer_home_type = :buyer_home_type,
    buyer_price_range = :buyer_price_range,
    buyer_num_adults = :buyer_num_adults,
    buyer_num_children = :buyer_num_children,
    buyer_children_ages = :buyer_children_ages,
    date_contacted = :date_contacted,
    first_appointment = :first_appointment,
    referral_fee_percent = :referral_fee_percent,
    receiving_sale_signature = :receiving_sale_signature,
    receiving_sale_signature_date = :receiving_sale_signature_date,
    receiving_broker_signature = :receiving_broker_signature,
    receiving_broker_signature_date = :receiving_broker_signature_date
WHERE id = :id";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':receiving_agent' => $_POST['receiving_agent'],
    ':receiving_firm' => $_POST['receiving_firm'],
    ':receiving_city' => $_POST['receiving_city'],
    ':receiving_state' => $_POST['receiving_state'],
    ':receiving_zip' => $_POST['receiving_zip'],
    ':receiving_phone' => $_POST['receiving_phone'],
    ':sending_agent' => $_POST['sending_agent'],
    ':sending_firm' => $_POST['sending_firm'],
    ':sending_city' => $_POST['sending_city'],
    ':sending_state' => $_POST['sending_state'],
    ':sending_zip' => $_POST['sending_zip'],
    ':sending_phone' => $_POST['sending_phone'],
    ':buyer_name' => $_POST['buyer_name'],
    ':buyer_address' => $_POST['buyer_address'],
    ':buyer_city' => $_POST['buyer_city'],
    ':buyer_state' => $_POST['buyer_state'],
    ':buyer_zip' => $_POST['buyer_zip'],
    ':buyer_business_phone' => $_POST['buyer_business_phone'],
    ':buyer_home_phone' => $_POST['buyer_home_phone'],
    ':buyer_pref_location' => $_POST['buyer_pref_location'],
    ':buyer_home_size' => $_POST['buyer_home_size'],
    ':buyer_home_type' => $_POST['buyer_home_type'],
    ':buyer_price_range' => $_POST['buyer_price_range'],
    ':buyer_num_adults' => $_POST['buyer_num_adults'],
    ':buyer_num_children' => $_POST['buyer_num_children'],
    ':buyer_children_ages' => $_POST['buyer_children_ages'],
    ':date_contacted' => $_POST['date_contacted'],
    ':first_appointment' => $_POST['first_appointment'],
    ':referral_fee_percent' => $_POST['referral_fee_percent'],
    ':receiving_sale_signature' => $_POST['receiving_sale_signature'],
    ':receiving_sale_signature_date' => $_POST['receiving_sale_signature_date'],
    ':receiving_broker_signature' => $_POST['receiving_broker_signature'],
    ':receiving_broker_signature_date' => $_POST['receiving_broker_signature_date'],
    ':id' => $_POST['id']
]);

header("Location: view_referrals.php");
exit;
?>