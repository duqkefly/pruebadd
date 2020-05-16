<div class="row mt-4">
    <div class="col-6 mx-auto">
        <h3>Bienvenido, Agrega tu primera Tienda</h3>        
        <div id="info" class="alert alert-danger" role="alert" style="display: none;">--</div>
        <form id="tiendaForm" action="<?php echo base_url();?>admin/addTienda" method="POST" name="tiendaForm">
            <div class="modal-body">                    
                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la tienda">
                </div>
                <div class="form-group">
                    <label for="name">Email:</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email válido. ejm: admin@prueba.com">   
                </div>
                <div class="form-group">
                    <label for="name">Teléfono:</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Teléfono, sólo numeros">
                </div>
                <div class="form-group">
                    <label for="name">Descripción:</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion de producto">
                </div>              
            </div>
            <button type="submit" id="btn1" name="btn1" class="btn btn-primary">Añadir</button>
        </form>
    </div>
</div>