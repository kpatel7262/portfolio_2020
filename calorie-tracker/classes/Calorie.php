<?php


class Calorie
{
    private $dbconn;

    public function __construct($dbconn)
    {
        $this->dbconn = $dbconn;
    }

    public function listcalorie()
    {
        $sql = "select * from calorie_alert";

        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->execute();

        $calorie = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $calorie;
    }

    public function addcalorie($username, $calorie, $message)
    {
        $sql = "insert into calorie_alert(username, calorie, message) values(:username, :calorie, :message)";

        $pdostm = $this->dbconn->prepare($sql);

        $pdostm->bindparam(':username', $username);
        $pdostm->bindparam(':calorie', $calorie);
        $pdostm->bindparam(':message', $message);


        $count = $pdostm->execute();
        return $count;
    }
    public function updatecalorie($id, $username, $calorie, $message){
        $sql = "update calorie_alert 
                set username=:username, calorie=:calorie, message=:message 
                where id=:id";

        $pdostm = $this->dbconn->prepare($sql);

        $pdostm->bindparam(':username', $username);
        $pdostm->bindparam(':calorie', $calorie);
        $pdostm->bindparam(':message', $message);
        $pdostm->bindparam(':id',$id);

        $count = $pdostm->execute();
        return $count;
    }
    public function deletecalorie($id){
        $sql = "delete from calorie_alert where id=:id";

        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->bindparam(':id',$id);
        $count = $pdostm->execute();
        return $count;
    }
}
