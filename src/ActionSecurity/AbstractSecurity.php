<?php

namespace Security\ActionSecurity;


use Security\Config\Config;
use Security\News\News;
use Security\RoleSecurity\Role;

/**
 * Action Security
 * User: dell
 * Date: 2017/7/4
 * Time: 15:10
 * @Auth Jesse
 */
class AbstractSecurity
{
    use Config;

    /**
     * Default Black
     */
    const DEFAULT_BLACK = '';
    /**
     * Role Object
     * @var
     */
    public $role;

    /**
     * News Instance
     * @var
     */
    public $news;

    /**
     * @var
     */
    public $status;

    /**
     * @var int
     */
    public $channelId = -1;

    /**
     * @var
     */
    public static $newHtml = null;


    /**
     * AbstractSecurity constructor.
     */
    public function __construct()
    {

    }

    /**
     * @param $status
     * @return array
     */
    public function statusRelationHandle($status): array
    {
        if (array_key_exists($status, self::$newsStatus)) {
            return self::$newsStatus[$status];
        } else {
            return null;
        }
    }

    /**
     * @return array|null
     */
    public function getSearchOptionList(): array
    {
        $role = $this->getRole();
        $status = $this->getStatus();
        if ($role->roleId == 1) {
            return self::$newsStatus;
        }
        $waitingList = $role->getWaitingStatusList();
        if (in_array(self::$statusRelation[$status], $waitingList)) {
            $response = array_map(array("self", "statusRelationHandle"), $waitingList);
            return $response;
        }
        $doneList = $role->getDoneStatusList();
        if (in_array(self::$statusRelation[$status], $doneList)) {
            $response = array_map(array("self", "statusRelationHandle"), $doneList);
            return $response;
        }
        return null;
    }

    /**
     * Handle new detail
     * @param $new
     * @return mixed
     * @Auth Jesse
     * @Date 2017/7/5
     */
    public function getNewsDetail(array $new): array
    {
        $new['option'] = self::DEFAULT_BLACK;
        $new['common_option'] = self::DEFAULT_BLACK;
        $allowActionList = $this->getAllowActionList();
        $newListHtml = $this->getNewsHtml();
        foreach ($allowActionList as $key => $value) {
            if (is_array($value)) {
                if (in_array(self::$statusRelation[$new['status']], $value)) {
                    if ($this->checkActionByStatus($key, $new) === false) {
                        continue;
                    }
                    $new[$newListHtml[$key]['location']][strtolower($key)] = str_replace('?', $new['id'], $newListHtml[$key]['html']);
                }
            } else {
                $new[$newListHtml[$value]['location']][strtolower($value)] = str_replace('?', $new['id'], $newListHtml[$value]['html']);
            }
        }
        $new['status'] = str_replace(['{class}', '{name}'], [self::$newsStatusStyle[$new['status']]['class'], self::$newsStatusStyle[$new['status']]['name']], $newListHtml['STATUS']);
        $new = $this->newsSpecialContentHandleByNewsInstance($new);
        $new = $this->newHtmlTrance($new);
        return $new;
    }

    /**
     * @return null
     */
    public function getCreateButton()
    {
        $createButton = null;
        if ($this->getRole()->roleId == 1) {
            $createButton = self::getNews()->getCreateButton();
        }
        return $createButton;
    }

    /**
     * @return mixed
     * @internal param $new
     */
    public function getAllowActionList(): array
    {
        return self::getRole()->getActionList();
    }

