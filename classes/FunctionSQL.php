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
        return $return;
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
        return $return;
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



function sqlAddJeu($value){
    $db = connect();

    $sql = "INSERT INTO `jeux`(`jeu-nom`) VALUES ('$value')";

    return $db->exec($sql);
}


function sqlAddLogin($pseudo, $email, $pwd){
    $db = connect();

    $sql = "INSERT INTO `logins`(`login-pseudo`, `login-email`, `login-pwd`) VALUES ('$pseudo', '$email', '$pwd')";
    $return = $db->exec($sql);

    if($return){
        // Search Primary Key of User login
        $sql = "SELECT `pk_login` FROM `logins` WHERE `login-pseudo` = '$pseudo'";
        $fk_login = $db->query($sql);

        $fk_login = $fk_login->fetch();
        $fk_login = $fk_login['pk_login'];


        // Create a new 
        $sql = "INSERT INTO `infoP`(`fk_login`) VALUES ('$fk_login')";
        $db->exec($sql);
    }
    else{

    }
}
