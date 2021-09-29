<?php 

session_start();

if($_GET['function']== "logout") {

  session_unset();

}

if(isset($_GET['course'])) {

  $course_name = $_GET['course'];

  include("/connection.php");

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

    <link rel="stylesheet" href="styles/playcourse.css">

    <script src="https://kit.fontawesome.com/539b4db01a.js" crossorigin="anonymous"></script>

</head>

<body>

    <?php include("/header.php"); ?>

    <section class="paidCourse">

      <h4>Welcome <?php 

       $query = "SELECT * FROM orders WHERE user_id='".$_SESSION['id']."' LIMIT 1";

       $result = mysqli_query($link, $query);

       $row = mysqli_fetch_assoc($result);

       echo $row['first_name']; ?>
      
      , Access your course here.</h4>

      <?php 

      $query = "SELECT * FROM products WHERE pname='".$course_name."' LIMIT 1";

      $result = mysqli_query($link, $query);

      while($row = mysqli_fetch_assoc($result)) {

      ?>

      <div class="paidCourseContainer">

        <video width="100%" height="auto" src="<?php echo $row['pimage'] ?>" controls></video>

      </div>

     <?php  }  ?>

    </section>

    <?php include("/footer.php"); ?>