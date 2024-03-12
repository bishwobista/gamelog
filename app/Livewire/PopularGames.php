<?php

namespace App\Livewire;

use Livewire\Component;
use MarcReichel\IGDBLaravel\Models\Game;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class PopularGames extends Component
{
    public $popularGames = [];
    
    public function loadPopularGames(){
        $before = Carbon::now()->subMonths(2)->timestamp;
        $after = Carbon::now()->addMonths(2)->timestamp;

        

        $this->popularGames = Game::select(['name', 'first_release_date', 'rating'])->whereIn('platforms', [48,49,130,6] )->where('first_release_date', '>=', $before)->where('first_release_date', '<=', $after)->orderBy('rating', 'desc')->limit(12)->with(['platforms', 'cover'])->get()->toArray();
        //add https: infront of the cover url
        foreach($this->popularGames as $key => $game){
            $this->popularGames[$key]['cover']['url'] = 'https:' . $game['cover']['url'];
        }
        //put this in cache
        // $this->popularGames = Cache::remember('popular-games', 7, function() use($before, $after){
        //     return Game::select(['name', 'first_release_date', 'rating'])->whereIn('platforms', [48,49,130,6] )->where('first_release_date', '>=', $before)->where('first_release_date', '<=', $after)->orderBy('rating', 'desc')->limit(12)->with(['platforms', 'cover'])->get()->toArray();
        // });
        // //add https: infront of the cover url
        // foreach($this->popularGames as $key => $game){
        //     $this->popularGames[$key]['cover']['url'] = 'https:' . $game['cover']['url'];
        // }
    }

    public function mount(){
        $this->loadPopularGames();
    }
    public function render()
    {
        return view('livewire.popular-games');
    }
}
