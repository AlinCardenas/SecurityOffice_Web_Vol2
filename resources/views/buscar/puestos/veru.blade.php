@foreach ($puestos as $puesto)
@if (isset($puesto['nombre']))
    <tr>
        <td>{{ $puesto->nombre }}</td>
        <td>{{ $puesto->salario }}</td>
        <td>{{ $puesto->estatus }}</td>
        <td>{{ $puesto->rol }}</td>
        <td>{{ $puesto->area->nombre }}</td>

        <td>
            <form action="{{ route('puestos.destroy',$puesto->id) }}" method="POST">
                <a class="btn btn-sm btn-primary" href="{{ route('puestos.edit',$puesto->id) }}"><i class="fa fa-fw fa-edit"></i>Editar</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>Borrar</button>
            </form>
        </td>
    </tr>
@endif
@endforeach