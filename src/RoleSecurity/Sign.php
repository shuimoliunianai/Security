<?php

namespace Security\RoleSecurity;

/**
 * Sign Role
 * User: dell
 * Date: 2017/7/4
 * Time: 11:38
 * @Auth Jesse
 */
class Sign extends Review implements Role
{
    /**
     * @var int
     */
    public $roleId = 3;

    /**
     * The Action allow by role and news status.
     * @var array
     * @Auth Jesse
     * @Date 2017/7/5
     */
    public $actionList = [
        "EDIT" => [
            "SIGN_WAIT", "SIGN_BACK"
        ],
        "DELETE" => [
            "SIGN_WAIT", "SIGN_BACK"
        ],
        "PREVIEW",
        "SIGN_RECEIVE" => [
            "SIGN_WAIT"
        ],
        "SIGN" => [
            "SIGN_WAIT"
        ],
        "SIGN_BACK" => [
            "SIGN_SUCCESS"
        ],
        "MAKE_TOP" => [
            "SIGN_SUCCESS"
        ],
        "MAKE_TOPIC" => [
            "SIGN_SUCCESS"
        ],
        "STICKY" => [
            "SIGN_SUCCESS"
        ],
        "SIGN_RECEIVE_BY_OTHER" => [
            "SIGN_WAIT"
        ],
    ];

    /**
     * Sign constructor.
     */
    public function __construct()
    {
        $this->setWaitingStatusList(self::$handleStatusList['SIGN_WAITING']);
        $this->setDoneStatusList(self::$handleStatusList['SIGN_DONE']);
    }


    /**
     * @return array
     */
    public function getActionList(): array
    {
        return $this->actionList;
    }
}