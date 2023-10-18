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
    <script type="text/javascript" src="jquery.js"></script>
    
</head>
<?php
if ($launch->is_deep_link_launch()) {
    ?>
    <div class="dl-config">
        <h1>Pick a Difficulty</h1>
        <ul>
            <li><a href="<?= TOOL_HOST ?>/configure.php?diff=easy&launch_id=<?= $launch->get_launch_id(); ?>">Case 1</a></li>
            <li><a href="<?= TOOL_HOST ?>/configure.php?diff=normal&launch_id=<?= $launch->get_launch_id(); ?>">Case 2</a></li>
            <li><a href="<?= TOOL_HOST ?>/configure.php?diff=hard&launch_id=<?= $launch->get_launch_id(); ?>">Case 3</a></li>
        </ul>
    </div>
    <?php
    die;
}
?>
<body>
<div class="INFO">
    <div style="width: 100%"><? echo $launch->get_launch_data()['name']; ?>
        <br>
        <? echo $launch->get_launch_data()['email']; ?>
    </div>
</div>
<h4>
    Ранжирование стейкхолдеров по приоритету
</h4>
<img src="img/matrix.jpg">
<div class="task">
    <div class="draggable-container start-pos">
        <p class="shallow-draggable" draggable="true">Руководство ГПН</p>
        <p class="shallow-draggable" draggable="true">Проектная группа</p>
        <p class="shallow-draggable" draggable="true">ГПН-Снабжение</p>
        <p class="shallow-draggable" draggable="true">Поставщики/Подрядчики</p>
        <p class="shallow-draggable" draggable="true">Местные</p>
        <p class="shallow-draggable" draggable="true">Технадзор</p>
        <p class="shallow-draggable" draggable="true">Государство</p>
    </div>

    <div class="task-half">
        <div class="draggable-container">
            <h1 class="title">1</h1>
        </div>
        <div class="draggable-container">
            <h1 class="title">2</h1>

        </div>
        <div class="draggable-container">
            <h1 class="title">3</h1>
        </div>
        <div class="draggable-container">
            <h1 class="title">4</h1>
        </div>
    </div>

</div>
<input type="button" value="Перейти к следующему этапу" id="BTNOK" class='btn' 
onclick="location.href='/second_task.php';"><br/><br/>
<input type="button" value="Save" id="BTNSAVE" onclick='submitScore()'>
<br/><br/>
<div id="ERRMSG"></div>
<script>
    var curr_user_name = "<?= $launch->get_launch_data()['name']; ?>";
    var launch_id = "<?= $launch->get_launch_id(); ?>";
</script>
<script type="text/javascript" src="main_alt.js"></script>
</body>

</html>