<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/db/example_database.php';

use \IMSGlobal\LTI;

$launch = LTI\LTI_Message_Launch::new(new Example_Database())->validate();

// $data = $launch->get_launch_data();

// foreach ($data as &$value) {
//     print_r($value);
// }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Кейс 1</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="main_alt.js" defer></script>
</head>
<body>
<div class="INFO">
    <div style="width: 100%"><? echo $launch->get_launch_data()['name']; ?>
        <br>
        <? echo $launch->get_launch_data()['email']; ?>
    </div>
    <div style="width: 100%">
        Ваша текущая оценка в Moodle:<span id="moodleScore">%score%</span>
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
<input type="button" value="Подтвердить" id="BTNOK"><br/><br/>
Оценка: <input type="text" readonly size="4" value="0" id="score">
<input type="button" value="Save" id="BTNSAVE">
<br/><br/>
<div id="ERRMSG"></div>
</body>
</html>