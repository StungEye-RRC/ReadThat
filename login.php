<?php
  require('database.php');
  $error_message = false;
  $success_message = false;

  if ($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (user_login_successful($db, $username, $password)) {
      $success_message = "Login Successful.";
    } else {
      $error_message = "Username or Password is incorrect.";
    }
  }
?>

<?php require ('partials/header.php') ?>

    <form action="login.php" method="post">
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

<?php require('partials/footer.php') ?>
