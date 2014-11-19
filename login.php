<!DOCTYPE html>
<html>
<head>
    <title>ReadThat - Login</title>
    <link type="text/css" rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="error">
      <strong>Login Failed:</strong>
    </div>
    <div class="success">Login Successful.</div>

    <form action="login.php" method="post" class="login">
        <fieldset>
            <h4>ReadThat Login</h4>
            <label for="username">Username: </label>
            <input id="username" name="username" type="text">
            <label for="password">Password: </label>
            <input id="password" name="password" type="password">
            <p class="right">
                <a href="register.php">Register New Account</a>
                <input name="submit" value="login" type="submit">
            </p>
        </fieldset>
    </form>
</body>
</html>
