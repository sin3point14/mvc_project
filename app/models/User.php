<?php
namespace Models;
class User
{
    public static function getDB()
    {
        include __DIR__ . "/../../configs/credentials.php";
        return new \PDO("mysql:dbname=" . $db_connect['db_name'] . ";host=" . $db_connect['server'], $db_connect['username'], $db_connect['password']);
    }
    public static function AttemptsData(){
        $db            = self::getDB();
        $query = $db->query("SELECT MAX(qid)FROM ques")->fetch();
        $max=$query[0];
        $q=array_fill(1,$max,"not_a");
        $query = $db->query("SELECT * FROM answered where uid=".$_SESSION['uid']." and status=1");
        for($i=1;$row=$query->fetch();$i++){
    $q[$row[1]]="correct";
}
        $query = $db->query("SELECT * FROM answered where uid=".$_SESSION['uid']." and status=0");
        for($i=1;$row=$query->fetch();$i++){
  $q[$row[1]]="incorrect";
}
    return $q;
    }
    public static function LatestQuestionsData(){
        $db            = self::getDB();
        $query= $db->query("SELECT qid,title FROM ques order by qid desc")->fetchAll(\PDO::FETCH_ASSOC);
        return $query;
   /* $latest=[[]];
    for($i=1;$i<=4;$i++){
    $row=$query->fetch();
    $latest[$i]['qno']=$row[0];
    $latest[$i]['qtext']=$row[1];
    }*/
}
   /* public static function UserPoints(){
        $query = $db->query("SELECT * FROM users WHERE uid = '".$_SESSION['uid']."'")->fetch();
        return $query[0];
    }*/
}
?>
