<?php

$I = new WebGuy($scenario);
$I->wantTo('login with Facebook');
$I->logInToFacebook('franta_tuzmedz_uzivatel@tfbnw.net', 'dummypass');

$I->amOnPage('/auth/in');
$I->click('#login-facebook');

$I->see('Vítejte', '.alert');
$I->see('Franto', '.alert');
