@foreach ($turnos as $turno)
@if (isset($turno['turno']))
    <tr>                                          
        <td>{{ $turno->turno }}</td>
        <td>{{ $turno->hora_inicio }}</td>
        <td>{{ $turno->hora_fin }}</td>
        <td>
            <a class="btn btn-sm btn-primary"
            href="{{ route('turnos.edit',$turno->id) }}"><i
                class="fa fa-fw fa-edit"></i>Editar</a>
        </td>
        <td>
            <form action="{{ route('turnos.destroy',$turno->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"><i
                        class="fa fa-fw fa-trash"></i>Borrar</button>
            </form>
        </td>
    </tr>
@endif
@endforeach