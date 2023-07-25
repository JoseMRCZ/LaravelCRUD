<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Videogame;
use App\Models\Category;
use App\Http\Requests\StoreVideogame;
use App\Mail\VideogameMail;
use Illuminate\Support\Facades\Mail;
class GamesController extends Controller
{
    //
    public function index()
    {
        //$videoGames = array ('fifa 22', 'Mario Kart', 'Super Mario');
        $videoGames = Videogame::orderBy('id', 'desc')->get();
        //dd($videoGames);
        return view('index', ['games' => $videoGames]);
    }
    public function create()
    {
        $categories = Category::all();
        return view('create', ['categories' => $categories]);
    }
    public function help($name_game, $categoria = null)
    {
        $date = Now();
        return view('show', [
            'nameGame' => $name_game,
            'categoriaGame' => $categoria,
            'fecha' => $date
        ]);

    }

    public function storeVideogame(StoreVideogame $request){
        //return $request->all();

        //$request->validate([
           // 'name_game' => 'required|min:5'
        //]);

        //$game = new Videogame;
        //$game->name = $request->name;
        //$game->category_id = $request->category_id;
        //$game->active = 1;
        //$game->save();

        Videogame::create($request->all());
        
        foreach(['20161381@itoaxaca.edu.mx'] as $recipient){
            Mail::to($recipient)->send(new VideogameMail());
        }

        return redirect()->route('games');
    }


    public function view($game_id){
        $game = Videogame::find($game_id);
        $categories = Category::all();
        return view('update', ['categories' => $categories, 'game' => $game]);
     }
     public function updateVideogame(Request $request){
        $request->validate([
            'name_game' => 'required|min:5'
        ]);
        $game = Videogame::find($request->game_id);
        $game->name = $request->name_game;
        $game->category_id = $request->categoria_id;
        $game->active = 1;
        $game->save();

        return redirect()->route('games');
    }


    public function delete($game_id){
        $game = Videogame::find($game_id);
        $game->delete();
        return redirect()->route('games');
    }


}