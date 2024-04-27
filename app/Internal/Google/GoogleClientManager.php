<?php

namespace App\Internal\Google;

use Google\Client;

readonly class GoogleClientManager
{
    public Client $calendar_client;

    public function __construct()
    {
        $this->calendar_client = $this->createCalendarClient();
    }

    public static function getRedisCalendarKey(string $user_id): string
    {
        return "$user_id:google:calendar:token";
    }

    public function createCalendarClient(): Client
    {
        $client = new Client();
        $client->setApplicationName('Google Calendar API PHP Quickstart');
        $client->setScopes('https://www.googleapis.com/auth/calendar');
        $client->setAuthConfig(public_path('client_secret_google.json'));
        $client->setAccessType('offline');
        $client->setPrompt('select_account consent');
        $client->setRedirectUri(route('redirect.oauth2.google.calendar'));

        return $client;
    }

    public function verifyToken(Client $client, ?string $access_token): VerifyTokenDTO
    {
        if(isset($access_token)) $client->setAccessToken($access_token);

        if ($client->isAccessTokenExpired()) {
            $token = $client->getRefreshToken();
            if ($token) {
                $client->fetchAccessTokenWithRefreshToken($token);
                return new VerifyTokenDTO(AccessTokenStatus::Expired, json_encode($token));
            } else {
                return new VerifyTokenDTO(AccessTokenStatus::NeedAuthorization, $client->createAuthUrl());
            }
        }

        return new VerifyTokenDTO(AccessTokenStatus::Ok);
    }
}
