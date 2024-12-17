<?php
session_start();
include("functions/functions.php");
include("includes/db.php");
include('js/drop_down_menu.php');
if(isset($_SESSION['email'])){
  $get_user = "SELECT * FROM `users` where `email`='".$_SESSION['email']."'";
  $row_user = $con->query($get_user);
  if ($row_user->num_rows > 0) {
    $user_id = $row_user->fetch_assoc();
    
    $get_cart = "SELECT * FROM `cart` where `user_id` = '".$user_id['id']."'";
    $row_cart = $con->query($get_cart);
    $total_item = 0;
    if($row_cart->num_rows > 0){
        while($row = $row_cart->fetch_assoc()){
          $total_item+=$row['quality'];
        }
    }
    $_SESSION['total_item'] = $total_item;
  }
  
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="styles/style.css" media="all">
  <title>Trang Le Store</title>
  <link rel="stylesheet" href="styles/style.css" media="all">
  <!-- <script src="/js/jquery-3.6.0.min.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
  // alert("as");
 
</script>
  </head>
  <body>
    <!-- Main container bắt đầu từ đây -->
    <div class="main_wrapper">
        <div class="header_wrapper">
          <div class="header_logo">
            <a href="index.php">
            <img id="logo" src="images/TL-logo.png">
            </a>
          </div><!--/.header_logo-->
          <div id="form">
            <form method="get" action="results.php" enctype="multipart/form-data">
              <input type="text" name="user_query" autocomplete="off" placeholder="Tìm kiếm...">
              <input type="submit" name="search" value="Search">
            </form>
          </div>
          <div class="cart">
            <ul>
              <li class="dropdown_header_cart">
                <div id="notification_total_art" class="shopping_cart">
                  <a href="cart.php"><img src="images/cart_icon.png" id="cart_image"></a>
                  <div class="noti_cart_number">
                    <p class="total_item">0</p>
                  </div>
                </div>
              </li>
            </ul>
          </div>
          <div class="register_login">
            <div class="login"><button type="submit"class="custom-btn btn-15"><a href="login.php">ĐĂNG NHẬP</a></button></div>
            <div class="register"><button type="submit" class="custom-btn btn-16"><a href="register.php">ĐĂNG KÝ</a></button></div>
          </div>
            <div id="profile">
              <ul>
                <li class="dropdown_header"> 
                    <div class="dropdown">
                      
                        <a><img src="upload-files/<?php echo  $user_id['image']; ?>" alt=""></a>
                          
                        <div class="dropdown-content">
                          <a href="my_account.php?action=edit_account">Cài đặt Tài khoản</a>
                          <a href="logout.php">Đăng xuất</a>
                          <a href="admin_area/index.php?action=view_pro" id="admin_area">Quản trị website</a>
                        </div>
                        
                    </div>        
                    
                </li>
              </ul>
            </div>
    </div> 
    <nav class="skew-menu">
      <ul>
        <li><a href="index.php">Trang Chủ</a></li>
        <li><a href="all_products.php">Tất Cả Sản Phẩm</a></li>
        <li><a href="my_account.php">Tài Khoản</a></li>
        <li><a href="cart.php">Giỏ Hàng</a></li>
        <!-- <li><a href="notifications.php">Thông Báo</a></li> -->
        <li><a href="contact.php">Hỗ Trợ</a></li>
     </ul>
    </nav>
    <script type="text/javascript">
    $(document).ready(function(){
        // $("div#profile").hide();
    })
</script>
<?php
    // echo("<script><script>");
    if(isset($_SESSION['email'])){
      // echo($_SESSION['email']);
      echo "<script>$('div.register_login').hide()</script>" ;
      //check admin or customer
      $account_info = "SELECT * FROM `users` where `email`='".$_SESSION['email']."'";
      $result = $con->query($account_info);
      $row = $result->fetch_assoc();
      if(!empty($row) && $row['role'] != "admin"){
          echo("<script>$('div#profile').show();</script>");
          echo "<script>$('a#admin_area').hide();</script>";
      }
    }else{
      echo("<script>$('div#profile').hide();</script>");
    }
    
?>


