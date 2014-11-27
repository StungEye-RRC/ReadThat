<?php

$I = new AcceptanceTester($scenario);
$I->am('Existing User');
$I->wantTo('login using correct username and password.');
$I->amOnPage('login.php');
$I->see('ReadThat Login');
$I->fillField('username', 'ghoster');
$I->fillField('password', 'password');
$I->click('login');
$I->see('You are logged in.');

?>