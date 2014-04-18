<?php

$I = new WebGuy($scenario);
$I->wantTo('see brambory');
$I->amOnPage('/');
$I->see('brambory');
