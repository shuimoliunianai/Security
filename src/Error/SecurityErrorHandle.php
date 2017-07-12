<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2017/7/4
 * Time: 14:38
 */

namespace Security\Error;

class SecurityErrorHandle
{
    /**
     * @var null
     */
    public static $errorMessage = null;

    /**
     * @return null
     */
    public static function getErrorMessage()
    {
        return self::$errorMessage;
    }

    /**
     * @param null $errorMessage
     */
    public static function setErrorMessage($errorMessage)
    {
        self::$errorMessage = $errorMessage;
    }


}