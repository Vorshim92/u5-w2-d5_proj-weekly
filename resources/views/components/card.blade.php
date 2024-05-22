@props(['prod'])

<div class="col-3">
    <div class="card">
        <img src="{{ $prod->image }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $prod->name }}</h5>
            <p class="card-text">
                Some quick example text to build on the card title and make up the bulk of the card's content.
            </p>
            @if (Route::currentRouteName() != 'prods.show')
                <a href="{{ route('prods.show', $prod->id) }}" class="btn btn-primary">Go somewhere</a>
            @endif
            @auth
                @if (Auth::user()->id == $prod->user_id)
                    {{-- @if (Route::currentRouteName() == 'prods.show') --}}
                    <div class="flex gap-2">
                        <a href="{{ route('prods.edit', $prod->id) }}" class="btn btn-warning">EDIT</a>
                        <form method="POST" action="{{ route('prods.destroy', $prod->id) }}">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">DELETE</button>
                        </form>
                    </div>
                @endif
                {{-- @endif --}}
            @endauth
        </div>
    </div>
</div>
