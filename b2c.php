<?php
include 'accessToken.php';
include 'securitycridential.php';
$b2c_url = 'https://sandbox.safaricom.co.ke/mpesa/b2c/v1/paymentrequest';
$InitiatorName = 'testapi';
$pass = "Safaricom999!*!";
$BusinessShortCode = "600996";
$phone = "254708374149";
$amountsend = '1';
//$SecurityCredential ='M3Dk59baGvMP+vyVEN+meB7DU2MUhwDRXoF1zUpIl08qezv/wMcMQXaY2dkUdZ72edYVUkpDWduNd/u0HkTLS3TE73WTZ4wdfaPYx8lAkh0XNQRfPqtHAyHibqClpBYOpZy5wUyhzX7Nu7JujYI4PtYcZPNQC1/lOEMbYiqSE/4wL+55HMoFr9iIsZlwk43AWcMwUIGiFYaoh/KkAosE2nWItuiaphe20bi6KBYTNhYlrDVRSFJ8xfsEfazBf1d2geC1LRH4OJ+Tl6JNvclvx2CjWsnoKhlnfv0lppPcDTuhyMPOfJhhZvllM0qJQQtuBR1VCQg/P8N8ONjKbcEbaQ==';
$CommandID = 'SalaryPayment'; // SalaryPayment, BusinessPayment, PromotionPayment
$Amount = $amountsend;
$PartyA = $BusinessShortCode;
$PartyB = $phone;
$Remarks = 'Umeskia Withdrawal';
$QueueTimeOutURL = 'https://1c95-105-161-14-223.ngrok-free.app/MPEsa-Daraja-Api/b2cCallbackurl.php';
$ResultURL = 'https://1c95-105-161-14-223.ngrok-free.app/MPEsa-Daraja-Api/dataMaxcallbackurl.php';
$Occasion = 'Online Payment';
/* Main B2C Request to the API */
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $b2c_url);
curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type:application/json', 'Authorization:Bearer ' . $access_token]);
$curl_post_data = array(
    'InitiatorName' => $InitiatorName,
    'SecurityCredential' => $SecurityCredential,
    'CommandID' => $CommandID,
    'Amount' => $Amount,
    'PartyA' => $PartyA,
    'PartyB' => $PartyB,
    'Remarks' => $Remarks,
    'QueueTimeOutURL' => $QueueTimeOutURL,
    'ResultURL' => $ResultURL,
    'Occasion' => $Occasion
);
$data_string = json_encode($curl_post_data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
$curl_response = curl_exec($curl);
echo $curl_response;
