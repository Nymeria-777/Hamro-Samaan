<?php require('header.php'); ?>

<div class="account-page1">
    <div class="container1">
        <div class="row">
            
            <div class="container">
                <form id="form" action="/">
                    <h1>Registration</h1>
                    <div class="input-control">
                        <label for="username">Username</label>
                        <input id="name" name="username" type="text">
                        <div class="error"></div>
                    </div>
                    <div class="input-control">
                        <label for="email">Email</label>
                        <input id="email" name="email" type="text">
                        <div class="error"></div>
                    </div>
                    <div class="input-control">
                        <label for="mobile">Mobile</label>
                        <input id="mobile" name="mobile" type="text">
                        <div class="error"></div>
                    </div>
                    <div class="input-control">
                        <label for="password">Password</label>
                        <input id="password" name="password" type="password">
                        <div class="error"></div>
                    </div>
                    
                    <button type="button" onclick="user_register()">Sign Up</button>
                    <div class="login-signup">
                        <span class="text">Already a member?
                            <a href="login.php">Login Now</a>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
 
    function user_register(){
        var name=jQuery("#name").val();
        var email=jQuery("#email").val();
        var mobile=jQuery("#mobile").val();
        var password=jQuery("#password").val();
   
        if(name==""){
            alert('Please enter the valid name');
        }
        else if(email==""){
            alert('Please enter the valid email');
        }
        else if(mobile=="" || isNaN(mobile)){
            alert('please enter the valid mobile number');
        }
        else if(password==""){
            alert('please enter message');
        }
        else{
            jQuery.ajax({
                url:'register_submit.php',
                type:'post',
                data:'name='+name+'&email='+email+'&mobile='+mobile+'&password='+password,
                success:function(result){
                    if(result=='email_present'){
                        alert("Provided email address was already registered");
                    }else{
                        alert("Thanks for registering your email. Redirecting to Login Page.");
                        window.location.href ='login.php';
                    }
                    
                }
            });
        }
    }
 </script>

<?php require('footer.php'); ?>