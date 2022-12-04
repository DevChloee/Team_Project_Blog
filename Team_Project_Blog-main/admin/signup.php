<?php
  session_start();
  include("../db.php");
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--My css file-->
    <link rel="stylesheet" type="text/css" href="css/create.css">

    <script src="../js/validation.js" defer></script>

    <title>Hello, world!</title>
  </head>
  <body>

    <div class="container">
        <!--Signup Form-->
        <div id="signup-form-wrap" class="signup">
              <h2>Sign up</h2>
              <form class="signup-form" method="post">
                <div class="form-group">
                  <input type="text" class="form-control" id="signup-email" name="signupEmail" aria-describedby="emailHelp" placeholder="Email Address">
                </div>
                <div class="form-group">
                  <input type="password" id="signup-password" class="form-control" name="signupPassword" placeholder="Password">
                </div>
                <div class="form-group">
                  <input type="password" id="signup-password2" class="form-control" name="signupPassword2" placeholder="Password Again">
                </div>
                <div class="form-group">
                  <button name="signup" id="signup-submit" type="submit" class="btn btn-primary">Signup</button>
                </div>
            </form>
             <div id="create-account-wrap">
                    <p class="form-group-member">Are you already a member? <a href="index.php" class="loginLetter">Login</a></p>
                    <p class="form-group-member">Wanna go to main page?<a href="../index.php" class="loginLetter">  Main Page</a></p>
                </div>
        </div>
    </div>

    </body>
</html>

<?php

  //check if button is clicked and inputs are set
  if(isset($_POST["signup"]) && isset($_POST["signupEmail"]) &&
    isset($_POST["signupPassword"]) && isset($_POST["signupPassword2"])){

        //assign values to variables
        $email = $_POST["signupEmail"];
        $pw = $_POST["signupPassword"];
        $pw2 = $_POST["signupPassword2"];

        //check if every field is filled
        if($email == "" || $pw == "" || $pw2 == "") {
        //show warning
        echo '<script>alert("Plese fill all the areas. There is a blank")</script>';
        } else {

            if($email == "chloe@naver.com"){
                echo '<script>alert("Its administrator id. Do not use this id")</script>';
            }else{
                    //check if passwords are matching
                    if($pw == $pw2){
                      //do the insertion 
                      $sql = "INSERT INTO users (email, password) VALUES 
                      ('".$email."', '".$pw."')";
                      //check if record successful
                      if(mysqli_query($conn, $sql)){
                        $_SESSION["user"]="guest";
                        header("Location: ../loginuser/index.php");
                      }else {
                        echo "Error : " . $sql . "<br>" . mysqli_error($conn);
                      }
                    }else{
                      //warn user passwords don't match
                      echo '<script>alert("User passsword not matched")</script>';
                    }

            }
        }
  }

?>