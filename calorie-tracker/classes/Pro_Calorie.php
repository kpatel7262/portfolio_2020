<?php

class Pro_Calorie{
    /**/
    private $dbconn;
        public function __construct($dbconn)
        {
            $this->dbconn=$dbconn;
        }

    public function list_pro(){
        $sql = "SELECT * FROM products_calorie";
        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->execute();
        $products_calorie = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $products_calorie;
    }

    public function add_pro($pro_name, $pro_calorie)
    {
        $sql = "INSERT INTO products_calorie (pro_name, pro_calorie) VALUES (:pro_name, :pro_calorie)";

        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->bindparam(':pro_name',$pro_name);
        $pdostm->bindparam(':pro_calorie',$pro_calorie);
        $count = $pdostm->execute();
        return $count;
    }
    public function getCalorie($keyword)
    {
        $sql = "SELECT pro_calorie FROM products_calorie WHERE pro_name LIKE :keyword";
        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->bindParam(':keyword', $keyword);
        $pdostm->execute();
        return $pdostm->fetch(PDO::FETCH_ASSOC);
    }


    public function get_pro_by_id($id)
    {
        $sql = "SELECT * FROM products_calorie where id = :id";
        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $pdostm->execute();
        return $pdostm->fetch(PDO::FETCH_OBJ);
    }

	public function delete_pro($id)
    {
        
        $sql = "DELETE FROM products_calorie WHERE id = :id";
        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $count = $pdostm->execute();
        return $count;
    }

    public function update_pro($id, $pro_name, $pro_calorie){
        
        $sql = "Update products_calorie set pro_name = :pro_name, pro_calorie = :pro_calorie WHERE id = :id";

        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $pdostm->bindParam(':pro_name', $pro_name);
        $pdostm->bindParam(':pro_calorie', $pro_calorie);
        $count = $pdostm->execute();
        return $count;
    }
}

?>