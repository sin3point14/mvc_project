<?php
namespace Models;
class Home
{
    public static function getDB()
    {
        include __DIR__ . "/../../configs/credentials.php";
        return new \PDO("mysql:dbname=" . $db_connect['db_name'] . ";host=" . $db_connect['server'], $db_connect['username'], $db_connect['password']);
    }
    public static function setSessionVar($udata)
    {
        session_start();
        foreach ($udata as $key => $value) {
            $_SESSION[$key] = $value;
        }
        if($udata['username']=='admin')
            $_SESSION['admin']=1;
    }
    public static function ValidateUser($username, $pass)
    {
        $db            = self::getDB();
        $password_hash = hash("sha256", $pass);
        $user          = $db->prepare("Select * from users where username=:username and pass=:password");
        $data          = $user->execute(array(
            "username" => $username,
            "password" => $password_hash
        ));
        $row           = $user->fetch(\PDO::FETCH_ASSOC);
        if ($row) {
            Home::setSessionVar($row);
            return true;
        } else
            return false;
    }
    public static function AddUser($udata)
    {
        $db    = self::getDB();
        $check = $db->prepare("SELECT * from users WHERE username=:username");
        $check->execute(array(
            "username" => $udata["username"]
        ));
        if ($check->rowCount() != 0) {
            return "Username already taken, Please try again";return;
        }
        $check = $db->prepare("SELECT * from users WHERE display=:display");
        $check->execute(array(
            "display" => $udata["display"]
        ));
        if ($check->rowCount() != 0) {
            return "Display name already taken, Please try again";return;
        }
        $generateId = $db->query("SELECT MAX(uid)FROM users")->fetch();
        if($generateId)
        	$udata['uid']=$generateId[0]+1;
        else
        	$udata['uid']=1;
        $udata['pass'] = hash("sha256", $udata['pass']);
        $user          = $db->prepare("INSERT INTO users VALUES (:uid,     :username,     :pass,     :display,     :points)");
        $user->execute($udata);
        Home::setSessionVar($udata);
        return 'user';
    }
    
}
?>
