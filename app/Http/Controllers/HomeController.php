<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Categories;
use App\Models\ProductTypes;
use App\Models\Product;

use Cart;
use Auth;
class HomeController extends Controller
{
    public function __construct(){
    	$category = Categories::where('status',1)->get();
    	$producttype = ProductTypes::where('status',1)->get();
    	view()->share(['category' => $category,'producttype' => $producttype]);
    }

    public function index(){
        $product1 = Product::where('status',1)->where('idCategory',1)->get();
        $product2 = Product::where('status',1)->where('idCategory',3)->get();
		return view('client.pages.index',['prosamsung' => $product1, 'proTaiNghe' => $product2]);
	}

    public function getDetail($slug) {
        $productDetail = Product::where('slug', $slug)->first();
        $idProType = ProductTypes::where('slug', $slug)->first();
        
        if (count($productDetail) > 0) {
            return view('client.pages.detail', ['product' => $productDetail]);
        }
        else if( count($idProType) > 0 ) {
            $productByProdType = Product::where('idProductType', $idProType->id)->get();
            return view('client.pages.detail_protype', ['product' => $productByProdType, 'producttype' => $idProType]);
        }
    }
}
