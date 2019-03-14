<?php

    namespace Controllers;
    use Models\Question;
    use Models\Navbar;
    class QuestionController
    {

        protected $twig ;

        public function __construct()
        {
            $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../views') ;
            $this->twig = new \Twig_Environment($loader) ;
        }

   /*     public function get()
        {
                session_start();
if(!(isset($_SESSION['uid']))){
  header("Location /");
}

                echo $this->twig->render("question.html", array(
                    "navbar" => Navbar::NavbarData(),"question" => Question::questionData())) ;
        }*/
        public function get($qid=NULL)
        {
if(!(isset($_SESSION['uid']))){
  header("Location: /");
}
                if($qid===NULL){
                    echo $this->twig->render("question.html", array(
                    "navbar" => Navbar::NavbarData(),"question" => Question::questionData())) ;
                }
                else{
                $e=Question::QidData($qid);
                if($e!='e'){
                echo $this->twig->render("ques.html", array(
                    "navbar" => Navbar::NavbarData(),"question" => $e)) ;
                }
                else{
                    echo "404 Page Not Found";
                }
            }
        }
        public function post()
        {
if(!(isset($_SESSION['uid']))){
  header("Location: /");
}
                $e=Question::CheckAnswer($_POST['qid'],$_POST['option']);
                if($e=='e')
                    echo "Aise kaise lol";
        }
    }
?> 