<?php

class User
{
    public function addUser($age,$gender,$height,$weight,$exercise,$db)
    {
        $sql = "INSERT INTO calculator_form (age, gender, height,weight,exercise) VALUES (:age, :gender, :height,:weight,:exercise) ";
        $pst = $db->prepare($sql);

        $pst->bindParam(':age', $age);
        $pst->bindParam(':gender', $gender);
        $pst->bindParam(':height', $height);
        $pst->bindParam(':weight', $weight);
        $pst->bindParam(':exercise', $exercise);
        $count = $pst->execute();
        return $count;
    }

    public function checkUserName($username, $db)
    {
        $sql = "select * from `login` where username = '$username'";

        $stmt = $db->query($sql);

        //$stmt->execute(['username' => $username]);

        $user = $stmt->fetch();

        if($stmt->rowCount() === 0){
            return false;
        }

        return true;
    }
    public function AuthenticateUser($username, $pw, $db)
    {
        $sql = "select * from `login` where username = '$username' and password = '$pw'";

        $stmt = $db->query($sql);

        //$stmt->execute(['username' => $username]);

        $user = $stmt->fetch();

        if($stmt->rowCount() === 0){
            return false;
        }

        return true;
    }

    public function addLoginEntry($username,$emailid,$password,$db)
    {
        $sql = "INSERT INTO `login`(`username`, `emailid`, `password`) VALUES (:username, :emailid, :password)";
        $pst = $db->prepare($sql);

        $pst->bindParam(':username', $username);
        $pst->bindParam(':emailid', $emailid);
        $pst->bindParam(':password', $password);
        $count = $pst->execute();
        return $count;
    }
}

