@extends('layouts.app')

@section('body-class', 'about-us bg-gray-200')

@section('title-page', 'Página de usuario')

@section('content')
<section class="mx-n3">
    <div class="container">
        <div class="row">
            <div class="col-md-8 text-start">
                <h3 class="z-index-1">Menú</h3>
            </div>
        </div>
        <div class="row mt-4">
            <ul class="nav nav-pills nav-pills-icons" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/')}}" role="tab" data-toggle="tab">
                        <i class="material-icons">dashboard</i>
                        Productos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{url('/home')}}" role="tab" data-toggle="tab">
                        <i class="material-icons">shopping_cart</i>
                        Carrito de compras
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tasks-1" role="tab" data-toggle="tab">
                        <i class="material-icons">list</i>
                        Pedidos realizados
                    </a>
                </li>
            </ul>
            <hr>
            <p>Tu carrito de compras presenta {{auth()->user()->cart->details->count()}} productos.</p>
            @if(Session::has('notification'))
            <div class="alert alert-success alert-dismissible fade show text-white">
                {{ Session::get('notification') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (auth()->user()->cart->details as $detail)
                        <tr>
                            <td class="text-center">
                                <img height="50" src="{{$detail->product->featured_image_url}}" alt="">
                            </td>
                            <td>
                                <a href="{{url('/products/'.$detail->product->id)}}" target="_blank">{{$detail->product->name}}</a>
                            </td>
                            <td>$ {{$detail->price}}</td>
                            <td>{{$detail->quantity}}</td>
                            <td>$ {{$detail->quantity*$detail->price}}</td>
                            <td class="td-actions">
                                <form method="post" action="{{url('/cart')}}">
                                    {{ csrf_field() }}
                                    {{method_field('DELETE')}}
                                    <input type="hidden" name="cart_detail_id" value="{{$detail->id}}">
                                    <a href="{{url('/products/'.$detail->product->id)}}" target="_blank" rel="tooltip" title="Ver" class="btn btn-info btn-simple">
                                        <i class="material-icons">info</i>
                                    </a>
                                    <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple">
                                        <i class="material-icons">close</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="4" class="text-end">Total</td>
                            <td>$ {{auth()->user()->cart->suma_detail}}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @if(auth()->user()->cart->details->count()>0)
            <div class="text-center">
                <form action="{{url('/order')}}" method="post">
                    {{csrf_field()}}
                    <button type="submit" rel="tooltip" title="Realizar pedido" class="btn btn-info btn-fab btn-fab-mini btn-round">
                        <i class="material-icons">done</i>
                        Realizar pedido
                    </button>
                </form>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection