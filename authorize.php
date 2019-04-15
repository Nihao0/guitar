<?php
	//Имя пользователя и его пароль для аутентификации
	$username='rock';
	$password='roll';
	
	if(!isset($_SERVER['PHP_AUTH_USER']) || 
	!isset($_SERVER['PHP_AUTH_PW']) ||
	($_SERVER['PHP_AUTH_USER'] !=$username) ||
	($_SERVER['PHP_AUTH_PW'] !=$password)) {
	//Имя пользователя/пароль не действительный для отправки HTTP заголовков
	//подтверждающих аутентификацию
	header('HTTP/1.1401 Unauthorized');
	header('WWW-Authenticate:Basic realm="Guitar wars"');
	
	exit('<h2>Guitar wars h2> Sorry,you must enter username and password.');
	}
?>
