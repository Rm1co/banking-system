<?php


function getDarajaAccessToken() {
    $consumerKey ='0ZCWEE6EIW5hOrOIu2HN9WZ4YYo3EGKNr3pFrrbWWkntJWTw';
    $consumerSecret ='bfRHLygi1EuG35EmEgxMcAreZogTRsGtq1EePoISTnJcV17PtfQLsshhiQl1fJag';

    $sandbox_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

    $ch = curl_init($sandbox_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_USERPWD, $consumerKey . ':' . $consumerSecret);

    $response = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($response);

    if (isset($result->access_token)) {
        return ['success' => true, 'access_token' => $result->access_token];
    } else {
        return ['success' => false, 'error' => 'Failed to get access token'];
    }
}

// STK Push Function
function stkPush($phoneNumber, $amount, $bookingId, $accessToken) {
    $shortCode = '174379'; // Daraja sandbox shortcode
    $passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919'; 
    $timestamp = date('YmdHis');
    $password = base64_encode($shortCode . $passkey . $timestamp);

    $callbackUrl =  'https://c3ef1451ab6f.ngrok-free.app/velocity-motors/velocity-motors/banking-system-main/php/callback.php';
 

    $payload = [
        'BusinessShortCode' => $shortCode,
        'Password' => $password,
        'Timestamp' => $timestamp,
        'TransactionType' => 'CustomerPayBillOnline',
        'Amount' => $amount,
        'PartyA' => $phoneNumber,
        'PartyB' => $shortCode,
        'PhoneNumber' => $phoneNumber,
        'CallBackURL' => $callbackUrl,
        'AccountReference' => 'BOOKING#' . $bookingId,
        'TransactionDesc' => 'Car Booking Payment'
    ];

    $ch = curl_init('https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $accessToken
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));

    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}

