<?php include("connection.php"); ?>

<footer>

      <div class="container footer-container">

        <div class="footer-menu-socials">

          <div class="footer-menu">

            <ul>
 
              <li><a href="about.php">About Us</a></li>

              <li><a href="courses.php">Courses</a></li>

            </ul>

          </div>

          <div class="footer-socials">

            <a href="#"><i class="fab fa-facebook"></i></a>

            <a href="#"><i class="fab fa-twitter"></i></a>

          </div>

        </div>

        <div class="footer-email-phone-container">

          <i class="fas fa-envelope-open"><span class="contact">someone@gmail.com</span></i>

          <i class="fas fa-phone"><span class="contact">+23408012345678</span></i>

        </div>

        <div class="copyright">&copy; 2021. All Rights Reserved</div>

      </div>

    </footer>

    <!-- The Modal -->
    <div id="myModal" class="modal">

     <!-- Modal content -->
     <div class="modal-content">
  
      <span class="close">&times;</span>
  
      <div class="signup-login">

        <div class="email">

          <label for="email">Email Address:</label>
 
          <input type="email" id="email" name="email" placeholder="Enter Your Email Address" required>

        </div>

        <div class="password">

          <label for="password">Password:</label>
 
          <input type="password" id="password" name="password" placeholder="Enter Your Password" reqiured>

        </div>

        <div class="signup-login-buttons">

          <a href="#" id="signupLogin">Login</a>

          <button id="submit">Signup</button>

          <input type="hidden" id="signup" value="1">

        </div>

      </div>
     
     </div>

    </div>

    <div id="validationMessage"></div>

    <section class="accessContainer">

      <ul>

        <?php include("connection.php");

        $query = "SELECT * FROM orders WHERE user_id='".$_SESSION['id']."'";

        $result = mysqli_query($link, $query);

        foreach($result as $row){ ?>

        <li><a href="playcourse.php?course=<?php echo $row['product_name']; ?>"><?php echo $row['product_name']; ?></a></li>

        <?php }  ?>

      </ul>

    </section>

    </footer>

    <script type="text/javascript" src="fitness.js"></script>

</body>

</html>
