<?php session_start(); 
include("../db.php");
if(isset($_SESSION["admin"]) && $_SESSION["admin"]="chloe"){
    if(isset($_GET["success"])){
    }
  
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="NewAndPost.css">
    <link rel="stylesheet" type="text/css" href="../index.css">


    <title>My Blog Admin</title>

  </head>
  <body class="newpage_body">

    <!-- Header -->
      <header class="headertop">
        <nav class="navbar navbar-expand-lg">

        <div class="container">
          <a class="navbar-brand" href="index.php"><h2>My BLOG<em>.</em></h2></a>
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">

              <li class="nav-item active">
                <a class="nav-link" href="">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="about-us.html">About Us</a>
              </li>

               <li class="nav-item">
                <a class="nav-link" href="deletion.php">Delete</a>
              </li>


              <li class="nav-item">
                <a class="nav-link" href="new.php">New</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact Us</a>
              </li>

              <li class="nav-item">
                <a href="?logout" class="logout nav-link">Logout</a>
                <?php
                  if(isset($_GET["logout"])){
                    session_destroy();
                    header("Location: ../index.php");
                  }
                ?>
              </li>

            </ul>
            </div>
          </div>
        </nav>
      </header>

    <!--main contents-->
    <div id="new-form-wrap" class="container new_wrap">
      <h2 class="newpost_title"> New post! </h2>
      <form>
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea class="form-control" rows="3" name="content"></textarea>
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" name="submit" value="Publish">
        </div>
      </form>

    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

<?php

if(isset($_GET["submit"])){
  $title = $_GET["title"];
  $content = $_GET["content"];
    if($title == "" && $content == ""){
        echo "You didn't write anything";
        }else{
            $sql = "INSERT INTO posts (title, content) VALUES ('".$title."', '".$content."')";
            if(!mysqli_query($conn, $sql)){
             echo "Something went wrong";
                }else{
               header("Location: index.php?success");
                $msg = "Posted Successfully!";
            }
        }
    }
}else{
  header("Location:  index.php");
}


?>