<div class="row mt-4">
    <div class="col-8 mx-auto">
    <?php if(isset($this->session->success)): ?>
        <div class="alert alert-success" role="alert"><?= $this->session->success;?></div>
    <?php endif; ?>
    <?php if(isset($this->session->error)): ?>
        <div class="alert alert-danger" role="alert"><?= $this->session->error;?></div>
    <?php endif; ?>
        <div class="row">
            <div class="col col-6"><h4>Tiendas</h4></div>
            <div class="col col-6"><button class=" btn btn-warning float-right pt-1 m-2 btn-sm" data-toggle="modal" data-target="#tiendaModal">Añadir Tienda <i class="fa fa-caret-right"></i></button></div>
            <a href=""></a>
        </div>
    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Tienda</th>
            <th scope="col">email</th>
            <th scope="col">phone</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <!-- <?php print_r($tienda);?> -->
            <?php foreach($tienda as $i => $t): ?>
                <tr>
                    <td><?= $t['id']; ?></td>
                    <td><?= $t['nombre']; ?></td>
                    <td><?= $t['email']; ?></td>
                    <td><?= $t['phone']; ?></td>
                    <td><?= $t['descripcion']; ?></td>
                    <td>
                        <!-- <a href="<?php echo base_url();?>admin/addProducto/<?php echo $t['id']; ?>" class=" btn btn-info ml-1 btn-sm">Producto <i class="fa fa-plus"></i></a> -->
                        <button type="button" name="btnp" class="btn btn-sm btn-addon btn-info waves-effect ml-1" data-target="#productoModal" onclick="showForm(<?php echo $t['id']; ?>)">
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

<!-- Modal tienda-->
<div class="modal fade" id="tiendaModal" tabindex="-1" role="dialog" aria-labelledby="tiendaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tiendaModalLabel">Añadir Tienda nueva</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row">
                <div class="col col-10 mx-auto mt-2" >
                    <div id="info" class="alert alert-danger" role="alert" style="display: none;">--</div>
                </div>
            </div>
            <form id="tiendaForm" action="<?php echo base_url();?>admin/addTienda" method="POST" name="tiendaForm">
                <div class="modal-body">                    
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la tienda">
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email válido. ejm: admin@prueba.com">   
                    </div>
                    <div class="form-group">
                        <label for="name">Teléfono</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Teléfono, sólo numeros">
                    </div>
                    <div class="form-group">
                        <label for="name">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion de producto">
                    </div>              
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btn1" name="btn1" class="btn btn-primary">Añadir</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                                 
                </div>
            </form>  
        </div>
    </div>
</div>


<!-- Modal producto -->
<div class="modal fade" id="productoModal" tabindex="-1" role="dialog" aria-labelledby="productoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productoModalLabel">Añadir Producto nuevo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row">
                <div class="col col-10 mx-auto mt-2" >
                    <div id="info2" class="alert alert-danger" role="alert" style="display: none;">--</div>
                </div>
            </div>
            <form id="productoForm" action="<?php echo base_url();?>admin/addProducto" method="POST" name="productoForm" enctype="multipart/form-data">
                <input type="hidden" id="id_tienda" name="id_tienda">
                <div class="modal-body">                    
                    <div class="form-group">
                        <label for="name">Nombre Producto</label>
                        <input type="text" class="form-control" id="nombre2" name="nombre2" placeholder="Nombre del producto">
                    </div>
                    <div class="form-group">
                        <label for="sku">SKU</label>
                        <input type="text" class="form-control" id="sku" name="sku" placeholder="SKU del producto">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control" id="descripcion2" name="descripcion2" placeholder="Descripcion del producto">
                    </div>
                    <div class="form-group">
                        <label for="valor">Valor</label>
                        <input type="text" class="form-control" id="valor" name="valor" placeholder="Valor del producto">
                    </div>
                    <div class="form-group">
                        <label for="imagen">Imagen</label>
                        <input type="file" class="form-control" id="imagen" name="imagen" placeholder="Imagen del producto">
                    </div> 

                </div>
                <div class="modal-footer">
                    <button type="submit" id="btn2" name="btn2" class="btn btn-primary">Añadir</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                                 
                </div>
            </form>  
        </div>
    </div>
</div>

<script>
    function showForm(id_tienda) {
        var url = '<?php echo base_url();?>admin/contarProductos';
        $('#id_tienda').val(id_tienda);
        $('#productoModal').modal('show')
        const data = new FormData();
        data.append('id_tienda', id_tienda);

        fetch(url, {
            method: 'POST',
            body: data
        })
            .then(res => res.json())
            .then(response =>{
                var contProductos = response +2;
                var codigoGenerado = "t"+(id_tienda)+"_00"+contProductos;
                $('#sku').val(codigoGenerado);
                $('#sku').attr('readonly', true);
            })
    }
</script>
