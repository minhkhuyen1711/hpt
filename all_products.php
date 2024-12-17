<?php
include('includes/header.php');

if (isset($_SESSION['email'])) {
  $get_users = "SELECT * FROM `users` where `email`='" . $_SESSION['email'] . "'";
  $row_users = $con->query($get_users);
  $users_id = $row_user->fetch_assoc();

  $get_cart = "SELECT * FROM `cart` where `user_id` = '" . $user_id['id'] . "'";
  $row_cart = $con->query($get_cart);
  $total_item = 0;
  if ($row_cart->num_rows > 0) {
    while ($row = $row_cart->fetch_assoc()) {
      $total_item += $row['quality'];
    }
  }
  $_SESSION['total_item'] = $total_item;
}

?>
<script type="text/javascript">
  $(document).ready(function() {
    $("p.total_item").text("<?php if (isset($total_item)) {
                              echo $total_item;
                            } else {
                              echo "0";
                            } ?>");
    // buy_btn
    var total_item = "<?php echo $total_item; ?>";
    $("button#button").click(function() {

      var id = $(this).closest("a.buy_btn").attr("id");
      total_item++;
      $("p.total_item").text(total_item);
      $.ajax({
        method: "POST",
        url: "ajax/add_to_cart_ajax.php",
        mimeType: "multipart/form-data",
        data: {
          id: id
        },
        success: function(response) {
          // alert(response);
          console.log(response);
        },
        error: function(response) {
          console.log("error");
        },
      })
    })
  })
</script>
<!-- <img src="ajax/add_to_cart_ajax.php" alt=""> -->
<div class="content_wrapper">

  <div id="sidebar">
    <hr>
    <div id="sidebar_title">Sản phẩm</div>
    <hr>
    <ul id="cats">
      <?php
      getCats();
      ?>
    </ul>
    <hr>
    <div id="sidebar_title">Thương hiệu</div>
    <hr>
    <ul id="cats">
      <?php
      getBrands();
      ?>
      <hr>
    </ul>
  </div>
  <div id="content_area">
    <div id="product_box">
      <?php

      $sql = "SELECT * FROM `products`";
      $run_pro = $con->query($sql);
      $product_total = 0;
      if ($run_pro->num_rows > 0) {
        while ($row = $run_pro->fetch_assoc()) {
          $product_total++;
        }
      }
      // $product_total = ceil($product_total/8);
      // echo $product_total;


      getPro($product_total);
      get_pro_by_cat_id();
      get_pro_by_brand_id();
      ?>
    </div>
    <!--end product_box-->
  </div>
  <!--end content_area-->


</div>
<?php
include('includes/footer.php');
?>