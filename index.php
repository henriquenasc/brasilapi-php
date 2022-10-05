<?php

require __DIR__.'/vendor/autoload.php';

use BrasilApi\BrasilApiPhp\BrasilApiPhp;

$brasilapi = new BrasilApiPhp();
$brasilapi->getCnpj('22650561000179');