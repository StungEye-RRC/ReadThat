<!DOCTYPE html>
<html>
<head>
    <title>ReadThat - Registration</title>
    <link type="text/css" rel="stylesheet" href="css/main.css">
</head>
    <div class="error">
        <strong>Registration error:</strong>
    </div>
    <div class="success">
        Registration Successful. <a href="login.php">Login?</a>
    </div>

    <form action="register.php" method="post" class="login">
        <fieldset>
            <h4>ReadThat Registration</h4>
            <p>
              <input name="username" type="text" placeholder="User Name" />
            </p>
            <p>
              <input name="password" type="password" placeholder="Password"/>
            </p>
            <p>
              <input name="password_confirmation" type="password" placeholder="Confirm Password" />
            </p>
            <p class="right">
                <input name="submit" value="register" type="submit" />
            </p>
        </fieldset>
    </form>
</body>
</html>
