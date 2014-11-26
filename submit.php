<?php require('partials/header.php') ?>

    <form action="submit.php" method="post">
        <fieldset>
            <h4>ReadThat Login</h4>
            <p>
              <input name="username" type="text" placeholder="User Name" />
            </p>
            <p>
              <input name="password" type="password" placeholder="Password"/>
            </p>
            <p class="right">
                <a href="register.php">Register New Account</a>
            </p>
            <p class="right">
                <input name="submit" value="login" type="submit">
            </p>
        </fieldset>
    </form>

<?php require('partials/footer.php') ?>
