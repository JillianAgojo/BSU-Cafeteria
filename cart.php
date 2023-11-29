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
    <title>BSU CAFETERIA - My Cart</title>
    <link rel="stylesheet" type="text/css" href="food.css">
    <!-- Bootstrap CSS link --> 
    <link href ="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        h1 {
            font-size: 60px;
            color: darkred;
        }

        /* Styling for Grand Total Section */
        #gtotal-container {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        #gtotal-label {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        #gtotal-amount {
            font-size: 24px;
            color: #dc3545; /* Red color for emphasis */
        }

        /* Styling for Place Order Button */
        #place-order-btn {
            margin-top: 20px;
        }
    </style>
</head>
<body>
  
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="BSU logo.png" alt="Logo" height="40">
                Batangas State University - Lipa Campus
            </a>
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

    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center border rounded bg-light my-5">
                <h2>MY CART</h2>
            </div>

           <div class="col-lg-9">
                <table class="table">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">Order Number</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $key => $value) {
                                $sr = $key + 1;
                                echo "
                                    <tr>
                                        <td>$sr</td>
                                        <td>$value[Menu_Name]</td>
                                        <td>$value[Price]<input type='hidden' class='mprice' value='$value[Price]'></td>
                                        <td>
                                            <form action='manage_cart.php' method='POST'>
                                                <input class='text-center mquantity' name='Mod_Quantity' onchange='this.form.submit();' type='number' value='$value[Quantity]' min='1' max='10'>
                                                <input type='hidden' name='Menu_Name' value='$value[Menu_Name]'>
                                            </form>
                                        </td>
                                        <td class='mtotal'></td>
                                        <td>
                                            <form action='manage_cart.php' method='POST'>
                                                <button name='Remove_Menu' class='btn btn-sm btn-outline-danger'>REMOVE</button>
                                                <input type='hidden' name='Menu_Name' value='$value[Menu_Name]'>
                                            </form>
                                        </td>
                                    </tr>
                                ";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-3">
                <div id="gtotal-container" class="border bg-light rounded p-4">
                    <h4 id="gtotal-label">Grand Total:</h4>
                    <h3 class="text-center" id="gtotal-amount"></h3>
                    <br>
                    <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) : ?>
                        <form action="purchase.php" method="POST">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" name="full_name" class="form-control" required value="<?php echo $_SESSION['username']; ?>">
                            </div>
                            <button id="place-order-btn" class="btn btn-primary btn-block" name="purchase">Place Order</button>
                        </form>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        var gt = 0;
        var mprice = document.getElementsByClassName('mprice');
        var mquantity = document.getElementsByClassName('mquantity');
        var mtotal = document.getElementsByClassName('mtotal');
        var gtotal = document.getElementById('gtotal-amount');

        function subTotal() {
            gt = 0;
            for (i = 0; i < mprice.length; i++) {
                mtotal[i].innerText = (mprice[i].value) * (mquantity[i].value);
                gt = gt + (mprice[i].value) * (mquantity[i].value);
            }
            gtotal.innerText = "₱" + gt.toFixed(2); // Format as currency with two decimal places
        }

        subTotal();
    </script>

</body>

</html>