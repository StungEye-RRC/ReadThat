<?php
  require('includes/database.php');
  require('includes/user_message.php');
  require('includes/user_helpers.php');

  if (get_the_current_user()) {
    UserMessage::set_message('success', 'You are logged in.');
  } else {
    UserMessage::set_message('error', 'You are not logged in.');
  }
?>

<?php require('partials/header.php') ?>

<p>List of links goes here.</p>

<?php require('partials/footer.php') ?>
