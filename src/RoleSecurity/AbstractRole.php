<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2017/7/4
 * Time: 14:35
 */

namespace Security\RoleSecurity;


use Security\Config\Config;

class AbstractRole
{
    use Config;
    /**
     * @var
     */
    protected static $_instance;

    /**
     * @var null
     */
    public $waitingStatusList = null;

    /**
     * @var null
     */
    public $doneStatusList = null;

    /**
     * @return AbstractRole
     */
    public static function getInstance()
    {
        if (self::$_instance == null) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * @return null
     */
    public function getWaitingStatusList()
    {
        return $this->waitingStatusList;
    }

    /**
     * @param null $waitingStatusList
     */
    public function setWaitingStatusList($waitingStatusList)
    {
        $this->waitingStatusList = $waitingStatusList;
    }

    /**
     * @return null
     */
    public function getDoneStatusList()
    {
        return $this->doneStatusList;
    }

    /**
     * @param null $doneStatusList
     */
    public function setDoneStatusList($doneStatusList)
    {
        $this->doneStatusList = $doneStatusList;
    }

}