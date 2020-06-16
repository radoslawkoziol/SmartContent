<?php
/**
 * Created by PhpStorm.
 * User: Radek
 * Date: 23.10.2018
 * Time: 13:34
 */

namespace radoslawkoziol\SmartContent\DataSource\dynamics;


use App\Models\Product;
use App\Services\InstagramFetch;
use radoslawkoziol\SmartContent\DataSource\AbstractDynamicDataSource;

class DynamicInstagram extends AbstractDynamicDataSource
{

    public $username;
    public $limit = 6;

    /**
     * DynamicInstagram constructor.
     * @param $username
     * @param int $limit
     */
    public function __construct($username, int $limit)
    {
        $this->username = $username;
        $this->limit = $limit;
    }

    public function generateData()
    {
        $this->data = InstagramFetch::getLatestPhotos($this->username, $this->limit);
        $this->setNull(count($this->data) == 0);
    }
}