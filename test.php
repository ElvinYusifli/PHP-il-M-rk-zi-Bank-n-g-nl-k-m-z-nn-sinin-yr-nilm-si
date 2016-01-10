<?php

require('lib/CBARCurrencies.php');

$CBARObject = new CBARCurrencies();

// listing supported currency codes
print_r($CBARObject->listing());

// getting data for xAURum
print_r($CBARObject->XAU());

// getting data for US Dollars
print_r($CBARObject->USD());
