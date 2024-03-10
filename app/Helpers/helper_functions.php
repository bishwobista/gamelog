<?php
use Illuminate\Support\Facades\Http;
function getAuthorization(){
    $igdb_auth = HTTP::post('https://id.twitch.tv/oauth2/token', [
            'client_id' => env('IGDB_CLIENT_ID'),
            'client_secret' => env('IGDB_CLIENT_SECRET'),
            'grant_type' => 'client_credentials'
        ])->json();
        return $igdb_auth['access_token'];
}