<?php
  require('includes/includes.php');

  $links = get_all_links();
?>

<?php require('partials/header.php') ?>

<?php if (count($links) == 0): ?>
  <p class="links">No links found.</p>
<?php else: ?>
  <ul class="links">
    <?php foreach($links as $link): ?>
      <li>
        <p class="title">
          <a href="<?= $link['url'] ?>"><?= $link['title'] ?></a>
        </p>
        <p class="tagline">
          Submitted <time title="<?= $link['created_at'] ?>" datetime="<?= $link['created_at'] ?>"><?= time_ago_in_words($link['created_at']) ?></time>
          by <?= $link['username'] ?>.
        </p>
      </li>
    <?php endforeach ?>
  </ul>
<?php endif ?>

<?php require('partials/footer.php') ?>
