<?php


namespace App\Http\Controllers;

use App\Models\Prod;
use Illuminate\Http\Request;

class ProdController extends Controller
{
    public function index(Request $request)
    {
        $prods = Prod::all();
        return view('prods.index', compact('prods'));
    }

    public function show($id)
    {
        $prod = Prod::findOrFail($id);
        return view('prods.show', compact('prod'));
    }

    public function create()
    {
        return view('prods.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $prod = new Prod();
        $prod->name = $request->name;
        $prod->name = $data['name'];
        $prod->description = $data['description'];
        $prod->price = $data['price'];
        $prod->quantity = $data['quantity'];
        $prod->image = "https://picsum.photos/640/480";
        $prod->save();
        return redirect()->route('prods.show', $prod->id);
    }

    public function edit(Request $request, $id)
    {
        $prod = Prod::findOrFail($id);
        if ($request->user()->id == $prod->user_id) {
            abort(403);
        }
        return view('prods.edit', compact('prod'));
    }

    public function update(Request $request, $id)
    {

        $data = $request->all();
        $prod = Prod::findOrFail($id);
        if ($request->user()->id == $prod->user_id) {
            abort(403);
        }
        $prod->name = $data['name'];
        $prod->description = $data['description'];
        $prod->price = $data['price'];
        $prod->quantity = $data['quantity'];
        $prod->update();
        return redirect()->route('prods.show', $prod->id);
    }

    public function destroy(Request $request, $id)
    {

        $prod = Prod::findOrFail($id);
        if ($request->user()->id == $prod->user_id) {
            abort(403);
        }
        $prod->delete();
        return redirect()->route('prods.index');
    }
}
