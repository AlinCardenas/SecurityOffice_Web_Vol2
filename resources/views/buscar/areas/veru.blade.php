@foreach ($areas as $area)
@if (isset($area['nombre']))
    <tr>                                                    
        <td>{{ $area->nombre }}</td>
        <td>{{ $area->estatus }}</td>
        <td>{{ $area->sucursal->nombre }}</td>
        <td>
            <a class="btn btn-sm btn-primary"
            href="{{ route('areas.edit',$area->id) }}"><i
                class="fa fa-fw fa-edit"></i>Editar</a>
        </td>
        <td>
            <form action="{{ route('areas.destroy',$area->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"><i
                        class="fa fa-fw fa-trash"></i>Borrar</button>
            </form>
        </td>
    </tr>
@endif
@endforeach