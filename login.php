<?php require('header.php'); 
if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']=='yes'){
    ?><script>
        window.location.href='my_order.php';
        </script>
        <?php
}
?>

<div class="account-page">
    <div class="container1">
        <div class="row">
            
            <div class="container">
                <form id="form" action="/">
                    <h1>Login</h1>

                    <div class="input-control">
                        <label for="email">Email</label>
                        <input id="email_login" name="email1" type="text">
                        <div class="error"></div>
                    </div>
                    <div class="input-control">
                        <label for="password">Password</label>
                        <input id="password_login" name="password1" type="password">
                        <div class="error"></div>
                    </div>
                    <button type="button" onclick="user_login()">Login</button>
                    <div class="login-signup">
                        <span class="text">Not a member?
                            <a href="register.php">Signup Now</a>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

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
                        alert("Please enter valid login details");
                    }
                    if (result == 'valid') {
                        window.location.href ='checkout.php';
                    }
                }
                });
        }
    }
</script>
<?php require('footer.php'); ?>