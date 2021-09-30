<?php 

session_start();

if($_GET['function']== "logout") {

  session_unset();
}

?>

<!DOCTYPE html>

<html>

<head>

    <title>Fitness Home</title>

    <meta charset = "utf-8">
      
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <meta name="apple-mobile-web-app-capable" content="yes">

    <script type="text/javascript" src="jquery.min.js"></script>
      
    <script src="jquery-ui/jquery-ui.js"></script>
      
    <link href="jquery-ui/jquery-ui.css" rel="stylesheet">

    <link rel="stylesheet" href="styles/style.css">

    <link rel="stylesheet" href="styles/checkoutstyle.css">

    <script src="https://kit.fontawesome.com/539b4db01a.js" crossorigin="anonymous"></script>

</head>

<body>

<?php include("header.php"); ?>

<section>

  <div class="checkoutContainer">

    <div class="checkoutInfo">

      <div class="checkoutText">
 
        <p>Product Name: <span id="checkoutName"><?php echo $_POST['p_name']; ?></span></p>

        <p>Product Price: <span id="checkoutPrice">#<?php echo $_POST['p_price']; ?></span></p>

      </div>

      <form method="POST" action="proceed.php">
      
        <div><input type="text" name="first_name" placeholder="Enter First Name"></div>

        <div><input type="text" name="last_name" placeholder="Enter Last Name"></div>

        <div><input type="email" name="email" placeholder="Enter Email Address"></div>

        <div><input type="tel" name="phone" placeholder="Enter phone number"></div>

        <input type="hidden" name="product_name" value="<?php echo $_POST['p_name']; ?>">

        <input type="hidden" name="product_price" value="<?php echo $_POST['p_price']; ?>">

        <button id="payButton" name="pay_button">Pay</button>
      
      </form>

    </div>

    <div class="productInfo">

      <video width="300" height="150" src="<?php echo $_POST['p_image'] ?>" controls></video>

      <p><?php echo $_POST['p_name']; ?></p>

      <p>#<?php echo $_POST['p_price']; ?></p>

    </div>

  </div>

</section>

<?php include("footer.php"); ?>