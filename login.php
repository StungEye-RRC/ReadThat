<?php
  require('includes/includes.php');

  if ($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($user = user_login_successful($username, $password)) {
      UserMessage::persist_message('success','You are logged in.');
      login_in_user($user);
    } else {
      UserMessage::set_message('error','Username or Password is incorrect.');
    }
  }
?>

<?php require ('partials/header.php') ?>

    <form action="login.php" method="post">
        <fieldset>
            <h1>ReadThat Login</h1>
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
