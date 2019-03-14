<?php

	namespace Controllers;
	use Models\Signup;
	class SignupController{
		protected $twig ;
            
        public function __construct()
	    {
    	    $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../views') ;
            $this->twig = new \Twig_Environment($loader) ;
    	}

    	public function get(){
			echo $this->twig->render("signup.html", array(
                    "title" => "SignUp")) ;
		}
		public function post(){
			$username = $_POST['username'];
			$password = $_POST['password'];
			Signup::AddUser($username, $password);
			header("Location: /");
		}
	}
	

?>