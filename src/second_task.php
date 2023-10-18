<?php

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Кейс 1</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="jquery.js"></script>
    
</head>
<body>
<h4>
Этап 2.  Выбор стратегии взаимодействия со стейкхолдерами
</h4>
<img src="img/matrix.jpg">
    
<div class="task">
    <div class="draggable-container start-pos">
        Стратегия взаимодействия
        <p class="shallow-draggable" draggable="true">Активно сотрудничаем</p>
        <p class="shallow-draggable" draggable="true">Информируем, согласуем ключевые этапы</p>
        <p class="shallow-draggable" draggable="true">Собираем данные, вовлекаем</p>
        <p class="shallow-draggable" draggable="true">Информируем</p>
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
onclick="location.href='/third_task.php';"><br/><br/>
<br/><br/>
<div id="ERRMSG"></div>
</body>
<script type="text/javascript">
    
</script>
<script type="text/javascript" src="main_alt.js" defer></script>
</html>