<?php
  require('includes/includes.php');

  if ($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_confirmation = $_POST['password_confirmation'];

    if ($password != $password_confirmation) {
      UserMessage::set_message('error', 'Sorry your password confirmation did not match your password.');
    } else if (strlen($username) == 0) {
      UserMessage::set_message('error', 'Your username must be at least one character.');
    } else if (strlen($password) < 8) {
      UserMessage::set_message('error', 'Your password must be greater than 8 characters.');
    } else {
      $user = find_user_by_name($username);
      if ($user) {
        UserMessage::set_message('error', 'Sorry that username is already taken.');
      } else {
        add_new_user_to_database($username, $password);
        UserMessage::set_message('success', 'Registration Successful.');
      }
    }

  }
?>

<?php require('partials/header.php') ?>

    <form action="register.php" method="post">
        <fieldset>
            <h1>ReadThat Registration</h1>
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

<?php require('partials/footer.php') ?>
