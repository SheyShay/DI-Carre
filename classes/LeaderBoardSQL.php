<?php
class LeaderBoardSQL extends FunctionSQL{
    /**
    * @param $fk_game int
    * @param $offset int offset * limit
    * @return array
    **/
    public function getAllForGame($fk_game, $limit = 10, $offset = 0){
        $offset *= $limit;

        $sql = "SELECT `score-score`, `score-date`, `login-pseudo` FROM `scores` INNER JOIN `logins` ON fk_login = pk_login WHERE `fk_jeu` = '$fk_game' ORDER BY `score-score` LIMIT $offset ,$limit";

        $return = $this->db->query($sql);

        if($return){
            return $return->fetchAll();
        }
        return false;
    }
    public function addScore($score, $fk_login, $fk_game){
        $sql = "INSERT INTO `scores`(`score-score`, `fk_login`, `fk_jeu`) VALUES ($score, $fk_login, $fk_game)";

        return $this->db->exec($sql);
    }
}