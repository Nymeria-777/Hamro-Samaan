<?php
include 'setting.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esewa</title>
    <!-- Latest compiled and minified CSS -->

</head>

<body background="images/esewa.jpg">

     <form action=<?php echo $epay_url ?> method="POST" class="form">
                <input value="<?php echo $grandtotal ?>" name="tAmt" type="hidden">
                <input value="<?php echo $total_price ?>" name="amt" type="hidden">
                <input value="0" name="txAmt" type="hidden">
                <input value="0" name="psc" type="hidden">
                <input value="<?php echo $delivery ?>" name="pdc" type="hidden">
                <input value=<?php echo $merchant_code ?> name="scd" type="hidden">
                <input value="<?php echo $pid ?>" name="pid" type="hidden">
                <input value=<?php echo $successurl ?> type="hidden" name="su">
                <input value=<?php echo $failedurl ?> type="hidden" name="fu"> 
    <!-- <form action="https://uat.esewa.com.np/epay/main" method="POST">
        <input value="100" name="tAmt" type="hidden">
        <input value="90" name="amt" type="hidden">
        <input value="5" name="txAmt" type="hidden">
        <input value="2" name="psc" type="hidden">
        <input value="3" name="pdc" type="hidden">
        <input value="EPAYTEST" name="scd" type="hidden">
        <input value="ee2c3ca1-696b-4cc5-a6be-2c40d929d453" name="pid" type="hidden">
       
        <input value=<?php echo $successurl ?> type="hidden" name="su">
                <input value=<?php echo $failedurl ?> type="hidden" name="fu"> -->
                <input value="Pay with Esewa" type="submit" class="btn-primary">
    </form>





    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>