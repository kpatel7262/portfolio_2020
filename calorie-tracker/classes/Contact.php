<?php
//class created for contact feature which contains SQL queries for all the functionalities
class Contact
{
    private $dbconn;
    //constructor
    public function __construct($dbconn)
    {
        $this->dbconn = $dbconn;
    }
    //function to show the entire list of contact page
    public function listcontact()
    {
        $sql = "select * from contact";

        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->execute();

        $contact = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $contact;
    }
    //function to display details of the particular name which is selected/inserted in the search bar
    public function searchcontact($name)
    {
        $sql = "select * from contact where fname like ?";

        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->execute(array('%'.$name.'%'));
        $contact= $pdostm->fetchAll(PDO::FETCH_ASSOC);
        return $contact;
    }
    //function to insert data
    public function addcontact($fname, $lname, $gender, $phone, $email, $msg, $reply1)
    {
        //$reply1 = "";
        $sql = "insert into contact(fname, lname, gender, phone, email, message, reply) values(:fname, :lname, :gender, :phone, :email, :msg, :reply1)";

        $pdostm = $this->dbconn->prepare($sql);

        $pdostm->bindparam(':fname', $fname);
        $pdostm->bindparam(':lname', $lname);
        $pdostm->bindparam(':gender', $gender);
        $pdostm->bindparam(':phone', $phone);
        $pdostm->bindparam(':email', $email);
        $pdostm->bindparam(':msg', $msg);
        $pdostm->bindparam(':reply1', $reply1);

        $count = $pdostm->execute();
        //var_dump($count);
        return $count;
    }
    //function to update contact for the selected contact
    public function updatecontact($id, $fname, $lname, $gender, $phone, $email, $msg){
        $sql = "update contact 
                set fname=:fname, lname=:lname, gender=:gender, phone=:phone, email=:email , message=:msg 
                where id=:id";

        $pdostm = $this->dbconn->prepare($sql);

        $pdostm->bindparam(':fname', $fname);
        $pdostm->bindparam(':lname', $lname);
        $pdostm->bindparam(':gender', $gender);
        $pdostm->bindparam(':phone', $phone);
        $pdostm->bindparam(':email', $email);
        $pdostm->bindparam(':msg', $msg);
        $pdostm->bindparam(':id', $id);

        $count = $pdostm->execute();
        return $count;
    }
    //function to reply the user with the selected contact
    public function updatecontact2($name, $reply){
        $sql = "update contact 
                set reply=:reply where fname=:name";

        $pdostm = $this->dbconn->prepare($sql);

        $pdostm->bindparam(':reply', $reply);
        $pdostm->bindparam(':name', $name);

        $count = $pdostm->execute();
        return $count;
    }
    //function to delete a selected contact
    public function deletecontact($id){
        $sql = "delete from contact where id=:id";

        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->bindparam(':id',$id);
        $count = $pdostm->execute();
        return $count;
    }
}
?>