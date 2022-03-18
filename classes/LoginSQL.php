<?php
class LoginSQL extends FunctionSQL{
    /**
    * @param $email string
    * @param $pwd string
    * @return array
    **/
    public function isRegistered($email, $pwd){
        $sql = "SELECT * FROM logins WHERE `login-email` = :email AND `login-pwd` = :pwd";

        $request = $this->db->prepare($sql);
        $request->bindvalue(':email', $email, PDO::PARAM_STR);
        $request->bindvalue(':pwd', $pwd, PDO::PARAM_STR);

        $request->execute();
        $return = $request->fetch();
        
        if($return){
            return $return;
        }
        return false;
    }

    /**
    * @param $pseudo string
    * @param $email string
    * @param $pwd string
    * @return array
    **/
    public function register($pseudo, $email, $pwd){
        $sql = "INSERT INTO `logins`(`login-pseudo`, `login-email`, `login-pwd`) VALUES (:pseudo, :email, :pwd)";

        $request = $this->db->prepare($sql);
        $request->bindvalue(':pseudo', $pseudo, PDO::PARAM_STR);
        $request->bindvalue(':email', $email, PDO::PARAM_STR);
        $request->bindvalue(':pwd', $pwd, PDO::PARAM_STR);

        $return = $request->execute();

        if($return){
            return $this->isRegistered($email, $pwd);
        }
        return false;
    }

    /**
    * @param $pseudo string
    * @return boolean
    **/
    public function testPseudo($pseudo){
        $sql = "SELECT `login-status` FROM logins WHERE `login-pseudo` = :pseudo";

        $request = $this->db->prepare($sql);
        $request->bindvalue(':pseudo', $pseudo, PDO::PARAM_STR);
        
        $request->execute();
        $return = $request->fetch();

        if($return){
            return true;
        }
        return false;
    }
    /**
    * @param $email string
    * @return boolean
    **/
    public function testEmail($email){
        $sql = "SELECT `login-status` FROM logins WHERE `login-email` = :email";

        $request = $this->db->prepare($sql);
        $request->bindvalue(':email', $email, PDO::PARAM_STR);
        
        $request->execute();
        $return = $request->fetch();

        if($return){
            return true;
        }
        return false;
    }
}