<?php

$I = new WebGuy($scenario);
$I->wantTo('search by stem');
$I->amOnPage('/homepage/search?query=sčítání%20funkce');
$I->see('Sčítání funkcí');
