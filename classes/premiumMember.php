<?php

/**
 * Class PremiumMember
 */
class PremiumMember extends Member
{
    /**
     * @var array
     */
    private $_inDoorInterests = array();
    /**
     * @var array
     */
    private $_outDoorInterests = array();

    /**
     * @return mixed
     */
    public function getInDoorInterests()
    {
        if (empty($this->_inDoorInterests)) {
            return "";
        } else {
            return implode(" ", $this->_inDoorInterests);
        }
    }

    /**
     * @param mixed $inDoorInterests
     */
    public function setInDoorInterests($inDoorInterests)
    {
        $this->_inDoorInterests = $inDoorInterests;
    }

    /**
     * @return mixed
     */
    public function getOutDoorInterests()
    {
        if (empty($this->_outDoorInterests)) {
            return "";
        } else {
            return implode(" ", $this->_outDoorInterests);
        }
    }

    /**
     * @param mixed $outDoorInterests
     */
    public function setOutDoorInterests($outDoorInterests)
    {
        $this->_outDoorInterests = $outDoorInterests;
    }
}
