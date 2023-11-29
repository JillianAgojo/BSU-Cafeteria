<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Dashboard</title>
	<link rel="stylesheet" type="text/css" href="style.css">

	<!-- Add Bootstrap CSS link -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  	<style>
	    .navbar {
	        background-color: #dc3545; /* Red background color */
	    }

		.content {
	        margin-top: 70px; /* Adjusted to accommodate the fixed navbar */
	     /* Replace 'your-background-image.jpg' with the actual path to your background image */
	        background-size: cover;
	        background-position: center;
	        color: #fff; /* Text color for the content */
	        padding: 20px; /* Adjust as needed */
	    }
	    .navbar-brand {
	        font-size: 24px;
	        font-weight: bold;
	    }
	    .navbar {
	        background-color: #dc3545; /* Red background color */
	    }

	    .navbar a {
	        color: white !important;
	    }

	    .navbar a:hover {
	        background-color: #555;
	    }

	    body {
	        font-family: 'Poppins', sans-serif;
	        margin: 0;
	        padding: 0;
	        background: url('Batangas-State-University.jpg') center/cover no-repeat fixed; /* Replace 'your-background-image.jpg' with the actual path to your background image */
	        color: #fff; /* Text color for the content */
	    }

	    .content {
	        margin-top: 70px; /* Adjusted to accommodate the fixed navbar */
	        padding: 20px; /* Adjust as needed */
	    }

	    .navbar-brand {
	        font-size: 24px;
	        font-weight: bold;
	    }
  	</style>
</head>
<body>

	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
		<div class="container">
			<a class="navbar-brand" href="#">BSU Cafeteria Admin</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="addmenu.php">Add Menu</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="viewmenu.php">View Menu</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="customersorders_cart.php">Customers Order</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="index.php?logout='1'">Logout</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- Content -->
	<div class="content">
		<p class="text-center p-2 text-grey" style="font-family: times new roman; font-size: 40px;">Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
		<p class="text-center p-2 text-grey" style="font-family: times new roman; font-size: 40px; text-decoration: none; ">TO</p>
		<p class="text-center p-2 text-grey" style="font-family: times new roman; font-size: 40px; text-decoration: none; ">BSU Cafeteria</p>
		<div class="container my-5">
			<?php 
				if(isset($_GET['addmenu'])){
					include('addmenu.php');
				}
				if(isset($_GET['viewmenu'])){
					include('viewmenu.php');
				}
			?>
		</div>
	</div>

	<!-- Add Bootstrap JS and jQuery -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
