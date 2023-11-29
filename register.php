<?php include('server copy.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="login.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-image: url('LIPA LAYOUT 1.jpg');
            background-size: cover;
        }

        .header {
            background-color: #e74c3c; /* Darker shade for header */
            padding: 15px;
            text-align: center;
            color: white; /* Text color for header */
        }

        .header h2 {
            font-size: 30px;
            font-weight: bold; /* Make the font bold */
        }

        .form-container {
            max-width: 400px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .input-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: black; /* Label text color */
            font-weight: bold; /* Make the font bold */
        }

        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .btn {
            background-color: #e74c3c; /* Button color */
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold; /* Make the font bold */
        }

        .btn:hover {
            background-color: #c0392b; /* Slightly different color on hover */
        }

        p {
            text-align: center;
            color: #7f8c8d; /* Text color for the paragraph */
        }

        a {
            color: #3498db; /* Link color */
            font-weight: bold; /* Make the font bold */
        }

        a:hover {
            color: #2980b9; /* Link color on hover */
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>Register User</h2>
    </div>

    <form method="post" action="register.php" class="form-container">
        <?php include('errors.php'); ?>
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="<?php echo $username; ?>">
        </div>
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?php echo $email; ?>">
        </div>
        <div class="input-group">
            <label for="password_1">Password</label>
            <input type="password" name="password_1">
        </div>
        <div class="input-group">
            <label for="password_2">Confirm Password</label>
            <input type="password" name="password_2">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="reg_user">Register</button>
        </div>
        <p>Already a member? <a href="login.php">Sign in</a></p>
    </form>
</body>

</html>
