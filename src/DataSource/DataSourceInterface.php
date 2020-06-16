<?php
/**
 * Created by PhpStorm.
 * User: Radek
 * Date: 23.10.2018
 * Time: 12:00
 */

namespace radoslawkoziol\SmartContent\DataSource;


interface DataSourceInterface
{
    public function generateData();
    public function isNull();
    public function setSize(int $size);
    public function getSize();
}