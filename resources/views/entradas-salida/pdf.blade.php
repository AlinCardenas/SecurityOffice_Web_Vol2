<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
</head>
<body>
    
    <div class="table-responsive">
    <h3>Lista de entradas y salidas</h3>
        <table class="table table-striped table-hover">
            <thead class="thead">
                <tr>
                    <th>Entrada</th>
                    <th>Salida</th>
                    <th>Usuario</th>      
                </tr>
            </thead>
            <tbody>
                @foreach ($entradasSalidas as $entradasSalida)
                <tr>                                                    
                    <td>{{ $entradasSalida->entrada }}</td>
                    <td>{{ $entradasSalida->salida }}</td>
                    <td>{{ $entradasSalida->user->nombre }}</td>                                    
                </tr>
                @endforeach
            </tbody>
        </table>
</body>
</html>