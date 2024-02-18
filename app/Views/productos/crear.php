<?=$cabecera?>
Formulario de crear

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Ingresar datos del producto</h5>
        <p class="card-text">
            <form method="post" action="<?=site_url('/guardar') ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input id="nombre" value="<?=old('nombre')?>" class="form-control" type="text" name="nombre">
                </div>
                <div class="form-group">
                    <label for="descripcio">Descripcion</label>
                    <input id="descripcion" value="<?=old('descripcion')?>" class="form-control" type="text" name="descripcion">
                </div>
                <div class="form-group">
                    <label for="imagen">Imagen</label>
                    <br></br>
                    <input id="imagen" class="form-control-file" type="file" name="imagen">
                </div>
                <div class="form-group">
                    <label for="precio">Precio de venta</label>
                    <input id="precio" value="<?=old('precio')?>"  class="form-control" type="number" name="precio">
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input id="stock" value="<?=old('stock')?>"  class="form-control" type="number" name="stock">
                </div>
                <br></br>
                

                <button class="btn btn-primary" type="submit">Guardar</button>
                <a href="<?=base_url('listar');?>" class="btn btn-info">Cancelar</a>
            </form>
        </p>
    </div>
</div>

 <?=$pie?>