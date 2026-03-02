<div >
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

        @include('layouts.navigation')

    <!-- The biggest battle is the war against ignorance. - Mustafa Kemal Atatürk -->
<div class="m-4" >
    <div class="card mt-4">
        <div class="card-body">

        <strong>Detalle del Empleado</strong>

        <p><strong>Nombre:</strong> {{ $empleado->nombre }}</p>
    {{--    <p><strong>Email:</strong> {{ $empleado->email }}</p>--}}
        <p><strong>Sueldo Base:</strong> ${{ number_format($empleado->sueldo_base,2) }}</p>
        </div>
    </div>
    <hr>

    <div class="mx-auto" style="width: 300px;">
    <span class="text-align: center;">Proyección Salarial (18 meses)</span>
    </div>
    <div class="row">
        <div class="col-md-6">
            <canvas id="graficaPesos"></canvas>
        </div>
        <div class="col-md-6">
            <canvas id="graficaDolares"></canvas>
        </div>
    </div>


</div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>


    <script>
        const fechas = @json($fechas);
        const sueldosMXN = @json($proyeccion);
         const sueldosUSD = @json($proyeccionUSD);

        // Gráfica en Pesos
        new Chart(document.getElementById('graficaPesos'), {
            type: 'bar',
            data: {
                labels: fechas,
                datasets: [{
                    label: 'Sueldo en Pesos (MXN)',
                    data: sueldosMXN,
                }]
            }
        });

        // Gráfica en Dólares
        new Chart(document.getElementById('graficaDolares'), {
            type: 'line',
            data: {
                labels: fechas,
                datasets: [{
                    label: 'Sueldo en USD',
                    data: sueldosUSD,
                }]
            }
        });
    </script>
</div>
