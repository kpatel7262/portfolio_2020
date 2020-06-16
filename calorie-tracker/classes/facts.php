<?php

class facts{
    /**/
    private $dbconn;
        public function __construct($dbconn)
        {
            $this->dbconn=$dbconn;
        }

    public function list_facts(){
        $sql = "SELECT * FROM calorie_facts";
        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->execute();
        $facts = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $facts;
    }

    public function add_fact($title, $content)
    {
        $sql = "INSERT INTO calorie_facts (title, content) VALUES (:title, :content)";

        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->bindparam(':title',$title);
        $pdostm->bindparam(':content',$content);
        $count = $pdostm->execute();
        return $count;

    }

    public function get_fact_by_id($id)
    {
        $sql = "SELECT * FROM calorie_facts where id = :id";
        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $pdostm->execute();
        return $pdostm->fetch(PDO::FETCH_OBJ);
    }

    

    public function delete_fact($id)
    {
        
        $sql = "DELETE FROM calorie_facts WHERE id = :id";
        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $count = $pdostm->execute();
        return $count;
    }

    public function update_fact($id, $title, $content){
        $sql = "Update calorie_facts
                set title = :title,
                content = :content WHERE id = :id";

        $pdostm = $this->dbconn->prepare($sql);

        $pdostm->bindParam(':title', $title);
        $pdostm->bindParam(':content', $content);
        $pdostm->bindParam(':id', $id);

        $count = $pdostm->execute();

        return $count;
    }
}

?>