<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2017/7/7
 * Time: 10:29
 */

namespace Security\News;


use Security\Config\Config;

class GovernNews implements News
{
    use Config;

    /**
     * Instance Name
     */
    const SELF_NAME = 'GOVERN';

    /**
     * @var
     */
    public static $_instance;

    /**
     * @var null
     */
    public $governList = null;

    /**
     * @var null
     */

    public function __construct()
    {
    }

    /**
     * @return GovernNews
     */
    public static function init()
    {
        if (self::$_instance == null) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * @param array $new
     * @return array
     */
    public function handleContent(array $new): array
    {
        $new['channel'] = '';
        $channelId = $new['channel_id'];
        if ($this->governList != null) {
            foreach ($this->governList as $key => $value) {
                if ($value['id'] == $channelId) {
                    $new['channel'] = $value['name'];
                }
            }
        }
        if ($new['headline'] == 1)
        {
            $new['channel'] = $new['channel'].' (头条)';
        }
        $new['new_type'] = self::$styleOption['TYPE_SEARCH_OPTION'][$new['list_style']]['name'];
        return $new;
    }
    /**
     * Get type search option
     */
    public static function getGovernTypeSearchOption()
    {
        $searchOption = self::$styleOption['TYPE_SEARCH_OPTION'];
        return $searchOption;
    }

    /**
     * @return null|string
     */
    public function getCreateButton(): string
    {
        return self::$createButton[self::SELF_NAME];
    }

    /**
     * @param null|string $createButton
     */
    public function setCreateButton(string $createButton)
    {
        self::$createButton[self::SELF_NAME] = $createButton;
    }

    /**
     * @return array|null
     */
    public function getThList(): array
    {
        return self::$thList[self::SELF_NAME];
    }

    /**
     * @param array|null $thList
     */
    public function setThList(array $thList)
    {
        self::$thList[self::SELF_NAME] = $thList;
    }

    /**
     * @return array
     */
    public function getNewsHtml():array {
        $newHtml = json_decode(str_replace('area','govern',json_encode(self::$newsListHtml)),true);
        return $newHtml;
    }

    /**
     * @param array $new
     * @return array
     */
    public function handleSticky(array $new):array
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
}