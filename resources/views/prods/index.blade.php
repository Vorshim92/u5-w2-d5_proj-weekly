@extends('templates.template')

@section('title', 'Prodotti')

@section('content')
    @if ($prods->count())
        <div class="row justify-content-center my-5 gap-3">
            <h1 class="text-center">Prodotti</h1>

            @foreach ($prods as $prod)
                <x-card :prod="$prod" />
            @endforeach
        </div>
    @else
        <p>Non ci sono prodotti</p>
    @endif
@endsection
