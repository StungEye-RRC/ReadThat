<?php

$I = new AcceptanceTester($scenario);
$I->am('New User');
$I->wantTo('register for a new account but password confirmation does not match.');
$I->amOnPage('register.php');
$I->see('ReadThat Registration');
$I->fillField('username', 'ghoster');
$I->fillField('password', 'password');
$I->fillField('password_confirmation', 'incorrect_password');
$I->click('register');
$I->see('Sorry your password confirmation did not match your password.');

?>