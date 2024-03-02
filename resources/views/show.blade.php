@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <div class="game-details border-b border-gray-800 pb-12 flex">
            <div class="flex-none">
                <img src="https://picsum.photos/200/300" alt="">
            </div>
            <div class="ml-12">
                <h2 class="font-semibold text-4xl">
                    Final Fantasy VII Remake
                </h2>
                <div class="text-gray-400">
                    <span>Adventure, RPG</span>
                    &middot;
                    <span>Square Enix</span>
                    &middot;
                    <span>Playstation 4</span>
                </div>
                <div class="flex flex-wrap items-center mt-8 space-x-12">
                    <div class="flex items-center"></div>
                </div>
            </div>
        </div>
    </div>
@endsection