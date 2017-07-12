<?php

namespace Security\ActionSecurity;


/**
 * Security logic for admin
 * User: dell
 * Date: 2017/7/4
 * Time: 11:01
 * @Auth Jesse
 */
class AdminSecurity extends AbstractSecurity implements SecurityInterface
{
    protected $localCurrentChannel = 0;
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
    public function getNewsThList(): array
    {
        $thList = $this->getNews()->getThList();
        $role = $this->getRole();
        if ($role->roleId == 3) {
            if ($this->localCurrentChannel == 1)
            {
               unset($thList['MAKE_TOP']);
            }
            return $thList;
        } else {
            unset($thList['MAKE_TOP']);
            unset($thList['MAKE_TOPIC']);
            return $thList;
        }
    }

    /**
     * @param $new
     * @return mixed
     */
    public function getNewsDetail(array $new): array
    {
        $new = $this->getTopAndTopicOption($new);
        return parent::getNewsDetail($new);
    }

    /**
     * @param $new
     * @return array|mixed
     */
    public function getTopAndTopicOption($new): array
    {
        $specialInstance = SpecialSecurity::init();
        $specialInstance->setRole(self::getRole());
        $specialInstance->setStatus(self::getStatus());
        $specialInstance->setChannelId(self::getChannelId());
        $specialInstance->setNews(self::getNews());
        $new = $specialInstance->getTopOption($specialInstance->getTopicOption($new));
        return $new;
    }

    /**
     * @return mixed
     */
    public function getAllowActionList(): array
    {
        $allowActionList = $this->getRole()->getActionList();
        unset($allowActionList['MAKE_TOP']);
        unset($allowActionList['MAKE_TOPIC']);
        return $allowActionList;
    }

    public function getLoginChannel()
    {
        $loginInfo = $_SESSION['admin'];
        if (isset($loginInfo['current_role']['channel'])) {
            $this->setLocalCurrentChannel($loginInfo['current_role']['channel']);
        }
    }

    /**
     * @return int
     */
    public function getLocalCurrentChannel(): int
    {
        return $this->localCurrentChannel;
    }

    /**
     * @param int $localCurrentChannel
     */
    public function setLocalCurrentChannel(int $localCurrentChannel)
    {
        $this->localCurrentChannel = $localCurrentChannel;
    }

}