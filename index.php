<?php
  require('includes/includes.php');

  $links = get_all_links();
?>

<?php require('partials/header.php') ?>

<section class="links">
  <?php if (count($links) == 0): ?>
    <p>No links found.</p>
  <?php else: ?>
    <h1>Top Links</h1>
    <ul>
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
</section>

<?php require('partials/footer.php') ?>
