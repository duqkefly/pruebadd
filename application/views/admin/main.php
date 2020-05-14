<div class="row mt-4">
    <div class="col-8 mx-auto">
        <div class="row">
            <div class="col col-6"><h4>Tiendas</h4></div>
            <div class="col col-6"><button class=" btn btn-info float-right pt-1 m-2" data-toggle="modal" data-target="#tiendaModal">Añadir Tienda <i class="fa fa-plus"></i></button></div>
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
            <th scope="col">Acciones</th>
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
                    <td>----</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tiendaModal" tabindex="-1" role="dialog" aria-labelledby="tiendaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tiendaModalLabel">Añadir Tienda nueva</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url();?>/admin/addTienda" method="POST">
                <div class="modal-body">
                    
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la tienda">
                        </div>
                        <div class="form-group">
                            <label for="name">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email de la tienda">   
                        </div>
                        <div class="form-group">
                            <label for="name">Teléfono</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Teléfono">
                        </div>
                        <div class="form-group">
                            <label for="name">Descripción</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Teléfono">
                        </div>              
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Añadir</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                                 
                </div>
            </form>  
        </div>
    </div>
</div>
