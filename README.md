### PHP ilə Mərkəzi Bankın günlük məzənnəsinin öyrənilməsi
Mərkəzi Bankın sayıtında təqdim olunan AZN məzənnələrini götürülməsi.

http://www.cbar.az/currencies/07.11.2015.xml

Bu keçidin bizə hansı formada valyuta məlumatı verdiyinə baxaq.


Bizə lazımdır ki Valute elementinin Code atributuna görə Value dəyərlərin götürək.
Bunun üçün DOMDocument sinifindən (class) istifadə edəcəyik.


### OOP Version - CBARCurrencies class

USAGE:

```
<?php

require('lib/CBARCurrencies.php');

$CBARObject = new CBARCurrencies();
print_r($CBARObject->USD());
```

