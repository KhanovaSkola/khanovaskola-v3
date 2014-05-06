<?php

$I = new WebGuy($scenario);
$I->wantTo('search by stem');
$I->amOnPage('/search/results?query=scitani+funkce');
$I->see('Sčítání funkcí');
