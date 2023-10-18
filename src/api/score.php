<?php
require_once __DIR__ . ('/../lti/lti.php');
require_once __DIR__ . '/../db/example_database.php';

use \IMSGlobal\LTI;
$launch = LTI\LTI_Message_Launch::from_cache($_REQUEST['launch_id'], new Example_Database());
if (!$launch->has_ags()) {
    throw new Exception("Don't have grades!");
}
$grades = $launch->get_ags();

$score = LTI\LTI_Grade::new()
    ->set_score_given($_REQUEST['score'])
    ->set_score_maximum(10)
    ->set_timestamp(date(DateTime::ISO8601))
    ->set_activity_progress('Completed')
    ->set_grading_progress('FullyGraded')
    ->set_user_id($launch->get_launch_data()['sub']);
$grades->put_grade($score);
echo '{"success" : true}';
?>