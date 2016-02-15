<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Http\Request;
use MitchellsSpace\Light;

Route::get('/', function () {
    $lights = Light::all();
    return view('space')->with('lights', $lights);
});

Route::post('/twinkle', function(Request $request){

    $lightId = $request->get('light');
    if( ! $lightId )
        $light = false;
    else
        $light = Light::find($lightId);

    if( ! $light ){
        return json_encode([
            "success" =>false,
        ]);
    }

    $iftttMakerToken = env('MAKER_TOKEN');
    $iftttUri = env('MAKER_URI') . $iftttMakerToken;

    $iftttUri = str_replace('{event}', $light->maker_event, $iftttUri);

    $client = new \Guzzle\Http\Client();
    $response = $client->post($iftttUri)->send();

    return json_encode([
        "success" => ($response->getStatusCode() == "200"),
    ]);
});


Route::get('/twinkle/{light}', function(Light $light){

    if( ! $light ){
        return false;
    }

    $iftttMakerToken = env('MAKER_TOKEN');
    $iftttUri = env('MAKER_URI') . $iftttMakerToken;

    $iftttUri = str_replace('{event}', $light->maker_event, $iftttUri);

    $client = new \Guzzle\Http\Client();
    $response = $client->post($iftttUri)->send();

    return json_encode([
        "success" => ($response->getStatusCode() == "200"),
    ]);
});
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
