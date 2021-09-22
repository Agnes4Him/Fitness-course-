

<body>

    <header>

       <div class="header-container container">

          <a href="index.php" class="brand-logo">
        
            <i class="fas fa-fire-alt"></i>

            <span class="logo-name">FitToLife</span>
          
          </a>
 
          <ul class="header-nav">

            <li><a href="about.php">About</a></li>

            <li><a href="courses.php">Courses</a></li>

            <?php include("connection.php");

            $query = "SELECT * FROM orders WHERE user_id='".$_SESSION['id']."'";

            $result = mysqli_query($link, $query);

            if(mysqli_num_rows($result) > 0) { ?>

            <li><button id="paidVideos">Videos</button></li>

           <?php } ?>

          </ul>

          <div class="btn header-btn">

          <?php if($_SESSION['id']) { ?>

            <a href="index.php?function=logout"><button id="logout-button">Logout</button></a>

          <?php }else { ?>

            <a><button id="join-button">Join</button></a>

          <?php } ?>

          </div>

          <a class="header-cart" href="cart.php">

            <i class="fas fa-shopping-cart"></i>&nbsp;<span class="cartNumber"></span>

          </a>

       </div>

    </header>
