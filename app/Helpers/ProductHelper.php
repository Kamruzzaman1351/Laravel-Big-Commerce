<?php

namespace App\Helpers;

use App\Bigcommerce\HasCustomFields;
use CoalitionTech\BigCommerceAPI\BigCommerce;

class ProductHelper extends BigCommerce
{
    use HasCustomFields;

    protected $endPoint = 'catalog/products';
}
