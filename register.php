<?php
  require('database.php');
  $error_message = false;
  $success_message = false;

  if ($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_confirmation = $_POST['password_confirmation'];

    if ($password != $password_confirmation) {
      $error_message = "Sorry your password confirmation didn't match your password.";
    } else if (strlen($username) == 0) {
      $error_message = "Your username must be at least one character.";
    } else if (strlen($password) < 8) {
      $error_message = "Your password must be greater than 8 characters.";
    } else {
      $users = find_users_in_database($db, $username);
      if (count($users) == 0) {
        add_new_user_to_database($db, $username, $password);
        $success_message = "Registration Successful.";
      } else {
        $error_message = "Sorry that username is already taken.";
      }
    }

  }
?>

<?php require('partials/header.php') ?>

    <form action="register.php" method="post">
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

<?php require('partials/footer.php') ?>
