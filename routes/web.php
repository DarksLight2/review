<?php

use Illuminate\Http\Request;
use Google\Service\Calendar;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redis;
use App\Internal\Google\AccessTokenStatus;
use App\Internal\Google\GoogleClientManager;
use App\Domains\Contact\DTO\CreateContactDTO;
use Symfony\Component\HttpFoundation\Response;
use App\Domains\Box\Collections\RecipientDTOCollection;


Route::get('/', function () {
//    $coll = new RecipientDTOCollection();
//    $coll->push(new CreateContactDTO('test'));
//    dd($coll->find(0));

    $auth_token = 'EAADczyK5en8BO1EDGZBorUs432Y1pDDv1qXYJHr208orOV9s5zmZBACeyhFKmKtujfLCEZAyv8tAPpUqbCvBTs0VsXaZCbOMCdpb5lRFsLDpGVZABvgD3elFSZBoOWYtT9lnJPId2cvsC6xmKFY1D6OY1aphVXIp5RHLWlkLsZBii7dujqCv9oxwLJBh3wNMkcBn0gEloB8JrBFO3MZBrOp0';

    $resp = Http::withHeaders([
        'Accept' => 'application/json',
        'Content-Type' => 'application/json',
        'Authorization' => "Bearer $auth_token",
    ])
        ->post('https://graph.facebook.com/v19.0/308145665712586/messages', [
            'messaging_product' => 'whatsapp',
            'to' => '+923056327543',
            'type' => 'template',
            'recipient_type' => 'individual',
            'template' => [
                'name' => 'hello_world',
                'language' => [
                    'code' => 'en_US'
                ]
            ],
//            'text' => [
//                'preview_url' => false,
//                'body' => 'Hi there! You just received a message from Facebook.',
//            ],
        ]);

    dd($resp->json());

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
