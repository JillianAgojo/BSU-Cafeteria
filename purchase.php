<?php
session_start();

$con=mysqli_connect("localhost","root","","db_ba3102");

if(mysqli_connect_error())
{
   echo "<script>
        alert('cannot connect to database');
        window.location.href='cart.php';
    </script>";
    exit();
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST['purchase']))
    {
        $query1="INSERT INTO order_manager (Full_Name) VALUES ('$_POST[full_name]')";
        if(mysqli_query($con,$query1))
        {
            $Order_Id=mysqli_insert_id($con);
            $query2="INSERT INTO order_table (Order_Id ,ordered_menu, price, quantity) VALUES (?,?,?,?)";
            $stmt=mysqli_prepare($con,$query2);
            if($stmt)
            {
                mysqli_stmt_bind_param($stmt,"isii",$Order_Id,$ordered_menu,$price,$quantity);
                foreach($_SESSION['cart']as $key => $values)
                {
                    $ordered_menu=$values['Menu_Name'];
                    $price=$values['Price'];
                    $quantity=$values['Quantity'];
                    mysqli_stmt_execute($stmt);
                }
                unset($_SESSION['cart']);
                echo "<script>
                    alert('Order Placed');
                    window.location.href='cart.php';
                </script>";
            }
            else
            {
                echo "<script>
                    alert('SQL Query Prepare error');
                    window.location.href='cart.php';
                </script>";
            }
        }
        else
        {
            echo "<script>
                alert('SQL error');
                window.location.href='cart.php';
            </script>";
        }
    }
}

?>