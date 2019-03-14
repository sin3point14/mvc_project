<?php

	namespace Controllers;
	use Models\Login;
	class LoginController{
		protected $twig ;
            
        public function __construct()
	    {
    	    $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../views') ;
            $this->twig = new \Twig_Environment($loader) ;
    	}

    	public function get(){
			echo $this->twig->render("login.html", array(
                    "title" => "LogIn")) ;
		}
		public function post(){
			$username = $_POST['username'];
			$password = $_POST['password'];
			if(Login::ValidateUser($username,$password)){
				header("Location /");
			}
			else {
				echo $this->twig->render("login.html", array("title" => "Login", "error" => "invalid username or password"));
			}
		}
	}
	

?>