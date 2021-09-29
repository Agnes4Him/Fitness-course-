

$("#signupLogin").click(function() {

  if($("#signup").val() == "1") {
  
    $("#signup").val("0");
    $("#signupLogin").html("Signup");
    $("#submit").html("Login");
  }else {
  
    $("#signup").val("1");
    $("#signupLogin").html("Login");
    $("#submit").html("Signup");
  }
  })

  $("#submit").click(function(e) {

    e.preventDefault();
    
     $.ajax({
    
      method:"POST",
      url:"/actions.php?action=validation",
      data:{email:$("#email").val(), password:$("#password").val(), signup:$("#signup").val()},
      success:function(result) {
    
        $("#validationMessage").html(result).show();

        setTimeout('window.location.assign("/index.php")', 2000);

      }
    
     })
    
    })

    

    $(".addToCartBtn").on("click", function(e) {

      e.preventDefault(); 

      
      var cart = $(this).closest(".add-to-cart");
      
      var pid = cart.find(".productId").val();
      
      var pname = cart.find(".productName").val();
      
      var pimage = cart.find(".productImage").val();
      
      var pprice = cart.find(".productPrice").val();

      
        $.ajax({
      
        method:"POST",
        url:"/actions.php?action=updatecart",
        data:{pid:pid, pname:pname, pimage:pimage, pprice:pprice},
        success:function(result) {
      
            $("#cartMessage").html(result).show();

            window.scrollTo(0,0);

            updateCartNumber();
      
        }
      
      })
 
      })

      updateCartNumber();

      function updateCartNumber() {

      $.ajax({
  
        method:"GET",
        url:"/actions.php",
        data:{cartItem:"cartitem"},
        success:function(result) {
    
          $(".cartNumber").html(result);
        }
    
        })

      }

      $("#paidVideos").click(function() {

        $(".accessContainer").toggle();

      })

 
      // Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("join-button");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }

}

