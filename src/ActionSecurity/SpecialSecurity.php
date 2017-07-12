<?php

namespace Security\ActionSecurity;

/**
 * Security for special
 * User: dell
 * Date: 2017/7/4
 * Time: 11:04
 * @Auth Jesse
 */
class SpecialSecurity extends AbstractSecurity implements SecurityInterface
{

    const TOP_CHANNEL = 1;
    const TOPIC_CHANNEL = 11;
    /**
     * @var int
     */
    protected $localCurrentRole = 0;

    /**
     * @var int
     */
    protected $localCurrentChannel = 0;
    /**
     * @var null
     */
    protected static $_instance = null;

    /**
     * @return SpecialSecurity|null
     */
    public static function init()
    {
        if (self::$_instance == null) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * SpecialSecurity constructor.
     */
    public function __construct()
    {
        $this->getCurrentRole();
        $this->getCurrentChannel();
    }

    /**
     * @return mixed
     */
    public function getOptionStatus()
    {

    }

    /**
     * Add the channel adjust for filter special role on special news
     * @return array
     */
    public function getNewsThList(): array
    {
        $thList = $this->getNews()->getThList();
        if ($this->getRole()->roleId == 3) {
            if ($this->getChannelId() == self::TOP_CHANNEL) {
                unset($thList['MAKE_TOP']);
            }
            if ($this->getChannelId() == self::TOPIC_CHANNEL) {
                unset($thList['MAKE_TOPIC']);
            }
            if ($this->localCurrentRole == 1) {
                unset($thList['MAKE_TOPIC']);
            } else if ($this->localCurrentRole == 2) {
                unset($thList['MAKE_TOP']);
            }
            return $thList;
        } else {
            unset($thList['MAKE_TOPIC']);
            unset($thList['MAKE_TOP']);
            return $thList;
        }
    }


    /**
     * @param array $new
     * @return array
     * @Auth Jesse
     * @Date 2017/7/5
     */
    public function getNewsDetail(array $new): array
    {
        $new = $this->getTopOrTopicOption($new);
        return parent::getNewsDetail($new);
    }

    /**
     * @param $new
     * @return array
     */
    public function getTopOrTopicOption(array $new): array
    {
        if ($this->localCurrentRole == 1) {
            $new = $this->getTopOption($new);
        } else if ($this->localCurrentRole == 2) {
            $new = $this->getTopicOption($new);
        } else {
            return $new;
        }
        return $new;
    }

    /**
     * Get Top Option
     * @param $new
     * @return mixed
     * @Auth Jesse
     * @Date 2017/7/5
     */
    public function getTopOption(array $new): array
    {
        $allowAction = $this->getRole()->getActionList();
        if (!isset($allowAction['MAKE_TOP'])) {
            return $new;
        }
        if ($this->getChannelId() == self::TOP_CHANNEL) {
            return $new;
        }
        if ($new['channel_id'] == self::TOP_CHANNEL && $this->getChannelId() != -1) {
            $new['top_display'] = self::$newsListHtml['NOT_ALLOW'];
            return $new;
        }
        if ($new['status'] == self::$newsStatus['SIGN_SUCCESS']['value']) {
            if ($new['headline'] == 1) {
                $topHtml = str_replace('?', $new['id'], $this->getNewsHtml()['MAKE_TOP']['top_done']);
            } else {
                $topHtml = str_replace('?', $new['id'], $this->getNewsHtml()['MAKE_TOP']['top_before']);
            }
        } else if ($new['status'] == 0) {
            $topHtml = self::$newsListHtml['MAKE_TOP']['top_delete'];
        } else {
            $topHtml = self::$newsListHtml['MAKE_TOP']['top_common'];
        }
        $new['top_display'] = $topHtml;
        return $new;
    }

    /**
     * Get Topic Option
     * @param $new
     * @return mixed
     * @Auth Jesse
     * @Date 2017/7/5
     */
    public function getTopicOption(array $new): array
    {
        $topicHtml = '';
        $allowAction = $this->getRole()->getActionList();
        if (!isset($allowAction['MAKE_TOPIC'])) {
            return $new;
        }
        if ($this->getChannelId() == self::TOPIC_CHANNEL) {
            return $new;
        }
        if ($new['type'] == 4) {
            $new['topic_display'] = self::$newsListHtml['NOT_ALLOW'];
            return $new;
        }
        if ($new['status'] == self::$newsStatus['SIGN_SUCCESS']['value']) {
            if ($new['special_id'] == '' || $new['special_id'] == null) {
                if (!($new['type'] == 4 || $new['type'] == 1 && $new['channel_id'] == 11)) {
                    $topicHtml = str_replace('?', $new['id'], $this->getNewsHtml()['MAKE_TOPIC']['topic_before']);
                }
            } else {
                if (!($new['type'] == 4 || $new['type'] == 1 && $new['channel_id'] == 11)) {
                    $topicHtml = str_replace('?', $new['id'], $this->getNewsHtml()['MAKE_TOPIC']['topic_done']);
                }
            }
        } else if ($new['status'] == 0) {
            $topicHtml = self::$newsListHtml['MAKE_TOPIC']['topic_delete'];
        } else {
            $topicHtml = self::$newsListHtml['MAKE_TOPIC']['topic_common'];
        }
        $new['topic_display'] = $topicHtml;
        return $new;
    }

    /**
     * @Override handleSticky
     * @param array $new
     * @return array
     */
    public function handleSticky(array $new): array
    {
        return $this->getNews()->handleSticky($new);
    }

    /**
     * @param int $currentRole
     */
    public function setCurrentRole(int $currentRole)
    {
        $this->localCurrentRole = $currentRole;
    }

    /**
     * Get current Role by login info
     * @Auth Jesse
     * @Date 2017/7/4
     */
    public function getCurrentRole()
    {
        $loginInfo = $_SESSION['admin'];
        if (isset($loginInfo['current_role']['name']) && in_array($loginInfo['current_role']['name'], self::$currentRole)) {
            $this->setCurrentRole(array_search($loginInfo['current_role']['name'], self::$currentRole));
        }
    }

    public function getCurrentChannel()
    {
        $loginInfo = $_SESSION['admin'];
        if (isset($loginInfo['current_role']['channel'])) {
            $this->setLocalCurrentChannel($loginInfo['current_role']['channel']);
        }
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
        unset($allowActionList['MAKE_TOP']);
        unset($allowActionList['MAKE_TOPIC']);
        return $allowActionList;
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