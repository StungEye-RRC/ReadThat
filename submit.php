<?php
  require('includes/database.php');
  require('includes/user_message.php');
  require('includes/user_helpers.php');
  require('includes/link_helpers.php');
  
  $user = get_the_current_user();
  
  if (!$user) {
    redirect_to('login.php');
  }
  
  if ($_POST) {
    $title = $_POST['title'];
    $url   = $_POST['url'];
    if (add_link_from_user($title, $url, $user)) {
      UserMessage::set_message('success', 'Link Added. Thanks!');
    } else {
      UserMessage::set_message('error', 'Sorry, could not add that link.');
    }
  }

?>
<?php require('partials/header.php') ?>

<form action="submit.php" method="post">
    <fieldset>
        <h4>ReadThat Submission</h4>
        <p>
          <input name="title" type="text" placeholder="Link Title" />
        </p>
        <p>
          <input name="url" type="text" placeholder="http://somedomain.com/some_path/"/>
        </p>
        <p class="right">
            <input name="submit" value="submit" type="submit">
        </p>
    </fieldset>
</form>

<?php require('partials/footer.php') ?>
