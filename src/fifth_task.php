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
        Этап 5. Выбрать оптимальный вариант исполнения
    </h1>
    <h2>
		Необходимо выбрать наиболее подходящий вариант для удовлетворения потребностей Заказчика
</h2>
    <table>
			<tr>
				<th>Поставщики</th>
				<th>Наличие шт.</th>
				<th>Работоспособность мес.</th>
				<th>Страна производитель</th>
				<th>Время изготовления мес.</th>
				<th>Стоимость транспортировки р.</th>
				<th>Стоимость р.</th>
				<th>Диапазон объема танкера</th>
			</tr>
			<tr>
				<td>Поставщик 1</td>
				<td>1</td>
				<td>10</td>
				<td>Россия</td>
				<td>5</td>
				<td>90000</td>
				<td>1500000</td>
				<td>15000-35000</td>
			</tr>
			<tr>
				<td>Поставщик 2</td>
				<td>3</td>
				<td>10</td>
				<td>США</td>
				<td>7</td>
				<td>60000</td>
				<td>900000</td>
				<td>15000-35000</td>
			</tr>
			<tr>
				<td>Поставщик 3</td>
				<td>1</td>
				<td>12</td>
				<td>США</td>
				<td>3</td>
				<td>70000</td>
				<td>1800000</td>
				<td>15000-35000</td>
			</tr>
			<tr>
				<td>Поставщик 4</td>
				<td>2</td>
				<td>12</td>
				<td>Россия</td>
				<td>5</td>
				<td>800000</td>
				<td>20000000</td>
				<td>10000-60000</td>
			</tr>
			<tr>
				<td>Поставщик 5</td>
				<td>5</td>
				<td>10</td>
				<td>Россия</td>
				<td>3</td>
				<td>1000000</td>
				<td>24000000</td>
				<td>60000-80000</td>
			</tr>
		</table>

    <input type="button" value="Получить результаты" id="BTNOK" class='btn' onclick="location.href='/congratulations.php';" ><br /><br />
    <br /><br />
    <div id="ERRMSG"></div>
</body>
<script type="text/javascript">

</script>
<script type="text/javascript" src="fifth_task.js"></script>
</html>