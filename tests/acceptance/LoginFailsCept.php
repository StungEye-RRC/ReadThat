<?php

$I = new AcceptanceTester($scenario);
$I->am('Existing User');
$I->wantTo('login using incorrect username and password.');
$I->amOnPage('login.php');
$I->see('ReadThat Login');
$I->fillField('username', 'ghoster');
$I->fillField('password', 'incorrect_password');
$I->click('login');
$I->see('Username or Password is incorrect.');

?>