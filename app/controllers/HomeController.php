<?php

    namespace Controllers;
    use Models\Home;
    class HomeController
    {

        protected $twig ;

        public function __construct()
        {
            $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../views') ;
            $this->twig = new \Twig_Environment($loader) ;
        }

        public function get()
        {
                echo $this->twig->render("home.html", array(
                    "title" => "Login/Signup")) ;
        }
        public function post(){
            if(isset($_POST['display'])){
                $data=array(
                    "username" => $_POST["username"], 
                    "pass" => $_POST["pass"], 
                    "display" => $_POST["display"], 
                    "points" => 0
                );
                echo Home::AddUser($data);
            }
            else{
                if(Home::ValidateUser($_POST['username'],$_POST['pass'])){
                    echo 'user';

                }
                else{
                    echo "Invalid";
                }
            }
        }
    }
?>