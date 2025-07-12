<?php
include 'connect.php';

$data = file_get_contents('php://input');

if (!$data) {
    file_put_contents('callback_log.txt', "❌ No callback data received.\n", FILE_APPEND);
    exit;
}

 file_put_contents('callback_log.txt', "✅ Raw Callback:\n" . $data . "\n", FILE_APPEND);

$callback = json_decode($data, true);

if (!isset($callback['Body']['stkCallback'])) {
    file_put_contents('callback_log.txt', "❌ Invalid callback structure\n", FILE_APPEND);
    exit;
}

$stk = $callback['Body']['stkCallback'];
$resultCode = $stk['ResultCode'];
$amount = null;
$receipt = null;
$phone = null;
$bookingId = null;

// Extract values
if (isset($stk['CallbackMetadata']['Item'])) {
    foreach ($stk['CallbackMetadata']['Item'] as $item) {
        switch ($item['Name']) {
            case 'Amount':
                $amount = $item['Value'];
                break;
            case 'MpesaReceiptNumber':
                $receipt = $item['Value'];
                break;
            case 'PhoneNumber':
                $phone = $item['Value'];
                break;
            case 'AccountReference':
                if (preg_match('/BOOKING#(\d+)/', $item['Value'], $matches)) {
                    $bookingId = $matches[1];
                }
                break;
        }
    }
}

// ✅ Stop if booking ID is missing
if (!$bookingId) {
    file_put_contents('callback_log.txt', "❌ Booking ID not found in AccountReference\n", FILE_APPEND);
    exit;
}

// Insert payment record
try {
    $stmt = $pdo->prepare("INSERT INTO payment (
        Bookingid, Paymentamount, Paymentdate, Paymentstatus
    ) VALUES (
        :bookingId, :amount, NOW(), :status
    )");

    $stmt->execute([
        ':bookingId' => $bookingId,
        ':amount' => $amount ?? 0,
        ':status' => $resultCode == 0 ? 'Success' : 'Failed'
    ]);

    file_put_contents('callback_log.txt', "✅ Inserted payment for Booking ID $bookingId\n", FILE_APPEND);

} catch (PDOException $e) {
    file_put_contents('callback_log.txt', "❌ DB Error: " . $e->getMessage() . "\n", FILE_APPEND);
}

header('Content-Type: application/json');
echo json_encode(["ResultCode" => 0, "ResultDesc" => "Callback received successfully"]);
