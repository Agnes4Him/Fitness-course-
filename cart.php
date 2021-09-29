<?php

session_start();

if($_GET['function']== "logout") {

session_unset();
}

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <meta name="apple-mobile-web-app-capable" content="yes">

    <script type="text/javascript" src="jquery.min.js"></script>
      
    <script src="jquery-ui/jquery-ui.js"></script>
      
    <link href="jquery-ui/jquery-ui.css" rel="stylesheet">

    <link rel="stylesheet" href="styles/style.css">

    <link rel="stylesheet" href="styles/cartstyle.css">

    <script src="https://kit.fontawesome.com/539b4db01a.js" crossorigin="anonymous"></script>

    <title>Cart</title>

</head>

<body>

  <?php include("header.php"); ?>

  <section>

  <div class="cart-container">

  <h2>CART</h2>

  <div id="cartDeleteMessage" style="display:<?php if(isset($_SESSION['showAlert'])){ echo $_SESSION['showAlert']; }else{ echo'none';}unset($_SESSION['showAlert']); ?>">

   <?php if(isset($_SESSION['message'])){ echo $_SESSION['message'];} unset($_SESSION['message']); ?>
  
  </div>

  <div class="cart-heading">

    <div class="cart-column-heading cart-column-heading-1">ITEM</div>

    <div class="cart-column-heading cart-column-heading-2">PRICE</div>

    <a class="cart-column-heading cart-column-heading-3" href="/actions.php?clear=all" onclick="return confirm('Are you sure you want to clear your cart?')">CLEAR ALL</a>
     
  </div>

  <?php if($_SESSION['id']) {

 include("connection.php");

$query = "SELECT * FROM cart WHERE userid='".$_SESSION['id']."'";

$result = mysqli_query($link, $query);

while($row=mysqli_fetch_assoc($result)) { ?>

  <div class="cart-row cart-row-1">

    <div class="video-and-title">

      <video width="300" height="150" src="<?php echo $row['pimage'] ?>"></video>

      <span class="title"><?php echo $row['pname'] ?></span>

    </div>

    <div class="amount">#<?php echo $row['pprice'] ?></div>

    <div class="removeCheckout">
      
      <a class="checkbox-and-remove" href="/actions.php?remove=<?php echo $row['pid']; ?>" onclick="return confirm('Are you sure you want to remove this item from the cart?')">

         <i class="fas fa-trash-alt"></i>

      </a>

      <form method="POST" action="/checkout.php">

        <input type="hidden" name="p_name" value="<?php echo $row['pname'] ?>">

        <input type="hidden" name="p_image" value="<?php echo $row['pimage'] ?>">

        <input type="hidden" name="p_price" value="<?php echo $row['pprice'] ?>">

        <button class="productCheckout">Checkout</button>

      </form>

    </div>

  </div>

  <?php } 

  $price_total= 0;

  $query = "SELECT * FROM cart WHERE userid='".$_SESSION['id']."'";

  $result = mysqli_query($link, $query);

  while($row = mysqli_fetch_assoc($result)) { 

  $price_total += $row['pprice']; 
  
  } ?>

  <div class="total">

    <div>Total</div>

    <div class="total-amount">$<?php echo $price_total; ?></div>

  </div>

  
    <?php }  ?>

  </div>

</div>

</section>

<?php include("footer.php"); ?>
