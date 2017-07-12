<?php

namespace Security\ActionSecurity;


use Security\Config\Config;
use Security\News\News;
use Security\RoleSecurity\Role;
use ReflectionClass;

/**
 * Security Factory
 * User: dell
 * Date: 2017/7/4
 * Time: 10:54
 * @Auth Jesse
 */
class SecurityFactory
{
    use Config;

    /**
     *  Admin
     */
    const ADMIN = 'Admin';

    /**
     * Common
     */
    const COMMON = 'Common';

    /**
     * Special
     */
    const SPECIAL = 'Special';

    /**
     * Base Name Space
     */
    const BASE_NAME_SPACE = 'app\admin\security\ActionSecurity\\';

    /**
     * Base Class Postfix
     */
    const BASE_CLASS_POSTFIX = 'Security';

    /**
     * Auto Create Instance
     * @param Role $role
     * @param News $newsInstance
     * @param int $status
     * @param int $channelId
     * @return mixed|null
     * @Auth Jesse
     * @Date 2017/7/4
     */
    public static function getSecurityInstance(Role $role, News $newsInstance , int $status,int $channelId)
    {
        $managerRole = self::adJustManagerRole();
        $actionClass = self::BASE_NAME_SPACE . $managerRole . self::BASE_CLASS_POSTFIX;
        if (class_exists($actionClass)) {
            $reflectionClass = new ReflectionClass($actionClass);
            $reflectionInstance = $reflectionClass->newInstance();
            $reflectMethod = $reflectionClass->getMethod("setRole");
            $reflectMethod->invoke($reflectionInstance, $role);
            $reflectMethod = $reflectionClass->getMethod('setNews');
            $reflectMethod->invoke($reflectionInstance, $newsInstance);
            $reflectMethod = $reflectionClass->getMethod("setStatus");
            $reflectMethod->invoke($reflectionInstance, $status);
            $reflectMethod = $reflectionClass->getMethod("setChannelId");
            $reflectMethod->invoke($reflectionInstance,$channelId);
            return $reflectionInstance;
        }
        return null;
    }

    /**
     * Adjust ManagerRole
     * @return string
     * @Auth Jesse
     * @Date 2017/7/4
     */
    public static function adJustManagerRole()
    {
        $loginInfo = $_SESSION['admin'];
        if (isset($loginInfo['super']) && $loginInfo['super'] == 1) {
            return self::ADMIN;
        } else if (isset($loginInfo['current_role']['name']) && in_array($loginInfo['current_role']['name'], self::$currentRole)) {
            return self::SPECIAL;
        } else {
            return self::COMMON;
        }
    }
}