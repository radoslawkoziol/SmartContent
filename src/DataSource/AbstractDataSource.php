<?php
/**
 * Created by PhpStorm.
 * User: Radek
 * Date: 23.10.2018
 * Time: 13:19
 */

namespace radoslawkoziol\SmartContent\DataSource;


abstract class AbstractDataSource implements DataSourceInterface
{
    /**
     * Link
     * @var string $href
     */
    public $href;

    /**
     * @var string $alt
     */
    public $alt;

    /**
     * @var int $size
     */
    public $size;

    /** @var bool $null */
    public $null = true;

    public function hasLink()
    {
        return strlen(trim($this->href)) > 0;
    }

    public function generateData()
    {
        // TODO: Implement render() method.
    }

    /**
     * @return bool
     */
    public function isNull(): bool
    {
        return $this->null;
    }

    /**
     * @param bool $null
     */
    public function setNull(bool $null)
    {
        $this->null = $null;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @param int $size
     */
    public function setSize(int $size)
    {
        $this->size = $size;
    }

}