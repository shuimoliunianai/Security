<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2017/7/7
 * Time: 10:28
 */

namespace Security\News;


use Security\Config\Config;

class AreaNews implements News
{
    use Config;

    /**
     * Instance Name
     */
    const SELF_NAME = 'AREA';

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

    public static function init()
    {
        if (self::$_instance == null)
        {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * @param array $new
     * @return array
     */
    public function handleContent(array $new):array
    {
        return $new;
    }

    /**
     * @return null|string
     */
    public function getCreateButton():string
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
        return self::$newsListHtml;
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