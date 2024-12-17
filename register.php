
<?php
include('includes/header.php');
?>
<!-- bug:2.. header location -->
<!-- bug:2.. header  -->
<!-- bug:2.. header  -->

      <div class="content_wrapper">
          <script type="text/javascript">
              $(document).ready(function(){
                  // alert("ss");
                $("#password_confirm2").on('keyup', function(){
                    
                    
                    var password_confirm1 = $("#password_confirm1").val();
                    var password_confirm2 = $("#password_confirm2").val();
                    if(password_confirm1 == password_confirm2){
                        $("#status_for_confirm_password").html('<strong style="color: green; font-size:12px">Mật khẩu khớp</strong>');
                    }else{
                        $("#status_for_confirm_password").html('<strong style="color: red; font-size:12px">Mật khẩu không khớp</strong>');
                    }
                });
              });
          </script>
<style>
body {
  background-color: rgb(228, 229, 247);
}
.social-login img {
  width: 24px;
}
a {
  text-decoration: none;
}

.card {
  font-family: sans-serif;
  width: 300px;
  margin-left: auto;
  margin-right: auto;
  margin-top: 0.7em;
  margin-bottom:3em;
  border-radius: 10px;
  background-color: #ffff;
  padding: 1.8rem;
  box-shadow: 2px 5px 20px rgba(0, 0, 0, 0.1);
}

.title {
  text-align: center;
  font-weight: bold;
  margin: 0;
}
.subtitle {
  text-align: center;
  font-weight: bold;
}
.btn-text {
  margin: 0;
}

.social-login {
  display: flex;
  justify-content: center;
  gap: 5px;
}

.google-btn {
  background: #fff;
  border: solid 2px rgb(245 239 239);
  border-radius: 8px;
  font-weight: bold;
  display: flex;
  padding: 10px 10px;
  flex: auto;
  align-items: center;
  gap: 5px;
  justify-content: center;
}
.fb-btn {
  background: #fff;
  border: solid 2px #5086BD;
  border-radius: 8px;
  padding: 10px;
  display: flex;
  align-items: center;
}

.or {
  text-align: center;
  font-weight: bold;
  border-bottom: 2px solid rgb(245 239 239);
  line-height: 0.1em;
  margin: 25px 0;
}
.or span {
  background: #fff;
  padding: 0 10px;
}

.email-login {
  display: flex;
  flex-direction: column;
}
.email-login label {
  color: rgb(170 166 166);
}

input[type="text"],
input[type="password"] {
  padding: 10px 15px;
  margin-top: 8px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 8px;
  box-sizing: border-box;
}

input[type="file"]{
  margin-top: 8px;
  margin-bottom: 15px;
}



.cta-btn {
  background-color: #5086BD;
  color: white;
  padding: 18px 20px;
  margin-top: 10px;
  margin-bottom: 20px;
  width: 100%;
  border-radius: 10px;
  border: none;
}

.forget-pass {
  text-align: center;
  display: block;
}

</style>
<div class="card">
   <form method="post" action="" enctype="multipart/form-data">
      <h2 class="title"> Đăng kí</h2>
      <p class="subtitle">Bạn đã có tài khoản? <a href="./login.php"> Đăng nhập</a></p>

      <p class="or"><span>Nhập thông tin</span></p>

      <div class="email-login">
         <label for="name"> <b>Họ tên</b></label>
         <input type="text" placeholder="Họ và tên" name="name" required value="<?php if(isset($_POST['name'])){echo $_POST['name'];} ?>">
         <label for="email"> <b>Email</b></label>
         <input type="text" placeholder="Email hoặc số điện thoại" name="email" required value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>">
         <p class="error_email"></p><br>
         <label for="password"><b>Mật khẩu</b></label>
         <input type="password" placeholder="Nhập mật khẩu" id="password_confirm1" name="password" required >
         <label for="confirm_password"><b>Nhập lại mật khẩu</b></label>
         <input type="password" placeholder="Xác nhận mật khẩu" id="password_confirm2" name="confirm_password" required>
         <p id="status_for_confirm_password"></p>
        
         <label for="password"><b>Hình ảnh</b></label>
         <input type="file" name="image" value="<?php if(isset($_FILES['image'])){echo $_FILES['image'];} ?>">
         <p class="error_image"></p><br>
         <label for="" style="margin-bottom: 8px;"><b>Quốc gia</b></label>
         <?php include('includes/country_list.php');?>
         <label for="city" style="margin-top: 15px;"> <b>Thành phố</b></label>
         <input type="text" placeholder="Nhập thành phố" name="city" value="<?php if(isset($_POST['city'])){echo $_POST['city'];} ?>">
         <label for="contact"> <b>Liên lạc</b></label>
         <input type="text" placeholder="Phương thức liên lạc" name="contact" required value="<?php if(isset($_POST['contact'])){echo $_POST['contact'];} ?>">
         <label for="address"> <b>Địa chỉ</b></label>
         <input type="text" placeholder="Địa chỉ liên hệ" name="address" required value="<?php if(isset($_POST['address'])){echo $_POST['address'];} ?>">
    </div>
      <!-- <p class="error"></p> -->
      <p class="error_password"></p>
      <p class="error_info_total"></p>
      <button class="cta-btn" name="register" type="submit">Đăng kí</button>
   </form>
