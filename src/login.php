<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/db/example_database.php';

use \IMSGlobal\LTI;

//echo '<script>console.log("test2"); </script>';
//echo "<script>console.log('{$registration['key_set_id']}'); </script>";
LTI\LTI_OIDC_Login::new(new Example_Database())
    ->do_oidc_login_redirect(TOOL_HOST . "/main.php")
    ->do_redirect();