<?php
require_once('authorize.php';
?>


<?php
 require_once('appvars.php');
  require_once('connectvars.php');

  if (isset($_GET['id']) && isset($_GET['date']) && isset($_GET['name']) && isset($_GET['score'])) {
    // Grab the score data from the GET
    $id = $_GET['id'];
    $date = $_GET['date'];
    $name = $_GET['name'];
    $score = $_GET['score'];   
  }
  else if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['score'])) {
    // Grab the score data from the POST
    $id = $_POST['id'];
    $name = $_POST['name'];
    $score = $_POST['score'];
  }
  else {
    echo '<p class="error">Sorry, no high score was specified for removal.</p>';
  }

  if (isset($_POST['submit'])) {
    if ($_POST['confirm'] == 'Yes') {
     
    // Connect to the database
     $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

      // Санкционирование рейтинга путем установки значения 1
	  //для колонки approved таблицы guitarwars
    $query = "UPDATE guitarwars SET approved = 1 WHERE id ='$id'";
    mysqli_query($dbc, $query);
    mysqli_close($dbc);
	
	
	
	//Вывод на экран пользователя подтверджения об успешном санкционировании
	echo '<p>Score ' . $score . ' for user ' . $name . 'sucessfully moderated';
	}
	else {
		echo'<p class="error"> Troubles with moderated score.</p>';
	}
  }
	
	echo '<p><a href="admin.php">&lt;&lt; Back to score list </a></p>';
?>