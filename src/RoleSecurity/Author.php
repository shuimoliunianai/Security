<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2017/7/4
 * Time: 11:38
 */

namespace Security\RoleSecurity;


class Author extends AbstractRole implements Role
{
    public $roleId = 1;
    /**
     * The Action allow by role and news status.
     * @var array
     * @Auth Jesse
     * @Date 2017/7/5
     */
    public $actionList = [
        "EDIT" => [
            "AUTHOR_BACK", "REVIEW_FAIL"
        ],
        "DELETE" => [
            "AUTHOR_BACK", "REVIEW_FAIL"
        ],
        "PREVIEW",
        "AUTHOR_BACK" => [
            "REVIEW_WAIT"
        ]
    ];

    /**
     * @return array
     */
    public function getActionList(): array
    {
        return $this->actionList;
    }
}