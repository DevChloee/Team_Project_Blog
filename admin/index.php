<?php session_start(); 
include("../db.php");
if(isset($_SESSION["admin"]) && $_SESSION["admin"]="chloe"){
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
  <body>

    <!-- Header -->
      <header class="headertop">
        <nav class="navbar navbar-expand-lg">

        <div class="container">
          <a class="navbar-brand" href=""><h2>My BLOG<em>.</em></h2></a>
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
   
     <!--CONTENT-->
    <div id="page-container">
      <div id="footer-wrap" class="container mainpart">
        <div class="row">
            <div class="col-12 col-lg-8">
                <?php
                  $sql = "SELECT * FROM posts";
                  $result = mysqli_query($conn, $sql);

                  if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                      echo "<br>";
                      echo "<div class='post'>";
                      echo "<h4 class='title'>".$row["title"]."</h4><hr>
                            <p class='content'>".$row["content"]."</p>";
                      echo "</div>";
                    }
                  }
                ?>
            </div>
            <div class="col-4" id="asidecolumn">
                <?php
                  $sql = "SELECT * FROM posts";
                  $result = mysqli_query($conn, $sql);

                  if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                      echo "<br>";
                      echo "<div class='posttitle'>";
                      echo "<h4 class='title'>".$row["title"]."</h4><hr>";
                      echo "</div>";
                    }
                  }
                  echo "</div>";
                ?>
              </div>
        </div>
      </div>

  </body>
</html>
<?php
  if(isset($_GET["delete"])){
    $delete = $_GET["delete"];
    $sql = "DELETE FROM posts WHERE id = '".$delete."' ";
    if(!mysqli_query($conn, $sql)){
      echo "There was a problem deleting the post";
    }else{
      header("Location: inde.php");
    }
  }

}else{
  header("Location: index.php");
}
?>

