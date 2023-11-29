<?php
include('../includes/connect.php');
?>

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
  <title>Customers Order</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <!-- Add the Bootstrap CSS link -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Custom styles for the navigation bar */

    /* Table styling */
    .view-menu {
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin-top: 20px;
    }

    .table-container {
      overflow-x: auto;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th,
    td {
      padding: 10px;
      border: 1px solid #ccc;
    }

    th {
      background-color: #dc3545; /* Red background color for table header */
      color: #fff;
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

        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
        }

    .receipt {
        background-color: #fff;
        border: 1px solid #ddd;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    .order-details {
        margin-bottom: 20px;
    }

    .order-details div {
        margin-bottom: 5px;
    }

    h2 {
        color: #CD5C5C;
    }

    .menu-details {
        margin-top: 20px;
    }

    .menu-details h4 {
        color: #CD5C5C;
        margin-bottom: 10px;
    }

    ul {
        list-style: none;
        padding: 0;
    }

    li {
        margin-bottom: 20px;
    }
    
    .total-amount {
        margin-top: 20px;
    }

    .total-amount h4 {
        color: #CD5C5C;
        margin: 0;
    }
</style>
    
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">BSU Cafeteria Admin</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
    <br>
    <br>
    <br>
    <br>

    <div class="container">
    <div class="center">
        <?php
        $query = "SELECT * FROM order_manager ";
        $user_result = mysqli_query($con, $query);

        if (!$user_result) {
            die("Query failed: " . mysqli_error($con));
        }

        while ($user_fetch = mysqli_fetch_assoc($user_result)) {
            echo "
            <div class='receipt'>
                <h2>Order Receipt</h2>
                <div class='order-details'>
                    <div><strong>Order ID:</strong> $user_fetch[Order_Id]</div>
                    <div><strong>Customer ID:</strong> $user_fetch[Full_Name]</div>
                </div>

                <div class='menu-details'>
                    <h4>Menu Details</h4>
                    <ul>
            ";

            $totalAmount = 0;

            $order_query = "SELECT * FROM order_table WHERE Order_Id=$user_fetch[Order_Id]";
            $order_result = mysqli_query($con, $order_query);

            if (!$order_result) {
                die("Query failed: " . mysqli_error($con));
            }

            while ($order_fetch = mysqli_fetch_assoc($order_result)) {
                $totalAmount += $order_fetch['price'];
                echo "
                        <li>
                            <strong>Menu Name:</strong> $order_fetch[ordered_menu]<br>
                            <strong>Price:</strong> ₱$order_fetch[price]<br>
                            <strong>Quantity:</strong> $order_fetch[quantity]
                        </li>
                ";
            }

            echo "
                    </ul>
                </div>

                <div class='total-amount'>
                    <h4>Total Amount: ₱$totalAmount</h4>
                </div>
            </div>
            ";
        }
        ?>
    </div>
</div>


  <!-- Add the Bootstrap JS scripts -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>