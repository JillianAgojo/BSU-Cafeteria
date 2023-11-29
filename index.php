<?php
include('includes/connect.php');
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BSU CAFETERIA</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    
    <style>
               .header {
            position: relative;
            height: 300px; /* Adjust the height as needed */
        }

        .header img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .header-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: paleturquoise;
        }

        .header-text h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .search-container {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
        }

        .search-container input {
            width: 70%;
            padding: 15px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
        }

        .search-container button {
         padding: 15px 30px;
        font-size: 18px;
         border: none;
         border-radius: 25px; /* Add border-radius for a rounded button */
         background-color: #28a745;
         color: white;
         margin-left: 10px;
         cursor: pointer;
          transition: background-color 0.3s ease; /* Add a smooth transition effect */
            }

/* Add a subtle hover effect */
        .search-container button:hover {
         background-color: #218838; /* Darker shade on hover */
                }
        
        footer {
            text-align: center;
            padding: 20px;
            background-color: #333;
            color: white;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        .mytopbt {
            margin-top: 5px;
            margin-bottom: 10px;
            margin-left: 20px;
            margin-right: 20px;
        }

        .obj {
            object-fit: contain;
            align-self: center;
            margin-top: 10px;
            width: 100%;
            height: 300px;
        }

        .card {
            margin: 10px;
            transition: box-shadow 0.3s, transform 0.3s;
        }

        /* Hover Effect Styles */
        .card:hover {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            transform: scale(1.05);
        }

        .card:hover .card-body {
            background-color: #f8f9fa;
        }

        .card:hover .card-title,
        .card:hover .card-text,
        .card:hover .description {
            color: #28a745;
        }

        .card-body {
            text-align: center;
            transition: background-color 0.3s, color 0.3s;
        }

        .card-title {
            font-size: 24px;
            color: green;
            margin-bottom: 10px;
            transition: color 0.3s;
        }

        .card-text {
            font-size: 18px;
            color: #333;
            margin-bottom: 15px;
            transition: color 0.3s;
        }

        .description {
            font-size: 16px;
            color: #333;
            display: none;
        }

        .btn-primary {
            font-size: 16px;
        }

        .home {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }

        .content {
            margin-top: 20px;
        }
        
        .navbar-nav {
         margin-left: auto; /* Push the navigation items to the right */
        }

        .navbar-nav .nav-item {
         margin-left: 10px; /* Add space between each navigation item */
        }
        
    </style>
</head>


</body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="BSU logo.png" alt="Logo" height="40">
                Batangas State University - Lipa Campus</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <?php
                    $count = 0;
                    if (isset($_SESSION['cart'])) {
                        $count = count($_SESSION['cart']);
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">My Cart (<?php echo $count; ?>)</a>
                    </li>
                    <?php if (isset($_SESSION['username'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?logout='1'" style="color: red;">Logout</a>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bootstrap Carousel -->
    <div id="headerCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <!-- Image 1 -->
            </div>
            <div class="carousel-item">
                <!-- Image 2 -->
            </div>
            <!-- Add more carousel items as needed -->
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#headerCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#headerCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


   <!-- New header -->
   <div class="header">
        <img src="Cafeteria Layout for index.jpg" alt="Header Image">
        <div class="header-text">
            <h1>Welcome to BSU Cafeteria</h1>
            <p>Discover a variety of delicious dishes crafted with passion and expertise. Explore our menu and place your order for a delightful dining experience.</p>
        </div>
        <div class="search-container">
            <form action="index.php" method="GET" class="form-inline">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search Food" name="search">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    

      

            <section>
<!-- Content section -->
<div class="content">
    <div class="container mt-5">
        <section>
            <?php
            include('includes/connect.php');
            $search = '';
            if (isset($_GET['search'])) {
                $search = mysqli_real_escape_string($con, $_GET['search']);
                $sel = "SELECT * FROM menu WHERE available_menu LIKE '%$search%'";
            } else {
                $sel = "SELECT * FROM menu";
            }

            $result = mysqli_query($con, $sel);

            if (mysqli_num_rows($result) > 0) {
            ?>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php
                    while ($sl = mysqli_fetch_array($result)) {
                    ?>
                        <div class="col">
                            <div class="card h-100">
                                <img src="admin/uploads/<?php echo $sl['image']; ?>" alt=" " class="obj">
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo $sl['available_menu']; ?></h4>
                                    <h5 class="card-text"><?php echo $sl['price']; ?></h5>
                                    <form action="manage_cart.php" method="POST">
                                        <button type="submit" class="btn btn-primary" name="Add_To_Cart">Add to Cart</button>
                                        <input type="hidden" name="Menu_Name" value="<?php echo $sl['available_menu']; ?>">
                                        <input type="hidden" name="Price" value="<?php echo $sl['price']; ?>">
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            <?php
            } else {
                // Display SweetAlert and continue with the rest of the content
                echo "<script>
                        Swal.fire({
                            icon: 'info',
                            title: 'Oops...',
                            text: 'No food available!',
                        });
                      </script>";
            }
            ?>
        </section>
    </div>
</div>


    <footer>
        <div class="container">
            <p>&copy; 2023 BSU Cafeteria. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0-alpha3/dist/js/bootstrap.min.js"></script>
</body>

</html>