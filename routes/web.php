<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redis;
use App\Internal\Google\GoogleClientManager;
use Symfony\Component\HttpFoundation\Response;


Route::get('/', function () {
//    $coll = new RecipientDTOCollection();
//    $coll->push(new CreateContactDTO('test'));
//    dd($coll->find(0));

    return view('welcome');
});

Route::get('/redirect/oauth2/google/calendar', function (Request $request) {

    $user_id = auth()->user()->id;

    $client = (new GoogleClientManager())->createCalendarClient();

    $accessToken = $client->fetchAccessTokenWithAuthCode($request->query('code'));

    if (empty($accessToken)) return redirect()->setStatusCode(Response::HTTP_BAD_REQUEST);

    $client->setAccessToken($accessToken);

    if (array_key_exists('error', $accessToken)) {
        throw new Exception(join(', ', $accessToken));
    }

    Redis::set("$user_id:google:calendar:token", json_encode($client->getAccessToken()));

    return view('redirect.oauth2.google.calendar');

})->name('redirect.oauth2.google.calendar');

Route::get('/google/calendar/sync', function (Request $request) {

    $user_id = auth()->user()->id;

    $client = (new GoogleClientManager())->createCalendarClient();

    $google_token = Redis::get("$user_id:google:calendar:token");

    if (isset($google_token)) {
        $accessToken = json_decode($google_token, true);
        $client->setAccessToken($accessToken);
    }

    if ($client->isAccessTokenExpired()) {
        $token = $client->getRefreshToken();
        if ($token) {
            $client->fetchAccessTokenWithRefreshToken($token);
            Redis::set("$user_id:google:calendar:token", json_encode($token));
        } else {
            return response()->json([
                'status' => 'need_authorization',
                'data'   => [
                    'url' => $client->createAuthUrl()
                ]
            ]);
        }
    }

    # start sync data

    return response()->noContent();

})->name('google.calendar.sync');
