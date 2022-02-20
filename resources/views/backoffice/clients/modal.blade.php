<!-- Modal -->
<div class="modal fade" id="editClient" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmclient">
                    <div class="form-group">
                        <label for="email">Email</label>
                        {{csrf_field()}}
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="user_id" id="user_id">
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="first_name">Nombres</label>
                        <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Nombres">
                    </div>

                    <div class="form-group">
                        <label for="last_name">Apellidos</label>
                        <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Apellidos">
                    </div>

                    <div class="form-group">
                        <label for="first_name">Ciudad</label>
                        <input type="text" name="city" class="form-control" id="city" placeholder="Ciudad">
                    </div>

                    <div class="form-group">
                        <label for="first_name">Direccion</label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="Direccion">
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" id="btn_update" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </div>
</div>