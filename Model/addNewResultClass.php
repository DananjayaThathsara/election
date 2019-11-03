<?php

class addNewResultClass
{

    private $id;
    private $post_id;
    private $result_type;
    private $result_level;
    private $d_id;
    private $s_id;
    private $party_id;
    private $votes;
    private $precen;
    private $valid_votes;
    private $rejected_votes;
    private $total_polled;
    private $registered_votes;
    private $date;

    /**
     * @return mixed
     */
    public function getPostId()
    {
        return $this->post_id;
    }

    /**
     * @param mixed $post_id
     */
    public function setPostId($post_id)
    {
        $this->post_id = $post_id;
    }


    /**
     * @return mixed
     */
    public function getRegisteredVotes()
    {
        return $this->registered_votes;
    }

    /**
     * @param mixed $registered_votes
     */
    public function setRegisteredVotes($registered_votes)
    {
        $this->registered_votes = $registered_votes;
    }


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
    public function getResultType()
    {
        return $this->result_type;
    }

    /**
     * @param mixed $result_type
     */
    public function setResultType($result_type)
    {
        $this->result_type = $result_type;
    }

    /**
     * @return mixed
     */
    public function getResultLevel()
    {
        return $this->result_level;
    }

    /**
     * @param mixed $result_level
     */
    public function setResultLevel($result_level)
    {
        $this->result_level = $result_level;
    }

    /**
     * @return mixed
     */
    public function getDId()
    {
        return $this->d_id;
    }

    /**
     * @param mixed $d_id
     */
    public function setDId($d_id)
    {
        $this->d_id = $d_id;
    }

    /**
     * @return mixed
     */
    public function getSId()
    {
        return $this->s_id;
    }

    /**
     * @param mixed $s_id
     */
    public function setSId($s_id)
    {
        $this->s_id = $s_id;
    }

    /**
     * @return mixed
     */
    public function getPartyId()
    {
        return $this->party_id;
    }

    /**
     * @param mixed $party_id
     */
    public function setPartyId($party_id)
    {
        $this->party_id = $party_id;
    }

    /**
     * @return mixed
     */
    public function getVotes()
    {
        return $this->votes;
    }

    /**
     * @param mixed $votes
     */
    public function setVotes($votes)
    {
        $this->votes = $votes;
    }

    /**
     * @return mixed
     */
    public function getPrecen()
    {
        return $this->precen;
    }

    /**
     * @param mixed $precen
     */
    public function setPrecen($precen)
    {
        $this->precen = $precen;
    }

    /**
     * @return mixed
     */
    public function getValidVotes()
    {
        return $this->valid_votes;
    }

    /**
     * @param mixed $valid_votes
     */
    public function setValidVotes($valid_votes)
    {
        $this->valid_votes = $valid_votes;
    }

    /**
     * @return mixed
     */
    public function getRejectedVotes()
    {
        return $this->rejected_votes;
    }

    /**
     * @param mixed $rejected_votes
     */
    public function setRejectedVotes($rejected_votes)
    {
        $this->rejected_votes = $rejected_votes;
    }

    /**
     * @return mixed
     */
    public function getTotalPolled()
    {
        return $this->total_polled;
    }

    /**
     * @param mixed $total_polled
     */
    public function setTotalPolled($total_polled)
    {
        $this->total_polled = $total_polled;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }


    public function checkPostal()
    {
        $query = "SELECT d_id FROM new_president_postal_result WHERE d_id='" . $this->getDId() . "' AND party_id='" . $this->getPartyId() . "'";
        $result = mysql_query($query);
        $count = mysql_num_rows($result);
        if ($count >= 1) {
            return false;
        } else {
            return ture;
        }

    }

    public function checkElectoral()
    {

        $query = "SELECT d_id,s_id FROM new_president_electoral_result WHERE d_id='" . $this->getDId() . "' AND s_id='" . $this->getSId() . "'AND party_id='" . $this->getPartyId() . "'";

        $result = mysql_query($query);
        $count = mysql_num_rows($result);
        if ($count >= 1) {
            return false;
        } else {
            return ture;
        }
    }

    public function addNewResult()
    {
        if ($this->getResultType() == 'postal') {

            if ($this->checkPostal()) {
                $query = "INSERT INTO new_president_postal_result 
                (result_level,d_id,party_id,votes,precen,valid_votes,rejected_votes,total_polled,registered_votes,date)
                VALUES('" . $this->getResultLevel() . "','" . $this->getDId() . "'
                ,'" . $this->getPartyId() . "','" . $this->getVotes() . "','" . $this->getPrecen() . "'
                ,'" . $this->getValidVotes() . "','" . $this->getRejectedVotes() . "',
                '" . $this->getTotalPolled() . "','" . $this->getRegisteredVotes() . "','" . $this->getDate() . "')";
                $result = mysql_query($query);
                if ($result) {
                    return true;
                } else {
                    throw new Exception(mysql_error());
                }
            } else {
                throw new Exception('You already added results to this district.Please update it');

            }

        }
        if ($this->getResultType() == 'electoral') {
            if ($this->checkElectoral()) {
                $query = "INSERT INTO new_president_electoral_result 
                (result_level,d_id,s_id,party_id,votes,precen,valid_votes,rejected_votes,total_polled,registered_votes,date)
                VALUES('" . $this->getResultLevel() . "','" . $this->getDId() . "','" . $this->getSId() . "'
                ,'" . $this->getPartyId() . "','" . $this->getVotes() . "','" . $this->getPrecen() . "'
                ,'" . $this->getValidVotes() . "','" . $this->getRejectedVotes() . "',
                '" . $this->getTotalPolled() . "','" . $this->getRegisteredVotes() . "','" . $this->getDate() . "')";
                $result = mysql_query($query);
                if ($result) {
                    return true;
                } else {
                    throw new Exception(mysql_error());
                }
            } else {
                throw new Exception('You already added results to this electoral.Please update it');

            }

        }
    }

    public function updateNewResult()
    {
        if ($this->getResultType() == 'postal') {
            print_r($this->getPostId());
            $query = "UPDATE  new_president_postal_result 
                          SET  result_level='" . $this->getResultLevel() . "',party_id='" . $this->getPartyId() . "',
                          votes='" . $this->getVotes() . "',precen='" . $this->getPrecen() . "',
                          valid_votes='" . $this->getValidVotes() . "',rejected_votes='" . $this->getRejectedVotes() . "',
                          total_polled='" . $this->getTotalPolled() . "',registered_votes='" . $this->getRegisteredVotes() . "'
                          WHERE post_id='" . $this->getPostId() . "'";
            $result = mysql_query($query);
            if ($result) {
                return true;
            } else {
                throw new Exception(mysql_error());
            }

        }
        if ($this->getResultType() == 'electoral') {

            $query = "UPDATE  new_president_electoral_result 
                          SET  result_level='" . $this->getResultLevel() . "',party_id='" . $this->getPartyId() . "',
                          votes='" . $this->getVotes() . "',precen='" . $this->getPrecen() . "',
                          valid_votes='" . $this->getValidVotes() . "',rejected_votes='" . $this->getRejectedVotes() . "',
                          total_polled='" . $this->getTotalPolled() . "',registered_votes='" . $this->getRegisteredVotes() . "'
                          WHERE elec_id='" . $this->getId() . "'";
            $result = mysql_query($query);
            if ($result) {
                return true;
            } else {
                throw new Exception(mysql_error());
            }
        }


    }


}