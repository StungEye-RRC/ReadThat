<?php

$I = new AcceptanceTester($scenario);
$I->am('Existing User');
$I->wantTo('login add submit a new link');
$I->amOnPage('login.php');
$I->see('ReadThat Login');
$I->fillField('username', 'ghoster');
$I->fillField('password', 'password');
$I->click('login');
$I->see('You are logged in.');
$I->click('Submit');
$I->fillField('title', 'New Title');
$I->fillField('url', 'http://domain.ca');
$I->click('submit');
$I->see('Link Added. Thanks!');

?>