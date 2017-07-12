<?php

namespace Security\RoleSecurity;


use app\admin\security\Error\ErrorTrait;
use app\admin\security\Error\SecurityErrorHandle;

/**
 * Role Instance Provider
 * User: dell
 * Date: 2017/7/4
 * Time: 11:33
 * @Auth Jesse
 */
class RoleProvider
{
    /**
     *  ErrorTrait
     */
    use ErrorTrait;

    /**
     * @param int $roleId
     * @return Author|Review|Sign|bool
     */
    public static function getRole(int $roleId)
    {
        if ($roleId == 0)
        {
            SecurityErrorHandle::setErrorMessage(self::$errorMessage['INVALID_PARAMS']);
            return false;
        }
        switch ($roleId){
            case 1: return new Author();
            case 2: return new Review();
            case 3: return new Sign();
            default: return new Sign();
        }
    }
}