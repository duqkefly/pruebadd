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
                    <td><a href="<?= base_url()."assets/images/".$p['imagen'];?>" target="_blank">ver Detalle</a></td>
                    <td>
                        <button type="button" name="btn-act" class="btn btn-sm btn-addon btn-info waves-effect ml-1" data-target="#actProducto" onclick="showForm(<?= $p['id'];?>)">
                            <i class="fa fa-edit mr-2">
                            </i>
                            Modificar
                        </button>
                        <button type="button" name="btn-del" class="btn btn-sm btn-addon btn-danger waves-effect ml-1" data-target="#productoModal" onclick="showForm2(1)">
                            <i class="fa fa-trash-alt mr-2"></i>
                            Eliminar 
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>


<!-- Modal producto -->
<div class="modal fade" id="actProducto" tabindex="-1" role="dialog" aria-labelledby="actProductoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="actProductoLabel">Modificar Producto</h5>
                <div><small>Puede modificar uno o mas campos de acuerdo a su requerimiento.</small></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row">
                <div class="col col-10 mx-auto mt-2" >
                    <div id="info" class="alert alert-danger" role="alert" style="display: none;">--</div>
                </div>
            </div>
            <form id="productoForm" action="<?php echo base_url();?>admin/updateProducto" method="POST" name="productoForm" enctype="multipart/form-data">
                <input type="hidden" id="id_tienda" name="id_tienda">
                <div class="modal-body">                    
                    <div class="form-group">
                        <label for="name">Nombre Producto</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del producto">
                    </div>
                    <div class="form-group">
                        <label for="sku">SKU</label>
                        <input type="text" class="form-control" id="sku" name="sku" placeholder="SKU del producto" readonly>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion del producto">
                    </div>
                    <div class="form-group">
                        <label for="valor">Valor</label>
                        <input type="text" class="form-control" id="valor" name="valor" placeholder="Valor del producto">
                    </div>
                    <div class="form-group">
                        <label for="imagen">Imagen</label>
                        <input type="file" class="form-control" id="imagen" name="imagen" placeholder="Imagen del producto">
                    </div>
                    <input type="hidden" class="form-control" id="id_producto" name="id_producto">

                </div>
                <div class="modal-footer">
                    <button type="submit" id="btn2" name="btn2" class="btn btn-primary">Actualizar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                                 
                </div>
            </form>  
        </div>
    </div>
</div>

<script>
    function showForm(id_producto) {
        var url = '<?php echo base_url();?>admin/getProductById';
        $('#actProducto').modal('show')
        const data = new FormData();
        data.append('id_producto', id_producto);

        fetch(url, {
            method: 'POST',
            body: data
        })
            .then(res => res.json())
            .then(producto =>{
                $('#id_tienda').val(producto['id_tienda']);
                $('#nombre').val(producto['nombre']);
                $('#sku').val(producto['sku']);
                $('#descripcion').val(producto['descripcion']);
                $('#valor').val(producto['valor']);
                $('#id_producto').val(id_producto);
            })
    }
</script>