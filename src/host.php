<?php
require_once __DIR__ . '/db/example_database.php';
require_once __DIR__ . '/vendor/autoload.php';

use \IMSGlobal\LTI;

LTI\LTI_OIDC_Login::new(new Example_Database())
    ->do_oidc_login_redirect(TOOL_HOST . "/main.php")
    ->do_redirect();
