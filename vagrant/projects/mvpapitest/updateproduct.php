<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once(__DIR__.'/vendor/autoload.php');
require __DIR__ . '/env.php';

$logPath = __DIR__. '/var/logs/updateproduct.log';



$url = $host . '/products/1';
$params = array(
  'picture' => 'image_url',
//  'sku' => 'sku',
  'name' => 'name',
  'description' => 'text',
  'price' => 2.3,
  'quality' => 1,
  'saleUnit' => 1,
  'tax' => 2.2,
  'currency' =>1,
  'createdAt' => 'now'
);
/*
Array
(
    [gksMemberId] => 1
    [productState] => 1
    [picture] => ["http:\/\/mvpga.local\/uploads\/connectsql2.png"]
    [sku] => 1
    [name] => 1
    [description] => 1
    [quality] => 1
    [saleUnit] => 1
    [currency] => 1
    [tax] => 1
    [gksPlatformId] => 1
    [amountAvailable] => 1
    [packingUnit] => 1
    [categoryId] => 21
    [brandName] => 6
    [keywords] => 6
    [gtin13Code] => 6
    [taricCode] => 6
    [shortDescription] => 6
    [additionalInfo] => 6
    [urlDeeplink] => 6
    [saleSeason1] => 1
    [saleSeason2] => 2010
    [expectedDays] => 2
    [features] => ["6","6","6","6","6"]
    [pricePolicies] => Array
        (
            [0] => Array
                (
                    [stageId] => 1
                    [price] => 1
                    [orderAmount] => 1
                    [shippingCosts] => 1
                )

            [1] => Array
                (
                    [stageId] => 2
                    [price] => 2
                    [orderAmount] => 2
                    [shippingCosts] => 2
                )

            [2] => Array
                (
                    [stageId] => 3
                    [price] => 3
                    [orderAmount] => 3
                    [shippingCosts] => 3
                )

            [3] => Array
                (
                    [stageId] => 4
                    [price] => 4
                    [orderAmount] => 4
                    [shippingCosts] => 4
                )

            [4] => Array
                (
                    [stageId] => 5
                    [price] => 5
                    [orderAmount] => 5
                    [shippingCosts] => 5
                )

        )

)
*/





$params = array
(
  // SIMPLE_PRODUCT TABLE
  'picture'=>'http://mvpga.local/uploads/connectsql2.png',
  'sku'=>'sku', // Required
  'name'=>'name', // Required
  'description'=>'description',
  'quality'=>'1', // Required
  'saleUnit'=>'1', // Required
  'currency'=>'1', // Required
  'price'=>'1.01',
  'tax'=>'1.01', // Required
  'categoryId'=>'17', // value base on category table
  'productState'=>'1', // Required
  'gksPlatformId'=>'1', // Required
  'gksMemberId'=>'1', // Required
  'tenantProductId'=>'',
  'tenantId'=>'',
  'publishedAt'=>'2018-07-01',
  'createdAt'=>'2018-07-03',
  'lastTimestampUpdate'=>'2018-07-04',

  // EXTENDED_PRODUCT TABLE
  'amountAvailable'=>'1.01', // Required
  'shortDescription'=>'short desc',
  'additionalInfo'=>'additional_info',
  'packingUnit'=>'1.01', // Required
  'expectedDays'=>'2',
  'gtin13Code'=>'gtin13_code',
  'urlDeeplink'=>'http://mvpga.local',
  'urlMarketplace'=>'http://mvpga.local',
  'isPreorderProduct'=>'1', // Required
  'saleSeason1'=>'1',
  'saleSeason2'=>'2018',
  'hasVariants'=>'1',
  'serpPromotion'=>'1',
  'brandName'=>'brand_name',
  'taricCode'=>'taric_code',
  'hitsOnProduct'=>'111',
  'isOverstockItem'=>'1',
  'minimumOrder'=>'111',
  'oldProductId'=>'111',
  'oldMemberId'=>'1',

  'features' => json_encode(["6","6","6","6","6"]),

  // PRICE_POLICYY
  'pricePolicies' => array
  (
    0 => array
    (
      'stageId' => 1,
      'price' => 1,
      'orderAmount' => 1,
      'shippingCosts' => 1,
    ),

    1 => array
    (
      'stageId' => 2,
      'price' => 2,
      'orderAmount' => 2,
      'shippingCosts' => 2,
    ),

    2 => array
    (
      'stageId' => 3,
      'price' => 3,
      'orderAmount' => 3,
      'shippingCosts' => 3,
    ),

    3 => array
    (
      'stageId' => 4,
      'price' => 4,
      'orderAmount' => 4,
      'shippingCosts' => 4,
    ),

    4 => array
    (
      'stageId' => 5,
      'price' => 5,
      'orderAmount' => 5,
      'shippingCosts' => 5,
    )

  ),

);

