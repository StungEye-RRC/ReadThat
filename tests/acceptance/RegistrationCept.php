<?php

$I = new AcceptanceTester($scenario);
$I->am('New User');
$I->wantTo('register for a new account but password confirmation does not match.');
$I->amOnPage('register.php');
$I->see('ReadThat Registration');
$I->fillField('username', 'newuser');
$I->fillField('password', 'password');
$I->fillField('password_confirmation', 'password');
$I->click('register');
$I->see('Registration Successful');

?>