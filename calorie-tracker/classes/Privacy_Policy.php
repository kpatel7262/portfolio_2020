<?php

class Privacy_Policy{
    /**/
    private $dbconn;
        public function __construct($dbconn)
        {
            $this->dbconn=$dbconn;
        }

    public function list_privacy_policy(){
        $sql = "SELECT * FROM privacy_policy";
        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->execute();
        $privacy_policy = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $privacy_policy;
    }

    public function add_privacy_policy($policy_question, $policy_answer)
    {
        $sql = "INSERT INTO privacy_policy (policy_question,policy_answer) VALUES (:policy_question,:policy_answer)";

        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->bindparam(':policy_question',$policy_question);
        $pdostm->bindparam(':policy_answer',$policy_answer);
        $count = $pdostm->execute();
        return $count;
    }

    public function get_privacy_policy_by_id($id)
    {
        $sql = "SELECT * FROM privacy_policy where id = :id";
        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $pdostm->execute();
        return $pdostm->fetch(PDO::FETCH_OBJ);
    }

    

    public function delete_privacy_policy($id)
    {
        
        $sql = "DELETE FROM privacy_policy WHERE id = :id";
        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $count = $pdostm->execute();
        return $count;
    }

    public function update_privacy_policy($id, $policy_question, $policy_answer){
        $sql = "Update privacy_policy set policy_question = :policy_question, policy_answer = :policy_answer WHERE id = :id";

        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $pdostm->bindParam(':policy_question', $policy_question);
        $pdostm->bindParam(':policy_answer', $policy_answer);
        $count = $pdostm->execute();
        return $count;
    }
}

?>