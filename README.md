PHP ilə Mərkəzi Bankın günlük məzənnəsinin öyrənilməsi
Bu məqaləmdə Mərkəzi Bankın sayıtında təqdim olunan AZN məzənnələrini necə götürə bilərik onun haqqında qısa yazmaq istəyirəm.
Mərkəzi Bank tərəfindən təqdim olunan servis vasitəsi ilə bizə məzənnələri xml formada təqdim olunur. Məsələn bu günə olan məzzənəni öyrənmək üçün http://ift.tt/1NVybkB istifadə etmək olar. Bu keçid gündəlik ayın gününə və ilinə görə mütəmadi dəyişir sabahkı günün məzənnəsi 08.11.2015.xml formasında təqdim olunacaq. İndi biz PHP istifadə edərək bu xml fayldan gündəlik necə məlumat ala bilərik onu tərtib edək.
İlk əvvəl keçidi necə günlərə uyğunlaşdıraq bu məsələyə baxa. Bunun üçün PHP date funskiyasından istifadə edəcəyik.
<?php 
echo date('d.m.Y');
?>
Bu funksiyanın nəticəsinə baxdıqda bizə 07.11.2015 tarixini verdiyini görürük.
İni isə bunu keçidimizə tətbiq edərək tərtib edək.
<?php
$url = 'http://ift.tt/1vwevhT'.date('d.m.Y') . '.xml';
?>
Indi isə bu keçidin bizə hansı formada valyuta məlumatı verdiyinə baxaq.
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
Bunun üçün DOMDocument sinifindən (class) istifadə edəcəyik. İndi biz bu xml faylını necə müraciət edəcəyik ona baxaq.
<?php 
$url = 'http://ift.tt/1vwevhT'.date('d.m.Y') . '.xml';
$doc = new \DOMDocument();
$doc->load($url); 
?>
DOMDocument load funskiyası vasitəsi ilə xml faylımızı oxuyuruq. Biz yuxarıda göstərdiyimiz xml-in Valute elementinə Code atributu vasitəsi ilə alınmasını aşağıdakı formada tərtib edirik.
<?php 
$url = 'http://ift.tt/1vwevhT'.date('d.m.Y') . '.xml';
$doc = new \DOMDocument();
$doc->load($url); 
$items = $doc->getElementsByTagName('Valute'); 
for ($i = 0; $i < $items->length; $i++) {
$el = $items->item($i);
switch ($el->getAttribute('Code')) {
case 'USD':
echo 'USD-'.$el->getElementsByTagName("Value")->item(0)->nodeValue;
break;
case 'RUB':
echo 'RUB-'.$el->getElementsByTagName("Value")->item(0)->nodeValue;
break;
}
}
?>
For dövrü vasitəsi ilə bütün Valute elemtlərinin sayı qədər dövr elətdirərək hər birinin atributu USD və RUB uyğun olanların Value dəyərini oxuyaraq ekrana yazdırırıq.
Bununlada məqaləmizin sonuna gəldin diqqətiniz üçün təşəkkürlər.
