<?php
include('api.php');
$fname = $_POST['billing_name'];
$lname = $_POST['last_name'];
$name = $fname." ".$lname;
$billing_email = $_POST['billing_email'];
$billing_tel = $_POST['billing_tel'];
$amount = $_POST['amount'];
$today = date("Ymd");
$rand = strtoupper(substr(uniqid(sha1(time())),0,4));
$orderid = $today . $rand;
$cashfree = cashfrremakepayment($amount,$name,$billing_tel,$billing_email,'https://iimsr.net.in/payment-status.php','https://iimsr.net.in/payment-status.php',$orderid);
$postData =  $cashfree['postData'];
$signature =  $cashfree['signature'];
$url = $cashfree['url'];
?>

<body onload="document.frm1.submit()">
    <form action="<?php echo $url; ?>" name="frm1" method="post">
      <p>Please wait.......</p>
      <input type="hidden" name="signature" value='<?php echo $signature; ?>'/>
      <input type="hidden" name="orderNote" value='<?php echo $postData['orderNote']; ?>'/>
      <input type="hidden" name="orderCurrency" value='<?php echo $postData['orderCurrency']; ?>'/>
      <input type="hidden" name="customerName" value='<?php echo $postData['customerName']; ?>'/>
      <input type="hidden" name="customerEmail" value='<?php echo $postData['customerEmail']; ?>'/>
      <input type="hidden" name="customerPhone" value='<?php echo $postData['customerPhone']; ?>'/>
      <input type="hidden" name="orderAmount" value='<?php echo $postData['orderAmount']; ?>'/>
      <input type ="hidden" name="notifyUrl" value='<?php echo $postData['notifyUrl']; ?>'/>
      <input type ="hidden" name="returnUrl" value='<?php echo $postData['returnUrl']; ?>'/>
      <input type="hidden" name="appId" value='<?php echo $postData['appId']; ?>'/>
      <input type="hidden" name="orderId" value='<?php echo $postData['orderId']; ?>'/>
  </form>
</body>