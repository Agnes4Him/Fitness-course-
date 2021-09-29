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

    <link rel="stylesheet" href="styles/homestyle.css">

    <script src="https://kit.fontawesome.com/539b4db01a.js" crossorigin="anonymous"></script>

</head>

<body>

    <?php include("/header.php"); ?>

    <section>

     <div class="header-banner">

      <div class="header-banner-container container">

       <div class="header-banner-content">

        <h2>Welcome And</h2>

        <h3>Get <span class="motivated">Motivated</span> To Stay Fit</h3>

        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
         Eaque, sunt.</p>

       </div>

       <div class="header-banner-button">

         <a class="header-banner-button-1" href="/courses.php">Enrol</a>

         <a class="header-banner-button-2" href="/about.php">Learn More</a>

       </div>

      </div>


     </div>

    </section>

    <section>

      <div class="home-section-2-container container">

         <div class="home-section-2-heading-container">

           <div class="home-section-2-line"><hr></div>

           <div class="home-section-2-heading">

             <h2>Fitness Brings Vitality</h2>

           </div>

           <div class="home-section-2-line"><hr></div>

         </div>

         <div class="home-section-2-text-container">

           <p class="home-section-2-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
           Consequatur tempore debitis ipsum iure officia corporis non 
           voluptas rem recusandae, nemo reiciendis sapiente maiores 
           molestiae ea repellat fugit a veritatis cupiditate quia quibusdam 
           error reprehenderit itaque! Veritatis sunt iure necessitatibus 
           sapiente commodi id reiciendis deleniti rem eaque voluptas eveniet, 
           mollitia possimus?</p>

        </div>

        <div class="home-section-2-link">

           <a href="/courses.php">Enrol Now</a>

        </div>

      </div>

    </section>

    <section>

      <div class="container home-section-3-container">

        <div class="home-section-3-text-container">

          <p class="home-section-3-text">

            Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
            Inventore consequuntur exercitationem omnis recusandae 
            tempora corrupti reprehenderit ea nesciunt a, 
            iusto corporis neque laboriosam itaque libero minus beatae animi eos quas.

          </p>

        </div>

        <div class="home-section-3-image-container">

          <img src="fitnessimages/fitness13.jpg" alt="fitness 20">

        </div>
      </div>
    
    </section>

    <section>

      <div class="container home-section-4-container">

        <div class="home-section-4-image">

          <img src="fitnessimages/fitness16.jpg">

        </div>

        <div class="icons-section">

          <h2 class="icons-section-heading">

          More Than Exercises

          </h2>

          <div class="icons-section-icons">

            <div class="icon-1 icon">

              <i class="fab fa-accessible-icon"></i>

              <p>Strength</p>

            </div>

            <div class="icon-2 icon">

              <i class="fas fa-heartbeat"></i>

              <p>Cardio</p>

            </div>

            <div class="icon-3 icon">

              <i class="fas fa-shoe-prints"></i>

              <p>Lifestyle</p>

            </div>

          </div>

        </div>

      </div>
    
    </section>

    <?php include("/footer.php"); ?>

    