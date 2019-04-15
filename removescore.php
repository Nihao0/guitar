<?php
require_once('authorize.php');
?>

<html xmln<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Guitar Wars - Add Your High Score</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
  <h2>Guitar Wars -  Deleting Score</h2>


<?php
	require_once('appvars.php');
	require_once('connectvars.php');
	
	if (isset($_GET['id']) && isset($_GET['date']) && isset($_GET['name']) &&
		isset($_GET['score']) && isset($_GET['screenshot'])) {
		//Извлечение данных рейтинга из суперглобального массива $_GET
		$id = $_GET['id'];
		$date = $_GET['date'];
		$name = $_GET['name'];
		$score = $_GET['score'];
		$screenshot = $_GET['screenshot'];
		
		}
	else if (isset($_POST['id']) && isset($_POST['date']) && isset($_POST['name']) && isset($_POST['score'])) {
	//Извлечение данных рейтинга из суперглобального массива $_POST
	$id = $_POST['id'];
	$name = $_POST['name'];
	$score = $_POST['score'];
	}
	else {
		echo '<p class="error">Sorry,no rating to delete.</p>';
	}
	if (isset($_POST['submit'])){
		if ($_POST['confirm'] == 'Yes'){
		//Удаление с сервера файла изображения 
		//подтверждающего рейтинг
		@unlink(GW_UPLOADPATH , $screenshot);
	
	//Соединение с базой данных
	$dbc = mysqli_connect(DB_HOST, DB_NAME, DB_PASSWORD, DB_NAME);
	//Удаление рейтинга из базы данных
	$query = "DELETE FROM guitarwars WHERE id = $id LIMIT 1";

	mysqli_query($dbc, $query);
	mysqli_close($dbc);
	//Вывод пользователю страницы подтверждения
	echo '<p>Score ' . $score . ' for user ' .
	 $name . ' been succesfully deleted from database.</p>';
	}
	else {
		echo '<p class="error"> Score not delete.</p>';
	}
}
else if (isset($id) && isset($date) && isset($name) &&
		isset($score) && isset ($screenshot)) {
echo '<p>Are you sure you want to remove this rating?</p>';
echo '<p><strong>Name: </strong>' . $name . '<br /><strong>Date: </strong>' . $date .
		'<br /><strong>Score: </strong>' . $score . '</p>';
echo '<form method="post" action="removescore.php">';
echo '<input type="radio" name="confirm value="Yes" /> Yes ';
echo '<input type="radio" name="confirm" value="No" checked="checked" /> No <br />';
echo '<input type="submit" value="Delete" name="submit" />';
echo '<input type="hidden" name="id" value="' . $id . '" />';
echo '<input type="hidden" name="id" value="' . $id . '" />';
echo '<input type="hidden" name="score" value="' . $score . '" />';
echo '</form>';
		}
		
echo '<p><a href="admin.php">&lt;&lt; Back to score list </a></p>';
		
?>

</body>
</html>
