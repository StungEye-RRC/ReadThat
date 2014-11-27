<?php

$I = new AcceptanceTester($scenario);
$I->am('New User');
$I->wantTo('register for a new account but username already exists.');
$I->amOnPage('register.php');
$I->see('ReadThat Registration');
$I->fillField('username', 'ghoster');
$I->fillField('password', 'password');
$I->fillField('password_confirmation', 'password');
$I->click('register');
$I->see('Sorry that username is already taken.');

?>