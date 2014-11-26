<?php
  require('includes/database.php');
  require('includes/user_message.php');
  require('includes/user_helpers.php');
  require('includes/link_helpers.php');

  if (get_the_current_user()) {
    UserMessage::set_message('success', 'You are logged in.');
  } else {
    UserMessage::set_message('error', 'You are not logged in.');
  }
  
  $links = get_all_links();
?>

<?php require('partials/header.php') ?>

<?php if (count($links) == 0): ?>
  <p>No links found.</p>
<?php else: ?>
  <ul>
    <?php foreach($links as $link): ?>
      <li><a href="<?= $link['url'] ?>"><?= $link['title'] ?></a></li>
    <?php endforeach ?>
  </ul>
<?php endif ?>

<?php require('partials/footer.php') ?>
