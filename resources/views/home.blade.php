@extends('layouts.app')

@section('body-class', 'about-us bg-gray-200')

@section('title-page', 'Página de usuario')

@section('content')
<section class="card mx-n3">
    <div class="container">
        <div class="row">
            <div class="col-md-8 text-start">
                <h3 class="z-index-1">Menú</h3>
            </div>
        </div>
        <div class="row mt-4">
            <ul class="nav nav-pills nav-pills-icons" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" href="#dashboard-1" role="tab" data-toggle="tab">
                        <i class="material-icons">dashboard</i>
                        Carrito de compras
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tasks-1" role="tab" data-toggle="tab">
                        <i class="material-icons">list</i>
                        pedidos realizados
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>
@endsection