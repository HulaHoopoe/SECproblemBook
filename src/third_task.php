<?php

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
        Этап 3. Выявление потребностей стейкхолдеров
    </h1>
    <div id="timer">
        <i class="fa-regular fa-clock"></i>
        <ul type="none">
            <li hidden><span id="hours">00</span>:</li>
            <li><span id="minutes">15</span>:</li>
            <li><span id="seconds">00</span></li>
        </ul>
        <button id="timer-start">Start</button>
    </div>
    <h2 id="head"  style='display: none;'>
Выберите стейкхолдера для опроса
</h2>
    <div class="task">

        <div class="task-half" id='task1' style='display: none;'>
            <div class="clickable-container" id='1'>
                Руководство ГПН
            </div>
            <div class="clickable-container" id='2'>
                Проектная группа
            </div>
            <div class="clickable-container" id='3'>
                ГПН-Снабжение
            </div>
            <div class="clickable-container" id='4'>
                Поставщики/Подрядчики
            </div>
            <div class="clickable-container" id='5'>
                Местные
            </div>
            <div class="clickable-container" id='6'>
                Технадзор
            </div>
            <div class="clickable-container" id='7'>
                Государство
            </div>
        </div>
    </div>
    <div class="task">
        <div class="task-half" id='qs' style='display: none;'>
            <div class="question-container" id='q1'>
            Какие функции должны выполняться? 
            </div>
            <div class="question-container" id='q2'>
            Какие проблемы Вы предвидите?
            </div>
            <div class="question-container" id='q3'>
            Какие предъявляются требования?
            </div>
        </div>
    </div>
    <div class="task" id='stakeholderBtns' style='display: none;'>
        <div class="btn" id='nextStakeholder'>
            Опросить другого стейкхолдера
        </div>
    </div>
    <div class="task">
        <div class="task-half answer" id='a1q1' style='display: none;'>
            <h2>Ответ: Круглогодичная отгрузка двумя танкерами</h2>
        </div>
        <div class="task-half answer" id='a1q2' style='display: none;'>
            <h2>Ответ: Возможно, климат может как-то повлиять на проект</h2>
        </div>
        <div class="task-half answer" id='a1q3' style='display: none;'>
            <h2>Ответ: Работать он должен дней 350 в год точно, а объем танкера равен 50 тыс. т</h2>
        </div>
        <div class="task-half answer" id='a1q3alt' style='display: none;'>
            <h2>Ответ: Вывоз всей Ямальской продукции;
Запуск терминала до 2026 года;
Круглогодичная отгрузка;
Рентабельное решение;
</h2>
        </div>
        <div class="task-half answer" id='a2q1' style='display: none;'>
            <h2>Ответ: Нужно предусмотреть швартовку с терминалом и налив в танкеры</h2>
        </div>
        <div class="task-half answer" id='a2q3' style='display: none;'>
            <h2>Ответ: Мы уже прикинули, 2 танкера по 50 тыс.т нам будет достаточно</h2>
        </div>
        <div class="task-half answer" id='noAnswer' style='display: none;'>
            <h2>Ответ:-</h2>
        </div>
    </div>
    <div class="task" id='questionBtns' style='display: none;'>
        <div class="btn" id='additQuestion'>
            Задать уточняющий вопрос
        </div>
        <div class="btn" id='nextQuestion'>
        Следующий вопрос
        </div>
        </div>
    <input type="button" value="Перейти к следующему этапу" id="BTNOK" class='btn' onclick="location.href='/fourth_task.php';" ><br /><br />
    <br /><br />
    <div id="ERRMSG"></div>
</body>
<script type="text/javascript">

</script>
<script type="text/javascript" src="third_task.js"></script>
<script type="text/javascript" src="countdown_timer.js" defer></script>

</html>