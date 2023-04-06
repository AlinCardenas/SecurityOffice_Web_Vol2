@foreach ($entradasSalidas as $entradasSalida)
@if (isset($entradasSalida['entrada']))
    <tr>                                                    
        <td>{{ $entradasSalida->entrada }}</td>
        <td>{{ $entradasSalida->salida }}</td>
        <td>{{ $entradasSalida->user->nombre }}</td>
        <td>
            <a class="btn btn-sm btn-primary" href="{{ route('entradas.edit',$entradasSalida->id) }}"><i class="fa fa-fw fa-edit"></i>Editar</a>
        </td>
        <td>
            <form action="{{ route('entradas.destroy',$entradasSalida->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"><i
                    class="fa fa-fw fa-trash"></i>Borrar</button>
            </form>
        </td>
    </tr>
@endif
@endforeach