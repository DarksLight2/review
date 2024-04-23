<?php

namespace App\Internal\Google;

use Google\Client;

class GoogleClientManager
{
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
}
