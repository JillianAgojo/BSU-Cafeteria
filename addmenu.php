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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
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





   
<!-- Content -->
    <div class="content">
<?php 

include('../includes/connect.php');
if(isset($_POST['addmenu'])){ 
  
  $Available_menu = $_POST['name'] ;
  $Food_desc = $_POST['food_desc'] ;
  $Price = $_POST['price'] ;

  $filename = $_FILES['image']['name'];
  $fileSize =  $_FILES['image']['size'];
  $source_path=$_FILES['image']['tmp_name'];
  $imageExtension = explode('.',$filename);
  $imageExtension = strtolower(end($imageExtension));

  if($fileSize > 10000000){
    echo "<script> alert('File is too large') </script>";
  }else{
    $newImage = uniqid();
    $newImage .= '.' . $imageExtension;

    move_uploaded_file($source_path,'uploads/'.$newImage);
    $insert_query = "insert into menu (available_menu, food_desc, price, image) values ('$Available_menu' , '$Food_desc' , $Price, '$newImage')";
    $result = mysqli_query($con, $insert_query);
    if ($result)
          {
            echo "<script>alert('Product has been inserted successfully!')</script>";
     }
  }
}
?>

<div class="container">
    <div class="card p-4 mt-5" style="max-width: 500px; margin: auto; background-color: #fff; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <h2 class="text-center mb-4" style="font-family: Cambria Math; color: black;">ADD MENU</h2>

        <form action="" method="post" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="name" class="form-label">Menu Name</label>
                <div class="input-group">
                    <span class="input-group-text bg-danger text-white">
                        <i class="fas fa-receipt"></i>
                    </span>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Add a Menu">
                </div>
            </div>

            <div class="mb-3">
                <label for="food_desc" class="form-label">Menu Description</label>
                <div class="input-group">
                    <span class="input-group-text bg-danger text-white">
                        <i class="fas fa-receipt"></i>
                    </span>
                    <input type="text" class="form-control" id="food_desc" name="food_desc" placeholder="Put a Menu Description">
                </div>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <div class="input-group">
                    <span class="input-group-text bg-danger text-white">
                        <i class="fas fa-peso-sign"></i>
                    </span>
                    <input type="text" class="form-control" id="price" name="price" placeholder="Enter Price">
                </div>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Menu Image</label>
                <div class="input-group">
                    <span class="input-group-text bg-danger text-white">
                        <i class="fas fa-image"></i>
                    </span>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*" placeholder="Insert an Image">
                </div>
            </div>

            <div class="text-center mt-4">
                <input type="submit" class="btn btn-danger" name="addmenu" value="Add Menu">
                <a href="<?php echo 'SITEURL' ?>index/addmenu.php"></a>
            </div>
        </form>
    </div>
</div>


</div>
<script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>