<?=$cabecera?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Editar datos del producto</h5>
        <p class="card-text">
            <form method="post" action="<?=site_url('/actualizar') ?>" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$producto['id']?>">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input id="nombre" value="<?=$producto['nombre']?>" class="form-control" type="text" name="nombre">
                </div>
                <div class="form-group">
                    <label for="descripcio">Descripcion</label>
                    <input id="descripcion" value="<?=$producto['descripcion']?>" class="form-control" type="text" name="descripcion">
                </div>

                
                <div class="form-group">
                    <label for="imagen">Imagen</label>
                    <br></br>
                    <img class="img-thumbnail" src="<?=base_url()?>/uploads/<?=$producto['imagen'] ?>" width="100" alt="<?=$producto['imagen'] ?>">
                    <br></br>
                    <input id="imagen" class="form-control-file" type="file" name="imagen">
                </div>
                <div class="form-group">
                    <label for="precio">Precio de venta</label>
                    <input id="precio" value="<?=$producto['precioVenta']?>" class="form-control" type="number" name="precio">
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input id="stock" value="<?=$producto['stock']?>" class="form-control" type="number" name="stock">
                </div>
                <br></br>
                

                <button class="btn btn-primary" type="submit">Actualizar</button>
                <a href="<?=base_url('listar');?>" class="btn btn-info">Cancelar</a>
            </form>
        </p>
    </div>
</div>

<?=$pie?>