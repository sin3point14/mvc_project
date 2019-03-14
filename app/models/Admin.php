<?php
namespace Models;
class Admin

    {
    public static

    function getDB()
        {
        include __DIR__ . "/../../configs/credentials.php";

        return new \PDO("mysql:dbname=" . $db_connect['db_name'] . ";host=" . $db_connect['server'], $db_connect['username'], $db_connect['password']);
        }

    public static

    function AddQuestion($title,$q,$points, $answer,$o1,$o2,$o3,$o4)
        {
            $db            = self::getDB();
            $query=$db->query("insert into ques (title,q,o1,o2,o3,o4,answer,points) values ('$title','$q','$o1','$o2','$o3','$o4',$answer,$points)");
            echo "Question has been added!";

       
        }
    public static

    function GetNextQid(){
        $db            = self::getDB();
        $query=$db->query("SELECT MAX(qid) from ques")->fetch();
        return $query[0]+1;
    }
}
?>