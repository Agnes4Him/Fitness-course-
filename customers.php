<?php 

session_start();

if($_GET['function']== "logout") {

  session_unset();
}

include("/connection.php");

?>

<!DOCTYPE html>

<html>

<head>

    <title>Customers Table</title>

    <meta charset = "utf-8">
      
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <meta name="apple-mobile-web-app-capable" content="yes">

    <script type="text/javascript" src="jquery.min.js"></script>
      
    <script src="jquery-ui/jquery-ui.js"></script>
      
    <link href="jquery-ui/jquery-ui.css" rel="stylesheet">

    <link rel="stylesheet" href="styles/style.css">

    <link rel="stylesheet" href="styles/customers.css">

    <script src="https://kit.fontawesome.com/539b4db01a.js" crossorigin="anonymous"></script>

</head>

<body>

<section class="customersTable">

  <table>

    <tr>
 
      <th>ID</th>

      <th>User Id</th>

      <th>First Name</th>

      <th>Last Name</th>

      <th>Email</th>

      <th>Phone</th>

      <th>Product Name</th>

      <th>Product Price</th>

      <th>Reference</th>

      <th>Date of Purchase</th>

    </tr>

    <?php 

    $query = "SELECT * FROM orders";

    $result = mysqli_query($link, $query);

    foreach($result as $customer) { ?>

    <tr>

      <td><?php echo $customer['id']; ?></td>

      <td><?php echo $customer['user_id']; ?></td>

      <td><?php echo $customer['first_name']; ?></td>

      <td><?php echo $customer['last_name']; ?></td>

      <td><?php echo $customer['email']; ?></td>

      <td><?php echo $customer['phone']; ?></td>

      <td><?php echo $customer['product_name']; ?></td>

      <td><?php echo $customer['product_price']; ?></td>

      <td><?php echo $customer['reference']; ?></td>

      <td><?php echo $customer['paid_on']; ?></td>

    </tr>

   <?php  } ?>

  </table>

</section>

</body>

</html>
