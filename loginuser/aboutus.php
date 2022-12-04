<?php session_start(); 
include("../db.php");
if(isset($_SESSION["user"]) && $_SESSION["user"]="guest"){
    if(isset($_GET["success"])){
    }
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!--Google font-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../index.css">
        <link rel="stylesheet" type="text/css" href="../admin/css/about-us.css">
         <link rel="stylesheet" type="text/css" href="../partials/footer.css">
      <script src="../js/search.js" defer></script>

      <title>About Us</title>
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
                <a class="nav-link" href="aboutus.php">About Us</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="index.php">Posts</a>
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
    <div class="container">
        <div id="search-position" >
          <h1>List of Developpers</h1>
          <input type="text" id="search" onkeyup="searchUser()" 
          placeholder="Search for specific post..">

          <!-- list container for the post -->
          <ul id="UL">
            <li><a href="#">Chloe: jun00011@algonquinlive.com</a></li>
            <li><a href="#">Alex: vali0067@algonquinlive.com</a></li>
            <li><a href="#">Jacob: domp0017@algonquinlive.com</a></li>
            <li><a href="#">Noah: furn0014@algonquinlive.com</a></li>
          </ul>

        </div>

          <div class="flex-container">
            <div>
              <h1>Inspiration</h1>
              <p><strong>We had the idea for this project while browsing our social
                medias. We realised that it would be a great way to advanced our skills
                web development skills. While we use these apps every day, we have no clue how 
                they work on the back-end.
              </strong></p>
            </div>
            <div>
              <h1>Project Developpers</h1>
              <p><strong>- Dawon "Chloe" Jun <br> - Alexandre Valiquette
              <br> - Jacob Dompierre<br> - Noah Furnival</strong></p>
            </div>
            <div>
              <h1>Why a Website</h1>
              <p><strong>We are group of Algonquin College students, who we're tasked with making a website, 
                that includes HTML/CSS, JavasScript and PHP/SQL. This task is in hope of developing our web skills.
              </strong></p>
            </div>
            <div>
              <h1>Why a Website</h1>
              <p><strong>We are group of Algonquin College students, who we're tasked with making a website, 
                that includes HTML/CSS, JavasScript and PHP/SQL. This task is in hope of developing our web skills.
              </strong></p>
            </div>
            <div>
              <h1>Why a Website</h1>
              <p><strong>We are group of Algonquin College students, who we're tasked with making a website, 
                that includes HTML/CSS, JavasScript and PHP/SQL. This task is in hope of developing our web skills.
              </strong></p>
            </div>
            <div>
              <h1>Functions</h1>
              <p><strong>We are group of Algonquin College students, who we're tasked with making a website, 
                that includes HTML/CSS, JavasScript and PHP/SQL. This task is in hope of developing our web skills.
              </strong></p>
            </div>
          </div>
        </div>

    
<?php 
  include '../partials/footer.php';

?>
  
<?php
  if(isset($_GET["delete"])){
    $delete = $_GET["delete"];
    $sql = "DELETE FROM posts WHERE id = '".$delete."' ";
    if(!mysqli_query($conn, $sql)){
      echo "There was a problem deleting the post";
    }else{
      header("Location: deletion.php");
    }
  }
}else{
  header("Location: deletion.php");
}
?>
