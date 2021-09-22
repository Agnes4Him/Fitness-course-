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

    <link rel="stylesheet" href="styles/aboutstyle.css">

    <script src="https://kit.fontawesome.com/539b4db01a.js" crossorigin="anonymous"></script>

    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    
    <script src="https://js.stripe.com/v3/"></script>

    <title>Fitness About</title>

</head>

<body>

     <?php include("header.php"); ?>

     <section>

        <div class="about-banner-section-container">

          <div class="about-banner-section-content">

            <h2>What We <span class="stand">Stand</span> For</h2>

          </div>

        </div>

     </section>

     <section>

       <div class="about-section-2-container container">

         <div class="about-section-2-icons">

            <i class="fas fa-running"></i>

            <p>Lorem ipsum dolor sit amet consectetur 
               adipisicing elit. Nesciunt, excepturi.</p>

         </div>

         <div class="about-section-2-icons">

            <i class="fas fa-fist-raised"></i>

            <p>Lorem ipsum dolor sit amet consectetur 
               adipisicing elit. Nesciunt, excepturi.</p>

         </div>

         <div class="about-section-2-icons">

            <i class="fas fa-biking"></i>

            <p>Lorem ipsum dolor sit amet consectetur 
               adipisicing elit. Nesciunt, excepturi.</p>

         </div>

       </div>

     </section>

     <section>

       <div class="about-section-3"></div>

     </section>

     <section>

        <div class="about-section-4-container">

          <h2>Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
              Voluptatem aliquid architecto, modi consequatur magni 
              ratione aperiam vitae illo eos obcaecati!
          </h2>

          <a href="courses.php">View Courses</a>

        </div>

     </section>

     <section>

      <div class="container about-section-5-container">

        <div><img src="fitnessimages/fitness2.png"></div>

        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
          Provident in enim, atque dolorem nam laudantium unde labore? 
          Ut provident asperiores magni, a iure sunt sit laboriosam, 
          ad aspernatur modi non!</p>

      </div>

     </section>

     <section>

       <div class="about-section-6-container">

         <a href="courses.php"><h3>Enrol For Classes Today</h3></a>

       </div>

     </section>

     <?php include("footer.php"); ?>