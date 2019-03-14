<?php

    namespace Controllers;
    use Models\Admin;
    use Models\Navbar;
    class AdminController
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
if(!(isset($_SESSION['admin']))){
  header("Location: /user");
}

                echo $this->twig->render("admin.html", array(
                    "navbar" => Navbar::NavbarData(), "qid" => Admin::GetNextQid())) ;
        }
        public function post()
        {
                session_start();
if(!(isset($_SESSION['uid']))){
  header("Location /");
  exit(0);
}
            if(empty($_POST['title'])||(empty($_POST['n']))||(empty($_POST['p']))||(empty($_POST['o']))||(empty($_POST['o1']))||(empty($_POST['o2']))||(empty($_POST['o3']))||(empty($_POST['o4'])))
                echo "One or more fields empty";
            else{
                Admin::AddQuestion($_POST['title'],$_POST['n'],$_POST['p'],$_POST['o'],$_POST['o1'],$_POST['o2'],$_POST['o3'],$_POST['o4']);
            }
        }
    }
?> 