@extends('base')

@section('title', 'Edit Pokemon')

@section('content')
<form action="{{url('pokemon/' . $pokemon->id)}}" method="post">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="name">Pokemon Name</label>
        <input value="{{old('name', $pokemon->name)}}" required type="text" class="form-control" id="name" name="name" placeholder="Pokemon name">
    </div>
    <div class="form-group">
        <label for="type">Pokemon Type</label>
        <input value="{{old('type', $pokemon->type)}}" required type="text" class="form-control" id="type" name="type" placeholder="Pokemon type">
    </div>
    <div class="form-group">
        <label for="evolution">Evolution Level</label>
        <input value="{{old('evolution', $pokemon->evolution)}}" required type="number" class="form-control" id="evolution" name="evolution" placeholder="Evolution level">
    </div>
    <div class="form-group">
    <label for="weight">Peso</label>
    <input required type="number" step="0.01" class="form-control" id="weight" name="weight" placeholder="Peso del Pokémon (kg)" value="{{ old('weight', $pokemon->weight ?? '') }}">
    </div>

    <div class="form-group">
    <label for="height">Altura</label>
    <input required type="number" step="0.01" class="form-control" id="height" name="height" placeholder="Altura del Pokémon (m)" value="{{ old('height', $pokemon->height ?? '') }}">
    </div>

    <button type="submit" class="btn btn-primary">Edit Pokemon</button>
</form>
@endsection
