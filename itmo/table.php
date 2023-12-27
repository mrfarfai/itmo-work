<?php
	session_start();
	include "db.php";

	$q = mysqli_query($conn, "SELECT * FROM `zayavka`;");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<a href="zayavka.php">Подать заявку</a>
	<table border="1">
		<tr>
		   <th>ФИО</th>
		   <th>Название организации (ВУЗа)</th>
		   <th>Название доклада</th>
		   <th>Соавторы</th>
		   <th>Научный руководитель</th>
		   <th>Конференция</th>
		   <th>Направление конференции</th>
		   <th>Язык выступления</th>
		   <th>Тезисы доклада</th>
		   <th>Статья</th>
		   <th>Дата и время заявки</th>
		</tr>
		<?php 
			if(mysqli_num_rows($q) > 0) {
				while($row = mysqli_fetch_assoc($q)) {
					echo '
					<tr>
					    <td>'. $row["fio"] .'</td>
					    <td>'. $row["university"] .'</td>
					    <td>'. $row["doclad_name"] .'</td>
					    <td>'. $row["soavtor"] .'</td>
					    <td>'. $row["rukovoditel"] .'</td>
					    <td>'. $row["conf"] .'</td>
					    <td>'. $row["conf_napr"] .'</td>
					    <td>'. $row["language"] .'</td>
					    <td><a href="'.$row["tezis_doclad"] . '" download>Скачать</a></td>
					    <td>';
					    echo ($row["statya"]) ?
					    '<a href="'.$row["statya"] . '" download>Скачать</a>' : '';
					    echo '</td>
					    <td>'. $row["reg_date"] .'</td>
					</tr>';
				}
			}
		?>
	</table>
</body>
</html>