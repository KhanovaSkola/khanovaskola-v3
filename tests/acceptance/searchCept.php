<?php

$I = new WebGuy($scenario);
$I->wantTo('search by stem');
$I->amOnPage('/search/results?query=ucourany+nohy');
$I->see('nohy ucourané');
