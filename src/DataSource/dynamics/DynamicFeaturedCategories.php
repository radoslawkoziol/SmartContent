<?php
/**
 * Created by PhpStorm.
 * User: Radek
 * Date: 23.10.2018
 * Time: 13:34
 */

namespace radoslawkoziol\SmartContent\DataSource\dynamics;


use App\Models\AccountCategory;
use App\Models\RemoteCategory;
use App\Models\UnifiedCategory;
use radoslawkoziol\SmartContent\DataSource\AbstractDynamicDataSource;

class DynamicFeaturedCategories extends AbstractDynamicDataSource
{

    public function generateData()
    {
        $unifiedCategories = [];

        if ($this->getAccountId() > 0) {
            $this->data = (new AccountCategory())->whereRemoteAccountId($this->getAccountId());
            $this->data = $this->data->where('prod_cat_parent_id', '>', 0);

        } else {
            $this->data = (new RemoteCategory());
            $this->data = $this->data->where('remote_parent_id', '>', 0);
        }

//        if ($this->getFilter()) {
//            $this->data = $this->data->filter($this->getFilter());
//        }

        $this->data = $this->data->where('prod_count', '>', 0);
        $categories = $this->data->limit($this->getLimit())->get();

        foreach ($categories as $category) {
            $unifiedCategories[] = UnifiedCategory::unifyCategory($category);
        }

        $this->data = $unifiedCategories;
        $this->setNull(count($unifiedCategories) == 0);
    }
}