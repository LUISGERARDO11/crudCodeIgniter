<?=$cabecera?>

<a class="btn btn-success" href="<?=base_url('/crear')?>">Añadir producto</a>

<br></br>
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>


            <?php foreach($productos as $producto): ?>
                <tr>
                    <td> <?=$producto['id'] ?> </td>
                    
                    <td>
                    <img class="img-thumbnail" src="<?=base_url()?>/uploads/<?=$producto['imagen'] ?>" width="100" alt="<?=$producto['imagen'] ?>">
                    </td>
                    <td><?=$producto['nombre'] ?></td>
                    <td><?=$producto['descripcion'] ?></td>
                    <td><?=$producto['precioVenta'] ?></td>
                    <td><?=$producto['stock'] ?></td>
                    <td>
                        <a href="<?=base_url('editar/'.$producto['id']);?>" class="btn btn-primary" type="button">Editar</a>
                        <a href="<?=base_url('borrar/'.$producto['id']);?>" class="btn btn-danger" type="button">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>
<?=$pie?>