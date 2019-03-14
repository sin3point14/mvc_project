<?php
namespace Models;
class Leaderboard

    {
    public static

    function getDB()
        {
        include __DIR__ . "/../../configs/credentials.php";

        return new \PDO("mysql:dbname=" . $db_connect['db_name'] . ";host=" . $db_connect['server'], $db_connect['username'], $db_connect['password']);
        }
    public static

    function LeaderboardList(){
        $db            = self::getDB();
        $query=$db->query("SELECT MAX(uid) from users")->fetch();
        if($query[0]<5) $c=$query[0];
else $c=5;
        $query=$db->prepare("SELECT display,points from users order by points desc limit 0, :c")->execute(array("c"=>$c))->fetchAll(\PDO::FETCH_ASSOC);
        return $query;
    }
}
?>