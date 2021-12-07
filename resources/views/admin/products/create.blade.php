@extends('layouts.app')

@section('body-class', 'sign-in-basic')

@section('title-page', 'Creación de productos')

@section('content')
<div class="col-lg-4 col-md-8 col-12 mx-auto">
    <div class="card z-index-0 fadeIn3 fadeInBottom">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Formulario de productos</h4>
            </div>
        </div>
        <div class="card-body">
            <form role="form" class="text-start" action="{{ url('admin/products') }}" method="POST">
                {{ csrf_field() }}
                <div class="input-group input-group-outline my-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" required name="name" class="form-control">
                </div>
                <div class="input-group input-group-outline my-3">
                    <label class="form-label">Descripción corta</label>
                    <input type="text" required name="description" class="form-control">
                </div>
                <div class="input-group input-group-outline my-3">
                    <textarea name="long_description" placeholder="Descripción larga del producto" id="exampleFormControlTextarea1" class="form-control" rows="5"></textarea>
                </div>
                <div class="input-group input-group-outline my-3">
                    <label class="form-label">Precio</label>
                    <input type="number" step="0.01" required name="price" class="form-control">
                </div>
                <div class="input-group input-group-static mb-4">
                    <label for="exampleFormControlSelect1" class="ms-0">Categoría</label>
                    <select class="form-control" name="category_id" id="exampleFormControlSelect1">
                        @foreach ($categories as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-100 my-4 mb-2">{{ __('Registrar') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection