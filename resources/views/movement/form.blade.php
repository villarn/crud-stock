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
                <option value="3">Cancelación</option>
            </select>
        </div>      
        <div class="form-group">
            <label for="">Cantidad</label>
            <input name="cantidad" type="number" class="form-control">
        </div>
    </div>
    <div class="box-footer mt20">
    </br>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>