<?php

class Tools{
	static function connect ($host, $user, $pass, $dbname)
	{
		$dsn='mysql:host='.$host.';dbname='.$dbname.';charset=utf8;';
		$options=array(
			PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
			// сообщить об ошибке
			PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
			// Когда мы получем масив он будет Асоциативный
			PDO::MYSQL_ATTR_INIT_COMMAND=>'set names utf8');
	
		$pdo=new PDO($dsn,$user,$pass,$options);
		return $pdo;
	}
	static function createTable ($query){
		$pdo=Tools::connect('localhost','root','123456','08948shop');
		$pdo->query($query);
	}
}


?>

