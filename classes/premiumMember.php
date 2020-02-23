<?php
class PremiumMember extends Member
{
    private $_inDoorInterests;
    private $_outDoorInterests;

    /**
     * PremiumMember constructor.
     * @param $_inDoorInterests
     * @param $_outDoorInterests
     */
    public function __construct($_inDoorInterests, $_outDoorInterests)
    {
        $this->_inDoorInterests = $_inDoorInterests;
        $this->_outDoorInterests = $_outDoorInterests;
    }

}
