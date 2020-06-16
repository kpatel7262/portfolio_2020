<?php
class addnotification
{
    public function addNoti($name, $email,$calories,$food,$quantity,$protein, $db)
    {
        $sql = "INSERT INTO notification (name,email,calories,food,quantity,protein) VALUES (:name, :email,:calories,:food,:quantity,:protein) ";
        $pst = $db->prepare($sql);

        $pst->bindParam(':name', $name);
        $pst->bindParam(':email', $email);
        $pst->bindParam(':calories', $calories);
        $pst->bindParam(':food', $food);
        $pst->bindParam(':quantity', $quantity);
        $pst->bindParam(':protein', $protein);
        $count = $pst->execute();
        return $count;
    }

    public function list_noti($db)
    {
        $sql = "SELECT * FROM notification";
        $pdostm = $db->prepare($sql);
        $pdostm->execute();
        $notification = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $notification;
    }

    public function delete_notification($id, $db)
    {

        $sql = "DELETE FROM notification WHERE id = :id";
        $pdostm = $db->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $count = $pdostm->execute();
        return $count;
    }

}