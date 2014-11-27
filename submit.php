<?php
  require('includes/includes.php');
  
  $user = get_the_current_user();
  
  if (!$user) {
    UserMessage::persist_message('error', 'Sorry, you must be logged in to submit.');
    redirect_to('login.php');
  }
  
  if ($_POST) {
    $title = $_POST['title'];
    $url   = $_POST['url'];
    
    if (strlen($title) == 0) {
      UserMessage::set_message('error', 'Sorry, the title cannot be blank.');
    } else if (strlen($url) == 0) {
      UserMessage::set_message('error', 'Sorry, the URL cannot be blank.');
    } else if (add_link_from_user($title, $url, $user)) {
      UserMessage::set_message('success', 'Link Added. Thanks!');
    } else {
      UserMessage::set_message('error', 'Sorry, could not add that link.');
    }
  }

?>
<?php require('partials/header.php') ?>

<form action="submit.php" method="post">
    <fieldset>
        <h1>ReadThat Submission</h1>
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
