<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once __DIR__ . "/../vendor/autoload.php";
session_start();
error_reporting(-1);
Toro::serve(array(
	"/" =>  "Controllers\\HomeController",
	"/signup" => "Controllers\\SignupController",
	"/login" => "Controllers\\LoginController",
	"/user" => "Controllers\\UserController",
	"/question" => "Controllers\\QuestionController",
	"/question/:number" => "Controllers\\QuestionController",
	"/admin" => "Controllers\\AdminController",
	"/leaderboard" => "Controllers\\LeaderboardController"
));
?>
