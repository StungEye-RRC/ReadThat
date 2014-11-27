<!DOCTYPE html>
<html>
<head>
  <title>ReadThat</title>
  <link type="text/css" rel="stylesheet" href="css/main.css">
</head>
<body>
  <?php if (UserMessage::get_message('error')): ?>
    <div class="error">
      <?= UserMessage::get_message('error') ?>
    </div>
  <?php endif; ?>

  <?php if (UserMessage::get_message('success')): ?>
    <div class="success">
      <?= UserMessage::get_message('success') ?>
    </div>
  <?php endif; ?>

  <nav>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="submit.php">Submit</a></li>
      <?php if (get_the_current_user()): ?>
        <li><a href="logout.php">Logout</a></li>
      <?php else: ?>
        <li><a href="register.php">Register</a></li>
        <li><a href="login.php">Login</a></li>
      <?php endif ?>
    </ul>
  </nav>
  
