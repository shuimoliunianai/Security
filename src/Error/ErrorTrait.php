<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2017/7/4
 * Time: 14:39
 */

namespace Security\Error;


trait ErrorTrait
{
    /**
     * @var array
     */
    protected static $errorMessage = [
        "INVALID_PARAMS"=>"无效参数"
    ];
}