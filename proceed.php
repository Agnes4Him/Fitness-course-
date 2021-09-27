<?php 

session_start();

if($_GET['function']== "logout") {

  session_unset();
}

if(isset($_POST['pay_button'])) {

  //$sanitizer = filter_var_array($_POST, FILTER_SANITIZE_STRING);

  $first_name = $_POST['first_name'];
  
  $last_name = $_POST['last_name'];

  $phone = $_POST['phone'];

  $email = $_POST['email'];

  $product_name = $_POST['product_name'];

  $product_price = $_POST['product_price'];

  if(empty($first_name) OR empty($last_name) OR empty($phone) OR empty($email)) {

    header("Location:checkout.php?error");

  }else {

    $_SESSION['first_name'] = $first_name;

    $_SESSION['last_name'] = $last_name;

    $_SESSION['email'] = $email;

    $_SESSION['phone'] = $phone;

    $_SESSION['product_name'] = $product_name;

    $_SESSION['product_price'] = $product_price;

  }
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

    <link rel="stylesheet" href="styles/proceedstyle.css">

    <script src="https://kit.fontawesome.com/539b4db01a.js" crossorigin="anonymous"></script>

</head>

<body>

    <?php include("header.php"); ?>

    <section class="proceed">

      <h4>Hello <?php echo $first_name; ?>! Kindly click the button below to proceed with your purchase.</h4>

      <form id="paymentForm">

        <div class="form-submit">

          <script src="https://js.paystack.co/v1/inline.js"></script> 
    
          <button id="proceedButton" type="submit" onclick="payWithPaystack()">Proceed</button>
  
        </div>
     
      </form>

    </section>

    <script type="text/javascript">

    const paymentForm = document.getElementById('paymentForm');

      paymentForm.addEventListener("submit", payWithPaystack, false);

      function payWithPaystack(e) {
  
        e.preventDefault();
  
        let handler = PaystackPop.setup({
    
          key: process.env.PAYSTACK_API_KEY, // Replace with your public key

          firstname:'<?php echo $first_name; ?>',

          lastname: '<?php echo $last_name; ?>',
    
          email:'<?php echo $email; ?>',

          productname:'<?php echo $product_name; ?>',
    
          amount: <?php echo $product_price; ?> * 100,

          currency: 'NGN', 
    
          ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    
          // label: "Optional string that replaces customer email"
    
          onClose: function(){
      
            alert('Window closed.');
    
          },
    
          callback: function(response){
      
            const reference = response.reference;
      
            window.location.href='success.php?successfullypaid=' + reference;
    
          }
  
        });
  
        handler.openIframe();

      }

    </script>

    <?php include("footer.php"); ?>
