<?php 
	session_start(); 
	require("../loginuser/action.php");
	if(isset($_SESSION["admin"]) && $_SESSION["admin"]="chloe"){

?>


<!DOCTYPE html>
<html lanb="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../index.css">
	<title>Comment System Using BS4, PHP & MySQLI</title>

	<script src="https://kit.fontawesome.com/607a06b07a.js" crossorigin="anonymous"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../partials/footer.css">

</head>

<body class="bg-dark">
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
                <a class="nav-link" href="index.php">Home
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

				<div class="container bg-dark">
					<div class="row justify-content-center mb-2 comment-wrapper">
						<div class="col-lg-5 bg-light rounded">
							<h4 class="text-center p-2">Write your comment!</h4>
							<form action="contact.php" method="POST" class="p-2">
								<input type="hidden" name="id" value="<?= $u_id; ?>">
								<div class="form-group comment-form">
									<input type="text" name="name" class="form-control rounded-0"
									placeholder="Enter your name" required value="<?= $u_name; ?>">
								</div>
								<div class="form-group">
									<textarea name="comment" class="form-control rounded-0"
									placeholder="Write your comment here" required><?= $u_comment; ?></textarea>
								</div>
								<div class="form-group">
									<?php if($update==true){ ?>
										<input type="submit" name="update" class="btn btn-success rounded-0" 
										value="Update Comment">
									<?php } else{ ?>
										<input type="submit" name="submit" class="new-button" value="Post Comment">
									<?php } ?>
									<h5 class="float-right text-success p-2"><?= $msg; ?></h5>
								</div>
							</form>
						</div>
					</div>

		<div class="row justify-content-center">
			<div class="col-lg-5 rounded bg-light p-3">
				<?php 
					$sql="SELECT * FROM comment_table ORDER BY id DESC";
					$result=$conn->query($sql);
					while($row=$result->fetch_assoc()){
				?>

				<div class="card mb-2 border-secondary">
					<div class="card-header bg-secondary py-1 text-light">
						<span class="font-italic">Posted By : <?= $row['name'] ?></span>
						<span class="float-right font-italic">On : <?= $row['cur_date'] ?></span>
					</div>
					<div class="card-body py-2">
						<p class="card-text"><?= $row['comment'] ?></p>
					</div>
					<div class="card-footer py-2">
						<div class="float-right">
							<a href="contact.php?del=<?= $row['id'] ?>" class="text-danger mr-w"
								onclick="return confirm('Do you want to delete this comment?');"
								title="Delete"><i class="fas fa-trash"></i></a>

							<a href="contact.php?edit=<?= $row['id'] ?>" class="text-success"
								title="Edit"><i class="fas fa-edit"></i></a>
						</div>
					</div>
				</div>

				<?php } ?>
			</div>
		</div>
	</div>
 <div class="footer-contact">
 	<?php 
  include '../partials/footer.php';
	?>
</div>
<?php
 	}else{
  header("Location: contact.php");
}
?>