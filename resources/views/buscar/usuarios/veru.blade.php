@foreach ($users as $user)
    @if (isset($user['nombre']))
        <p hidden>
            {{$cadena = str_replace('public/box/', '', $user->foto)}}
        </p> 
        <tr class="align-middle">
            <td>{{ $user->nombre }}</td>
            <td class="">{{ $user->appA }}</td>
            <td class="">{{ $user->genero }}</td>
            <td >
                <div class="d-flex justify-content-center">
                    <img class="border border-2 rounded-circle me-2 ms-2" src="storage/box/{{$cadena}}" width="70" alt="Logo del anime"></td>
                </div>    
            <td >{{ $user->email }}</td>
            <td >{{ $user->estatus }}</td>
            <td >{{ $user->puesto->nombre }}</td>
            <td>
                <a class="btn btn-sm btn-primary"
                href="{{ route('users.edit',$user->id) }}"><i
                    class="fa fa-fw fa-edit"></i>Editar</a>
            </td>
            <td>
                <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"><i
                            class="fa fa-fw fa-trash"></i>Borrar</button>
                </form>
            </td>
        </tr>
    @endif
@endforeach