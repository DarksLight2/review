<?php

use Illuminate\Http\Request;
use Google\Service\Calendar;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redis;
use App\Internal\Google\AccessTokenStatus;
use App\Internal\Google\GoogleClientManager;
use Symfony\Component\HttpFoundation\Response;


Route::get('/', function () {
//    $coll = new RecipientDTOCollection();
//    $coll->push(new CreateContactDTO('test'));
//    dd($coll->find(0));

    return view('welcome');
});

Route::get('/redirect/oauth2/google/calendar', function (Request $request) {

    $user_id      = 1;
    $client       = (new GoogleClientManager())->calendar_client;
    $access_token = $client->fetchAccessTokenWithAuthCode($request->query('code'));

    if (empty($access_token)) return redirect()->setStatusCode(Response::HTTP_BAD_REQUEST);

    $client->setAccessToken($access_token);

    if (array_key_exists('error', $access_token)) {
        throw new Exception(join(', ', $access_token));
    }

    Redis::set(GoogleClientManager::getRedisCalendarKey($user_id), json_encode($client->getAccessToken()));

    return view('redirect.oauth2.google.calendar');

})->name('redirect.oauth2.google.calendar');

Route::get('/google/calendar/sync', function (Request $request) {

    $user_id        = 1;
    $client_manager = new GoogleClientManager();
    $google_token   = Redis::get(GoogleClientManager::getRedisCalendarKey($user_id));
    $result         = $client_manager->verifyToken($client_manager->calendar_client, $google_token);

    if($result->status === AccessTokenStatus::NeedAuthorization) {
        return response()->json([
            'status' => 'need_authorization',
            'data'   => [
                'url' => $result->data
            ]
        ]);
    } elseif ($result->status === AccessTokenStatus::Expired) {
        Redis::set(GoogleClientManager::getRedisCalendarKey($user_id), $result->data);
    }

    # start sync data
    $calendar = new Calendar($client_manager->calendar_client);
    dd($calendar->calendarList->listCalendarList());

    return response()->noContent();

})->name('google.calendar.sync');
