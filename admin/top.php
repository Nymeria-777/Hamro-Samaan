<?php
require('connection.inc.php');
require('functions.inc.php');
if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']!=''){

}else{
	header('location:login.php');
	die();
}





?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  
  <title>Home Samann-Admin - Dashboard</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion " id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        
        <div class="sidebar-brand-text mx-3">Admin Panel</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active text-uppercase  font-weight-bold text-primary">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading nav-link  m-0 font-weight-bold text-primary">
       Admin Control Panel
      </div>
      <li class="nav-item ">
            <a class="nav-link  m-0 font-weight-bold text-primary" href="category.php">
            <i class="mdi mdi-view-headline menu-icon m-0 font-weight-bold text-primary"></i>
              <span class="menu-title">Category</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link  m-0 font-weight-bold text-primary" href="sub_categories.php">
              <i class="mdi mdi-view-headline menu-icon m-0 font-weight-bold text-primary"></i>
              <span class="menu-title">Sub-Category</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link  m-0 font-weight-bold text-primary" href="product.php">
            <i class="fa-brands fa-product-hunt m-0 font-weight-bold text-primary"></i>    
              <span class="menu-title">Our Product</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link  m-0 font-weight-bold text-primary" href="order_master.php" >
            <i class="fa-brands fa-jedi-order m-0 font-weight-bold text-primary"></i>
              <span class="menu-title">Customers Orders</span>
            </a>
          </li>
		  <li class="nav-item">
            <a class="nav-link nav-link  m-0 font-weight-bold text-primary" href="users.php">
            <i class="fa-solid fa-user m-0 font-weight-bold text-primary"></i>   
              <span class="menu-title">Users</span>
            </a>
          </li>
          <li class="nav-item">
        <a class="nav-link collapsed nav-link nav-link  m-0 font-weight-bold text-primary" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
          aria-controls="collapsePage">
          <i class="fas fa-fw fa-columns m-0 font-weight-bold text-primary"></i>
          <span>Delivery Boy</span>
        </a>
        <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header nav-item active text-uppercase  font-weight-bold text-red ">Delivery Boy</h6>
            <a class="collapse-item nav-link nav-link  m-0 font-weight-bold text-primary" href="delivery_boy.php">Delivery Boy Master</a>
            <a class="collapse-item nav-link nav-link  m-0 font-weight-bold text-primary" href="manage_delivery_boy.php">Add Delivery Boy</a>
            <a class="collapse-item nav-link nav-link  m-0 font-weight-bold text-primary" href="order_master.php">Assign Delivery Boy</a>
            
          </div>
        </div>
      </li>
		  
		   
		  
		  <li class="nav-item">
            <a class="nav-link nav-link nav-link  m-0 font-weight-bold text-primary" href="contact_us.php">
            <i class="fa-solid fa-address-book m-0 font-weight-bold text-primary"></i>   
              <span class="menu-title">Contact Us</span>
            </a>
          </li>
		  <li class="nav-item">
            <a class="nav-link nav-link nav-link  m-0 font-weight-bold text-primary" href="reviews.php" >
            <i class="fa-sharp fa-regular fa-magnifying-glass m-0 font-weight-bold text-primary"></i>   
              <span class="menu-title">User Reviews</span>
            </a>
          </li>
		  <li class="nav-item">
            <a class="nav-link nav-link nav-link  m-0 font-weight-bold text-primary" href="logout.php" >
            <i class="fa-solid fa-right-from-bracket m-0 font-weight-bold text-primary"></i>   
              <span class="menu-title">Logout</span>
            </a>
          </li>
		  
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
           
            
            
            
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small"><?php echo $_SESSION['ADMIN_USERNAME']?></span>
              </a>
              
            </li>
          </ul>
        </nav>
        <!-- Topbar -->
