<?php
require_once __DIR__ . '/../vendor/autoload.php';
//print_r($_SERVER);
define("TOOL_HOST", ($_SERVER['HTTP_X_FORWARDED_PROTO'] ?: $_SERVER['REQUEST_SCHEME']) . '://' . $_SERVER['HTTP_HOST']);
session_start();
use \IMSGlobal\LTI;

//$_SESSION['iss'] = [];
//$reg_configs = array_diff(scandir(__DIR__ . '/configs'), array('..', '.', '.DS_Store'));
//foreach ($reg_configs as $key => $reg_config) {
//    $_SESSION['iss'] = array_merge($_SESSION['iss'], json_decode(file_get_contents(__DIR__ . "/configs/$reg_config"), true));
//}

class Example_Database implements LTI\Database {
    private  $dbconn;

    public function __construct()
    {

        $this->dbconn = mysqli_connect('localhost', 'sosbrodovu', 'MQ!34ZKSv1cH65CH', 'sosbrodovu') or
        die("Could not connect : " . mysqli_error($this->dbconn));
    }

    public function find_registration_by_issuer($iss) {

        $result = mysqli_query($this->dbconn, "SELECT * FROM lti_registration WHERE issuer = '" .$iss. "' LIMIT 1");

        if (!$result){
            return false;
        }

        $registration = mysqli_fetch_assoc($result);

        if (empty($registration)) {
            return false;
        }

        $key_result = mysqli_query($this->dbconn, "SELECT * FROM lti_key WHERE key_set_id = '" .$registration['key_set_id']. "' LIMIT 1");

        if (!$key_result) {
            return false;
        }


        $key = mysqli_fetch_assoc($key_result);

        if (empty($key)){
            return false;
        }


        return LTI\LTI_Registration::new()
            ->set_issuer($registration['issuer'])
            ->set_client_id($registration['client_id'])
            ->set_auth_login_url($registration['platform_login_auth_endpoint'])
            ->set_auth_token_url($registration['platform_service_auth_endpoint'])
            ->set_key_set_url($registration['platform_JWKS_endpoint'])
            ->set_auth_server($registration['platform_auth_provider'])
            ->set_kid($key['id'])
            ->set_tool_private_key($key['private_key']);
    }

    public function find_deployment($iss, $deployment_id) {
        $result = mysqli_query($this->dbconn, "SELECT d.deployment_id FROM lti_deployment d JOIN lti_registration r ON (d.registration_id = r.id) WHERE r.issuer = '" . $iss . "' AND d.deployment_id = '".$deployment_id."' LIMIT 1");

        if (!$result) {
            return false;
        }

        $deployment = mysqli_fetch_assoc($result);

        if (empty($deployment)){
            return false;
        }

        return LTI\LTI_Deployment::new()
            ->set_deployment_id($deployment['deployment_id']);
    }

    public function get_keys_is_set($key_set_id){
        $key_result = mysqli_query($this->dbconn, "SELECT * FROM lti_key WHERE key_set_id = '" . $key_set_id . "'");

        if (!$key_result) {
            return [];
        }

        $keys = [];
        while ($key = mysqli_fetch_assoc($key_result)) {
            $keys[$key['id']] = $key['private_key'];
        }
        return $keys;
    }
}
?>