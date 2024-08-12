<?php
require('connection.inc.php');

require('functions.inc.php');

$cat_res = mysqli_query($con, "select * from categories where status=1 order by categories asc");
$cat_arr = array();
while ($row = mysqli_fetch_assoc($cat_res)) {
    $cat_arr[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Samaan</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css">

</head>

<body>

    <div class="header" id="head-er">
        <div class="container">

            <div class="navbar" style="font-family: 'Poppins', sans-serif;">
                <div class="logo">
                    <a href="index.php"><img src="images/logoo.png" width="140px"></a>
                </div>
                <nav>
                    <ul id="MenuItems">
                        
                        <li class="test"><a href="index.php">Home</a></li>
                        

                        <li class="test"><a href="Contact.php">Contact</a></li>
                        

                        <?php
                        if (isset($_SESSION['USER_LOGIN'])) {

                            echo '<li class="test"><a href="logout.php">Logout</a></li> ';
                            echo '<li class="test"><a href="myorder.php">Myorder</a></li> ';
                            echo '<li class="test"> Hi!<b> ' . $_SESSION['USER_NAME'] . '</b></li> ';
                        } else {
                            echo '<li class="test"><a href="login.php">Login</a></li>
                            <li class="test"><a href="register.php">Register</a></li>';
                        }
                        ?>

                    </ul>
                </nav>

                <div class="search__area">
                    <div class="container">
                        <div class="row_search ">
                            <div class="col-md-12">
                                <div class="search__inner">
                                    <form action="search.php" method="get">
                                        <input placeholder="Search here... " type="text" name="str">
                                        <button type="submit"><img src="images/search.png" width="15px"></button>
                                    </form>
                                    <div class="search__close__btn">
                                        <span class="search__close__btn_icon"><i class="zmdi zmdi-close"><img src="images/remove.png" width="20px"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header__search search search__open">
                    <a href="" class="icon-magnifier icons"><img src="images/search.png" width="20px"></a>

                </div>
                
                    <a href="cart.php"><img src="images/cart.png" width="30px" height="30px"></a>
                    <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
             
                    
            </div>
            
         
        </div>
        <div class="abc">

                    </div>

</div>