<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2017/7/7
 * Time: 11:06
 */

namespace Security\News;


use Security\Error\ErrorTrait;

class NewsProvider
{
    /**
     *  ErrorTrait
     */
    use ErrorTrait;

    /**
     * News
     */
    const NEWS = 1;

    /**
     * Govern
     */
    const Govern = 2;

    /**
     * AREA
     */
    const AREA = 3;


    /**
     * Create News Instance
     * @param int $type_id
     * @return News
     */
    public static function getNewsInstance(int $type_id): News
    {
        switch ($type_id) {
            case self::NEWS :
                return CommonNews::init();
                break;
            case self::Govern:
                return GovernNews::init();
                break;
            case self::AREA:
                return AreaNews::init();
                break;
            default :
                return null;
                break;
        }
    }
}