<script>
  $(document).ready(function() {

    // $("#password_confirm2").on('keyup', function(){
    //     // alert('testing jquery');

    //     var password_confirm1 = $("#password_confirm1").val();

    //     var password_confirm2 = $("#password_confirm2").val();

    //     // alert(password_confirm2);

    //     if(password_confirm1 == password_confirm2){
    //         $("#status_for_confirm_password").html('<strong style="color: green; font-size:12px">Mật khẩu khớp</strong>');
    //     }else{
    //         $("#status_for_confirm_password").html('<strong style="color: red; font-size:12px">Mật khẩu không khớp</strong>');
    //     }

    // });

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
    margin-top: 1.7em;
    margin-bottom: 3em;
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

  input[type="file"] {
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
    <!-- <h2 class="title"> Đăng kí</h2> -->
    <!-- <p class="subtitle">Bạn đã có tài khoản? <a href="./login.php"> Đăng nhập</a></p> -->

    <p class="or"><span>Thay đổi thông tin tài khoản</span></p>

    <div class="email-login">
      <label for="name"> <b>Họ tên</b></label>
      <input type="text" placeholder="Họ và tên" name="name" required>



      <label for="password"><b>Ảnh đại diện</b></label>
      <input type="file" name="image" value="<?php if (isset($_FILES['image'])) {
                                                echo $_FILES['image'];
                                              } ?>">
      <p class="error_image"></p><br>
      <label for="address"> <b>Địa chỉ</b></label>
      <input type="text" placeholder="Địa chỉ" name="address" required>
      <!-- <label for="password"><b>Mật khẩu</b></label> -->
      <!-- <input type="password" placeholder="Nhập mật khẩu" id="password_confirm1" name="password" required>
      <p id="status_for_confirm_password"></p> -->
      <label for="address"> <b>Số điện thoại</b></label>
      <input type="text" placeholder="Số điện thoại" name="sdt" required>                                       
    </div>
    <!-- <p class="error"></p> -->
    <p class="error_password"></p>
    <p class="error_info_total"></p>
    <button class="cta-btn" name="update" type="submit">Update</button>
  </form>


  <?php
  if (isset($_POST['update'])) {

    if (!empty($_POST['password']) && !empty($_POST['address']) && !empty($_POST['name'])) {
      //check mail da ton tai. hay chua
      $sql = "SELECT * FROM `user` where `email`='" . $_SESSION['email'] . "'";
      $result = $con->query($sql);
      $user = $result->fetch_assoc();
      $password = trim($_POST['password']);
      $hash_password = md5($password);
      
      if ($user['password'] == $hash_password) {
        $image = $_FILES['image'];

        $img_name = $_FILES['image']['name'];
        $img_arr = explode('.', $img_name); //lay duoi file anh
        $img_tail = array_pop($img_arr); //lay duoi file anh
        $img = ['png', 'jpg', 'jpeg', 'svg', 'PNG', 'JPG', 'JPEG', 'SVG'];
        $check_img = in_array($img_tail, $img);

        if ($check_img == 1) {
          move_uploaded_file($_FILES['image']['tmp_name'], 'upload-files/' . $_FILES['image']['name']);
          $ip = get_ip();
          $name = $_POST['name'];
          $address = $_POST['address'];

          $img_name = $_FILES['image']['name'];
          $update_user = "UPDATE `user` set  `user_address`='" . $address . "',`name`='" . $name . "',`password`='" . $hash_password . "',`image`='" . $img_name . "' WHERE `email`='" . $_SESSION['email'] . "'";
          if ($con->query($update_user)) {
            echo "<script>window.open('my_account.php','_self')</script>";
          } else {
            echo ("error");
          }
        } else {
          echo ('<script>$("p.error_image").text("day khong phai la file hinh anh!!").css("color","red");</script>');
        }
      } else {
        echo ('<script>$("p.error_info_total").text("password ko chinh xac !").css("color","red");</script>');
      }
      echo ('<script>$("p.error").text("");</script>');
    }
  } else {
    echo ('<script>$("p.error_info_total").text("Ban kiem tra da nhap day du thong tin chua !").css("color","red");</script>');
  }

  // }
  ?>