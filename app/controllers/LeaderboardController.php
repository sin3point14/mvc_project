<?php

    namespace Controllers;
    use Models\Leaderboard;
    use Models\Navbar;
    class LeaderboardController
    {

        protected $twig ;

        public function __construct()
        {
            $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../views') ;
            $this->twig = new \Twig_Environment($loader) ;
        }
        public function get(){
            session_start();
if(!(isset($_SESSION['uid']))){
  header("Location: /");
}
        echo $this->twig->render("leaderboard.html", array(
                    "navbar" => Navbar::NavbarData(),"leaderboardlist" => Leaderboard::LeaderboardList(),"currentuser" => $_SESSION['display'])) ;
        }


}