<?php

namespace App\Livewire;

use Livewire\Component;
use MarcReichel\IGDBLaravel\Models\Game;
use Carbon\Carbon;

class ComingSoon extends Component
{
    public $comingSoon = [];

    public function loadComingSoon()
    {
        $current = Carbon::now()->timestamp;
        $this->comingSoon = Game::select(['name', 'first_release_date', 'rating','rating_count', 'summary'])->whereIn('platforms', [48,49,130,6] )->where('first_release_date', '>=', $current)->whereNotNull('cover')->orderBy('first_release_date', 'asc')->limit(4)->with(['platforms', 'cover'])->get()->toArray();
        foreach($this->comingSoon as $key => $game){
            $this->comingSoon[$key]['cover']['url'] = 'https:' . $game['cover']['url'];
        }
    }

    public function render()
    {
        return view('livewire.coming-soon');
    }
}
