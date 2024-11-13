@extends('product.base')

@section('title', 'Pokemon List')

@section('basecontent')

    <table class="table table-striped table-hover" id="tablaPokemon">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>type</th>
                <th>evolution</th>
                @if(session('user'))
                    <th>delete</th>
                    <th>edit</th>
                @endif
                <th>view</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pokemons as $pokemon)
                <tr>
                    <td>{{$pokemon->id}}</td>
                    <td>{{$pokemon->name}}</td>
                    <td>{{$pokemon->type}}</td>
                    <td>{{$pokemon->evolution}}</td>
                    @if(session('user'))
                        <!-- Botón de eliminación, manteniendo el mismo estilo de Edit -->
                        <td>
                            <form action="{{ url('pokemon/' . $pokemon->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                        <!-- Botón de edición sin cambiar el estilo -->
                        <td><a href="{{ url('pokemon/' . $pokemon->id . '/edit') }}" class="btn btn-primary">Edit</a></td>
                    @endif
                    <td><a href="{{ url('pokemon/' . $pokemon->id) }}" class="btn btn-info">View</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row">
        @if(session('user'))
            <a href="{{ url('pokemon/create') }}" class="btn btn-success">Add Pokemon</a>
        @endif
    </div>

@endsection

@section('scripts')
    <script src="{{ url('assets/scripts/script.js') }}"></script>
@endsection
