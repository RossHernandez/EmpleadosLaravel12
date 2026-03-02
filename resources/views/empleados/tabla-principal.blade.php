<div class="m-4">
    <!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
    <div style="position: absolute;  margin-left: 90%; margin-top: -70px ">
        <button type="button"
                class="btn btn-outline-primary btn-sm"
                data-toggle="modal"
                data-target="#modalEmpleado"
                data-mode="create">
            <i class="fa-solid fa-user-plus"></i>
        </button>

    </div>

    <div style="margin: 30px;">
        <table class="table table-bordered ">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Clave empleado</th>
                <th scope="col">Nombre</th>
                <th scope="col">Edad</th>
                <th scope="col">Fecha de nacimiento</th>
                <th scope="col">Género</th>
                <th scope="col">Sueldo base</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($empleadosList as $empleado)
                <tr>
                    <td>{{ $empleado->id }}</td>
                    <td>{{ $empleado->clave_empleado }}</td>
                    <td>{{ $empleado->nombre }}</td>
                    <td>{{ $empleado->edad }}</td>
                    <td>{{ $empleado->fecha_nacimiento }}</td>
                    <td>{{ $empleado->genero }}</td>
                    <td>{{ $empleado->sueldo_base }}</td>
                    <td>
                        <div>
                            <a href="{{ route('empleado.proyeccion', $empleado->id) }}"
                               class="btn btn-outline-success btn-sm pill">
                                <i class="fa-solid fa-money-bill"></i>
                            </a>
                            <button type="button" class="btn btn-outline-warning btn-sm"
                                    data-target="#modalEmpleado"
                                    data-mode="edit"
                                    data-toggle="modal"
                                    data-empleado='@json($empleado)'>
                                <i class="fa-solid fa-pen text-warning"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger btn-sm">
                                <i class="fa-solid fa-trash text-danger"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="modalEmpleado" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                @include('empleados.modal-agregar-editar', [])
            </div>
        </div>
    </div>


</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $('#modalEmpleado').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget);
        var mode = button.data('mode');
        //var modal = $(this);

        // Aquí limpio siempre el formulario, ya sea para volver a pasar otros datos o para mandar el form limpio
        $('#formEmpleado')[0].reset();

        if (mode === 'create') {

            $('#modalTitulo').text('Agregar Empleado');
            $('#btnGuardar').text('Guardar');
            $('#formEmpleado').attr('action', '/empleado');
            $('#methodField').val('POST');

        }

        if (mode === 'edit') {

            var empleado = button.data('empleado');

            $('#modalTitulo').text('Editar Empleado');
            $('#btnGuardar').text('Actualizar');

            $('#clave_empleado').val(empleado.clave_empleado);
            $('#nombre').val(empleado.nombre);
            $('#edad').val(empleado.edad);
            $('#fecha_nacimiento').val(empleado.fecha_nacimiento);
            $('#genero').val(empleado.genero);
            $('#sueldo_base').val(empleado.sueldo_base);

            $('#formEmpleado').attr('action', '/empleado/' + empleado.id);
            $('#methodField').val('PUT');
        }

    });
</script>
