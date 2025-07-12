<?php
include 'connect.php';
include 'daraja.php';


session_start();
header('Content-Type: application/json');
if (!isset($_SESSION['user'])) {
    echo json_encode(["status" => "unauthorized", "error" => "User not logged in"]);
    exit;
}

function insertBooking($pdo, $pickupDate, $pickupTime, $returnDate, $returnTime, $additionalDrivers,  $vehicleId, $userId) {
    try {
        $sql = "INSERT INTO bookings (PickupDate,PickupTime,ReturnDate,ReturnTime, additionalDriver,filterdetailsid, userid) 
                VALUES (:pickupDate, :pickupTime, :returnDate, :returnTime, :additionalDrivers, :vehicleId, :userId)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':pickupDate', $pickupDate);
        $stmt->bindParam(':pickupTime', $pickupTime);
        $stmt->bindParam(':returnDate', $returnDate);
        $stmt->bindParam(':returnTime', $returnTime);
        $stmt->bindParam(':additionalDrivers', $additionalDrivers);        
        $stmt->bindParam(':vehicleId', $vehicleId);
        $stmt->bindParam(':userId', $userId);
        
        if ($stmt->execute()) {
           return $pdo->lastInsertId(); 
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'msg' => 'Database error: ' . $e->getMessage()]);
        exit;
    }
}

if($_SERVER['REQUEST_METHOD']==='POST'){
    $data = json_decode(file_get_contents("php://input"), true);
    
$pickupDate = $data['pickupDate'];
$pickupTime = $data['pickupTime'];
$returnDate = $data['returnDate'];
$returnTime = $data['returnTime'];
$additionalDrivers = $data['additionalDrivers'];
$mpesaNumber = $data['mpesaNumber'];
$vehicleId = $data['carid'];
$totalAmount = $data['totalAmount'];

  // make sure all required fields are present

if (empty($pickupDate) || empty($pickupTime) || empty($returnDate) || empty($returnTime) || empty($mpesaNumber) || empty($vehicleId)|| empty($additionalDrivers)) {
    echo json_encode(['status' => 'error', 'msg' => 'All fields are required']);
    exit;
}

//ensure mpesa number is a valid  kenyan safaricom number

if (empty($mpesaNumber) || !preg_match('/^(\+254|0)[7-9][0-9]{8}$/', $mpesaNumber)) {
    echo json_encode(['status' => 'error', 'msg' => 'Phone number should be a valid Safaricom number']);
    exit;
}

// ✅ Normalize to 2547XXXXXXXX
$mpesaNumber = preg_replace('/^(\+254|0)/', '254', $mpesaNumber);

  $isInsertedid = insertBooking($pdo, $pickupDate, $pickupTime, $returnDate, $returnTime, $additionalDrivers, $vehicleId, $_SESSION['user']);

if (!$isInsertedid) {
    echo json_encode(['status' => 'error', 'msg' => 'Failed to insert booking']);
    exit;
}

    // initiate the stk push payment
    $access = getDarajaAccessToken();
    if (!$access['success']) {
        echo json_encode(['status' => 'error', 'msg' => 'Failed to get access token']);
        exit;
    }

    // ✅ STK Push
    $stkResponse = stkPush($mpesaNumber, $totalAmount, $isInsertedid, $access['access_token']);

    echo json_encode([
        'status' => 'success',
        'bookingId' => $isInsertedid,
        'stkResponse' => $stkResponse
    ]);



}