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
