<?php

require_once 'src/facebook.php'; //Esto llama a la carpeta con el parse que nos descargamos antes

$app_id     = '304998852961792'; // Sustituimos las X por el ID de nuestra aplicación
$app_secret = '16555836fd51687a056c64c40a146cde'; // Sustituimos las X por el Secret de nuestra aplicación
$token = 'AAAEVZARRJpgABACxIBzhFWQVjRHOpMP6f1qZCyM0qhVwgB3AwBZCvj4BVdFPwdWsN9o7RFkbYapS9DmZAbtRkHIFPUq0Oh4bQAWZAfEGCL6UUwoAZBTuaHGPxtgLA5SVcZD'; // ponemos nuestro token

$facebook = new Facebook(array(
    'appId' => $app_id,
    'secret' => $app_secret,
    'cookie' => false
));
$req =  array(
    'access_token' => $token,
    'message' => '¡Hoy tuvimos muchos aciertos en La Casa de Datelli! ¿Qué esperas para entrar? Esta semana hay entrada libre... Aprovecha!',
	'name' => 'La Casa de Datelli - Semana Gratis',
    'link' => 'http://www.casadedatelli.com.ar/freepass.html',
    'description' => 'Accede a los contenidsos exclusivos que el Inge Datelli tiene para vos! La famosa lamina verde, el Oraculo Semanal y Oraculo de Oro y notas exclusivas diarias.',
    'picture' => 'http://img850.imageshack.us/img850/161/casitab.jpg');

$res = $facebook->api('/135292683221744/feed', 'POST', $req);

?>