<?php

namespace Security\RoleSecurity;

/**
 * Review Role
 * User: dell
 * Date: 2017/7/4
 * Time: 11:38
 * @Auth Jesse
 */
class Review extends Author implements Role
{
    /**
     * @var int
     */
    public $roleId = 2;

    /**
     *  The Action allow by role and news status.
     * @var array
     */
    public $actionList = [
        "EDIT" => [
            "REVIEW_WAIT", "SIGN_FAIL", "REVIEW_BACK"
        ],
        "DELETE" => [
            "REVIEW_WAIT", "SIGN_FAIL", "REVIEW_BACK"
        ],
        "PREVIEW",
        "REVIEW_RECEIVE" => [
            "REVIEW_WAIT"
        ],
        "REVIEW" => [
            "REVIEW_WAIT"
        ],
        "REVIEW_BACK" => [
            "SIGN_WAIT"
        ],
        "REVIEW_RECEIVE_BY_OTHER" => [
            "REVIEW_WAIT"
        ],
    ];

    /**
     * Review constructor.
     */
    public function __construct()
    {
        $this->setWaitingStatusList(self::$handleStatusList['REVIEW_WAITING']);
        $this->setDoneStatusList(self::$handleStatusList['REVIEW_DONE']);
    }

    /**
     * @return array
     */
    public function getActionList(): array
    {
        return $this->actionList;
    }
}