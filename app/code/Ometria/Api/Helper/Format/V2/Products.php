<?php
namespace Ometria\Api\Helper\Format\V2;
class Products
{
    static public function getBlankArray()
    {
        return [
            "@type"  => "product",
            "id"=>null,
            "title"=>null,
            "sku"=>null,
            "price"=>null,
            "url"=>null,
            "image_url"=>null,
            "attributes"=>null,
            "is_active"=>null,
            "stores"=>null,           
            "store_listing"=>null 
        ];
    }
}