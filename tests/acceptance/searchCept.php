<?php

$I = new WebGuy($scenario);
$I->wantTo('search by stem');
$I->amOnPage('/homepage/search?query=rovnice');
$I->see('O rovnicích bez rovnic');
