@extends('layouts.app')

@section('body-class', 'about-us bg-gray-200')

@section('title-page', 'Imagenes de productos')

@section('content')
<section class="card mx-n3 pb-3">
    <div class="container">
        <div class="row">
            <div class="col-md-8 text-start">
                <h3 class="z-index-1">Imagenes del producto {{$product->name}}</h3>
            </div>
        </div>

        <form action="{{ url('admin/products/'.$product->id.'/images') }}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="panel panel-default">
                <div class="panel-body">
                    <input type="file" name="photo" required>
                    <button type="submit" class="btn btn-primary">Subir nueva imagen</button>
                    <a href="{{ url('admin/products') }}" class="btn btn-default">Volver al listado de productos</a>
                </div>
            </div>
        </form>
        <hr>
        <div class="row d-flex justify-content-center">
            @foreach ($images as $image)
            <div class="col-md-2 m-1">
                <div class="panel panel-default">
                    <div class="panel-body mb-2">
                        <img width="250" class="img-thumbnail" src="{{$image->url}}" alt="">
                    </div>
                    <form method="post" action="{{ url('admin/products/'.$image->id.'/images') }}">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <input type="hidden" name="image_id" value="{{$image->id}}">
                        <button type="submit" class="btn btn-danger">Eliminar imagen</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection