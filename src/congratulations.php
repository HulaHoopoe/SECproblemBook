<?php
require_once __DIR__ . '/lti/lti.php';
require_once __DIR__ . '/db/example_database.php';

use \IMSGlobal\LTI;

$launch = LTI\LTI_Message_Launch::new(new Example_Database())->validate();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Кейс 1</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
    <h1>
        Поздравляем с выполнением кейса
    </h1>
    <input type="button" value="Завершить" id="BTNOK" class='btn'><br /><br />
    <br /><br />
    <div id="ERRMSG"></div>
</body>
<script type="text/javascript">

</script>
<script type="text/javascript" src="fourth_task.js"></script>
</html>
