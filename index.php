<?php
  require('includes/database.php');
  require('includes/user_message.php');
  require('includes/user_helpers.php');
  require('includes/link_helpers.php');
  require('includes/date_helpers.php');

  if (get_the_current_user()) {
    UserMessage::set_message('success', 'You are logged in.');
  } else {
    UserMessage::set_message('error', 'You are not logged in.');
  }
  
  $links = get_all_links();
?>

<?php require('partials/header.php') ?>

<section class="links">
  <?php if (count($links) == 0): ?>
    <p>No links found.</p>
  <?php else: ?>
    <ul>
      <?php foreach($links as $link): ?>
        <li>
          <a href="<?= $link['url'] ?>"><?= $link['title'] ?></a> submitted by <?= $link['username'] ?>
          <time title="<?= $link['created_at'] ?>" datetime="<?= $link['created_at'] ?>"><?= time_ago_in_words($link['created_at']) ?></time>.
        </li>
      <?php endforeach ?>
    </ul>
  <?php endif ?>
</section>

<?php require('partials/footer.php') ?>
