<?php

include_once('Db.class.php');

Class Lists
{

    private $name;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }


    public function AddList()
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare("insert into lists(naam,userid) values (:naam,:userid)");
        $statement->bindParam(':naam', $this->name);
        $statement->bindValue(':userid', $_SESSION['userid']);
        $result = $statement->execute();
        return $result;

    }

    public function showList()
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare("select * from lists where userid = :userid");
        $statement->bindValue(':userid', $_SESSION['userid']);
        $res = $statement->execute();
        $res = $statement->fetchAll();
    }
}
?>