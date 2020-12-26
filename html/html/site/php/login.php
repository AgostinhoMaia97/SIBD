<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="login.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <header>
        <h1>Time to login in the FEUP Networking Forum!</h1>
        <img src="../images/logo.png" alt="logo">
    </header>
    <form action="../actions/action_login.php" method="post">
        <h3>Log in</h3>
        <label>
            User Name: <input type="text" name="username" required>
        </label>
        <label>
            Password: <input type="password" name="password" required>
        </label>
        <input type="submit" value="LOG IN">
    </form>
    <div id="newUser">
        New User?
        <form action="register.php">
            <input type="submit" value="SIGN UP">
        </form>
    </div>
</body>
</html>