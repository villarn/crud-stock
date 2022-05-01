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