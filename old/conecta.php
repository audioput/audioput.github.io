<?php 

require_once "env.php";
//incorpora a variavel env que define se está em ambiente de produção ou desenvolvimento
// No servidor sempre carregar o arquivo env com a variavel trocada para "prod"
// na maquina local deixar o mesmo arquivo com a variavel definida como "dev"



if ($env=="dev") {
	$user="root";
	$pass="";
	$dbname="audioput";
	$url_serv="http://localhost/sites/audioput/";
}


if ($env=="prod") {
	$user="100324";
	$pass="qwerup0897";
	$dbname="100324";
	$url_serv="http://audioputaria.orgfree.com/";
}



// Para facilitar o acesso ao banco de dados este projeto utiliza o framework Medoo 
// https://medoo.in/api/
require_once 'medoo.php';

// Initialize
$database = new medoo([
	'database_type' => 'mysql',
	'database_name' => $dbname,
	'server' => 'localhost',
	'username' => $user,
	'password' => $pass,
	'charset' => 'utf8'
	]);

	?>