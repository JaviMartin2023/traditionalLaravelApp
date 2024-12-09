@extends('base')

@section('title', 'Pokemon Details')

@section('content')

    <div class="form-group">
        Pokemon ID #:
        {{$pokemon->id}}
    </div>
    <div class="form-group">
        Pokemon Name:
        {{$pokemon->name}}
    </div>
    <div class="form-group">
        Pokemon Type:
        {{$pokemon->type}}
    </div>
    <div class="form-group">
        Evolution Level:
        {{$pokemon->evolution}}
    </div>
    <div class="form-group">
        Weight:
        {{$pokemon->weight}}
    </div>
    <div class="form-group">
        Height:
        {{$pokemon->height}}
    </div>


    <div class="form-group">
        <a href="{{url()->previous()}}">back</a>
    </div>

@endsection
