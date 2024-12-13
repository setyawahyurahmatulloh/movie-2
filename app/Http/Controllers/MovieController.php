<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

    public function edit($id)
    {
    
        $movie = DB::table('movie')->where('id', $id)->first();
    
   
        
      
        return view('movie.edit', ['movie' => $movie]);
    }

    public function update(Request $request, $id)
{
    $imagePath = null;

    if ($request->hasFile('image')) {
      
        $movie = DB::table('movie')->where('id', $id)->first();
        if ($movie && $movie->image) {
            Storage::disk('public')->delete($movie->image);
        }

        $imagePath = $request->file('image')->store('images', 'public');
    }

   
    

    
    DB::table('movie')->where('id', $id)->update([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'genre' => $request->input('genre'),
        'rating' => $request->input('rating'),
        'image' => $imagePath,
        'updated_at' => now(),
    ]);

    return redirect('/movie');
}

    
     

    public function store(Request $request)
    {
      

        
        $imagePath = null;

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
    }

    public function destroy($id)
    {
      
        $movie = DB::table('movie')->where('id', $id)->first();

        if ($movie && $movie->image) {
          
            Storage::disk('public')->delete($movie->image);
        }

     
        DB::table('movie')->where('id', $id)->delete();
   
          

            return redirect('/movie');
        }

       
    }

