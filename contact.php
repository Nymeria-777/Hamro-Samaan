<?php require('header.php');?>


<section class="contact" id="contact">
        <div class="content">
        <div class="abcd">
        <h2 style="color:#4fbfa8">
            Contact Us
        </h2>
    </div>
        <p style="color:#FFF; font-weight:600;">Lorem ipsum dolor sit amet consectetur,numquam amet consectetur, adipisicing  labore </p>
        </div>
        <div class="container">
            <div class="contactInfo">
                <div class="box">
                    <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                    <div class="text">
                        <h3>Address</h3>
                    <p style="color:#FFF;">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                    <div class="text">
                        <h3>Phone</h3>
                        <p style="color:#FFF;">9800000000</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                    <div class="text">
                        <h3>Email</h3>
                        <p style="color:#FFF;">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                    </div>
                </div>           
            </div>
             <!-- contact form -->
             <div class="contactForm">
             <form class="contact" action="" method="post">
                    <h2>Send Message</h2>
                    <div class="inputBox">
                    <input type="text" id="name" name="name" class="text-box" required>
                        <span>Full Name</span>
                    </div>
                    <div class="inputBox">
                    <input type="text" id="mobile" name="mobile" class="text-box" required>
                        <span>Your Number</span>
                    </div>
                    <div class="inputBox">
                    <input type="email" id="email" name="email" class="text-box"required>
                        <span>Email</span>
                    </div>
                    <div class="inputBox">
                        <textarea name="message" id="message" rows="5"  required></textarea>
                        <span>Type your Message...</span>
                    </div>
                    <button type="button" onclick="send_message()" class="send-btn">Submit</button>
                </form>
             </div>
        </div>
    </section>


<script type="text/javascript">
 
    function send_message(){
        var name=jQuery("#name").val();
        var email=jQuery("#email").val();
        var mobile=jQuery("#mobile").val();
        var message=jQuery("#message").val();
   
        if(name==""){
            alert('please enter name');
        }
        else if(email==""){
            alert('please enter email');
        }
        else if(mobile==""){
            alert('please enter mobile');
        }
        else if(message==""){
            alert('please enter message');
        }
        else{
            jQuery.ajax({
                url:'send_message.php',
                type:'post',
                data:'name='+name+'&email='+email+'&mobile='+mobile+'&message='+message,
                success:function(result){
                    alert(result);
                }
            });
        }
    }

    
 </script>
<?php require('footer.php') ?>