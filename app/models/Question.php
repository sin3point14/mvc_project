<?php
namespace Models;
class Question

    {
    public static

    function getDB()
        {
        include __DIR__ . "/../../configs/credentials.php";

        return new \PDO("mysql:dbname=" . $db_connect['db_name'] . ";host=" . $db_connect['server'], $db_connect['username'], $db_connect['password']);
        }

    public static

    function QuestionData()
        {
            $db            = self::getDB();
        $query = $db->query("SELECT qid,title from ques order by qid");
        $question = $query->fetchAll();
        // $i=0;
        // while ($row = $query->fetch())
        //     {
        //     $question[$i]['qno'] = $row[0];
        //     $question[$i]['qtext'] = $row[1];
        //     $i++;
        //     }

        return $question;
        }

    public static

    function QidData($qid)
        {
            $db            = self::getDB();
        $query = $db->query("SELECT * from ques where qid=$qid");
        if ($query) {
            $query=$query->fetch(\PDO::FETCH_ASSOC);
            return $query;
        }
          else return "e";
        }

    public static

    function CheckAnswer($qid, $option)
        {
            $db            = self::getDB();
        if (!($option <= 4 && $option > 0)) return "e";
        $query = $db->query("SELECT answer,points from ques where qid=$qid")->fetch(\PDO::FETCH_ASSOC);
        if ($query)
            {
            $test = $db->query("Select status from answered where qid=$qid and uid=".$_SESSION['uid'])->fetch();
            if (!$test)
                {
                if ($query['answer'] == $option)
                    {
                    $updateQuery = $db->query( "UPDATE users SET points = points + " . $query['points'] . " WHERE uid=" . $_SESSION['uid']);
                    $insertQuery = $db->query("INSERT INTO answered (uid,qid,points,status) values(" . $_SESSION['uid'] . ",$qid," . $query['points'] . ",1)");
                    echo "Correct answer!";
                    }
                  else
                    {
                    $query = $db->query("INSERT INTO answered (uid,qid,status) values(" . $_SESSION['uid'] . ",$qid,0)");
                    echo "Incorrect answer";
                    }
                }
              else echo "Question already attempted";
            }
          else return "e";
        }
    }

?>