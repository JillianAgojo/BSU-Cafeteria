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
    <title>View Menu</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
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

        .content {
            margin-top: 70px; /* Adjusted to accommodate the fixed navbar */
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
        }

        .view-menu {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .table-container {
            overflow-x: auto; /* Enable horizontal scrolling for small screens */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
        background-color: red;
        color: red; /* Text color for headers (white) */
       text-align: center;
        }

        td {
        text-align: center;
        color: black; /* Text color for data (black) */
        }


        tr:nth-child(even) {
            background-color: #f2f2f2;
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

        .content {
            margin-top: 70px; /* Adjusted to accommodate the fixed navbar */
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
        }
        .navbar-nav {
         margin-left: auto; /* Push the navigation items to the right */
        }

        .navbar-nav .nav-item {
         margin-left: 5px; /* Add space between each navigation item */
        }
        
        .img-thumbnail {
            max-width: 100px;
            max-height: 100px;
        }
        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
        .btn-delete {
            background-color: #DC3545;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-delete:hover {
            background-color: #721c24;
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
        <div class="container">
            <div class="view-menu">
                <h2 class="text-center mb-4">MENU LIST</h2>
                <div class="table-container">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Food Id</th>
                                <th>Available Menu</th>
                                <th>Menu Description</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                         
						<?php
include('../includes/connect.php');
$select_query = "SELECT * FROM menu";
$result = mysqli_query($con, $select_query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr style='border: 1px solid black'>";
        echo "<td style='border: 1px solid black'>" . $row["food_id"] . "</td>";
        echo "<td style='border: 1px solid black'>" . $row["available_menu"] . "</td>";
        echo "<td style='border: 1px solid black'>" . $row["food_desc"] . "</td>";
        echo "<td style='border: 1px solid black'>" . $row["price"] . "</td>";
        echo "<td><img src='uploads/" . $row["image"] . "' alt='Menu Image' class='img-thumbnail'></td>";
        // Remove this line
        // echo "<td style='border: 1px solid black'>" . $row["quantity"] . "</td>";
        echo "<td style='border: 1px solid black;border-radius: 25px; text-align: center; background-color: LightGray;'><a class='tdr' href='delete.php?a=" . $row["food_id"] . "'>delete</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No records found</td></tr>";
}
mysqli_close($con);
?>
    </tbody>
</table>
</div>
      </div>
</body>

</html>
