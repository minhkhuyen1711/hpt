
<?php
session_start();
if(isset($_SESSION['email'])){
    // echo($_SESSION['email']);
    session_destroy();
}else{
    // session_start();
    // echo($_SESSION['email']);
}
   
    // echo($_SESSION['email']);
?>

<head>
    
<meta charset="UTF-8">
<title>Log In</title>

<link rel="stylesheet" href="styles/admin_form_login.css" />

</head>

<body>
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
<nav><a href="#" class="focus">Log In</a></nav>

<form action="" method="POST" enctype="multipart/form-data">

	<h2>Admin Login</h2>

	<input type="text" name="email" class="text-field" placeholder="Email" />
    <input type="password" name="password" class="text-field" placeholder="Password" />
    
   <input type="submit" name="login"  class="button" value="Log In" />

</form>

</body>

<?php
    include('../includes/db.php');
    if(isset($_POST['login'])){
        $email = trim(mysqli_real_escape_string($con,$_POST['email']));

        $password = trim(mysqli_real_escape_string($con,$_POST['password']));

        $hash_password = md5($password);

        $sel_user = "SELECT * FROM user where email = '$email' AND password = '$hash_password'";

        $run_user = mysqli_query($con,$sel_user) or die ("error:" . mysqli_errno($con));
        $check_user = mysqli_num_rows($run_user);
        
        if($check_user >0){
            $db_row = mysqli_fetch_array($run_user);

            $_SESSION['email'] = $db_row['email'];
            $_SESSION['name'] = $db_row['name'];
            $_SESSION['password']=$db_row['password'];
            $_SESSION['user_id'] = $db_row['id'];
            $_SESSION['role'] = $db_row['role'];

            if($db_row['role'] == 'admin'){
                echo("<script>window.open('index.php?logged_in=Bạn đã đăng nhập thành công','_self')</script>");
            }
            elseif($db_row['role'] == 'guest'){
                  echo("<script>alert('Mật khẩu or Tài khoảng ko chinh xac');</script>");  
            }
            
        }else{
            echo "<script>alert('Password or Email is wrong, try again!')</script>";
            
            }
    }
?>