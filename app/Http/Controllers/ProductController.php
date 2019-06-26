<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\ProductTypes;
use App\Http\Requests\StoreProductRequest;
use File;
use Validator;
class ProductController extends Controller
{
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
            //Lấy tên file
            $file_name = $file->getClientOriginalName();
            //Lấy loại file
            $file_type = $file->getMimeType();
            //Kích thước file với đơn vị byte
            $file_size = $file->getSize();
            if($file_type == 'image/png' || $file_type == 'image/jpg' || $file_type == 'image/jpeg' || $file_type == 'image/gif'){
                if($file_size <= 1048576){
                    $file_name = date('D-m-yyyy').'-'.rand().'-'.utf8tourl($file_name);
                    if($file->move('img/upload/product',$file_name)){
                        $data = $request->all();
                        $data['slug'] = utf8tourl($request->name);
                        $data['image'] = $file_name;
                        Product::create($data);
                        return redirect()->route('product.index')->with('thongbao','Đã thêm thành công sản phẩm mới');
                    }
                }else{
                    return back()->with('error','Bạn không thể upload ảnh quá 1mb');
                }
            }else{
                return back()->with('error','File bạn chọn không là hình ảnh');
            }
        }else{
            return back()->with('error','Bạn chưa thêm ảnh minh họa cho sản phẩm');
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
            //Lấy tên file
            $file_name = $file->getClientOriginalName();
            //Lấy loại file
            $file_type = $file->getMimeType();
            //Kích thước file với đơn vị byte
            $file_size = $file->getSize();
            if($file_type == 'image/png' || $file_type == 'image/jpg' || $file_type == 'image/jpeg' || $file_type == 'image/gif'){
                if($file_size <= 1048576){
                    $file_name = date('D-m-yyyy').'-'.rand().'-'.utf8tourl($file_name);
                    if($file->move('img/upload/product',$file_name)){
                        $data['image'] = $file_name;
                        if(File::exists('img/upload/product'.$product->image)){
                            //Xóa file
                            unlink('img/upload/product'.$product->image);
                        }
                    }
                }else{
                    return response()->json(['error' => 'Ảnh của bạn quá lớn chỉ được upload ảnh dưới 1mb'],200);
                }
            }else{
                return response()->json(['error' => 'File bạn chọn không là hình ảnh'],200);
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
        if(File::exists('img/upload/product/'.$product->image)){
            unlink('img/upload/product/'.$product->image);
        }
        $product->delete();
        return response()->json(['result' => 'Đã xóa thành công sản phẩm có id là '.$id],200);
    }
}
