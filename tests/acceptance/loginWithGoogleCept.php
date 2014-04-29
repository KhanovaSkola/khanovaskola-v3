<?php

$I = new WebGuy($scenario);
$I->wantTo('login with Google');
$I->logInToGoogle('acceptance.test.001@gmail.com', 'dummypass');

$I->amOnPage('/auth/in');
$I->click('#login-google');

$I->see('Vítejte', '.alert');
$I->see('Franto', '.alert');
