<?php

/**
 * Created by PhpStorm.
 * User: Nethweb
 * Date: 1/30/2018
 * Time: 9:59 AM
 */
class addFileClass
{
    private $id;
    private $d_id;
    private $l_id;
    private $file_name;
    private $date;
    private $status;

    /**
     * @return mixed
     */
    public function getLId()
    {
        return $this->l_id;
    }

    /**
     * @param mixed $l_id
     */
    public function setLId($l_id)
    {
        $this->l_id = $l_id;
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
    public function getCId()
    {
        return $this->c_id;
    }

    /**
     * @param mixed $c_id
     */
    public function setCId($c_id)
    {
        $this->c_id = $c_id;
    }

    /**
     * @return mixed
     */
    public function getFileName()
    {
        return $this->file_name;
    }

    /**
     * @param mixed $file_name
     */
    public function setFileName($file_name)
    {
        $this->file_name = $file_name;
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

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
    public function checkFile(){
        $query = "SELECT * FROM files WHERE  l_id='".$this->getLId()."' AND d_id='".$this->getDId(). "'";
        $result=mysql_query($query);
        $count=mysql_num_rows($result);
        if($count >=1){

            return true;

        }else{
            return false;
        }
    }
    public function addFile()
    {
        $query = "INSERT INTO files (d_id,l_id,file_name,date) VALUES('" . $this->getDId() . "','" . $this->getLId(). "',
            '" . $this->getFileName()."','" . $this->getDate()."') ";
        $result=mysql_query($query);
        if($result){
            $queryfile="SELECT * FROM files WHERE d_id='".$this->getDId()."' AND l_id='".$this->getLId()."'";
            $resultfile=mysql_query($queryfile);
            while ($rowfile=mysql_fetch_assoc($resultfile)){
                $url="../electionadmin/Files/".$rowfile['file_name'];
                $xml = simplexml_load_file("../electionadmin/Files/".$rowfile['file_name']) or die("Error: Cannot create object");
                foreach ($xml->district as $dis) {
                    foreach ($dis->localAuthority as $la) {
                        foreach ($la->party as $pa){
                            $d_id=(int)$dis->districtId;
                            $l_id=(int) $la->localAuthorityId ;
                            $p_id=  (int)$pa->partyId;
                            $p_name= (string)$pa->partyName;
                            $p_symbl=(string)$pa->partySymbol;
                            $p_votes=(double)$pa->polledVotes;
                            $percent=(float)$pa->percent;
                            $date=date('Y-m-d h:i:s');
                            $sql = "INSERT INTO la_party(d_id,l_id,p_id,p_name,p_symbl,p_votes,precentage,date)VALUES ('$d_id', '$l_id', '$p_id','$p_name','$p_symbl','$p_votes','$percent','".$date."')";
                            $result=mysql_query($sql);
                            foreach ($pa->members as $me){
                                $d_id=(int)$dis->districtId;
                                $l_id=(int) $la->localAuthorityId ;
                                $p_id=  (int)$pa->partyId;
                                $elected_mem=(int)$me->elected;
                                $caculated_mem=	(int)$me->calculated;
                                $tot_members=$elected_mem+$caculated_mem;
                                $date=date('Y-m-d h:i:s');
                                $sql1 = "INSERT INTO la_party_members(d_id, l_id,p_id,elected_mem,caculated_mem,tot_mem,date)VALUES ('$d_id', '$l_id', '$p_id','$elected_mem','$caculated_mem','".$tot_members."','".$date."')";
                                $result1=mysql_query($sql1);
                            }
                        }
                        foreach ($la->summary as $su){
                            $d_id=(int)$dis->districtId;
                            $l_id=(int) $la->localAuthorityId ;
                            $tot_mem =	(int) $su->totalMembers ;
                            $tot_valid_votes=(double) $su->totalValidVotes ;
                            $rejected_votes	=(double) $su->rejectedVotes ;
                            $polled_votes	=(double) $su->polledVotes ;
                            $tot_reg_votes	=(double) $su->totalRegisteredVotes;
                            $date=date('Y-m-d h:i:s');
                            $sql2 = "INSERT INTO sammary(d_id,l_id,tot_mem,tot_valid_votes,rejected_votes,polled_votes,tot_reg_votes,date)VALUES ('$d_id', '$l_id', '$tot_mem','$tot_valid_votes','$rejected_votes','$polled_votes','$tot_reg_votes','".$date."')";
                            $result2=mysql_query($sql2);

                        }

                    }
                }
            }
            return true;
        }else{
            throw new Exception(mysql_error());
        }


    }
}