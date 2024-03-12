<?php

namespace App\Livewire;

use Livewire\Component;
use MarcReichel\IGDBLaravel\Models\Game;
use Carbon\Carbon;
class RecentlyReviewed extends Component
{

    public $recentlyReviewed = [];

    public function loadRecentlyReviewed()
    {
        $before = Carbon::now()->subMonths(2)->timestamp;
        $current = Carbon::now()->timestamp;
        $this->recentlyReviewed = Game::select(['name', 'first_release_date', 'rating','rating_count', 'summary'])->whereIn('platforms', [48,49,130,6] )->where('first_release_date', '>=', $before)->where('first_release_date', '<=', $current)->where('rating_count', '>',5)->orderBy('rating', 'desc')->limit(3)->with(['platforms', 'cover'])->get()->toArray();
        foreach($this->recentlyReviewed as $key => $game){
            $this->recentlyReviewed[$key]['cover']['url'] = 'https:' . $game['cover']['url'];
        }
    }

    // public function mount()
    // {
    //     $this->loadRecentlyReviewed();
    // }
    public function render()
    {
        return view('livewire.recently-reviewed');
    }
}