$tmpToken= $token;
try {

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', "Authorization: $tmpToken"));
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
  curl_setopt($ch, CURLINFO_HEADER_OUT, true);
  curl_setopt($ch, CURLOPT_HEADER, 1);

  $response = curl_exec($ch);
  $curl_info = curl_getinfo($ch);
  curl_close($ch);

  if (($curl_info['http_code']) == 200) {

    $header_size = $curl_info['header_size'];
    $header = substr($response, 0, $header_size);
    $result = substr($response, $header_size);
    $body = json_decode($result);

    echo '<pre>';print_r($curl_info['http_code']);
  }
  else{
    $header_size = $curl_info['header_size'];
    $header = substr($response, 0, $header_size);
    $result = substr($response, $header_size);
    $body = json_decode($result);

    /* echo '<pre>';print_r($curl_info);
     echo '<pre>';print_r($header_size);
     echo '<pre>';print_r($header);
     echo '<pre>';print_r($result);
     echo '<pre>';print_r($body);

     echo 'Server error';
     die;*/
  }
  echo '<pre>';print_r(time());die;

} catch (\Exception $ex) {
  $message = $ex->getMessage();
  $logger = new \Monolog\Logger('UPDATE_PRODUCT');
  $logger->pushHandler(new \Monolog\Handler\StreamHandler($logPath, \Monolog\Logger::DEBUG));
  $logger->error($message);
  echo time();
}


