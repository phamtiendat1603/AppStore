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
}
