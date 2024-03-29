<div wire:init="loadMostAnticipated" class="most-anticipated-container space-y-10 mt-8">
    @forelse($mostAnticipated as $game)
    <div class="game flex">
        <a href="#">
            <img src="{{Str::replaceFirst('thumb','cover_big',$game['cover']['url'])}}" alt="game cover" class="w-16 hover:opacity-75 transition ease-in-out duration-150">
        </a>
        <div class="ml-4">
            <a href="#" class="hover:text-gray-300">{{$game['name']}}</a>
            <div class="text-gray-400 text-sm mt-1">
                {{date('M d, Y', strtotime($game['first_release_date']))}}
            </div>
        </div>
    </div>
    @empty
    <div class="spinner mt-8">Loading...</div>
    @endforelse
</div>