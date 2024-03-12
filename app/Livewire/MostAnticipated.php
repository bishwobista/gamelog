<?php

namespace App\Livewire;

use Livewire\Component;
use MarcReichel\IGDBLaravel\Models\Game;
use Carbon\Carbon;

class MostAnticipated extends Component
{

    public $mostAnticipated = [];


    public function loadMostAnticipated()
    {
        $current = Carbon::now()->timestamp;
        $afterFourMonts = Carbon::now()->addMonths(4)->timestamp;
        $this->mostAnticipated = Game::select(['name', 'first_release_date', 'rating','rating_count', 'summary'])->whereIn('platforms', [48,49,130,6] )->where('first_release_date', '>=', $current)->where('first_release_date', '<', $afterFourMonts)->whereNotNull('cover')->orderBy('rating', 'desc')->limit(4)->with(['platforms', 'cover'])->get()->toArray();
        foreach($this->mostAnticipated as $key => $game){
            $this->mostAnticipated[$key]['cover']['url'] = 'https:' . $game['cover']['url'];
        }
    }

    public function render()
    {
        return view('livewire.most-anticipated');
    }
}
