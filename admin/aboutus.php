<?php
session_start();
include("../db.php");
if (isset($_SESSION["admin"]) && $_SESSION["admin"] = "chloe") {
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
  <link rel="stylesheet" type="text/css" href="css/about-us.css">
  <script src="../js/search.js" defer></script>

  <title>About Us</title>
</head>

<body>

  <!-- Header -->
  <header class="headertop">
    <nav class="navbar navbar-expand-lg">

      <div class="container">
        <a class="navbar-brand" href="index.php">
          <h2>My BLOG<em>.</em></h2>
        </a>
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
  if (isset($_GET["logout"])) {
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
    <h1 id="title">About Us</h1>
    <blockquote>We are a group of 4 developpers from Algonquin College, who we're tasked with creating a web
      application.
      We choose to make a diary website/forums, we tought it would be place to start for our first web application.
      Since
      we all sue social media but have no clue how it works on the back-end. This was a great opurtunity to have learned more about web development, 
      aswell as the first real group assignment.</blockquote>
    <img id="earth" src="../img/earth.png" alt="earth-from-space">
    <blockquote>
      <p>If you have any questions our problems feel free to use the search fucntion below to search and filter out your
        error</p>
    </blockquote>
    <img id="algonquin" src="../img/Algonquin.png" alt="ourCollege">
    <div id="search-position">
      <h1>Issues and Solutions</h1>
      <input type="text" id="search" onkeyup="searchUser()" placeholder="Search for an error you are having">

      <!-- list container for the post -->
      <ul id="UL">
        <li><a href="#">Password: forgot password, how to reset?</a></li>
        <li><a href="#">Email: email not working, how to fix?</a></li>
        <li><a href="#">Error 404: make sure to check your connection.</a></li>
        <li><a href="#">Password: we will never send you and email asking for your password.</a></li>
        <li><a href="#">Sign-up: if sign-up not working, makre sure info entered is correct.</a></li>
        <li><a href="#">Error 505: make sure to check your connection, (HTTP).</a></li>
      </ul>

    </div>


  </div>

</body>

</html>

<?php
  if (isset($_GET["delete"])) {
    $delete = $_GET["delete"];
    $sql = "DELETE FROM posts WHERE id = '" . $delete . "' ";
    if (!mysqli_query($conn, $sql)) {
      echo "There was a problem deleting the post";
    } else {
      header("Location: deletion.php");
    }
  }
} else {
  header("Location: deletion.php");
}
?>