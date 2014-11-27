<?php

$I = new AcceptanceTester($scenario);
$I->am('Unregistered User');
$I->wantTo('submit a new link without logging in');
$I->amOnPage('submit.php');
$I->see('Sorry, you must be logged in to submit.');
