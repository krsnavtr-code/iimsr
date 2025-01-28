<?php
function cashfrremakepayment($amount,$name,$MobileNo,$email,$returnurl,$notifyurl,$orderid){
    //$mode = "PROD"; //<------------ PROD for production Live https://sandbox.cashfree.com/pg
    $mode = "TEST"; //<------------ Change to TEST for test server Test
    //api key live - 344347e52f013c18fb9f7a88043443
    //Secret key live - 991d122f6c7267c2428eafa7cdeb8272e27c00d9
    
    //api key test - 10834f444929e2ee49185eb9d43801
    //Secret key test - 1518fde101269cc44747ad1d39f99aa3c643a3bd
    
    $secretKey = "1518fde101269cc44747ad1d39f99aa3c643a3bd";
    $returndata = array();
    $postData = array(
        "appId" => '10834f444929e2ee49185eb9d43801',
        "orderId" => $orderid,
        "orderAmount" => $amount,
        "orderCurrency" =>'INR',
        "orderNote" => 'test order',
        "customerName" => $name,
        "customerPhone" => $MobileNo,
        "customerEmail" =>$email,
        "returnUrl" => $returnurl,
        "notifyUrl" => $notifyurl,
    );
    //print_r($postData);exit;
    ksort($postData);
    $signatureData = "";
    foreach ($postData as $key => $value){
        $signatureData .= $key.$value;
    }
    $signature = hash_hmac('sha256', $signatureData, $secretKey,true);
    $signature = base64_encode($signature);

    if ($mode == "PROD") {
        $url = "https://www.cashfree.com/checkout/post/submit";
    } else {
        $url = "https://test.cashfree.com/billpay/checkout/post/submit";
    }
    $returndata['postData'] = $postData;
    $returndata['signature'] = $signature;
    $returndata['url'] = $url;
    return $returndata;
}