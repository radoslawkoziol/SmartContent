<?php
/**
 * Created by PhpStorm.
 * User: Radek
 * Date: 23.10.2018
 * Time: 13:34
 */

namespace radoslawkoziol\SmartContent\DataSource\dynamics;


use App\Models\Product;
use radoslawkoziol\SmartContent\DataSource\AbstractDynamicDataSource;

class DynamicProducts extends AbstractDynamicDataSource
{

    public function generateData()
    {
        $this->data = new Product();

        if ($this->getAccountId() > 0) {
            $this->data = $this->data->whereRemoteAccountId($this->getAccountId())->where('prod_use_var', 0);
        }

        if ($this->getFilter()) {
            $this->data = $this->data->filter($this->getFilter());
        }

        $this->data = $this->data->limit($this->getLimit())->where('local_active', true)->get();

        $this->setNull($this->data->count() == 0);
    }
}