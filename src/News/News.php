<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2017/7/7
 * Time: 10:29
 */

namespace Security\News;


interface News
{
    /**
     * @return mixed
     */
    public function getCreateButton();

    /**
     * @return mixed
     */
    public function getThList();

    /**
     * @param array $new
     * @return mixed
     */
    public function handleContent(array $new);

    public function getNewsHtml():array;
}