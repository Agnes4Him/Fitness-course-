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

    <link rel="stylesheet" href="styles/coursestyle.css">

    <script src="https://kit.fontawesome.com/539b4db01a.js" crossorigin="anonymous"></script>

    <title>Fitness Course</title>

</head>

<body>

     <?php include("/header.php"); ?>

     <section>

       <div class="courses-section-1-container container">

          <div class="courses-section-1-content">

            <h2>Looking For What Best Suits You?</h2>

            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
             Ipsum nihil libero, tempore dolorem vitae vel! 
             Dolore, magni asperiores! Illum maxime adipisci magnam sit, quam nobis. 
             Saepe, vitae rem quo tempora eius beatae consequuntur repellendus repellat. 
             Tenetur, eius iste harum porro nobis ad vitae illo repudiandae? 
             Alias dolores cumque quia! Magnam?</p>

             <div class="courses-section-1-line">  

                <hr>

            </div>

          </div>

       </div>

      </section>

      <section>

         <div class="courses-section-2-container container">

         <div id="cartMessage"></div>

           <h2>OUR COURSES</h2>

           <div class="courses-container row-1-courses">

             <div class="row-1-course-1 row-course">
             
               <video src="fitnessvideos/video1.mp4" width="400" height="200"></video>

               <p>Happy Walk/#100<p>

               <div class="add-to-cart">
                 
               <?php 

                 include("/connection.php"); 
                 
                 $query="SELECT * FROM products WHERE id=1 LIMIT 1";

                 $result=mysqli_query($link, $query);

                 while($row=mysqli_fetch_assoc($result)) {?>

                 <input type="hidden" class="productId" value="<?php echo $row['id'] ?>">

                 <input type="hidden" class="productName" value="<?php echo $row['pname'] ?>">
                 
                 <input type="hidden" class="productImage" value="<?php echo $row['pimage'] ?>">

                 <input type="hidden" class="productPrice" value="<?php echo $row['pprice'] ?>">

                 <?php } ?>

                 <button type="button" class="addToCartBtn">Add To Cart</button>

               </div>

             </div>

             <div class="row-1-course-2 row-course">

               <video width="400" height="200" src="fitnessvideos/video2.mp4"></video>

               <p>Cardio/#50<p>

               <div class="add-to-cart">

              <?php 

              include("/connection.php"); 

              $query="SELECT * FROM products WHERE id=2 LIMIT 1";

              $result=mysqli_query($link, $query);

              while($row=mysqli_fetch_assoc($result)) {?>

               <input type="hidden" class="productId" value="<?php echo $row['id'] ?>">

               <input type="hidden" class="productName" value="<?php echo $row['pname'] ?>">

               <input type="hidden" class="productImage" value="<?php echo $row['pimage'] ?>">

               <input type="hidden" class="productPrice" value="<?php echo $row['pprice'] ?>">

            <?php }  ?>

           <button type="button" class="addToCartBtn">Add To Cart</button>

          </div>

             </div>
          
          </div>

          <div class="courses-container row-2-courses">

            <div class="row-2-course-1 row-course">
            
              <video width="400" height="200" src="fitnessvideos/video3.mp4"></video>

              <p>Anaerobic/#80<p>

              <div class="add-to-cart">

             <?php

              include("/connection.php"); 

              $query="SELECT * FROM products WHERE id=3 LIMIT 1";

              $result=mysqli_query($link, $query);

              while($row=mysqli_fetch_assoc($result)) {?>

               <input type="hidden" class="productId" value="<?php echo $row['id'] ?>">

               <input type="hidden" class="productName" value="<?php echo $row['pname'] ?>">

               <input type="hidden" class="productImage" value="<?php echo $row['pimage'] ?>">

               <input type="hidden" class="productPrice" value="<?php echo $row['pprice'] ?>">

             <?php } ?>

             <button type="button" class="addToCartBtn">Add To Cart</button>

            </div>

            </div>

            <div class="row-2-course-2 row-course">

              <video width="400" height="200" src="fitnessvideos/video4.mp4"></video>

              <p>Push Through/#150<p>
              
              <div class="add-to-cart">

              <?php

              include("/connection.php"); 

              $query="SELECT * FROM products WHERE id=4 LIMIT 1";

              $result=mysqli_query($link, $query);

              while($row=mysqli_fetch_assoc($result)) {?>

              <input type="hidden" class="productId" value="<?php echo $row['id'] ?>">

              <input type="hidden" class="productName" value="<?php echo $row['pname'] ?>">

              <input type="hidden" class="productImage" value="<?php echo $row['pimage'] ?>">

              <input type="hidden" class="productPrice" value="<?php echo $row['pprice'] ?>">

            <?php }  ?>

           <button type="button" class="addToCartBtn">Add To Cart</button>

          </div>

         </div>
         
        </div>

      </div>

     </section>

    <?php include("/footer.php"); ?>