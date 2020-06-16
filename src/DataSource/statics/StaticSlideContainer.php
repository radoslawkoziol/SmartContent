<?php
/**
 * Created by PhpStorm.
 * User: Radek
 * Date: 23.10.2018
 * Time: 12:25
 */

namespace radoslawkoziol\SmartContent\DataSource\statics;


use radoslawkoziol\SmartContent\DataSource\AbstractStaticDataSource;
use radoslawkoziol\SmartContent\SmartBox;

class StaticSlideContainer extends AbstractStaticDataSource
{
    /** @var SmartBox[] */
    public $slides;

    public function addSlide(SmartBox $slide)
    {
        $this->slides[] = $slide;
    }

    /**
     * @return SmartBox[]
     */
    public function getSlides(): array
    {
        return $this->slides;
    }

    /**
     * @param SmartBox[] $slides
     */
    public function setSlides(array $slides)
    {
        $this->slides = $slides;
    }



}