<?php

namespace App\Http\Controllers;
use MarcReichel\IGDBLaravel\Models\Game;
use Illuminate\Http\Request;
use Carbon\Carbon;
class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $before = Carbon::now()->subMonths(2)->timestamp;
        // $after = Carbon::now()->addMonths(2)->timestamp;
        // $current = Carbon::now()->timestamp;
        // $afterFourMonts = Carbon::now()->addMonths(4)->timestamp;

        // $popularGames = Game::select(['name', 'first_release_date', 'rating'])->whereIn('platforms', [48,49,130,6] )->where('first_release_date', '>=', $before)->where('first_release_date', '<=', $after)->orderBy('rating', 'desc')->limit(12)->with(['platforms', 'cover'])->cache(9999)->get()->toArray();
        // //add https: infront of the cover url
        // foreach($popularGames as $key => $game){
        //     $popularGames[$key]['cover']['url'] = 'https:' . $game['cover']['url'];
        // }

        //get recently reviewed games
        // $recentlyReviewed = Game::select(['name', 'first_release_date', 'rating','rating_count', 'summary'])->whereIn('platforms', [48,49,130,6] )->where('first_release_date', '>=', $before)->where('first_release_date', '<=', $current)->where('rating_count', '>',5)->orderBy('rating', 'desc')->limit(3)->with(['platforms', 'cover'])->cache(9999)->get()->toArray();
        // foreach($recentlyReviewed as $key => $game){
        //     $recentlyReviewed[$key]['cover']['url'] = 'https:' . $game['cover']['url'];
        // }
        
        //most anticipated games
        // $mostAnticipated = Game::select(['name', 'first_release_date', 'rating','rating_count', 'summary'])->whereIn('platforms', [48,49,130,6] )->where('first_release_date', '>=', $current)->where('first_release_date', '<', $afterFourMonts)->whereNotNull('cover')->orderBy('rating', 'desc')->limit(4)->with(['platforms', 'cover'])->cache(9999)->get()->toArray();
        // foreach($mostAnticipated as $key => $game){
        //     $mostAnticipated[$key]['cover']['url'] = 'https:' . $game['cover']['url'];
        // }

        //coming soon games
        // $comingSoon = Game::select(['name', 'first_release_date', 'rating','rating_count', 'summary'])->whereIn('platforms', [48,49,130,6] )->where('first_release_date', '>=', $current)->whereNotNull('cover')->orderBy('first_release_date', 'asc')->limit(4)->with(['platforms', 'cover'])->cache(9999)->get()->toArray();
        // foreach($comingSoon as $key => $game){
        //     $comingSoon[$key]['cover']['url'] = 'https:' . $game['cover']['url'];
        // }
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
