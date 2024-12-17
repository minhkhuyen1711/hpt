
 
          <script>
              $(document).ready(function(){
                
                $("#password_confirm2").on('keyup', function(){
                    // alert('testing jquery');

                    var password_confirm1 = $("#password_confirm1").val();
                    
                    var password_confirm2 = $("#password_confirm2").val();

                    // alert(password_confirm2);

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
    margin-top: 5.7em;
    margin-bottom: 6em;
    border-radius: 10px;
    background-color: #ffff;
    padding: 1.8rem;
    box-shadow: 2px 5px 20px rgb(0 0 0 / 10%);
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

      <p class="or"><span>Thay đổi password</span></p>

      <div class="email-login">
         <!-- <label for="name"> <b>Họ tên</b></label> -->
         <!-- <input type="text" placeholder="Họ và tên" name="name" required> -->
         <!-- <p class="error_email"></p><br> -->
         <label for="password_old"><b>Mật khẩu hiện tại</b></label>
         <input type="password" placeholder="Nhập mật khẩu cũ"  name="password_old" required >
         <label for="password"><b>Mật khẩu mới</b></label>
         <input type="password" placeholder="Nhập mật khẩu" id="password_confirm1" name="password" required >
         
         <label for="confirm_password"><b>Nhập lại mật khẩu mới</b></label>
         <input type="password" placeholder="Xác nhận mật khẩu" id="password_confirm2" name="confirm_password" required>
         <p id="status_for_confirm_password"></p>
        
       
      </div>
      <!-- <p class="error"></p> -->
      <p class="error_password"></p>
      <p class="error_info_total"></p>
      <button class="cta-btn" name="update" type="submit">Update</button>
   </form>


   <?php
    if(isset($_POST['update'])){
          if(!empty($_POST['password']) && !empty($_POST['password_old']) && !empty($_POST['confirm_password'])){
            if($_POST['password']!=$_POST['confirm_password']){
              echo('<script>$("p.error_info_total").text("xác nhận pass sai !").css("color","red");</script>');
            }else{
                $sql = "SELECT * FROM `user` where `email`='".$_SESSION['email']."'";
                $result = $con->query($sql);
                $user = $result->fetch_assoc();
                $password = trim($_POST['password']);
                $hash_password = md5($password); // ham bam
                // echo $_POST['password_old']."<br>".$user['password'];

                $pass_old =  trim($_POST['password_old']);
                $hash_password_old = md5($pass_old); 
                echo $hash_password_old."<br>".$user['password'];
                echo "<br><pre>";
                var_dump($user);
                echo "</pre>";
              if($hash_password_old == $user['password'] ){  //kiem tra xem pass hien tai co giong voi pass cu ko thi chuyen ham bam y the
                    echo "Asd";
                        $update_user = "UPDATE `user` set  `password`='".$hash_password."' WHERE `email`='".$_SESSION['email']."'";
                        if($con->query($update_user)){
                          echo "<script>window.open('my_account.php','_self')</script>";
                          }else{
                          echo("error");
                        }
                        
              }else{
                echo('<script>$("p.error_info_total").text(" pass cũ chưa đúng !").css("color","red");</script>');
              }
      
              echo('<script>$("p.error").text("");</script>');
            }
          }
          else{
            echo('<script>$("p.error_info_total").text("Ban kiem tra da nhap day du thong tin chua !").css("color","red");</script>');    
          } 
    }
  
// }
?>