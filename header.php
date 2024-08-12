<?php
require('connection.inc.php');
require('add_to_cart.inc.php');
require('functions.inc.php');

$cat_res = mysqli_query($con, "select * from categories where status=1 order by categories asc");
$cat_arr = array();
while ($row = mysqli_fetch_assoc($cat_res)) {
    $cat_arr[] = $row;
}

$obj=new add_to_cart();
$totalProduct=$obj->totalProduct();
?>
<?php

$sub_cat_res = mysqli_query($con, "select * from sub_categories where status=1 order by sub_categories asc");
$sub_cat_arr = array();
while ($row = mysqli_fetch_assoc($sub_cat_res)) {
    $sub_cat_arr[] = $row;
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
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">

</head>

<body>

<header>
            <div class="logo">
                <a href="index.php"><img src="images/logoo.png" width="140px"></a>
            </div>
<div class="group" >
        <ul class="navigation">
            
        <li ><a href="index.php">Home</a></li>
                    

                    <li ><a href="ourproduct.php">Products</a></li>
                    <li ><a href="cart.php"> Cart  (<?php echo $totalProduct ?>)</a></li>
                    

                    <?php
                    if (isset($_SESSION['USER_LOGIN'])) {
                       
                        echo '<li ><a href="logout.php">Logout</a></li> ';
                        
                        echo '<li class="test"><a href="myorder.php"> Hi!<b> ' . $_SESSION['USER_NAME'] . '</b></a></li> ';
                    } else {
                        echo '<li ><a href="login.php">Login</a></li>
                        <li><a href="register.php">Register</a></li>';
                    }
                    ?>

            
        </ul>
        <div class="search">
            <span class="icon">
                <ion-icon name="search-outline" class="searchBtn"></ion-icon>
                <ion-icon name="close-outline" class="closeBtn"></ion-icon>
            </span>
        </div>

         <ion-icon name="menu-outline" class="menuToggle"></ion-icon>

        <div class="searchBox">
        <form action="search.php" method="get">
           <input placeholder="Search here... " type="text" name="str" >
                </form>
        </div>
</header>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


<script type="text/javascript">
    let searchBtn = document.querySelector('.searchBtn');
    let closeBtn = document.querySelector('.closeBtn');
    let searchBox  = document.querySelector('.searchBox');
    let navigation  = document.querySelector('.navigation');
    let menuToggle  = document.querySelector('.menuToggle');
    let header  = document.querySelector('header');
    
    searchBtn.onclick = function(){
        searchBox.classList.add('active');
        closeBtn.classList.add('active');
        searchBtn.classList.add('active');
        menuToggle.classList.add('hide');
        header.classList.remove('open');
    }

    closeBtn.onclick = function(){
        searchBox.classList.remove('active');
        closeBtn.classList.remove('active');
        searchBtn.classList.remove('active');
        menuToggle.classList.remove('hide');
        
    }
    
    menuToggle.onclick = function(){
        header.classList.toggle('open');
        searchBox.classList.remove('active');
        closeBtn.classList.remove('active');
        searchBtn.classList.remove('active');
        
    }
</script>
