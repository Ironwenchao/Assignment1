<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\Middleware\ShareErrorsFromSession ;
use DB;

class PageController extends Controller
{
//     // This function use for get the product's manufacturer name
//     public function getManufacturer() {
//         $sql = "SELECT MANUFACTURER.id, MANUFACTURER.manufacturer_name, MANUFACTURER.manufacturer_country 
//                 FROM MANUFACTURER, PRODUCT
//                 WHERE MANUFACTURER.manufacturer_id = PRODUCT.manufacturer_id
//                 GROUP BY MANUFACTURER.id
//                 ORDER BY MANUFACTURER.manufacturer_name ASC;";
//         $productManufacturers = DB::select($sql);
//     }
    
    public function getProduct() {
        
        $sql = "select product_name, product_type, review_detail 
                from PRODUCT, PRODUCT_REVIEW, REVIEW
                WHERE PRODUCT.id = PRODUCT_REVIEW.product_id
                and PRODUCT_REVIEW.product_id = REVIEW.product_id";
        
        // $sql = "select * from product";
        
        // $sql = "SELECT PRODUCT.id, PRODUCT.product_name, PRODUCT.product_type
        //         FROM PRODUCT, PRODUCT_REVIEW, REVIEW
        //         WHERE PRODUCT_id = PRODUCT_REVIEW.product_id = REVIEW.product_id
        //         GROUP BY PRODUCT_id
        //         ORDER BY PRODUCT.product_name ASC;";
        //$productdetails = DB::select($sql);
        $products = DB::select($sql);
        
        // $sql = "select review_detail from review";
        // $reviews = DB::select($sql);
        
        return view('homePage', ['products' => $products]);
    }
}