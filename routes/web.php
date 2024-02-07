<?php

use Illuminate\Support\Facades\Route;
use App\Models\Track;
use App\Models\Artist;
use App\Models\Album;
use App\Models\Genre;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function() {
    // QUERYING many records from a table
    // return Artist::all();
    // return Track::all();
    // return Artist::orderBy('Name', 'desc')->get();
    // return Track::where('UnitPrice', '>', 0.99)->orderBy('Name')->get();

    // QUERYING a record by the primary key column
    // return Artist::find(4);

    // CREATING
    // $genre = new Genre();
    // $genre->Name = 'Hip Hop';
    // $genre->save();
    // return Genre::all();

    // DELETING
    // Genre::where('Name', '=', 'Hip Hop')->delete();
    // return Genre::all();

    // UPDATING
    // $genre = Genre::where('Name', '=', 'Alternative & Punk')->first();
    // $genre->Name = 'Alternative and Punk';
    // $genre->save();
    // return Genre::all();

    // RELATIONSHIPS (ONE TO MANY)
    // return Artist::find(50); // 50 = Metallica
    // return Artist::find(50)->albums;
    // return Album::find(152)->artist; // 152 = Master of Puppets

    // return Track::find(1837); // 1837 = Seek and Destroy
    // return Track::find(1837)->genre;
    // return Genre::find(3)->tracks; // 3 = Metal

    return view('eloquent', [
        // Lazy loading
        // 'tracks' => Track::where('UnitPrice', '>', 0.99)
        //     ->orderBy('Name')
        //     ->limit(20)
        //     ->get()

        // Eager loading
        'tracks' => Track::with(['genre', 'album'])
            ->where('UnitPrice', '>', 0.99)
            ->orderBy('Name')
            ->limit(20)
            ->get()
    ]);
});
