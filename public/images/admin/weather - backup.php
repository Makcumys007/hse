<?php 
include 'simple_html_dom.php';

date_default_timezone_set("Asia/Almaty");

$current_date = date('d/m/Y');


$link = "https://www.gismeteo.kz/weather-bozshakol-327361/now/";

$temperature = 0;

$wind = 0;

$humidity = 0;

$html = file_get_html($link);

$temperature = $html->find('span[class="unit unit_temperature_c"]',0);

$wind = $html->find('div[class="unit unit_wind_m_s"]',0)->innertext;

$index = strpos($wind, "м/c");

$wind = substr($wind, 0, $index);

$humidity = $html->find('div[class="now-info-item humidity"]', 0)->plaintext;

$humidity = substr($humidity, strlen("Влажность"));

$now_desc = $html->find('div[class="now-desc"]',0)->plaintext;

$desc_icon = "";

switch ($now_desc) {
	case "Малооблачно, без осадков":
		$desc_icon = "icons8-partly-cloudy-day-80.png";
		break;
	case "Малооблачно, небольшой дождь":
		$desc_icon = "icons8-rain-cloud-80.png";
		break;
	case "Пасмурно, небольшой дождь":
		$desc_icon = "icons8-rain-cloud-80.png";
		break;
	case "Малооблачно, дождь":
		$desc_icon = "icons8-rain-cloud-80.png";
		break;
	case "Пасмурно, дождь":
		$desc_icon = "icons8-rain-80.png";
		break;
	case "Облачно, небольшой дождь":
		$desc_icon = "icons8-rain-cloud-80.png";
		break;
	case "Облачно, без осадков":
		$desc_icon = "icons8-partly-cloudy-day-80.png";
		break;
	case "Пасмурно, без осадков":
		$desc_icon = "icons8-heavy-norain-80.png";
		break;	
	case "Пасмурно, снег":
		$desc_icon = "icons8-snow-storm-80.png";
		break;	
	case "Ясно":
		$desc_icon = "icons8-summer-80.png";
		break;
	case "Безоблачно":
		$desc_icon = "icons8-summer-80.png";
		break;
	default:
		// code...
		break;
}

?>