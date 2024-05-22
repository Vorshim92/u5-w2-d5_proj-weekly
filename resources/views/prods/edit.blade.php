@extends('templates.template')

@section('title', 'Prodotto')

@section('content')

    <div class="row justify-content-center my-5 gap-3">
        <h1 class="text-center">EDIT</h1>
        <x-cardform :prod="$prod" />
    </div>

@endsection
