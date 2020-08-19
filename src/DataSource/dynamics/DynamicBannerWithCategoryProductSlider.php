<?php

namespace radoslawkoziol\SmartContent\DataSource\dynamics;

use App\Models\AccountCategory;
use App\Models\UnifiedCategory;
use App\Repositories\UnifiedCategoryRepository;
use radoslawkoziol\SmartContent\DataSource\AbstractDynamicDataSource;

class DynamicBannerWithCategoryProductSlider extends AbstractDynamicDataSource {

    /** @var UnifiedCategory|null $category */
    public $category;
    public $products = [];
    public $title;
    public $banner_image;
    public $banner_mobile_image;
    public $category_url;

    public function __construct($slug) {

        $this->setAccountId(-1);
        $this->category = resolve(UnifiedCategoryRepository::class)->getBySlugOrId(-1, $slug);

        if(!$this->category) return;
        $this->products = $this->category->getBestProductsGlobal();
        $this->null = false;
        $this->category_url = routeWithDomain('products.list', ['slug' => $slug]);

    }



}