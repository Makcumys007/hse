
<?php 
include 'simple_html_dom.php';

date_default_timezone_set("Asia/Almaty");

$current_date = date('d/m/Y');


$link = "https://www.gismeteo.kz/weather-bozshakol-327361/now/";

$temperature = 0;

$wind = 0;

$humidity = 0;

$html = file_get_html($link);



$temperature = $html->find('temperature-value',0)->getAttribute('value');

$wind = $html->find('speed-value',0)->getAttribute('value');





?>

