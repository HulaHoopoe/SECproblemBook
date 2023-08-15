<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/db/example_database.php';
use \IMSGlobal\LTI;

//$dbhost = "localhost";
//$dblogin = "root";
//$dbpassword = "root";
//$dbname = 'lti_example';
//$dbase = mysqli_connect($dbhost, $dblogin, $dbpassword) or
//die("Could not connect : " . mysqli_error($dbase));
//mysqli_select_db($dbase, $dbname) or
//die("Could not select database " . mysqli_error($dbase));

LTI\LTI_OIDC_Login::new(new Example_Database())
    ->do_oidc_login_redirect(TOOL_HOST . "/main.php")
    ->do_redirect();
