<?php 

session_start();

if($_GET['function']== "logout") {

  session_unset();
}

if($_GET['action']=="validation") {

  include("connection.php");

  $error=""; 
  $success="";

  if(!$_POST['email']) {

    $error.="The email field is required.<br>";
  }

  if(!$_POST['password']) {

    $error.="Password is required.<br>";
  }

  if (($_POST['email']) && (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {
    
    $error.="The email address is not valid.<br>";
  }

  if($error!="") {

    echo $error;
  } else {

    if($_POST['signup'] == "1") {

      $query = "SELECT * FROM users WHERE email ='".mysqli_real_escape_string($link, $_POST['email'])."'LIMIT 1";

      $result = mysqli_query($link, $query);

      if(mysqli_num_rows($result) > 0) {

        $error="That email address has been taken";
       
        echo $error;

      } else {

        $query = "INSERT INTO users (email, password) VALUES('".mysqli_real_escape_string($link, $_POST['email'])."','".mysqli_real_escape_string($link, $_POST['password'])."')";

        if(!mysqli_query($link, $query)) {

          $error="Signup not successful. Please try again later";

          echo $error;

        } else {

          $_SESSION['id'] = mysqli_insert_id($link);

          $query="UPDATE users SET password='".md5(md5(mysqli_insert_id($link)).$_POST['password'])."' WHERE id='".mysqli_insert_id($link)."'LIMIT 1";

          mysqli_query($link, $query);

          $success="Signup was successful";

          echo $success;

        }
      }
    } else {

         $query="SELECT * FROM users WHERE email='".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";

         $result=mysqli_query($link, $query);

         $row=mysqli_fetch_assoc($result);

         if(isset($row)) {

          $hashedPassword="";

          $hashedPassword=md5(md5($row['id']).$_POST['password']);

          if($hashedPassword == $row['password']) {

            $_SESSION['id'] = $row['id'];

            $success = "Login was successful";

            echo $success;

          } else {

            $error="Your password is not correct";

            echo $error;
          }
    } else {

      $error = "Your email does not exist in the database";

      echo $error;

    }
    }
  }
}


if($_GET['action']=="updatecart") {

  include("connection.php");

  $cartMessage = "";

  $pid = $_POST['pid'];

  $userid = mysqli_real_escape_string($link, $_SESSION['id']);

  $pname = $_POST['pname'];

  $pimage = $_POST['pimage'];

  $pprice = $_POST['pprice'];
  
  
  $usersquery = "SELECT * FROM users WHERE id ='".$userid."' LIMIT 1";
  
  $usersresult = mysqli_query($link, $usersquery);
  
  if(mysqli_num_rows($usersresult) == 0) {
  
    $cartMessage = "You are not yet logged in";
  
    echo $cartMessage;
 
  } else {
      
      $query = "SELECT * FROM cart WHERE userid='".$userid."' AND pid ='".$pid."'";
      
      $result = mysqli_query($link, $query);
      
      if(mysqli_num_rows($result) > 0) {
      
        $cartMessage = "That product is already in your cart";
      
        echo $cartMessage;
        
      } else {
      
        $insertquery = "INSERT INTO cart (userid, pid, pname, pimage, pprice) VALUES ('".$userid."','".$pid."','".$pname."','".$pimage."','".$pprice."')";
      
        if(mysqli_query($link, $insertquery)) {
      
        $cartMessage = "Product has been successfully added to cart";
      
        echo $cartMessage;
      
        }else {
      
          $cartMessage = "Unable to add product to cart. Please try again";
      
          echo $cartMessage;
        }
      }
      
      }
      
      }
      
      if($_GET['cartItem'] == 'cartitem') {

        include("connection.php");

        $query = "SELECT * FROM cart WHERE userid='".$_SESSION['id']."'";
      
        $result=mysqli_query($link, $query);
      
        $row = mysqli_num_rows($result);
      
        echo $row;
      
      }

      if(isset($_GET['clear'])) {

        include("connection.php"); 
        
        $deleteallquery = "DELETE FROM cart WHERE userid='".$_SESSION['id']."'";
        
        mysqli_query($link, $deleteallquery);
        
        $_SESSION['showAlert']='block';
        
        $_SESSION['message']='Items removed from the cart';
        
        header("location:cart.php");
        
        }
        
        if(isset($_GET['remove'])) {
        
        include("connection.php");
        
        $deleteitemquery = "DELETE FROM cart WHERE pid ='".$_GET['remove']."' AND userid ='".$_SESSION['id']."' LIMIT 1";
        
        mysqli_query($link, $deleteitemquery);

        $_SESSION['showAlert']='block';
        
        $_SESSION['message']='Item(s) removed from the cart';
        
        header("location:cart.php");

        }

?>



