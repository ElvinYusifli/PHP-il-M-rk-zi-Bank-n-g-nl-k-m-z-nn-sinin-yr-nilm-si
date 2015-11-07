<?php 
  $url = 'http://www.cbar.az/currencies/'.date('d.m.Y') . '.xml';
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
