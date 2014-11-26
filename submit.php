<?php
  require('includes/database.php');
  require('includes/user_message.php');
  require('includes/user_helpers.php');

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
