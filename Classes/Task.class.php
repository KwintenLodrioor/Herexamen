<?php

include_once('Db.class.php');

Class Tasks
{
   private $title;
   private $list;
   private $hours;
   private $deadline;

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getList()
    {
        return $this->list;
    }

    /**
     * @param mixed $list
     */
    public function setList($list)
    {
        $this->list = $list;
    }

    /**
     * @return mixed
     */
    public function getHours()
    {
        return $this->hours;
    }

    /**
     * @param mixed $hours
     */
    public function setHours($hours)
    {
        $this->hours = $hours;
    }

    /**
     * @return mixed
     */
    public function getDeadline()
    {
        return $this->deadline;
    }

    /**
     * @param mixed $deadline
     */
    public function setDeadline($deadline)
    {
        $this->deadline = $deadline;
    }

    public function saveTask(){
        $conn = Db::getInstance();
        $statement = $conn->prepare("insert into Tasks(list,title,hours,deadline,userid) values (:list,:title,:hours,:deadline,:userid)");
        $statement->bindParam(':list',$this->list);
        $statement->bindParam(':title',$this->title);
        $statement->bindParam(':hours',$this->hours);
        $statement->bindParam(':deadline',$this->deadline);
        $statement->bindValue(':userid',$_SESSION['userid']);
        $res = $statement->execute();
        return $res;

    }

    public function showTask()
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare("select * from Tasks where userid = :userid");
        $statement->bindValue(':userid', $_SESSION['userid']);
        $res = $statement->execute();
        $res = $statement->fetchAll();
        return $res;
    }




}