// DEFINE_MESSAGES
//////////////////////////////
/// INPUT DATA
/// {
//	"picture":"http:\/\/mvpga.local\/uploads\/connectsql2.png",
//	"sku":"sku",
//	"name":"name",
//	"description":"description",
//	"quality":"1",
//	"saleUnit":"1",
//	"currency":"1",
//	"price":"1.01",
//	"tax":"1.01",
//	"categoryId":"17",
//	"productState":"2afdfdfd",
//	"gksPlatformId":"1",
//	"gksMemberId":"1",
//	"tenantProductId":"",
//	"tenantId":"",
//	"publishedAt":"2018-07-02",
//	"createdAt":"2018-07-02",
//	"lastTimestampUpdate":"2018-07-02",
//	"amountAvailable":"1.01",
//	"shortDescription":"short desc",
//	"additionalInfo":"additional_info",
//	"packingUnit":"1.01",
//	"expectedDays":"2",
//	"gtin13Code":"gtin13_code",
//	"urlDeeplink":"http:\/\/mvpga.local",
//	"urlMarketplace":"http:\/\/mvpga.local",
//	"isPreorderProduct":"1",
//	"saleSeason1":"1",
//	"saleSeason2":"201fff",
//	"hasVariants":"1",
//	"serpPromotion":"1",
//	"brandName":"brand_name",
//	"taricCode":"taric_code",
//	"hitsOnProduct":"111",
//	"isOverstockItem":"1",
//	"minimumOrder":"111",
//	"features":"[\"6\",\"6\",\"6\",\"6\",\"6\"]",
//	"pricePolicies":[
//		{"stageId":1,"price":1,"orderAmount":1,"shippingCosts":1},
//		{"stageId":2,"price":2,"orderAmount":2,"shippingCosts":2},
//		{"stageId":3,"price":3,"orderAmount":3,"shippingCosts":3},
//		{"stageId":4,"price":4,"orderAmount":4,"shippingCosts":4},
//		{"stageId":5,"price":5,"orderAmount":5,"shippingCosts":5}]}
/////////////////////////// => this is standard of HTTP => please input if you need change
/// SUCCESS CASE
/// {
//    "response_code": 200,
//    "data": {
//        "extended_product": {
//            "id": 108,
//            "amount_available": "1.01",
//            "short_description": "short desc",
//            "features": "[\"6\",\"6\",\"6\",\"6\",\"6\"]",
//            "additional_info": "additional_info",
//            "packing_unit": "1.01",
//            "expected_days": 2,
//            "gtin13_code": "gtin13_code",
//            "url_deeplink": "http://mvpga.local",
//            "url_marketplace": "http://mvpga.local",
//            "is_preorder_product": 1,
//            "sale_season1": 1,
//            "sale_season2": "2018",
//            "has_variants": 1,
//            "serp_promotion": 1,
//            "brand_name": "brand_name",
//            "taric_code": "taric_code",
//            "hits_on_product": 111,
//            "is_overstock_item": 1,
//            "minimum_order": 111
//        },
//        "simple_product": {
//            "id": 16,
//            "picture": "http://mvpga.local/uploads/connectsql2.png",
//            "sku": "sku",
//            "name": "name",
//            "description": "description",
//            "quality": 1,
//            "sale_unit": 1,
//            "currency": 1,
//            "price": "1.01",
//            "tax": "1.01",
//            "product_state": 1,
//            "gks_platform_id": 1,
//            "tenant_product_id": 0,
//            "tenant_id": 0,
//            "published_at": "2018-07-02T00:00:00+0700",
//            "created_at": "2018-07-02T00:00:00+0700",
//            "last_timestamp_update": "2018-07-02T00:00:00+0700",
//            "extended_product_id": 108,
//            "category_id": 17,
//            "gks_member_id": 1,
//            "sale_unit_caption": "Stück",
//            "currency_caption": "EUR",
//            "quality_caption": "1A-Ware"
//        },
//        "price_policies": [
//            {
//                "stageId": 1,
//                "price": 1,
//                "orderAmount": 1,
//                "shippingCosts": 1
//            },
//            {
//                "stageId": 2,
//                "price": 2,
//                "orderAmount": 2,
//                "shippingCosts": 2
//            },
//            {
//                "stageId": 3,
//                "price": 3,
//                "orderAmount": 3,
//                "shippingCosts": 3
//            },
//            {
//                "stageId": 4,
//                "price": 4,
//                "orderAmount": 4,
//                "shippingCosts": 4
//            },
//            {
//                "stageId": 5,
//                "price": 5,
//                "orderAmount": 5,
//                "shippingCosts": 5
//            }
//        ]
//    }
//}
////////////////////////////////////////////
/// INTERNAL CODE   ex: http://open.wechat.com/cgi-bin/newreadtemplate?t=overseas_open/docs/oa/basic-info/return-codes
/// PRODUCT PREFIX : 10xxx
/// 10000 => The SKU field can not empty          =>
/// 10001 => The name field  can not empty        =>
/// 10002 => The description field can not empty  =>
/// 10003 => The price field can not empty        =>
/// 10004 => The condition field can not empty    =>
/// 10005 => The unit field can not empty         =>
/// 10006 => The vat field can not empty          =>
/// 10007 => The currency field can not empty     =>
/// 10008 => The publish date field can not empty =>
/// 10009 => The picture field can not empty      =>
/// 10010 => The price field wrong format         =>
/// 10011 => The tax field wrong format           =>
////////////////////////////////////////////
//////////////////
///
///////////////////////////