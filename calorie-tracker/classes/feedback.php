<?php
//feedback class with all the functionalities and SQL queries
class Feedback{
    private $dbconn;
    public function __construct($dbconn)
    {
        $this->dbconn=$dbconn;
    }
    //function to list the entire data of the feedback table for the admin
    public function listfeedback(){
        $sql = "select * from feedback";

        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->execute();

        $feedback = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $feedback;
    }
    //function to select all the feedback where the status is ON
    public function listfeedback2($post1){
        $sql = "select * from feedback where status = :post1";

        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->bindparam(':post1',$post1);
        $pdostm->execute();

        $feedback = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $feedback;
    }
    //function to search the feedback details for the specified email address
    public function searchfeedback($email)
    {
        $sql = "select * from feedback where email like ?";

        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->execute(array('%'.$email.'%'));
        $contact= $pdostm->fetchAll(PDO::FETCH_ASSOC);
        return $contact;
    }
    //function to insert the feedback by the user
    public function addfeedback($email, $msg, $post1){
        $sql = "insert into feedback(email, description, status) values(:email, :msg, :post1)";
        //echo $sql;
        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->bindparam(':email',$email);
        $pdostm->bindparam(':msg',$msg);
        $pdostm->bindparam(':post1',$post1);

        $count = $pdostm->execute();
        //var_dump($count);
        return $count;
    }
    //function to update the user feedback by the admin
    public function updatefeedback($id, $msg){
        $sql = "update feedback set description = :msg where id=:id";

        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->bindparam(':id',$id);
        $pdostm->bindparam(':msg',$msg);
        $count = $pdostm->execute();
        return $count;
    }
    //function to set the status of the feedback on the main page by the admin
    public function updatestatus($id, $post1){
        $sql = "update feedback set status = :post1 where id=:id";

        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->bindparam(':id',$id);
        $pdostm->bindparam(':post1',$post1);
        $count = $pdostm->execute();
        return $count;
    }
    //function to delete a selected feedback
    public function deletefeedback($id){
        $sql = "delete from feedback where id=:id";

        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->bindparam(':id',$id);
        $count = $pdostm->execute();
        return $count;
    }
}
?>


