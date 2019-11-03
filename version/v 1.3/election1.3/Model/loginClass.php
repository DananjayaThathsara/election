<?php

class loginClass {
    private $id;
    private $u_name;
    private $p_word;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUName()
    {
        return $this->u_name;
    }

    /**
     * @param mixed $u_name
     */
    public function setUName($u_name)
    {
        $this->u_name = $u_name;
    }

    /**
     * @return mixed
     */
    public function getPWord()
    {
        return $this->p_word;
    }

    /**
     * @param mixed $p_word
     */
    public function setPWord($p_word)
    {
        $this->p_word = $p_word;
    }
    public function checkCredintial() {

        $query = "SELECT * FROM login WHERE u_name='" . $this->getUName() . "'  AND p_word='" .$this->getPWord()."'";

        $result = mysql_query($query);
        $count = mysql_num_rows($result);

        if ($count >= 1) {
            while ($row = mysql_fetch_array($result)) {
                $_SESSION['system_logged_status'] = 'true'; //user is logged.
                return true; //user is a active user and email is verified
            }//end while
        } else {
            //wrong password
            throw new Exception("Sorry, password or username incorrect.");
        }
    }

}
