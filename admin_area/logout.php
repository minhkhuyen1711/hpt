
<?php 

session_start();
if(isset($_SESSION['email'])){
    session_destroy();

    // echo "<script>window.open('os.com/admin_area/login.php','_self')</script>";
    echo("Asd");
}

?>