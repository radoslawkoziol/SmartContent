<?php
/**
 * Created by PhpStorm.
 * User: Radek
 * Date: 23.10.2018
 * Time: 11:45
 */

namespace radoslawkoziol\SmartContent;


use radoslawkoziol\SmartContent\DataSource\DataSourceInterface;

class SmartBox
{
    /**
     * (2/4/6/8/10/12)
     * @var integer $size
     */
    public $size;

    /**
     * (0.5/1/2/3)
     * @var float $height
     */
    public $height = 1.0;

    /**
     * (slider/block/tile/cms/list)
     * @var string $displayType
     */
    public $displayType;

    /**
     * (product/category/text/image)
     * @var string $contentType
     */
    public $contentType;

    /**
     * @var DataSourceInterface $dataSource
     */
    public $dataSource;

    /**
     * @var array $styles
     */
    public $styles = [];

    /** @var array $classes */
    public $classes = [];

    /**
     * @var bool
     */
    public $extraWide = false;

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

    /**
     * @return float
     */
    public function getHeight(): float
    {
        return $this->height;
    }

    /**
     * @param float $height
     */
    public function setHeight(float $height)
    {
        $this->height = $height;
    }

    /**
     * @return string
     */
    public function getDisplayType(): string
    {
        return $this->displayType;
    }

    /**
     * @param string $displayType
     */
    public function setDisplayType(string $displayType)
    {
        $this->displayType = $displayType;
    }

    /**
     * @return string
     */
    public function getContentType(): string
    {
        return $this->contentType;
    }

    /**
     * @param string $contentType
     */
    public function setContentType(string $contentType)
    {
        $this->contentType = $contentType;
    }

    /**
     * @return DataSourceInterface
     */
    public function getDataSource(): DataSourceInterface
    {
        return $this->dataSource;
    }

    /**
     * @param DataSourceInterface $dataSource
     */
    public function setDataSource(DataSourceInterface $dataSource)
    {
        $this->dataSource = $dataSource;
        $this->dataSource->setSize($this->getSize());
    }

    public function getContent()
    {
        $this->getDataSource()->generateData();
        return view('smart_box.' . $this->getDisplayType() . '.' . $this->getContentType() , ['data' => $this->getDataSource()]);

    }

    /**
     * @return array
     */
    public function getStyles(): array
    {
        return $this->styles;
    }

    /**
     * @param array $styles
     */
    public function setStyles(array $styles)
    {
        $this->styles = $styles;
    }

    /**
     * @return bool
     */
    public function isExtraWide(): bool
    {
        return $this->extraWide;
    }

    /**
     * @param bool $extraWide
     */
    public function setExtraWide(bool $extraWide)
    {
        $this->extraWide = $extraWide;
    }

    /**
     * @return array
     */
    public function getClasses(): array
    {
        return $this->classes;
    }

    /**
     * @param array $classes
     */
    public function setClasses(array $classes)
    {
        $this->classes = $classes;
    }

}