</div>

<?php
    if(isset($_POST['register'])){
          


        if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password']) && !empty($_POST['name']) && !empty($_POST['city']) && !empty($_POST['contact']) && !empty($_POST['address'])){
          //check mail da ton tai. hay chua
          $sql = "SELECT * FROM `users`";
          $result = $con->query($sql);
          $check_mail = true;


          if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                if($row['email']==$_POST['email']){
                  $check_mail=false;
                }
            }
          }
          if($check_mail==false){
            // echo("<script>alert('Email đã tồn tại,vui lòng đăng kí với email khác!!!')</script>");
            echo('<script>$("p.error_email").text("email da ton tai !").css("color","red");</script>');
          }else{
            if($_POST['confirm_password']!=$_POST['password']){
              echo('<script>$("p.error_password").text("Xac nhan mat khau khong khop!").css("color","red");</script>');
            }else{
              $image = $_FILES['image'];
              // echo("<pre>");
              // var_dump($image);
              // echo("</pre>");
              $img_name = $_FILES['image']['name'];
              $img_arr = explode('.',$img_name);
              $img_tail = array_pop($img_arr);
              $img = ['png','jpg','jpeg','svg','PNG','JPG','JPEG','SVG'];
              $check_img = in_array($img_tail,$img);
              
                if($check_img==1){
                  move_uploaded_file($_FILES['image']['tmp_name'],'upload-files/'.$_FILES['image']['name']);
                  $email = trim($_POST['email']);
                  $ip = get_ip();
                  $name = $_POST['name'];
                  $password = trim($_POST['password']);
                  $hash_password = md5($password);
                  $confirm_password = trim($_POST['confirm_password']);
                  
                  $country = $_POST['country'];
                  $city = $_POST['city'];
                  $contact = $_POST['contact'];
                  $address = $_POST['address'];
                  $img_name = $_FILES['image']['name'];
                  $add_user = "INSERT INTO `users` (`ip_address`,`name`,`email`,`password`,`country`,`city`,`contact`,`user_address`,`image`) values('".$ip."','".$name."','".$email."','".$hash_password."','".$country."','".$city."','".$contact."','".$address."','". $img_name."')";

                  if($con->query($add_user)){
                      // header('Location: http://localhost/website-ecommerce-php-master/os.com/login.php');
                      echo "<script>window.open('login.php','_self')</script>";
                    }else{
                    echo("error");
                  }
                  

                }else{
                  echo('<script>$("p.error_image").text("day khong phai la file hinh anh!!").css("color","red");</script>');
            
                }
            }
            echo('<script>$("p.error").text("");</script>');
            
           
          }
         

            // $check_exist = mysqli_query($con, "select * from users where email='$email'");

            // $email_count = mysqli_num_rows($check_exist);

            // $row_register = mysqli_fetch_array($check_exist);

            // if($email_count > 0){
            //     echo "<script>alert('Xin lỗi, $email đã tồn tại !!!')</script>";               
            // }else if($row_register['email'] == $email && $password != $confirm_password){
            //     echo "<script>alert('Mật khẩu không khớp, vui lòng xác nhận lại mật khẩu !!!')</script>";


                // move_uploaded_file($image_tmp,"upload-files/$image");

            //     $run_insert = mysqli_query($con,"insert into users (ip_address,name,email,password,country,city,contact,user_address,image) values('$ip','$name','$email','$hash_password','$country','$city','$contact','$address','$image')");

            //     if($run_insert){
            //         $sel_user = mysqli_query($con, "select * from users where email='$email'");
            //         $row_user = mysqli_fetch_array($sel_user);

            //         $_SESSION['user_id'] = $row_user['id'];
            //         $_SESSION['role'] = $row_user['role'];

            //     }

            //     $run_cart = mysqli_query($con, "select * from cart where ip_address='$ip'");

            //     $check_cart = mysqli_num_rows($run_cart);

            //     if($check_cart == 0){
            //         $_SESSION['email'] = $email;
            //         echo "<script>alert('Đăng kí thành công !!!')</script>";
            //         echo "<script>window.open('index.php','_self')</script>";

            //     }else{

            //         $_SESSION['email'] = $email;
            //         echo "<script>alert('Đăng kí thành công !!!')</script>";
            //         echo "<script>window.open('checkout.php','_self')</script>";
            //     }
            // }
        }else{
          echo('<script>$("p.error_info_total").text("Ban kiem tra da nhap day du thong tin chua !").css("color","red");</script>');
          
        }
  
}
?>
        
      </div><!--/.content_wrapper -->
     <?php
     include('includes/footer.php');
     ?>
