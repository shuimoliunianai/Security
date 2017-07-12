<?php

namespace Security;


use Security\ActionSecurity\SecurityFactory;
use Security\News\NewsProvider;
use Security\RoleSecurity\RoleProvider;

/**
 * Security Input
 * User: dell
 * Date: 2017/7/4
 * Time: 13:47
 * @Auth Jesse
 */
class SecurityAccess
{
    /**
     * @var null
     */
    public static $_instance = null;

    /**
     * @var null
     */
    public static $securityInstance = null;

    /**
     * @var null
     */
    public static $roleInstance = null;

    /**
     * @var null
     */
    public static $newsInstance = null;

    /**
     * @var
     */
    private $roleId;

    /**
     * @var
     */
    private $status;

    /**
     * @var
     */
    private $channel;

    /**
     * SecurityAccess constructor.
     */
    private function __construct()
    {

    }

    /**
     * This function fot init this class
     * @param int $role_id
     * @param int $status
     * @param int $channel
     * @param int $type_id
     * @return SecurityAccess
     * @Auth Jesse
     */
    public static function init(int $role_id = 0, int $status = 0, int $channel = 0, int $type_id = 0): SecurityAccess
    {
        if (self::$_instance != null) {
            return self::$_instance;
        } else {
            self::$_instance = new self();
            self::$_instance->setRoleId($role_id);
            self::$_instance->setStatus($status);
            self::$_instance->setChannel($channel);
            self::$roleInstance = RoleProvider::getRole($role_id);
            self::$newsInstance = NewsProvider::getNewsInstance($type_id);
            self::$securityInstance = SecurityFactory::getSecurityInstance(self::$roleInstance,self::$newsInstance, $status,$channel);
            return self::$_instance;
        }
    }

    /**
     * @return mixed
     */
    public function getNewsThList()
    {
        return self::$securityInstance->getNewsThList();
    }

    /**
     * @return mixed
     */
    public function getSearchOptionList()
    {
        return self::$securityInstance->getSearchOptionList();
    }

    /**
     * @param array $new
     * @return array
     */
    public function getNewsDetail(array $new): array
    {
        return self::$securityInstance->getNewsDetail($new);
    }

    /**
     * @return mixed
     */
    public function getCreateButton()
    {
        return self::$securityInstance->getCreateButton();
    }

    /**
     * @return mixed
     */
    public function getRoleId(): int
    {
        return $this->roleId;
    }

    /**
     * @param mixed $roleId
     */
    public function setRoleId(int $roleId)
    {
        $this->roleId = $roleId;
    }

    /**
     * @return mixed
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus(int $status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getChannel(): int
    {
        return $this->channel;
    }

    /**
     * @param mixed $channel
     */
    public function setChannel(int $channel)
    {
        $this->channel = $channel;
    }

    /**
     * @param $name
     * @param $arguments
     */
    public function __call($name, $arguments)
    {
        $paramName = lcfirst(substr($name,3));
        self::$newsInstance->$paramName = $arguments[0];
    }

}