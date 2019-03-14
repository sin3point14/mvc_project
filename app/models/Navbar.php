<?php
namespace Models;
class Navbar
{
    public static function getDB()
    {
        include __DIR__ . "/../../configs/credentials.php";
        return new \PDO("mysql:dbname=" . $db_connect['db_name'] . ";host=" . $db_connect['server'], $db_connect['username'], $db_connect['password']);
    }
    public static function NavbarData()
    {
        $db            = self::getDB();
        $query = $db->query("SELECT * FROM users WHERE uid = '".$_SESSION['uid']."'")->fetch();
        if(isset($_SESSION['admin'])==1)
            $admin=1;
        else
            $admin=0;
        return array($query[3],$query[1],$query[4],$admin);
    }
}
?>