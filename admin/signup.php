<?php
  session_start();
  include("db.php");
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!--My css file-->
    <link rel="stylesheet" type="text/css" href="css/signup.css">

    <title>Hello, world!</title>
  </head>
  <body>

    <div class="container">
        <!--Signup Form-->
        <div id="signup-form-wrap" class="signup">
              <h2>Sign up</h2>
              <form class="signup-form" method="post">
                <div class="form-group">
                  <input type="email" class="form-control" name="signupEmail" aria-describedby="emailHelp" placeholder="Email Address">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="signupPassword" placeholder="Password">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="signupPassword2" placeholder="Password Again">
                </div>
                <div class="form-group">
                  <button name="signup" type="submit" class="btn btn-primary">Signup</button>
                </div>
            </form>
             <div id="create-account-wrap">
                    <p class="form-group">Are you already a member? <a href="index.php" class="loginLetter">Login</a></p>
                </div>
        </div>
    </div>

   <!--Bootstrap JS-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 
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