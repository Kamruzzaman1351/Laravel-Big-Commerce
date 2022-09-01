<?php

namespace App\Bigcommerce;

use CoalitionTech\BigCommerceAPI\BigCommerceClient;

class BigClient extends BigCommerceClient
{
    public $store_hash;

    public $access_token;

    public $isManual = false;

    public function getStoreHash()
    {
        if (!$this->store_hash && !$this->isManual) {
            $this->store_hash = env('BIGCOMMERCE_API_STORE_HASH', false);
        }
        return $this->store_hash;
    }

    public function getAccessToken()
    {
        if (!$this->access_token) {
            $this->access_token = env('BIGCOMMERCE_API_ACCESS_TOKEN', false);
        }
        return $this->access_token;
    }
}
