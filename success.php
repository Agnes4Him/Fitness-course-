<?php 

session_start();

if($_GET['function']== "logout") {

  session_unset();
}

if(!$_GET['successfullypaid']) {

  header('Location:/checkout.php');

  exit;

}else {

  $reference = $_GET['successfullypaid'];

}

$first_name = $_SESSION['first_name'];

$last_name = $_SESSION['last_name'];

$email = $_SESSION['email'];

$phone = $_SESSION['phone'];

$product_name = $_SESSION['product_name'];

$product_price = $_SESSION['product_price'];

include("connection.php");

$query = "INSERT INTO orders (user_id, first_name, last_name, email, phone, product_name, product_price, reference) VALUES('".$_SESSION['id']."','".mysqli_real_escape_string($link, $first_name).

"','".mysqli_real_escape_string($link, $last_name)."','".mysqli_real_escape_string($link, $email)."','".mysqli_real_escape_string($link, $phone)."','".$product_name."','".$product_price."','".$reference."')";

if(mysqli_query($link, $query)) {

  echo "<script>alert('Your payment was successful');</script>";

  $orderquery = "SELECT * FROM orders WHERE user_id='".$_SESSION['id']."'";

  $result = mysqli_query($link, $orderquery);

  while($row = mysqli_fetch_assoc($result)) {

    $deletefromcart = "DELETE FROM cart WHERE userid='".$_SESSION['id']."' AND pname='".$row['product_name']."' LIMIT 1";

    mysqli_query($link, $deletefromcart);

  }


}else {

  die("Sorry, something went wrong...");

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

    <link rel="stylesheet" href="styles/success.css">

    <script src="https://kit.fontawesome.com/539b4db01a.js" crossorigin="anonymous"></script>

</head>

<body>

    <?php include("header.php"); ?>

    <section class="paymentDetails">

      <h3>Thanks <?php echo $first_name; ?> for your purchase. See below for payment details:</h3>

      <table>

        <tr>

          <th>First Name</th>

          <td><?php echo $first_name; ?></td>

        </tr>

        <tr>

          <th>Last Name</th>

          <td><?php echo $last_name; ?></td>

        </tr>

        <tr>

          <th>Email</th>

          <td><?php echo $email; ?></td>

        </tr>

        <tr>

          <th>Phone</th>

          <td><?php echo $phone; ?></td>

        </tr>

        <tr>

          <th>Product Name</th>

          <td><?php echo $product_name; ?></td>

        </tr>

        <tr>

          <th>Product Price</th>

          <td><?php echo $product_price; ?></td>

        </tr>

        <tr>

          <th>Reference code</th>

          <td><?php echo $reference; ?></td>

        </tr>

        <tr>

          <th>Access Course</th>

          <td>Click <a href="/playcourse.php?course=<?php echo $product_name; ?>">here</a></td>

        </tr>

      </table>

    </section>

    <?php include("footer.php"); ?>
