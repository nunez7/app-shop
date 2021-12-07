<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
       $products = Product::paginate(3);
       return view('admin.products.index', compact('products'));
    }
    public function create(){
        $product = new Product();
        $categories = Category::pluck('name', 'id');
        return view('admin.products.create', compact('product', 'categories'));
    }
    public function store(Request $request){
        //registra el nuevo producto
        //dd($request->all());
        request()->validate(Product::$rules);

        $product = Product::create($request->all());

        return redirect('/admin/products');
    }
    public function edit($id){
        //return "mostrar aqui el id: $id";
        $product = Product::find($id);
        $categories = Category::pluck('name', 'id');
        return view('admin.products.edit', compact('product', 'categories'));
    }
    
    public function update($id){
        request()->validate(Product::$rules);
        //$libro->update($request->all());
        $datos = request()->except(['_token', '_method']);
        Product::where('id','=',$id)->update($datos);
        return redirect('/admin/products');
    }

    public function destroy($id){
        $imagenes = ProductImage::where("product_id","=", $id)->delete();
        $libro = Product::where("id","=", $id)->delete();
        return redirect('/admin/products');
    }
}
