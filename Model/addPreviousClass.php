<?php

/**
 * Created by PhpStorm.
 * User: Nethweb
 * Date: 1/30/2018
 * Time: 9:59 AM
 */
class addPreviousClass
{

    private $d_id;
    private $s_id;
    private $mr_votes;
    private $mr_precen;
    private $ms_votes;
    private $ms_precen;
    private $valid_votes;
    private $rejected_votes;
    private $total_polled;
    private $registered_votes;

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
    public function getMrVotes()
    {
        return $this->mr_votes;
    }

    /**
     * @param mixed $mr_votes
     */
    public function setMrVotes($mr_votes)
    {
        $this->mr_votes = $mr_votes;
    }

    /**
     * @return mixed
     */
    public function getMrPrecen()
    {
        return $this->mr_precen;
    }

    /**
     * @param mixed $mr_precen
     */
    public function setMrPrecen($mr_precen)
    {
        $this->mr_precen = $mr_precen;
    }

    /**
     * @return mixed
     */
    public function getMsVotes()
    {
        return $this->ms_votes;
    }

    /**
     * @param mixed $ms_votes
     */
    public function setMsVotes($ms_votes)
    {
        $this->ms_votes = $ms_votes;
    }

    /**
     * @return mixed
     */
    public function getMsPrecen()
    {
        return $this->ms_precen;
    }

    /**
     * @param mixed $ms_precen
     */
    public function setMsPrecen($ms_precen)
    {
        $this->ms_precen = $ms_precen;
    }

    public function checkDisSeat()
    {
        $query = "SELECT d_id,s_id FROM pre_result_seat_wise WHERE d_id='" . $this->getDId() . "' AND s_id='" . $this->getSId() . "'";
        $result = mysql_query($query);
        $count = mysql_num_rows($result);
        if ($count >= 1) {
            return false;
        } else {
            return ture;
        }

    }
    public function checkDis()
    {
        $query = "SELECT d_id FROM pre_res_dis_wise WHERE d_id='" . $this->getDId() . "'";

        $result = mysql_query($query);
        $count = mysql_num_rows($result);
        if ($count >= 1) {
            return false;
        } else {
            return ture;
        }

    }
    public function checkDisPostal()
    {
        $query = "SELECT d_id FROM pre_res_dis_wise_postal WHERE d_id='" . $this->getDId() . "'";

        $result = mysql_query($query);
        $count = mysql_num_rows($result);
        if ($count >= 1) {
            return false;
        } else {
            return ture;
        }

    }

    public function addResultsSeat()
    {
        if ($this->checkDisSeat()) {
            $query = "INSERT INTO pre_result_seat_wise (d_id,s_id,mr_votes,mr_precen,ms_votes,ms_precen,
                                                        valid_votes,rejected_votes,total_polled,registered_votes)
                  VALUES ('" . $this->getDId() . "','" . $this->getSId() . "','" . $this->getMrVotes() . "',
                  '" . $this->getMrPrecen() . "','" . $this->getMsVotes() . "','" . $this->getMsPrecen() . "',
                  '" . $this->getValidVotes() . "','" . $this->getRejectedVotes() . "','" . $this->getTotalPolled() . "'
                  ,'" . $this->getRegisteredVotes() . "')
                  ";
            $result = mysql_query($query);
            if ($result) {
                return true;
            } else {
                throw new Exception(mysql_error());
            }
        } else {
            echo('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Error!</strong>You already added results to this polling division.Please update it</div>');
        }

    }
    public function addResultsSeatUpdate()
    {
        $query = "UPDATE  pre_result_seat_wise SET  mr_votes='" . $this->getMrVotes() . "',mr_precen='" . $this->getMrPrecen() . "'
                      ,ms_votes='" . $this->getMsVotes() . "',ms_precen='" . $this->getMsPrecen() . "',valid_votes='" . $this->getValidVotes() . "',
                      rejected_votes='" . $this->getRejectedVotes() . "',total_polled='" . $this->getTotalPolled() . "',registered_votes='" . $this->getRegisteredVotes() . "'
                       WHERE d_id='" . $this->getDId() . "' AND s_id='" . $this->getSId() . "'";

        $result = mysql_query($query);
        if ($result) {
            return true;
        } else {
            throw new Exception(mysql_error());
        }

    }

    public function addResultsDis()
    {
        if ($this->checkDis()) {
            $query = "INSERT INTO pre_res_dis_wise (d_id,mr_votes,mr_precen,ms_votes,ms_precen,
                                                        valid_votes,rejected_votes,total_polled,registered_votes)
                  VALUES ('" . $this->getDId() . "','" . $this->getMrVotes() . "',
                  '" . $this->getMrPrecen() . "','" . $this->getMsVotes() . "','" . $this->getMsPrecen() . "',
                  '" . $this->getValidVotes() . "','" . $this->getRejectedVotes() . "','" . $this->getTotalPolled() . "'
                  ,'" . $this->getRegisteredVotes() . "')";
            $result = mysql_query($query);
            if ($result) {
                return true;
            } else {
                throw new Exception(mysql_error());
            }
        } else {
            echo('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Error!</strong>You already added results to this District.Please update it</div>');
        }

    }
    public function addResultsDisUpdate()
    {
        $query = "UPDATE  pre_res_dis_wise SET  mr_votes='" . $this->getMrVotes() . "',mr_precen='" . $this->getMrPrecen() . "'
                      ,ms_votes='" . $this->getMsVotes() . "',ms_precen='" . $this->getMsPrecen() . "',valid_votes='" . $this->getValidVotes() . "',
                      rejected_votes='" . $this->getRejectedVotes() . "',total_polled='" . $this->getTotalPolled() . "',registered_votes='" . $this->getRegisteredVotes() . "'
                       WHERE d_id='" . $this->getDId() . "'";

        $result = mysql_query($query);
        if ($result) {
            return true;
        } else {
            throw new Exception(mysql_error());
        }

    }

    public function addResultsDisPostal()
    {
        if ($this->checkDisPostal()) {

            $query = "INSERT INTO pre_res_dis_wise_postal (d_id,mr_votes,mr_precen,ms_votes,ms_precen,
                                                        valid_votes,rejected_votes,total_polled,registered_votes)
                  VALUES ('" . $this->getDId() . "','" . $this->getMrVotes() . "',
                  '" . $this->getMrPrecen() . "','" . $this->getMsVotes() . "','" . $this->getMsPrecen() . "',
                  '" . $this->getValidVotes() . "','" . $this->getRejectedVotes() . "','" . $this->getTotalPolled() . "'
                  ,'" . $this->getRegisteredVotes() . "')";
            $result = mysql_query($query);
            if ($result) {
                return true;
            } else {
                throw new Exception(mysql_error());
            }
        } else {
            echo('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Error!</strong>You already added results to this District.Please update it</div>');
        }

    }
    public function addResultsDisUpdatePostal()
    {
        $query = "UPDATE  pre_res_dis_wise_postal SET  mr_votes='" . $this->getMrVotes() . "',mr_precen='" . $this->getMrPrecen() . "'
                      ,ms_votes='" . $this->getMsVotes() . "',ms_precen='" . $this->getMsPrecen() . "',valid_votes='" . $this->getValidVotes() . "',
                      rejected_votes='" . $this->getRejectedVotes() . "',total_polled='" . $this->getTotalPolled() . "',registered_votes='" . $this->getRegisteredVotes() . "'
                       WHERE d_id='" . $this->getDId() . "'";

        $result = mysql_query($query);
        if ($result) {
            return true;
        } else {
            throw new Exception(mysql_error());
        }

    }
}
