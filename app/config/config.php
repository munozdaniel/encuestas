<?php

defined('APP_PATH') || define('APP_PATH', realpath('.'));

return new \Phalcon\Config(array(
    'database' => array(
        'adapter'     => 'Mysql',
        'host'        => '192.168.42.14',
        'username'    => 'root',
        'password'    => 'infoimps',
        'dbname'      => 'encuesta',
        'charset'     => 'utf8',
    ),
    'gestionusuarios' => array(
        'adapter'     => 'Mysql',
        'host'        => '192.168.42.14',
        'username'    => 'root',
        'password'    => 'infoimps',
        'dbname'      => 'gestionusuarios',
        'charset'     => 'utf8',
    ),
    'application' => array(
        'controllersDir' => APP_PATH . '/app/controllers/',
        'modelsDir'      => APP_PATH . '/app/models/',
        'migrationsDir'  => APP_PATH . '/app/migrations/',
        'viewsDir'       => APP_PATH . '/app/views/',
        'pluginsDir'     => APP_PATH . '/app/plugins/',
        'libraryDir'     => APP_PATH . '/app/library/',
        'cacheDir'       => APP_PATH . '/app/cache/',
        'formsDir'       => APP_PATH . '/app/forms/',
        'baseUri'        => '/encuestas/',
    ),
    "recaptcha" => array(
        'publicKey' => '6LfhrgwTAAAAAAElQ1S7BJOvjFCHPQvKMxP3WO6e',
        'secretKey' => '6LfhrgwTAAAAAIjzQj9G4yCuJWBsAoPoF1bOyBau',
        'jsApiUrl' => 'https://www.google.com/recaptcha/api.js',
        'verifyUrl' => 'https://www.google.com/recaptcha/api/siteverify',
    ),
    'mail' => array(
        'host'     => 'mail.imps.org.ar',
        'username'        => 'plantilla@imps.org.ar',
        'password'    => 'dan$%&--iel',
        'security'    => '',
        'port'      => '26',
        'charset'     => 'UTF-8',
        'email'     => 'dmunioz@imps.org.ar',
        'name'     => 'dmunioz@imps.org.ar',
    )
    /*
     *  RECAPTCHA PARA EL SERVIDOR 75
     ,
    "recaptcha" => array(
        'publicKey' => '6LebYA0TAAAAAOIyncl_pHz7LcgKw_Bsrs6WzyO9',
        'secretKey' => '6LebYA0TAAAAAMPzGFDTJbd4LfPjoOCclIJupyWY',
        'jsApiUrl' => 'https://www.google.com/recaptcha/api.js',
        'verifyUrl' => 'https://www.google.com/recaptcha/api/siteverify',
    ),*/
));
