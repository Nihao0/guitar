<?php
require_once('authorize.php');
?>
<html xmln<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<?php
	require_once('appvars.php');
	require_once('connectvars.php');
	
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	
	//Извлечение данных из баз данных MYSQL
	$query = " SELECT * FROM guitarwars ORDER BY score DESC, date ASC";
	$data = mysqli_query($dbc, $query);


	//Извлечение данных из массива рейтингов в цикле
	//Форматирование данных записей в виде кода HTMl
	echo '<table>';
	while ($row = mysqli_fetch_array($data)) {
		//Вывод данных рейтинга
		echo '<tr class="scorerow"><td><strong>' . $row['name'] . '</strong></td>';
		echo '<td>' . $row['score'] . '</td>';
		echo '<td><a href="removescore.php?id=' . $row['id'] . '&amp;date=' . $row['date'] . 
				'&amp;name=' . $row ['name'] . '&amp;score=' . $row['score'] .
				'&amp;screenshot=' . $row['screenshot'] . '">Delete</a></td></tr>';
				
	}
	echo '</table>';
	
	mysqli_close($dbc);
?>

</html>
