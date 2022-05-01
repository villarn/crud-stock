    @extends('layouts.app')
    @section('template_title')
    Editar Libro
    @endsection
    @section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">           
                @includeif('partials.errors')            
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Editar Libro</span>
                    </div>
                    <div class="card-body"> 
                        <form method="POST" action="{{ route('libros.update', $libro->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf                        
                            @include('libro.formEdit')                      
                        </form>
                    </div>
                    <div class="card-header mt-3">
                        <span class="card-title">Nuevo movimiento de stock</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('storeMovimiento', ['idProduct' => $id]) }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            @include('movement.form')
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    @endsection
    