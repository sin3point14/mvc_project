<?php

    namespace Controllers;
    use Models\User;
    use Models\Navbar;
    class UserController
    {

        protected $twig ;

        public function __construct()
        {
            $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../views') ;
            $this->twig = new \Twig_Environment($loader) ;
        }

        public function get()
        {
                session_start();
if(!(isset($_SESSION['uid']))){
  header("Location: /");
}
                echo $this->twig->render("user.html", array(
                    "navbar" => Navbar::NavbarData(),"attempts" => User::AttemptsData(),"latestQuestions" => User::LatestQuestionsData()/*, "points" => User::UserPoints()*/)) ;
        }
    }
?> 