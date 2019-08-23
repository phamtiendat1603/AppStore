<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\ProductTypes;
use App\Http\Requests\StoreProductRequest;
use File;
use Validator;
use App\Services\ImageService;
class ProductController extends Controller
{
    protected $image_service;
    public function __construct(ImageService $imageService) {
        $this->image_service = $imageService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::where('status',1)->paginate(5);
        return view('admin.pages.product.list',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Categories::where('status',1)->get();
        $producttype = ProductTypes::where('status',1)->get();
        return view('admin.pages.product.add',compact('category','producttype'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest;  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        if($request->hasFile('image')){
            $file = $request->image;
            if( $this->image_service->checkFile($file) == 1) {
                $fileName = $this->image_service->moveImage($file, 'img/upload/product');
                if($fileName != 0) {
                    $data = $request->all();
                    $data['slug'] = utf8tourl($request->name);
                    $data['image'] = $fileName;
                    Product::create($data);
                    return redirect()->route('product.index')->with('thongbao','Đã thêm thành công sản phẩm mới');
                }
            } elseif ( $this->image_service->checkFile($file) == 0) {
                return back()->with('error','Ảnh của bạn quá lớn chỉ được upload ảnh dưới 1mb');
            } else {
                return back()->with('error','File bạn chọn không là hình ảnh');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Categories::where('status',1)->get();
        $producttype = ProductTypes::where('status',1)->get();
        $product = Product::find($id);
        return response()->json(['category' => $category, 'producttype' => $producttype, 'product' => $product],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, $id)
    {
        $product = Product::find($id);
        $data = $request->all();
        $data['slug'] = utf8tourl($request->name);
        if($request->hasFile('image')){
            $file = $request->image;
            if( $this->image_service->checkFile($file) == 1) {
                $nameImage = $this->image_service->moveImage($file, 'img/upload/product');
                if($nameImage != 0) {
                    $data['image'] = $nameImage;
                }
            } elseif ( $this->image_service->checkFile($file) == 0) {
                return response()->json(['result' => 'Ảnh của bạn quá lớn chỉ được upload ảnh dưới 1mb '.$id],200);
            } 
        }else{
            $data['image'] = $product->image;
        }
        $product->update($data);
        return response()->json(['result' => 'Đã sửa thành công sản phẩm có id là '.$id],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $this->image_service->deleteFile($product->image, 'img/upload/product');
        $product->delete();
        return response()->json(['result' => 'Đã xóa thành công sản phẩm có id là '.$id],200);
    }
}
