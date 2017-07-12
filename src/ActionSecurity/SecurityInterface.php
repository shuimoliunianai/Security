<?php

namespace Security\ActionSecurity;

/**
 * Security Interface
 * User: dell
 * Date: 2017/7/4
 * Time: 10:57
 * @Auth Jesse
 */
interface SecurityInterface
{
    /**
     * @return mixed
     */
    public function getOptionStatus();

    /**
     * @return mixed
     */
    public function getNewsThList(): array;

    /**
     * @return mixed
     */
    public function getSearchOptionList(): array;

    /**
     * @param $new
     * @return mixed
     * @internal param $list
     */
    public function getNewsDetail(array $new): array;
}