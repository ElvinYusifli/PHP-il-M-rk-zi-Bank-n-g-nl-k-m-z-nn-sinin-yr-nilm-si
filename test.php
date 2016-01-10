<?php

require('lib/CBARCurrencies.php');

$CBARObject = new CBARCurrencies();
print_r($CBARObject->XAU());
print_r($CBARObject->USD());
