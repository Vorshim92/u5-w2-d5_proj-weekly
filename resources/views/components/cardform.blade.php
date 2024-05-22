<form method="POST"
    action="{{ Route::currentRouteName() == 'prods.create' ? route('prods.store') : route('prods.update', $prod->id) }}">
    @csrf
    @if (Route::currentRouteName() == 'prods.edit')
        @method('PUT')
    @endif
    @if (Route::currentRouteName() == 'prods.create')
        @method('POST')
    @endif

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" aria-describedby="name" name="name"
            value="{{ $prod->name ?? '' }}">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" class="form-control" id="description" name="description" aria-describedby="description"
            value="{{ $prod->description ?? '' }}">
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="text" class="form-control" id="price" name="price" aria-describedby="price"
            value="{{ $prod->price ?? '' }}">
    </div>
    <div class="mb-3">
        <label for="quantity" class="form-label">Quantity</label>
        <input type="text" class="form-control" name="quantity" id="quantity" aria-describedby="quantity"
            value="{{ $prod->quantity ?? '' }}">
    </div>
    <button class="btn btn-primary"
        type="submit">{{ Route::currentRouteName() == 'prods.create' ? 'Crea' : 'Aggiorna' }}</button>
</form>
