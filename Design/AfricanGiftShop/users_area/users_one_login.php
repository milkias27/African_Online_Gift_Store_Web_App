<?php
// including connect.php file so that we can have access to database.
include('../include/connect.php');
include('../functions/common_functions.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In your Google Account</title>
      <!-- bootstrap CSS link -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font awsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

 <!-- Include script, embading for fonts from google -->
 <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:100,600|Montserrat:300,500" rel="stylesheet">

<!-- Include script for font awesome icon library -->
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

<!-- icon item -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- css file -->
    <link rel="stylesheet" href="../css/carousel.css">

    <!-- <style>
body{
    overflow-x: hidden;
}
    </style> -->
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark first-nav sticky-top">
    <div class="container-fluid">
    <a class="navbar-brand" href="../index.php" style="font-family: cursive">
    <img src="../images/afro_logo_img.png" width="35" height="35" class="d-inline-block align-top" alt="" class="logo"> Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
    </div>
  </nav>
    <div container-fluid my-3>
        <h2 class='text-center py-3 mt-5'>Login to your AGS Account</h2>
        <div class="row d-flex align-items-center justify-content-center mt-3">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                     <!--  username field -->
                    <div class="form-outline mb-4">                       
                        <label for="user_username" class="form-label">User Name</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your user name" autocomplete="off" required="required" name="user_username"/>                        
                    </div>                   
                    <!--  password field -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password"/>                        
                    </div>   
                         
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Login" class="my_button py-2 px-3 border-0" name="user_login">
                        <p class="small fw-bold mt-2 pt-1 mb-1">Don't have an account?<a href="users_registration.php"class="text-danger"> Register</a> </p>
                    </div>                
                    </div>
                </form>
            </div>
        </div>
    </div>  
</body>
</html>

<?php
if(isset($_POST['user_login'])){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];

    $select_query="select * from `user_table` where username='$user_username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();


    // cart items
    $select_query_cart="select * from `cart_details` where ip_address='$user_ip'";
    $select_cart=mysqli_query($con,$select_query_cart);
    $row_count_cart=mysqli_num_rows($select_cart);    
    if($row_count>0){
        $_SESSION['username']=$user_username;
        if(password_verify($user_password,$row_data['user_password'])){
            // echo "<script>alert('Login successful')</script>";            
                if($row_count==1 and $row_count_cart==0){
                    $_SESSION['username']=$user_username;
                   echo "<script>alert('Login successful')</script>"; 
                   echo "<script>window.open('profile.php', '_self')</script>";                
            }else{
                $_SESSION['username']=$user_username;
                echo "<script>alert('Login successful')</script>"; 
                   echo "<script>window.open('payment.php', '_self')</script>";  
            }
        }else{
            echo "<script>alert('Invalid Credentials')</script>";
        }
    }else{
        echo "<script>alert('Invalid Credentials')</script>";
    }
  

}


?>