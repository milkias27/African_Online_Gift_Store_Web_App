<?php

// including connect.php file so that we can have access to database.
include('include/connect.php');
include('functions/common_functions.php');
session_start();
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
  <metta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="view more product details" content="width=device-witdth" , intial-scale=1.0">
    <title> African Gift Store. </title>

    <!-- botstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- font awsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Include script, embading for fonts from google -->
 <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:100,600|Montserrat:300,500" rel="stylesheet">

<!-- Include script for font awesome icon library -->
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

<!-- icon item -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    
   <!-- css file -->
   <link rel="stylesheet" href="./css/style.css">
    <!-- <link rel="stylesheet" href="./css/style_1.css"> -->
    <link rel="stylesheet" href="./css/link.css">
    <link rel="stylesheet" href="./css/carousel.css">
 
</head>

<body>
  <!-- navbar -- >

<div class="container-fluid p-0">

<!-- First Child -->
  <!-- <nav class="navbar navbar-expand-lg navbar-light bg-info"> -->
  <nav class="navbar navbar-expand-sm navbar-dark first-nav sticky-top">
    <div class="container-fluid">
    <a class="navbar-brand" href="index.php" style="font-family: cursive">
    <img src="./images/afro_logo_img.png" width="35" height="35" class="d-inline-block align-top" alt="" class="logo"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="display_all.php">Products</a>
          </li>
          <?php
           if(isset($_SESSION['username'])){
            echo "<li class='nav-item'>
            <a class='nav-link' href='./users_area/profile.php'>My Account</a>
          </li>";
           }else{
            echo "<li class='nav-item'>
            <a class='nav-link' href='./users_area/users_registration.php'>Register</a>
          </li>";
           }          
          ?>      
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="#">Total Price:$ <?php total_cart_price();?></a>
          </li>
        </ul>
        <form class="d-flex" action="search_product.php" method="get">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
          <!-- <button class="btn btn-outline-light" type="submit">Search</button> -->
          <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
        </form>
      </div>
    </div>
  </nav>


  <!-- seond child --->
  <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-secondary"> -->
  <nav class="navbar navbar-expand-sm sticky-top second-nav">
    <ul class="navbar-nav me-auto">      
      <?php 
      if(!isset($_SESSION['username'])){
        echo "<li class='nav-item'>
        <a class='nav-link text-strong text-light' href='#'>Welcome Guest</a>
      </li>";
      }else{
        echo "<li class='nav-item'>
        <a class='nav-link text-strong text-light' href='#'>Welcome ".$_SESSION['username']."</a>
      </li>";
      }
      if(!isset($_SESSION['username'])){
        echo "<li class='nav-item'>
        <a class='nav-link text-strong text-light' href='./users_area/users_one_login.php'>Login</a>
      </li>";
      }else{
        echo "<li class='nav-item'>
        <a class='nav-link text-strong text-light' href='./users_area/logout.php'>Logout</a>
      </li>";
      }
     
      ?>
    </ul>
  </nav>


  <!-- third child-->
  <div class="bg-light">

    <!-- <h3 class="text-center">Hidden Store</h3> -->
    <!-- <p class="text-center">Communications is at the heart of e-commerce adn community </p> -->
  </div>



  <!---fourth child-->
  <div class="row">
    <div class="col-md-10">
      <!--fetching Pruducts-->
      <div class="row p-5">
        <?php
        //calling Functions 

        get_all_products();
        get_unique_categories();
        get_unique_brands();
        
        ?>
        <!-- row end --->

      </div>

      <!--column end-->

    </div>

    <div class="col-md-2 second-nav p-0 mt-5">
      <!--sidenav-->
      <!-- Brands to be displayed-->
      <ul class="navbar-nav me-auto text-center">
        <li class="nav-item">
          <a href="#" class="nav-link text-light">
            <h4>Delivery Brands</h4>
          </a>
        </li>

        <?php
        // calling function 
        getbrands();





        //       $select_brands = "Select * from brands";
        //       $result_brands = mysqli_query($con, $select_brands);
        //       while ($row_data = mysqli_fetch_assoc($result_brands)) {
        //         $brand_title = $row_data['brand_title'];
        //         $brand_id = $row_data['brand_id'];
        //         echo " <li class='nav-item'>
        // <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
        // </li>";

        //       }

        ?>

      </ul>

      <!-- Catagories to be displayed-->
      <ul class="navbar-nav me-auto text-center">
        <li class="nav-item">
          <a href="#" class="nav-link text-light">
            <h4>Categories</h4>
          </a>
        </li>

        <?php

        getcategories();
        //   $select_categories = "Select * from categories";
        //   $result_categories = mysqli_query($con, $select_categories);

        //   while ($row_data = mysqli_fetch_assoc($result_categories)) {
        //     $category_title = $row_data['category_title'];
        //     $category_id = $row_data['category_id'];
        //     echo " <li class='nav-item'>
        // <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
        // </li>";

        //   }

        ?>
      </ul>

     
    </div>
    <!--Last child-->
    <!-- include footer -->
    <?php include("./include/footer.php")?>
  </div>



    <!-- bootstarp JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>   


</body>


</html>