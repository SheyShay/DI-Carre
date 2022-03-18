<?php
class FunctionSQL{
    protected $db = null;

    public function __construct(){
        $this->db = $this->connect();
        
    }
    private function connect(){
        try{
            // di-carre-user
            // !'m_90!n9_70_13@k_y0u
            $db = new PDO('mysql:host=localhost; dbname=di-carre; charset=utf8', 'di-carre-user', '!\'m_90!n9_70_13@k_y0u');
        }
        catch(Exception $e){
            die('Error :'.$e->getMessage());
        }

        return $db;
    }

    /**
    * @param $table string Name of the table
    * @return array An array of array
    **/
    public function selectAll($table){
        $sql = "SELECT * FROM $table";

        $return = $this->db->query($sql);

        if($return){
            return $return->fetchAll();
        }
        return false;
    }
    /**
    * @param $table string Name of the table
    * @param $id int
    * @return array
    **/
    public function select($table, $id){
        $sql = "SELECT * FROM `$table` WHERE `pk_%` = '$id'";

        $return = $this->db->query($sql);

        if($return){
            return $return->fetch();
        }
        return false;
    }
    /**
    * @param $table string Name of the table
    * @param $id int
    * @return boolean
    **/
    public function delete($table, $id){
        $sql = "DELETE FROM `$table` WHERE `pk_%` = '$id'";

        return $this->db->exec($sql);
    }
}