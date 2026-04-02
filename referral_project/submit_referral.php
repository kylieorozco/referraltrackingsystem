<?php
header('Content-Type: application/json');

$host = "localhost";
$dbname = "referrals"; // your database name
$user = "root";        // default XAMPP MySQL user
$pass = "";            // default XAMPP MySQL password (usually empty)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed: ' . $e->getMessage()]);
    exit;
}

// Read JSON from form
$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (!$data) {
    echo json_encode(['success' => false, 'message' => 'Invalid JSON input.']);
    exit;
}

// Insert into table (same table columns as before)
$sql = "INSERT INTO referrals (
    receiving_agent, receiving_firm, receiving_city, receiving_state, receiving_zip, receiving_phone,
    sending_agent, sending_firm, sending_city, sending_state, sending_zip, sending_phone,
    buyer_name, buyer_address, buyer_city, buyer_state, buyer_zip, buyer_business_phone, buyer_home_phone,
    buyer_pref_location, buyer_home_size, buyer_home_type, buyer_price_range, buyer_num_adults,
    buyer_num_children, buyer_children_ages,
    date_contacted, first_appointment, referral_fee_percent,
    receiving_sale_signature, receiving_sale_signature_date,
    receiving_broker_signature, receiving_broker_signature_date
) VALUES (
    :receiving_agent, :receiving_firm, :receiving_city, :receiving_state, :receiving_zip, :receiving_phone,
    :sending_agent, :sending_firm, :sending_city, :sending_state, :sending_zip, :sending_phone,
    :buyer_name, :buyer_address, :buyer_city, :buyer_state, :buyer_zip, :buyer_business_phone, :buyer_home_phone,
    :buyer_pref_location, :buyer_home_size, :buyer_home_type, :buyer_price_range, :buyer_num_adults,
    :buyer_num_children, :buyer_children_ages,
    :date_contacted, :first_appointment, :referral_fee_percent,
    :receiving_sale_signature, :receiving_sale_signature_date,
    :receiving_broker_signature, :receiving_broker_signature_date
)";

$stmt = $pdo->prepare($sql);

try {
    $stmt->execute([
        ':receiving_agent' => $data['receiving_office']['agent_name'],
        ':receiving_firm' => $data['receiving_office']['firm_name'],
        ':receiving_city' => $data['receiving_office']['city'],
        ':receiving_state' => $data['receiving_office']['state'],
        ':receiving_zip' => $data['receiving_office']['zip'],
        ':receiving_phone' => $data['receiving_office']['phone'],

        ':sending_agent' => $data['sending_office']['agent_name'],
        ':sending_firm' => $data['sending_office']['firm_name'],
        ':sending_city' => $data['sending_office']['city'],
        ':sending_state' => $data['sending_office']['state'],
        ':sending_zip' => $data['sending_office']['zip'],
        ':sending_phone' => $data['sending_office']['phone'],

        ':buyer_name' => $data['buyer']['name'],
        ':buyer_address' => $data['buyer']['address'],
        ':buyer_city' => $data['buyer']['city'],
        ':buyer_state' => $data['buyer']['state'],
        ':buyer_zip' => $data['buyer']['zip'],
        ':buyer_business_phone' => $data['buyer']['business_phone'],
        ':buyer_home_phone' => $data['buyer']['home_phone'],
        ':buyer_pref_location' => $data['buyer']['preferred_location'],
        ':buyer_home_size' => $data['buyer']['home_size'],
        ':buyer_home_type' => $data['buyer']['home_type'],
        ':buyer_price_range' => $data['buyer']['price_range'],
        ':buyer_num_adults' => $data['buyer']['num_adults'],
        ':buyer_num_children' => $data['buyer']['num_children'],
        ':buyer_children_ages' => $data['buyer']['children_ages'],

        ':date_contacted' => $data['referral_acceptance']['date_contacted'],
        ':first_appointment' => $data['referral_acceptance']['first_appointment'],
        ':referral_fee_percent' => $data['referral_acceptance']['referral_fee_percent'],
        ':receiving_sale_signature' => $data['referral_acceptance']['receiving_sale_signature'],
        ':receiving_sale_signature_date' => $data['referral_acceptance']['receiving_sale_signature_date'],
        ':receiving_broker_signature' => $data['referral_acceptance']['receiving_broker_signature'],
        ':receiving_broker_signature_date' => $data['referral_acceptance']['receiving_broker_signature_date']
    ]);

    echo json_encode(['success' => true, 'message' => 'Referral submitted successfully!']);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Database insert failed: ' . $e->getMessage()]);
}
?>