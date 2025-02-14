@vite('resources/css/user_styles/user-index_styles.css')
<main class="main__user-index">
    <p>Hola {{$user->name}}, esta es tu página principal. En esta página principal aparecerán los siguientes datos:</p>

    <table class="table user-index__table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titulo</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Estado</th>
                <th scope="col">Marcar hecha</th>
                <th scope="col">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @php $nChore = 1 @endphp
            @foreach($chores as $chore)
            <tr>
                <th scope="row">{{$nChore}}</th>
                <td>{{ $chore->name }}</td>
                <td>{{ $chore->description }}</td>
                <td>{{ $chore->status }}</td>
                <td>
                    <form action="{{ route('chore.updateStatus', ['id' => $chore->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success" {{$chore->status == App\Enums\Status::PENDING->value ? '':'disabled'}}>Hecha</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('chore.delete', ['id' => $chore->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                </td>

                @php $nChore++ @endphp
            </tr>
            @endforeach
        </tbody>
    </table>

</main>