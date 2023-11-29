<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Admin</title>
    <!-- Include the Poppins font from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="login.css">

</head>

<body>
    <div class="header">
        <h2>Login Admin</h2>
    </div>

    <form method="post" action="login.php" class="form-container">
        <?php include('errors.php'); ?>
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="login_user">Login</button>
        </div>
        <p>Not yet a member? <a href="register.php">Sign up</a></p>
    </form>
</body>

</html>
