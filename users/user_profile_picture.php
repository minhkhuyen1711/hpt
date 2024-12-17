
 
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
      <h2 class="title"> Thay đổi mật khẩu</h2>
      <br>

      <div class="email-login">
         <label for="password"><b>Mật khẩu hiện tại</b></label>
         <input type="password" placeholder="Nhập mật khẩu hiện tại" name="current_password" required>
         <label for="password"><b>Mật khẩu mới</b></label>
         <input type="password" placeholder="Nhập mật khẩu mới" id="password_confirm1" name="new_password" required>
         <label for="confirm_password"><b>Nhập lại mật khẩu mới</b></label>
         <input type="password" placeholder="Nhập lại mật khẩu mới" id="password_confirm1" name="confirm_new_password" required>
      </div>
      <button class="cta-btn" name="change_password" type="submit">Lưu thông tin</button>
   </form>
</div>


