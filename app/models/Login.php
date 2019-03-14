<?php
namespace Models;
class Login{
	public static function getDB(){
		include __DIR__."/../../configs/credentials.php";
		return new \PDO("mysql:dbname=".$db_connect['db_name'].";host=".$db_connect['server'],$db_connect['username'],$db_connect['password']);
	}
	public static function ValidateUser($username, $password){
		$db=self::getDB();
		$password_hash=hash("sha256",$password);
		$user = $db->prepare("Select * from users where username=:username and password=:password");
		$data=$user->execute(array(
			"username" => $username,
			"password" => $password_hash
		));
		$row=$user->fetch(\PDO::FETCH_ASSOC);
		if($row){
		session_start(); $_SESSION['username']=$username; return true;}
		else return false;
	}
}
?>