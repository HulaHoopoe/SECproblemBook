<?php
require_once __DIR__ . ('/lti/lti.php');
require_once __DIR__ . '/db/example_database.php';

use \IMSGlobal\LTI;

$database = new Example_Database();


LTI\JWKS_Endpoint::new($database->get_keys_in_set('3b204b08-a5b7-4724-8b4c-426c7515c817'))->output_jwks();

?>