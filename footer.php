
    <!-- footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                <a href="index.php"> <img src="images/logoo.png" alt="" ></a> 
                    <p> Living made easy <BR> Appliances for your ease</p>
                </div>
                <div class="footer-col-3">
                    <h3>Useful Links</h3>
                    <ul>
                        <li> <a href="index.php">Home</a></li>
                        <li> <a href="ourproduct.php">Products</a></li>
                       
                        <li> <a href="contact.php">Contact Us</a></li>`
                        
                    </ul>
                </div>
                    <div class="footer-col-3">
                        <h3>User Panel Links</h3>
                        <ul>
                        <?php
                        if (isset($_SESSION['USER_LOGIN'])) {

                            echo '<li ><a href="logout.php">Logout</a></li> ';
                            echo '<li ><a href="myorder.php">Myorder</a></li> ';
                            
                        } else {
                            echo '<li><a href="login.php">Login</a></li>
                            <li ><a href="register.php">Register</a></li>';
                        }
                        ?>
                            <li> <a href="cart.php">Shopping Cart</a></li>
                                          
                        </ul>
                    </div>
                    <div class="footer-col-4">
                        <h3>Follow Us</h3>
                        <ul>
                            <li> <a href="https://www.facebook.com/">Facebook</a></li>
                            <li> <a href="https://www.instagram.com/">Instagram</a></li>
                            <li> <a href="https://www.twitter.com">Twitter </a></li>
                                          
                        </ul>
                    </div>
            </div>
            <hr>
            <p class="copyright">Copyright 2023- APPS</p>
        </div>
    </div>


</body>


</html>