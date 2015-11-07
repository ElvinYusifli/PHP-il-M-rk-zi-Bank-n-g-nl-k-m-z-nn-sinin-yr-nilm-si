### PHP ilə Mərkəzi Bankın günlük məzənnəsinin öyrənilməsi
Mərkəzi Bankın sayıtında təqdim olunan AZN məzənnələrini götürülməsi.

http://www.cbar.az/currencies/07.11.2015.xml

Bu keçidin bizə hansı formada valyuta məlumatı verdiyinə baxaq.
<Valute Code="IDR">
<Nominal>100</Nominal>
<Name>İndoneziya rupiası</Name>
<Value>0.0077</Value>
</Valute>
<Valute Code="TJS">
<Nominal>1</Nominal>
<Name>Tacik somonisi</Name>
<Value>0.1585</Value>
</Valute>
Bizə lazımdır ki Valute elementinin Code atributuna görə Value dəyərlərin götürək.
Bunun üçün DOMDocument sinifindən (class) istifadə edəcəyik.
