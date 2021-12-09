@extends('layouts.app')

@section('body-class', 'sign-in-basic')

@section('title-page', 'Detalle de producto')

@section('content')
<div class="col-md-10 mx-auto mt-4">
    <div class="">
        <div class="card-header p-0 mt-n4 mx-3">
            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Detalle del producto</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <a href="">
                        <div class="p-3 pe-md-0">
                            <img class="w-80 border-radius-md shadow-lg" src="{{ $product->featured_image_url }}" alt="image">
                        </div>
                    </a>
                </div>
                <div class="col-lg-8 col-md-6 col-12">
                    <div class="card-body ps-lg-0">
                        <h5 class="mb-0">{{ $product->name }}</h5>
                        <h6 class="text-info">{{ $product->category->name }}</h6>
                        <h5 class="text-info">${{ $product->price }}</h5>
                        <p class="">{{ $product->description }}</p>
                        <button type="button" rel="tooltip" title="Inicia sesión para realizar compras" 
                        class="btn btn-info btn-fab btn-fab-mini btn-round @if(!auth()->user()) readonly disabled @endif" 
                        @if(auth()->user()) data-bs-toggle='modal' data-bs-target='#addCarModal' @endif>
                            <i class="material-icons">add</i>
                            Añadir a carrito
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if(auth()->user())
<!-- Modal -->
<div class="modal fade" id="addCarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Selecciona la cantidad que desea agregar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('/cart')}}" method="post">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group input-group-dynamic mb-4">
                                <label class="form-label">Cantidad</label>
                                <input class="form-control" aria-label="Cantidad" name="quantity" type="number" value="1">
                            </div>
                        </div>
                        <div class="col-md-6 ps-2">
                            <div class="input-group">
                                <label class="form-label">Precio</label>
                                <input type="hidden" name="price" value="{{ $product->price }}" />
                                <input type="hidden" name="product_id" value="{{ $product->id }}" />
                                <input type="text" class="form-control" value="${{ $product->price }}" disabled readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default mb-0" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-info mb-0">Añadir al carrito</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection