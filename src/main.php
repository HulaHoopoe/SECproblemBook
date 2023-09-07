<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/db/example_database.php';

use \IMSGlobal\LTI;

$launch = LTI\LTI_Message_Launch::new(new Example_Database()) ->validate();


$ndx = file_get_contents("index.html");
echo $ndx;