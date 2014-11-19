<?php
  require('database.php');
  $error_message = false;
  $success_message = false;

  if ($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (user_login_successful($db, $username, $password)) {
      $success_message = true;
    } else {
      $error_message = true;
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
    <title>ReadThat - Login</title>
    <link type="text/css" rel="stylesheet" href="css/main.css">
</head>
<body>
  <?php if ($error_message): ?>
    <div class="error">
      Login Failed.
    </div>
  <?php endif; ?>

  <?php if ($success_message): ?>
    <div class="success">
      Login Successful.
    </div>
  <?php endif; ?>

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
