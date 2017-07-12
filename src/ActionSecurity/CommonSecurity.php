<?php

namespace Security\ActionSecurity;

/**
 * Security for common manager role
 * Created by PhpStorm.
 * User: dell
 * Date: 2017/7/4
 * Time: 11:02
 * @Auth Jesse
 */
class CommonSecurity extends AbstractSecurity implements SecurityInterface
{
    /**
     * @return mixed
     */
    public function getOptionStatus()
    {

    }

    /**
     * Get Th List
     * @Auth Jesse
     * @Date 2017/7/4
     */
    public function getNewsThList():array
    {
        $thList = $this->getNews()->getThList();
        unset($thList['MAKE_TOP']);
        unset($thList['MAKE_TOPIC']);
        return $thList;
    }

    /**
     * To remove Make Top and Make Topic action
     * @return mixed
     * @override
     * @Auth Jesse
     * @Date 2017/7/6
     */
    public function getAllowActionList(): array
    {
        $allowActionList = $this->getRole()->getActionList();
        if (isset($allowActionList['MAKE_TOP'])) {
            unset($allowActionList['MAKE_TOP']);
        }
        if (isset($allowActionList['MAKE_TOPIC'])) {
            unset($allowActionList['MAKE_TOPIC']);
        }
        return $allowActionList;
    }
}