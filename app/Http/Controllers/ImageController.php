<?php

namespace App\Http\Controllers;

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
        $images = $product->images;
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
}
