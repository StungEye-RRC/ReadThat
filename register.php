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
            <label for="username">Username: </label>
            <input id="username" name="username" type="text" />
            <label for="password">Password: </label>
            <input id="password" name="password" type="password" />
            <label for="password_confirmation">Confirm Password: </label>
            <input id="password_confirmation" name="password_confirmation" type="password" />
            <p class="right">
                <input name="submit" value="register" type="submit" />
            </p>
        </fieldset>
    </form>
</body>
</html>
