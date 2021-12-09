<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    //
    public function index($id)
    {
        $product = Product::find($id);
        $images = $product->images()->orderBy('featured', 'desc')->get();
        return view('admin.products.images.index', compact('product', 'images'));
    }

    public function store(Request $request, $id)
    {
        //Guardar la imagen en el proyecto
        $file = $request->file('photo');
        $path = public_path() . '/images/products';
        $fileName = uniqid() . $file->getClientOriginalName();
        $moved = $file->move($path, $fileName);
        if ($moved) {
            //Guardar la ruta en la BD
            $productImage = new ProductImage();
            $productImage->image = $fileName;
            //$productImage->featured = false;
            $productImage->product_id = $id;
            $productImage->save();
        }

        return back();
    }

    public function destroy(Request $request)
    {
        //Eliminar el archivo
        $productImage = ProductImage::find($request->image_id);
        $delete = true;
        if (substr($productImage->image, 0, 5) !== "https") {
            $fullPath = public_path() . '/images/products/' . $productImage->image;
            $delete = File::delete($fullPath);
        }
        //Eliminar el registro de la BD
        if ($delete) {
            $productImage->delete();
        }

        return back();
    }
    public function select($image){
        $productImage = ProductImage::find($image);
        //Desmarcamos las demas imagenes
        ProductImage::where('product_id', $productImage->product->id)
        ->update([
            'featured' => false
        ]);
        //Asignamos esa imagen como preferida
        $productImage->featured = true;
        $productImage->save();

        return back();
    }
}
