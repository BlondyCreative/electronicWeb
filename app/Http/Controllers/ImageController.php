<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Product;

class ImageController extends Controller
{

public function search (Request $request)
{
$query = strtolower(trim($request->input('q'))); 
$similarImages = Product::where(function ($q) use ($query) { 
    $q->where('name', 'LIKE', "%{$query}%") 
    
    ->orWhere('tags', 'LIKE', "%{$query}%") 
    ->orWhere('description', 'LIKE', "%{$query}%") 
    ->orWhere('category', 'LIKE', "%{$query}%"); 
    })->get();


return view('products.coinciden', compact('similarImages', 'query'));
}

public function find (Request $request)
{
    $query = $request->input('q');

    $image = Image::where('title', 'like', "%{$query}%")
        ->orWhere('tags', 'like', "%{$query}%")
        ->first();

    if (!$image) {
        return back()->with('error', 'Image not found.');
    }

    return redirect()->route('images.show', $image->id);
}

public function show($id) {

$image = Image::findOrFail($id);

$similarImages = Image::where('id', '!=', $image->id)
->where(function ($q) use ($image) { 
    if ($image->title) { 
    $q->orWhere('title', $image->title);
  
     } 
    if ($image->tags) { 
    $tags = explode(',', $image->tags); 

    foreach ($tags as $tag) { 
    $tag = trim($tag);
    $q->orWhere('tags', 'like', "%{$tag}%"); } }
    })

    ->limit(8) ->get();


return view('products.coinciden', compact('images', 'similarImages'));

}
}
