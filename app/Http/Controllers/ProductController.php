<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Mostrar lista de productos
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('products.create');
    }

   public function show($id)
   {
       $product = Product::findOrFail($id);
       return view('products.eachproduct', compact('product'));
   }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image',
            'category' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        Product::create($data);
        return redirect()->route('products.index');
    }
}

?>
