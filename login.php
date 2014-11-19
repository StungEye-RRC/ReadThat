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
            <p>
              <input name="username" type="text" placeholder="User Name" />
            </p>
            <p>
              <input name="password" type="password" placeholder="Password"/>
            </p>
            <p class="right">
                <a href="register.php">Register New Account</a>
            </p>
            <p class="right">
                <input name="submit" value="login" type="submit">
            </p>
        </fieldset>
    </form>
</body>
</html>
