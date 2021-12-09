@extends('layouts.app')

@section('body-class', 'about-us bg-gray-200')

@section('title-page', 'Listado de productos')

@section('content')
<section class="mt-4 mx-n3">
        <div class="row">
            <div class="col-md-8 text-start">
                <h3 class="z-index-1">Productos que se ofrecen</h3>
            </div>
        </div>
        <div class="row mt-4">
            <div class="table-responsive">
                <a href="{{ url('admin/products/create') }}" class="btn btn-primary">Nuevo producto</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="col-md-2">Nombre</th>
                            <th class="col-md-5">Descripción</th>
                            <th>Categoría</th>
                            <th class="text-right">Precio</th>
                            <th class="text-right">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $p)
                        <tr>
                            <td class="text-center">{{$p->id}}</td>
                            <td>{{$p->name}}</td>
                            <td>{{$p->description}}</td>
                            <td>{{$p->category ? $p->category->name: 'General'}}</td>
                            <td>${{$p->price}}</td>
                            <td class="td-actions text-right">
                                <form method="post" action="{{url('admin/products/'.$p->id)}}">
                                    {{ csrf_field() }}
                                    {{method_field('DELETE')}}
                                    <a href="{{url('/products/'.$p->id)}}" rel="tooltip" title="Ver" class="btn btn-info btn-simple">
                                        <i class="material-icons">info</i>
                                    </a>
                                    <a href="{{url('admin/products/'.$p->id.'/images')}}" rel="tooltip" title="Imagenes del producto" class="btn btn-warning btn-simple">
                                        <i class="material-icons">image</i>
                                    </a>
                                    <a href="{{url('admin/products/'.$p->id.'/edit')}}" type="button" rel="tooltip" title="Editar" class="btn btn-success btn-simple">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple">
                                        <i class="material-icons">close</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$products->links()}}
            </div>
        </div>
</section>
@endsection