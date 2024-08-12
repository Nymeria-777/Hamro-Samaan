<?php
require('header.php');


if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
?>
<script type="text/javascript">
    window.location.href = 'index.php';
</script>
<?php
}
$cart_total = 0;
if (isset($_POST['submit'])) {
    $address = get_safe_value($con, $_POST['address']);
    $city = get_safe_value($con, $_POST['city']);
    $pincode = get_safe_value($con, $_POST['pincode']);
    $payment_type = get_safe_value($con, $_POST['payment_type']);
    $user_id = $_SESSION['USER_ID'];
    $name= get_safe_value($con, $_POST['name']);
    $mobile= get_safe_value($con, $_POST['mobile']);
   
    foreach ($_SESSION['cart'] as $key => $val) {
        $productArr = get_product($con, '', '', $key);
        $price = $productArr[0]['price'];
        $qty = $val['qty'];
        $cart_total = $cart_total + ($price * $qty);
    }
    $total_price = $cart_total;
    $payment_status = 'pending';
    if ($payment_type == 'cod') {
        $payment_status = 'success';
    }
    $order_status = '1';
    $added_on = date('y-m-d h:i:s');
    mysqli_query($con, "insert into `order`(user_id,address,city,pincode,payment_type,payment_status,order_status,added_on,total_price,name,mobile) values('$user_id','$address','$city','$pincode','$payment_type','$payment_status','$order_status','$added_on','$total_price','$name','$mobile')");

    $order_id = mysqli_insert_id($con);
    foreach ($_SESSION['cart'] as $key => $val) {
        $productArr = get_product($con, '', '', $key);
        $price = $productArr[0]['price'];
        $qty = $val['qty'];
        mysqli_query($con, "insert into `order_detail`(order_id,product_id,qty,price) 
    values('$order_id','$key','$qty','$price')");
    }

    if ($payment_type == 'esewa') {
        $payment_status = 'success';
?>

<script type="text/javascript">

    window.location.href = 'esewa.php';
</script>
<?php

    } else {
        unset($_SESSION['cart']);
        ?>

<script type="text/javascript">

    window.location.href = 'Thankyou.php';
</script>
<?php
    }
}

?>

<div class="checkout-wrap ptb--100">
    <div class="container">
        <div class="row-checkout">
            <div class="col-md-8">
                <div class="checkout__inner">
                    <div class="accordion-list">
                        <div class="accordion">
                            <div class="col-md-4">
                                <div class="order-details">
                                    <h5 class="order-details__title">Your Order</h5>
                                    <hr>
                                    <div class="small-container cart-page" style="border-">
    <table>
                                    <tr class="red">
            <th width="45%">Product Image/Name</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th width="25%">Action</th>
        </tr>
</table>
</div>
                                    <?php
                                        $cart_total = 0;
                                        foreach ($_SESSION['cart'] as $key => $val) {

                                            $productArr = get_product($con, '', '', $key);
                                            $pname = $productArr[0]['name'];
                                            
                                            $price = $productArr[0]['price'];
                                            $image = $productArr[0]['image'];
                                            $qty = $val['qty'];
                                            $cart_total = $cart_total + ($price * $qty);
                                        
                                        ?>
                                                                   
<div class="small-container cart-page" style="margin-top:-35px">
    <table>
        
        <tr>
            <td width="45%">
                <div class="cart-info">
                <img src="<?php echo 'media/product/' . $image ?> " alt="ordered item">
                    <div>
                        <p style="margin-top:25px;"> <?php echo $pname ?></p>
                       Price: Rs <?php echo $price ?>
                        <br>
                        
                    </div>
                </div>
            </td>
            
            <td>
               <input type="number" min="1" id="<?php echo $key ?>qty" value="<?php echo $qty ?>">
            </td>
            <td>
                                        </td>
            <td>
                Rs <?php echo $qty*$price ?>
            </td>
            <td width="25%">
            <a href="javascript:void(0)" class='btn btn-primary' onclick="manage_cart('<?php echo $key ?>','update')">Update</a>
                        
             <a href="javascript:void(0)"  class='btn btn-danger' onclick="manage_cart('<?php echo $key ?>','remove')">Remove</a>
            </td>
        </tr>
        <?php } ?>
    </table>

    <div class="total-price">
        <table>
            <tr>
                <td>Grand Total</td>
                <td><span class="price">
                                            Rs <?php echo $cart_total ?>
                                        </span></td>
            </tr>
                       
            
            
        </table>
        
    </div>
    
</div>

                            </div>
                            <br>

                            <?php
                            $accordion_class = 'accordion__title';
                            if (!isset($_SESSION['USER_LOGIN'])) {
                                $accordion_class = 'accordion__hide';
                            ?>
                            <script type="text/javascript">
    window.location.href = 'login.php';
</script>                            <?php } ?>
                            <form method="post">
                                <div class="<?php echo $accordion_class ?>">
                                    Other information
                                </div>

                                <div class="accordion__body">
                                    <div class="bilinfo">

                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="single-input">
                                                    <input type="text" name="name" placeholder="Your Name"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-input">
                                                    <input type="text" name="mobile" placeholder="Your contact number"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-input">
                                                    <input type="text" name="address" placeholder="Street Address"
                                                        required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="single-input">
                                                    <input type="text" name="city" placeholder="City/State" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-input">
                                                    <input type="text" name="pincode" placeholder="Post code/ zip"
                                                        required>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="<?php echo $accordion_class ?>">
                                    payment information
                                </div>
                                <div class="accordion__body">
                                    <div class="paymentinfo">
                                        <div class="single-method">

                                            COD <input type="radio" name="payment_type" value="COD" required />&nbsp;
                                            e-Sewa<input type="radio" name="payment_type" value="esewa" required />

                                        </div>


                                    </div>
                                </div>
                                <input type="submit" name="submit" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    
<script type="text/javascript">
function manage_cart(pid,type){
	if(type=='update'){
		var qty=jQuery("#"+pid+"qty").val();
	}else{
		var qty=jQuery("#qty").val();
	}
	jQuery.ajax({
		url:'manage_cart.php',
		type:'post',
		data:'pid='+pid+'&qty='+qty+'&type='+type,
		success:function(result){
            
                if(type=='update' || type=='remove'){
                    window.location.href=window.location.href;
                }
			if(result=='not_avaliable'){
				alert('Qty not avaliable');	
			}
		}	
	});	
}





        function user_login() {

            var email = jQuery("#email_login").val();

            var password = jQuery("#password_login").val();

            if (email == "") {
                alert('please enter email');
            }
            else if (password == "") {
                alert('please enter password');
            }
            else {
                jQuery.ajax({
                    url: 'login_submit.php',
                    type: 'post',
                    data: 'email=' + email + '&password=' + password,
                    success: function (result) {
                        if (result == 'wrong') {
                            alert("Plase enter valid login details");
                        }
                        if (result == 'valid') {
                            window.location.href = window.location.href;
                        }
                    }
                });
            }
        }

        function user_register() {
            var name = jQuery("#name").val();
            var email = jQuery("#email").val();
            var mobile = jQuery("#mobile").val();
            var password = jQuery("#password").val();

            if (name == "") {
                alert('please enter name');
            }
            else if (email == "") {
                alert('please enter email');
            }
            else if (mobile == "") {
                alert('please enter mobile');
            }
            else if (password == "") {
                alert('please enter message');
            }
            else {
                jQuery.ajax({
                    url: 'register_submit.php',
                    type: 'post',
                    data: 'name=' + name + '&email=' + email + '&mobile=' + mobile + '&password=' + password,
                    success: function (result) {
                        if (result == 'email_present') {
                            alert("Email present");
                        } else {
                            alert("Registered");
                        }

                    }
                });
            }
        }

        function emeAccordion() {
            $('.accordion__title')
                .siblings('.accordion__title').removeClass('active')
                .first().addClass('active');
            $('.accordion__body')
                .siblings('.accordion__body').slideUp()
                .first().slideDown();
            $('.accordion').on('click', '.accordion__title', function () {
                $(this).addClass('active').siblings('.accordion__title').removeClass('active');
                $(this).next('.accordion__body').slideDown().siblings('.accordion__body').slideUp();
            });
        };
        emeAccordion();
    </script>
    <?php require('footer.php'); ?>