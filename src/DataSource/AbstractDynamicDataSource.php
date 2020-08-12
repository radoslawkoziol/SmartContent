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
        public $category_url;

        public function __construct(int $prod_cat_id, int $account_id = -1) {

            $this->setAccountId($account_id);
            $builder = AccountCategory::select('*')->where('prod_cat_id', '=', $prod_cat_id);
            if($account_id != -1) {
                $builder->where('remote_account_id', '=', $this->getAccountId());
            }

            $this->category = $builder->first();
            if($this->category) {
                $this->null = false;
                $this->category_url = routeWithDomain('products.list', ['slug' => $this->category->slug]);
                if(!$this->title) {
                    $this->title = $this->category->prod_cat_lang_title;
                }
            }




        }



    }