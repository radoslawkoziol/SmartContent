<?php

    namespace radoslawkoziol\SmartContent\DataSource\dynamics;

    use App\Models\AccountCategory;
    use App\Models\UnifiedCategory;
    use radoslawkoziol\SmartContent\DataSource\AbstractDynamicDataSource;

    class DynamicBannerWithCategoryProductSlider extends AbstractDynamicDataSource {

        /** @var AccountCategory $category */
        public $category;
        public $products = [];
        public $title;
        public $banner_image;
        public $banner_mobile_image;
        public $href;

        public function __construct(int $prod_cat_id, int $account_id) {

            $this->null = false;
            $this->setAccountId($account_id);
            $this->category = AccountCategory::select('*')
                        ->where('prod_cat_id', '=', $prod_cat_id)
                        ->where('remote_account_id', '=', $this->getAccountId())
                        ->first();

        }



    }