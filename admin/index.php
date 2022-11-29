<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!--My css file-->
    <link rel="stylesheet" type="text/css" href="adminstyle.css">

    <title>My Blog Admin</title>
  </head>
  <body>
    <div class="container">
      <div class="admin-login">
          <form class="form" method="post">
                <div class="form-group">
                    <label>Email address</label>
                    <input type="email" class="form-control" name="loginEmail" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="loginPassword">
                </div>
                <a href="signup.php">Don't you have an account?</a><br>
                <button name="login" type="submit" class="btn btn-primary">LOGIN</button>
          </form>
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
  if(isset($_POST["login"]) && isser($_POST["loginEmail"]) && isset($_POST["loginPassword"])){

      //assign values to variables
    $email = $_POST["loginEmail"];
    $pw = $_POST["loginPassword"];

    //check if every field is filled
    if($email == "" || $pw == ""){
      //show warning
      echo "Please fill all the area. There is a blank";
    } else {
      //check if user exist
      $sql = "SELECT * FROM users WHERE email = '".$email."' AND password = '".$pw."' ";
      $result = mysqli_query($conn, $sql);
      if(mysqli_num_rows($result)>0){
              $_SESSION["user"]=$email;
              header("Location: post.php");
            }else{
              echo "User not found";
            }
    }
  }
?>