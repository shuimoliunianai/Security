<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2017/7/7
 * Time: 10:28
 */

namespace Security\News;


use Security\Config\Config;
use Security\SecurityAccess;

class CommonNews implements News
{
    use Config;

    const HEAD_LINE_CHANNEL = 1;

    public $specialList = null;

    public $channelList = null;

    /**
     * Instance Name
     */
    const SELF_NAME = 'NEWS';

    /**
     * @var
     */
    public static $_instance;

    /**
     * @var null
     */
    public function __construct()
    {
    }

    /**
     * init
     */
    public static function init()
    {
        if (self::$_instance == null) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function getSpecialSearchOption()
    {
        if ($this->specialList == null) {
            return null;
        }
    }

    /**
     * @param array $new
     * @return array
     */
    public function handleContent(array $new): array
    {
        $new['channel'] = '';
        if ($this->channelList != null) {
            foreach ($this->channelList as $key => $value) {
                if ($value['id'] == $new['channel_id']) {
                    $new['channel'] = $value['name'];
                }
            }
        }
        if ($new['type'] == 4) {
            $new['channel'] = ($new['channel'] ?? ''). '专题';
        }else if ($new['channel_id'] != 1 && $new['headline'] == 1)
        {
            $new['channel'] = ($new['channel'] ?? ''). '头条';
        }
        $new['new_type'] = self::$styleOption['TYPE_SEARCH_OPTION'][$new['list_style']]['name'];
        return $new;
    }

    /**
     * @param array $new
     * @return array
     */
    public function handleSticky(array $new): array
    {
        if (!isset($new['option']['sticky']) || $new['option']['sticky'] == '')
        {
            return $new;
        }
        $channelId = $new['channel_id'];
        if ($channelId == self::HEAD_LINE_CHANNEL) {
            $stickyHtml = self::$newsListHtml['HEAD_LINE_STICKY']['html'];
            $stickyHtml = str_replace(['{id}', '{head_line}', '{value_channel_id}', '{request_channel_id}'], [$new['id'], $new['headline'], $channelId, SecurityAccess::$_instance->getChannel()], $stickyHtml);
        } else {
            $stickyHtml = self::$newsListHtml['STICKY']['html'];
            $stickyHtml = str_replace('?', $new['id'], $stickyHtml);
        }

        foreach (self::$topActionHtml as $key => $value) {
            $stickyHtml .= '<option value=\'' . $value['value'] . '\'';
            if ($channelId ==  self::HEAD_LINE_CHANNEL) {
                $selectTop = 'headline_top';
            } else {
                $selectTop = 'top';
            }
            if ($key == $new[$selectTop]) {
                $stickyHtml .= ' selected';
            }
            $stickyHtml .= '>' . $value['name'] . '</option>';
        }
        $stickyHtml .= '</select>';
        $new['option']['sticky'] = $stickyHtml;
        return $new;
    }

    public function getNewsHtml(): array
    {
        $newHtml = json_decode(str_replace(['area_','area'],['','news'],json_encode(self::$newsListHtml)),true);
        return $newHtml;
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
}