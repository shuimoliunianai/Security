<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2017/7/4
 * Time: 15:12
 */

namespace Security\RoleSecurity;


interface Role
{
    /**
     * Get Action List
     * @return mixed
     */
    public function getActionList();
}