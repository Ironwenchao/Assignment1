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
    
        
        $sql = "select product_name, product_type, review_detail, product.id
                from PRODUCT
                LEFT JOIN REVIEW ON PRODUCT.id = REVIEW.product_id
                LEFT JOIN PRODUCT_REVIEW ON PRODUCT_REVIEW.product_id = PRODUCT.id
                GROUP BY PRODUCT.id";
        
        
        $products = DB::select($sql);
        
        // $sql = "select review_detail from review";
        // $reviews = DB::select($sql);
        
        return view('homePage', ['products' => $products]);
    }
    
    // this function shows the product name, product type and review details via product id 
    // (because the PRODUCT.id is the primary key for the PRODUCT table, meanwhile, it is 
    // the foreign key in the table PRODUCT_REVIEW and REVIEW.)
    public function productDetail($id) {
        
        $sql = "select id from product where id = ?";
        $ids = DB::select($sql, array($id));
        
        
        $sql =  "select product_name, product_type from product where id = ?";
        $products = DB::select($sql, array($id));
        
        $sql = "select PRODUCT.product_name, PRODUCT.product_type, REVIEW.review_detail, PRODUCT.id
                from PRODUCT, REVIEW, PRODUCT_REVIEW
                where PRODUCT.id = ?
                and REVIEW.product_id = PRODUCT.id
                and PRODUCT_REVIEW.product_id = PRODUCT.id
                and REVIEW.product_id = PRODUCT_REVIEW.product_id";
        $productdetails = DB::select($sql, array($id));
        
        //dd($productdetailID);
        //dd($productdetails);
        //$productdetails = $productdetail[0];
        $id = $ids[0];
        return view('productDetail', ['id' => $id,'productdetails' => $productdetails, 'products' => $products]);
        //dd($id);
    }
    
    public function addProduct() {
        // $product_name = request("product_name");
        // $product_type = request("product_type");
        // $sql = "insert into PRODUCT (product_name, product_type) values (?, ?)";
        // DB::insert($sql, array($product_name, $product_type));
        // $id = DB::getpdo()->lastInsertId();
        $sql = "select * from MANUFACTURER";
        $manufacturers = DB::select($sql);

        return view("addProduct", ['manufacturers' => $manufacturers]);
        //dd($id);
    }
    
    public function addProductAction(Request $request) {
        $product_name = request("product_name");
        // dd($product_name);
        $product_type = request("product_type");
        //dd($product_type);
        $manufacturers_id = request("id");
        //dd($product_name);
        
        
        
        $sql = "insert into PRODUCT (product_name, product_type, manufacturer_id) values (?, ?, ?)";
        
        $a = DB::insert($sql, array($product_name, $product_type, $manufacturers_id));
        
        $id = DB::getpdo()->lastInsertId();
        
        return redirect('/');
    }
    
        // public function addProductAction(Request $request) {
        // /*
        // check if any input is empty, if validation is fail, error message will display.
        // */
        // $this->validate($request,[
        //         "product_name" => "required",
        //         "description" => "required",
        //         "date_of_release" => "required",
        //     ]);
        
        // $product_name = request("product_name");
        // $description = request("description");
        // $date_of_release = request("date_of_release");
        // $sql = "insert into product (product_name, description, date_of_release) values (?, ?, ?)";
        // DB::insert($sql, array($product_name, $description, $date_of_release));
        // $id = DB::getPdo()->lastInsertId();
        // return redirect("product-detail/$id");
        
        
    public function deleteProduct($id) {
        $sqlDeletePRODUCT = "delete from PRODUCT where id = ?";
        $sqlDeletePRODUCT_REVIEW = "delete from PRODUCT_REVIEW where product_id = ?";
        $sqlDeleteREVIEW = "delete from REVIEW where product_id = ?";
        DB::delete($sqlDeletePRODUCT, array($id));
        DB::delete($sqlDeletePRODUCT_REVIEW, array($id));
        DB::delete($sqlDeleteREVIEW, array($id));
        return redirect('/');
        // return redirect('/');
    }    
        
    //         public function deleteProduct($id) {
    //     $sqlForDeleteProduct = "delete from product where id=?";
    //     $sqlForDeleteProductOriginal = "delete from PRODUCT_ORIGINAL where product_id = ?";
    //     $sqlForDeleteReview = "delete from REVIEW where product_id=?";
    //     $sqlForDeleteQA = "delete from QA where product_id=?";
    //     DB::delete($sqlForDeleteProduct, array($id));
    //     DB::delete($sqlForDeleteProductOriginal, array($id));
    //     DB::delete($sqlForDeleteReview, array($id));
    //     DB::delete($sqlForDeleteQA, array($id));
    //     //echo "Record deleted successfully.<br/>";
    //     return view('includes.products.deleteComfirmation');
    // }
    
    public function editProduct($id) {
        $sql = 'select * from product where id = ?';
        $products = DB::select($sql, array($id));
        return view('updateProduct', compact('products'));
    }
    
    public function updateProduct(Request $request, $id) {
        $product_name = $request ->input("product_name");
        // dd($product_name);
        $product_type = $request ->input("product_type");
        $sql = "update product set product_name = ?, product_type = ? where id = ?";
        DB::update($sql, array($product_name, $product_type, $id));
        return redirect('/');
        // return view('updateProduct');
    }
    public function getManufacturer(){
        $sql = "select manufacturer_name, manufacturer_country, id
                from MANUFACTURER";
        $manufacturers = DB::select($sql);
        //dd($manufacturers);
        
        return view('manufacturer', ['manufacturers' => $manufacturers]);
    }
    
    public function getProductFromManufacturer($id){
        $sql = "select distinct(product_name)
                from MANUFACTURER, PRODUCT
                where manufacturer.id = ?
                and PRODUCT.manufacturer_id = MANUFACTURER.id";
        $productFromManufacturers = DB::select($sql, array($id));
        
        return view('ProductFromManufacturer',['productFromManufacturers' => $productFromManufacturers]);
    }
    
    
    public function editReview($id){
        $sql = 'select * from REVIEW where product_id = ?';
        $reviews = DB::select($sql, array($id));
        
        //dd($reviews);
        return view('updateReview', ['reviews' => $reviews]);
    }
    
    public function updateReview(Request $request, $id){
        $review_detail = $request -> input("review_detail");
        $sql = "update REVIEW set review_detail = ?
                where id = ?";
        DB::update($sql, array($review_detail, $id));
        return redirect('/');
    }
}