    /**
     * @param $action
     * @param $new
     * @return bool
     */
    protected function checkActionByStatus(string $action, array $new): bool
    {
        switch ($action) {
            case 'REVIEW_RECEIVE':
                if ($new['get_status_trial'] == self::$receiveStatus['NOT_APPOINT'] && ($new['trial_id'] == 0 || $new['trial_id'] == null)) {
                    return true;
                } else {
                    return false;
                }
                break;
            case 'REVIEW':
                if (($new['get_status_trial'] == self::$receiveStatus['APPOINT'] && $new['trial_id'] == $this->getLoginUserId()) || ($new['get_status_trial'] == self::$receiveStatus['RECEIVED'] && $new['trial_id'] == $this->getLoginUserId())) {
                    return true;
                } else {
                    return false;
                }
                break;
            case 'SIGN_RECEIVE':
                if ($new['get_status_sign'] == self::$receiveStatus['NOT_APPOINT'] && ($new['sign_id'] == 0 || $new['sign_id'] == null )) {
                    return true;
                } else {
                    return false;
                }
                break;
            case 'SIGN':
                if (($new['get_status_sign'] == self::$receiveStatus['APPOINT'] && $new['sign_id'] == $this->getLoginUserId()) || ($new['get_status_sign'] == self::$receiveStatus['RECEIVED'] && $new['sign_id'] == $this->getLoginUserId())) {
                    return true;
                } else {
                    return false;
                }
                break;
            case 'AUTHOR_BACK':
                if ($new['creator'] == $this->getLoginUserId()) {
                    return true;
                } else {
                    return false;
                }
                break;
            case 'REVIEW_BACK':
                if ($new['trial_id'] == $this->getLoginUserId()) {
                    return true;
                } else {
                    return false;
                }
                break;
            case 'SIGN_BACK':
                if ($new['sign_id'] == $this->getLoginUserId()) {
                    return true;
                } else {
                    return false;
                }
                break;
            case 'REVIEW_RECEIVE_BY_OTHER':
                if ($new['get_status_trial'] == self::$receiveStatus['RECEIVED'] && $new['trial_id'] != $this->getLoginUserId()) {
                    return true;
                } else {
                    return false;
                }
                break;
            case 'SIGN_RECEIVE_BY_OTHER':
                if ($new['get_status_sign'] == self::$receiveStatus['RECEIVED'] && $new['sign_id'] != $this->getLoginUserId()) {
                    return true;
                } else {
                    return false;
                }
                break;
            default:
                return true;
                break;

        }
    }


    /**
     * Html Trance,this function has some bad code.
     * @param array $new
     * @return array
     * @Auth Jesse
     * @Date 2017/7/6
     */
    protected function newHtmlTrance(array $new): array
    {
        $new = $this->handleSticky($new);
        if (isset($new['option']['review_receive_by_other']) && !empty($new['option']['review_receive_by_other'])) {
            $new['option']['review_receive_by_other'] = str_replace($new['id'], $new['trial_name'], $new['option']['review_receive_by_other']);
            unset($new['common_option']['edit']);
            unset($new['common_option']['delete']);
        }
        if (isset($new['option']['sign_receive_by_other']) && !empty($new['option']['sign_receive_by_other'])) {
            $new['option']['sign_receive_by_other'] = str_replace($new['id'], $new['sign_name'], $new['option']['sign_receive_by_other']);
            unset($new['common_option']['edit']);
            unset($new['common_option']['delete']);
        }
        if (!empty($new['option'])) {
            $new['option'] = implode('', $new['option']);
        }
        if (!empty($new['common_option'])) {
            $new['common_option'] = implode('', $new['common_option']);
        }
        return $new;
    }

    /**
     * @param array $new
     * @return array
     */
    public function handleSticky(array $new): array
    {
        if (isset($new['option']['sticky']) && $new['option']['sticky'] != '') {
            $stickyHtml = $new['option']['sticky'];
            $stickyHtml = str_replace('?', $new['id'], $stickyHtml);
            foreach (self::$topActionHtml as $key => $value) {
                $stickyHtml .= '<option value=\'' . $value['value'] . '\'';
                if ($key == $new['top']) {
                    $stickyHtml .= ' selected';
                }
                $stickyHtml .= '>' . $value['name'] . '</option>';
            }
            $stickyHtml .= '</select>';
            $new['option']['sticky'] = $stickyHtml;
        }
        return $new;
    }

    /**
     * Handle SpecialContent
     * @param $new
     * @return array
     * @Auth Jeese
     * @Date 2017/7/7
     */
    public function newsSpecialContentHandleByNewsInstance($new): array
    {
        return $this->getNews()->handleContent($new);
    }

    /**
     * Get new Html
     */
    public function getNewsHtml()
    {
        if (self::$newHtml == null) {
            self::$newHtml = $this->getNews()->getNewsHtml();
        }
        return self::$newHtml;
    }

    /**
     * @return mixed
     */
    public function getRole(): Role
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole(Role $role)
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus(int $status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getNews(): News
    {
        return $this->news;
    }

    /**
     * @param mixed $news
     */
    public function setNews(News $news)
    {
        $this->news = $news;
    }

    /**
     * @return int
     */
    public function getChannelId(): int
    {
        return $this->channelId;
    }

    /**
     * @param int $channelId
     */
    public function setChannelId(int $channelId)
    {
        $this->channelId = $channelId;
    }

    /**
     * @return mixed
     */
    public function getLoginUserId()
    {
        return $_SESSION['admin']['id'];
    }

}