<?php

include_once("Db.class.php");

class Comment
{
    private $comment;
    private $taskid;

    /**
     * @return mixed
     */
    public function getTaskid()
    {
        return $this->taskid;
    }

    /**
     * @param mixed $taskid
     */
    public function setTaskid($taskid)
    {
        $this->taskid = $taskid;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }


    public function saveComment()
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare("insert into comments(comment,userid,taskid) values (:comment,:userid,:taskid)");
        $statement->bindParam(':comment', $this->comment);
        $statement->bindValue(':userid', $_SESSION['userid']);
        $statement->bindValue(':taskid', $this->taskid);
        $res = $statement->execute();
        return $res;

    }

    public function showComment($taskid){
        $conn = Db::getInstance();
        $statement = $conn->prepare("select * from comments where taskid = :taskid");
        $statement->bindValue(':taskid',$taskid);
        $res = $statement->execute();
        $res = $statement->fetchAll();
        return $res;
    }
}