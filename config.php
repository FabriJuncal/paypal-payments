<?php

// 1. Carga automática del paquete SDK. Esto incluirá todos los archivos y clases del "autoload"
// Ejemplo basado en la instalacion con "composer" 
require  __DIR__  .'/vendor/autoload.php';
//En el caso que la instalación sea con la descarga directa:
// requiera __DIR__. '/PayPal-PHP-SDK/autoload.php';

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(       
        'AVMEhAAgxM_zT645alvu-MCWZrS0zd6pcA63vG0vb95l656tU_sLPRBgWUYwhs4zc7DZ71sUk1Kpu5qH', // ClientID
        'EG5sXzn2xhHm_geCyX-V_wZPuVik4FM79kXQsp-YBHxj4RYMYl_JmO-rudd-tpYzYMEYggV8jqkt0Ggw'  // ClientSecret
    )
);

var_dump($apiContext);