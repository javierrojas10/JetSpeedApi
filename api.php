<?php

//Quita el comentario a estas dos líneas porsi tienes algún error y desplegarlos
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
require "vendor/autoload.php";

//Cargamos Guzzle
use GuzzleHttp\Client;
$client = new GuzzleHttp\Client();

//Link que tomamos del GET puede venir en http, https o no tener.
$link = $_GET['url'];
if (substr($link,0,4) != 'http') {
  $link = 'https://'.$_GET['url'];
}

$ApiKey = [TU_API_KEY_AQUI];

//URL con utf8 porque al parecer hay un problema con &(ampersand) y la url se expres como $amp; y la api de google no reconoce eso.
$url = utf8_encode('https://www.googleapis.com/pagespeedonline/v5/runPagespeed?key='.$ApiKey.'&url='.$link);


$response = $client->request('GET', $url);

//Errores
if($response->getStatusCode() != 200){
    $apiResponse = [
      'error' => true,
      'message' => 'Falta un parámetro requerido'
    ];
    echo json_encode($apiResponse);
}
else {

  //Si no hay errores, Obtenemos los contenidos
  $json = $response->getBody()->getContents();

  //Decodificamos el json para extraer variables
  $body = json_decode($json, true);

  //Variables desde el json de la API de Google
  $timetoInteractive = str_replace( chr( 194 ) . chr( 160 ), ' ',$body['lighthouseResult']['audits']['interactive']['displayValue']);
  $timetoPaint = str_replace( chr( 194 ) . chr( 160 ), ' ',$body['lighthouseResult']['audits']['first-contentful-paint']['displayValue']);
  $timetoInteractiveScore = $body['lighthouseResult']['audits']['interactive']['score'];
  $timetoPaintScore = $body['lighthouseResult']['audits']['first-contentful-paint']['score'];

  //Calculo de score basado en los score de tiempo para interacción y tiempo para pintado.
  $score = (($timetoInteractiveScore+$timetoPaintScore)/2)*100;

  //Creamos un nuevo json como respuesta
  $result = [
    'Interactive' => $timetoInteractive,
    'Paint' => $timetoPaint,
    'Score' => $score
  ];

  //Imprimimos
  echo json_encode($result);
}
 ?>
