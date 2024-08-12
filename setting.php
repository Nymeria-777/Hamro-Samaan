<?php
require('connection.inc.php');
require('functions.inc.php');


if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
?>
<script>
    window.location.href = 'index.php';
</script>
<?php
}
$cart_total = 0;
foreach ($_SESSION['cart'] as $key => $val) {
    $productArr = get_product($con, '', '', $key);
    $price = $productArr[0]['price'];
    $qty = $val['qty'];
    $cart_total = $cart_total + ($price * $qty);
}
$total_price = $cart_total;

$delivery = 50;
$grandtotal = $total_price +$delivery;
// Change Info From Here
$epay_url = "https://uat.esewa.com.np/epay/main";
$pid = "pid";
$successurl = "http://localhost/ecom/payment_complete.php";
$failedurl = "http://localhost/ecom/payment_fail.php";
$merchant_code = "epay_payment";
//$fraudcheck_url = "https://uat.esewa.com.np/epay/transrec";
// For Amount Check
$actualamount = 100000000;
    ?>