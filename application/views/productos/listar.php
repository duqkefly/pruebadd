<div class="row mt-4">
    <div class="col-8 mx-auto">
    <?php if(isset($this->session->success)): ?>
        <div class="alert alert-success" role="alert"><?= $this->session->success;?></div>
    <?php endif; ?>
    <?php if(isset($this->session->error)): ?>
        <div class="alert alert-danger" role="alert"><?= $this->session->error;?></div>
    <?php endif; ?>
        <div class="row">
            <div class="col col-6"><h4>Productos</h4></div>
            <!-- <div class="col col-6"><button class=" btn btn-warning float-right pt-1 m-2 btn-sm" data-toggle="modal" data-target="#tiendaModal">Añadir Tienda <i class="fa fa-caret-right"></i></button></div> -->
            <a href=""></a>
        </div>
    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Producto</th>
            <th scope="col">sku</th>
            <th scope="col">Descripción</th>
            <th scope="col">Valor</th>
            <th scope="col">Tienda</th>
            <th scope="col">Imagen</th>
            <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <!-- <?php print_r($productos);?> -->
            <?php foreach($productos as $i => $p): ?>
                <tr>
                    <td><?= $p['id'];?></td>
                    <td><?= $p['nombre'];?></td>
                    <td><?= $p['sku'];?></td>
                    <td><?= $p['descripcion'];?></td>
                    <td><?= $p['valor'];?></td>
                    <td><?= $p['id_tienda'];?></td>
                    <td><?= $p['imagen'];?></td>
                    <td>
                        <button type="button" name="btnp" class="btn btn-sm btn-addon btn-info waves-effect ml-1" data-target="#productoModal" onclick="showForm(1)">
                            <i class="fa fa-plus">
                            </i>
                            Agregar
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>