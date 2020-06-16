<?php
/**
 * Created by PhpStorm.
 * User: Radek
 * Date: 23.10.2018
 * Time: 12:21
 */

namespace radoslawkoziol\SmartContent\DataSource;


abstract class AbstractStaticDataSource extends AbstractDataSource
{
    public function isNull(): bool
    {
        return false;
    }

}