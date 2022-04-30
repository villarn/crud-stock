<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('categoria') }}
            {{ Form::select('categoria_id', $categoria, $libro->categoria_id, ['class' => 'form-control' . ($errors->has('categoria_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar la categoría']) }}
            {!! $errors->first('categoria_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $libro->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>        
        
    </div>
    <div class="box-footer mt20 mt-3">
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
</div>

<div class="box box-info padding-1 mt-5">
    <div class="box-body">
        <h3>Movimientos de stock - Actualmente existen {{$libro->calcularStockActual()}} unidades</h3>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <th>Fecha</th>
                <th>Ingreso</th>
                <th>Egreso</th>
                <th>Tipo de movimiento</th>
            </thead>
            <tbody>
                @foreach ($libro->movimientosStock as $movimiento)
                <tr>
                    <td>{{$movimiento->created_at->format('d-m-Y')}}</td>
                    <td>{{$movimiento->ingreso}}</td>
                    <td>{{$movimiento->egreso}}</td>
                    <td>{{$movimiento->type}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</div>