    <div class="box box-info padding-1">
        <div class="box-body">
            <div class="form-group">
                <input type="hidden" class="form-control" value="{{$id}}">
            </div>  
            <div class="form-group">
                <label for="">Tipo movimiento</label>
                <select name="type" id="type" class="form-control">
                    <option value="0" selected>Seleccionar tipo de movimiento</option>
                    <option value="1">Venta</option>
                    <option value="2">Compra</option>
                    <option value="3">Cancelación / Devolución</option>
                </select>
            </div>      
            <div class="form-group">
                <label for="">Cantidad</label>
                <input name="cantidad" type="number" class="form-control" placeholder="Ingrese la cantidad de unidades">
            </div>
        </div>
        <div class="box-footer mt20 mt-3">
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
    </div>