@extends('layouts.app')
@section('template_title')
Libro
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        
                        <span id="card_title">
                            {{ __('Producto') }}
                        </span>
                        <div class="float-right">
                            <a href="{{ route('libros.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                {{ __('Create New') }}
                            </a>
                        </div>
                    </div>
                    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
                    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
                    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
                    <label for="exampleInputEmail1">Buscar producto</label>
                    <input type="text" id="nombre" name="nombre" class="form-control">
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead" align="center">
                                <tr>
                                    <th>SKU</th>                                       
                                    <th>Producto</th>
                                    <th>Stock actual</th>
                                    <th>Fecha de ingreso</th>
                                    <th>Fecha de modificación</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody align="center">
                                @foreach ($libros as $libro)
                                <tr>
                                    <td>{{ $libro->id}}</td>
                                    
                                    <td>{{ $libro->nombre }}</td>
                                    <td>{{ $libro->calcularStockActual() }}</td>
                                    <td>{{ $libro->created_at }}</td>
                                    <td>{{ $libro->updated_at }}</td>
                                    <td>
                                        <form action="{{ route('libros.destroy',$libro->id) }}" method="POST">
                                            
                                            <a class="btn btn-sm btn-success" href="{{ route('libros.edit',$libro->id) }}"><i class="fa fa-fw fa-edit"></i> Ver</a>
                                            <a class="btn btn-sm btn-dark" href="{{ route('nuevoMovimiento',$libro->id) }}"><i class="fa fa-fw fa-edit"></i> Movimientos</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                <script src="{{ asset('auto.js') }}"></script>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $libros->links() !!}
        </div>
    </div>
</div>
@endsection