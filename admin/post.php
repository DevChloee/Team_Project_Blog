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

    <link rel="stylesheet" type="text/css" href="adminstyle.css">

    <title>My Blog Admin</title>
  </head>
  <body>
    <!--MENU-->
      <nav class="navbar navbar-expand-lg navbar-dark mynav">
        <a class="navbar-brand" href="post.php"><img width="100px" src="../img/universe.jpg"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="post.php">Posts<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="new.php">New</a>
              </li>
          </ul>
          <a href="?logout" class="logout">Logout</a>
            <?php
              if(isset($_GET["logout"])){
                session_destroy();
                header("Location: ../index.php");
              }
            ?>
        </div>
      </nav>
    <div class="container">
        <?php
              $sql = "SELECT * FROM posts";
              $result = mysqli_query($conn, $sql);

              if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                  echo "<br>";
                  echo "<div class='post'>";
                  echo "<h4 class='title'>".$row["title"]."</h4><hr>
                        <p class='content'>".$row["content"]."</p>";
                        ?>

                        <a href="post.php?delete=<?php echo $row["id"]; ?>" class="btn btn-info">Delete</a>
                        <?php
                  echo "</div>";
                }
              }
          ?>

    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
<?php
  if(isset($_GET["delete"])){
    $delete = $_GET["delete"];
    $sql = "DELETE FROM posts WHERE id = '".$delete."' ";
    if(!mysqli_query($conn, $sql)){
      echo "There was a problem deleting the post";
    }else{
      header("Location: post.php");
    }
  }
}else{
  header("Location: index.php");
}
?>

