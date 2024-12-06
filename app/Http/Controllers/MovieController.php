<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
 public function index()
 {
    $movie = DB::table('movie')->get();
    return view('movie.index', ['movie' => $movie]);
 }

 public function create()
{
    return view('movie.create');
}

public function store(Request $request)
{
   
    $request->validate([
        'title' => 'required|string',
        'description' => 'required|string',
        'genre' => 'required|string',
        'rating' => 'required|numeric',
        'image' => 'nullable|image|mimes:png,jpg',
    ]);

   

   
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public'); 
    }

    
    DB::table('movie')->insert([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'genre' => $request->input('genre'),
        'rating' => $request->input('rating'),
        'image' => $imagePath, 
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect('/movie');
}}
