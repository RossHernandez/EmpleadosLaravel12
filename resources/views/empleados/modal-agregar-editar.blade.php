<div>

    <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">
            Modal title
        </h5>

    </div>

    <div class="modal-body">
        <form id="formEmpleado" method="POST">
            @csrf
            <input type="hidden" id="methodField" name="_method" value="POST">
            <input type="hidden" id="empleado_id">

            <div class="form-group">
                <label>Clave</label>
                <input type="text" class="form-control" id="clave_empleado" name="clave_empleado">
            </div>

            <div class="form-group">
                <label>Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>

            <div class="form-group">
                <label>Edad</label>
                <input type="number" class="form-control" id="edad" name="edad">
            </div>

            <div class="form-group">
                <label>Fecha de nacimiento</label>
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
            </div>

            <div class="form-group">
                <label>Género</label>
                <input type="text" class="form-control" id="genero" name="genero">
            </div>

            <div class="form-group">
                <label>Sueldo</label>
                <input type="number" class="form-control" id="sueldo_base" name="sueldo_base">
            </div>



            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="btnGuardar" class="btn btn-primary">
                </button>
            </div>
        </form>
    </div>

</div>

